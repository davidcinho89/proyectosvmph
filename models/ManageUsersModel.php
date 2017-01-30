<?php

defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');

class ManageUsersModel extends ModelBase {

    public function getUsers() {
        $consult = $this->db->executeQue("select u.idusuario,u.nombreusuario, e.nombreestado, 
            p.nombreperfil, u.alias, u.fechaingreso, p.grupo
            from usuarios u, perfiles p, estados e 
            where e.idestado=u.idestado and p.idperfil=u.perfil and p.grupo<>'Superadministrador'");
        while ($fila = $this->db->arrayResult($consult)) {
            $usuarios[] = array('id' => $fila['idusuario'],
                'nombre' => $fila['nombreusuario'],
                'alias' => $fila['alias'],
                'perfil' => $fila['nombreperfil'],
                'estado' => $fila['nombreestado'],
                'fecha' => $fila['fechaingreso']);
        }
        return $usuarios;
    }

    public function getPerfiles() {
        $resultset = $this->db->executeQue("select * from perfiles 
            where grupo not in ('Vinculado','Superadministrador', 'No vinculado')");
        while ($fila = $this->db->arrayResult($resultset)) {
            $perfiles[] = array('id' => $fila['idperfil'],
                'nombre' => $fila['nombreperfil'],
                'grupo' => $fila['grupo']);
        }
        return $perfiles;
    }

    public function insertUser() {
        $nombrecompleto = strtoupper(trim($_POST['full_name']));
        $email2 = trim($_POST['email2']);
        $email = trim($_POST['email']);
        $alias = strtoupper(trim($_POST['alias']));        
        $perfil = $_POST['profile'];
        $password = sha1(trim($_POST['con']));
        $fechaingreso = date("Y-m-d");
        $consult = $this->db->executeQue("select nextval('usuarios_idusuario_seq'::regclass) limit 1");
        $row = $this->db->arrayResult($consult);
        $idusuario = $row['nextval'];
        $consulta = "insert into usuarios
        values($idusuario,2,$perfil,'$alias','$password','$fechaingreso','$email', '$email2','$nombrecompleto')";
        if ($this->db->executeQue($consulta)) {
            $idverify = strrev(urlencode(base64_encode($idusuario)));
            $idid = sha1($idusuario);
            $nuevoperfil = $this->getPerfil($perfil);
            $respuesta = array('respuesta' => 'si',
                'id' => $idusuario,
                'nombre' => $nombrecompleto,
                'alias' => $alias,
                'perfil' => $nuevoperfil['nombre'],
                'estado' => 'activo',
                'grupo' => $nuevoperfil['grupo'],
                'idcode' => $idid,
                'idverify' => $idverify);
            echo json_encode($respuesta);
        } else {
            $respuesta = array('respuesta' => 'no');
            echo json_encode($respuesta);
        }
    }

    private function getPerfil($id) {
        $consult = $this->db->executeQue("select * from perfiles where idperfil=$id");
        $row = $this->db->arrayResult($consult);
        $perfil = array('id' => $row['idperfil'],
            'nombre' => $row['nombreperfil'],
            'grupo' => $row['grupo']);
        return $perfil;
    }

    public function disableUser() {
        if (isset($_POST["verify"])) {
            $idusuario = base64_decode(urldecode(strrev($_POST["verify"])));
            if ($this->db->executeQue("update usuarios set idestado=1 where idusuario=$idusuario")) {
                $rs = $this->db->executeQue("select nombreusuario as nombre from usuarios where idusuario=$idusuario");
                $fila = $this->db->arrayResult($rs);
                $respuesta['res'] = 'si';
                $respuesta['idrow'] = $idusuario;
                $respuesta['nombre'] = $fila["nombre"];
                $respuesta['ididid'] = sha1(time() . "" . $idusuario + time());                
                $respuesta['verify'] = strrev(urlencode(base64_encode($idusuario)));
                echo json_encode($respuesta);
            } else {
                $respuesta['res'] = 'no';
                echo json_encode($respuesta);
            }
        }
    }

    public function enableUser() {
        if (isset($_POST["verify"])) {
            $idusuario = base64_decode(urldecode(strrev($_POST["verify"])));
            if ($this->db->executeQue("update usuarios set idestado=2 where idusuario=$idusuario")) {
                $rs = $this->db->executeQue("select nombreusuario as nombre from usuarios where idusuario=$idusuario");
                $fila = $this->db->arrayResult($rs);
                $respuesta['res'] = 'si';
                $respuesta['idrow'] = $idusuario;
                $respuesta['nombre'] = $fila["nombre"];
                $respuesta['ididid'] = sha1(time() . "" . $idusuario + time());                
                $respuesta['verify'] = strrev(urlencode(base64_encode($idusuario)));
                echo json_encode($respuesta);
            } else {
                $respuesta['res'] = 'no';
                echo json_encode($respuesta);
            }
        }
    }

    public function getLocalidades() {
        $consulta = $this->db->executeQue("select * from localidades order by nombre");
        while ($row = $this->db->arrayResult($consulta)) {
            $localidades[] = array("id" => $row['idlocalidad'], "nombre" => $row['nombre']);
        }
        return $localidades;
    }

    public function getBarrios($idlocalidad) {
        $consulta = $this->db->executeQue("select * from barrios where idlocalidad=$idlocalidad order by nombre");
        while ($row = $this->db->arrayResult($consulta)) {
            $barrios[] = array("id" => $row['idbarrio'], "nombre" => $row['nombre']);
        }
        return $barrios;
    }

    public function getDepartamentos() {
        $consulta = $this->db->executeQue("select * from departamentos order by nombredepartamento");
        while ($row = $this->db->arrayResult($consulta)) {
            $departamentos[] = array("id" => $row['iddepartamento'], "nombre" => $row['nombredepartamento']);
        }
        return $departamentos;
    }

    public function getCiudades($iddepartamento) {
        $consulta = $this->db->executeQue("select * from ciudades where iddepartamento=$iddepartamento  order by nombreciudad");
        while ($row = $this->db->arrayResult($consulta)) {
            $ciudades[] = array("id" => $row['idciudad'], "nombre" => $row['nombreciudad']);
        }
        return $ciudades;
    }

    public function getUserById($idusuario) {
        $consulta = $this->db->executeQue("select * 
from usuarios u left join perfiles p on u.perfil=p.idperfil where u.idusuario=$idusuario");
        $row = $this->db->arrayResult($consulta);
        $usuario = array("id" => $row['idusuario'],                        
            "nombre" => $row['nombreusuario'],
            "alias" => $row['alias'],
            "password" => $row['password'],                                    
            "email" => $row['email'],
            "email2" => $row['email2'],                        
            "grupo" => $row['grupo'],
            "fechaingreso" => $row['fechaingreso'],
            "idperfil" => $row['idperfil']);
        return $usuario;
    }

    public function editBasicUser() {        
        $email2 = trim($_POST['email2']);
        $email = trim($_POST['email']);
        $nombre = trim(strtoupper($_POST['full_name']));
        $idusuario = $_POST['idusuario'];
        $consulta = "update usuarios set nombreusuario='$nombre', email='$email', email2='$email2' where idusuario=$idusuario";
        if ($this->db->executeQue($consulta)) {
            $respuesta['respuesta'] = 'si';
            $respuesta['id'] = $idusuario;            
            $respuesta['nombre'] = $nombre;
            echo json_encode($respuesta);
        } else {
            $respuesta['respuesta'] = 'no';
            echo json_encode($respuesta);
        }
    }

    public function editPassUser() {
        $newpass = sha1(trim($_POST['con']));
        $idusuario = $_POST['idusuariopass'];
        $consulta = "update usuarios set password='$newpass' where idusuario=$idusuario";
        if ($this->db->executeQue($consulta)) {
            $respuesta['respuesta'] = 'si';
            echo json_encode($respuesta);
        } else {
            $respuesta['respuesta'] = 'no';
            echo json_encode($respuesta);
        }
    }
   
    public function getPerfiles2($arrayPerfiles) {
        $query = "select * from perfiles 
            where grupo='Administrador' or 'Analista'";        
        $result = $this->db->executeQue($query);
        $perfiles;
        while ($fila = $this->db->arrayResult($result)) {
            $perfiles[] = array('id' => $fila['idperfil'],
                'nombre' => $fila['nombreperfil'],
                'grupo' => $fila['grupo']);
        }
        return $perfiles;
    }

    public function updateProfile() {
        $idusuario = $_POST['idusuario'];
        $perfil = $_POST['perfil'];
        $consulta = "update usuarios set perfil=$perfil where idusuario=$idusuario";
        if ($this->db->executeQue($consulta)) {
            $perfilnuevo = $this->getPerfil($perfil);
            $respuesta['respuesta'] = 'si';
            $respuesta['perfil'] = $perfilnuevo['nombre'];
            $respuesta['id'] = $idusuario;
            echo json_encode($respuesta);
        } else {
            $respuesta['respuesta'] = 'no';
            echo json_encode($respuesta);
        }
    }

}

?>
