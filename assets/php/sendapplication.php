<?php
if(isset($_POST['submit'])) {
    error_reporting(E_NOTICE | E_ERROR);
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "pjakubek11@gmail.com";
    $email_subject = "Neue Nachricht von " . $_POST['name'];
    $email_from = $_POST['email']; // required
    $name = $_POST['name']; // required
    $message = $_POST['message']; // required
    
    $target_dir = "/home/.sites/17/site7248945/tmp";


    

    // your form-handling code
    $file_name = $_FILES['file_upload']['name'];
    
    echo "<PRE>" . print_r ($_FILES, true) . "</PRE>";
    
    $file_tmp_name = $_FILES['file_upload']['tmp_name'];
    $file_size = $_FILES['file_upload']['size'];
    $file_type = $_FILES['file_upload']['type'];
    $file_error = $_FILES['file_upload']['error'];
    
    if($file_error > 0)
    {
        die('Upload error or No files uploaded');
    }

    //read from the uploaded file & base64_encode content for the mail

    $handle = fopen($file_tmp_name, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $encoded_content = chunk_split(base64_encode($content));
  
     $boundary = md5("aide");
        //header
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "From:".$email_from."\r\n"; 
        $headers .= "Reply-To: ".$email_from."" . "\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
        
        //plain text 
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        $body .= chunk_split(base64_encode($message)); 
        
        //attachment
        $body .= "--$boundary\r\n";
        $body .="Content-Type: $file_type; name=".$file_name."\r\n";
        $body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
        $body .="Content-Transfer-Encoding: base64\r\n";
        $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
        $body .= $encoded_content; 




$sentMail = mail($email_to, $email_subject, $body, $headers);

    if($sentMail) //output success or failure messages
    {       
        die('Thank you for your email');
    }else{
        echo $email_to;
        echo $email_subject;
        echo $email_from;
        echo $name;
        echo $message;
        echo $file_tmp_name;
        echo $file_name;
        echo $file_error;

        die('Could not send mail! Please check your PHP mail configuration.'); 
   
    }

header("Location: http://www.coiffeurwolfgang.com/development/de/index.html");
exit();


}
?>
