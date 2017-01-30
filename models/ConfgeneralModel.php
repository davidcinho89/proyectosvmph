<?php

defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');

class ConfgeneralModel extends ModelBase {

    public function getData() {
        $query = "select * from empresa";
        $consulta = $this->db->executeQue($query);
        $empresa;
        $row = $this->db->arrayResult($consulta);
        $empresa = array('id' => $row['idempresa'],
            'nombreempresa' => $row['nombreempresa'],
            'nitempresa' => $row['nitempresa'],
            'emailempresa' => $row['emailempresa'],
            'telefono' => $row['telefono'],
            'direccionempresa' => $row['direccionempresa'],
            'ciudadempresa' => $row['ciudadempresa'],
            'contactoempresa' => $row['contactoempresa'],
            'logoempresa' => $row['logoempresa'],
            'sloganempresa' => $row['sloganempresa'],
            'regimen' => $row['regimenempresa'],
            'actividadempresa' => $row['actividadempresa'],
            'dominioempresa' => $row['dominnioempresa']);
        return $empresa;
    }

    public function getSelectDepartamentos() {
        $consulta = $this->db->executeQue('select * from departamentos order by nombredepartamento');
        $total = $this->db->numRows($consulta);
        $tagselect = "<select name='departamentos' id='departamentos'>";
        if ($total > 0) {
            while ($row = $this->db->arrayResult($consulta)) {
                $nombre_departamento = $row['nombredepartamento'];
                $id_departamento = $row['iddepartamento'];
                $tagselect.="<option value='" . $id_departamento . "'>" . $nombre_departamento . "</option>";
            }
        }
        $tagselect.="</select>";
        return $tagselect;
    }

    private function getFirstDepartamentoId() {
        $consulta = $this->db->executeQue('select * from departamentos order by nombredepartamento limit 1');
        $total = $this->db->numRows($consulta);
        if ($total > 0) {
            while ($row = $this->db->arrayResult($consulta)) {
                $id_departamento = $row['iddepartamento'];
                return $id_departamento;
            }
        }
    }

    public function getSelectCiudades($iddepartamento = 0) {
        if ($iddepartamento == 0) {
            $iddepartamento = $this->getFirstDepartamentoId();
        }
        $consulta = $this->db->executeQue('select * from ciudades where iddepartamento=' . $iddepartamento . ' order by nombreciudad');
        $total = $this->db->numRows($consulta);

        $tagselect = "<select id='ciudades' name='ciudades'>";
        if ($total > 0) {
            while ($row = $this->db->arrayResult($consulta)) {
                $nombre_ciudad = $row['nombreciudad'];
                $id_ciudad = $row['idciudad'];
                $tagselect.="<option value='" . $id_ciudad . "'>" . $nombre_ciudad . "</option>";
            }
        }
        $tagselect.="</select>";
        return $tagselect;
    }

    public function getChangeCiudades() {
        $iddepart = $_GET['departamento'];
        $ciudadesNew = $this->getSelectCiudades($iddepart);
        return $ciudadesNew;
    }

    public function traerDepto($idciudad) {
        $consulta = $this->db->executeQue("select * from ciudades  where idciudad=$idciudad");
        while ($row = $this->db->arrayResult($consulta)) {
            $iddepartamento = $row['iddepartamento'];
            return $iddepartamento;
        }
    }

    public function getCiudadActual() {
        $query = "select ciudadempresa from empresa";
        $consulta = $this->db->executeQue($query);
        $ciudad;
        $row = $this->db->arrayResult($consulta);
        $ciudad = array('id' => $row['idempresa'],
            'ciudad' => $row['ciudadempresa']);
        return $ciudad;
    }

    public function updateData($idempresa) {
        $nombre = trim($_POST["nombre"]);
        $nit = trim($_POST["nit"]);
        $email = $_POST["email"];
        $direccion = trim($_POST["direccion"]);
        $ciudad = $_POST["ciudades"];
        $contacto = $_POST["contacto"];
        //$logo = $_POST["logo"]; 
        $slogan = $_POST["slogan"];
        $regimen = $_POST["regimen"];
        $actividad = $_POST["actividad"];
        $dominio = $_POST["dominio"];
        $telefono = $_POST["telefono"];
        if ($this->db->executeQue("update empresa
                set nombreempresa = '$nombre',
                nitempresa = '$nit',
                emailempresa='$email',
                direccionempresa='$direccion',
                ciudadempresa=$ciudad, 
                contactoempresa='$contacto', 
                sloganempresa='$slogan' ,
                regimenempresa='$regimen' ,
                actividadempresa='$actividad', 
                dominnioempresa='$dominio',    
                telefono='$telefono'")) {
            echo json_encode(array("respuesta" => "si"));
        } else {
            echo json_encode(array("respuesta" => "no"));
        }
    }

    public function uploadPicture() {
        if ($_FILES["pic"]["size"] != 0) {
            $destino = $_FILES["pic"]["name"];
            copy($_FILES["pic"]["tmp_name"], $destino);
            $imagen = new Imagen($destino);
            $imagen->redimencionMaximum(200, 75);
            $namefile = time();
            $url_new = $imagen->guardar(IMAGES . SL . "images_shop" . SL . time(), 80, true);
            unlink($destino);
            // $idquery = "select nextval('imagenes_idimagen_seq'::regclass) from imagenes limit 1";
            // $consult = $this->db->executeQue($idquery);
            //$idproducto = 0;
            // while ($row = $this->db->arrayResult($consult)) {
            //     $idproducto = $row['nextval'];
            //  }

            $query = "update empresa set 
                      logoempresa = '$url_new'";

            $consult = $this->db->executeQue($query);

            if (isset($_POST['versioning'])) {
                echo "<script> function terminarfin2(){ $('#nonemig',window.parent.document).html('<img title=\"Logo empresa\"  alt=\"plentiful\" src=\"" .
                $url_new . "\" /><input type=\"hidden\" name=\"imagen\" value=\"" . $idproducto . "\"/>');" .
                "parent.message('Imagen subida con exito', 'images/iconos_alerta/ok.png');" .
                "parent.$.fancybox.close();}setTimeout('terminarfin2()','300');</script>";
            } else {
                echo json_encode(array('status' => 'ok',
                    'newurl' => $url_new,
                    'idprod' => $idproducto));
            }
        }
    }

}

?>
