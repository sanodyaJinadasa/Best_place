<?php
 
require "header.php";
require "connection.php";
if(isset($_SESSION["u"])){
    $umail=$_SESSION["u"]["email"];

?>
<!DOCTYPE html>

<html>

<head>
    <title>Best Place | watchlist</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="resources/bestplace.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body>
    <div class="col-12">
        <div clas="row">


            <div class="col-12 ">
                <div class="row">
                    <div class="col-12">
                        <label class="form-label fs-1 fw-bolder ligh" style="--i:1;">Watchlist &hearts;</label>
                    </div>
                    <div class="col-12  col-lg-6">
                        <hr class="hrbreak1">
                    </div>
                    <!-- <div class="col-12">
                        <div class="row">
                            <div class="offset-0 offset-lg-2 col-12 col-lg-6 mb-3">
                                <input type="text" class="form-control" placeholder="Search in Watchlist.." />
                            </div>
                            <div class="col-12 col-lg-2 d-grid mb-3">
                                <button class="btn btn-outline-primary">Search</button>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-12  ">
                        <hr class="hrbreak1">
                    </div>
                    <div
                        class="col-12 col-lg-2 border border-start-0 border-top-0 border-bottom-0 border-end border-2 border-primary">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Watchlist</li>
                            </ol>
                        </nav>
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">My Watchlist</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cart.php">My Cart</a>
                            </li>

                        </ul>

                    </div>

                    <?php
           $watchlistrs=Database::search("SELECT * FROM `watchlist` WHERE `user_email`='".$umail."'");
           $wn=$watchlistrs->num_rows;
          if($wn==0){
      ?>
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-12 emptyview"></div>
                            <div class="col-12 text-center">
                                <label class="form-label fs-1 mb-3 fw-bolder">You have no items in your
                                    Watchlist</label>
                            </div>
                        </div>
                    </div>

                    <?php
               }else{
      ?>
                    <div class="col-12 col-lg-9">
                        <div class="row g-2">
                            <?php
      
      for($i=0;$i<$wn;$i++){
          $wr=$watchlistrs->fetch_assoc();
          $wid= $wr["product_id"];

      $productrs=Database::search("SELECT * FROM `product` WHERE `id`='".$wid."'");
             $pn=$productrs->num_rows;
             if($pn==1){
                 $pr=$productrs->fetch_assoc();
                 $prodid=$pr["id"];
         

         

?>


                            <div class="card mb-5 mx-0 mx-lg-3 col-12">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <?php
                                          $imagers=Database::search("SELECT * FROM `images` WHERE `product_id`='".$wid."'");
                                        $in=$imagers->num_rows;
                                        $arr;
                                        for($x=0;$x<$in;$x++){
                                            $ir=$imagers->fetch_assoc();
                                            $arr[$x]=$ir["code"];
                                        }
                                        ?>
                                        <img src="<?php echo $arr[0];?>" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card-body">
                                            <h3 class="card-title"><?php echo $pr["title"]; ?></h3>
                                            
                                            <span class="fw-bold text-black-50">colour :pasific blue</span>&nbsp; |
                                            &nbsp; <span class="fw-bold text-black-50">Condition : Brand new</span>
                                            <br />
                                            <span class="fw-bold text-black-50">Price :</span>&nbsp;
                                            <span class="fw-bolder text-black fs-5"><?php echo $pr["price"]; ?></span>
                                            <br />
                                            <?php
                                            $sellerrs=Database::search("SELECT * FROM `user` WHERE `email`='".$pr["admin_email"]."'");
                                            $ur=$sellerrs->fetch_assoc();
                                            ?>
                                            <span class="fw-bold text-black-50 fs-5">seller :</span>&nbsp;
                                            <span class="fw-bolder text-black fs-5"><?php echo $ur["fname"] . " ". $ur["lname"]; ?></span>
                                            <br />
                                            <span
                                                class="fw-bolder text-black fs-5"><?php echo $ur["email"]; ?></span>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mt-4">
                                        <div class="card-body d-grid">
                                            <a href="#" class="btn btn-outline-success mb-2">Buy Now</a>
                                            <a href="#" class="btn btn-outline-secondary mb-2">Add to Cart</a>
                                            <a href="#" class="btn btn-outline-danger mb-2" onclick="deletefromwatchlist(<?php echo $wr['id']; ?>);">Remove</a>
                                        </div>
                                    </div>
                                </div>









                                <?php
             }
      }
  }

?>
                            </div>
                        </div>



                        


                        <!-- 
                            <div class="card mb-3 mx-0 mx-lg-3 col-12" >
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="resources/mobile images/iphone12.jpg" class="img-fluid rounded-start" >
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card-body">
                                            <h3 class="card-title">iphone12</h3>
                                           <span class="fw-bold text-black-50">colour :pasific blue</span>&nbsp; |
                                           &nbsp; <span class="fw-bold text-black-50">Condition : Brand new</span>
                                           <br/>
                                           <span class="fw-bold text-black-50">Price :</span>&nbsp; 
                                           <span class="fw-bolder text-black fs-5">Rs.100000.00</span>
                                           <br/>
                                           <span class="fw-bold text-black-50 fs-5">seller :</span>&nbsp;
                                           <span class="fw-bolder text-black fs-5">P.M.sanodya  V . Jinadasa</span> 
                                           <br/>
                                           <span class="fw-bolder text-black fs-5">sanodyaj@gmail.com</span> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 mt-4">
                                        <div class="card-body d-grid">
                                            <a href="#" class="btn btn-outline-success mb-2">Buy Now</a>
                                            <a href="#"  class="btn btn-outline-secondary mb-2">Add to Cart</a>
                                            <a href="#"  class="btn btn-outline-danger mb-2">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 -->


                    </div>
                    <div class="col-12 se">
                    <?php  require "footer.php"; ?>
</div>

                  
                </div>

               
            </div>

            <script src="script.js"></script>
            <script src="bootstrap.bundle.js"></script>
         
</body>


</html>

<?php
}else{
    ?>
    <script> window.location="index.php";</script> 
    <?php
}
?>
