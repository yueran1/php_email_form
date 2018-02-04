<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Aliens Abducted Me - Report an Abduction</title>
</head>
<body>
  <h2>Aliens Abducted Me - Report an Abduction</h2>

<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  //require 'PHPMailer-FE_v4.11/_lib/class.phpmailer.php';

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
  //require '../vendor/autoload.php';
  $name = $_POST['firstname'] . ' ' . $_POST['lastname'];
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $when_it_happened = $_POST['whenithappened'];
  $how_long = $_POST['howlong'];
  $how_many = $_POST['howmany'];
  $alien_description = $_POST['aliendescription'];
  $what_they_did = $_POST['whattheydid'];
  $fang_spotted = $_POST['fangspotted'];
  $email = $_POST['email'];
  $other = $_POST['other'];

  

  $to = 'tonysunyueran@gmail.com';
  $subject = 'Aliens Abducted Me - Abduction Report';
  $msg = "$name was abducted $when_it_happened and was gone for $how_long.\n" .
    "Number of aliens: $how_many\n" .
    "Alien description: $alien_description\n" .
    "What they did: $what_they_did\n" .
    "Fang spotted: $fang_spotted\n" .
    "Other comments: $other";

    $mail = new PHPMailer();
    $mail->  SMTPDebug=2;
    $mail ->  isSMTP();
    $mail ->  Host='smtp.gmail.com';
    $mail ->  SMTPAuth =true;
    $mail ->  Username='tonysunyueran@gmail.com';
    $mail ->  Password= 'bierewo199274';
    $mail ->  SMTPSecure ='tls';
    $mail ->  Port =587;

    $mail ->  setFrom($to);
    $mail ->  addAddress($to);

    $mail ->  addReplyTo($to);
    $mail ->  Subject=$subject;
    $mail ->  Body=$msg;
    $mail ->  send();
  
 // mail($to, $subject, $msg, 'From:' . $email);


 //Following code excute sql

 //Fitst establish the connection, second create query, finally close it.
 $db= mysqli_connect('localhost','root','tonysunyueran','aliendatabase');

 $query= "INSERT INTO aliens_abduction(first_name, last_name, when_it_happend, how_long, how_many,".
                  "alien_description, fang_spotted, other, email)".
                  "Values('$firstname','$lastname','$when_it_happend','$how_long','$how_many','$alien_description','$fang_spotted',".
                  "'$other','$email')";

  $result= mysqli_query($db,$query);

  mysqli_close($db);


  echo 'Thanks for submitting the form.<br />';
  echo 'You were abducted ' . $when_it_happened;
  echo ' and were gone for ' . $how_long . '<br />';
  echo 'Number of aliens: ' . $how_many . '<br />';
  echo 'Describe them: ' . $alien_description . '<br />';
  echo 'The aliens did this: ' . $what_they_did . '<br />';
  echo 'Was Fang there? ' . $fang_spotted . '<br />';
  echo 'Other comments: ' . $other . '<br />';
  echo 'Your email address is ' . $email;
?>

</body>
</html>
