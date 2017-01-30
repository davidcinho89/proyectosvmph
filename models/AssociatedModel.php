<?php

defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');


require ('classes/Producto.php');
require ('classes/detalleVenta.php');
require ('classes/Beneficiario.php');

class AssociatedModel extends ModelBase {

    public function getIdLocalidad($idbarrio) {
        $consulta = $this->db->executeQue("select idlocalidad from barrios where idbarrio=$idbarrio");
        $row = $this->db->arrayResult($consulta);
        return $row["idlocalidad"];
    }

    public function getIdDepartamento($idciudad) {
        $consulta = $this->db->executeQue("select iddepartamento from ciudades where idciudad=$idciudad");
        $row = $this->db->arrayResult($consulta);
        return $row["iddepartamento"];
    }

    public function getNombreBarrio($idbarrio) {
        $consulta = $this->db->executeQue("select nombre from barrios where idbarrio=$idbarrio");
        $row = $this->db->arrayResult($consulta);
        return $row["nombre"];
    }

    public function getNombreDepartamento($idciudad) {
        $consulta = $this->db->executeQue("select d.nombredepartamento from ciudades c, departamentos d where c.idciudad=$idciudad and d.iddepartamento=c.iddepartamento");
        $row = $this->db->arrayResult($consulta);
        return $row["nombredepartamento"];
    }

    public function getSelectLocalidades($tagname='localidades') {
        $consulta = $this->db->executeQue('select * from localidades order by nombre');
        $total = $this->db->numRows($consulta);
        $tagselect = "<select name='$tagname' id='$tagname'>";
        if ($total > 0) {
            while ($row = $this->db->arrayResult($consulta)) {
                $nombre_localidad = $row['nombre'];
                $id_localidad = $row['idlocalidad'];
                $tagselect.="<option value='" . $id_localidad . "'>" . $nombre_localidad . "</option>";
            }
        }
        $tagselect.="</select>";
        return $tagselect;
    }

    private function getFirstlocalidadId() {
        $consulta = $this->db->executeQue('select * from localidades order by nombre limit 1');
        $total = $this->db->numRows($consulta);
        if ($total > 0) {
            while ($row = $this->db->arrayResult($consulta)) {
                $id_localidad = $row['idlocalidad'];
                return $id_localidad;
            }
        }
    }

    public function getSelectBarrios($idlocalidad = 0, $tagname='barrios') {
        if ($idlocalidad == 0) {
            $idlocalidad = $this->getFirstLocalidadId();
        }
        $consulta = $this->db->executeQue('select * from barrios where idlocalidad=' . $idlocalidad . ' order by nombre');
        $total = $this->db->numRows($consulta);
        $tagselect = "<select name='$tagname'>";
        if ($total > 0) {
            while ($row = $this->db->arrayResult($consulta)) {
                $nombre_barrio = $row['nombre'];
                $id_barrio = $row['idbarrio'];
                $tagselect.="<option value='" . $id_barrio . "'>" . $nombre_barrio . "</option>";
            }
        }
        $tagselect.="</select>";
        return $tagselect;
    }

