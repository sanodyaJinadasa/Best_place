<!DOCTYPE html>
<html>

<head>
    <title>Best Place</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources//bestplace.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body class="main-background">


    <div class="container-fluid vh-100 d-flex justify-content-center">
        <div class="row align-content-center">
            <!--header-->
            <div class="col-12 pt-5 pt-lg-0">
                <div class="row">

                    <div class="col-12 logo "></div>
                    <div class="col-12">
                        <p class="text-center title1">Hi, Welcome to Best Place</p>
                    </div>
                </div>
            </div>
            <!--header-->
            <!--content-->
            <div class="col-12 p-5">
                <div class="row">
                    <div class="col-6 d-none d-lg-block background ">

                    </div>
                    <div class="col-12 col-lg-6 co  p-5" id="signInBox">
                        <div class="row g-1">

                        <div class="offset-6 offset-lg-8 col-6 col-lg-4 d-grid">
                                <button class="btn btn-outline-warning" onclick="adminsigninpage();">Admin Sign In</button>
                            </div>

                            <div class="col-12">
                                <p class="title2">Create New Account</p>
                                <p class="text-danger" id="msg"></p>
                            </div>

                            <div class="col-6">
                                <label class="form-label">First Name</label>
                                <input class="form-control" type="text" id="fname">
                            </div>

                            <div class="col-6">
                                <label class="form-label">Last Name</label>
                                <input class="form-control" type="text" id="lname">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="email" id="email">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input class="form-control" type="password" id="password">
                            </div>

                            <div class="col-6">
                                <label class="form-label">Mobile</label>
                                <input class="form-control" type="text" id="mobile">
                            </div>
                           

                            <div class="col-6">
                                <label class="form-label">Gender</label>
                                <select class="form-select" id="gender">
                                    
                                    <?php
                                    require "connection.php";
                                    $r = Database::search("SELECT * FROM `gender`");
                                    $n = $r->num_rows;
                                    for ($x = 0; $x < $n; $x++) {
                                        $d = $r->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $d["id"]; ?>"><?php echo $d["name"]; ?></option>
                                    <?php
                                    }

                                    ?>
                                </select>
                                <br/>
                            </div>
                           <br/>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-outline-dark" onclick="signUp();">Sign Up</button>
                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-outline-light" onclick="changeView();">Already have an account? Sign In</button>
                            </div>
                    
                        </div>

                    </div>

                    <div class="col-12 col-lg-6 d-none co  p-5" id="signUpBox">
                        <div class="row g-1">

                            <div class="col-12">
                                <p class="title2">Sign In</p>
                                <p class="text-danger" id="msg2"></p>
                            </div>

                            <div class="col-12">
                                <?php
                                $e = "";
                                $p = "";

                                if (isset($_COOKIE["e"])) {
                                    $e = $_COOKIE["e"];
                                }

                                if (isset($_COOKIE["p"])) {
                                    $p = $_COOKIE["p"];
                                }
                                ?>
                                <label class="form-label">Email</label>
                                <input class="form-control" value="<?php echo $e ?>" type="email" id="email2">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input class="form-control" value="<?php echo $p ?>" type="password" id="password2">
                            </div>

                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-form-check-input" type="checkbox" id="remember" />
                                    <label class="form-check-label">Remember Me</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <a href="#" class="link-link-primary" onclick="forgotPassword();">Forgot Password?</a>
                            </div>

                            <div class="col-12 col-6 d-grid">
                                <button class="btn btn-outline-dark" onclick="signIn();">Sign In</button>
                            </div>

                            <div class="col-12 col-6 d-grid">
                                <button class="btn btn-outline-light" onclick="changeView();">New to eShop? Join Now</button>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!--content-->
        <!--footer-->
        <div class="col-12 d-none d-lg-block fixed-bottom">
            <p class="text-center rese">&copy; 2021 eShop.lk All Rights Reserved</p>
        </div>
        <!--footer-->
        <!--Model-->
        <div class="modal fade" tabindex="-1" id="forgetPasswordModel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Password Reset</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row g-3">

                            <div class="col-6">
                                <label class="form-label">New Password</label>
                                <div class="input-group mb-3">
                                <input class="form-control" type="password" id="np" />
                                <button class="btn btn-outline-primary" id="npb" onclick="showPassword1();">Show</button>
                                </div>
                            </div>


                            <div class="col-6">
                                <label class="form-label">Re-type Password</label>
                                <div class="input-group mb-3">
                                <input class="form-control" type="password" id="rnp" />
                                <button class="btn btn-outline-primary" id="rnpb" onclick="showPassword2();">Show</button>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Verification Code</label>
                                <input class="form-control" type="text" id="vc" />
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Model-->
    </div>
    </div>


    </div>
    <script src="script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>

</html>
