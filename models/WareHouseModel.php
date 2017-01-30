<?php

defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');

class WareHouseModel extends ModelBase {

    public function getWareHouse(){          
        $consulta = $this->db->executeQue("SELECT b.bodegaid, b.nombrebodega, b.direccionbodega, b.codigobodega,
            (select t.nombretercero from terceros t where t.idtercero=b.idtercero) as cliente
            from bodegas b 
            order by nombrebodega asc");        
        while ($row = $this->db->arrayResult($consulta)) {                        
            $bodegas[] = array('id' => $row['bodegaid'],
                'nombre' => $row['nombrebodega'],
                'direccion' => $row['direccionbodega'],
                'codigo' => $row['codigobodega'],
                'cliente' => $row['cliente']);            
        }
        return $bodegas;
    }

    public function getWareHousebyId() {
        $idbodega = $_GET['idware'];        
        $consulta = $this->db->executeQue("SELECT * from bodegas where bodegaid=$idbodega");        
        $row = $this->db->arrayResult($consulta);          
        $consulta2 = $this->db->executeQue("SELECT nombretercero from terceros where idtercero=".$row['idtercero']);
        $row2 = $this->db->arrayResult($consulta2);          
            $bodega = array('id' => $row['bodegaid'],
                'nombre' => $row['nombrebodega'],
                'direccion' => $row['direccionbodega'],                
                'email' => $row['emailbodega'],
                'telefono' => $row['telefonobodega'],
                'contacto' => $row['contactobodega'],
                'codigo' => $row['codigobodega'],
                'nombrecliente' => $row2['nombretercero'],
                'idcliente' => $row['idtercero']);        
        return $bodega;
    }

    public function getPerfiles() {
        $query = "SELECT * from perfiles order by nombreperfil asc";
        $consulta = $this->db->executeQue($query);
        $perfiles= array();
        while ($row = $this->db->arrayResult($consulta)) {
             if ($row['grupo'] != 'Vinculado' && $row['grupo'] != 'No vinculado' && $row['grupo'] != 'Superadministrador') {
                $perfiles[] = array('id' => $row['idperfil'],
                    'nombre' => $row['nombreperfil'],
                    'grupo' => $row['grupo']);
            }
        }
        return $perfiles;
    }

    public function getUsuarios($idperfil) {
        $query = "SELECT * from usuarios where perfil=$idperfil and idbodega is NULL";
        $consulta = $this->db->executeQue($query);
        $usuarios= array();
        while ($row = $this->db->arrayResult($consulta)) {
            $usuarios[] = array('id' => $row['idusuario'],
                'nombre' => $row['nombreusuario']);
        }
        return $usuarios;
    }

    public function getUserWareHouse() {
        $idbodega = $_GET['idware'];
        $query = "SELECT u.idusuario, u.nombreusuario, p.nombreperfil, p.grupo
                    from usuarios u, perfiles p 
                    where u.idbodega=$idbodega and p.idperfil=u.perfil and p.grupo not in ('No vinculado', 'Vinculado')";
        $consulta = $this->db->executeQue($query);
        $bodegas;
        while ($row = $this->db->arrayResult($consulta)) {
            $bodegas[] = array('id' => $row['idusuario'],
                'nombre' => $row['nombreusuario'],
                'perfil' => $row['nombreperfil']);
        }
        return $bodegas;
    }

    public function editWareHouse() {
        $query = "SELECT * from bodegas order by nombrebodega asc";
        $consulta = $this->db->executeQue($query);        
        while ($row = $this->db->arrayResult($consulta)) {
            $bodegas[] = array('id' => $row['bodegaid'],
                'nombre' => $row['nombrebodega'],
                'direccion' => $row['direccionbodega']);
        }
        return $bodegas;
    }

    public function createWareHouse() {
        $nombre = strtoupper(trim($_POST["nombrebodega"]));
        $codigo = strtoupper(trim($_POST["codigobodega"]));
        $idtercero = trim($_POST["idproveedor"]);
        $direccion = strtoupper(trim($_POST["direccion"])); 
        $email = trim($_POST["email"])!=""?"'".trim($_POST["email"])."'":"NULL";
        $telefono = trim($_POST["phone"])!=""?"".trim($_POST["phone"])."":"NULL";
        $contacto = trim($_POST["namecontact"])!=""?"'".trim($_POST["namecontact"])."'":"NULL";               
        $consult = $this->db->executeQue("select nextval('bodegas_idbodega_seq'::regclass) limit 1");
        $row = $this->db->arrayResult($consult);
        $idbodega = $row['nextval'];        
        $idverify = strrev(urlencode(base64_encode($idbodega)));
        $idid = sha1($idbodega);
        $query = "insert into bodegas values ($idbodega,'$nombre','$direccion',$idtercero,$contacto,$email,$telefono,$codigo);";
        $query.= "insert into bodegasproductos(idbodega,idproducto,stock,stockmaximo,stockminimo,costo,preciobase) 
        SELECT $idbodega,idproducto,0, NULL,NULL,0,precio FROM productos;";
        $query.= "select nombretercero from terceros where idtercero=$idtercero";
        $result=$this->db->executeQue($query);
        if ($result){  
            $row=$this->db->arrayResult($result);
            echo json_encode(array("respuesta"=>"si",
                "id"=>$idbodega,
                "nombre"=>$nombre,
                "direccion"=>$direccion,
                "idid"=>$idid,
                "verify"=>$idverify,
                "codigo"=>$codigo,
                "cliente"=>$row['nombretercero']));
        } else {
            echo json_encode(array("respuesta"=>"no"));
        }
    } 

    public function createPermissionWareHouse() {     
        $idusuario = $_POST["usersbyperfil"]; 
        $idwarehouse = $_POST["idware"];
        $query = "update usuarios set idbodega=$idwarehouse where idusuario=$idusuario"; 
        if ($this->db->executeQue($query)) { 
            $consulta = $this->db->executeQue("SELECT * from usuarios u, perfiles p
                    where u.idusuario=$idusuario and u.perfil=p.idperfil");
            $usuario = null; 
            while ($row = $this->db->arrayResult($consulta)) { 
                $usuario = array('id' => $row['idusuario'],
                    'nombre' => $row['nombreusuario'],
                    'perfil' => $row['nombreperfil'],
                    'idverify' => strrev(urlencode(base64_encode($row['idusuario']))),
                    'idid' => sha1(time().$row['idusuario'].time()));
            }
            $respuesta['respuesta'] = 'si';
            $respuesta['newuser'] = $usuario;
            $respuesta['idbodega'] = $idwarehouse;
            echo json_encode($respuesta);
        } else {
            $respuesta['respuesta'] = 'no';
            echo json_encode($respuesta);
        }
    }

    public function deletePermissionWareHouse() {
        if (isset($_POST["verify"])) {
            $userid = base64_decode(urldecode(strrev(trim($_POST["verify"]))));
            $idbodega = trim($_GET['idware']);            
            $consulta = $this->db->executeQue("SELECT * from usuarios where idbodega=$idbodega and idusuario=$userid");            
            $total = $this->db->numRows($consulta);
            if ($total != 0) {
                $query2 = "update usuarios set idbodega=NULL where idusuario=$userid and idbodega=$idbodega";
                $this->db->executeQue($query2);
                $respuesta['res'] = 'si';
                $respuesta['idrow'] = $userid;
                echo json_encode($respuesta);
            } else {
                $respuesta['res'] = 'no';
                echo json_encode($respuesta);
            }
        }
    }

    public function updateWareHouse() {
        if (isset($_POST["verification"]) && isset($_POST["formid"])) {
            if ($_POST["formid"] == sha1(2989140)) {
                $bodegaid = base64_decode(urldecode(strrev($_POST["verification"])));
                $nombre = strtoupper(trim($_POST["nombrebodega"]));        
                $idtercero = trim($_POST["idproveedor"]);
                $direccion = strtoupper(trim($_POST["direccion"])); 
                $email = trim($_POST["email"])!=""?"'".trim($_POST["email"])."'":"NULL";
                $telefono = trim($_POST["phone"])!=""?"".trim($_POST["phone"])."":"NULL";
                $contacto = trim($_POST["namecontact"])!=""?"'".trim($_POST["namecontact"])."'":"NULL";        
                $query = "update bodegas set nombrebodega='$nombre',
                direccionbodega='$direccion',
                idtercero=$idtercero,
                emailbodega=$email,
                telefonobodega=$telefono,
                contactobodega=$contacto
                where bodegaid=$bodegaid;
                select nombretercero from terceros where idtercero=$idtercero";
                $result=$this->db->executeQue($query);
                if($result) {
                    $row=$this->db->arrayResult($result);
                    echo json_encode(array("respuesta"=>"si",
                        "id"=>$bodegaid,
                        "nombre"=>$nombre,
                        "direccion"=>$direccion,
                        "cliente"=>$row['nombretercero']));
                } else {
                    echo json_encode(array("respuesta"=>"no"));
                }
            }
        }
    }

    public function deleteWareHouse() {
        if (isset($_POST["verify"])) {
            $bodegaid = base64_decode(urldecode(strrev($_POST["verify"])));
            if ($this->verificarMovimientos($bodegaid)) {
                $query = "SELECT * from usuarios where idbodega=$bodegaid";
                $consulta = $this->db->executeQue($query);
                while ($row = $this->db->arrayResult($consulta)) {
                    $userid = $row['idusuario'];
                    $query2 = "update usuarios set idbodega=NULL where idusuario=$userid and idbodega=$bodegaid";
                    $this->db->executeQue($query2);
                }
                $query3 = "delete from bodegasproductos where idbodega=$bodegaid";
                if ($this->db->executeQue($query3)) {
                    $query4 = "delete from bodegas where bodegaid=$bodegaid";
                    if ($this->db->executeQue($query4)) {
                        $respuesta['res'] = 'si';
                        $respuesta['idrow'] = $bodegaid;
                        echo json_encode($respuesta);
                    } else {
                        $respuesta['res'] = 'no';
                        echo json_encode($respuesta);
                    }
                } else {
                    $respuesta['res'] = 'no';
                    echo json_encode($respuesta);
                }
            } else {
                $respuesta['res'] = 'no';
                echo json_encode($respuesta);
            }
        }
    }

    public function verificarMovimientos($idbodega) {
        $query = "SELECT * from movimientos where idbodega=$idbodega";
        $consulta = $this->db->executeQue($query);
        $total = $this->db->numRows($consulta);
        if ($total == 0) {
            return true;
        } else {
            return false;
        }
    }

}

?>

