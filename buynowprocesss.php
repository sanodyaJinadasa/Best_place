<?php

session_start();
require "connection.php";
if(isset($_SESSION["u"])){
    $end=$_GET["end"];
  // echo $end;
    $umail=$_SESSION["u"]["email"];

   $array;

$orderID=uniqid();

// $productrs=Database::search("SELECT * FROM `product` WHERE `id`='".$id."'");
// $pr=$productrs->fetch_assoc();

$addressrs=Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='".$umail."'");

$cn=$addressrs->num_rows;
if($cn==1){
    $ar=$addressrs->fetch_assoc();

    $ass=$ar["line1"].",".$ar["line2"];

    $cityid=$ar["location_id"];

$districtrs=Database::search("SELECT * FROM `location` WHERE `city_id`='".$cityid."'");
$xr=$districtrs->fetch_assoc();
$districtid=$xr["district_id"];

$delivery="0";

// if($districtid=="2"){
//     $delivery=$pr["delivery_fee_colombo"];

// }else{
//     $delivery=$pr["delivery_fee_other"];
  
// }

// $item=$pr["title"];
$amount=$end ;

$fname=$_SESSION["u"]["fname"];
$lname=$_SESSION["u"]["lname"];
$mobile=$_SESSION["u"]["mobile"];
$address=$ar["line1"]." ".$ar["line2"];
$city=$ar["line1"];

$array['id']=$orderID;
// $array['item']=$item;
$array['amount']=$amount;
$array['fname']=$fname;
$array['lname']=$lname;
$array['email']=$umail;
$array['mobile']=$mobile;
$array['address']=$address;
$array['city']=$city;

echo json_encode($array);

}else{

echo "2";
}

    }else{
        echo "1";
    }




?>