<?php

session_start();
require "connection.php";
if (isset($_SESSION["u"])) {

    $oid = $_POST["oid"];

    $pid = $_POST["pid"];
    $email = $_POST["email"];
    $total = $_POST["total"];
    $pqty = $_POST["pqty"];
    //echo $email;
    //echo $oid;
    // echo $pid;
    //echo $total;
    //echo $pqty;
    //$oid="1";
    $pid = "23";
    ///$email="sanodyaj@gmail.com";
    //$total="33";
    //$pqty="2";

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimeZone($tz);
    $date = $d->format("Y-m-d H:i:s");


    $crtrs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "'");
    $nr = $crtrs->num_rows;

    $addressrs = database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $email . "'");
    $ar = $addressrs->fetch_assoc();
    $district = database::search("SELECT * FROM `location` WHERE `id`='" . $ar["location_id"] . "'");
    $dr = $district->fetch_assoc();

    for ($x = 0; $x < $nr; $x++) {

        $cr = $crtrs->fetch_assoc();
        //echo $cr["product_id"];

        $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cr["product_id"] . "'");
        $pn = $productrs->fetch_assoc();

        if ($dr["district_id"] == '2') {
            $total = $pn["price"] * $cr["qty"] + $pn["delivery_fee_colombo"];
        } else {
            $total = $pn["price"] * $cr["qty"] + $pn["delivery_fee_other"];
        }


        $qty = $pn["qty"];
        $newqty = $qty - $pqty;
        Database::iud("UPDATE `product` SET `qty`='" . $newqty . "'  WHERE `id`='" . $cr["product_id"] . "'");


        Database::iud("INSERT INTO `invoice` (`order_id`,`date`,`user_email`,`product_id`,`total`,`qty`) VALUES ('" . $oid . "','" . $date . "','" . $email . "','" . $cr["product_id"] . "','" . $total . "','" . $cr["qty"] . "');");
    }

    // $productrs=Database::search("SELECT * FROM `product` WHERE `id`='".$pid."'");
    // $pn=$productrs->fetch_assoc();

    // $qty=$pn["qty"];
    // $newqty=$qty-$pqty;
    // Database::iud("UPDATE `product` SET `qty`='".$newqty."'  WHERE `id`='".$pid."'");



    //echo $date;

    echo "1";
}
