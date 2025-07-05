<?php
require "adminheader.php";
require "connection.php";
?>

<!DOCTYPE html>

<head>
    <title>Best Place | Add Product</title>
    <link rel="icon" href="resources//bestplace.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div id="addproductbox">
        <div class="container-fluid">
            <div class="row gy-3">
                <!--heading-->
                <div class="col-12 mb-2">
                    <h3 class="h2 text-center text-info fw-bolder">Product Listing</h3>
                </div>
                <!--heading-->

                <!--category-->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Category</label>
                                </div>
                                <div class="col-12">
                                    <select class="from-select col-6" id="ca">
                                        <option value="0">Select Category</option>
                                        <?php
                                        $r = Database::search("SELECT * FROM `category`");
                                        $n = $r->num_rows;
                                        for ($x = 0; $x < $n; $x++) {
                                            $d = $r->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $d["id"]; ?>"><?php echo $d["name"]; ?></option>
                                        <?php
                                        }

                                        ?>
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
                                    <select class="from-select col-6" id="br">
                                        <option value="0">Select Brand</option>
                                        <?php
                                        $r = Database::search("SELECT * FROM `brand`");
                                        $n = $r->num_rows;
                                        for ($x = 0; $x < $n; $x++) {
                                            $d = $r->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $d["id"]; ?>"><?php echo $d["name"]; ?></option>
                                        <?php
                                        }

                                        ?>
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

                                    <select class="from-select col-6" id="mo">
                                        <option value="0">Select Model</option>
                                        <?php
                                        $r = Database::search("SELECT * FROM `model`");
                                        $n = $r->num_rows;
                                        for ($x = 0; $x < $n; $x++) {
                                            $d = $r->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $d["id"]; ?>"><?php echo $d["name"]; ?></option>
                                        <?php
                                        }

                                        ?>
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
                        <div class="col-12 offset-lg-2 col-lg-8">
                            <input class="form-control" type="text" id="ti" />
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
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="bn" checked>
                                    <label class="form-check-label" for="bn">
                                        Brandnew
                                    </label>
                                </div>
                                <div class="offset-1 form-check offset-lg-1 col-12 ms-5 col-lg-3">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="us">
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

                                        <?php
                                        $r = Database::search("SELECT * FROM `color`");
                                        $n = $r->num_rows;
                                        for ($x = 0; $x < $n; $x++) {
                                            $d = $r->fetch_assoc();
                                            $z = 1;
                                        ?>

                                            <div class="offset-1  offset-lg-0 col-10 col-lg-4 form-check">
                                                <input class="form-check-input" type="radio" value="<?php echo $d["id"]; ?>" id="clr<?php echo $d["id"]; ?>" name="colorRadio" checked>
                                                <label class="form-check-label" for="clr1">
                                                    <?php echo $d["name"]; ?>
                                                </label>
                                            </div>
                                        <?php
                                        $z = $z+1;
                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12 ">
                                    <lebal class="form-label lbl1">Add Product Quantity</lebal>
                                    <input class="form-control" type="number" value="0" min="0" id="qty" />
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
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest rupee) " id="cost">
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
                                <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="dwc">
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
                                <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="doc">
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
                        <textarea class="form-control  " cols="50" rows="15" style="background-color: rgb(205, 253, 248);" id="desc"></textarea>
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
                    <img src="resources/addproductimg.svg" class="mb-3 col-4 col-lg-2 ms-2 img-thumbnail " id="prev" />
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12  mt-2 col-lg-6">
                                <div class="row">
                                    <div class="col-12 col-lg-6 mb-1">
                                        <input type="file" accept="img/*" id="imguploader" class="d-none"/>
                                        <label for="imguploader" class=" col-6  col-lg-8 btn btn-primary" onclick="changeImg();">Upload</label>

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
            <label class="form-label">We are taking 5% of te product price from every product as a service charge</label>
        </div>
        <!---notice---->

        <!---btn-->
        <div class="col-12">
            <div class="row">

                <div class="offset-0 offset-lg-4 col-12 col-lg-4 d-grid mb-2">
                    <button class="btn btn-info searchbtn" onclick="addProduct();">Add Product</button>
                </div>
            </div>

        </div>
        <!---btn-->


    </div>
    </div>
    </div>

        <!---footer-->
        <?php
        require "footer.php";
        ?>
        <!---footer-->

    <script src="script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>