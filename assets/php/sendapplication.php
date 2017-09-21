<?php
if(isset($_POST['submit'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "pjakubek11@gmail.com";
    $email_subject = "Neue Bewerbung von " . $_POST['name'];

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
        !isset($_POST['address']) ||
        !isset($_POST['school']) ||
        !isset($_POST['birthdate']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }



    $email_from = $_POST['email']; // required
    $name = $_POST['name']; // required
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $school = $_POST['school'];
    $company = $_POST['company'];
    $awards = $_POST['awards'];
    $other = $_POST['other'];
    $birthdate = $_POST['birthdate'];
    $message = $_POST['message']; // required



    $email_message = $name . " hat sich bei Ihnen beworben: \n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n"."\n";
    $email_message .= "Geburtsdatum: ".clean_string($birthdate)."\n";
    $email_message .= "Geschlecht: ".clean_string($gender)."\n";
    $email_message .= "Adresse: ".clean_string($address)."\n"."\n";
    $email_message .= "Zuletzt besuchte Schule: ".clean_string($school)."\n";
    if($_POST['company'] != null) {
        $email_message .= "Lehrbetrieb: ".clean_string($company)."\n";
    } else {
        $email_message .= "BewerberIn möchte eine Lehre machen!" ."\n";
    }
    $email_message .= "Auszeichnungen: " .clean_string($awards) ."\n";
    $email_message .= "Sonstige Kenntnisse: " .clean_string($other) ."\n"."\n"."\n";
    $email_message .= "Motivationsschreiben: " .clean_string($message) ."\n";


// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
$mailSent = @mail($email_to, $email_subject, $email_message, $headers);

if($mailSent) {
    echo '<script language="javascript">';
    echo 'alert("Ihre Bewerbung wurde gesendet!");';
    echo 'window.location = "../../de/index.html";';
    echo '</script>';


    exit();
} else {

    echo '<script language="javascript">';
    echo 'alert("Tut uns leid, da ist wohl etwas schief gelaufen! Bitte kontrollieren Sie Ihre Eingaben!")';
    echo '</script>';
    header("Location: http://www.coiffeurwolfgang.com/development/de/career.html");
}



}
?>
