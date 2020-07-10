<?php
/**
 * Created by PhpStorm.
 * User: elporfirio
 * Date: 2019-02-26
 * Time: 23:04
 */
/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
//require 'Constantes.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 2;
    $mail->isSMTP();

    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;

    $mail->Username = 'inscripciones@unav.edu.mx';
    $mail->Password = '2016UNAVidadefe';

    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    ## MENSAJE A ENVIAR

    $mail->setFrom('inscripciones@unav.edu.mx');
    $mail->addAddress('ogustavo@unav.edu.mx');

    $mail->isHTML(true);
    $mail->Subject = 'Esta es una prueba de email';
    $mail->Body = 'Hola mundo desde <b>phpmailer</b>';

    $mail->send();

} catch (Exception $exception) {
    echo 'Algo salio mal', $exception->getMessage();
}*/