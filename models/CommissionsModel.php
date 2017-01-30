<?php

defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');

require ('classes/commisiontree.php');
require ('classes/comosionReport.php');

class CommissionsModel extends ModelBase {

    public function generateTree($idperiodo) {
        $mi_arbol = new Arbol();
        $mi_arbol2 = new Arbol();
        $mi_arbol3 = new Arbol();
        $mi_arbol4 = new Arbol();
        $mi_arbol5 = new Arbol();
        $mi_arbol6 = new Arbol();
        $comisiones;
        $result = $this->db->executeQue("select * from usuarios where idestado=2");
        while ($row = $this->db->arrayResult($result)) {
            $fecha2 = date("Y-m-d H:i:s");
            $id2 = $this->getIdSecuencia("nextval('comisiones_idcomision_seq'::regclass)");
            $this->db->executeQue("insert into comisiones values($id2,$idperiodo," . $row["idusuario"] . ",0,NULL,'$fecha2')");
            if ($mi_arbol->getPuntos($row["idusuario"], $idperiodo) >= $this->config->get('minpoints')) {
                $mi_arbol->meRecovery2($row["idusuario"], $idperiodo);
                $mi_arbol->arbol2($row["idusuario"], $idperiodo);
                $sum = 0;
                foreach ($mi_arbol->getRaiz() as $value) {
                    $id = $this->getIdSecuencia("nextval('detallecomisiones_iddetallecomision_seq'::regclass)");
                    $this->db->executeQue("insert into detallecomisiones values($id,0," . $value["code"] . "," . $value["valor"] . ",$id2)");
                    $sum+=$value["valor"];
                }
                foreach ($mi_arbol->getArbol() as $value) {
                    $id = $this->getIdSecuencia("nextval('detallecomisiones_iddetallecomision_seq'::regclass)");
                    $this->db->executeQue("insert into detallecomisiones values($id,1," . $value["code"] . "," . $value["valor"] . ",$id2)");
                    $sum+=$value["valor"];
                }
                foreach ($mi_arbol->getArbol2() as $value) {
                    $id = $this->getIdSecuencia("nextval('detallecomisiones_iddetallecomision_seq'::regclass)");
                    $this->db->executeQue("insert into detallecomisiones values($id,2," . $value["code"] . "," . $value["valor"] . ",$id2)");
                    $sum+=$value["valor"];
                }
                foreach ($mi_arbol->getArbol3() as $value) {
                    $id = $this->getIdSecuencia("nextval('detallecomisiones_iddetallecomision_seq'::regclass)");
                    $this->db->executeQue("insert into detallecomisiones values($id,3," . $value["code"] . "," . $value["valor"] . ",$id2)");
                    $sum+=$value["valor"];
                }
                foreach ($mi_arbol->getArboln() as $value) {
                    $id = $this->getIdSecuencia("nextval('detallecomisiones_iddetallecomision_seq'::regclass)");
                    $this->db->executeQue("insert into detallecomisiones values($id,4," . $value["code"] . "," . $value["valor"] . ",$id2)");
                    $sum+=$value["valor"];
                }
                $this->db->executeQue("update comisiones set valortotal=$sum where idcomision=$id2");
            }
        }
    }

