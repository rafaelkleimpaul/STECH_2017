<?php
 $smtp_port=587;
function pegaValor($valor) {
    return isset($_POST[$valor]) ? $_POST[$valor] : '';
}
 
function validaEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
 
function enviaEmail($name, $subject, $message, $para, $email_servidor) {
    $headers = "From: $email_servidor\r\n" .
               "Reply-To: $de\r\n" .
               "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  
  mail($name, $para, $subject, nl2br($message), $headers);
}
 
$email_servidor = "smtp.gmail.com";
$para = "stechrecados@gmail.com";
$name = pegaValor("name");
$message = pegaValor("message");
$subject = pegaValor("subject");
$email= pegaValor("email");
 
?>