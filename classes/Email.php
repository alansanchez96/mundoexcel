<?php


namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }
    public function enviarConfirmacion()
    {

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
        $contenido .= '<a href="http://localhost:3000/confirmacion?token=' . $this->token . '" style="text-decoration:none;white-space:nowrap;font-weight:600;font-size:16px;padding:12px 32px;border-radius:3px;line-height:100%;display:block;border:1px solid transparent;background-color:#467fcf;color:#fff;border-color:#467fcf" target="_blank"><span style="color:#fff;font-size:16px;text-decoration:none;white-space:nowrap;font-weight:600 line-height:100%">Confirmar Cuenta</span>"></a>';
        $contenido .= "<p style='margin: 20px auto;'>Si no creó una cuenta, ignore este mensaje.</p>";
        $contenido .= "<p style='margin: 20px auto;'>Saludos!</p><p>Mundo <span style='color:#329f00'>Excel</span></p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;
        $mail->send();
    }

    public function emailRecover()
    {
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
        $contenido .= '<a href="http://localhost:3000/recover/restore?token=' . $this->token . '" style="text-decoration:none;white-space:nowrap;font-weight:600;font-size:16px;padding:12px 32px;border-radius:3px;line-height:100%;display:block;border:1px solid transparent;background-color:#467fcf;color:#fff;border-color:#467fcf" target="_blank"><span style="color:#fff;font-size:16px;text-decoration:none;white-space:nowrap;font-weight:600 line-height:100%">Restablecer contraseña</span>"></a>';
        $contenido .= "<p style='margin: 20px auto;'>Si no creó una cuenta, ignore este mensaje.</p>";
        $contenido .= "<p style='margin: 20px auto;'>Saludos!</p><p>Mundo <span style='color:#329f00'>Excel</span></p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;
        $mail->send();
    }

    public function emailChange()
    {
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
        $mail->Subject = 'Cambiar email MundoEXCEL';

        $contenido = '<html><body>

        <table style="max-width:600px; margin: 0 auto; padding: 10px; border-collapse: collapse;">
    
            <tr>
                <td style="background: linear-gradient(90deg, rgba(0, 12, 18, 1) 0%, rgba(0, 12, 18, 0.6855336735757549) 50%, rgba(0, 12, 18, 1) 100%); text-align: left; padding: 0; width: 100%;">
                    <a href="http://localhost:3000/" style="text-decoration: none;">
                        <div style="display: flex;flex-direction: row;align-items: center;margin: 5px 0;">
                            <a href="http://localhost:3000/" style="display: flex;flex-direction: row;align-items: center;margin: 5px 0 0 20px; text-decoration: none;">
                                <div style="">
                                    <img style="width: 50px" src="https://i.postimg.cc/JtVH20S7/logo-blanco.png">
                                </div>
                                <div>
                                    <p style="margin-left: 5px;color: #eeeeee;font-family:"Noto Sans", sans-serif;">Mundo <span style="color:#329f00;">Excel</span></p>
                                </div>
                            </a>
                        </div> <!-- Fin logo -->
                    </a>
                </td>
            </tr>
    
            <tr>
                <td style="background-color: #eeeeee">
                    <div style="color: #000C12; margin: 4% 10% 2%; text-align: center;font-family: sans-serif">
                        <h2 style="color: #32A78A; margin: 0 0 7px">¡Hola ' . $this->nombre . '!</h2>
                        <p style="margin: 10px auto; font-size: 15px">Nos ha llegado una notificacion en <span style="color: #329f00; font-weight: bold;">Mundo Excel</span></p>
                        <p style="margin: 2px; font-size: 15px">Que has solicitado un cambio de email en tu cuenta.</p>
                        <p style="margin: 2px; font-size: 15px">Si no es así, porfavor ignora este correo.</p>
                        <p style="margin: 2px; font-size: 15px">En caso contrario, porfavor haz click en el boton para confirmar.</p>
                        <div style="width: 100%; text-align: center; margin: 40px auto;">
                            <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #32A78A;" href="http://localhost:3000/account/newemail?token=' . $this->token . '"><span style="font-weight: bold;">Cambiar Email</span></a>
                        </div>
                        <p style="margin: 2px; font-size: 15px">Está recibiendo este correo electrónico porque recientemente se solicitó un cambio de email en <span style="color: #329f00; font-weight: bold;">Mundo Excel</span></p>
                        <p style="color: #1d1d1d; font-size: 12px; text-align: center;margin: 30px 0 0">Este email se envió a ' . $this->email . ', que está asociado a una cuenta de Mundo Excel </p>
                        <p style="color: #1d1d1d; font-size: 12px; text-align: center;margin: 30px 0 0">Mundo Excel todos los derechos reservados 2022</p>
                    </div>
                </td>
            </tr>
    
        </table>
    
    </body></html>';

        $mail->Body = $contenido;
        $mail->send();
    }
}