    public function getTree($idUser) {
        $mi_arbol = new Arbol();
        $mi_arbol2 = new Arbol();
        $mi_arbol3 = new Arbol();
        $mi_arbol4 = new Arbol();
        $mi_arbol5 = new Arbol();
        $mi_arbol6 = new Arbol();

        $comisiones;
        /*
          // echo 'Febrero</br>Mis puntos: ' . $mi_arbol->getPuntos($idUser, 1) . '</br>';
          if ($mi_arbol->getPuntos($idUser, 1) >= 120) {

          $mi_arbol->meRecovery($idUser, 1);
          $mi_arbol->arbol($idUser, 1);


          $sum = 0;
          foreach ($mi_arbol->getRaiz() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol->getArbol() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol->getArbol2() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol->getArbol3() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol->getArboln() as $value) {
          $sum+=$value["valor"];
          }
          $comisiones["Febrero 2012"] = array($sum, $mi_arbol->getPuntos($idUser, 1), 1);
          } else {
          $comisiones["Febrero 2012"] = array(0, $mi_arbol->getPuntos($idUser, 1), 1);
          }

          //echo '</br></br>Marzo</br>Mis puntos: ' . $mi_arbol->getPuntos($idUser, 2) . '</br>';
          if ($mi_arbol2->getPuntos($idUser, 2) > 120) {

          $mi_arbol2->meRecovery($idUser, 2);
          $mi_arbol2->arbol($idUser, 2);

          $sum = 0;
          foreach ($mi_arbol2->getRaiz() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol2->getArbol() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol2->getArbol2() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol2->getArbol3() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol2->getArboln() as $value) {
          $sum+=$value["valor"];
          }
          $comisiones["Marzo 2012"] = array($sum, $mi_arbol2->getPuntos($idUser, 2), 2);
          } else {
          $comisiones["Marzo 2012"] = array(0, $mi_arbol2->getPuntos($idUser, 2), 2);
          }

          if ($mi_arbol3->getPuntos($idUser, 4) > 120) {

          $mi_arbol3->meRecovery($idUser, 4);
          $mi_arbol3->arbol($idUser, 4);

          $sum = 0;
          foreach ($mi_arbol3->getRaiz() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol3->getArbol() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol3->getArbol2() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol3->getArbol3() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol3->getArboln() as $value) {
          $sum+=$value["valor"];
          }
          $comisiones["Abril 2012"] = array($sum, $mi_arbol3->getPuntos($idUser, 4), 4);
          } else {
          $comisiones["Abril 2012"] = array(0, $mi_arbol3->getPuntos($idUser, 4), 4);
          }

          if ($mi_arbol4->getPuntos($idUser, 5) > 120) {

          $mi_arbol4->meRecovery($idUser, 5);
          $mi_arbol4->arbol($idUser, 5);

          $sum = 0;
          foreach ($mi_arbol4->getRaiz() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol4->getArbol() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol4->getArbol2() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol4->getArbol3() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol4->getArboln() as $value) {
          $sum+=$value["valor"];
          }
          $comisiones["Mayo 2012"] = array($sum, $mi_arbol4->getPuntos($idUser, 5), 5);
          } else {
          $comisiones["Mayo 2012"] = array(0, $mi_arbol4->getPuntos($idUser, 5), 5);
          }

          if ($mi_arbol5->getPuntos($idUser, 6) > 120) {

          $mi_arbol5->meRecovery($idUser, 6);
          $mi_arbol5->arbol($idUser, 6);

          $sum = 0;
          foreach ($mi_arbol5->getRaiz() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol5->getArbol() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol5->getArbol2() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol5->getArbol3() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol5->getArboln() as $value) {
          $sum+=$value["valor"];
          }
          $comisiones["Junio 2012"] = array($sum, $mi_arbol5->getPuntos($idUser, 6), 6);
          } else {
          $comisiones["Junio 2012"] = array(0, $mi_arbol5->getPuntos($idUser, 6), 6);
          }

          if ($mi_arbol6->getPuntos($idUser, 7) > 120) {

          $mi_arbol6->meRecovery($idUser, 7);
          $mi_arbol6->arbol($idUser, 7);

          $sum = 0;
          foreach ($mi_arbol6->getRaiz() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol6->getArbol() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol6->getArbol2() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol6->getArbol3() as $value) {
          $sum+=$value["valor"];
          }
          foreach ($mi_arbol6->getArboln() as $value) {
          $sum+=$value["valor"];
          }
          $comisiones["Julio 2012"] = array($sum, $mi_arbol6->getPuntos($idUser, 7), 7);
          } else {
          $comisiones["Julio 2012"] = array(0, $mi_arbol6->getPuntos($idUser, 7), 7);
          }
         * */
        return $comisiones;
    }

    function comLevel0($periodo, $iduser) {

        $mi_arbol4 = new Arbol();
        $mi_arbol4->meRecovery($iduser, $periodo);
        $sum = 0;
        foreach ($mi_arbol4->getRaiz() as $value) {
            $sum+=$value["valor"];
        }
        return $sum;
    }

    function comLevel1($periodo, $iduser) {
        $mi_arbol5 = new Arbol();
        $mi_arbol5->arbol($iduser, $periodo);
        $sum = 0;
        foreach ($mi_arbol5->getArbol() as $value) {
            $sum+=$value["valor"];
        }
        return $sum;
    }

    function comLevel2($periodo, $iduser) {
        $mi_arbol6 = new Arbol();
        $mi_arbol6->arbol($iduser, $periodo);
        $sum = 0;
        foreach ($mi_arbol6->getArbol2() as $value) {
            $sum+=$value["valor"];
        }
        return $sum;
    }

    function comLevel3($periodo, $iduser) {
        $mi_arbol7 = new Arbol();
        $mi_arbol7->arbol($iduser, $periodo);
        $sum = 0;
        foreach ($mi_arbol7->getArbol3() as $value) {
            $sum+=$value["valor"];
        }
        return $sum;
    }

    function comLevel4($periodo, $iduser) {
        $mi_arbol8 = new Arbol();
        $mi_arbol8->arbol($iduser, $periodo);
        $sum = 0;
        foreach ($mi_arbol8->getArboln() as $value) {
            $sum+=$value["valor"];
        }
        return $sum;
    }

