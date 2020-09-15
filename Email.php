<?php

require_once __DIR__.'/src/PHPMailer.php';
require_once __DIR__.'/src/SMTP.php';
require_once __DIR__.'/src/Exception.php';  

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    private $mail;

    private $titulo;
    private $mensagem;
    private $assunto;
    private $userName;
    private $password;


    public function __construct($address, $setFrom, $mensagem, $titulo) {
        try {
            
            $this->mail = new PHPMailer(true);

            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->SMTPAuth = true;
            $this->mail->Port = 587;
            $this->mail->SMTPDebug = 3;
            $this->SMTPSecure = 'ssl';
            $this->SMTPAutoTLS = false;
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  
            $this->mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => false ) );
            $this->mail->isHTML(true);
            $this->mail->Username = 'governodemesquita@gmail.com';
            $this->mail->Password = 'mesq#pmm@%ccs';
            $this->mail->setFrom($setFrom);
            $this->mail->addAddress($address);
            $this->mail->Subject = $titulo;
            $this->mail->Body = $mensagem;
            $this->mail->AltBody = $this->titulo;
            if($this->mail->send()) {
                echo "Email enviado com sucesso";
            } else {
                echo "email não enviado";
            }

        } catch(Exception $e) {
            echo "Erro ao enviar mensagem:  {$this->mail->ErrorInfo}";
        }
    }
    


}