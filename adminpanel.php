<?php

require "adminheader.php";
require "connection.php";
if (isset($_SESSION["a"])) {
?>



    <!DOCTYPE html>

    <html>

    <head>
        <title>Best Place | Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="resources/logo.svg" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    </head>

    <body style="background-color: #74ebd5; background-image: linear-gradient(90deg,#74ebd5 0%, #9face6 100%);min-height: 100px;">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12 col-lg-2">
                    <div class="row">
                        <div class=" align-items-start bg-dark col-12">
                            <div class="row g-1">
                                <div class="col-12 mt-5 ">
                                    <h4 class="text-white">
                                        <?php echo $_SESSION["a"]["fname"] . " " . $_SESSION["a"]["lname"]; ?></h4>
                                    <hr class="border border-1 border-white" />
                                </div>

                                <div class="nav flex-column nav-pills me-3 mt-3" role="tablist" aria-orientation="vertical">
                                    <nav class="nav flex-column">
                                        <a class="nav-link active  fs-5" aria-current="page" href="#">Dashboard</a>
                                        <a class="nav-link fs-5" href="manageuser.php">Manage Users</a>
                                        <a class="nav-link fs-5" href="manageproducts.php">Manage Product</a>
                                    </nav>
                                </div>


                                <div class="col-12 mt-3">
                                    <hr class="border border-1 border-white" />
                                    <h4 class="text-white">Selling History</h4>
                                    <hr class="border border-1 border-white" />
                                </div>

                                <div class="col-12 mt-3 d-grid">
                                    <label class="form-label text-white fs-6">From Date</label>
                                    <input type="date" class="form-control" id="fromdate" placeholder="Search From..." />
                                    <label class="form-label text-white fs-6 mt-2">To Date</label>
                                    <input type="date" class="form-control mt-2" id="todate" placeholder="Search To..." />
                                    <button class="btn btn-primary mt-2" id="historylink" onclick="dailyselling();">View History</button>
                                    <!-- <hr class="border border-1 border-white" />
                                <a href="productSellingHistory.php" class="text-white " style="cursor:pointer;" onclick="dailyselling();">Daily Selling</a> -->
                                    <hr class="border border-1 border-white" />
                                    <hr class="border border-1 border-white" />

                                </div>


                            </div>
                        </div>
                    </div>
                </div>







                <div class="col-12 col-lg-10">
                    <div class="row">
                        <div class="col-12 mt-3 mb-3 text-white">
                            <h2 class="fw-bolder  fs-1 " style="">Dashboard</h2>
                        </div>

                        <div class="col-12">
                            <hr />
                        </div>

                        <div class="col-12 ">
                            <div class="row  g-1">
                                <div class="col-6 col-lg-4 px-1 fw-bolder">
                                    <div class="row g-1">
                                        <div class="col-12 btn btn-primary text-white text-center rounded ligh" style="height:100px,--i:1;">
                                            <br />
                                            <span class="fs-4 fw-bold">Daily Earnings</span>
                                            <br />

                                            <?php
                                            $today = date("Y-m-d");
                                            $thismonth = date("m");
                                            $thisyear = date("y");
                                            $a = "0";
                                            $b = "0";
                                            $c = "0";
                                            $e = "0";
                                            $f = "0";

                                            $invoicers = Database::search("SELECT * FROM `invoice`");
                                            $in = $invoicers->num_rows;

                                            for ($x = 0; $x < $in; $x++) {
                                                $ir = $invoicers->fetch_assoc();

                                                $f = $f + $ir["qty"];
                                                $d = $ir["date"];
                                                $splitdate = explode(" ", $d);
                                                $pdate = $splitdate[0];

                                                if ($pdate == $today) {
                                                    $a = $a + $ir["total"];
                                                    $c = $c + $ir["qty"];
                                                }
                                                $splitmonth = explode("-", $pdate);
                                                $pmonth = $splitmonth[1];
                                                $pyear = $splitmonth[0];
                                                if ($pyear == $thisyear) {
                                                    if ($pmonth == $thismonth) {
                                                        $b = $b + $ir["total"];
                                                        $e = $e + $ir["qty"];
                                                    }
                                                }
                                            }


                                            ?>
                                            <span class="fs-5 ">Rs.<?php echo $a; ?>.00</span></span>
                                            <br />
                                        </div>
                                    </div>
                                </div>


                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 btn btn-warning ligh text-white text-center rounded " style="height:100px,--i:1;">
                                            <br />
                                            <span class="fs-4 fw-bold">Monthly Earnings</span>
                                            <br />
                                            <span class="fs-5 ">Rs.<?php echo $b; ?>.00</span>
                                            <br />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 btn btn-dark text-white text-center rounded ligh" style="height:100px,--i:1;">
                                            <br />
                                            <span class="fs-4 fw-bold">Today Selling</span>
                                            <br />
                                            <span class="fs-5 "><?php echo $f; ?></span>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 btn btn-success text-white text-center rounded ligh" style="height:100px,--i:1;">
                                            <br />
                                            <span class="fs-4 fw-bold">Monthly Selling</span>
                                            <br />
                                            <span class="fs-5 "><?php echo $c; ?></span>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 btn btn-info text-white text-center rounded ligh" style="height:100px,--i:1;">
                                            <br />
                                            <span class="fs-4 fw-bold">Total Selling</span>
                                            <br />
                                            <span class="fs-5 "><?php echo $f; ?> Items</span>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 btn btn-danger text-white text-center rounded ligh" style="height:100px,--i:1;">
                                            <br />
                                            <span class="fs-4 fw-bold">Total Engagements</span>
                                            <br />
                                            <?php
                                            $users = Database::search("SELECT * FROM `user`");
                                            $un = $users->num_rows;


                                            ?>



                                            <span class="fs-5 "><?php echo $un; ?> Requests</span>
                                            <br />
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>

                        <div class="col-12">
                            <hr />
                        </div>






                        <div class="col-12 bg-dark">
                            <div class="row">
                                <div class="col-12 col-lg-2 text-center mt-3 mb-3">
                                    <label class="form-label fs-4 fw-bold text-white">Total Active Time</label>
                                </div>
                                <?php
                                $startdate = new DateTime("2021-10-01 00:00:00");
                                $tdate = new DateTime();
                                $tz = new DateTimeZone("Asia/Colombo");
                                $tdate->setTimezone($tz);
                                $endDate = new DateTime($tdate->format("Y-m-d H:i:s"));

                                $difference = $endDate->diff($startdate);

                                ?>
                                <div class="col-12 col-lg-10 text-center mt-3 mb-3">
                                    <label class="form-label fs-4 fw-bold text-danger">

                                        <?php
                                        echo $difference->format('%Y')." " . "Years" ." "  . $difference->format('%m')." " . "Months" ." ".
                                            $difference->format('%d')." " . "Days"  ." "  .  $difference->format('%H')." " . "Hours"." " .
                                            $difference->format('%i')." " . "Minutes" ." ". $difference->format('%s') ." ". "Seconds";
                                        ?>
                                    </label>
                                </div>
                            </div>
                        </div>



                        <div class="offset-1 offset-lg-3 col-10 col-lg-4 mt-3 mb-3 rounded   card">
                            <div class="row g-1">

                                <?php
                                $freq = Database::search("SELECT `product_id`,COUNT(`product_id`) AS `value_occurrence`  FROM `invoice` WHERE `date` LIKE  '%" . $thismonth . "%' GROUP BY `product_id` ORDER BY `value_occurrence` DESC LIMIT 1");
                                $freqnum = $freq->num_rows;
                                for ($z = 0; $z < $freqnum; $z++) {
                                    $freqrow = $freq->fetch_assoc();
                                    // echo $freqrow["product_id"];
                                }
                                ?>

                                <div class="col-12 text-center">
                                    <label class=" fs-4 fw-bold form-label">Mostly Sold Item</label>
                                </div>

                                <?php
                                $pimg = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $freqrow["product_id"] . "'");
                                $pimgg = $pimg->fetch_assoc();
                                ?>
                                <div class="col-10 col-lg-12">
                                    <img src="<?php echo $pimgg["code"]; ?>" class="img-fluid rounded-top text-center im" />
                                    <hr />
                                </div>
                                <div class="col-12 text-center">
                                    <?php
                                    $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $freqrow["product_id"] . "'");
                                    $p = $productrs->fetch_assoc();
                                    $items = Database::search("SELECT * FROM `invoice` WHERE `product_id`='" . $freqrow["product_id"] . "'");
                                    $item = $items->fetch_assoc();

                                    ?>
                                    <span class="fs-5 fw-bold"><?php echo $p["title"] ?></span>
                                    <br />

                                    <span class="fs-6 "><?php echo $item["qty"] ?> Items</span>
                                    <br />

                                    <span class="fs-6 ">Rs.<?php echo $p["price"] ?>.00</span>


                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="firstplace"></div>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <!-- <div class="offset-1 col-10 col-lg-4 mt-3 mb-3 rounded bg-light">
                            <div class="row g-1">
                                <div class="col-12 text-center">
                                    <label class=" fs-4 fw-bold form-label">Mostly famouse seller</label>
                                </div>
                                <?php
                                $user = Database::search("SELECT * FROM `user` WHERE `email`='" . $p["user_email"] . "'");
                                $ud = $user->fetch_assoc();
                                $uimag = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $ud["email"] . "'");
                                $uimgs = $uimag->fetch_assoc();
                                ?>
                                <div class="col-12">
                                    <img src="<?php echo $uimgs["code"] ?>" class="img-fluid rounded-top sd mx-lg-6 imm" style="height:250px;margin-left:125px " />
                                    <hr />
                                </div>
                                <div class="col-12 text-center">
                                    <span class="fs-5 fw-bold"><?php echo $ud["fname"] . " " . $ud["lname"] ?></span>
                                    <br />

                                    <span class="fs-6 "><?php echo $ud["email"] ?></span>
                                    <br />

                                    <span class="fs-6 "><?php echo $ud["mobile"] ?></span>


                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="firstplace"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->




                    </div>
                </div>


                <?php require "footer.php"; ?>
            </div>
        </div>



        <script src="script1.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>

<?php
}
?>