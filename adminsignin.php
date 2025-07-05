<!DOCTYPE html>
<html>
    <head>
        <title>Best Place |Admin SignIn</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="resources//bestplace.png" />
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
   
    </head>
    <body >
    <div class="banner">
<video autoplay muted loop >
  <source src="resources/video2.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>

<div class="content">
     <div class="container-fluid vh-100 justify-content-center" style="margin-top: 170px;">
    <div class="row align-content-center">

    <div class="col-12">
        <div class="row">
        <div class="col-12 logo"></div>
            <div class="col-12">
                <p class="text-center title1 text-white ">Hi , Welcome To eShop Admins!</p>
            </div>
        </div>
    </div>

    <div class="col-12 p-5 ">
        <div class="row">
            <div class="col-6 d-none d-lg-block backgroundd" style="height: 300px;"></div>
            <div class="col-12 col-lg-6 d-block  pt-5 p-5 pb-5 sign">
                <div class="row g-3">
                    <div class="col-12">
                        <p class="title2">Signin To Your Account</p>
                    </div>
                    <div class=" col-12">
                        <lable class="form-label">Email :</lable>
                        <input type="email" class="form-control bg-outline-info" id="e">
                    </div>
                    <div class="col-12 col-lg-6 d-grid">
                        <button class="btn btn-outline-dark" onclick="adminverification();">Send Verification Code</button>

                    </div>
                    <div class="col-12 col-lg-6 d-grid">
                        <button class="btn btn-outline-light" onclick="gotoindexx();">Back to User's Login</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <div class="col-12 d-none d-lg-block fixed-bottom">
        <p class="text-center text-white">&copy;2021 eShop.lk All Rights Reserved.</p>
    </div>

  </div>
  </div>
</div>
   <!-- Modal -->
   <div class="modal fade" id="verificationmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Admin verification </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <lable class="form-lable">Enter the Verification code </lable>
        <input type="text" class="form-control" id="v"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
      </div>
    </div>
  </div>
</div>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="script.js"></script>
<script src="bootstrap.js"></script>
<script src="bootstrap.bundle.js"></script>
    </body>
</html>