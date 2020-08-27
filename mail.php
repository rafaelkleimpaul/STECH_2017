<?php
if(isset($_POST['email'])){
    
    $email_to = "stechrecados@gmail.com";
    $email_subject = $_POST['subject'];
    
    function died($error){
        //caso de erro
        echo "Desculpa mas ocorreu um erro.";
        echo "Segue os erros abaixo. <br /> <br />";
        echo $error. "<br /><br />";
        echo "Porfavor, revise os campos e preencha novamente";
        die();
    }
    
    //Validando os campos
    if(!isset($_POST['name']) ||
        !isset($_POST['email'])||
        !isset($_POST['subject'])||
        !isset($_POST['message'])){
        died('Desculpa, porem há algode errado, preencha novamente');
    }
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message =$_POST['message'];
    
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
    
    $headers = 'De: ' .$email. "\r\n".
            'Para: '.$email."\r\n" .
            'X-Mailer: PHP/' . phpversion();
            @mail($email, $subject, $message, $headers);

    
}
?>
<?php/*require_once("class/class.phpmailer.php");

$mail = new PHPMailer(true);

$mail ->IsSMPT();
try{
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    $mail->Username = 'grupostech@gmail.com';
    $mail->Password='Senai115';
    
     $mail->SetName("$name"); 
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
*/
 ?>

 
