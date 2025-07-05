<?php
//session_start();
require "connection.php";
require "header.php";

if (isset($_SESSION["u"])) {
?>
 <!DOCTYPE html>
    <html>

    <head>
        <title>Best Place | User Profile</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="resources/bestplace.png" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>

    <body class="bg-secondary">
        <div class="container-fluid">
            <div class="row">
                
                <div class="container-fluid card rounded mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 border-end">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                                <?php
                                $profileimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
                                $pn = $profileimg->num_rows;

                                if ($pn>0) {
                                    $pr = $profileimg->fetch_assoc();
                                ?>
                                    <img class="rounded-circle" src="<?php echo $pr["code"]; ?>" height="90px" height="90px" />
                                <?php
                                } else {
                                ?>
                                    <img class="rounded-circle" src="resources/demoProfileImg.jpg" height="90px" height="90px" />
                                <?php
                                }
                                ?>


                                <span class="font-weight-bold"><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></span>
                                <span class="text-black-50"><?php echo $_SESSION["u"]["email"]; ?></span>
                                <input class="d-none" type="file" id="profileimg" accept="img/*" />
                                <label class="btn btn-info mt-5 fw-bolder" for="profileimg">Update Profile Image</label>
                            </div>
                        </div>

                        <div class="col-md-5 border-end">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-info ligh" style="--i:1;">Profile Settings</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        
                                        <label class="form-label">Name </label>
                                        <input id="fname" type="text" class="form-control" placeholder="first name" value="<?php echo $_SESSION["u"]["fname"]; ?>" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Surname </label>
                                        <input id="lname" type="text" class="form-control" placeholder="last name" value="<?php echo $_SESSION["u"]["lname"]; ?>" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Mobile Number </label>
                                        <input id="mobile" type="text" class="form-control" placeholder="Enter Phone Number" value="<?php echo $_SESSION["u"]["mobile"]; ?>" />
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Password </label>
                                        <input type="password" class="form-control" placeholder="Enter Password" readonly value="<?php echo $_SESSION["u"]["password"]; ?>" />
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Email Address </label>
                                        <input id="email" type="email" class="form-control" placeholder="Enter email id" readonly value="<?php echo $_SESSION["u"]["email"]; ?>" />
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Registered Date </label>
                                        <input type="text" class="form-control" placeholder="Registered Date" readonly value="<?php echo $_SESSION["u"]["register_date"]; ?>" />
                                    </div>
                                    <?php
                                    $usermail = $_SESSION["u"]["email"];
                                    $address = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $usermail . "'");
                                    $n = $address->num_rows;

                                    if ($n == 1) {

                                        $d = $address->fetch_assoc();
                                    ?>


                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Address Line 01 </label>
                                            <input type="email" id="line1" class="form-control" placeholder="enter address line 01" value="<?php echo $d["line1"] ?> " />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Address Line 02 </label>
                                            <input type="email" id="line2" class="form-control" placeholder="enter address line 02" value="<?php echo $d["line2"] ?>" />
                                        </div>

                                        <div class="row mt-3">
                                            <?php
                                            $cityid = $d["location_id"];
                                            $ucity = Database::search("SELECT * FROM `city` WHERE `id`='" . $cityid . "'");
                                            $c = $ucity->fetch_assoc();

                                            $districtid = $d["location_id"];
                                            $udist = Database::search("SELECT * FROM `district` WHERE `id`='" . $districtid . "'");
                                            $k = $udist->fetch_assoc();


                                            $provinceid = $d["location_id"];
                                            $uprovince = Database::search("SELECT * FROM `province` WHERE `id`='" . $provinceid . "'");
                                            $l = $uprovince->fetch_assoc();

                                            ?>
                                            <div class="col-md-6">
                                                <label class="form-label">City</label>
                                                <input type="text" id="city" class="form-control" placeholder="city" value="<?php echo $c["name"] ?>" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Postal code</label>
                                                <input type="text" id="postalcode" class="form-control" value="<?php echo $c["postal_code"] ?>" placeholder="Enter your Postal code" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Province</label>
                                                <select id="province" class="form-control">
                                                    <option value="<?php $l["id"]; ?>"><?php echo $l["name"]; ?></option>

                                                    <?php
                                                    $provincers = Database::search("SELECT * FROM `province` WHERE `id`!='" . $l["id"] . "' ");
                                                    $pn = $provincers->num_rows;

                                                    for ($i = 0; $i < $pn; $i++) {
                                                        $pr = $provincers->fetch_assoc();
                                                        //if($l["id"]!=$pr["id"]){
                                                    ?>
                                                        <option value="<?php echo $pr["id"]; ?>"><?php echo $pr["name"]; ?></option>
                                                    <?php
                                                        //  }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Disrtict</label>
                                                <select id="District" class="form-control">
                                                    <option value="<?php $k["id"]; ?>"><?php echo $k["name"]; ?></option>

                                                    <?php
                                                    $dis = Database::search("SELECT * FROM `district` WHERE `id`!='" . $k["id"] . "' ");
                                                    $dr = $dis->num_rows;

                                                    for ($i = 0; $i < $dr; $i++) {
                                                        $drr = $dis->fetch_assoc();
                                                        //if($l["id"]!=$pr["id"]){
                                                    ?>
                                                        <option value="<?php echo $drr["id"]; ?>"><?php echo $drr["name"]; ?></option>
                                                    <?php
                                                        //  }
                                                    }
                                                    ?>
                                                </select>


                                            </div>

                                        <?php
                                    } else {
                                        ?>


                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Address Line 01 </label>
                                                <input id="line1" type="email" class="form-control" placeholder="enter address line 01" value="" />
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Address Line 02 </label>
                                                <input id="line2" type="email" class="form-control" placeholder="enter address line 02" value="" />
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">City</label>
                                                    <input id="city" type="text" class="form-control" placeholder="city" value="" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Postal code</label>
                                                    <input type="text" id="postalcode" class="form-control" placeholder="Enter your Postal code" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Province</label>
                                                    <select id="province" class="form-control">
                                                        <?php
                                                        $provincers = Database::search("SELECT * FROM `province` WHERE `id`!='" . $l["id"] . "' ");
                                                        $pn = $provincers->num_rows;

                                                        for ($i = 0; $i < $pn; $i++) {
                                                            $pr = $provincers->fetch_assoc();
                                                            //if($l["id"]!=$pr["id"]){
                                                        ?>
                                                            <option value="<?php echo $pr["id"]; ?>"><?php echo $pr["name"]; ?></option>
                                                        <?php
                                                            //  }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Disrtict</label>
                                                    <select id="District" class="form-control">
                                                        <?php
                                                        $dis = Database::search("SELECT * FROM `district` WHERE `id`!='" . $k["id"] . "' ");
                                                        $dr = $dis->num_rows;

                                                        for ($i = 0; $i < $dr; $i++) {
                                                            $drr = $dis->fetch_assoc();
                                                            //if($l["id"]!=$pr["id"]){
                                                        ?>
                                                            <option value="<?php echo $drr["id"]; ?>"><?php echo $drr["name"]; ?></option>
                                                        <?php
                                                            //  }
                                                        }
                                                        ?>
                                                    </select>

                                                </div>

                                            <?php
                                        }
                                            ?>

                                            <div class="col-md-6">
                                                <label class="form-label">Gender</label>
                                                <?php
                                                $genderid = $_SESSION["u"]["gender_id"];
                                                $ugender = Database::search("SELECT * FROM `gender` WHERE `id`= '" . $genderid . "'");
                                                $g = $ugender->fetch_assoc();
                                                ?>
                                                <input type="text" class="form-control" placeholder="gender" value="<?php echo $g["name"] ?>" readonly />
                                            </div>
                                            <div class="mt-5 text-center">
                                                <button class="btn btn-info fw-bolder" onclick="updateProfile();">Update Profile</button>
                                            </div>
                                            </div>
                                        </div>
                                </div>
                            </div>

                        <?php
                    } else {
                        ?>
                            <script>
                                window.location = "index.php"
                            </script>
                        <?php
                    }
                        ?>

                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="p-3 py-2">
                                        <span class="fw-bold">User Reting</span>
                                        <span class="fa fa-star fs-4 text-warning"></span>
                                        <span class="fa fa-star fs-4 text-warning"></span>
                                        <span class="fa fa-star fs-4 text-warning"></span>
                                        <span class="fa fa-star fs-4 text-warning"></span>
                                        <span class="fa fa-star fs-4 text-secondary"></span>
                                        <p>4.1 average base on 254 reviews.</p>
                                    </div>
                                </div>
                                <hr class="hrbreak1" />

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div>5 Star</div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="text-end">150</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div>4 Star</div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="text-end">63</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div>3 Star</div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="text-end">15</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div>2 Star</div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 6%;" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="text-end">6</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div>1 Star</div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="text-end">20</div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        </div>
                    </div>

                    <?php
                    require "footer.php";
                    ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script src="script.js"></script>
                    <script src="bootstrap.bundle.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>

    </html>