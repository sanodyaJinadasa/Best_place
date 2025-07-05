<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
<link rel="icon" href="resources/bestplace.png" />
<link rel="icon" href="resources//bestplace.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <!-- <title>
       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="resources//bestplace.png" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />

    </title> -->
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 colo">
                <div class="row">
                    <div class="mt-1 mb-1 offset-lg-1 col-12 col-lg-4 align-self-start">
                        <span class="text-start label-1"><b>Welcome</b>

                            <?php
                                     if(isset($_SESSION["u"])){
                                     $user=$_SESSION["u"]["fname"];
                                     echo $user;
                                         }else{
                               
                                            ?>
                            <a href="index.php"> Hi Sign In or Register</a>

                            <?php
                                          }

                                     ?>
                            |</span>

                        <span class="text-start label-2 ">Help and contact |</span>
                        <span class="text-start label-2" onclick=signout();>Sign Out</span>
                    </div>
                    <div class="col-12 col-lg-2 offset-lg-4">
                        <div class="row mt-1 mb-1">
                            <!-- <div class="col-1 col-lg-3 mt-1">
                                <span class="label-2 text-start " onclick="gotoaddproduct();">Sell</span>
                            </div> -->
                            <div class="col-5 col-lg-6 dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">My Best Place</button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="home.php">Home</a></li>
                                <li><a class="dropdown-item" href="watchlist.php">watchlist</a></li>
                                    <li><a class="dropdown-item" href="purcheshistory.php">Transaction History</a></li>
                                    <li><a class="dropdown-item" href="messages.php">Message</a></li>
                                 
                                    <li><a class="dropdown-item" href="userprofile.php">My Profile</a></li>
                                </ul>
                            </div>
                          
                            <div class="col-6 col-lg-1 carticon offset-lg-2 mt-1" onclick="cardd();">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="colohr">
            </hr>
            <script src="script.js"></script>
            <script src="bootstrap.bundle.js"></script>
</body>

</html>