    public function getReporte($nombre, $idUser) {
        $mi_arbol = new Red();
        $mi_arbol2 = new Red();
        $mi_arbol3 = new Red();
        echo '<strong>Liquidacion de comisiones del usuario ' . $nombre . ' (' . $idUser . ')</strong></br></br>';
        echo 'Febrero</br>Mis puntos: ' . number_format($mi_arbol->getPuntos($idUser, 1), 2, ',', '.') . '</br>';
        if ($mi_arbol->getPuntos($idUser, 1) > 120) {
            $mi_arbol->meRecovery($idUser, 1);
            $mi_arbol->arbol($idUser, 1);
        } else {
            
        }

        echo '</br></br>Marzo</br>Mis puntos: ' . number_format($mi_arbol->getPuntos($idUser, 2), 2, ',', '.') . '</br>';
        if ($mi_arbol2->getPuntos($idUser, 2) > 120) {
            $mi_arbol2->meRecovery($idUser, 2);
            $mi_arbol2->arbol($idUser, 2);
        } else {
            
        }
        echo '</br></br>Abril</br>Mis puntos: ' . number_format($mi_arbol->getPuntos($idUser, 4), 2, ',', '.') . '</br>';
        if ($mi_arbol3->getPuntos($idUser, 4) > 120) {
            $mi_arbol3->meRecovery($idUser, 4);
            $mi_arbol3->arbol($idUser, 4);
        } else {
            
        }

        echo '</br></br>Mayo</br>Mis puntos: ' . number_format($mi_arbol->getPuntos($idUser, 5), 2, ',', '.') . '</br>';
        if ($mi_arbol3->getPuntos($idUser, 5) > 120) {
            $mi_arbol3->meRecovery($idUser, 5);
            $mi_arbol3->arbol($idUser, 5);
        } else {
            
        }
    }

    public function getAvailablePeriods() {
        $fecha = explode("-", date('Y-m-d', strtotime("-1 month")));
        $ultimoDia = $this->getUltimoDiaMes($fecha[0], $fecha[1]);
        $fechacomparar = $fecha[0] . "-" . $fecha[1] . "-" . $ultimoDia;
        $result = $this->db->executeQue("select p.idperiodo, p.nombreperiodo
                                            from periodos p
                                            where p.fechafin<='$fechacomparar'
                                            and p.idperiodo not in((select DISTINCT idperiodo from comisiones))");
        while ($row = $this->db->arrayResult($result)) {
            $periodos[] = array("id" => $row["idperiodo"], "nombre" => $row["nombreperiodo"]);
        }
        return $periodos;
    }

    public function getComissionsGenerated() {
        $result = $this->db->executeQue("select DISTINCT cc.idperiodo, p.nombreperiodo,cc.idcomision,(select sum(valortotal) from comisiones where cc.idperiodo=idperiodo) as total, cc.fechacomision, cc.nousers
            from comisiones cc left join periodos p on p.idperiodo=cc.idperiodo order by cc.idperiodo desc");
        while ($row = $this->db->arrayResult($result)) {
            $comisiones[$row["idperiodo"]] = array("id" => $row["idcomision"],
                "total" => $row["total"],
                "nouser" => $row["noUsers"],
                "fecha" => $row["fechacomision"],
                "nombre" => $row["nombreperiodo"]);
        }
        return $comisiones;
    }

    private function getUltimoDiaMes($elAnio, $elMes) {
        return date("d", (mktime(0, 0, 0, $elMes + 1, 1, $elAnio) - 1));
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

    public function getComissionsAll($periodo) {
        $result = $this->db->executeQue("select * from comisiones c, usuarios u where c.idperiodo=$periodo and c.idusuario=u.idusuario");
        while ($row = $this->db->arrayResult($result)) {
            $comisiones[] = array("codigo" => $row['idusuario'],
                "nombre" => $row['nombreusuario'],
                "total" => $row['valortotal'],
                "cedula" => $row['cedula']);
        }
        return $comisiones;
    }

    public function getPeriodoName($periodo) {
        $result = $this->db->executeQue("select nombreperiodo from periodos where idperiodo=$periodo");
        $row = $this->db->arrayResult($result);
        $periodoname = $row['nombreperiodo'];
        return $periodoname;
    }
    
    public function getMyComissions($user) {
        $result = $this->db->executeQue("select * from comisiones c, periodos p where c.idusuario=$user and c.idperiodo=p.idperiodo");
        while ($row = $this->db->arrayResult($result)) {
            $comisiones[] = array("id" => $row['idcomision'],
                "fecha" => $row['fechacomision'],
                "nombre" => $row['nombreperiodo'],
                "total" => $row['valortotal']);
        }
        return $comisiones;
    }

}

?>
