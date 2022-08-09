<?php


namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }
    public function enviarConfirmacion(){

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '1fc07c2e83af5e';
        $mail->Password = 'bad3f9441b0970';

        $mail->setFrom('administrador@mundoexcel.com', 'MundoExcel.com');
        $mail->addAddress('administrador@mundoexcel.com');

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Confirmación de Cuenta MundoEXCEL';

        $contenido = "<html>";
        $contenido .= "<h1 style='margin: 0 auto 10px; font-size:36px; text-align:center; color:#000'>¡Hola " . $this->nombre . "!</h1>";
        $contenido .= "<p style='margin: 0 auto 10px; font-size:24px; text-align:center; color:#000'>Haga clic en el botón de abajo para verificar su dirección de correo electrónico.</p>";
        $contenido .= '<a href="http://localhost:3000/confirmacion?token='.$this->token.'" style="text-decoration:none;white-space:nowrap;font-weight:600;font-size:16px;padding:12px 32px;border-radius:3px;line-height:100%;display:block;border:1px solid transparent;background-color:#467fcf;color:#fff;border-color:#467fcf" target="_blank"><span style="color:#fff;font-size:16px;text-decoration:none;white-space:nowrap;font-weight:600 line-height:100%">Confirmar Cuenta</span>"></a>';
        $contenido .= "<p style='margin: 20px auto;'>Si no creó una cuenta, ignore este mensaje.</p>";
        $contenido .= "<p style='margin: 20px auto;'>Saludos!</p><p>Mundo <span style='color:#329f00'>Excel</span></p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;
        $mail->send();
    }

    public function emailRecover(){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '1fc07c2e83af5e';
        $mail->Password = 'bad3f9441b0970';

        $mail->setFrom('administrador@mundoexcel.com', 'MundoExcel.com');
        $mail->addAddress('administrador@mundoexcel.com');

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Recupera tu Cuenta MundoEXCEL';

        $contenido = "<html>";
        $contenido .= "<h1 style='margin: 0 auto 10px; font-size:36px; text-align:center; color:#000'>¡Hola " . $this->nombre . "!</h1>";
        $contenido .= "<p style='margin: 0 auto 10px; font-size:24px; text-align:center; color:#000'>Haga clic en el botón de abajo para reestablecer su contraseña.</p>";
        $contenido .= '<a href="http://localhost:3000/recover/restore?token='.$this->token.'" style="text-decoration:none;white-space:nowrap;font-weight:600;font-size:16px;padding:12px 32px;border-radius:3px;line-height:100%;display:block;border:1px solid transparent;background-color:#467fcf;color:#fff;border-color:#467fcf" target="_blank"><span style="color:#fff;font-size:16px;text-decoration:none;white-space:nowrap;font-weight:600 line-height:100%">Restablecer contraseña</span>"></a>';
        $contenido .= "<p style='margin: 20px auto;'>Si no creó una cuenta, ignore este mensaje.</p>";
        $contenido .= "<p style='margin: 20px auto;'>Saludos!</p><p>Mundo <span style='color:#329f00'>Excel</span></p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;
        $mail->send();
    }
}