    public function getSelectDepartamentos($tagname='departamentos') {
        $consulta = $this->db->executeQue('select * from departamentos order by nombredepartamento');
        $total = $this->db->numRows($consulta);
        $tagselect = "<select name='$tagname' id='$tagname'>";
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

    public function getSelectCiudades($iddepartamento = 0, $tagname='ciudades') {
        if ($iddepartamento == 0) {
            $iddepartamento = $this->getFirstDepartamentoId();
        }
        $consulta = $this->db->executeQue('select * from ciudades where iddepartamento=' . $iddepartamento . ' order by nombreciudad');
        $total = $this->db->numRows($consulta);
        $tagselect = "<select name='$tagname'>";
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
        $iddep = $_GET['departamento'];
        $tag = $_GET['tag'];
        $ciudades = $this->getSelectCiudades($iddep, $tag);

        return $ciudades;
    }

    public function getChangeBarrios() {
        $idloca = $_GET['localidad'];
        $tag = $_GET['tag'];
        $barrios = $this->getSelectBarrios($idloca, $tag);

        return $barrios;
    }

    public function prepareUser() {
        $name = strtoupper(trim($_POST['full_name']));
        $cedula = trim($_POST['cedula']);
        $borndate = trim($_POST['born_date']);
        $mail = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $movil = trim($_POST['movil']);
        $address = trim($_POST['address']);
        $fax = trim($_POST['fax']);
        $sponsor = $this->getSponsor();
        $ciudad = trim($_POST['ciudades']);
        $barrio = trim($_POST['barrvin']);
        $dateStart = date("Y-m-d");
        $password = $this->genPass($name, $cedula);
        $alias = null;
        $newUser = new Usuario();

        $newUser->setAlias($alias);
        $newUser->setCedula($cedula);
        $newUser->setCiudad($ciudad);
        $newUser->setDireccion($address);
        $newUser->setEmail($mail);
        $newUser->setFax($fax);
        $newUser->setFechaIngreso($dateStart);
        $newUser->setFechaNacimiento($borndate);
        $newUser->setIdEstado(1);
        $newUser->setIdPadre($sponsor);
        $newUser->setBarrio($barrio);
        $newUser->setMovil($movil);
        $newUser->setNombre($name);
        $newUser->setPassword($password);
        $newUser->setPerfil(3);
        $newUser->setTelefono($phone);

        $nameben = strtoupper(trim($_POST['full_name_ben']));
        $cedulaben = trim($_POST['cedula_ben']);
        $borndateben = trim($_POST['born_date_ben']);
        $phoneben = trim($_POST['phone_ben']);
        $emailben = trim($_POST['email_ben']);
        $addressben = trim($_POST['address_ben']);
        $ciudadeben = trim($_POST['cidben']);
        $parentesco = trim($_POST['parentesco']);

        $beneficiario = new Beneficiario();
        $beneficiario->setCedula($cedulaben);
        $beneficiario->setCiudad($ciudadeben);
        $beneficiario->setDireccion($addressben);
        $beneficiario->setEmail($emailben);
        $beneficiario->setFechaNacimiento($borndateben);
        $beneficiario->setNombre($nameben);
        $beneficiario->setTelefono($phoneben);
        $beneficiario->setParentesco($parentesco);
        $_SESSION['new_user'] = serialize($newUser);
        $_SESSION['beneficiario'] = serialize($beneficiario);
    }

    public function getNewUser() {
        $newuser = null;
        if (isset($_SESSION['new_user'])) {
            $newuser = unserialize($_SESSION['new_user']);
        }
        return $newuser;
    }

    public function getBeneficiario() {
        $beneficiario = unserialize($_SESSION['beneficiario']);
        return $beneficiario;
    }

    public function setSponsor() {
        $sponsor = null;
        if (!isset($_SESSION['sponsor'])) {
            $sponsor = $_GET['sponsor'];
            $_SESSION['sponsor'] = $sponsor;
        } else {
            if ($_SESSION['sponsor'] != $_GET['sponsor']) {
                $sponsor = $_GET['sponsor'];
                $_SESSION['sponsor'] = $sponsor;
            } else {
                
            }
        }
    }

    public function getSponsor() {
        $sponsor = null;
        if (isset($_SESSION['sponsor'])) {
            $sponsor = $_SESSION['sponsor'];
        }
        return $sponsor;
    }

    public function genPass($name, $cedula) {
        $cel = (string) $cedula;
        $pass = substr($name, 1, 3) . '7P' . substr($cel, 4, 7) . 'LT';
        return $pass;
    }

    public function genAlias($name, $id) {
        $cel = (string) $cedula;
        $alias = substr($name, 0, 3) . $id;
        return $alias;
    }

    public function getcityNameById($id_city) {
        $consulta = $this->db->executeQue("select * from ciudades where idciudad=$id_city");
        $total = $this->db->numRows($consulta);
        if ($total > 0) {
            $name_city = null;
            while ($row = $this->db->arrayResult($consulta)) {
                $name_city = $row['nombreciudad'];
            }
            return $name_city;
        } else {
            return null;
        }
    }

    public function createVenta() {
        $consulta = $this->db->executeQue("select * from productos where referencia='LICINS'");
        $total = $this->db->numRows($consulta);
        $detalle = null;
        if ($total > 0) {
            while ($row = $this->db->arrayResult($consulta)) {
                $producto = new Producto($row['idproducto'], $row['idcategoria'], $row['nombreproducto'], $row['precio'], $row['puntos'], $row['referencia'], $row['iva'], $row['stock'], $row['idimagen']);
                $detalle = new Detalle($producto, 1);
                $_SESSION['detalleVinculacion'] = serialize($detalle);
            }
        } else {
            return null;
        }
    }

    public function getDetalle() {
        $detalle = unserialize($_SESSION['detalleVinculacion']);
        return $detalle;
    }

    public function createUser($user) {
        $consult = $this->db->executeQue("select nextval('usuarios_idusuario_seq'::regclass) limit 1");
        $row = $this->db->arrayResult($consult);
        $iduser = $row['nextval'];
        $alias = $this->genAlias($user->getNombre(), $iduser);
        $query = "insert into usuarios values ($iduser," . $user->getIdEstado() . ",'" .
                $user->getCiudad() . "'," . $user->getPerfil() . ",'" . $user->getNombre() .
                "','$alias','" . sha1($user->getPassword()) . "'," . $user->getCedula() . ",'" .
                $user->getDireccion() . "'," . $user->getTelefono() . "," . $user->getMovil() .
                "," . $user->getFax() . ",'" . $user->getFechaIngreso() . "','" . $user->getEmail() .
                "'," . $user->getIdPadre() . ",'" . $user->getRango() . "','" .
                $user->getFechaNacimiento() . "', " . $user->getBarrio() . ")";
        $this->db->executeQue($query);
        $consult2 = $this->db->executeQue("select nextval('beneficiarios_idbeneficiario_seq'::regclass) limit 1");
        $beneficiario = $this->getBeneficiario();
        $row = $this->db->arrayResult($consult2);
        $id_ben = $row['nextval'];
        $query2 = "insert into beneficiarios values ($id_ben," . $beneficiario->getCiudad() . ",'" .
                $beneficiario->getNombre() . "'," . $beneficiario->getCedula() . ",'" . $beneficiario->getDireccion() .
                "'," . $beneficiario->getTelefono() . ",'" . $beneficiario->getEmail() . "'," . $iduser . ",'" .
                $beneficiario->getFechaNacimiento() . "','" . $beneficiario->getParentesco() . "')";
        $this->db->executeQue($query2);
        $user->setAlias($alias);
        $user->setId($iduser);
        $_SESSION['new_user'] = serialize($user);
        return $user;
    }

    public function crearFactura($idUser, $subtotal, $iva, $detalle) {
        $fecha = date("Y-m-d");
        $valorcompra = $subtotal + $iva;
        $comprador = $idUser;
        $periodo=$this->getCurrentPeriodo();
        $consult = $this->db->executeQue("select nextval('ventas_idventa_seq'::regclass) limit 1");
        $row = $this->db->arrayResult($consult);
        $idventa = $row['nextval'];
        $_SESSION["pdfinfo"]["archivo"]="OrdenDePedido000". $idventa . time() . ".pdf";
        $url=TEMPORALES.DS.$_SESSION["pdfinfo"]["archivo"];
        $this->db->executeQue("insert into ventas values($idventa, $comprador,'$fecha','espera',0,$valorcompra,NULL,$periodo,'$url')");        
        $cantidad = $detalle->getCantidad();
        $valorpunto=  $this->config->get("pointvalue");
        $precio = $detalle->getProducto()->getPrecio();
        $idprod = $detalle->getProducto()->getId();
        $this->db->executeQue("insert into detalleventas values(nextval('detalleventas_iddetalleventa_seq'::regclass),$idprod,$idventa,$cantidad,$precio,0,0,0,0,0,$valorpunto,0)");                
        if ($idventa < 10) {
            $idventa = '0000' . $idventa;
        } else if ($idventa < 100 && $idventa >= 10) {
            $idventa = '000' . $idventa;
        } else if ($idventa < 1000 && $idventa >= 100) {
            $idventa = '00' . $idventa;
        } else if ($idventa < 10000 && $idventa >= 1000) {
            $idventa = '0' . $idventa;
        } else {
            $idventa = $idventa;
        }
        return $idventa;
    }

    public function enviarcorreo($usuario, $codigo, $archivo, $namesponsor = null, $emailsponsor=null) {
        $correoempresa = $this->config->get('mail');
        $email = new Correo();
        $email->emailFrom($correoempresa);
        $email->nameFrom($this->config->get('company'));
        $email->subject("NUEVO VINCULADO ".$this->config->get('company'));
        if ($namesponsor == null) {
            $email->emailTo($usuario->getEmail());
            $email->emailToCC($correoempresa);
            $email->respondTo($correoempresa);
            $email->adjunto($archivo);
            $bodymail = $this->frmVinculado($usuario, $codigo);
            $email->mailBody($bodymail);
        } else {
            $email->emailTo($emailsponsor);
            $email->respondTo($correoempresa);            
            $bodymail = $this->frmPatrocinador($usuario, $namesponsor);
            $email->mailBody($bodymail);
        }
        $email->send();
    }

    public function frmPatrocinador($user, $namesponsor) {
        $bodymail = '<table><tr><td>Estimado (a):   <strong>' . $namesponsor . '</strong></td><td></td></tr>';
        $bodymail.= '<tr><td>Bienvenido a '.$this->config->get('company').'</td></tr>';
        $bodymail.= '<tr><td><p>
        Nos permitimos informarle que el señor(a)<strong>' . $user->getNombre() . '</strong> se ha inscrito en su organizacion y ahora forma parte de nuestra gran familia PLENTIFUL SAS.
        ha sido inscrito en su red de negocios, por lo cual extendemos nuestras felicitaciones; asi mismo le animamos a que inmediatamente inicie con su vinculado el proceso de capacitacion. 
        A continuacion se lista la informacion de su nuevo vinculado:    
        </p></td></tr>';
        $bodymail.= '<tr><td>Nombre:   <strong>' . $user->getNombre() . '</strong></td><td></td></tr>';
        $bodymail.= '<tr><td>Id:   <strong>' . $user->getId() . '</strong></td><td></td></tr>';
        $bodymail.= '<tr><td>Email:   <strong>' . $user->getEmail() . '</strong></td><td></td></tr>';
        $bodymail.= '<tr><td>Telefono:   <strong>' . $user->getTelefono() . '</strong></td><td></td></tr></table>';
        return $bodymail;
    }

    public function frmVinculado($user, $codigo) {
        $bodymail = '<table><tr><td>Estimado (a) vindulado (a):   <strong>' . $user->getNombre() . '</strong></td><td></td></tr>';
        $bodymail.= '<tr><td>Bienvenido a '.$this->config->get('company').'</td></tr>';
        $bodymail.= '<tr><td><p>
        Como VINCULADO (A), de nuestra compañía, usted tendra la oportunidad de beneficiarse de un excelente negocio, que le permitira de una manera sencilla alcanzar una mejor calidad de vida. 
        Para mantener un permanente contacto a traves de nuestro sistema por Internet, usted debera conocer la siguiente informacion con la cual tendra acceso a nuestro sistema:    
        </p></td></tr>';
        $bodymail.= '<tr><td>Código de Vinculado independiente:   <strong>' . $user->getId() . '</strong></td><td align="left"></td></tr>';
        $bodymail.= '<tr><td>Nombre de usuario:   <strong>' . $user->getAlias() . '</strong></td><td></td></tr>';
        $bodymail.= '<tr><td>Clave de ingreso:   <strong>' . $user->getPassword() . '</strong></td><td></td></tr>';
        $bodymail.= '<tr><td>Número de Orden de Inscripcion:   <strong>' . $codigo . '</strong></td><td></td></tr></table>';
        return $bodymail;
    }
/*
    public function downloadContract($texto) {
        $pdf = new PDFCONTRACT();
        $pdf->SetDisplayMode('real');
        $pdf->SetMargins(12, 5);
        $pdf->SetAuthor('PLENTIFUL SAS');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(0, 6, utf8_decode($texto));
        $pdf->Output('Acuerdosycondiciones.pdf', 'D');
    }
*/
    public function createAndSavePdf($info) {
        $pdf = new PDFCONTRACT();
        $pdf->setInfo($this->config->get('nit'), $this->config->get('direccion'), $this->config->get('telefono'));
        $pdf->SetDisplayMode('real');
        $pdf->SetMargins(15, 0);
        $pdf->SetAuthor($this->config->get('company'));
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(50, 6, "Orden  de pedido No.", 'LTRB', 0, 'L', false);
        $pdf->Cell(130, 6, $info["numeroorden"], 'LTRB', 0, 'L', false);
        $pdf->Ln();
        $pdf->Cell(50, 6, "Fecha", 'LTRB', 0, 'L', false);
        $pdf->Cell(130, 6, $info["fecha"], 'LTRB', 0, 'L', false);
        $pdf->Ln();
        $pdf->Cell(50, 6, "Nombre del vinculado", 'LTRB', 0, 'L', false);
        $pdf->Cell(130, 6, $info["nombre"], 'LTRB', 0, 'L', false);
        $pdf->Ln();
        $pdf->Cell(50, 6, "Codigo del vinculado", 'LTRB', 0, 'L', false);
        $pdf->Cell(130, 6, $info["codigo"], 'LTRB', 0, 'L', false);
        $pdf->Ln(10);
        $header = array("Cantidad", "Producto", "Codigo", "Precio unitario", "Precio Total");
        $pdf->FancyTable($header, $info["detalle"]);   
        
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(100, 6, "", 0, 0, 'R', false);  
        $pdf->Cell(40, 6, "SUBTOTAL", 'LTRB', 0, 'R', false);  
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(40, 6, number_format($info["subtotal"], 0, ",", "."), 'LTRB', 0, 'C', false);
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(100, 6, "", 0, 0, 'R', false); 
        $pdf->Cell(40, 6, "IVA", 'LTRB', 0, 'R', false);    
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(40, 6, number_format($info["iva"], 0, ",", "."), 'LTRB', 0, 'C', false);
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(100, 6, "", 0, 0, 'R', false); 
        $pdf->Cell(40, 6,"TOTAL", 'LTRB', 0, 'R', false); 
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(40, 6, number_format($info["iva"]+$info["subtotal"], 0, ",", "."), 'LTRB', 0, 'C', false);
        $pdf->Ln(20);  
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(60, 6, "Ficha de deposito", 'LTRB', 0, 'C', false);
        $pdf->Cell(40, 6, "Numero de cuenta", 'LTRB', 0, 'C', false);
        $pdf->Cell(40, 6, "Banco", 'LTRB', 0, 'C', false);
        $pdf->Cell(40, 6, "Beneficiario", 'LTRB', 0, 'C', false);
        $pdf->Ln();
        $pdf->Image(IMAGES . SL . 'bancobogota.gif', $pdf->GetX()+3, $pdf->GetY()+2, 0);  
        $pdf->Cell(60, 22, "", 'LTRB', 0, 'C', false);
        $pdf->Cell(40, 22, "422043612", 'LTRB', 0, 'C', false);
        $pdf->Cell(40, 22, "Banco de Bogota", 'LTRB', 0, 'C', false);
        $pdf->Cell(40, 22, "Plentiful S.A.S", 'LTRB', 0, 'C', false);
        $pdf->Ln();        
        $pdf->Output("tmp/".$_SESSION["pdfinfo"]["archivo"], 'F');        
    }
    
    public function getGrupoPerfil($idperfil){
        $result=$this->db->executeQue("select grupo from perfiles where idperfil=$idperfil");
        $row=$this->db->arrayResult($result);
        return $row["grupo"];
    }
    
    private function getCurrentPeriodo() {
        $query = 'select * from periodos where \'' . date("Y-m-d") . '\' BETWEEN fechainicio AND fechafin';
        $consulta = $this->db->executeQue($query);
        $row = $this->db->arrayResult($consulta);
        $idperiodo = $row['idperiodo'];        
        return $idperiodo;
    }

}

?>
