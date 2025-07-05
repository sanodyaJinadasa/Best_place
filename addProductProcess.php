<?php

require "connection.php";



$category = $_POST["c"];

$brand = $_POST["b"];

$model = $_POST["m"];

$title = $_POST["t"];

$condition = $_POST["co"];

$colour = $_POST["col"];

$qty = (int)$_POST["qty"];

$price = (int)$_POST["p"];

$dwc = (int)$_POST["dwc"];

$doc = (int)$_POST["doc"];

$description = $_POST["desc"];

$d = new DateTime();

$tz = new DateTimeZone("Asia/colombo");

$d->setTimezone($tz);

$date = $d->format("Y-m-d  H:i:s");



$state = 1;

$useremail = "sanodyaj@gmail.com";





if ($category == "0") {

    echo "please Select  a Category.";
} else if ($brand == "0") {

    echo "Please Select a Brand.";
} else if ($model == "0") {

    echo "please Select a model.";
} else if (empty($title)) {

    echo "please add a title.";
} else if (strlen($title) > 100) {

    echo "title Must Contain 100 or Lower Characters.";
} else if ($qty == "0" || $qty == "e") {

    echo "Please Add The Quentity Of Your product.";
} else if (!is_numeric($qty)) {

    echo "please add a valid Quantity.";
} else if (empty($qty)) {

    echo "please Add the Quentity of your Product.";
} else if ($qty < 0) {

    echo " please Add a Valid Quentity";
} else if (empty($price)) {

    echo "pleace add the Price of  Your Product";
} else if (!is_int($price)) {

    echo "please insert a valid price";
} else if (empty($dwc)) {

    echo "please insert the delivery cost inside colombo District";
} else if (!is_int($dwc)) {

    echo "please insert a valid price";
} else if (empty($doc)) {

    echo "please insert the delivery cost Outside colombo District";
} else if (!is_int($doc)) {

    echo "please insert a valid price";
} else if (empty($description)) {

    echo "please enter the description of your product";
} else {



    if (empty($_FILES["img"])) {
        echo "Please add a product Image.";
    } else {
        $modelHasBrand = Database::search("SELECT `id` FROM `model_has_brand` WHERE `brand_id`='" . $brand . "' AND `model_id`='" . $model . "'");



        if ($modelHasBrand->num_rows == 0) {

            echo "The Product Doesn't Exists";
        } else {

            $f = $modelHasBrand->fetch_assoc();

            $modelHasBrandId = $f["id"];



            Database::iud("INSERT INTO product(`category_id`,`model_has_brand_id`,`title`,`color_id`,`price`,`qty`,`description`,`condition_id`,`status_id`,`admin_email`,`datetime_added`,`delivery_fee_colombo`,`delivery_fee_other`)

    VALUES ('" . $category . "','" . $modelHasBrandId . "','" . $title . "','" . $colour . "','" . $price . "','" . $qty . "','" . $description . "','" . $condition . "','" . $state . "','" . $useremail . "','" . $date . "','" . $dwc . "','" . $doc . "');");

            $imageFile = $_FILES["img"];

            $last_id = Database::$connection->insert_id;


            $fileName = "resources//products//" . uniqid() . ".png";

            move_uploaded_file($imageFile["tmp_name"], $fileName);

            Database::iud("INSERT INTO `images`(`code`,`product_id`) VALUES ('" . $fileName . "','" . $last_id . "')");

            echo "success";
        }




        //echo "Product Added Successfully";




        //     $allowed_image_extention=array("jpg","png","svg");

        //     $file_extension=pathinfo($imageFile,PATHINFO_EXTENSION);



        //    if(!file_exists($imageFile)){

        //        echo "please Select An image";

        //     }else if(!in_array($file_extension,$allowed_image_extentionl)){

        //        echo "Please select a valid image";

        //     }else{

        //        echo $imageFile;

        //     }





        // $file_extension=$imageFile["type"];

        // if(isset($_FILES["img"])){





        //     if(!in_array($file_extension,$allowed_image_extention)){

        //         echo "please select a valid image";

        //     }else{

        //         echo $imageFile["name"];


        //     }

        // }else{

        //     echo "please select an image";

        // }



        // }

    }



    //echo $category;

    ///echo "<br/>";

    //echo $brand;

    //echo "<br/>";

    //echo $model;

    //echo "<br/>";

    //echo  $title;

    //echo "<br/>";

    //echo $condition ;

    //echo "<br/>";

    //echo $colour ;

    //echo "<br/>";

    //echo $qty ;

    ////echo "<br/>";

    //echo $price ;

    //echo "<br/>";

    //echo $dwc ;

    //echo "<br/>";

    //echo $doc ;

    //echo "<br/>";

    //echo $description ;

    //echo "<br/>";

    //echo $imagefile ;

}
