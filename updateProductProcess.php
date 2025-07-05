<?php
require "connection.php";

$id = $_POST["id"];
$title = $_POST["t"];
$condition = $_POST["co"];
$colour = $_POST["col"];
$qty = (int)$_POST["qty"];
$price = (int)$_POST["p"];
$dwc = (int)$_POST["dwc"];
$doc = (int)$_POST["doc"];
$description = $_POST["desc"];
//$imageFile = $_FILES["img"];

$d = new DateTime();
$tz = new DateTimeZone("Asia/colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d  H:i:s");

$state = 1;
$useremail = "tharushakavindi0103@gmail.com";




if (empty($title)) {
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
            Database::iud("UPDATE product SET
        title='" . $title . "',
        color_id='" . $colour . "',
        price='" . $price . "',
        qty='" . $qty . "',
        description='" . $description . "',
        condition_id='" . $condition . "',
        status_id='" . $state . "',
        datetime_added='" . $date . "',
        delivery_fee_colombo='" . $dwc . "',
        delivery_fee_other='" . $doc . "' WHERE id='" . $id . "';");

        echo "success";
        } else {

    $fileName = "resources//products//" . uniqid() . ".png";
    move_uploaded_file($imageFile["tmp_name"], $fileName);

    Database::iud("UPDATE images SET code='" . $fileName . "' WHERE product_id='" . $id . "';");

    echo "success";

    }

    // $last_id=Database::$connection->insert_id;

    // $fileName = "resources//products//" . uniqid() . ".png";
    // move_uploaded_file($imageFile["tmp_name"], $fileName);

    // Database::iud("UPDATE images SET code='" . $fileName . "' WHERE product_id='" . $id . "';");

}
