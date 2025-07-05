<?php
session_start();
require "connection.php";

if(isset($_SESSION["u"])){
    $uemail=$_SESSION["u"]["email"];

    
$ea = $_POST["ea"];
$cn = $_POST["cn"];
$msg = $_POST["msg"];
$status = 1;

if(empty($ea)){
    echo"Please enter your email";
}elseif(empty($cn)){
    echo"Please enter your mobile";
}elseif(strlen($cn)!=10){
    echo"Please enter 10 digit mobile number";
}elseif(preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/",$cn)==0){
    echo"Invalid mobile number";
}elseif(empty($msg)){
    echo"Please enter your message";
}else{
    if($uemail==$ea){
        Database::iud("INSERT INTO `chat` (`email`,`mobile`,`msg`,`msgpro`) VALUES('".$ea."','".$cn."','".$msg."','".$status."')");
        echo "success";
    }else{
        echo "Your email is incorrect";
    }

}
}


