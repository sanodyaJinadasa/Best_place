<?php


require "connection.php";
?>

<!DOCTYPE html>

<html>

<head>
    <title>best Place Home</title>
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
            <div class="col-12">
                <div class="row">
                  
                 <?php require "header.php"?>
        <div class="col-12 justify-content-center">
            <div class="row mb-3">
                <div class="col-12 col-lg-1  offset-lg-1 logoimg" style="background-position:center;"></div>
                <div class="col-12 col-lg-5">
                    <div class="input-group input-group-lg mt-3 mb-3">
                        <input type="text" class="form-control" aria-label="Text input with dropdown button" id="basic_search_txt">
                     
                        <!-- <ul class="dropdown-menu dropdown-menu-end"> -->
                      <select class="btn btn-outline-info" id="basic_search_select">
                      <option value="0">Select category</option>
                            <?php

                        $rs=Database::search("SELECT * FROM `category`");
                        $n=$rs->num_rows;

                        for($i=1;$i<=$n;$i++){
                          $cat=$rs->fetch_assoc();

                          ?>

                            <option value="<?php echo $cat["id"]?>"><?php echo $cat["name"] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    </div>
                </div>
                <div class="col-6 col-lg-2 d-grid gap-2">
                    <button class="btn btn-info mt-3 searchbtn" id="besicsearchbtn" onclick="basicSearch();">Search</button>
                </div>
                <div class="col-6 col-lg-1 mt-4">
                    <a href="advancedsearch.php" class="link-secondary link1">Advanced</a>
                </div>
                <hr class="hrbreak1">
                </hr>
                <!--slide-->
                <div class="slide col-8 offset-2">
  <div style="background-image:url(resources/m3.jpg)"></div>
  <div style="background-image:url(resources/3n.png)"></div>
  <div style="background-image:url(resources/2n.png)"></div>
  <div style="background-image:url(resources/t1.jpg)"></div>
  <div style="background-image:url(resources/m2.jpg)"></div>
</div>
                <div class="col-12 d-none ">
                    <div class="row">
                        <div id="carouselExampleCaptions" class=" col-10 offset-1 carousel slide" data-bs-ride="carousel" >
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
                                    <img src="resources/slider images/3.jpg" class="w-100  d-block posterimg1">
                                    <div class="carousel-caption d-none d-md-block postercaption ">
                                        <h5 class="postertitle text-white fw-bolder ">Welcome to Best Place</h5>
                                        <p class="postertxt text-white fw-bolder">The World's Best Online Store By One Click</p>
                                    </div>
                                </div>
                               
                                <div class="carousel-item">
                                    <img src="resources/2n.png" class="d-block w-100 posterimg1">
                                    <div class="carousel-caption d-none d-md-block postercaption ">
                                    <h5 class="postertitle fw-bolder text-white">Best Place</h5>
                                        <p class="postertxt fw-bolder text-white">Experience the Lowest Delivery Costs With Us</p>
                                    <!-- <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>-->
                                </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="resources/3n.png" class="d-block w-100 posterimg1">
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

                <!------ product title view--->
                <div class="col-12 mt-5 mb-5 offset-1">
                    <div class="row">
                    <div class="col-lg-2 col-6 mt-1 mb-1 ">
                    <img src="resources/1.jpg" class=" ro cardd"  onclick="w();"/><br/>
                    <span class="fs-5 offset-0 fw-bold text-primary">Smart Phones</span>
                    </div>
                    <div class="col-6 col-lg-2 mt-1 mb-1">
                    <img src="resources/2.jpg" class=" cardd ro"  onclick="ww();"/><br/>
                    <span class="fs-5 offset-1 fw-bold text-primary">Camaras</span>
                    </div>
                    <div class="col-6 col-lg-2 mt-1 mb-1">
                    <img src="resources/3.jpg" class=" cardd ro"  onclick="www();"/><br/>
                    <span class="fs-5 offset-1 fw-bold text-primary">Drones</span>
                    </div>
                    <div class="col-6 col-lg-2 mt-1 mb-1">
                    <img src="resources/44 .jpg" class=" cardd ro" onclick="wwww();"/><br/>
                    <span class="fs-5 offset-1 fw-bold text-primary">Tablets</span>
                    </div>
                    <div class="col-6 col-lg-2 mt-1 mb-1">
                    <img src="resources/55.jpg" class=" cardd ro"  onclick="wwwww();"/><br/>
                    <span class="fs-5 fw-bold text-primary">Video game consol</span>
                    </div>
                    </div>
                </div>

                <?php
                 $rs=Database::search("SELECT * FROM `category`");
                 $n=$rs->num_rows;
             
                

                for($x=0;$x<$n;$x++){
                  $c=$rs->fetch_assoc();
                  ?>

                <div class="col-12 " id="pcat"  >
                    <a class="link-dark link2"  href="<?php echo $c["name"];?>.php"><?php echo $c["name"];?></a>&nbsp;&nbsp;
                    <a class="link-dark link3" href="<?php echo $c["name"];?>.php">See All &rightarrow;</a>
                </div>
                <?php

                       $resultset=Database::search("SELECT * FROM `product` WHERE `category_id`='".$c["id"]."' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0");
              
                ?>





                <!------ product title view--->
                <!------ product view--->
                <div class="col-12"  >
                    <div class="row border border-primary mb-1" >
                    <div class="col-12  offset-lg-1  " id="pdiv" >
                        <div class="row row-cols-12 ms-5 row-cols-md-3 row-cols-lg-5 g-5 offset-lg-1 col-12 col-lg-10" id="pdetails" >
                           

                            <?php
                          
                                    $nr=$resultset->num_rows;
                                    for($y=0;$y<$nr;$y++){
                                    $prod=$resultset->fetch_assoc();
                                    ?>
                                     
                                     <div class="card col-6 col-lg-2 mt-6  ms-1  bg-dark" style="width: 20rem; ">
                             
                             <?php
                                $pimage=Database::search("SELECT * FROM `images` WHERE `product_id`='".$prod["id"]."'");
                                $imgrow=$pimage->fetch_assoc();
                             ?>
                             
                             <div class="card cr" >
                             
                            <img src="<?php echo $imgrow["code"];?>" class="card-img-top cardtopimg ccr" />
                             <div class="card-body">
                             <h5 class="card-title text-light"><?php echo $prod["title"]?><span class="badge bg-info">New</span></h5>
                                <span class="card-text fs-4 text-info">Rs.<?php echo  $prod["price"]?>.00</span>
                                <br/>

                                 
                                <?php
                               $pstatus=Database::search("SELECT * FROM `status` WHERE `id`='".$prod["status_id"]."'");
                               $statusrow=$pstatus->fetch_assoc();
                                 
                           

                                                if ((int)$prod["qty"] > 0) {
                                                                ?>
                                                                    <span class="card-text text-warning"><input id="stockvalue<?php echo $prod['id']; ?>" value="<?php echo $prod["qty"]; ?>" style="width: 40px;" class="text-warning fw-bold text-center border-0" disabled/><b> In Stock</b></span>
                                                                    <input type class="form-cotrol mb-1" type="number" id="qtytxt<?php echo $prod['id']; ?>" value="1" />
                                                                    <a href="<?php echo "singalproductview.php?id=" . ($prod['id']) ?>" class="btn btn-success col-4">Buy </a>
                                                                    <a class="btn btn-danger col-4" onclick="addToCart(<?php echo $prod['id']; ?>);"> Cart</a>
                                                                    <a href="#" class="btn btn-secondary col-3" onclick="addToWatchList(<?php echo $prod['id']; ?>);"><i class="bi bi-heart-fill"></i></a>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <span class="card-text text-danger"><b>Out of Stock</b></span>
                                                                    <input type class="form-cotrol mb-1" type="number" value="1" disabled />
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
                <!------ product view--->

            </div>
        </div>
        <?php
                             
                                }
                            ?>
        <!------ footer--->
<!-- 
        <footer class="bg-dark text-white pt-5 pb-4 mt-5">
            <div class="col-12 text-center text-md-start">
                <div class="row text-center text-md-start">
                    <div class="col-12 col-md-3 col-lg-3 mx-auto mt-3 ">
                        <h5 class="text-uppercase mb-4 text-warning">company name</h5>
                        <p>Here we are the eShop.lk&trade; to support you for accomplish your dessire by selling high
                            quality products.</p>
                    </div>
                    <div class="col-12 col-md-3 col-lg-2 mx-auto mt-3">
                        <p>Copyright &copy;2020 eShop All Rights Reserved</p>
                    </div>
                    <div class="col-12 col-md-2 col-lg-2 mx-auto mt-3">
                        <div class="text-center text-md-start">
                            <ul class="list-inline list-unstyled">
                                <li class="list-inline-item">
                                    <a href="#" class="btn-floating  btn-sm text-white" style="font-size:23px;">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn-floating  btn-sm text-white" style="font-size:23px;">
                                        <i class="bi bi-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn-floating  btn-sm text-white" style="font-size:23px;">
                                        <i class="bi bi-google"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn-floating  btn-sm text-white" style="font-size:23px;">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn-floating  btn-sm text-white" style="font-size:23px;">
                                        <i class="bi bi-youtube"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 col-lg-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 text-warning">contact</h5>

                        <p>
                            <i class="bi bi-house-fill pe-1"></i>
                            Maradana, colombo 10 ,Sri Lanka
                        </p>

                        <p>
                            <i class="bi bi-envelope-fill pe-1"></i>
                            eShop@gmail.com
                        </p>

                        <p>
                            <i class="bi bi-telephone-fill"></i> +94112546978
                        </p>

                        <p>
                            <i class="bi bi-printer-fill"></i> +94112546978
                        </p>


                    </div>
                </div>
        </footer> -->
        <?php require "footer.php";?>
        <!------ footer--->
    </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    
</body>

</html>