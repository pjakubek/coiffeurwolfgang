<?php
if(isset($_POST['submit'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "pjakubek11@gmail.com";
    $email_subject = "Neue Nachricht von " . $_POST['name'];

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['email']) ||
        !isset($_POST['name']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }



    $email_from = $_POST['email']; // required
    $name = $_POST['name']; // required
    $message = $_POST['message']; // required


    $email_message = $name . " hat Ihnen folgende Nachricht gesendet: \n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



  //  $email_message .= "Name: ".clean_string($name)."\n";
    //$email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= $message ."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

header("Location: http://www.coiffeurwolfgang.com/development/de/index.html");
exit();

    if($mailSent) {
    echo '<script language="javascript">';
    echo 'alert("Ihre Nachricht wurde gesendet!");';
    echo 'window.location = "../../de/index.html";';
    echo '</script>';

    
    exit(); 
} else {
   
    echo '<script language="javascript">';
    echo 'alert("Tut uns leid, da ist wohl etwas schief gelaufen! Bitte kontrollieren Sie Ihre Eingaben!")';
    echo '</script>';
    header("Location: http://www.coiffeurwolfgang.com/development/de/contact.html");
}


}
?>
