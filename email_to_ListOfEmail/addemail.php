<?php

    printf ("save to database \n");
    $first_name=$_POST['firstname'];
    $last_name=$_POST['lastname'];
    $email =$_POST['email'];

    $db= mysqli_connect('localhost','root','tonysunyueran','elvis_store') ;
    printf ("connect database \n");

    $query= "INSERT INTO email_list(first_name,last_name, email)".
    "VALUES('$first_name', '$last_name', '$email')";
    echo "form query \n";

    $result= mysqli_query($db, $query) or  die("Failed to query database.");
    echo "implement query \n";

    mysqli_close($db);



?>