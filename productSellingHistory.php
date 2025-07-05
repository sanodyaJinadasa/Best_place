<?php
require "adminheader.php";
require "connection.php";
// if(isset($_SESSION["r"])){

// }
$from = $_GET["f"];
$to = $_GET["t"];

?>


<!DOCTYPE html>

<html>

<head>
    <title>Best Place | Admin | product selling history</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="resources//bestplace.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body style="background-color: #74ebd5; background-image: linear-gradient(90deg,#74ebd5 0%, #9face6 100%);min-height: 100px;">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 bg-light text-center rounded">
                <label class="form-label fs-2 fw-bold text-primary">Product Selling History</label>
            </div>

            <div class="col-12  mt-3 mb-2">
                <div class="row">
                    <div class="col-2 col-lg-2 bg-primary pt-2 pb-2 text-end d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Order ID</span>
                    </div>
                    <div class="col-3 bg-light pt-2 pb-2 fw-bold d-none d-lg-block">
                        <span class="fs-4 fw-bold">Product</span>
                    </div>
                    <div class="col-6 col-lg-3 bg-primary pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Buyer</span>
                    </div>
                    <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold">Price</span>
                    </div>
                    <div class="col-6 col-lg-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Quantity</span>
                    </div>

                </div>
            </div>


            <?php

            if (!empty($from) && empty($to)) {
                $fromrs = Database::search("SELECT * FROM `invoice`");
                $fn = $fromrs->num_rows;

                for ($x = 0; $x < $fn; $x++) {
                    $fr = $fromrs->fetch_assoc();
                    $fromdate = $fr["date"];

                    $splitdate = explode(" ", $fromdate);
                    $date = $splitdate[0];

                    //                     echo $from;
                    // echo $date;
                    if ($from = $date) {
                        //    echo $fr["order_id"];
                        //    echo "<br/>";

            ?>
                        <div class="col-12 mb-2">
                            <div class="row">

                                <div class="col-12 col-lg-2 bg-primary pt-2 pb-2 text-end">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-0 d-block d-lg-none">Order ID</span>
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-12"><?php echo $fr["order_id"]; ?></span>
                                    </div>
                                </div>


                                <?php
                                $pid = $fr["product_id"];
                                $product = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
                                $pr = $product->fetch_assoc();
                                ?>

                                <div class="col-12 col-lg-3 bg-light pt-2 pb-2">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-dark col-6 col-lg-0 d-block d-lg-none">Product</span>
                                        <span class="fs-5 fw-bold text-dark col-6 col-lg-12"><?php echo $pr["title"]; ?></span>
                                    </div>
                                </div>



                                <div class="col-12 col-lg-3 bg-primary pt-2 pb-2">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-0 d-block d-lg-none">Buyer</span>
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-12">Sanodya V. Jinadasa</span>
                                    </div>
                                </div>


                                <div class="col-12 col-lg-2 bg-light pt-2 pb-2">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-dark col-6 col-lg-0 d-block d-lg-none">Product</span>
                                        <span class="fs-5 fw-bold text-dark col-6 col-lg-12"><?php echo $pr["price"]; ?></span>
                                    </div>
                                </div>


                                <div class="col-12 col-lg-2 bg-primary pt-2 pb-2">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-0 d-block d-lg-none">Quantity</span>
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-12"><?php echo $fr["qty"]; ?></span>
                                    </div>
                                </div>

                            </div>
                        </div>




                    <?php
                    }
                }
            } else if (!empty($from) && !empty($to)) {
                $betweenrs = Database::search("SELECT * FROM `invoice`");

                $bn = $betweenrs->num_rows;

                // if ($bn > 0) {

                for ($y = 0; $y < $bn; $y++) {
                    $br = $betweenrs->fetch_assoc();
                    $brs = $br["date"];

                    $splitdate = explode(" ", $brs);
                    $date = $splitdate[0];

                    if ($from <= $date && $to >= $date) {
                    ?>

                        <div class="col-12 mb-2">
                            <div class="row">

                                <div class="col-12 col-lg-2 bg-primary pt-2 pb-2 text-end">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-0 d-block d-lg-none">Order ID</span>
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-12"><?php echo $br["order_id"]; ?></span>
                                    </div>
                                </div>


                                <?php
                                $pid = $br["product_id"];
                                $product = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
                                $pr = $product->fetch_assoc();
                                ?>
                                <div class="col-12 col-lg-3 bg-light pt-2 pb-2">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-dark col-6 col-lg-0 d-block d-lg-none">Product</span>
                                        <span class="fs-4 fw-bold text-dark col-6 col-lg-12"><?php echo $pr["title"]; ?></span>
                                    </div>
                                </div>


                                <div class="col-12 col-lg-3 bg-primary pt-2 pb-2">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-0 d-block d-lg-none">Buyer</span>
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-12">Sanodya V. Jinadasa</span>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-2 bg-light pt-2 pb-2">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-dark col-6 col-lg-0 d-block d-lg-none">Product</span>
                                        <span class="fs-5 fw-bold text-dark col-6 col-lg-12"><?php echo $pr["price"]; ?></span>
                                    </div>
                                </div>

                             
                                <div class="col-12 col-lg-2 bg-primary pt-2 pb-2">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-0 d-block d-lg-none">Quantity</span>
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-12"><?php echo $br["qty"]; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php
                    }
                    // }
                }
            } else {
                $todayrs = Database::search("SELECT * FROM `invoice`");
                $tn = $todayrs->num_rows;
                for ($z = 0; $z < $tn; $z++) {
                    $tr = $todayrs->fetch_assoc();
                    $nodate = $tr["date"];

                    $splitdate = explode(" ", $nodate);
                    $date = $splitdate[0];
                    //$today=$date("Y-m-d");
                    if ($today = $date) {
                    ?>

                        <div class="col-12 mb-2">
                            <div class="row">

                                <div class="col-12 col-lg-2 bg-primary pt-2 pb-2 text-end">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-0 d-block d-lg-none">Order ID</span>
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-12"><?php echo $tr["order_id"]; ?></span>
                                    </div>
                                </div>

                                <?php
                                $pid = $tr["product_id"];
                                $product = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
                                $pr = $product->fetch_assoc();
                                ?>
                                <div class="col-12 col-lg-3 bg-light pt-2 pb-2">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-dark col-6 col-lg-0 d-block d-lg-none">Product</span>
                                        <span class="fs-5 fw-bold text-dark col-6 col-lg-12"><?php echo $pr["title"]; ?></span>
                                    </div>
                                </div>


                                <div class="col-12 col-lg-3 bg-primary pt-2 pb-2">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-0 d-block d-lg-none">Buyer</span>
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-12">Sanodya V. Jinadasa</span>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-2 bg-light pt-2 pb-2">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-dark col-6 col-lg-0 d-block d-lg-none">Product</span>
                                        <span class="fs-5 fw-bold text-dark col-6 col-lg-12"><?php echo $pr["price"]; ?></span>
                                    </div>
                                </div>

                              
                                <div class="col-12 col-lg-2 bg-primary pt-2 pb-2">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-0 d-block d-lg-none">Quantity</span>
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-12"><?php echo $tr["qty"]; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>


        </div>
    </div>
<?php
                    } else {
                        echo "You haven't sell anything today";
                    }
                }
            }

?>

<div class="col-12 mb-2">
    <div class="row">


        <div class="col-12 mb-3 text-center">
            <div class="offset-1  col-10 d-flex justify-content-center ">
                <div class="pagination">
                    <a href="#">&laquo;</a>

                    <a href="#" class="ms-1 active">1</a>
                    <!-- <a href="#" class="ms-1">2</a>
                    <a href="#" class="ms-1">3</a>
                    <a href="#" class="ms-1">4</a>
                    <a href="#" class="ms-1">5</a> -->

                    <a href="#">&raquo;</a>
                </div>
           


    </div>
</div>
<div class="mtt">

</div>

<script src="script.js"></script>
<script src="bootstrap.bundle.js"></script>
</body>

</html>
<?php
require "footer.php";
?>