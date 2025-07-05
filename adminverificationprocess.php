<?php
session_start();

require "connection.php";
use PHPMailer\PHPMailer\PHPMailer;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
require 'OAuth.php';




if (isset($_POST["e"])) {

    $email = $_POST["e"];

    if (empty($email)) {

        echo "Please enter your email address";
    } else {
        $adminrs = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $email . "' ");

        $an = $adminrs->num_rows;

        if ($an == 1) {
            $code = uniqid();
            Database::iud("UPDATE `admin` SET `verification`='" . $code . "' WHERE `email`='" . $email . "' ");
           
            
        //    $mail = new PHPMailer;
        //    $mail->IsSMTP();
        //    $mail->Host = 'smtp.gmail.com';
        //    $mail->SMTPAuth = true;
        //    $mail->Username = 'sanodyaj@gmail.com';
        //    $mail->Password = 'Lakshmis123';
        //    $mail->SMTPSecure = 'ssl';
        //    $mail->Port = 465;
        //    $mail->setFrom('sanodyaj@gmail.com', 'eShop');
        //    $mail->addReplyTo('sanodyav@gmail.com', 'eshop');
        //    $mail->addAddress($email);
        //    $mail->isHTML(true);
        //    $mail->Subject = 'eShop Forgot Password Verification Code';
        //    $bodyContent = '<h1 style="color:red;" >Your Verification code : '.$code.' </h1>';
        //    $mail->Body    = $bodyContent;
            
        //     if(!$mail->send()) { 
        //         echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
        //     } else { 
        //         echo 'Success';
        //     } 
            //email code
            $mail = new PHPMailer; 
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true; 
            $mail->Username = 'sanodyav@gmail.com'; 
            $mail->Password = 'Lakshmis123';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('sanodyav@gmail.com', 'best place'); 
            $mail->addReplyTo('sanodyav@gmail.com', 'best place'); 
            $mail->addAddress($email); 
            $mail->isHTML(true); 
            $mail->Subject = 'best place Forgot Password Verification Code'; 
            $bodyContent = '<h1 style="color:red;">Admin Verification Code : '.$code.'</h1>'; 
            $mail->Body    = $bodyContent; 
    
            if(!$mail->send()) { 
                echo 'Verification code sending fail'.$mail->ErrorInfo; 
            } else { 
                echo 'Success'; 
            } 
    

        } else {
            echo "Invalid user";
        }
    }
} else {
    echo "Please enter your email address";
}