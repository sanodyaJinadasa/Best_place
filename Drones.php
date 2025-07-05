<?php


require "connection.php";
?>

<!DOCTYPE html>

<html>

<head>
    <title>Best Place | Drones</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="resources/bestplace.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 ">
                <div class="row">
                  
                 <?php require "header.php"?>
                 <h1 class="col-12 bg-info fs-1 fw-bolder rows-10 pt-3 pb-3 text-center ligh" style="--i:1;">Drones
                 <!-- <input type="text" class="in col-4 col-lg-2 offset-lg-2 offset-1 mt-1"/>
                     <button class="col-3 col-lg-1 fs-4 btn btn-dark text-white" style="height: 45px;">Search</button> -->
                 </h1>
                      <!--slide-->
                <div class="col-12 d-none d-lg-block">
                    <div class="row">
                        <div id="carouselExampleCaptions" class="offset-2 col-8 carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="resources/d2.jpg" class="w-100  d-block posterimg1">
                                    <div class="carousel-caption d-none d-md-block postercaption ">
                                        <!-- <h5 class="postertitle text-white fw-bolder ">Welcome to Best Place</h5>
                                        <p class="postertxt text-white fw-bolder">The World's Best Online Store By One Click</p> -->
                                    </div>
                                </div>
                               
                                <div class="carousel-item">
                                    <img src="resources/d1.jpg" class="d-block w-100 posterimg1">
                                    <div class="carousel-caption d-none d-md-block postercaption ">
                                    <!-- <h5 class="postertitle fw-bolder text-white">Best Place</h5>
                                        <p class="postertxt fw-bolder text-white">Experience the Lowest Delivery Costs With Us</p> -->
                                    <!-- <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>-->
                                </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="resources/d3.jpg" class="d-block w-100 posterimg1">
                                    <div class="carousel-caption d-none d-md-block postercaption1">
                                       
                                    </div>
                                </div>
                            </div>
                            
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                          
                        </div>
                    </div>
                </div>

                <!--slide-->
                <?php

                       $resultset=Database::search("SELECT * FROM `product` WHERE `category_id`='4' ORDER BY `datetime_added`;");
              
                ?>

                <!------ product title view--->
                <!------ product view--->
                <div class="col-12">
                    <div class="row  mb-1" >
                    <div class="col-12 mt-5">
                        <div class="row row-cols-12 ms-5 row-cols-md-3 row-cols-lg-5 g-5 offset-lg-3 col-12 col-lg-12" id="pdetails">
                             

                            <?php
                          
                                    $nr=$resultset->num_rows;
                                    for($y=0;$y<$nr;$y++){
                                    $prod=$resultset->fetch_assoc();
                                    ?>
                                     
                                     <div class="card col-6 col-lg-2 mt-6  ms-1  " style="width: 18rem; ">
                             
                             <?php
                                $pimage=Database::search("SELECT * FROM `images` WHERE `product_id`='".$prod["id"]."'");
                                $imgrow=$pimage->fetch_assoc();
                             ?>
                             
                             <div class="card">
                             
                            <img src="<?php echo $imgrow["code"];?>" class="card-img-top cardtopimg" />
                             <div class="card-body">
                             <h5 class="card-title"><?php echo $prod["title"]?><span class="badge bg-info">New</span></h5>
                                <span class="card-text text-primary"><?php echo  $prod["price"]?></span>
                                <br/>

                                 
                                <?php
                               $pstatus=Database::search("SELECT * FROM `status` WHERE `id`='".$prod["status_id"]."'");
                               $statusrow=$pstatus->fetch_assoc();
                                 
                                if((int)$prod["qty"]>0){
                                    ?>
                                      
                                    <span class="card-text text-warning"><b>In Stock</b></span>
                                    <input type class="form-cotrol mb-1" type="number" id="qtytxt<?php echo $prod['id'];?>" value="1"/>
                                  <a href="<?php echo "singalproductview.php?id=".($prod['id']) ?>" class="btn btn-success col-4">Buy </a>
                                  <a  class="btn btn-danger col-4" onclick="addToCart(<?php echo $prod['id']; ?>);"> Cart</a>
                                  <a href="#" class="btn btn-secondary col-3" onclick="addToWatchList(<?php echo $prod['id']; ?>);"><i class="bi bi-heart-fill"></i></a>
                                    <?php  
                                }else{
                                  ?>
                                  <span class="card-text text-danger"><b>Out of Stock</b></span>
                                  <input type class="form-cotrol mb-1" type="number" value="1" disabled/>
                                  <a href="#" class="btn btn-success disabled"> Buy Now</a>
                                  <a href="" class="btn btn-danger disabled">Add To Cart</a>
                                  <?php  
                                }
                           
                                ?>
                                 <!-- <span class="card-text text-warning"><?php echo $statusrow["name"]?></span>
                                 <input type class="form-cotrol mb-1" type="number" value="1"/>
                                  <a href="#" class="btn btn-success"> Buy Now</a>
                                  <a href="#" class="btn btn-danger">Add To Cart</a>-->
                         </div>
                       </div>
                       </div>
                                    <?php
                                 
                                }
                            ?>

                            


                            </div>
                        </div>
                    </div>
                </div>
                </div>
               
    </div>
    <?php require "footer.php"; ?>
    
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    
</body>

</html>