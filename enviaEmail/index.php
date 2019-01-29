<?php

require_once("phpmailer/class.phpmailer.php");
require_once("phpmailer/class.smtp.php");

$assunto = "Teste de envio de Email";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "localhost";
$mail->SMTPAuth = true;
$mail->Username = "";
$mail->Password = ""; // senha
$mail->From = "correio@correio.com.br";
$mail->FromName = "Nome da Empresa";
$mail->CharSet = "UTF-8";

$mail->AddAddress('seuEmail@seuEmail.com.br', "Nome");
$mail->WordWrap = 50; //wrap seta o tamanhdo do texto por linha
$mail->IsHTML(true); //enviar em HTML

$mail->AddReplyTo("correio@correio.com.br", "Contato");
$msg = "<html>
            <head>
                <meta charset='UTF-8'>
                <link href='css/bootstrap.min.css' rel='stylesheet'>
            </head>
            <body class='card'>
                <div class='container-fluid col-md-auto'>
                    <div class='alert alert-secondary'>";
            $msg .= "<h2>Olá tudo bem?</h2>";
            $msg .= "<h4>Se você recebeu esse email significa que as configurações do servidor ".$_SERVER['HTTP_HOST']." estão funcionando...</h4>";
            $msg .= "<h4>Enviado para: " . $emailUsuario . "</h4>";
            $msg .= "<h4>Dia " . date('d/m/Y') . " às " . date('H:i') . ", horário do servidor.</h4>";
            $msg .= "</div>
                </div>
            </body>
        </html>";
$mail->Subject = "$assunto";
$mail->Body = $msg;

$enviado = $mail->Send();

if (!$enviado) {
    echo '<P>houve um erro ao  enviar o email! </P>' . $mail->ErrorInfo . ' IP: ' . $mail->Host . ' P: ' . $mail->Port . '<br>';
} else {
    echo $msg;
    //echo 'Email enviado com sucesso dia ' . date('d/m/Y') . ' às ' . date('H:i') . ', horário do servidor<br>';
}
