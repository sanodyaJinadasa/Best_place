<?php
require "adminheader.php";
require "connection.php";
?>

<!DOCTYPE html>

<html>

<head>
    <title>Best Place | Admin | Manage Products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="resources/bestplace.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body style="background-color: #74ebd5; background-image: linear-gradient(90deg,#74ebd5 0%, #9face6 100%);min-height: 100px;">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 bg-light text-center rounded card">
                <label class="form-label fs-2 fw-bold text-dark fw-bolder">Manage All Products</label>
            </div>


            <div class="col-12  mt-3 mb-2 card">
                <div class="row">
                    <div class="col-lg-1 bg-info pt-2 pb-2 text-end d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">#</span>
                    </div>
                    <div class="col-lg-2 bg-info pt-2 pb-2 fw-bold d-none d-lg-block">
                        <span class="fs-4 fw-bold">Product Image</span>
                    </div>
                    <div class="col-lg-2 bg-info pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Title</span>
                    </div>
                    <div class="col-lg-2 bg-info pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold">Price</span>
                    </div>
                    <div class="col-lg-2 bg-info pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Quantity</span>
                    </div>
                    <div class="col-lg-2 bg-info pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold">Registered Date</span>
                    </div>
                    <div class="col-lg-1 bg-info pt-2 pb-2 text-end">
                        <span class="fs-4 fw-bold"></span>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_GET["page"])) {
                $pageno = $_GET["page"];
            } else {
                $pageno = 1;
            }


            $usersrs = Database::search("SELECT * FROM product");
            $d = $usersrs->num_rows;
            $row = $usersrs->fetch_assoc();

            $results_per_page = 20;

            $number_of_page = ceil($d / $results_per_page);

            //echo $d;
            //echo"<br/>";
            //echo $number_of_pages;
            $c = 0;

            $page_first_result = ((int)$pageno - 1) * $results_per_page;

            $selectedrs = Database::search("SELECT * FROM `product` LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
            $srn = $selectedrs->num_rows;

            while ($srow = $selectedrs->fetch_assoc()) {

                $c = $c + 1;
                // for ($i = 0; $i < $srn; $i++) {
                // $srow = $selectedrs->fetch_assoc();
            ?>


                <div class="col-12 mb-3 mb-lg-2 card">
                    <div class="row">

                        <div class="col-12 col-lg-1 bg-secondary pt-2 pb-2 text-end">
                            <div class="row">
                                <span class="fs-4 fw-bold text-white d-block d-lg-none col-5">#</span>
                                <span class="fs-4 fw-bold text-white col-6 col-lg-12"><?php echo $c ?></span>
                            </div>
                        </div>

                        <div class="col-12 col-lg-2 bg-light pt-2 pb-2 fw-bold text-center">
                            <?php
                            $img = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $srow["id"] . "'");
                            $pimg = $img->fetch_assoc();
                            ?>
                            <img class="rounded" src="<?php echo $pimg["code"] ?>" style="height: 70px;" onclick="singeviewmodel(<?php echo $srow['id']; ?>);" />
                        </div>

                        <div class="col-12 col-lg-2 bg-secondary pt-2 pb-2">
                            <div class="row">
                                <span class="fs-4 fw-bold text-white d-block d-lg-none col-5">Title</span>
                                <span class="fs-4 fw-bold text-white col-6 col-lg-12"><?php echo $srow["title"]; ?></span>
                            </div>
                        </div>


                        <div class="col-12 col-lg-2 bg-light pt-2 pb-2 d-lg-block">
                            <div class="row">
                                <span class="fs-4 fw-bold col-6 col-lg-0 d-block d-lg-none">Price</span>
                                <span class="fs-4 fw-bold col-6 col-lg-12">Rs.<?php echo $srow["price"]; ?> .00</span>
                            </div>
                        </div>

                        <div class="col-12 col-lg-2 bg-secondary pt-2 pb-2">
                            <div class="row">
                                <span class="fs-4 fw-bold text-white d-block d-lg-none col-5">Quantity</span>
                                <span class="fs-4 fw-bold text-white col-6 col-lg-12"><?php echo $srow["qty"]; ?></span>
                            </div>
                        </div>


                        <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                            <span class="fs-4 fw-bold">2021-10-01</span>
                        </div>
                        <div class="col-12 col-lg-1 bg-light pt-2 pb-2">
                            <?php
                            $s = $srow["status_id"];

                            if ($s == "1") {
                            ?>
                                <button id="blockp<?php echo $srow['id']; ?>" class="btn btn-danger offset-3 offset-lg-0 col-6 col-lg-12" onclick="blockproduct('<?php echo $srow['id']; ?>')">Block</button>
                            <?php
                            } else {
                            ?>
                                <button id="blockp<?php echo $srow['id']; ?>" class="btn btn-success offset-3 offset-lg-0 col-6 col-lg-12" onclick="blockproduct('<?php echo $srow['id']; ?>')">Unblock</button>
                            <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>
                <!-- Modal -->

                <div class="modal fade" id="singaleproductview<?php echo $srow["id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">


                                <h5 class="modal-title" id="staticBackdropLabel"><?php echo $srow["title"]; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <img src="<?php echo $pimg["code"] ?>" style="height:250px; " class="img-fluid" /><br />
                                </div>
                                <span>Price:</span>&nbsp;
                                <span>Rs.<?php echo $srow["price"]; ?>.00</span><br />

                                <span>Quentity:</span>&nbsp;
                                <span><?php echo $srow["qty"]; ?> Item Left</span><br />

                                <?php
                                $s = $srow["admin_email"];
                                $sellerrs = Database::search("SELECT * FROM `user` WHERE `email`='" . $s . "'");
                                $sr = $sellerrs->fetch_assoc();
                                ?>

                                <span>Seller :</span>&nbsp;
                                <?php echo $sr["fname"] . "" . $sr["lname"]; ?></span><br />

                                <span>description:</span>&nbsp;
                                <p><?php echo $srow["description"]; ?></p><br />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->

            <?php

            }
            ?>


            <!--pagination-->
            <div class="col-12 mb-3 text-center">
                <div class="offset-1  col-10 d-flex justify-content-center ">
                    <div class="pagination">
                        <a href="<?php
                                    if ($pageno <= 1) {
                                        echo "#";
                                    } else {
                                        echo "?page=" . ($pageno - 1);
                                    }
                                    ?>">&laquo;</a>

                        <?php
                        for ($page = 1; $page <= $number_of_page; $page++) {
                            if ($page == $pageno) {

                        ?>

                                <a href="<?php echo "?page=" . ($page); ?>" class="ms-1 active"><?php echo $page; ?></a>

                            <?php
                            } else {
                            ?>

                                <a href="<?php echo "?page=" . ($page); ?>" class="ms-1"><?php echo $page; ?></a>

                        <?php
                            }
                        }
                        ?>

                        <a href="<?php

                                    if ($pageno >= $number_of_page) {
                                        echo "#";
                                    } else {
                                        echo "?page=" . ($pageno + 1);
                                    }
                                    ?>">&raquo;</a>
                    </div>
                </div>
            </div>

            <!--pagination-->
             <hr />

            <div class="col-12">
                <h3 class="text-primary">Manage Categories</h3>
            </div>

            <hr>

            <div class="col-12 mb-3">
                <div class="row g-1">

                    <?php
                $categoryrs = Database::search("SELECT * FROM `category`");
                    $num = $categoryrs->num_rows;

                    for ($i = 0; $i < $num; $i++) {
                    $row = $categoryrs->fetch_assoc();
                    ?>
                        <div class="col-12 col-lg-3">
                            <div class="row g-1 px-1">
                                <div class="col-12 text-center bg-body border border-2 border-success shadow rounded">
                                    <label class="form-label fs-4 fw-bold py-3"><?php echo $row["name"]; 
                                                                                ?></label>
                                </div>
                            </div>
                        </div>
                        
                    <?php

                    }
                    ?> 



            
                    <div class="col-12 col-lg-3" onclick="addnewmodel();">
                        <div class="row g-1 px-1">
                            <div class="col-12 text-center bg-body border border-2 border-danger shadow rounded">
                                <div class="row">
                                    <div class="col-3 mt-3 addnewimg"></div>
                                    <div class="col-9">
                                        <label class="form-label fs-4 fw-bold py-3 text-black-50">Add New
                                            Category</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

        </div>

    </div>

    
    <div class="modal fade" id="addnewmodel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add New Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="savecategory();">Save</button>
                        </div>
                    </div>
                </div>
            </div> 

    </div>
    </div>


    <?php
    require "footer.php";
    ?>

    <script src="script.js"></script>

    <script src="bootstrap.bundle.js"></script>
</body>

</html>