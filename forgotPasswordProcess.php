<?php

require "connection.php";

require 'Exception.php'; 
require 'PHPMailer.php'; 
require 'SMTP.php'; 
use PHPMailer\PHPMailer\PHPMailer; 

if(isset($_GET["e"])){

    $e = $_GET["e"];

    if(empty($e)){
        echo "Please enter your email address";
    } else {
        $rs =Database::search("SELECT * FROM `user` WHERE `email` = '".$e."'");

        if($rs->num_rows==1){
            $code = uniqid();

            Database::iud("UPDATE `user` SET `verification_code`='".$code."' WHERE `email`='".$e."'");

            // echo "Verification email sent";

            //email code

            $mail = new PHPMailer; 
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true; 
            $mail->Username = 'sanodyav@gmail.com'; 
            $mail->Password = 'Lakshmis123';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('sanodyav@gmail.com', 'best_place'); 
            $mail->addReplyTo('sanodyav@gmail.com', 'best_place'); 
            $mail->addAddress($e); 
            $mail->isHTML(true); 
            $mail->Subject = 'best_place Forgot Password Verification Code'; 
            $bodyContent = '<h1 style="color:red;">Your Verification Code : '.$code.'</h1>'; 
            $mail->Body    = $bodyContent; 

            if(!$mail->send()) { 
                echo 'Verification code sending fail'.$mail->ErrorInfo; 
            } else { 
                echo 'Success'; 
            } 

            //email code
        } else {
            echo "Email address not found";
        }
    }
}else{
    echo "Please enter your email address";
}
