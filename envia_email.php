<?php
 require_once "mail.php";
 
 $from="STECH Recados <stechrecados@gmail.com>";
 $to = "STECH <stechgrupo@gmail.com>";
 $subject=$_POST['subject'];
 $message=$_POST['message'];
 
 $host="smtp.gmail.com";
 $username="stechgrupo@gmail.com";
 $password = "Senai115";
 
 $headers = array('From' => $from,
     'To' => $to,
     'Subject' => $subject);
 
 $smtp = mail::factory('smtp',
         array('host' => $host,
             'auth' => true,
             'username'=>$username,
             'password'=>$password));
 
 $mail=$smtp->send($to, $headers,$body);
 
 if(PEAR::isError($mail)){
     echo("<p>" .$mail->getMessage()."</p>");
 }else{
     echo("<p>Sua mensagem foi enviada com sucesso");
 }
?>