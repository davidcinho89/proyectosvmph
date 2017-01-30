<?php

defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');

class SaldosModel extends ModelBase {

    public function getCategorias() {
        $consulta = $this->db->executeQue("select * from categoriasp order by nombrecategoria");
        while ($row = $this->db->arrayResult($consulta)) {
            $categorias[$row['idcategoria']] = $row['nombrecategoria'];
        }
        return $categorias;
    }

    public function getCargas() {

        $consulta = $this->db->executeQue("SELECT DISTINCT v.urlarchivo,(select ve.fechacarga from saldoinventario ve where ve.urlarchivo=v.urlarchivo limit 1) as fecha FROM saldoinventario v order by fecha asc;");
        while ($row = $this->db->arrayResult($consulta)) {
            $cargas[] = array("url" => $row['urlarchivo'],
                "fecha" => $row['fecha']);
        }
        return $cargas;
    }

    public function deleteCarga() {
        $urlborrar = base64_decode($_POST["verify"]);
        if ($this->db->executeQue("DELETE FROM saldoinventario WHERE urlarchivo='$urlborrar'")) {
            echo json_encode(array("res" => "si", "idrow" => sha1($urlborrar)));
        } else {
            echo json_encode(array("res" => "no"));
        }
    }

    public function getProductosStock($fechainicial,$fechafinal) {
        $consulta = $this->db->executeQue("select (select referencia from productos p
                where p.idproducto=v.idproducto) as codigoproducto, 
                (select codigobodega from bodegas b where b.bodegaid=v.idbodega) as codigobodega, 
                v.fechacarga,
                v.precio,
                v.cantidad,
                v.fechasaldo
            from saldoinventario v where v.fechacarga>='$fechainicial' and v.fechacarga<='$fechafinal'");
        while ($row = $this->db->arrayResult($consulta)) {
            $ventas[] = array("producto" => $row['codigoproducto'],
                "tienda" => $row['codigobodega'],
                "fecha" => $row['fechacarga'],
                "cantidad" => $row['cantidad'],
                "fechareal" => $row['fechasaldo'],
                "precio" => $row['precio']);
        }
        return $ventas;
    }

    public function getNombreBodega() {
        $idbod = $this->getUserBodega();
        $consulta = $this->db->executeQue("select * from bodegas where bodegaid=$idbod");
        $row = $this->db->arrayResult($consulta);
        return $row["nombrebodega"];
    }

    private function getNombreCategoria($idcategoria) {
        $consulta = $this->db->executeQue("select * from categoriasp where idcategoria=$idcategoria");
        $row = $this->db->arrayResult($consulta);
        return $row["nombrecategoria"];
    }

