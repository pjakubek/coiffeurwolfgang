<?php
$errors = '';
$myemail = 'peter.jakubek@outlook.com';//<-----Put Your email address here.
if(empty($_POST['email_address']) ||
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}
$email_address = $_POST['email_address'];
$message = $_POST['message'];
$subject = $_POST['subject'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
$to = $myemail;
$email_subject = "Contact form submission: $subject";
$email_body = "You have received a new message. ".
" Here are the details:\n Name: $email \n ".
"Email: $email_address\n Message \n $message";
$headers = "From: $myemail\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
header('Location: ../../de/contact.html');
print('alles gut');
}
?>
