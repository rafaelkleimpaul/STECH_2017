<?php
if(isset($_POST['email'])) {

    $email_to = "stechgrupo@gmail.com";
    $email_subject = $_POST['subject'];
 
    function died($error) {

        echo "Desculpa, porem ocorreu um erro durante o envio do formulario ";
        echo "Os erros aparecem abaixo.<br /><br />";
        echo $error."<br /><br />";
        echo "Porfavor, arrume os erros e tente novamente.<br /><br />";
        die();
    }
 
 
    //Validando a existencia dos dados
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['message'])) {
        died('Algo esta errado, confira os dados novamente.');       
    }
     
 
    $name = $_POST['name']; 
    $email_from = $_POST['email'];
    $subject = $_POST['subject']; 
    $message = $_POST['message']; 
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'O email inserido nao parece valido.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'O nome nao parece valido.<br />';
  }
 
  if(strlen($subject) < 2) {
    $error_message .= 'Coloque um assunto de no minimo 3 caracteres.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Detalhes do formulario.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Nome: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Assunto: ".clean_string($subject)."\n";
    $email_message .= "Mensagem: ".clean_string($message)."\n";


//Header 
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>

Thank you for contacting us. We will be in touch with you very soon.
 
<?php
 
}
?>