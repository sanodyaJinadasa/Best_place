<?php
require "connection.php";
$id=$_GET["id"];

$watchrs=Database::search("SELECT * FROM  `invoice` WHERE `id`='".$id."'");
$watchrow=$watchrs->fetch_assoc();

$pid=$watchrow["product_id"];
$mail=$watchrow["user_email"];

Database::iud("INSERT INTO `recent`(`product_id`,`user_email`) VALUES('".$pid."','".$mail."')");
//echo "PRODUCT ADDED TO THE RECENT";
Database::iud("DELETE FROM `invoice` WHERE`id`='".$id."'");
echo "success";
?>