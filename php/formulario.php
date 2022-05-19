<?php

require("class.phpmailer.php");
require("class.smtp.php");


    $mail = new PHPMailer; 
    $mail ->isSMTP();

    $mail ->Host='mail.altosdeespora.com.ar';
    $mail ->Port =465;
    $mail ->SMTPAuth=true;
    $mail ->SMTPSecure= true;


    $mail -> From = ($_POST['email']);
    $mail ->addAddress('carballo523@gmail.com', "destinatario");
    $mail ->addReplyTo($_POST['email'], $_POST['nombre']);
    $mail->FromName = ($_POST['nombre']);
    $mail ->isHTML(true);
    $mail ->Subject = 'Enviado por: '.$_POST['nombre'];
    $mail ->Body='<h1 align= center> Nombre: '.$_POST['nombre']. '<br>
    Email: '.$_POST['email']. '<br>Mensaje: '.$_POST['msg']. '</h1>';


    $mail->WordWrap = 50;


    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
        

    if(!$mail -> send()){
       echo "<script>
        alert('Lamento decirte que no he podido enviar su consulta, intente mas tarde');
        window.location='../../index.html'
        </script>";
    }
    else {
       echo "<script>
        alert('Gracias! En breve nos pondremos en contacto contigo');
        window.location='../../index.html'
        </script>";
    }

?>