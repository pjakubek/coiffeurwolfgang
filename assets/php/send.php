<?php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $from = 'FROM:' . $mail;
  $to = 'mikeschwenzner@gmail.com';
  $subject = 'Neue Nachricht von' . $name;

  $body = "von: $name \n E-Mail: $mail \n Nachricht: $message";

  if ($name = '') {
    $statusname = 0;
  } else {
    $statusname = 1;
  }

  if($email = '' || preg_match("/([w-]+@[w-]+.[w-]+)/",$_POST['email']) {
      $statusmail = 0;
    }else{
      $statusmail = 1;
    }
  }

  if($message = '') {
    $statusmessage = 0;
   }else{
      $statusmessage = 1;
    }
  }


  if ($_POST['submit']) {
        header('Location: contact.html');
    mail ($to, $subject, $body, $from)

    } else {
    $echo = '<p>Ups, da ist wohl etwas schief gelaufen!</p>';
    }

  }
 ?>
