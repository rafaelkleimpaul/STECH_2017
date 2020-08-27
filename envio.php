<?php
require_once("PHPMailer-master\PHPMailerAutoload.php");
require 'PHPMailer-master/vendor/autoload.php';
/*require 'PHPMailerAutoload.php';
require 'class.phpmailer.php';*/

$mail = new PHPMailer();

$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP
$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
$mail->Username = 'stechgrupo@gmail.com'; // Usuário do servidor SMTP
$mail->Password = 'Senai115'; // Senha do servidor SMTP
$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->Host = 'relay-hosting.secureserver.net';
$mail->Port = 587;
$mail->SMTPAuth = false;
$mail->SMTPSecure = false;

$mail->From = "stechrecados@gmail.com"; // Seu e-mail
$mail->FromName = "Emails"; // Seu nome

$mail->AddAddress('stechgrupo@gmail.com', 'STECH');
//$mail->AddAddress('ciclano@site.net');
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)

$mail->Subject  = 'subject'; // Assunto da mensagem
$mail->Body = "Este é o corpo da mensagem de teste, em <b>HTML</b>!  :)";
$mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n :)";
// Define os anexos (opcional)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
// Envia o e-mail
$enviado = $mail->Send();

$mail->ClearAllRecipients();
$mail->ClearAttachments();

if ($enviado) {
  echo "E-mail enviado com sucesso!";
} else {
  echo "Não foi possível enviar o e-mail.";
  echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
}
