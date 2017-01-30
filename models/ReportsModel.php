<?php

defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');

class ReportsModel extends ModelBase {

    public function getproductoInicial() {
        $consulta = $this->db->executeQue("select * from productos order by referencia asc");
        while ($row = $this->db->arrayResult($consulta)) {
            $producto[$row['idproducto']] = $row['referencia'];
        }
        return $producto;
    }
    
    public function getcategoriaInicial() {
        $consulta = $this->db->executeQue("select * from categoriasp order by idcategoria asc");
        while ($row = $this->db->arrayResult($consulta)) {
            $categorias[$row['idcategoria']] = $row['nombrecategoria'];
        }
        return $categorias;
    }

    public function getclienteInicial() {
        $consulta = $this->db->executeQue("select * from terceros order by codigotercero asc");
        while ($row = $this->db->arrayResult($consulta)) {
            $tercero[$row['idtercero']] = $row['codigotercero'];
        }
        return $tercero;
    }

    public function gettiendaInicial() {
        $consulta = $this->db->executeQue("select * from bodegas order by codigobodega asc");
        while ($row = $this->db->arrayResult($consulta)) {
            $bodega[] = array($row['bodegaid'], $row['codigobodega'], $row['idtercero']);
        }
        return $bodega;
    }
    
    public function gettiendasAjax($clienteini,$clientefin) {    
        $primercliente=$this->getClienteCode($clienteini);
        $ultimacliente=$this->getClienteCode($clientefin); 
        if($ultimacliente<$primercliente){
            $ultimacliente=$primercliente;
            $clientefin=$clienteini;
        }
        $consulta = $this->db->executeQue("select * 
                from bodegas b left join terceros t on b.idtercero=t.idtercero
            where t.codigotercero>=$primercliente and t.codigotercero<=$ultimacliente
            order by b.codigobodega asc");
        $bodega[0]=$clientefin;
        while ($row = $this->db->arrayResult($consulta)) {
            $bodega[] = array("id"=>$row['bodegaid'], "codigo"=> $row['nombrebodega']);
        }        
        return $bodega;
    }

    public function restarproductos($idproductoini, $productos) {
        $nuevosproductos;
        foreach ($productos as $key => $value) {
            if ($value >= $this->getProductoCode($idproductoini)) {
                $nuevosproductos[$key] = $value;
            }
        }        
        if ($this->getProductoCode($_GET['productofin']) < $this->getProductoCode($idproductoini)) {
            $_GET['productofin'] = $idproductoini;
            
        }
        return $nuevosproductos;
    }
    
    public function restarproductos2($idproductofin, $productos) {
        $nuevosproductos;         
        foreach ($productos as $key => $value) {
            if ($value <= $this->getProductoCode($idproductofin)) {
                $nuevosproductos[$key] = $value;
            }
        }        
        return $nuevosproductos;
    }
    
    public function restarcategorias($idcategoriaini, $categorias) {
        $nuevoscategorias=null;
        foreach ($categorias as $key => $value) {
            if ($key >= $idcategoriaini) {
                $nuevoscategorias[$key] = $value;
            }
        }        
        if ($_GET['productofin'] < $idcategoriaini) {
            $_GET['productofin'] = $idcategoriaini;            
        }
        //filter_input(INPUT_GET, 'productofin');
        return $nuevoscategorias;
    }
    
    public function restarcategorias2($idcategoriaini, $categorias) {
        $nuevoscategorias=null;         
        foreach ($categorias as $key => $value) {
            if ($key <= $idcategoriaini) {
                $nuevoscategorias[$key] = $value;
            }
        }        
        return $nuevoscategorias;
    }

    private function getProductoCode($idproducto) {
        $consulta = $this->db->executeQue("select referencia from productos where idproducto=$idproducto");
        $row = $this->db->arrayResult($consulta);
        return $row['referencia'];
    }

    public function restarclientes($idcliente, $clientes) {
        $nuevosclientes;
        foreach ($clientes as $key => $value) {
            if ($value >= $this->getClienteCode($idcliente)) {
                $nuevosclientes[$key] = $value;
            }
        }
        if ($this->getClienteCode($_GET['clientefin']) < $this->getClienteCode($idcliente)) {
            $_GET['clientefin'] = $idcliente;
        }
        return $nuevosclientes;
    }

    public function restarclientes2($idcliente, $clientes) {
        $nuevosclientes;
        foreach ($clientes as $key => $value) {
            if ($value <= $this->getClienteCode($idcliente)) {
                $nuevosclientes[$key] = $value;
            }
        }
        return $nuevosclientes;
    }

    private function getClienteCode($idcliente) {
        $consulta = $this->db->executeQue("select codigotercero from terceros where idtercero=$idcliente");
        $row = $this->db->arrayResult($consulta);
        return $row['codigotercero'];
    }

    public function restartiendas($clientes, $tiendas) {
        $nuevostiendas;
        foreach ($tiendas as $value) {
            foreach ($clientes as $key => $value2) {
                if ($value[2] == $key) {
                    $nuevostiendas[] = $value;
                }
            }
        }
        return $nuevostiendas;
    }

    public function restartiendas2($idtiendaini, $tiendas) {
        $nuevostiendas;
        foreach ($tiendas as $value) {
            if ($value[1] >= $this->getTiendaCode($idtiendaini)) {
                $nuevostiendas[] = $value;
            }
        }
        if ($this->getTiendaCode($_GET['tiendafin']) < $this->getTiendaCode($idtiendaini)) {
            $_GET['tiendafin'] = $idtiendaini;
        }
        return $nuevostiendas;
    }

    public function restartiendas3($idtiendafin, $tiendas) {
        $nuevostiendas;
        foreach ($tiendas as $value) {
            if ($value[1] <= $this->getTiendaCode($idtiendafin)) {
                $nuevostiendas[] = $value;
            }
        }       
        return $nuevostiendas;
    }

    private function getTiendaCode($idtienda) {
        $consulta = $this->db->executeQue("select codigobodega from bodegas where bodegaid=$idtienda");
        $row = $this->db->arrayResult($consulta);
        return $row['codigobodega'];
    }
    
    public function traerPrecios($productos, $tiendas, $anioini, $aniofin, $mesini, $mesfin, $semanaini, $semanafin) {
        $arreglofinal = null;
        foreach ($productos as $key => $value) {
            foreach ($tiendas as $value2) {
                $idtienda = $value2[0];
                $consulta = $this->db->executeQue("select precioventa, cantidadventa 
                from ventas 
                where idproducto=$key
                and idbodega=$idtienda 
                and fecharealventa>='$anioini-$mesini-$semanaini' and fecharealventa<='$aniofin-$mesfin-$semanafin'");
                $contador = 0;
                $suma = 0;
                $suma2 = 0;
                while ($row = $this->db->arrayResult($consulta)) {
                    $suma = $suma + $row['precioventa'];
                    $suma2 = $suma2 + $row['cantidadventa'];
                    $contador++;
                }
                if ($contador > 0) {
                    $suma = $suma / $contador;
                }
                $arreglofinal[0][$key][$idtienda] = $suma;
                $arreglofinal[1][$key][$idtienda] = $suma2;
            }
        }

        return $arreglofinal;
    }

    public function traerNombreCliente() {
        $consulta = $this->db->executeQue("select idtercero, nombretercero, codigotercero from terceros");
        while ($row = $this->db->arrayResult($consulta)) {
            $clientes[$row["idtercero"]] = $row["nombretercero"];
        }
        return $clientes;
    }

    public function traerNombreProducto() {
        $consulta = $this->db->executeQue("select nombreproducto, referencia from productos");
        while ($row = $this->db->arrayResult($consulta)) {
            $productos[$row["referencia"]] = $row["nombreproducto"];
        }
        return $productos;
    }

    public function traerNombreTienda() {
        $consulta = $this->db->executeQue("select nombrebodega, codigobodega from bodegas");
        while ($row = $this->db->arrayResult($consulta)) {
            $tiendas[$row["codigobodega"]] = $row["nombrebodega"];
        }
        return $tiendas;
    }

    public function traerCantidades($productos, $tiendas, $anio) {
        $arreglofinal = null;
        foreach ($productos as $key => $value) {
            foreach ($tiendas as $value2) {
                $total = 0;
                $idtienda = $value2[0];
                $idproducto = $key;
                /*
                for ($index = 1; $index <= 12; $index++) {
                    for ($index2 = 1; $index2 <= 5; $index2++) {
                        $arreglofinal[$idproducto][$idtienda][$anio][$index][$index2] = $this->traerventasXSemana($idproducto, $idtienda, $anio, $index, $index2);
                        $total = $total + $arreglofinal[$idproducto][$idtienda][$anio][$index][$index2];
                    }
                }                 
             
                $arreglofinal[$idproducto][$idtienda][$anio]["total"] = $total;   
                 * * */
                $arreglofinal[$idproducto][$idtienda]=$this->traerventasXSemana2($idproducto, $idtienda, $anio);
                            
            }
        }
        return $arreglofinal;
    }
    
    public function traerCantidadesProductos($productos, $anio) {
        $arreglofinal = null;
        foreach ($productos as $key => $value) {                                         
            $idproducto = $key;               
            $arreglofinal[$idproducto]=$this->traerventasXSemana3($idproducto, $anio);                                        
        }
        return $arreglofinal;
    }
    
    public function traerCantidadesToneladas($productos, $tiendas, $anio) {
        $arreglofinal = null;
        foreach ($productos as $key => $value) {
            foreach ($tiendas as $value2) {                
                $idtienda = $value2[0];
                $idproducto = $key;
                /*
                for ($index = 1; $index <= 12; $index++) {
                    for ($index2 = 1; $index2 <= 5; $index2++) {
                        $arreglofinal[$idproducto][$idtienda][$anio][$index][$index2] = $this->traerventasXSemana($idproducto, $idtienda, $anio, $index, $index2);
                        $total = $total + $arreglofinal[$idproducto][$idtienda][$anio][$index][$index2];
                    }
                }                 
             
                $arreglofinal[$idproducto][$idtienda][$anio]["total"] = $total;   
                 * * */
                $arreglofinal[$idproducto][$idtienda]=$this->traerventasXSemana2Toneladas($idproducto, $idtienda, $anio);
                            
            }
        }
        return $arreglofinal;
    }

    public function traerCantidadesTotales($anio) {
        $arreglofinal = null;        
        $total = 0;
        $total2 = 0;
        for ($index = 1; $index <= 12; $index++) {
            for ($index2 = 1; $index2 <= 5; $index2++) {
                $arreglofinal["cantidades"][$anio][$index][$index2] = $this->traerventasTotales($anio, $index, $index2);
                $arreglofinal["toneladas"][$anio][$index][$index2] = $this->traerventasTotalesToneladas($anio, $index, $index2);
                $total = $total + $arreglofinal["cantidades"][$anio][$index][$index2];
                $total2 = $total2 + $arreglofinal["toneladas"][$anio][$index][$index2];
            }
        }
        $arreglofinal[$anio]["total"] = $total;
        $arreglofinal[$anio]["totaltoneladas"] = $total2;
        //echo json_encode($arreglofinal);
        return $arreglofinal;
    }

    private function traerventasXSemana($idproducto, $idtienda, $anio, $mes, $semana) {
        $consulta = $this->db->executeQue("select SUM(cantidadventa) as cantidad from ventas 
                where idproducto=$idproducto
                and idbodega=$idtienda 
                and fecharealventa='$anio-$mes-$semana'");
        $resultado = $this->db->arrayResult($consulta);
        return $resultado['cantidad'];
    }

    private function traerventasTotales($anio, $mes, $semana) {
        $consulta = $this->db->executeQue("select SUM(cantidadventa) as cantidad from ventas 
                where fecharealventa='$anio-$mes-$semana'");
        $resultado = $this->db->arrayResult($consulta);
        return $resultado['cantidad']==""?0:$resultado['cantidad'];
    }
    
    private function traerventasTotalesToneladas($anio, $mes, $semana) {
        /*
        $consulta = $this->db->executeQue("select CASE WHEN ((v.cantidadventa*p.gramospresentacion)/1000000)<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END as cantidad, p.idproducto
                from ventas v, productos p 
                where v.idproducto=p.idproducto and
                v.fecharealventa='$anio-$mes-$semana'");*/
         $consulta = $this->db->executeQue("select SUM(CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) as cantidad
                from ventas v, productos p 
                where v.idproducto=p.idproducto and
                v.fecharealventa='$anio-$mes-$semana'");
        $resultado = $this->db->arrayResult($consulta);
        return $resultado['cantidad']==""?0:number_format($resultado['cantidad'],2,".",",");
    }

    public function traerCantidadesyCajas($productos, $tiendas, $anioini, $aniofin, $mesini, $mesfin, $semanaini, $semanafin) {
        $arreglofinal = null;
        foreach ($productos as $key => $value) {
            foreach ($tiendas as $value2) {
                $idtienda = $value2[0];
                $consulta = $this->db->executeQue("select SUM(v.cantidadventa) as cantidad, p.relacioncajasproductos, p.gramospresentacion
                from ventas v left join productos p on v.idproducto=p.idproducto 
                where v.idproducto=$key
                and v.idbodega=$idtienda 
                and v.fecharealventa>='$anioini-$mesini-$semanaini' and v.fecharealventa<='$aniofin-$mesfin-$semanafin'
                GROUP BY p.relacioncajasproductos, p.gramospresentacion");
                $row = $this->db->arrayResult($consulta);
                $arreglofinal[$value]["cantidad"] = $arreglofinal[$value]["cantidad"] + $row['cantidad'];
                $arreglofinal[$value]["cajas"] = $row['relacioncajasproductos'];
                $arreglofinal[$value]["gramosxproduto"] = $row['gramospresentacion'];
            }
        }       
        return $arreglofinal;
    }

    public function traerSinRotacion($productos, $tiendas, $anioini, $aniofin, $mesini, $mesfin, $semanaini, $semanafin) {
        $arreglofinal = null;
        foreach ($productos as $key => $value) {
            foreach ($tiendas as $value2) {
                $idtienda = $value2[0];
                $consulta = $this->db->executeQue("select SUM(cantidadventa) as cantidad
                from ventas 
                where idproducto=$key
                and idbodega=$idtienda                 
                and fecharealventa>='$anioini-$mesini-$semanaini' and fecharealventa<='$aniofin-$mesfin-$semanafin'");
                $row = $this->db->arrayResult($consulta);
                if($row['cantidad']==0){
                    $arreglofinal[] = array($value2[1],$value);
                }
            }
        }

        return $arreglofinal;
    }

    private function numberOfWeek($dia, $mes, $ano) {
        $fecha = mktime($hora, $min, $seg, $mes, 1, $ano);
        $numberOfWeek = ceil(($dia + (date("w", $fecha) - 1)) / 7);
        return $numberOfWeek;
    }

    private function semanasXMes($anio) {
        $meses[1] = $this->numberOfWeek("31", "1", $anio);
        $meses[2] = (($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 4 == 0 && $anio % 100 == 0 && $anio % 400 == 0)) ? $this->numberOfWeek("29", "2", $anio) : $this->numberOfWeek("28", "2", $anio);
        $meses[3] = $this->numberOfWeek("31", "3", $anio);
        $meses[4] = $this->numberOfWeek("30", "4", $anio);
        $meses[5] = $this->numberOfWeek("31", "5", $anio);
        $meses[6] = $this->numberOfWeek("30", "6", $anio);
        $meses[7] = $this->numberOfWeek("31", "7", $anio);
        $meses[8] = $this->numberOfWeek("31", "8", $anio);
        $meses[9] = $this->numberOfWeek("30", "9", $anio);
        $meses[10] = $this->numberOfWeek("31", "10", $anio);
        $meses[11] = $this->numberOfWeek("30", "11", $anio);
        $meses[12] = $this->numberOfWeek("31", "12", $anio);
    }

    private function traerventasXSemana2Toneladas($idproducto, $idtienda, $anio) {
        $consulta = $this->db->executeQue("select $idproducto as idproducto, $idtienda as idtienda, $anio as anio,

            SUM(CASE WHEN v.fecharealventa IN ('$anio-01-01') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END) \"11\",           
            SUM(CASE WHEN v.fecharealventa IN ('$anio-01-02') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"12\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-01-03') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"13\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-01-04') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"14\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-01-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"15\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-01-01','$anio-01-02','$anio-01-03','2014-01-04','$anio-01-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"16\",

            SUM(CASE WHEN v.fecharealventa IN ('$anio-02-01') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"21\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-02-02') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"22\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-02-03') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"23\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-02-04') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"24\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-02-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"25\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-02-01','$anio-02-02','$anio-02-03','$anio-02-04','$anio-02-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"26\",

            SUM(CASE WHEN v.fecharealventa IN ('$anio-03-01') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"31\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-03-02') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"32\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-03-03') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"33\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-03-04') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"34\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-03-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"35\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-03-01','$anio-03-02','$anio-03-03','$anio-03-04','$anio-03-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"36\",

            SUM(CASE WHEN v.fecharealventa IN ('$anio-04-01') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"41\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-04-02') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"42\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-04-03') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"43\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-04-04') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"44\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-04-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"45\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-04-01','$anio-04-02','$anio-04-03','$anio-04-04','$anio-04-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"46\",

            SUM(CASE WHEN v.fecharealventa IN ('$anio-05-01') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"51\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-05-02') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"52\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-05-03') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"53\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-05-04') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"54\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-05-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"55\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-05-01','$anio-05-02','$anio-05-03','$anio-05-04','$anio-05-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"56\",

            SUM(CASE WHEN v.fecharealventa IN ('$anio-06-01') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"61\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-06-02') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"62\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-06-03') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"63\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-06-04') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"64\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-06-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"65\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-06-01','$anio-06-02','$anio-06-03','$anio-06-04','$anio-06-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"66\",

            SUM(CASE WHEN v.fecharealventa IN ('$anio-07-01') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"71\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-07-02') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"72\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-07-03') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"73\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-07-04') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"74\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-07-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"75\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-07-01','$anio-07-02','$anio-07-03','$anio-07-04','$anio-07-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"76\",

            SUM(CASE WHEN v.fecharealventa IN ('$anio-08-01') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"81\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-08-02') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"82\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-08-03') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"83\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-08-04') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"84\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-08-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"85\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-08-01','$anio-08-02','$anio-08-03','$anio-08-04','$anio-08-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"86\",

            SUM(CASE WHEN v.fecharealventa IN ('$anio-09-01') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"91\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-09-02') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"92\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-09-03') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"93\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-09-04') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"94\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-09-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"95\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-09-01','$anio-09-02','$anio-09-03','$anio-09-04','$anio-09-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"96\",

            SUM(CASE WHEN v.fecharealventa IN ('$anio-10-01') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"101\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-10-02') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"102\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-10-03') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"103\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-10-04') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"104\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-10-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"105\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-10-01','$anio-10-02','$anio-10-03','$anio-10-04','$anio-10-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"106\",

            SUM(CASE WHEN v.fecharealventa IN ('$anio-11-01') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"111\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-11-02') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"112\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-11-03') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"113\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-11-04') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"114\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-11-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"115\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-11-01','$anio-11-02','$anio-11-03','$anio-11-04','$anio-11-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"116\",

            SUM(CASE WHEN v.fecharealventa IN ('$anio-12-01') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"121\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-12-02') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"122\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-12-03') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"123\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-12-04') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"124\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-12-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"125\",
            SUM(CASE WHEN v.fecharealventa IN ('$anio-12-01','$anio-12-02','$anio-12-03','$anio-12-04','$anio-12-05') THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"126\",

            SUM(CASE WHEN v.fecharealventa>='$anio-01-01' AND v.fecharealventa<='$anio-12-05' THEN (CASE WHEN v.cantidadventa<>0 THEN ((v.cantidadventa*p.gramospresentacion)/1000000) ELSE 0 END) ELSE 0 END)  \"TT\"
            from ventas  v, productos p             
            where v.idproducto=$idproducto
            and v.idproducto=p.idproducto 
            and v.idbodega=$idtienda 
            ");
        $resultado = $this->db->arrayResult($consulta);
        $mes=1;
        $contador=1;
        for ($index = 0; $index < 72 ; $index++) {
            if($contador==7){
                $contador=1;
                $mes++;
            }
            $resultado2[$resultado["idproducto"]][$resultado["idtienda"]][$resultado["anio"]][$mes][$contador]=  number_format($resultado[$mes.$contador],2);
            $contador++;
        }
        $resultado2[$resultado["idproducto"]][$resultado["idtienda"]][$resultado["anio"]]["total"]=number_format($resultado["TT"],2);
        return $resultado2;
    }
    
    private function traerventasXSemana2($idproducto, $idtienda, $anio) {
        $consulta = $this->db->executeQue("select $idproducto as idproducto, $idtienda as idtienda, $anio as anio,

            SUM(CASE WHEN fecharealventa IN ('$anio-01-01') THEN cantidadventa ELSE 0 END) \"11\",
            SUM(CASE WHEN fecharealventa IN ('$anio-01-02') THEN cantidadventa ELSE 0 END) \"12\",
            SUM(CASE WHEN fecharealventa IN ('$anio-01-03') THEN cantidadventa ELSE 0 END) \"13\",
            SUM(CASE WHEN fecharealventa IN ('$anio-01-04') THEN cantidadventa ELSE 0 END) \"14\",
            SUM(CASE WHEN fecharealventa IN ('$anio-01-05') THEN cantidadventa ELSE 0 END) \"15\",
            SUM(CASE WHEN fecharealventa IN ('$anio-01-01','$anio-01-02','$anio-01-03','2014-01-04','$anio-01-05') THEN cantidadventa ELSE 0 END) \"16\",

            SUM(CASE WHEN fecharealventa IN ('$anio-02-01') THEN cantidadventa ELSE 0 END) \"21\",
            SUM(CASE WHEN fecharealventa IN ('$anio-02-02') THEN cantidadventa ELSE 0 END) \"22\",
            SUM(CASE WHEN fecharealventa IN ('$anio-02-03') THEN cantidadventa ELSE 0 END) \"23\",
            SUM(CASE WHEN fecharealventa IN ('$anio-02-04') THEN cantidadventa ELSE 0 END) \"24\",
            SUM(CASE WHEN fecharealventa IN ('$anio-02-05') THEN cantidadventa ELSE 0 END) \"25\",
            SUM(CASE WHEN fecharealventa IN ('$anio-02-01','$anio-02-02','$anio-02-03','$anio-02-04','$anio-02-05') THEN cantidadventa ELSE 0 END) \"26\",

            SUM(CASE WHEN fecharealventa IN ('$anio-03-01') THEN cantidadventa ELSE 0 END) \"31\",
            SUM(CASE WHEN fecharealventa IN ('$anio-03-02') THEN cantidadventa ELSE 0 END) \"32\",
            SUM(CASE WHEN fecharealventa IN ('$anio-03-03') THEN cantidadventa ELSE 0 END) \"33\",
            SUM(CASE WHEN fecharealventa IN ('$anio-03-04') THEN cantidadventa ELSE 0 END) \"34\",
            SUM(CASE WHEN fecharealventa IN ('$anio-03-05') THEN cantidadventa ELSE 0 END) \"35\",
            SUM(CASE WHEN fecharealventa IN ('$anio-03-01','$anio-03-02','$anio-03-03','$anio-03-04','$anio-03-05') THEN cantidadventa ELSE 0 END) \"36\",

            SUM(CASE WHEN fecharealventa IN ('$anio-04-01') THEN cantidadventa ELSE 0 END) \"41\",
            SUM(CASE WHEN fecharealventa IN ('$anio-04-02') THEN cantidadventa ELSE 0 END) \"42\",
            SUM(CASE WHEN fecharealventa IN ('$anio-04-03') THEN cantidadventa ELSE 0 END) \"43\",
            SUM(CASE WHEN fecharealventa IN ('$anio-04-04') THEN cantidadventa ELSE 0 END) \"44\",
            SUM(CASE WHEN fecharealventa IN ('$anio-04-05') THEN cantidadventa ELSE 0 END) \"45\",
            SUM(CASE WHEN fecharealventa IN ('$anio-04-01','$anio-04-02','$anio-04-03','$anio-04-04','$anio-04-05') THEN cantidadventa ELSE 0 END) \"46\",

            SUM(CASE WHEN fecharealventa IN ('$anio-05-01') THEN cantidadventa ELSE 0 END) \"51\",
            SUM(CASE WHEN fecharealventa IN ('$anio-05-02') THEN cantidadventa ELSE 0 END) \"52\",
            SUM(CASE WHEN fecharealventa IN ('$anio-05-03') THEN cantidadventa ELSE 0 END) \"53\",
            SUM(CASE WHEN fecharealventa IN ('$anio-05-04') THEN cantidadventa ELSE 0 END) \"54\",
            SUM(CASE WHEN fecharealventa IN ('$anio-05-05') THEN cantidadventa ELSE 0 END) \"55\",
            SUM(CASE WHEN fecharealventa IN ('$anio-05-01','$anio-05-02','$anio-05-03','$anio-05-04','$anio-05-05') THEN cantidadventa ELSE 0 END) \"56\",

            SUM(CASE WHEN fecharealventa IN ('$anio-06-01') THEN cantidadventa ELSE 0 END) \"61\",
            SUM(CASE WHEN fecharealventa IN ('$anio-06-02') THEN cantidadventa ELSE 0 END) \"62\",
            SUM(CASE WHEN fecharealventa IN ('$anio-06-03') THEN cantidadventa ELSE 0 END) \"63\",
            SUM(CASE WHEN fecharealventa IN ('$anio-06-04') THEN cantidadventa ELSE 0 END) \"64\",
            SUM(CASE WHEN fecharealventa IN ('$anio-06-05') THEN cantidadventa ELSE 0 END) \"65\",
            SUM(CASE WHEN fecharealventa IN ('$anio-06-01','$anio-06-02','$anio-06-03','$anio-06-04','$anio-06-05') THEN cantidadventa ELSE 0 END) \"66\",

            SUM(CASE WHEN fecharealventa IN ('$anio-07-01') THEN cantidadventa ELSE 0 END) \"71\",
            SUM(CASE WHEN fecharealventa IN ('$anio-07-02') THEN cantidadventa ELSE 0 END) \"72\",
            SUM(CASE WHEN fecharealventa IN ('$anio-07-03') THEN cantidadventa ELSE 0 END) \"73\",
            SUM(CASE WHEN fecharealventa IN ('$anio-07-04') THEN cantidadventa ELSE 0 END) \"74\",
            SUM(CASE WHEN fecharealventa IN ('$anio-07-05') THEN cantidadventa ELSE 0 END) \"75\",
            SUM(CASE WHEN fecharealventa IN ('$anio-07-01','$anio-07-02','$anio-07-03','$anio-07-04','$anio-07-05') THEN cantidadventa ELSE 0 END) \"76\",

            SUM(CASE WHEN fecharealventa IN ('$anio-08-01') THEN cantidadventa ELSE 0 END) \"81\",
            SUM(CASE WHEN fecharealventa IN ('$anio-08-02') THEN cantidadventa ELSE 0 END) \"82\",
            SUM(CASE WHEN fecharealventa IN ('$anio-08-03') THEN cantidadventa ELSE 0 END) \"83\",
            SUM(CASE WHEN fecharealventa IN ('$anio-08-04') THEN cantidadventa ELSE 0 END) \"84\",
            SUM(CASE WHEN fecharealventa IN ('$anio-08-05') THEN cantidadventa ELSE 0 END) \"85\",
            SUM(CASE WHEN fecharealventa IN ('$anio-08-01','$anio-08-02','$anio-08-03','$anio-08-04','$anio-08-05') THEN cantidadventa ELSE 0 END) \"86\",

            SUM(CASE WHEN fecharealventa IN ('$anio-09-01') THEN cantidadventa ELSE 0 END) \"91\",
            SUM(CASE WHEN fecharealventa IN ('$anio-09-02') THEN cantidadventa ELSE 0 END) \"92\",
            SUM(CASE WHEN fecharealventa IN ('$anio-09-03') THEN cantidadventa ELSE 0 END) \"93\",
            SUM(CASE WHEN fecharealventa IN ('$anio-09-04') THEN cantidadventa ELSE 0 END) \"94\",
            SUM(CASE WHEN fecharealventa IN ('$anio-09-05') THEN cantidadventa ELSE 0 END) \"95\",
            SUM(CASE WHEN fecharealventa IN ('$anio-09-01','$anio-09-02','$anio-09-03','$anio-09-04','$anio-09-05') THEN cantidadventa ELSE 0 END) \"96\",

            SUM(CASE WHEN fecharealventa IN ('$anio-10-01') THEN cantidadventa ELSE 0 END) \"101\",
            SUM(CASE WHEN fecharealventa IN ('$anio-10-02') THEN cantidadventa ELSE 0 END) \"102\",
            SUM(CASE WHEN fecharealventa IN ('$anio-10-03') THEN cantidadventa ELSE 0 END) \"103\",
            SUM(CASE WHEN fecharealventa IN ('$anio-10-04') THEN cantidadventa ELSE 0 END) \"104\",
            SUM(CASE WHEN fecharealventa IN ('$anio-10-05') THEN cantidadventa ELSE 0 END) \"105\",
            SUM(CASE WHEN fecharealventa IN ('$anio-10-01','$anio-10-02','$anio-10-03','$anio-10-04','$anio-10-05') THEN cantidadventa ELSE 0 END) \"106\",

            SUM(CASE WHEN fecharealventa IN ('$anio-11-01') THEN cantidadventa ELSE 0 END) \"111\",
            SUM(CASE WHEN fecharealventa IN ('$anio-11-02') THEN cantidadventa ELSE 0 END) \"112\",
            SUM(CASE WHEN fecharealventa IN ('$anio-11-03') THEN cantidadventa ELSE 0 END) \"113\",
            SUM(CASE WHEN fecharealventa IN ('$anio-11-04') THEN cantidadventa ELSE 0 END) \"114\",
            SUM(CASE WHEN fecharealventa IN ('$anio-11-05') THEN cantidadventa ELSE 0 END) \"115\",
            SUM(CASE WHEN fecharealventa IN ('$anio-11-01','$anio-11-02','$anio-11-03','$anio-11-04','$anio-11-05') THEN cantidadventa ELSE 0 END) \"116\",

            SUM(CASE WHEN fecharealventa IN ('$anio-12-01') THEN cantidadventa ELSE 0 END) \"121\",
            SUM(CASE WHEN fecharealventa IN ('$anio-12-02') THEN cantidadventa ELSE 0 END) \"122\",
            SUM(CASE WHEN fecharealventa IN ('$anio-12-03') THEN cantidadventa ELSE 0 END) \"123\",
            SUM(CASE WHEN fecharealventa IN ('$anio-12-04') THEN cantidadventa ELSE 0 END) \"124\",
            SUM(CASE WHEN fecharealventa IN ('$anio-12-05') THEN cantidadventa ELSE 0 END) \"125\",
            SUM(CASE WHEN fecharealventa IN ('$anio-12-01','$anio-12-02','$anio-12-03','$anio-12-04','$anio-12-05') THEN cantidadventa ELSE 0 END) \"126\",

            SUM(CASE WHEN fecharealventa>='$anio-01-01' AND fecharealventa<='$anio-12-05' THEN cantidadventa ELSE 0 END) \"TT\"
            from ventas 
            where idproducto=$idproducto
            and idbodega=$idtienda 
            ");
        $resultado = $this->db->arrayResult($consulta);
        $mes=1;
        $contador=1;
        for ($index = 0; $index < 72 ; $index++) {
            if($contador==7){
                $contador=1;
                $mes++;
            }
            $resultado2[$resultado["idproducto"]][$resultado["idtienda"]][$resultado["anio"]][$mes][$contador]=$resultado[$mes.$contador];
            $contador++;
        }
        $resultado2[$resultado["idproducto"]][$resultado["idtienda"]][$resultado["anio"]]["total"]=$resultado["TT"];
        return $resultado2;
    }
    
     public function traerSaldos($productos, $tiendas, $anio) {
        $arreglofinal = null;
        foreach ($productos as $key => $value) {
            foreach ($tiendas as $value2) {
                $total = 0;
                $idtienda = $value2[0];
                $idproducto = $key;                
                $arreglofinal[$idproducto][$idtienda]=$this->traersaldosXSemana2($idproducto, $idtienda, $anio);                            
            }
        }
        return $arreglofinal;
    }
    
    private function traersaldosXSemana2($idproducto, $idtienda, $anio) {
        $consulta = $this->db->executeQue("select $idproducto as idproducto, $idtienda as idtienda, $anio as anio,

            SUM(CASE WHEN fechasaldo IN ('$anio-01-01') THEN cantidad ELSE 0 END) \"11\",
            SUM(CASE WHEN fechasaldo IN ('$anio-01-02') THEN cantidad ELSE 0 END) \"12\",
            SUM(CASE WHEN fechasaldo IN ('$anio-01-03') THEN cantidad ELSE 0 END) \"13\",
            SUM(CASE WHEN fechasaldo IN ('$anio-01-04') THEN cantidad ELSE 0 END) \"14\",
            SUM(CASE WHEN fechasaldo IN ('$anio-01-05') THEN cantidad ELSE 0 END) \"15\",
            SUM(CASE WHEN fechasaldo IN ('$anio-01-01','$anio-01-02','$anio-01-03','2014-01-04','$anio-01-05') THEN cantidad ELSE 0 END) \"16\",

            SUM(CASE WHEN fechasaldo IN ('$anio-02-01') THEN cantidad ELSE 0 END) \"21\",
            SUM(CASE WHEN fechasaldo IN ('$anio-02-02') THEN cantidad ELSE 0 END) \"22\",
            SUM(CASE WHEN fechasaldo IN ('$anio-02-03') THEN cantidad ELSE 0 END) \"23\",
            SUM(CASE WHEN fechasaldo IN ('$anio-02-04') THEN cantidad ELSE 0 END) \"24\",
            SUM(CASE WHEN fechasaldo IN ('$anio-02-05') THEN cantidad ELSE 0 END) \"25\",
            SUM(CASE WHEN fechasaldo IN ('$anio-02-01','$anio-02-02','$anio-02-03','$anio-02-04','$anio-02-05') THEN cantidad ELSE 0 END) \"26\",

            SUM(CASE WHEN fechasaldo IN ('$anio-03-01') THEN cantidad ELSE 0 END) \"31\",
            SUM(CASE WHEN fechasaldo IN ('$anio-03-02') THEN cantidad ELSE 0 END) \"32\",
            SUM(CASE WHEN fechasaldo IN ('$anio-03-03') THEN cantidad ELSE 0 END) \"33\",
            SUM(CASE WHEN fechasaldo IN ('$anio-03-04') THEN cantidad ELSE 0 END) \"34\",
            SUM(CASE WHEN fechasaldo IN ('$anio-03-05') THEN cantidad ELSE 0 END) \"35\",
            SUM(CASE WHEN fechasaldo IN ('$anio-03-01','$anio-03-02','$anio-03-03','$anio-03-04','$anio-03-05') THEN cantidad ELSE 0 END) \"36\",

            SUM(CASE WHEN fechasaldo IN ('$anio-04-01') THEN cantidad ELSE 0 END) \"41\",
            SUM(CASE WHEN fechasaldo IN ('$anio-04-02') THEN cantidad ELSE 0 END) \"42\",
            SUM(CASE WHEN fechasaldo IN ('$anio-04-03') THEN cantidad ELSE 0 END) \"43\",
            SUM(CASE WHEN fechasaldo IN ('$anio-04-04') THEN cantidad ELSE 0 END) \"44\",
            SUM(CASE WHEN fechasaldo IN ('$anio-04-05') THEN cantidad ELSE 0 END) \"45\",
            SUM(CASE WHEN fechasaldo IN ('$anio-04-01','$anio-04-02','$anio-04-03','$anio-04-04','$anio-04-05') THEN cantidad ELSE 0 END) \"46\",

            SUM(CASE WHEN fechasaldo IN ('$anio-05-01') THEN cantidad ELSE 0 END) \"51\",
            SUM(CASE WHEN fechasaldo IN ('$anio-05-02') THEN cantidad ELSE 0 END) \"52\",
            SUM(CASE WHEN fechasaldo IN ('$anio-05-03') THEN cantidad ELSE 0 END) \"53\",
            SUM(CASE WHEN fechasaldo IN ('$anio-05-04') THEN cantidad ELSE 0 END) \"54\",
            SUM(CASE WHEN fechasaldo IN ('$anio-05-05') THEN cantidad ELSE 0 END) \"55\",
            SUM(CASE WHEN fechasaldo IN ('$anio-05-01','$anio-05-02','$anio-05-03','$anio-05-04','$anio-05-05') THEN cantidad ELSE 0 END) \"56\",

            SUM(CASE WHEN fechasaldo IN ('$anio-06-01') THEN cantidad ELSE 0 END) \"61\",
            SUM(CASE WHEN fechasaldo IN ('$anio-06-02') THEN cantidad ELSE 0 END) \"62\",
            SUM(CASE WHEN fechasaldo IN ('$anio-06-03') THEN cantidad ELSE 0 END) \"63\",
            SUM(CASE WHEN fechasaldo IN ('$anio-06-04') THEN cantidad ELSE 0 END) \"64\",
            SUM(CASE WHEN fechasaldo IN ('$anio-06-05') THEN cantidad ELSE 0 END) \"65\",
            SUM(CASE WHEN fechasaldo IN ('$anio-06-01','$anio-06-02','$anio-06-03','$anio-06-04','$anio-06-05') THEN cantidad ELSE 0 END) \"66\",

            SUM(CASE WHEN fechasaldo IN ('$anio-07-01') THEN cantidad ELSE 0 END) \"71\",
            SUM(CASE WHEN fechasaldo IN ('$anio-07-02') THEN cantidad ELSE 0 END) \"72\",
            SUM(CASE WHEN fechasaldo IN ('$anio-07-03') THEN cantidad ELSE 0 END) \"73\",
            SUM(CASE WHEN fechasaldo IN ('$anio-07-04') THEN cantidad ELSE 0 END) \"74\",
            SUM(CASE WHEN fechasaldo IN ('$anio-07-05') THEN cantidad ELSE 0 END) \"75\",
            SUM(CASE WHEN fechasaldo IN ('$anio-07-01','$anio-07-02','$anio-07-03','$anio-07-04','$anio-07-05') THEN cantidad ELSE 0 END) \"76\",

            SUM(CASE WHEN fechasaldo IN ('$anio-08-01') THEN cantidad ELSE 0 END) \"81\",
            SUM(CASE WHEN fechasaldo IN ('$anio-08-02') THEN cantidad ELSE 0 END) \"82\",
            SUM(CASE WHEN fechasaldo IN ('$anio-08-03') THEN cantidad ELSE 0 END) \"83\",
            SUM(CASE WHEN fechasaldo IN ('$anio-08-04') THEN cantidad ELSE 0 END) \"84\",
            SUM(CASE WHEN fechasaldo IN ('$anio-08-05') THEN cantidad ELSE 0 END) \"85\",
            SUM(CASE WHEN fechasaldo IN ('$anio-08-01','$anio-08-02','$anio-08-03','$anio-08-04','$anio-08-05') THEN cantidad ELSE 0 END) \"86\",

            SUM(CASE WHEN fechasaldo IN ('$anio-09-01') THEN cantidad ELSE 0 END) \"91\",
            SUM(CASE WHEN fechasaldo IN ('$anio-09-02') THEN cantidad ELSE 0 END) \"92\",
            SUM(CASE WHEN fechasaldo IN ('$anio-09-03') THEN cantidad ELSE 0 END) \"93\",
            SUM(CASE WHEN fechasaldo IN ('$anio-09-04') THEN cantidad ELSE 0 END) \"94\",
            SUM(CASE WHEN fechasaldo IN ('$anio-09-05') THEN cantidad ELSE 0 END) \"95\",
            SUM(CASE WHEN fechasaldo IN ('$anio-09-01','$anio-09-02','$anio-09-03','$anio-09-04','$anio-09-05') THEN cantidad ELSE 0 END) \"96\",

            SUM(CASE WHEN fechasaldo IN ('$anio-10-01') THEN cantidad ELSE 0 END) \"101\",
            SUM(CASE WHEN fechasaldo IN ('$anio-10-02') THEN cantidad ELSE 0 END) \"102\",
            SUM(CASE WHEN fechasaldo IN ('$anio-10-03') THEN cantidad ELSE 0 END) \"103\",
            SUM(CASE WHEN fechasaldo IN ('$anio-10-04') THEN cantidad ELSE 0 END) \"104\",
            SUM(CASE WHEN fechasaldo IN ('$anio-10-05') THEN cantidad ELSE 0 END) \"105\",
            SUM(CASE WHEN fechasaldo IN ('$anio-10-01','$anio-10-02','$anio-10-03','$anio-10-04','$anio-10-05') THEN cantidad ELSE 0 END) \"106\",

            SUM(CASE WHEN fechasaldo IN ('$anio-11-01') THEN cantidad ELSE 0 END) \"111\",
            SUM(CASE WHEN fechasaldo IN ('$anio-11-02') THEN cantidad ELSE 0 END) \"112\",
            SUM(CASE WHEN fechasaldo IN ('$anio-11-03') THEN cantidad ELSE 0 END) \"113\",
            SUM(CASE WHEN fechasaldo IN ('$anio-11-04') THEN cantidad ELSE 0 END) \"114\",
            SUM(CASE WHEN fechasaldo IN ('$anio-11-05') THEN cantidad ELSE 0 END) \"115\",
            SUM(CASE WHEN fechasaldo IN ('$anio-11-01','$anio-11-02','$anio-11-03','$anio-11-04','$anio-11-05') THEN cantidad ELSE 0 END) \"116\",

            SUM(CASE WHEN fechasaldo IN ('$anio-12-01') THEN cantidad ELSE 0 END) \"121\",
            SUM(CASE WHEN fechasaldo IN ('$anio-12-02') THEN cantidad ELSE 0 END) \"122\",
            SUM(CASE WHEN fechasaldo IN ('$anio-12-03') THEN cantidad ELSE 0 END) \"123\",
            SUM(CASE WHEN fechasaldo IN ('$anio-12-04') THEN cantidad ELSE 0 END) \"124\",
            SUM(CASE WHEN fechasaldo IN ('$anio-12-05') THEN cantidad ELSE 0 END) \"125\",
            SUM(CASE WHEN fechasaldo IN ('$anio-12-01','$anio-12-02','$anio-12-03','$anio-12-04','$anio-12-05') THEN cantidad ELSE 0 END) \"126\",

            SUM(CASE WHEN fechasaldo>='$anio-01-01' AND fechasaldo<='$anio-12-05' THEN cantidad ELSE 0 END) \"TT\"
            from saldoinventario 
            where idproducto=$idproducto
            and idbodega=$idtienda 
            ");
        $resultado = $this->db->arrayResult($consulta);
        $mes=1;
        $contador=1;
        for ($index = 0; $index < 72 ; $index++) {
            if($contador==7){
                $contador=1;
                $mes++;
            }
            $resultado2[$resultado["idproducto"]][$resultado["idtienda"]][$resultado["anio"]][$mes][$contador]=$resultado[$mes.$contador];
            $contador++;
        }
        $resultado2[$resultado["idproducto"]][$resultado["idtienda"]][$resultado["anio"]]["total"]=$resultado["TT"];        
        return $resultado2;
    }
    
    private function traerventasXSemana3($idproducto, $anio){
        $consulta = $this->db->executeQue("select $idproducto as idproducto, $anio as anio,

            SUM(CASE WHEN fecharealventa IN ('$anio-01-01') THEN cantidadventa ELSE 0 END) \"11\",
            SUM(CASE WHEN fecharealventa IN ('$anio-01-02') THEN cantidadventa ELSE 0 END) \"12\",
            SUM(CASE WHEN fecharealventa IN ('$anio-01-03') THEN cantidadventa ELSE 0 END) \"13\",
            SUM(CASE WHEN fecharealventa IN ('$anio-01-04') THEN cantidadventa ELSE 0 END) \"14\",
            SUM(CASE WHEN fecharealventa IN ('$anio-01-05') THEN cantidadventa ELSE 0 END) \"15\",
            SUM(CASE WHEN fecharealventa IN ('$anio-01-01','$anio-01-02','$anio-01-03','2014-01-04','$anio-01-05') THEN cantidadventa ELSE 0 END) \"16\",

            SUM(CASE WHEN fecharealventa IN ('$anio-02-01') THEN cantidadventa ELSE 0 END) \"21\",
            SUM(CASE WHEN fecharealventa IN ('$anio-02-02') THEN cantidadventa ELSE 0 END) \"22\",
            SUM(CASE WHEN fecharealventa IN ('$anio-02-03') THEN cantidadventa ELSE 0 END) \"23\",
            SUM(CASE WHEN fecharealventa IN ('$anio-02-04') THEN cantidadventa ELSE 0 END) \"24\",
            SUM(CASE WHEN fecharealventa IN ('$anio-02-05') THEN cantidadventa ELSE 0 END) \"25\",
            SUM(CASE WHEN fecharealventa IN ('$anio-02-01','$anio-02-02','$anio-02-03','$anio-02-04','$anio-02-05') THEN cantidadventa ELSE 0 END) \"26\",

            SUM(CASE WHEN fecharealventa IN ('$anio-03-01') THEN cantidadventa ELSE 0 END) \"31\",
            SUM(CASE WHEN fecharealventa IN ('$anio-03-02') THEN cantidadventa ELSE 0 END) \"32\",
            SUM(CASE WHEN fecharealventa IN ('$anio-03-03') THEN cantidadventa ELSE 0 END) \"33\",
            SUM(CASE WHEN fecharealventa IN ('$anio-03-04') THEN cantidadventa ELSE 0 END) \"34\",
            SUM(CASE WHEN fecharealventa IN ('$anio-03-05') THEN cantidadventa ELSE 0 END) \"35\",
            SUM(CASE WHEN fecharealventa IN ('$anio-03-01','$anio-03-02','$anio-03-03','$anio-03-04','$anio-03-05') THEN cantidadventa ELSE 0 END) \"36\",

            SUM(CASE WHEN fecharealventa IN ('$anio-04-01') THEN cantidadventa ELSE 0 END) \"41\",
            SUM(CASE WHEN fecharealventa IN ('$anio-04-02') THEN cantidadventa ELSE 0 END) \"42\",
            SUM(CASE WHEN fecharealventa IN ('$anio-04-03') THEN cantidadventa ELSE 0 END) \"43\",
            SUM(CASE WHEN fecharealventa IN ('$anio-04-04') THEN cantidadventa ELSE 0 END) \"44\",
            SUM(CASE WHEN fecharealventa IN ('$anio-04-05') THEN cantidadventa ELSE 0 END) \"45\",
            SUM(CASE WHEN fecharealventa IN ('$anio-04-01','$anio-04-02','$anio-04-03','$anio-04-04','$anio-04-05') THEN cantidadventa ELSE 0 END) \"46\",

            SUM(CASE WHEN fecharealventa IN ('$anio-05-01') THEN cantidadventa ELSE 0 END) \"51\",
            SUM(CASE WHEN fecharealventa IN ('$anio-05-02') THEN cantidadventa ELSE 0 END) \"52\",
            SUM(CASE WHEN fecharealventa IN ('$anio-05-03') THEN cantidadventa ELSE 0 END) \"53\",
            SUM(CASE WHEN fecharealventa IN ('$anio-05-04') THEN cantidadventa ELSE 0 END) \"54\",
            SUM(CASE WHEN fecharealventa IN ('$anio-05-05') THEN cantidadventa ELSE 0 END) \"55\",
            SUM(CASE WHEN fecharealventa IN ('$anio-05-01','$anio-05-02','$anio-05-03','$anio-05-04','$anio-05-05') THEN cantidadventa ELSE 0 END) \"56\",

            SUM(CASE WHEN fecharealventa IN ('$anio-06-01') THEN cantidadventa ELSE 0 END) \"61\",
            SUM(CASE WHEN fecharealventa IN ('$anio-06-02') THEN cantidadventa ELSE 0 END) \"62\",
            SUM(CASE WHEN fecharealventa IN ('$anio-06-03') THEN cantidadventa ELSE 0 END) \"63\",
            SUM(CASE WHEN fecharealventa IN ('$anio-06-04') THEN cantidadventa ELSE 0 END) \"64\",
            SUM(CASE WHEN fecharealventa IN ('$anio-06-05') THEN cantidadventa ELSE 0 END) \"65\",
            SUM(CASE WHEN fecharealventa IN ('$anio-06-01','$anio-06-02','$anio-06-03','$anio-06-04','$anio-06-05') THEN cantidadventa ELSE 0 END) \"66\",

            SUM(CASE WHEN fecharealventa IN ('$anio-07-01') THEN cantidadventa ELSE 0 END) \"71\",
            SUM(CASE WHEN fecharealventa IN ('$anio-07-02') THEN cantidadventa ELSE 0 END) \"72\",
            SUM(CASE WHEN fecharealventa IN ('$anio-07-03') THEN cantidadventa ELSE 0 END) \"73\",
            SUM(CASE WHEN fecharealventa IN ('$anio-07-04') THEN cantidadventa ELSE 0 END) \"74\",
            SUM(CASE WHEN fecharealventa IN ('$anio-07-05') THEN cantidadventa ELSE 0 END) \"75\",
            SUM(CASE WHEN fecharealventa IN ('$anio-07-01','$anio-07-02','$anio-07-03','$anio-07-04','$anio-07-05') THEN cantidadventa ELSE 0 END) \"76\",

            SUM(CASE WHEN fecharealventa IN ('$anio-08-01') THEN cantidadventa ELSE 0 END) \"81\",
            SUM(CASE WHEN fecharealventa IN ('$anio-08-02') THEN cantidadventa ELSE 0 END) \"82\",
            SUM(CASE WHEN fecharealventa IN ('$anio-08-03') THEN cantidadventa ELSE 0 END) \"83\",
            SUM(CASE WHEN fecharealventa IN ('$anio-08-04') THEN cantidadventa ELSE 0 END) \"84\",
            SUM(CASE WHEN fecharealventa IN ('$anio-08-05') THEN cantidadventa ELSE 0 END) \"85\",
            SUM(CASE WHEN fecharealventa IN ('$anio-08-01','$anio-08-02','$anio-08-03','$anio-08-04','$anio-08-05') THEN cantidadventa ELSE 0 END) \"86\",

            SUM(CASE WHEN fecharealventa IN ('$anio-09-01') THEN cantidadventa ELSE 0 END) \"91\",
            SUM(CASE WHEN fecharealventa IN ('$anio-09-02') THEN cantidadventa ELSE 0 END) \"92\",
            SUM(CASE WHEN fecharealventa IN ('$anio-09-03') THEN cantidadventa ELSE 0 END) \"93\",
            SUM(CASE WHEN fecharealventa IN ('$anio-09-04') THEN cantidadventa ELSE 0 END) \"94\",
            SUM(CASE WHEN fecharealventa IN ('$anio-09-05') THEN cantidadventa ELSE 0 END) \"95\",
            SUM(CASE WHEN fecharealventa IN ('$anio-09-01','$anio-09-02','$anio-09-03','$anio-09-04','$anio-09-05') THEN cantidadventa ELSE 0 END) \"96\",

            SUM(CASE WHEN fecharealventa IN ('$anio-10-01') THEN cantidadventa ELSE 0 END) \"101\",
            SUM(CASE WHEN fecharealventa IN ('$anio-10-02') THEN cantidadventa ELSE 0 END) \"102\",
            SUM(CASE WHEN fecharealventa IN ('$anio-10-03') THEN cantidadventa ELSE 0 END) \"103\",
            SUM(CASE WHEN fecharealventa IN ('$anio-10-04') THEN cantidadventa ELSE 0 END) \"104\",
            SUM(CASE WHEN fecharealventa IN ('$anio-10-05') THEN cantidadventa ELSE 0 END) \"105\",
            SUM(CASE WHEN fecharealventa IN ('$anio-10-01','$anio-10-02','$anio-10-03','$anio-10-04','$anio-10-05') THEN cantidadventa ELSE 0 END) \"106\",

            SUM(CASE WHEN fecharealventa IN ('$anio-11-01') THEN cantidadventa ELSE 0 END) \"111\",
            SUM(CASE WHEN fecharealventa IN ('$anio-11-02') THEN cantidadventa ELSE 0 END) \"112\",
            SUM(CASE WHEN fecharealventa IN ('$anio-11-03') THEN cantidadventa ELSE 0 END) \"113\",
            SUM(CASE WHEN fecharealventa IN ('$anio-11-04') THEN cantidadventa ELSE 0 END) \"114\",
            SUM(CASE WHEN fecharealventa IN ('$anio-11-05') THEN cantidadventa ELSE 0 END) \"115\",
            SUM(CASE WHEN fecharealventa IN ('$anio-11-01','$anio-11-02','$anio-11-03','$anio-11-04','$anio-11-05') THEN cantidadventa ELSE 0 END) \"116\",

            SUM(CASE WHEN fecharealventa IN ('$anio-12-01') THEN cantidadventa ELSE 0 END) \"121\",
            SUM(CASE WHEN fecharealventa IN ('$anio-12-02') THEN cantidadventa ELSE 0 END) \"122\",
            SUM(CASE WHEN fecharealventa IN ('$anio-12-03') THEN cantidadventa ELSE 0 END) \"123\",
            SUM(CASE WHEN fecharealventa IN ('$anio-12-04') THEN cantidadventa ELSE 0 END) \"124\",
            SUM(CASE WHEN fecharealventa IN ('$anio-12-05') THEN cantidadventa ELSE 0 END) \"125\",
            SUM(CASE WHEN fecharealventa IN ('$anio-12-01','$anio-12-02','$anio-12-03','$anio-12-04','$anio-12-05') THEN cantidadventa ELSE 0 END) \"126\",

            SUM(CASE WHEN fecharealventa>='$anio-01-01' AND fecharealventa<='$anio-12-05' THEN cantidadventa ELSE 0 END) \"TT\"
            from ventas 
            where idproducto=$idproducto");
        $resultado = $this->db->arrayResult($consulta);
        $mes=1;
        $contador=1;
        for ($index = 0; $index < 72 ; $index++) {
            if($contador==7){
                $contador=1;
                $mes++;
            }
            $resultado2[$resultado["idproducto"]][$resultado["anio"]][$mes][$contador]=$resultado[$mes.$contador];
            $contador++;
        }
        $resultado2[$resultado["idproducto"]][$resultado["anio"]]["total"]=$resultado["TT"];
        return $resultado2;
    }
    
    public function getPeriodos(){
        $consulta = $this->db->executeQue("select * from periodosventa order by anio desc");
        while ($row = $this->db->arrayResult($consulta)) {
            $anios[] = $row['anio'];
        }
        return $anios;
    }
    
    public function traerVentasComparativasSemanaProducto($productos, $tiendas, $anioini, $aniofin, $mesini, $mesfin, $semanaini, $semanafin) {
        $arreglofinal = null;             
        foreach ($productos as $key => $value) {
            foreach ($tiendas as $value2) {                
                $idtienda = $value2[0];
                $consulta = $this->db->executeQue("select SUM(cantidadventa) as total
                from ventas 
                where idproducto=$key
                and idbodega=$idtienda 
                and fecharealventa='$anioini-$mesini-$semanaini'");
                $row = $this->db->arrayResult($consulta);
                $suma2 = $row['total']==""?0:$row['total'];                             
                $arreglofinal[1][$key][$idtienda] = $suma2; 
                
                
                $consulta3 = $this->db->executeQue("select SUM(cantidadventa) as total
                from ventas 
                where idproducto=$key
                and idbodega=$idtienda 
                and fecharealventa>='$anioini-01-01'
                and fecharealventa<='$anioini-$mesini-$semanaini'");
                $row3 = $this->db->arrayResult($consulta3);
                $suma3 = $row3['total']==""?0:$row3['total'];                             
                $arreglofinal[2][$key][$idtienda] = $suma3; 
                
                $consulta2 = $this->db->executeQue("select SUM(cantidadventa) as total
                from ventas 
                where idproducto=$key
                and idbodega=$idtienda 
                and fecharealventa='$aniofin-$mesfin-$semanafin'");     
                $row2 = $this->db->arrayResult($consulta2);
                $suma = $row2['total']==""?0:$row2['total'];                             
                $arreglofinal[0][$key][$idtienda] = $suma; 
                
                $consulta4 = $this->db->executeQue("select SUM(cantidadventa) as total
                from ventas 
                where idproducto=$key
                and idbodega=$idtienda 
                and fecharealventa>='$aniofin-01-01'
                and fecharealventa<='$aniofin-$mesfin-$semanafin'");     
                $row4 = $this->db->arrayResult($consulta4);
                $suma4 = $row4['total']==""?0:$row4['total'];                             
                $arreglofinal[3][$key][$idtienda] = $suma4;    
                
            }
        }
        return $arreglofinal;
    }
    
     public function traerVentasComparativasMesProducto($productos, $tiendas, $anioini, $aniofin, $mesini, $mesfin, $semanaini, $semanafin) {
        $arreglofinal = null;     
        
        $fecha = new DateTime("$anioini-$mesini-10");
        $fecha->modify('last day of this month');
        $dia1=$fecha->format('Y-m-d'); 
        
        $fecha2 = new DateTime("$aniofin-$mesfin-10");
        $fecha2->modify('last day of this month');
        $dia2=$fecha2->format('Y-m-d');
        
        foreach ($productos as $key => $value) {
            foreach ($tiendas as $value2) {                
                $idtienda = $value2[0];
                $consulta = $this->db->executeQue("select SUM(cantidadventa) as total
                from ventas 
                where idproducto=$key
                and idbodega=$idtienda 
                and fecharealventa>='$anioini-$mesini-01'
                and fecharealventa<='$dia1'");
                $row = $this->db->arrayResult($consulta);
                $suma2 = $row['total']==""?0:$row['total'];                             
                $arreglofinal[1][$key][$idtienda] = $suma2; 
                
                
                $consulta3 = $this->db->executeQue("select SUM(cantidadventa) as total
                from ventas 
                where idproducto=$key
                and idbodega=$idtienda 
                and fecharealventa>='$anioini-01-01'
                and fecharealventa<='$dia1'");
                $row3 = $this->db->arrayResult($consulta3);
                $suma3 = $row3['total']==""?0:$row3['total'];                             
                $arreglofinal[2][$key][$idtienda] = $suma3; 
                
                $consulta2 = $this->db->executeQue("select SUM(cantidadventa) as total
                from ventas 
                where idproducto=$key
                and idbodega=$idtienda 
                and fecharealventa>='$aniofin-$mesfin-01'
                and fecharealventa<='$dia2'");     
                $row2 = $this->db->arrayResult($consulta2);
                $suma = $row2['total']==""?0:$row2['total'];                             
                $arreglofinal[0][$key][$idtienda] = $suma; 
                
                $consulta4 = $this->db->executeQue("select SUM(cantidadventa) as total
                from ventas 
                where idproducto=$key
                and idbodega=$idtienda 
                and fecharealventa>='$aniofin-01-01'
                and fecharealventa<='$dia2'");     
                $row4 = $this->db->arrayResult($consulta4);
                $suma4 = $row4['total']==""?0:$row4['total'];                             
                $arreglofinal[3][$key][$idtienda] = $suma4;    
                
            }
        }
        return $arreglofinal;
    }
    
    public function traerVentasComparativasSemanaCategoria($categorias, $tiendas, $anioini, $aniofin, $mesini, $mesfin, $semanaini, $semanafin) {
        $arreglofinal = null;             
        foreach ($categorias as $key => $value) {
            foreach ($tiendas as $value2) {                
                $idtienda = $value2[0];
                $consulta = $this->db->executeQue("select SUM(cantidadventa) as total
                from ventas 
                where idproducto in (select idproducto from productos where idcategoria=$key)
                and idbodega=$idtienda 
                and fecharealventa='$anioini-$mesini-$semanaini'");
                $row = $this->db->arrayResult($consulta);
                $suma2 = $row['total']==""?0:$row['total'];                             
                $arreglofinal[1][$key][$idtienda] = $suma2; 
                
                
                $consulta3 = $this->db->executeQue("select SUM(cantidadventa) as total
                from ventas 
                where idproducto in (select idproducto from productos where idcategoria=$key)
                and idbodega=$idtienda 
                and fecharealventa>='$anioini-01-01'
                and fecharealventa<='$anioini-$mesini-$semanaini'");
                $row3 = $this->db->arrayResult($consulta3);
                $suma3 = $row3['total']==""?0:$row3['total'];                             
                $arreglofinal[2][$key][$idtienda] = $suma3; 
                
                $consulta2 = $this->db->executeQue("select SUM(cantidadventa) as total
                from ventas 
                where idproducto in (select idproducto from productos where idcategoria=$key)
                and idbodega=$idtienda 
                and fecharealventa='$aniofin-$mesfin-$semanafin'");     
                $row2 = $this->db->arrayResult($consulta2);
                $suma = $row2['total']==""?0:$row2['total'];                             
                $arreglofinal[0][$key][$idtienda] = $suma; 
                
                $consulta4 = $this->db->executeQue("select SUM(cantidadventa) as total
                from ventas 
                where idproducto in (select idproducto from productos where idcategoria=$key)
                and idbodega=$idtienda 
                and fecharealventa>='$aniofin-01-01'
                and fecharealventa<='$aniofin-$mesfin-$semanafin'");     
                $row4 = $this->db->arrayResult($consulta4);
                $suma4 = $row4['total']==""?0:$row4['total'];                             
                $arreglofinal[3][$key][$idtienda] = $suma4;    
                
            }
        }
        return $arreglofinal;
    }
    
    public function traerVentasComparativasMesCategoria($categorias, $tiendas, $anioini, $aniofin, $mesini, $mesfin, $semanaini, $semanafin) {
        $arreglofinal = null;     
        
        $fecha = new DateTime("$anioini-$mesini-10");
        $fecha->modify('last day of this month');
        $dia1=$fecha->format('Y-m-d'); 
        
        $fecha2 = new DateTime("$aniofin-$mesfin-10");
        $fecha2->modify('last day of this month');
        $dia2=$fecha2->format('Y-m-d');
        
        foreach ($categorias as $key => $value) {
            foreach ($tiendas as $value2) {                
                $idtienda = $value2[0];
                $consulta = $this->db->executeQue("select SUM(cantidadventa) as total
                from ventas 
                where idproducto in (select idproducto from productos where idcategoria=$key)
                and idbodega=$idtienda 
                and fecharealventa>='$anioini-$mesini-01'
                and fecharealventa<='$dia1'");
                $row = $this->db->arrayResult($consulta);
                $suma2 = $row['total']==""?0:$row['total'];                             
                $arreglofinal[1][$key][$idtienda] = $suma2; 
                
                
                $consulta3 = $this->db->executeQue("select SUM(cantidadventa) as total
                from ventas 
                where idproducto in (select idproducto from productos where idcategoria=$key)
                and idbodega=$idtienda 
                and fecharealventa>='$anioini-01-01'
                and fecharealventa<='$dia1'");
                $row3 = $this->db->arrayResult($consulta3);
                $suma3 = $row3['total']==""?0:$row3['total'];                             
                $arreglofinal[2][$key][$idtienda] = $suma3; 
                
                $consulta2 = $this->db->executeQue("select SUM(cantidadventa) as total
                from ventas 
                where idproducto in (select idproducto from productos where idcategoria=$key)
                and idbodega=$idtienda 
                and fecharealventa>='$aniofin-$mesfin-01'
                and fecharealventa<='$dia2'");     
                $row2 = $this->db->arrayResult($consulta2);
                $suma = $row2['total']==""?0:$row2['total'];                             
                $arreglofinal[0][$key][$idtienda] = $suma; 
                
                $consulta4 = $this->db->executeQue("select SUM(cantidadventa) as total
                from ventas 
                where idproducto in (select idproducto from productos where idcategoria=$key)
                and idbodega=$idtienda 
                and fecharealventa>='$aniofin-01-01'
                and fecharealventa<='$dia2'");     
                $row4 = $this->db->arrayResult($consulta4);
                $suma4 = $row4['total']==""?0:$row4['total'];                             
                $arreglofinal[3][$key][$idtienda] = $suma4;    
                
            }
        }
        return $arreglofinal;
    }
    
}

?>