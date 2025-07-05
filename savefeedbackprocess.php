<?php
session_start();
require "connection.php";
if(isset($_SESSION["u"])){

    $mail=$_SESSION["u"]["email"];
    $id=$_POST["i"];
    $txt=$_POST["ft"];
   
 //echo $txt;
    $d=new DateTime();
    $tz=new DateTimeZone("Asia/Colombo");
    $d->setTimeZone($tz);
    $date=$d->format("Y-m-d H:i:s");

      Database::iud("INSERT INTO `feedback` (`feed`,`date`,`product_id`,`user_email`) VALUES ('".$txt."','".$date."','".$id."','".$mail."')");
      echo "1";


}


?>