<?php
    //use PHPMailer\PHPMailer\PHPMailer;
    //use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    printf ("save to database \n");
    $from="tonysunyueran@gmail.com";
    $subject=$_POST['subject'];
    $email_body=$_POST['elvisemail'];
    

    $db= mysqli_connect('localhost','root','tonysunyueran','elvis_store') ;
    printf ("connect database \n");

    $query= "SELECT * from email_list";
    echo "form query \n";

    $result= mysqli_query($db, $query) or  die("Failed to query database.");
    echo "implement query \n";

    while($row=mysqli_fetch_array($result)){
        //$row=mysqli_fetch_array($result);
        echo "implement fetch \n";
        $first_name=$row['first_name'];
        $last_name=$row['last_name'];

        //$msg="Dear $first_name $last_name\n $email_body";
        $msg="haha";
        $to=$row['email'];

        echo "send to:" . $to. "haha";

        echo "start implemnt email";
        $mail = new PHPMailer();
        $mail->  SMTPDebug=2;
        $mail ->  isSMTP();
        $mail ->  Host='smtp.gmail.com';
        $mail ->  SMTPAuth =true;
        $mail ->  Username='tonysunyueran@gmail.com';
        $mail ->  Password= 'bierewo199274';
        $mail ->  SMTPSecure ='tls';
        $mail ->  Port =587;

        $mail ->  setFrom($from);
        $mail ->  addAddress($to);

        $mail ->  addReplyTo($to);
        $mail ->  Subject=$subject;
        $mail ->  Body=$msg;
        $mail ->  send();

        echo "email complete";
        }

    mysqli_close($db);



?>