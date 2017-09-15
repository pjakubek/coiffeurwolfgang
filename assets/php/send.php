<?php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $from = 'FROM:' . $mail;
  $to = 'mikeschwenzner@gmail.com';
  $subject = 'Neue Nachricht von' . $name;

  $body = "von: $name \n E-Mail: $mail \n Nachricht: $message";

  if ($name = '') {
    $statusname = false
  } else {
    $statusname = true
  }

  if($email = '' || preg_match("/([w-]+@[w-]+.[w-]+)/",$_POST['email']) {
      $statusmail = false
    } else {
      $statusmail = true
    }
  }

  if($message = '') {
    $statusmessage = true
   } else {
      $statusmessage = false
    }
  }


  $checkVars = array($statusname, $statusmail, $statusmessage);
  $var = 1;


  if ($_POST['submit']) {
    if(in_array($var, $checkVars)){
      header('Location: contact.html')
      mail ($to, $subject, $body, $from)
    } else {
    $echo = '<p>Ups, da ist wohl etwas schief gelaufen!</p>'
  } else {
    $echo = '<p>Ups, da ist wohl etwas schief gelaufen!</p>'
  }

  }
 ?>
