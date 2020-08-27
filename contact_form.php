<?php

$para = "stechrecados@gmail.com";

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

        $corpo = "<strong>Mensagem de contato</strong><br><br>";
        $corpo .="<br><strong>Nome: </strong> $name";
        $corpo .="<br><strong>Email: </strong> $email";
        $corpo .="<br><strong>Assunto </strong> $subject";
        $corpo .="<br><strong>Message: </strong> $message";
        
        $header="From: $email Reply-to:$email";
        $header .= "Content-Type: text/html; charset= utf-8";
        
mail($para,$subject,$corpo,$header);        
header("location:index.html.php?message=enviado");

 $error_message="";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    
    if(!preg_match($email_exp, $email)){
        $error_message .='O email digitado parece não ser válido, porfavor, redigite-o <br />';
    }
    $string_exp = "/^[A-Za-z .'-]+$/";
    
    if(!preg_match($string_exp, $name)){
        $error_message .= 'Digite apenas caracteres válidos <br />';
    }
    
    if(strlen($subject) <2){
        $error_message .='Porfavor, digite um assunto com no minimo 2 caracteres';
    }
    
    if(strlen($error_message) > 0){
        died($error_message);
    }
    
    $email_message = "Detalhes do formulário abaixo. \n\n";
    
    function clean_string($string){
        $bad = array("content-type", "bcc:","para:","cc:","href");
        return str_replace($bad,"",$string);
        
    }
    
    $email_message .= "Nome: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Assunto: ".clean_string($subject)."\n";
    $email_message .= "Mensagem: ".clean_string($message)."\n";
?>