    public function getProductosToDownload() {
        $idbodega = $this->getUserBodega();
        $consulta = $this->db->executeQue("select p.idproducto, p.referencia, p.nombreproducto, p.idcategoria, b.stock, b.costo, b.idbodegaproductos, p.unidadmedida
                from productos p, bodegasproductos b
                where b.idproducto=p.idproducto
                and p.estado='activo'
                and b.idbodega=$idbodega
                order by p.idcategoria, p.nombreproducto asc");
        while ($row = $this->db->arrayResult($consulta)) {
            $productosstock[] = array("id" => $row['idproducto'],
                "referencia" => $row['referencia'],
                "nombre" => $row['nombreproducto']);
        }
        return $productosstock;
    }

    function getsaldos($nombrearchivo) {
        $consulta = $this->db->executeQue("select * from saldoinventario where urlarchivo='$nombrearchivo'");
        if ($this->db->numRows($consulta) == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function createDataSessionSaldos() {
        $destino = 'tmp' . SL . $_FILES["exceldatos"]["name"];
        copy($_FILES["exceldatos"]["tmp_name"], $destino);
        $objPHPExcel = PHPExcel_IOFactory::load($destino);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $noit = 1;
        $cont2 = 0;
        $arrayRespuesta = null;
        $validacion = true;
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            if ($noit == 1) {
                $highestRow = $worksheet->getHighestRow();
                $cont = 0;
                for ($row = 1; $row <= $highestRow; $row++) {
                    $objPHPExcel->getActiveSheet()->getStyle('D' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
                    //$objPHPExcel->getActiveSheet()->getStyle('A' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    //$tienda = trim($worksheet->getCellByColumnAndRow(0, $row)->getValue());
                    $tienda = trim($worksheet->getCellByColumnAndRow(3, $row)->getFormattedValue());
                    $objPHPExcel->getActiveSheet()->getStyle('A' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
                    //$objPHPExcel->getActiveSheet()->getStyle('B' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    //$producto = trim($worksheet->getCellByColumnAndRow(1, $row)->getValue());
                    $producto = trim($worksheet->getCellByColumnAndRow(0, $row)->getFormattedValue());
                    $cantidad = str_replace(",", ".", trim($worksheet->getCellByColumnAndRow(2, $row)->getValue()));
                    $precio = str_replace(",", ".", trim($worksheet->getCellByColumnAndRow(1, $row)->getValue()));
                    if ($cantidad == "" && $producto == "" && $tienda == "" && $precio == "") {
                        //$arrayRespuesta[] = array($tienda, $producto, $cantidad, $precio, 'Faltan valores');
                        $cont++;
                    } else {
                        if ($cantidad == "" || $producto == "" || $tienda == "" || $precio == "") {
                            $arrayRespuesta[] = array($tienda, $producto, $cantidad, $precio, 'Faltan valores');
                        } else {
                            $tienda2 = $this->existeTienda($tienda);
                            if ($tienda2) {
                                $producto2 = $this->existeProducto($producto);
                                if ($producto2) {
                                    if (is_numeric($cantidad)) {
                                        if (is_numeric($precio)) {
                                            $arrayRespuesta[] = array($producto, $precio, $cantidad, $tienda, 'Correcto', $producto2["id"], $tienda2["id"]);
                                            $cont2++;
                                        } else {
                                            $validacion = false;
                                            $arrayRespuesta[] = array($producto, $precio, $cantidad, $tienda, 'Formato de precio incorrecta');
                                        }
                                    } else {
                                        $validacion = false;
                                        $arrayRespuesta[] = array($producto, $precio, $cantidad, $tienda, 'Formato de cantidad incorrecta');
                                    }
                                } else {
                                    $validacion = false;
                                    $arrayRespuesta[] = array($producto, $precio, $cantidad, $tienda, 'Codigo incorrecto o producto no existe');
                                }
                            } else {
                                $validacion = false;
                                $arrayRespuesta[] = array($producto, $precio, $cantidad, $tienda, 'Codigo incorrecto o tienda no existe');
                            }
                        }
                        if ($cont > 3) {
                            $highestRow = 0;
                        }
                    }
                }
                $noit = 2;
            }
        }
        if ($validacion) {
            foreach ($arrayRespuesta as $value) {
                $idsaldo = $this->getIdSecuencia("nextval('saldoinventario_idsaldoinventario_seq'::regclass)");
                $precio = $value[1];
                $archivo = $_FILES["exceldatos"]["name"];
                $idbodega = $value[6];
                $idproducto = $value[5];
                $cantidad = $value[2];
                $anio = $_POST["anioventa"];
                $mes = $_POST["mesventa"];
                $semana = $_POST["semanaventa"];
                $fecha = date("Y-m-d H:i:s");
                $this->db->executeQue("insert into saldoinventario 
                        values($idsaldo,$idproducto,$idbodega,$cantidad,$precio,'$anio-$mes-$semana','$fecha','$archivo');");
            }
        }
        $ressss[0] = $arrayRespuesta;
        $ressss[1] = $validacion;
        $ressss[2] = $cont2;
        return $ressss;
    }

    private function existeProducto($referencia) {
        $idbodega = $this->getUserBodega();
        $consulta = $this->db->executeQue("select p.idproducto, p.referencia, p.nombreproducto, p.idcategoria, p.unidadmedida
                from productos p
                where p.referencia='$referencia'");
        if ($this->db->numRows($consulta) == 0) {
            return false;
        } else {
            $row = $this->db->arrayResult($consulta);
            $productosstock = array("id" => $row['idproducto'],
                "referencia" => $row['referencia'],
                "nombre" => $row['nombreproducto'],
                "stock" => $row['stock'],
                "costo" => $row['costo'],
                "unidad" => $row['unidadmedida']);
            return $productosstock;
        }
    }

    private function existeTienda($referencia) {
        $consulta = $this->db->executeQue("select * from bodegas where codigobodega=$referencia");
        if ($this->db->numRows($consulta) == 0) {
            return false;
        } else {
            $row = $this->db->arrayResult($consulta);
            $productosstock = array("id" => $row['bodegaid']);
            return $productosstock;
        }
    }

    public function finishAdjust() {
        $ajuste1 = false;
        $ajuste2 = false;
        if (isset($_SESSION["ajustefisico"]["quitar"])) {
            $document = $this->generateDocument("AJU.INV.FIS.SA");
            if ($document) {
                $this->insertDetails($document, "AJU.INV.FIS.SA");
                $ajuste1 = true;
            } else {
                $ajuste1 = false;
            }
        } else {
            $ajuste1 = true;
        }
        if (isset($_SESSION["ajustefisico"]["agregar"])) {
            $document = $this->generateDocument("AJU.INV.FIS.EN");
            if ($document) {
                $this->insertDetails2($document, "AJU.INV.FIS.EN");
                $ajuste2 = true;
            } else {
                $ajuste2 = false;
            }
        } else {
            $ajuste2 = true;
        }
        if ($ajuste2 && $ajuste1) {
            unset($_SESSION["ajustefisico"]);
            echo json_encode(array("respuesta" => "ok"));
        }
    }

    private function generateDocument($tipo) {
        $idocumento = $this->getIdSecuencia("nextval('documentos_iddocumento_seq'::regclass)");
        $fecha = date("Y-m-d H:i:s");
        $prefijo = $tipo == "AJU.INV.FIS.EN" ? "AIFE" : "AIFS";
        $tipodocuento = $tipo;
        $idbodega = $this->getUserBodega();
        $nombredoc = $tipo == "AJU.INV.FIS.EN" ? "AJUSTE DE INVENTARIO FISICO ENTRADA" : "AJUSTE DE INVENTARIO FISICO SALIDA";
        $idperiodo = $this->getCurrentPeriodo();
        $numdoc = $this->internalCode($idbodega, $prefijo);
        $query = "insert into documentos values($idocumento,'$prefijo','$fecha',NULL" .
                ",'$tipodocuento',$numdoc,NULL,$idbodega,'$nombredoc',NULL,NULL,$idperiodo)";
        if ($this->db->executeQue($query)) {
            return $idocumento;
        } else {
            return false;
        }
    }
    
    private function insertDetails($iddocumento, $tipo) {
        $salidas = $_SESSION["ajustefisico"]["quitar"];
        foreach ($salidas as $key => $value) {
            if ($this->createDetail($iddocumento, $key, $value["costo"], $value["diferencia"])) {
                $idbodega = $this->getUserBodega();
                $bodegaproducto = $this->getUltimoCostoStock($key, $idbodega);
                $newstock = $bodegaproducto['stock'] - $value["diferencia"];
                $vrtotaldetalle = number_format($value["diferencia"] * $value["costo"], 2, '.', '');
                $newvalortotal = $newstock == 0? : $bodegaproducto['vrtotal'] - $vrtotaldetalle;
                $nuevocosto = $newstock == 0? : number_format($newvalortotal / $newstock, 2, '.', '');
                if ($this->createMovimiento($bodegaproducto['id'], $iddocumento, $idbodega, $newstock, $nuevocosto, $tipo)) {
                    $queryupdate = "update bodegasproductos set costo=$nuevocosto, stock=$newstock where idbodega=$idbodega and idproducto=" . $key;
                    if ($this->db->executeQue($queryupdate)) {
                        
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    private function insertDetails2($iddocumento, $tipo) {
        $salidas = $_SESSION["ajustefisico"]["agregar"];
        foreach ($salidas as $key => $value) {
            if ($this->createDetail($iddocumento, $key, $value["costo"], $value["diferencia"])) {
                $idbodega = $this->getUserBodega();
                $bodegaproducto = $this->getUltimoCostoStock($key, $idbodega);
                $newstock = $bodegaproducto['stock'] + $value["diferencia"];
                $vrtotaldetalle = number_format($value["diferencia"] * $value["costo"], 2, '.', '');
                $newvalortotal = $bodegaproducto['vrtotal'] + $vrtotaldetalle;
                $nuevocosto = number_format($newvalortotal / $newstock, 2, '.', '');
                if ($this->createMovimiento($bodegaproducto['id'], $iddocumento, $idbodega, $newstock, $nuevocosto, $tipo)) {
                    $queryupdate = "update bodegasproductos set costo=$nuevocosto, stock=$newstock where idbodega=$idbodega and idproducto=" . $key;
                    if ($this->db->executeQue($queryupdate)) {
                        
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    private function createDetail($iddocumento, $idproducto, $costo, $cantidad) {
        $idetalle = $this->getIdSecuencia("nextval('detalledocumentos_iddetallecodumentos_seq'::regclass)");
        $query = "insert into detalledocumentos values($idetalle,$cantidad,$costo,$idproducto,$iddocumento)";
        if ($this->db->executeQue($query)) {
            return true;
        } else {
            return false;
        }
    }

    private function getUltimoCostoStock($idproducto, $idbodega) {
        $query = "select * from bodegasproductos where idbodega=$idbodega and idproducto=$idproducto";
        $consulta = $this->db->executeQue($query);
        $bodegaproducto = null;
        while ($row = $this->db->arrayResult($consulta)) {
            $bodegaproducto = array('id' => $row['idbodegaproductos'],
                'costo' => $row['costo'],
                'stock' => $row['stock'],
                'vrtotal' => number_format($row['stock'] * $row['costo'], 2, '.', ''));
        }
        return $bodegaproducto;
    }

    private function createMovimiento($idbodegaproducto, $idocumento, $idbodega, $saldostock, $costo, $tipo) {
        $idmovimiento = $this->getIdSecuencia("nextval('movimientos_idmovimiento_seq'::regclass)");
        $fecha = date("Y-m-d");
        $tipodocumento = $tipo;
        $query = "insert into movimientos values($idmovimiento,$idbodegaproducto,'$fecha','$tipodocumento',NULL,$idocumento,$idbodega,$saldostock,$costo)";
        if ($this->db->executeQue($query)) {
            return true;
        } else {
            return false;
        }
    }

    private function getUserBodega() {
        $usuario = unserialize($_SESSION['user']);
        return $usuario->getBodega();
    }

    private function getIdSecuencia($secuencia) {
        $idquery = "select $secuencia limit 1";
        $consult = $this->db->executeQue($idquery);
        $idelemnto = 0;
        while ($row = $this->db->arrayResult($consult)) {
            $idelemnto = $row['nextval'];
        }
        return $idelemnto;
    }

    private function getCurrentPeriodo() {
        $query = 'select * from periodos where \'' . date("Y-m-d") . '\' BETWEEN fechainicio AND fechafin';
        $consulta = $this->db->executeQue($query);
        $idperiodo = 0;
        while ($row = $this->db->arrayResult($consulta)) {
            $idperiodo = $row['idperiodo'];
        }
        return $idperiodo;
    }

    private function internalCode($bodega, $prefijo) {
        $query = "select * from documentos where prefijo='$prefijo' and idbodega=$bodega";
        $consulta = $this->db->executeQue($query);
        $codigointerno = $this->db->numRows($consulta) + 1;
        return $codigointerno;
    }

    public function verificarFecha($anio, $mes, $semana) {
        $consulta = $this->db->executeQue("select count(*) as numsaldos 
                from saldoinventario
                where fechasaldo='$anio-$mes-$semana'");
        $row = $this->db->arrayResult($consulta);
        return $row["numsaldos"] > 0 ? true : false;
    }

}
?>

