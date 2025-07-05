<?php
require "connection.php";
require "header.php";



if (isset($_SESSION["u"])) {
    $umail = $_SESSION["u"]["email"];
    $total = "0";
    $subtotal = "0";
    $shipping = "0";

?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>Best Place | Cart</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="resources//bestplace.png" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />


    </head>

    <body>
        <div class="container-fluid">
            <div class="row">

                <!-- 
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="mt-1 mb-1 offset-lg-1 col-12 col-lg-3 align-self-start">
                                <span class="text-start label-1"><b>Welcome</b>

                                    <?php
                                    if (isset($_SESSION["u"])) {
                                        $user = $_SESSION["u"]["fname"];
                                        echo $user;
                                    } else {

                                    ?>
                                    <a href="index.php"> Hi Sign In or Register</a>

                                    <?php
                                    }

                                    ?>
                                    |</span>

                                <span class="text-start label-2">Help and contact |</span>
                                <span class="text-start label-2" onclick=signout();>Sign Out</span>
                            </div>
                            <div class="col-12 col-lg-2 offset-lg-6">
                                <div class="row mt-1 mb-1">
                                    <div class="col-1 col-lg-3 mt-1">
                                        <span class="label-2 text-start " onclick="gotoaddproduct();">Sell</span>
                                    </div>
                                    <div class="col-2 col-lg-6 dropdown">
                                        <button class="btn btn-light dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"> My
                                            eShop </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Wishlist</a></li>
                                            <li><a class="dropdown-item" href="#">Purchase History</a></li>
                                            <li><a class="dropdown-item" href="#">Massage</a></li>
                                            <li><a class="dropdown-item" href="#">Saved</a></li>
                                            <li><a class="dropdown-item" href="#">My Profile</a></li>
                                            <li><a class="dropdown-item" href="#">My Settings</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-1  col-lg-3 carticon ms-5 ms-lg-0 mt-1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hrbreak1">
                    </hr>
 -->



                <div class="col-12" style="background-color:#E3E5E4;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Basket</li>
                        </ol>
                    </nav>
                </div>


                <div class="col-12 border border-1 border-secondary rounded mb-3">
                    <div class="row">

                        <div class="col-12 border border-1 border-secondary rounded">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label fs-1 fw-bolder">Basket <i class="bi bi-cart3"></i></label>
                                </div>
                                <div class="col-12">
                                    <hr class="hrbreak1">
                                </div>
                                <!-- <div class="col-12">
                                    <div class="row">
                                        <div class="offset-0 offset-lg-2 col-12 col-lg-6 mb-3">
                                            <input type="text" class="form-control" placeholder="Search in cart.." />
                                        </div>
                                        <div class="col-12 col-lg-2 d-grid mb-3">
                                            <button class="btn btn-outline-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12  ">
                                    <hr class="hrbreak1">
                                </div> -->
                                <?php

                                $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $umail . "'");
                                $cn = $cartrs->num_rows;

                                if ($cn == 0) {
                                ?>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 emptycart"></div>
                                            <div class="col-12 text-center">
                                                <label class="form-label fs-1 fw-bolder">You have no items in your
                                                    Basket.</label>
                                            </div>
                                            <div class="offset-0 offset-lg-4 col-12 col-lg-4 d-grid mb-4">
                                                <a herf="#" class="btn btn-primary fs-3 " onclick="gotocart();"> Start Shopping</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php

                                } else {
                                ?>
                                    <div class="col-12 col-lg-9">
                                        <div class="row">

                                            <?php
                                            for ($i = 0; $i < $cn; $i++) {

                                                $cr = $cartrs->fetch_assoc();

                                                $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cr["product_id"] . "'");
                                                $pr = $productrs->fetch_assoc();

                                                $total = $total + ($pr["price"] * $cr["qty"]);

                                                $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $umail . "'");
                                                $ar = $addressrs->fetch_assoc();
                                                $cityid = $ar["location_id"];

                                                $districtrs = Database::search("SELECT * FROM `location` WHERE `city_id`='" . $cityid . "'");
                                                $xr = $districtrs->fetch_assoc();
                                                $districtid = $xr["district_id"];

                                                if ($cityid == "2") {
                                                    $ship = $pr["delivery_fee_colombo"];
                                                    $shipping = $shipping + $pr["delivery_fee_colombo"];
                                                } else {
                                                    $ship = $pr["delivery_fee_other"];
                                                    $shipping = $shipping + $pr["delivery_fee_other"];
                                                }
                                                // echo $total;
                                                // echo $shipping;

                                                $sellerrs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $pr["admin_email"] . "'");
                                                $sn = $sellerrs->fetch_assoc();
                                            ?>

                                                <div class="card mb-3  col-12">
                                                    <div class="row g-0">

                                                        <div class="col-md-12 mt-3 mb-3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <spam class="fw-bold text-black-50 fs-5">Seller :</spam>
                                                                    &nbsp;
                                                                    <spam class="fw-bold text-blacks fs-5">
                                                                        <?php echo $sn["fname"] . " " . $sn["lname"] ?></spam>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <hr>

                                                        <div class="col-md-4">
                                                            <?php
                                                            $imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pr["id"] . "'");
                                                            $in = $imagers->num_rows;
                                                            $arr;
                                                            for ($x = 0; $x < $in; $x++) {
                                                                $ir = $imagers->fetch_assoc();
                                                                $arr[$x] = $ir["code"];
                                                            }
                                                            ?>
                                                            <img src="<?php echo $arr[0]; ?>" class="img-fluid rounded-start d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" title="<?php echo $pr["title"]; ?>" data-bs-content="<?php echo $pr["description"]; ?>" />
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="card-body">
                                                                <h3 class="card-title"><?php echo $pr["title"]; ?></h3>

                                                                <?php
                                                                $colorrs = Database::search("SELECT `name` FROM `color` WHERE `id`='" . $pr["color_id"] . "'");
                                                                $clr = $colorrs->fetch_assoc();
                                                                ?>
                                                                <span class="fw-bold text-black-50">colour :
                                                                    <?php echo $clr["name"]; ?></span>&nbsp; |
                                                                &nbsp;
                                                                <?php
                                                                $conditionrs = Database::search("SELECT `name` FROM `condition` WHERE `id`='" . $pr["condition_id"] . "'");
                                                                $cor = $conditionrs->fetch_assoc();
                                                                ?>
                                                                <span class="fw-bold text-black-50">Condition
                                                                    :<?php echo $cor["name"]; ?>
                                                                </span>
                                                                <br />
                                                                <span class="fw-bold text-black-50">Price :</span>&nbsp;
                                                                <span class="fw-bolder text-black fs-5">Rs.<?php echo $pr["price"]; ?>.00</span>
                                                                <br />


                                                                <span class="fw-bold text-black-50">Quantity :</span>&nbsp;
                                                                <input disabled type="number" value="<?php echo $cr["qty"]; ?>" class="mt-3 border border-2 border-secondary fs-4 fw-bold px-3  cartqtytxt" />
                                                                <br />
                                                                <span class="fw-bold text-black-50">Delivery fee
                                                                    :</span>&nbsp;
                                                                <span class="fw-bolder text-black fs-5">Rs.
                                                                    <?php echo $ship; ?> .00</span>
                                                                <br />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 mt-4">
                                                            <div class="card-body d-grid">
                                                                <!-- <a href="#"  onclick="">Buy Now</a> -->
                                                                <a href="<?php echo "singalproductview.php?id=" . ($pr['id']) ?>;" class="btn btn-outline-success mb-2">Buy Now</a>
                                                                <a href="#" class="btn btn-outline-danger mb-2" onclick="deletefromcart(<?php echo $pr['id']; ?>);">Remove</a>
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <div class="col-md-12 mb-3 mt-3">
                                                            <div class="row">
                                                                <div class="col-6 col-md-6">
                                                                    <span class="fw-bold fs-5 text-black-50">Requested Total
                                                                        <i class="bi bi-info-circle"></i></span>
                                                                </div>
                                                                <div class="col-6 col-md-6 text-end">
                                                                    <span class="fw-bold fs-5 text-black-50 ">Rs.<?php echo ($pr["price"] * $cr["qty"]) + $shipping; ?>
                                                                        .00</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            <?php

                                            }

                                            ?>

                                        </div>
                                    </div>









                                    <div class="col-12 col-lg-3">
                                        <div class="row">
                                            <div class="col-12 ">
                                                <label class="form_label fs-3 fw-bold ">Summery</label>
                                            </div>
                                            <div class="col-12">
                                                <hr>
                                            </div>
                                            <div class="col-6">
                                                <span class="fw-bold">Items (<?php echo $cn; ?>)</span>
                                            </div>
                                            <div class="col-6 text-end">
                                                <span class="fw-bold">Rs. <?php echo $total; ?> . 00</span>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <span class="fw-bold">Shipping</span>
                                            </div>
                                            <div class="col-6 text-end mt-2">
                                                <span class="fw-bold">Rs. <?php echo $shipping; ?>. 00</span>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <hr>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <span class="fw-bold fs-4">Total</span>
                                            </div>
                                            <div class="col-6 text-end mt-2">
                                                <span class="fw-bold fs-6">Rs. <?php echo $total + $shipping; ?> .
                                                    00</span>
                                            </div>
                                            <?php
                                                $end=$total+$shipping;
                                                   //echo $end;
                                            ?>
                                            <div class="col-12 mt-3 mb-3 d-grid ">
                                                <button class="btn btn-info fs-5 fw-bold" id="payhere-payment" type="submit"  onclick="paynoww(<?php echo $end; ?>);">CHECKOUT</button>
                                            </div>
                                        </div>
                                    </div>


                                <?php
                                }
                                ?>
                            </div>
                        </div>









                        <?php require "footer.php"; ?>
                    </div>
                </div>
                <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://unpkg.com/@popperjs/core@2"></script>
                <script src="script.js"></script>
                <script src="bootstrap.bundle.js"></script>
                <script src="jquery-3.5.1.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                <script type="text/javascript">
                    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
                    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                        return new bootstrap.Popover(popoverTriggerEl)
                    })
                </script>
    </body>

    </html>
<?php

} else {
?>
    <script>
        alert("please signin First");
        window.location = "index.php";
    </script>
<?php
}
?>