<?php
require "adminheader.php";
require "connection.php";

$product=$_SESSION["a"];
if (isset($_SESSION["p"])) {
    $product=$_SESSION["p"];
//if(isset($product)){
?>


<!DOCTYPE html>
<html>

<head>

    <title>Best Place | Update Product</title>
    <link rel="icon" href="resources/bestplace.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body onload="searchtoupdate(<?php echo $product['id']; ?>);">
    <div class="col-12">
        <div class="row">
            <div id="updateproductbox" class="">
                <div class="container-fluid">
                    <div class="row gy-3">
                        <!--heading-->
                        <div class="col-12 mb-2">
                            <h3 class="h2 text-center text-info fw-bolder">Update Product</h3>
                        </div>
                        <!--heading-->
                        <!-- <div class="col-12 mt-2 mb-2">
                            <div class="row mt-2 mb-2">
                                <div class="col-12 col-lg-4 offset-lg-2">
                                    <input type="text" class="form-control text-center"
                                        placeholder="search Product You Want To Update" id="searchToUpdate" />
                                </div>
                                <div class="col-12 col-lg-4 d-grid">
                                    <button class="btn btn-primary  mt-lg-0 searchbtn" style="height:40px"
                                        onclick="searchtoupdate();">Search
                                        Product</button>
                                </div>
                            </div>
                        </div> -->

                        <!--category-->
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Select Product Category</label>
                                        </div>
                                        <div class="col-12">
                                            <select class="from-select col-6" id="ca" disabled>
                                                <?php 
                                $category=Database::search("SELECT * FROM category WHERE id='".$product["category_id"]."'");
                                $cd=$category->fetch_assoc();
                                ?>

                                                <option value="0">
                                                    <?Php echo $cd["name"] ?>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Select Product Brand</label>
                                        </div>
                                        <div class="col-12 ">
                                            <select class="from-select col-6" id="br" disabled>
                                                <?php 
                                   $brand=Database::search("SELECT * FROM brand ");
                                   $bn=$brand->num_rows;
                                   for($x=0;$x<$bn;$x++)
                                   $br=$brand->fetch_assoc();
                                   ?>
                                                <option value=""><?php echo $br["name"];?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Select Product Model</label>
                                        </div>
                                        <div class="col-12 ">

                                            <select class="from-select col-6" id="mo" disabled>
                                                <?php 
                                   $m=Database::search("SELECT * FROM model ");
                                   $md=$brand->num_rows;
                                   for($x=0;$x<$md;$x++)
                                   $mo=$m->fetch_assoc();
                                   ?>
                                                <option value=""><?php echo $mo["name"];?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--category-->
                        <hr class="hrbreak1">
                        </hr>
                        <!---title---->
                        <div class="col-12">
                            <div class="row">
                                <div clas="col-12">
                                    <label class="form-label lbl1">Add a Title to your Product</label>
                                </div>
                                <div class="col-12 col-lg-8">
                                    <input class="form-control" type="text" id="ti"
                                        value="<?php echo $product["title"]; ?>" />
                                </div>

                            </div>
                        </div>


                        <!---title---->
                        <hr class="hrbreak1">
                        </hr>
                        <!---conditon--->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Select product Condition </label>
                                        </div>
                                        <div class="offset-1 form-check offset-lg-1 ms-5 col-12 col-lg-3">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="bn"
                                                checked>
                                            <label class="form-check-label" for="bn">
                                                Brandnew
                                            </label>
                                        </div>
                                        <div class="offset-1 form-check offset-lg-1 col-12 ms-5 col-lg-3">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="us">
                                            <label class="form-check-label" for="us">
                                                Used
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Select Product Colour</lebal>
                                        </div>
                                        <div class=" col-12">
                                            <div class="row">
                                                <div class="offset-1  offset-lg-0 col-10 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr1"
                                                        name="colorRadio" checked>
                                                    <label class="form-check-label" for="clr1">
                                                        Gold
                                                    </label>
                                                </div>
                                                <div class="offset-1  offset-lg-0 col-10 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr2"
                                                        name="colorRadio">
                                                    <label class="form-check-label" for="clr2">
                                                        Silver
                                                    </label>
                                                </div>
                                                <div class="offset-1  offset-lg-0 col-10 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr3"
                                                        name="colorRadio">
                                                    <label class="form-check-label" for="clr3">
                                                        Pacific Blue
                                                    </label>
                                                </div>
                                                <div
                                                    class="offset-1 offset-lg-0  col-10 offset-1 col-10 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr4"name="colorRadio">
                                                    <label class="form-check-label" for="clr4">
                                                        Jet Black
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0  col-10 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr5"
                                                        name="colorRadio">
                                                    <label class="form-check-label" for="clr5">
                                                        Graphite
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-10 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" id="clr6"
                                                        name="colorRadio">
                                                    <label class="form-check-label" for="clr6">
                                                        Rose Gold
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <lebal class="form-label lbl1">Add Product Quantity</lebal>
                                            <input class="form-control" type="number"
                                                value="<?php echo  $product["qty"];?>" min="0" id="qty" />
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!---conditon--->
                        <hr class="hrbreak1">
                        </hr>
                        <!--cost-->
                        <div class="col-12 ">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <label class="form-label lbl1">Cost Per Item</label>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs</span>
                                            <input type="text" class="form-control"
                                                aria-label="Amount (to the nearest rupee) " id="cost"
                                                value="<?php echo  $product["price"];?>">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 ">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <lebal class="form-label lbl1">Approved Payment Methods</lebal>
                                        </div>
                                        <div class="col-12 ">
                                            <div class="row">
                                                <div class="offset-2 pm1 col-2"></div>
                                                <div class="pm2 col-2"></div>
                                                <div class="pm3 col-2"></div>
                                                <div class="pm4 col-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---cost--->
                    <hr class="hrbreak1">
                    </hr>


                    <!---delevery cost--->
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Delivery Cost</label>
                                </div>
                                <div class="offset-lg-1 col-12 col-lg-3">
                                    <lavel class="form-label">Delivery Cost Within Colombo</label>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs</span>
                                        <input type="text" class="form-control"
                                            aria-label="Amount (to the nearest rupee)" id="dwc"
                                            value="<?php echo  $product["delivery_fee_colombo"];?>">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1"></label>
                                </div>
                                <div class="offset-lg-1 col-12 col-lg-3 mt-lg-3">
                                    <lavel class="form-label">Delivery Cost Out Of Colombo</label>
                                </div>
                                <div class="col-12 col-lg-7 mt-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs</span>
                                        <input type="text" class="form-control"
                                            aria-label="Amount (to the nearest rupee)" id="doc"
                                            value="<?php echo  $product["delivery_fee_other"];?>">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!---delevery cost--->
                    <hr class="hrbreak1">
                    </hr>
                    <!---description---->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1">Product Description</label>
                            </div>
                            <div class="col-12  ">
                                <textarea class="form-control  " cols="50" rows="15" style="background-color: rgb(205, 253, 248);"
                                    id="desc" value=""><?php echo $product["description"];?></textarea>
                            </div>
                        </div>
                    </div>
                    <!---description---->
                    <hr class="hrbreak1">
                    </hr>

                    <!---product image--->
                    <div class="col-12 mx-3">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1">Add Product Image</label>
                            </div>
                            <?php
                $img=Database::Search("SELECT * FROM images WHERE product_id='".$product["id"]."'");
               // $ii=$img->num_rows;
               // for($x=0;$x<$ii;$x++)
                                   
                $i=$img->fetch_assoc();
             
                ?>
                            <img src="<?php echo  $i["code"];?>" class="mb-3 col-4 col-lg-2 ms-2 img-thumbnail "
                                id="prev" value="" />
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12  mt-2 col-lg-6">
                                        <div class="row">
                                            <div class="col-12 col-lg-6 mb-1">
                                                <input type="file" accept="img/*" id="imguploader" class="d-none" />
                                                <label for="imguploader" class=" col-6  col-lg-8 btn btn-primary"
                                                    onclick="changeImg();">Upload</label>

                                            </div>
                                            <!---<div class="col-6 col-lg-4 d-grid mt-2 mt-lg-0">
    <button class="btn btn-primary">Upload</button>
</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!---product image--->

                <hr class="hrbreak1">
                </hr>

                <!---notice---->
                <div class="col-12">
                    <label class="form-label lbl1">Notice...</label>
                    </br>
                    <label class="form-label">We are taking 5% of te product price from every product as a service
                        charge</label>
                </div>
                <!---notice---->

                <!---btn-->
                <div class="col-12">
                    <div class="row">

                        <div class="offset-0 offset-lg-4 col-12 col-lg-4 d-grid mb-2">
                            <button class="btn btn-dark searchbtn" onclick="updateproduct(<?php echo $product['id']; ?>);">Update
                                Product</button>
                        </div>
                    </div>

                </div>
                <!---btn-->

                <!---footer-->
                <?php
    require "footer.php";
    ?>
                <!---footer-->
            </div>
        </div>
    </div>


    </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>
<?php
}
?>