<?php
session_start();
require "connection.php";
$u = $_SESSION["u"];

Database::iud("DELETE FROM `invoice` WHERE `user_email`='".$u."'");
echo "success";
?>