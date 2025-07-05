<?php
 require "adminheader.php";

    require "connection.php";
    
    if(isset($_SESSION["a"])){
       $user=$_SESSION["a"];
       
        $pageno;
        ?>
<!DOCTYPE html>

<html>

<head>
    <title>Best Place|seller's product view</title>
    <link rel="icon" href="resources/bestplace.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="icon" href="resources/bestplace.png" /> -->
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


</head>

<body style="background-color:#E9EBEE;">


    <div class="container-fluid">
        <div class="row">
            <!--head-->
          
            
            <div class="col-12 bg-info">
                <div class="row">
                   
                    <div class="col-4">
                        <div class="row">
                            <div class="col-12 col-lg-4  mt-1 mb-1">
                                <?php
                                 $profileimg=Database::search("SELECT * FROM `profile_img` WHERE `user_email`='".$_SESSION["a"]["email"]."'");
                                $pn=$profileimg->num_rows;
                                
                                if($pn==1){
                                    $pr=$profileimg->fetch_assoc();
                                  ?>
                                <img class="rounded-circle" src="<?php echo $pr["code"]; ?>" height="90px"
                                    height="90px" />
                                <?php
                                }else{
                                    ?>
                                <img class="rounded-circle" src="resources/demoProfileImg.jpg" height="90px"
                                    height="90px" />
                                <?php
                                }
                                ?>

                            </div>

                            <div class="col-12 col-lg-8">
                                <div class="row">
                                    <div class="col-12  mt-0 mt-lg-4">
                                        <span class="fw-bold">
                                            <?php echo $_SESSION["a"]["fname"];?> <?php echo $_SESSION["a"]["lname"];?>
                                        </span>
                                    </div>
                                    <div class="col-12 ">
                                        <span class="text-white">
                                            <?php echo $_SESSION["a"]["email"];?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- <div class="col-8">
                        <div class="row">
                            <div class="col-12  mt-5 my-lg-3 ">
                                <h1 class="text-white fw-bold fs-1 offset-6 offset-lg-2 ">My Products</h1>
                                <button class="btn-dark text-white fw-bold  offset-6 offset-lg-9">Add Product</button>
                            </div>
                        </div>
                    </div>
  
                    <div class="col-12 mt-3 col-lg-2">
                      
                    </div> -->

                    <div class="col-8">
                            <div class="row">
                                <div class="col-12  mt-4 my-lg-3 ">
                                    <div class="row">
                                        <h1 class="text-white fw-bold fs-1 offset-lg-2 col-lg-7 offset-6 col-7">My Products</h1>
                                        <button onclick="gotoaddproduct();" class="btn btn-dark text-white fw-bold fs-6 offset-lg-0 col-lg-2 offset-5 col-5">Add Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>
<!-- 
                    <div class="col-6">
                        <div class="row">
                            <div class="col-8  mt-5 my-lg-3 ">
                                <h1 class="text-white fw-bold fs-1  offset-lg-2 ">My Products</h1>
                               
                            </div>
                        </div>
                    </div>
  
                    <div class="col-5 col-lg-4 mt-3 col-lg-2">
                    <button class="btn-dark text-white fw-bold mt-3 offset-9  offset-lg-4">Add Product</button>
                    </div>
 
  -->
                </div>
            </div>
            <!--head-->
            <div class="col-12 ">
                <div class="row ">

                    <!--sorting-->
                    <div class="col-12 col-lg-2 mx-lg-3 mx-0  mx-mt-3 mb-3 my-3 rounded  border border-primary  d-none">
                        <div class="row ">
                            <div class="col-12 mt-3 ms-3 fs-5">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Filters</label>
                                    </div>
                                    <div class="col-11">
                                        <div class="row">
                                            <div class="col-10">
                                                <input type="text" class="form-control" placeholder="search...." id="s"/>

                                            </div>
                                            <div class="col-1">
                                                <label class="form-label fs-3 bi bi-search"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Active Time</label>
                                    </div>
                                    <div class="col-12">
                                        <hr width="80%" />
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input fs-5" type="radio" name="n"
                                                id="n">
                                            <label class="form-check-label fs-5" for="n">
                                                Newer To Oldest
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="o"
                                                id="o">
                                            <label class="form-check-label" for="o">
                                                Oldest To Newer
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <label class="form-label fw-bold">By Quantity</label>
                                    </div>
                                    <div class="col-12">
                                        <hr width="80%" />
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input fs-5" type="radio" name="l"
                                                id="l">
                                            <label class="form-check-label fs-5" for="l">
                                                Low to High
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="h"
                                                id="h">
                                            <label class="form-check-label" for="h">
                                                High to Low
                                            </label>
                                        </div>
                                    </div>



                                    <div class="col-12 mt-3">
                                        <label class="form-label fw-bold">ByConditionQuantity</label>
                                    </div>
                                    <div class="col-12">
                                        <hr width="80%" />
                                    </div>
                                    <div class="col-12 ">
                                        <div class="form-check">
                                            <input class="form-check-input fs-5" type="radio" name="b"
                                                id="b">
                                            <label class="form-check-label fs-5" for="b">
                                                Brand New
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="u"
                                                id="u">
                                            <label class="form-check-label" for="u">
                                                Used
                                            </label>
                                        </div>
                                    </div>

                                    <div class="offset-0 offset-lg-2 col-11 col-lg-6 mb-3 mt-4 d-grid">
                                        <div class="row">
                                            <button class="col-12 d-grid btn btn-primary fw-bold mb-3 " onclick="addFilters();">Search</button>
                                            <button class="col-12 d-grid btn btn-success ">Clear Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--sorting-->


                    <!--product-->
                    <div class="col-12 col-lg-12 mt-3 mb-3 bg-dark border border-light border-4">
                        <div class="row">

                            <div class="offset-1 col-10 text-center">
                                <div class="row">

                                    <?php
                                    if (isset($_GET["page"])) {
                                        $pageno = $_GET["page"];
                                       
                                    } else {
                                        $pageno = 1;
                                    }


                                        $product = Database::search("SELECT * FROM product WHERE admin_email='" . $user["email"] . "';");
                                        $d = $product->num_rows;
                                        $row = $product->fetch_assoc();

                                        $results_per_page = 6;

                                        $number_of_page = ceil($d / $results_per_page);

                                        //echo $d;
                                        //echo"<br/>";
                                        //echo $number_of_pages;

                                        
                                        $page_first_result = ((int)$pageno-1) * $results_per_page;

                                        $selectedrs = Database::search("SELECT * FROM `product` WHERE admin_email='" . $user["email"] . "' LIMIT ".$results_per_page." OFFSET " .$page_first_result. "" );
                                        $srn = $selectedrs->num_rows;

                                        while($srow=$selectedrs->fetch_assoc()){

                                     
                                        // for ($i = 0; $i < $srn; $i++) {
                                            // $srow = $selectedrs->fetch_assoc();
                                        ?>
                                    <div class="card mb-3 col-12 col-lg-6 mt-3 ">
                                        <div class=" row g-0">


                                            <?php
                                                    $pimgrs = Database::search("SELECT * FROM `images` WHERE product_id = '" . $srow["id"] . "';");
                                                    $pir = $pimgrs->fetch_assoc();
                                                    ?>
                                            <div class="col-md-4 mt-4">
                                                <img src="<?php echo $pir["code"] ?>" class="img-fluid rounded-start"
                                                    alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title fw-bold text-light"><?php echo $srow["title"]; ?></h5>
                                                    <span
                                                        class="card-text fw-bold text-primary"><?php echo $srow["price"]; ?>
                                                        .00</span>
                                                    <br />
                                                    <span
                                                        class="card-text fw-bold text-success"><?php echo $srow["qty"]; ?>
                                                        Items Left</span>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="check"
                                                            onchange="changestatus(<?php echo $srow['id']; ?>);" <?php
                                                             if($srow["status_id"]==2){
                                                            echo "checked";

                                                        }?> />
                                                        <label class="form-check-label fw-bold text-info" for="check"
                                                            id="ckecklabel<?php echo $srow['id'];?>"><?php
                                                        if($srow["status_id"]==2){
                                                            echo "make your product active";
                                                        }else{
                                                            echo "make your product deactive";
                                                        }
                                                      
                                                        ?>
                                                        </label>
                                                    </div>
                                                    <div clss="col-12">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-6">
                                                                <a href="#" class="btn btn-light d-grid" onclick="sendid(<?php echo $srow['id']; ?>);">Update</a>
                                                            </div>
                                                            <div class="col-12 col-lg-6 mt-1 mt-lg-0">
                                                                <a href="#" class="btn btn-info d-grid"
                                                                    onclick="deleteModel(<?php echo $srow['id']; ?>);">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModel<?php echo $srow['id']; ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Warning...
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    are you sure you want to delete this product.?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success"
                                                        data-bs-dismiss="modal">No</button>
                                                   <button  type="button" class="btn btn-danger" onclick="deleteproduct(<?php echo $srow['id']; ?>);">Yes</button>
                                                </div>
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

 

                            <!--pagination-->
                            <div class="col-12 mb-3 text-center">
                                <div class="offset-1  col-10 d-flex justify-content-center ">
                                    <div class="pagination">
                                        <a href="<?php 
                                             if($pageno<=1){
                                                     echo "#";
                                             }else{
                                                    echo "?page=" .($pageno-1);                                             }
                                            ?>">&laquo;</a>

                                        <?php
                                            for ($page = 1; $page <= $number_of_page; $page++) {
                                                if($page==$pageno){

                                                    ?>

                                        <a href="<?php echo "?page=" . ($page); ?>"
                                            class="ms-1 active"><?php echo $page;?></a>

                                        <?php
                                                }else{
                                                    ?>

                                        <a href="<?php echo "?page=" . ($page); ?>" class="ms-1"><?php echo $page;?></a>

                                        <?php
                                                }
                                          
                                            }
                                            ?>

                                        <a href="<?php

                                            if($pageno>=$number_of_page){
                                                echo "#";
                                            }else{
                                                echo "?page=" .($pageno+1);     
                                            }
                                            ?>">&raquo;</a>
                                    </div>
                                </div>
                            </div>


                            <!--pagination-->




                            <?php
              require "footer.php";
              ?>


                            <!-- </div>-->
                            <!-- </div> -->
                        </div>
              
                    </div>
                    <!--product-->


               

                </div>
              
            </div>


           
            <!--footer-->
          
            <!--footer-->

            <script src="script.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="bootstrap.js"></script>
         
</body>


<?php 
    }
?>

</htmL>

