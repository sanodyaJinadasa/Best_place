<?php
//echo "ok";
session_start();

require "connection.php";

if(isset($_SESSION["u"])){
    $id=$_GET["id"];
    $qtytxt=$_GET["txt"];
    $umail=$_SESSION["u"]["email"];
    //echo $id;
    //echo $qtytxt;
    //echo $umail;
    if (empty($qtytxt)){
        echo "Please Add Quantity";
    }else{
   if($qtytxt==0){
       echo "Please add a Quantity";
   }else{
    $cartrs=Database::Search("SELECT * FROM `cart` WHERE `user_email`='".$umail."' AND `product_id`='".$id."'");
    $cn=$cartrs->num_rows;
  //echo $cn;
    if($cn==1){
        echo "This product is already exits in your cart";

    }else{

        $productrs=Database::search("SELECT `qty` FROM `product` WHERE `id`='".$id."'");
        $pr=$productrs->fetch_assoc();

        if($pr["qty"]>=$qtytxt){
            Database::iud("INSERT INTO `cart` (`user_email`,`product_id`,`qty`) VALUES ('".$umail."','".$id."','".$qtytxt."')");
            echo "success";
        }else{
            echo "please enter a valid Quentity below -" .$pr['qty'].".";
        }
     
    }
   
   }
 
    }
   
}



?>