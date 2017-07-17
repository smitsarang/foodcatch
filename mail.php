<?php 
if(isset($_POST['submit'])){
    $to = "smitsarang198@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $subject = "Form submission";
    $message = "Thank You for registering Mr/Mrs." . $name . "\n\n" ;
    $headers = "From:" . $from;
    $headers1 ="From:" . $to;
    mail($to,$subject,$message,$headers);
       mail($from,$subject,$message,$headers1); // sends a copy of the message to the sender
 
    }
?>  