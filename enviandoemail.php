<?php
require_once("class/class.phpmailer.php");

$mail = new PHPMailer(true);

$mail ->IsSMTP();
try{
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    $mail->Username = 'grupostech@gmail.com';
    $mail->Password='Senai115';
    
     $mail->SetName('$name'); 
     $mail->GetEmail("$email", "$email"); 
     $mail->GetSubject("$subject"); 
     $mail->message = $message;
    
     $mail->AddAddress('zenntoedit@gmail.com', "STECH Recados");
     
     $mail->MsgHTML('corpo do email');
     
     $mail->Send();
     echo 'Mensagem enviada com sucesso</p>\n';
     
     
} catch (phpMailerException $e) {
    echo $e->errorMessage();
}

    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $formcontent="From: $name \n Mensagem: $message";
    $recipent="grupostech@gmail.com";
    $subject= "Formulário de contato";
    $mailheader = "From: $email \r\n";
            mail($recipent, $subject, $formcontent, $mailheader) or die("ERRO");
            echo "Mensagem enviada";
 ?>