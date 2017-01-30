<?php

defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');

require_once INCLUDES.DS.'smpt'.DS.'class.phpmailer.php';

class Correo {

    var $mail;

    public function __construct() {       
        $this->mail = new PHPMailer();
        $this->mail->ClearAddresses();
        $this->mail->CharSet = "UTF-8";
        $this->mail->IsSMTP();
        $this->mail->Mailer = "smtp";
        $this->mail->SMTPAuth = true; // turn on SMTP authentication
        $this->mail->Host = "mail.glugg.net";
        $this->mail->Port = 25;
        $this->mail->Username = "plentiful@glugg.net"; // SMTP username
        $this->mail->Password = "plentiful2013"; // SMTP password 

    }

    public function emailFrom($remitente) {
        $this->mail->From = $remitente;
    }

    public function nameFrom($remitenteName) {
        $this->mail->FromName = $remitenteName;
    }

    public function subject($asunto) {
        $this->mail->Subject = $asunto;
    }

    public function emailTo($destino) {        
        $this->mail->AddAddress($destino);
    }
    
    public function adjunto($archivo) {        
        $this->mail->AddAttachment(TEMPORALES.DS.$archivo,basename($archivo));
    }
    
    public function emailToCC($destino) {        
        $this->mail->AddBCC($destino);        
    }

    public function respondTo($replyto="info@glugg.net") {
        $this->mail->AddReplyTo($replyto);
    }

    public function mailBody($bodyhtml) {
        $this->mail->IsHTML(true);
        $this->mail->Body = $bodyhtml;
    }

    public function send() {     
        $this->mail->AltBody = "El cliente de correo no acepta HTML";
        if (!$this->mail->Send()) {
            return false;
        } else {              
            return true;
        }
    }

}

?>