<?php
require "header.php";
?>
<?php


require "connection.php";
?>

<!DOCTYPE html>

<html>

<head>
    <title>best Place message</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="resources/bestplace.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12 ">
                <div class="row">
                    <div class="col-12 justify-content-center ">
                        <div class="row">
                            <div class="offset-2 col-8 bor p-5 pt-2 pb-2 mb-5 bc">
                            <span class="col-4 fw-bolder fs-3 text-danger offset-0 offset-lg-5  pb-4 ligh" style="--i:1;">Contact Seller</span>
                                <div class="row mt-4">
                                    <span class="col-4">Enter Your Email Address</span>
                                    <input type="text" class="col-8" id="ea" />
                                </div>
                                <br />
                                <div class="row">
                                    <span class="col-4">Enter Your Contact Number</span>
                                    <input type="text" class="col-8" id="cn" />
                                </div>
                                <br />
                                <div class="row">
                                    <textarea class="form-control  " PLACEHOLDER="Type message........" cols="50" rows="15" style="background-color: rgb(205, 253, 248);" id="msg" value=""></textarea>
                                </div>
                                <br />
                                <div class="row">
                                    <button class="offset-4 col-4 btn btn-outline-warning fw-bolder" onclick="contactadmin();">Send</button>
                                </div>
                                <br/>
                            </div>

                        </div>

                        <!------ footer--->
                      
                        <!------ footer--->
                    </div>
                    <?php require "footer.php"; ?>
                </div>

                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script src="script.js"></script>
                <script src="bootstrap.bundle.js"></script>

</body>

</html>