<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
include("../utils/conexion.php");
session_start();
$matricula=$_SESSION['matricula'];
$correo=$_SESSION['matricula']."@unav.edu.mx";
$nombre=$_SESSION['nombre'];
$token=Time();  //devuelve un numero



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output  --- DEBUG_OFF DEBUG_SERVER
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'inscripciones@unav.edu.mx';                     // SMTP username
    $mail->Password   = '2016UNAVidadefe';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('inscripciones@unav.edu.mx', 'Reinscripciones UNAV');
    $mail->addAddress($correo, $nombre);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
  //  $mail->addCC('cc@example.com');
  //  $mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Validacion de correo UNAV';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $html="<meta http-equiv='Content-Type' content='text/html; charset=utf-8'> <div style='width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;'>
        <div align='center'>
    
    </div>
    <h1>Reinscripciones UNAV</h1>
    <h4> <br>Estimado ".$nombre."<br>
    <br>Por favor da click en el enlace para validar tu correo
    <br>
    <a href=http://admisiones.unav.edu.mx/reingreso/validacion.php?token=".$token."> VALIDAR </a>
    <br>Le informamos que su proceso de inscripción está en proceso, le comparto información relevante para su inicio de clases: </h4>
    

<br>Cualquier duda, sigo a sus órdenes.
    <br>
<br>MADN. María de Lourdes Medina Almada
 <br>Directora de Admisiones
 <br>Tel. 642 423 3085
 <br>Cell. 642 156 3499";
    $mail->msgHTML($html);
   // $mail->send();

    if($mail->send()){
       
        
            $query ="UPDATE reingreso_r SET token = $token WHERE matricula = $matricula and nombre='$nombre'";
            $result = $conexion->query($query);
            if ($result)      
            {
            echo "Se actualizo correctamente"; 
            header("location: ../bienvenido.php");
            } else {
            echo ("Error al guardar en Base de Datos: ". mysqli_error($conexion));
            }
             echo "Mensaje ha sido enviado"; 
        }
   
   
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}