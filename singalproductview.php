<?php

require "connection.php";

if (isset($_GET["id"])) {
    $pid = $_GET["id"];

    $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
    $pn = $productrs->num_rows;

    if ($pn == 1) {
        $pd = $productrs->fetch_assoc();


?>
<!DOCTYPE html>
<html>

<head>

    <title>Best Place | Single Product View</title>
    <link rel="icon" href="resources/bestplace.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />


</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
                    require "header.php";
                    ?>
            <div class="col-12 mt-0 singleproduct">
                <div class="row">
                    <div class="bg-white" style="padding:11px;">
                        <div class="row">
                            <div class=" col-lg-2 order-lg-1 order-2">
                                <ul>

                                    <?php
                                            $imagesrs = Database::Search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                                            $in = $imagesrs->num_rows;

                                            $img1;

                                            if (!empty($in)) {

                                                for ($x = 0; $x < $in; $x++) {
                                                    $d = $imagesrs->fetch_assoc();


                                                    if ($x == 0) {
                                                        $img1 = $d["code"];
                                                    }

                                            ?>
                                    <li
                                        class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary">
                                        <img src="<?php echo $d["code"]; ?>" height="150px" class="mt-1 mb-1"
                                            id="pimg<?php echo $x; ?>" onclick="loadingmainimg(<?php echo $x; ?>);" />
                                    </li>

                                    <?php

                                                }
                                            } else {
                                                ?>
                                    <li
                                        class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary">
                                        <img src="resources/a.png" height="150px" class="mt-1 mb-1" />
                                    </li>
                                    <li
                                        class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary">
                                        <img src="resources/a.png" height="150px" class="mt-1 mb-1" />
                                    </li>
                                    <?php
                                            }
                                            ?>




                                </ul>
                            </div>
                            <div class="col-lg-4 order-2 order-lg-1 d-none d-lg-block">
                                <div
                                    class="d-flex flex-column align-items-center border border-1 border-secondary padding-3">
                                    <!-- <img src="resources/singleview/sp1.jpg" height="470px" class="mt-1 mb-1" /> -->
                                    <div>
                                        <img src="<?php echo $img1; ?>" width="450px" height="450px" class="mt-1 mb-1"
                                            id="mainimg" />
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 order-3">
                                <div class="row">
                                    <div class="col-12 ">
                                        <nav>
                                            <ol class="d-flex flex-wrap mb-0 list-unstyled bg-white rounded">
                                                <li class="breadcrumb-item">
                                                    <a href="home.php">Home</a>
                                                </li>
                                                <li class="breadcrumb-item active ">
                                                    <a href="#" class="text-black-50 text-decoration-none">single
                                                        view</a>
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>

                                    <div class="col-12 ">
                                        <label class="form-label fs-4 fw-bold mt-0"><?php echo $pd["title"]; ?></label>
                                    </div>
                                    <div class="col-12">
                                        <span class="badge badge-success">
                                            <i class="fa fa-star mt-1  text-warning fs-6"></i>
                                            <label class="text-dark fs-6">4.5 Star</label>
                                            <label class="text-dark fs-6">| 35 Ratings & 45 Reviews</label>
                                        </span>
                                    </div>
                                    <div class="d-inline-block col-12">
                                        <label class=" fw-bold  mt-1 fs-4"><?php echo $pd["price"]; ?>.00</label>
                                        <label class=" fw-bold  mt-1 fs-6 text-danger"><del><?php $a = $pd["price"];
                                                                                                    $newval = ($a / 100) * 5;
                                                                                                    $val = $a + $newval;
                                                                                                    echo $val; ?>
                                                .00</del></label>

                                    </div>
                                    <hr class="hrbreak1" />

                                    <div class="col-12">
                                        <label class=" text-primary fs-6"><b>Warrenty :</b> 06 months
                                            warrenty</label></br>
                                        <label class=" text-primary fs-6"><b>Return Policy :</b> 01 month return
                                            policy</label></br>
                                        <label class=" text-primary fs-6"><b>In Stock :</b><?php echo $pd["qty"]; ?>
                                            item
                                            left</label>
                                    </div>
                                    <hr class="hrbreak1" />
                                    <div clas="col-12">
                                        <label class=" text-dark fs-3"><b>Seller Details :</b>
                                        </label></br>

                                        <?php

                                                $userrs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $pd["admin_email"] . "'");
                                                $userd = $userrs->fetch_assoc();
                                                ?>
                                        <label class=" text-success fs-6"><b>Seller' name
                                                :</b><?php echo $userd["fname"] . " " . $userd["lname"]; ?>
                                        </label></br>
                                        <label class=" text-primary fs-6"><b>Seller's email
                                                :</b><?php echo $userd["email"]; ?></label></br>
                                        <label class=" text-primary fs-6"><b>Seller's mobile
                                                :</b><?php echo $userd["mobile"]; ?></label>
                                        <br />
                                        <!-- <button class="btn btn-secondary col-3" onclick='sendSellerEmail("<?php //echo $userd["email"];
                                                                                                                        ?>");'>Message</button> -->
                                        <br />
                                    </div>
                                    <br />
                                    <br />
                                    <hr class="hrbreak1" />

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 col-lg-10 rounded border border-1 border-success mt-1">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-3 col-lg-1">
                                                        <img src="resources/singleview/pricetag.png" />
                                                    </div>
                                                    <div class="col-md-9 col-sm-9 mt-1 pe-4 col-lg-11">
                                                        <label class="text-black-50">Stand a Chance to get instant 5%
                                                            discount by using
                                                            visa.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-12 mb-2">
                                        <div class="row" style="margin-top:15px;">
                                            <div class="col-md-6" style="margin-top:15px;">
                                                <label class="fs-6 mt-1 fw-bold">Colour Options :</label><br />
                                                <button class="btn btn-primary">black</button>
                                                <button class="btn btn-primary">Gold</button>
                                                <button class="btn btn-primary">blue</button>
                                            </div>
                                        </div>
                                    </div> -->

                                    <hr class="hrbreak1" />

                                    <div class="col-12 ">
                                        <div class="row" style="margin-top:15px;">
                                            <div class="col-md-6 " style="margin-top:15px; ">
                                                <div class="row">
                                                    <div
                                                        class=" border border-1 border-secondary rounded overflow-hidden float-start product_qty position-relative d-inline-block">
                                                        <span class="mt-2">QTY :</span>
                                                        <input id="qtyinput"
                                                            class=" border-0 fs-6 fw-bold text-start mt-1 mb-1 "
                                                            type="number" pattern="[0-9]*" value="1" />
                                                        <div class="position-absolute qty-buttons">
                                                            <div
                                                                class="d-flex flex-column align-items-center border border-1 border-secondary qtyin">
                                                                <i class="fas fa-chevron-up"
                                                                    onclick="qty_inc(<?php echo $pd['qty']; ?>);"></i>
                                                            </div>
                                                            <div
                                                                class="d-flex flex-column align-items-center border border-1 border-secondary qtyde">
                                                                <i class="fas fa-chevron-down" onclick="qty_dec();"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 col-lg-12">
                                        <div class="row">
                                            <div class="col-6 col-lg-3 d-grid">
                                           
                                                <button class="btn btn-primary d-block"
                                                    onclick="addToCart(<?php echo $pid; ?>);">Add to
                                                    cart</button>
                               
                                            </div>
                                            <div class="col-4 col-lg-3 d-grid">

                                                <button class="btn btn-success d-block" id="payhere-payment" type="submit" onclick="paynow(<?php echo $pid; ?>);">Buy
                                                    now</button>
                                            </div>
                                            <div class="col-2 col-lg-2 d-grid">
                                                <i class="fas fa-heart mt-3 fs-4 text-black-50"></i>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-12 bg-white">
                    <div
                        class="row d-block me-0 ms-0 mt-4 mb-3 border border-1 border-start-0 border-end-0 border-top-0 border-primary">
                        <div class="col-md-6">
                            <span class="fs-3 fw-bold">Related Items</span>

                        </div>
                    </div>

                    <!-- <div class="col-12 bg-white">
                                <div class="row">
                                    <div class="offset-1 col-10">
                                        <div class="row p-2">
                                            <?php

                                            //    $brandrs=Database::search("SELECT * FROM `model_has_brand` WHERE `id`='".$pd["model_has_brand_id"]."'");
                                            //    $bd=$brandrs->fetch_assoc();

                                            //    $brand=Database::search("SELECT * FROM `brand` WHERE `id`='".$bd["brand_id"]."' ");
                                            //$brandsid = Database::search("SELECT * FROM `product` LEFT JOIN model_has_brand ON product.model_has_brand_id=model_has_brand_id LIMIT 4");
                                            //$bds = $brandsid->num_rows;
                                            //for ($g = 0; $g < $bds; $g++) {
                                            // $bdf = $brandsid->fetch_assoc();
                                            //}

                                            ?>

                                            <div class="card me1" style="width: 18rem;">
                                                <img src="resources/singleview/sp1.jpg" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php //echo $bdf["title"]; 
                                                                            ?></h5>
                                                    <p class="card-text">
                                                        <?php //echo $bdf["price"]; 
                                                        ?></p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                    <a href="#" class="btn btn-primary" id="payhere-payment" type="submit">Buy
                                                        Now</a>
                                                    <a href="#" class="me-1 mt-1 fs-5">
                                                        <i class="fas fa-heart mt-1 fs-4 text-black-50"></i>
                                                    </a>
                                                </div>
                                            </div>



                                            <div class="card me1" style="width: 18rem;">
                                                <img src="resources/singleview/sp3.jpg" class="card-img-top" height="260px" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php //echo $bdf["title"]; 
                                                                            ?></h5>
                                                    <p class="card-text">
                                                        Rs. 100000.00</p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                    <a href="#" class="btn btn-primary">Buy Now</a>
                                                    <a href="#" class="me-1 mt-1 fs-5">
                                                        <i class="fas fa-heart mt-1 fs-4 text-black-50"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="card me1" style="width: 18rem;">
                                                <img src="resources/singleview/sp2.jpg" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">iPhone 12</h5>
                                                    <p class="card-text">
                                                        Rs. 400000.00</p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                    <a href="#" class="btn btn-primary">Buy Now</a>
                                                    <a href="#" class="me-1 mt-1 fs-5">
                                                        <i class="fas fa-heart mt-1 fs-4 text-black-50"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="card me1" style="width: 18rem;">
                                                <img src="resources\mobile images\huawei_p20.png" height="260px" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Huawei</h5>
                                                    </h5>
                                                    <p class="card-text">
                                                        Rs. 350000.00</p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                    <a href="#" class="btn btn-primary">Buy Now</a>
                                                    <a href="#" class="me-1 mt-1 fs-5">
                                                        <i class="fas fa-heart mt-1 fs-4 text-black-50"></i>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div> -->
                    <?php
                            $rs = Database::search("SELECT * FROM `category`");
                            $n = $rs->num_rows;


                            //for ($x = 0; $x < 4; $x++) {
                                $c = $rs->fetch_assoc();
                            ?>
                    <!-- <div class="col-12">
                                    <a class="link-dark link2" href="phone.php"><?php //echo $c["name"]; ?></a>&nbsp;&nbsp;
                                    <a class="link-dark link3" href="phone.php">See All &rightarrow;</a>
                                </div> -->
                    <?php

                                //$resultset = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $c["id"] . "' ORDER BY `datetime_added` DESC LIMIT 10 OFFSET 3");
                                $resultset = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $c["id"] . "'");

                                ?>

                    <!------ product view--->
                    <div class="col-12">
                        <div class="row border mb-1">
                            <div class="col-12">
                                <!-- <div class="row row-cols-12 ms-5 row-cols-md-3 row-cols-lg-5 g-5 offset-lg-1 col-12 col-lg-10" id="pdetails"> -->
                                <div class="row m-auto" id="pdetails">


                                    <?php

                                                //$nr = $resultset->num_rows;
                                                for ($y = 0; $y < 4; $y++) {
                                                    $prod = $resultset->fetch_assoc();
                                                ?>

                                    <!-- <div class="card col-6 col-lg-3 mt-6  ms-1  " style="width: 17rem; "> -->
                                    <div class="card col-6 col-lg-3 m-auto" style="width: 17rem; ">
                                        <?php
                                                        $pimage = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $prod["id"] . "'");
                                                        $imgrow = $pimage->fetch_assoc();
                                                        ?>

                                        <div class="card">

                                            <img src="<?php echo $imgrow["code"]; ?>" class="card-img-top cardtopimg" />
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $prod["title"] ?><span
                                                        class="badge bg-info">New</span></h5>
                                                <span
                                                    class="card-text text-primary"><?php echo  $prod["price"] ?></span>
                                                <br />


                                                <?php
                                                                $pstatus = Database::search("SELECT * FROM `status` WHERE `id`='" . $prod["status_id"] . "'");
                                                                $statusrow = $pstatus->fetch_assoc();

                                                                if ((int)$prod["qty"] > 0) {
                                                                ?>

                                                <span class="card-text text-warning"><b>In Stock</b></span>
                                                <input type class="form-cotrol mb-1" type="number"
                                                    id="qtytxt<?php echo $prod['id']; ?>" value="1" />
                                                <a href="<?php echo "singalproductview.php?id=" . ($prod['id']) ?>"
                                                    class="btn btn-success col-4">Buy </a>
                                                <a class="btn btn-danger col-4"
                                                    onclick="addToCart(<?php echo $prod['id']; ?>);"> Cart</a>
                                                <a href="#" class="btn btn-secondary col-3"
                                                    onclick="addToWatchList(<?php echo $prod['id']; ?>);"><i
                                                        class="bi bi-heart-fill"></i></a>
                                                <?php
                                                                } else {
                                                                ?>
                                                <span class="card-text text-danger"><b>Out of Stock</b></span>
                                                <input type class="form-cotrol mb-1" type="number" value="1" disabled />
                                                <a href="#" class="btn btn-success disabled"
                                                    onclick="paynow(<?php echo $pid; ?>);"> Buy Now</a>
                                                <a href="" class="btn btn-danger disabled"
                                                    onclick="addToCart(<?php echo $prod['id']; ?>);">Add To Cart</a>
                                                <?php
                                                                }

                                                                ?>
                                                <!-- <span class="card-text text-warning"><?php // echo $statusrow["name"] 
                                                                                                            ?></span>
                                 <input type class="form-cotrol mb-1" type="number" value="1"/>
                                  <a href="#" class="btn btn-success"> Buy Now</a>
                                  <a href="#" class="btn btn-danger">Add To Cart</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <?php

                                               // }
                                            }
                                                ?>




                                </div>
                            </div>
                        </div>
                    </div>
                    <!------ product view--->

                </div>


                <div class="col-12 bg-white">
                    <div
                        class="row d-block me-0 ms-0 mt-4 mb-3 border-start-0 border-end-0 border-top-0 border-primary">
                        <div class="col-md-6">
                            <span class="fs-3 fw-bold">Product Deatails</span>
                        </div>

                    </div>
                    <div class="col-12 bg-white">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-2">
                                        <label class="form-label fw-bold mx-2">Brand</label>
                                    </div>
                                    <div class="col-10">
                                        <label class="form-label"><?php echo $pd["title"]; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-2">
                                        <label class="form-label fw-bold mx-2">Model</label>
                                    </div>
                                    <div class="col-10">
                                        <label class="form-label">iPhone 12</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-2">
                                        <label class="form-label fw-bold mx-2">Description</label>
                                    </div>
                                    <div class="col-9 mx-4 mx-lg-0">
                                        <textarea class="form-control" cols="60" rows="10"
                                            readonly><?php echo $pd["description"]; ?></textarea>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>





            <div class="col-12 bg-white">
                <div
                    class="row d-block me-0 ms-0 mt-4 mb-3 border border-1 border-start-0 border-end-0 border-top-0 border-primary">
                    <div class="col-md-6">
                        <span class="fs-2 fw-bold text-info">Feedbacks...</span>

                    </div>
                </div>

                <div class="col-12 mb-3 ">
                    <div class="row  g-1">


                        <?php
                                $feedbackrs = Database::search("SELECT * FROM `feedback` WHERE `product_id`='" . $pid . "'");
                                $feed = $feedbackrs->num_rows;

                                if ($feed == 0) {
                                ?>
                        <div class="col-12">
                            <label class="form-label fs-3 text-center text-black-50">There are no feedbacks to
                                view..</label>
                        </div>
                        <?php
                                } else {
                                    for ($a = 0; $a < $feed; $a++) {

                                        $feedrow = $feedbackrs->fetch_assoc();
                                 
                                ?>
                        <div class="col-12 mb-1 offset-lg-1 col-lg-8 feed">
                            <div class="row">
                                <div class="col-12">
                                    <span class="fs-4 fw-bold text-white"><?php echo $feedrow["user_email"]; ?></span>
                                </div>
                                <div class="col-12">
                                    <span class="fs-4 fw-bold text-black"><?php echo $feedrow["feed"]; ?></span>
                                </div>
                                <div class="col-12 text-end">
                                    <span class="fs-5 fw-bold text-black-50 "><?php echo $feedrow["date"]; ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                            //}
                            ?>
                    </div>

                </div>

              
                <?php
                              
                            }
                ?>




<?php
                require "footer.php"
                ?>
                 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="script.js"></script>
                <script src="bootstrap.bundle.js"></script>
</body>

</html>

<?Php
    }
}
?>