<?php

if(isset($_POST['submit'])){
    require 'php/PHPMailerAutoload.php';
    $mail = new PHPmailer;
    $mail->isSMTP();
    $mail->Host='smtp.@gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='';
    $mail->Password='';


    $mail->setFrom($_POST['email'],$_POST['name']);
    $mail->addAdress('lmau.94.06l@gmail.com');
    $mail->addReplyTo($_POST['email'],$_POST['name']);

    $mail->isHTML(true);
    $mail->Subject='Enviado por' .$_POST['name'];
    $mail->Body='<h1 align=center> Nombre '.$_POST['name']. '<br>Email: '.$_POST['email'].'<br>Mensaje'.$_POST['message'].'</h1>';

    if(!$mail->send()){
        $result="Algo esta mal, intente nuevamente";
    }
    else{
        $result="Gracias".$_POST['name']. "Por contactarnos!";
    }

}


?>