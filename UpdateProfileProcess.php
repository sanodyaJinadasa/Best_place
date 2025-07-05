<?php
session_start();

require "connection.php";

if (isset($_SESSION["u"])) {
    $fname = $_POST["f"];
    $lname = $_POST["l"];
    $mobile = $_POST["m"];
    $line1 = $_POST["a1"];
    $line2 = $_POST["a2"];
    $city = $_POST["c"];
    $postalcode = $_POST["p"];
    //$img = $_FILES["i"];

    $d = new DateTime();

    $tz = new DateTimeZone("Asia/colombo");

    $d->setTimezone($tz);

    $date = $d->format("Y-m-d  H:i:s");




    if (empty($fname)) {
        echo "please enter your first name.";
    } else if (empty($lname)) {

        echo "please enter your last name.";
    } else if (empty($mobile)) {

        echo "please enter your mobile.";
    } else if (empty($line1)) {

        echo "please enter your address line1.";
    } else if (empty($line2)) {

        echo "please enter your address line 2.";
    } else if (empty($city)) {

        echo "please enter your city.";
    } elseif (empty($mobile)) {
        echo "Please enter your mobile";
    } elseif (empty($postalcode)) {
        echo "Please enter your postal code";
    } elseif (strlen($mobile) != 10) {
        echo "Please enter 10 digit mobile number";
    } elseif (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $mobile) == 0) {
        echo "Invalid mobile number";
    } else {
        if (empty($_FILES["i"])) {
            Database::iud("UPDATE `user` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`mobile`='" . $mobile . "' WHERE `email`='" . $_SESSION["u"]["email"] . "' ");
           // echo "| User table update ";

            $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
            $nr = $addressrs->num_rows;

            if ($nr >= 1) {
                $ucity = Database::search("SELECT `id` FROM  `city` WHERE `name`='" . $city . "'");
                $unr = $ucity->fetch_assoc();

                Database::iud("UPDATE `user_has_address` SET `line1`='" . $line1 . "',`line2`='" . $line2 . "',`location_id`='" . $unr["id"] . "'");
               // echo "|  address updated ";

                ////city//////

                $usermaill = $_SESSION["u"]["email"];
                $ad = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $usermaill . "'");
                $nn = $ad->num_rows;

                if ($nn == 1) {

                    $dd = $ad->fetch_assoc();

                    $cityid = $dd["location_id"];
                    $ucity = Database::search("SELECT * FROM `city` WHERE `id`='" . $cityid . "'");
                    $cc = $ucity->fetch_assoc();


                    Database::iud("UPDATE `city` SET `name`='" . $city . "',`postal_code`='" . $postalcode . "' WHERE `id`='" . $cc["id"] . "'");
                    //update
                    echo " Success ";
                } else {
                    //add new
                    $ucity = Database::search("SELECT `id` FROM  `city` WHERE `name`='" . $city . "'");
                    $unr = $ucity->fetch_assoc();
                    Database::iud("INSERT INTO `user_has_address`(`user_email`,`line1`,`line2`,`location_id`) VALUES ('" . $_SESSION["u"]["email"] . "','" . $line1 . "','" . $line2 . "','" . $unr["id"] . "')");

                 //   echo "NEW address added";
                }
            } else {
                //add new
                $ucity = Database::search("SELECT `id` FROM  `city` WHERE `name`='" . $city . "'");
                $unr = $ucity->fetch_assoc();
                Database::iud("INSERT INTO `user_has_address`(`user_email`,`line1`,`line2`,`location_id`) VALUES ('" . $_SESSION["u"]["email"] . "','" . $line1 . "','" . $line2 . "','" . $unr["id"] . "')");

//echo "NEW address added";
            }
        } else {

            $pimg = Database::search("SELECT * FROM  `profile_img` WHERE `user_email`='" .$_SESSION["u"]["email"]. "'");
            $pimgrow = $pimg->num_rows;

            if($pimgrow>0){

                $img = $_FILES["i"];
                $fileName = "resources//profilephoto//" . uniqid() . ".png";
                //      echo $fileName;
                move_uploaded_file($img["tmp_name"], $fileName);
    
                //     echo "image moved successesfully";
                Database::iud("UPDATE `profile_img` SET `code`='" . $fileName . "' WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
    
                //echo "image saved successesfully  ";

            }else{
            
            $img = $_FILES["i"];
            $fileName = "resources//profilephoto//" . uniqid() . ".png";
            //      echo $fileName;
            move_uploaded_file($img["tmp_name"], $fileName);

            //     echo "image moved successesfully";
            Database::iud("INSERT INTO `profile_img`(`code`,`user_email`) VALUES ('" . $fileName . "','" . $_SESSION["u"]["email"] . "')");

           // echo "image saved successesfully  ";
            }
        }
    }
}
//  echo $fname;
//     echo $lname;
//    echo $mobile;
//    echo $line1;
//    echo $line2;
//    echo $city;
//    echo $img;
