<?php
require "adminheader.php";
require "connection.php";
?>

<!DOCTYPE html>

<html>

<head>
    <title>Best Place | Admin | Manage Users</title>
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

            <div class="col-12 bg-light text-center rounded">
                <label class="form-label fs-2 fw-bold text-primary">Manage All Users</label>
            </div>

            <!-- <div class="col-12 bg-light rounded">
                <div class="row">
                    <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-9">
                                <input type="text" class="form-control" id="searchtxt" />
                            </div>
                            <div class="col-3 d-grid">
                                <button class="btn btn-primary" onclick="searchuser();">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->



            <div class="col-12  mt-3 mb-2">
                <div class="row">
                    <div class="col-lg-1 bg-secondary pt-2 pb-2 text-end d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">#</span>
                    </div>
                    <div class="col-lg-2 bg-light pt-2 pb-2 fw-bold d-none d-lg-block">
                        <span class="fs-4 fw-bold">profile Image</span>
                    </div>
                    <div class="col-lg-2 bg-secondary pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">User Name</span>
                    </div>
                    <div class="col-lg-2 bg-light pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold">Email</span>
                    </div>
                    <div class="col-lg-2 bg-secondary pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Mobile</span>
                    </div>
                    <div class="col-lg-2 bg-light pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold">Registered Date</span>
                    </div>
                    <div class="col-lg-1 bg-light pt-2 pb-2 text-end">
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


            $usersrs = Database::search("SELECT * FROM user");
            $d = $usersrs->num_rows;
            $row = $usersrs->fetch_assoc();

            $results_per_page = 20;

            $number_of_page = ceil($d / $results_per_page);

            //echo $d;
            //echo"<br/>";
            //echo $number_of_pages;
            $c = 0;

            $page_first_result = ((int)$pageno - 1) * $results_per_page;

            $selectedrs = Database::search("SELECT * FROM `user` LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
            $srn = $selectedrs->num_rows;

            while ($srow = $selectedrs->fetch_assoc()) {

                $c = $c + 1;
                // for ($i = 0; $i < $srn; $i++) {
                // $srow = $selectedrs->fetch_assoc();
            ?>

                <div class="col-12 mb-2">
                    <div class="row">
                        <div class="col-12" >
                            <div class="row">


                                <div class="col-12 col-lg-1 bg-secondary pt-2 pb-2 text-end">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-0 d-block d-lg-none">#</span>
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-12"><?php echo $c ?></span>
                                    </div>
                                </div>


                                <div class="col-12 col-lg-2 bg-light pt-2 pb-2 fw-bold text-center">
                                    <img class="rounded" src="resources/demoProfileImg.jpg" style="height: 70px;" />
                                </div>


                                <div class="col-12 col-lg-2 bg-secondary pt-2 pb-2">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-0 d-block d-lg-none">User Name</span>
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-12"><?php echo $srow["fname"] . " " . $srow["lname"]; ?></span>
                                    </div>
                                </div>


                                <div class="col-12 col-lg-2 bg-light pt-2 pb-2">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-dark col-6 col-lg-0 d-block d-lg-none">Email</span>
                                        <span class="fs-5 fw-bold text-dark col-6 col-lg-12"><?php echo $srow["email"]; ?></span>
                                    </div>
                                </div>



                                <div class="col-12 col-lg-2 bg-secondary pt-2 pb-2">
                                    <div class="row">
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-0 d-block d-lg-none">Mobile</span>
                                        <span class="fs-4 fw-bold text-white col-6 col-lg-12"><?php echo $srow["mobile"]; ?></span>
                                    </div>
                                </div>


                                <div class="col-lg-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                    <span class="fs-4 fw-bold"><?php
                                                                $rd = $srow["register_date"];
                                                                $solitrd = explode(" ", $rd);
                                                                echo $solitrd[0];
                                                                ?></span>
                                </div>


                                <div class="col-lg-1 bg-light pt-2 pb-2">
                                    <?php
                                    $s = $srow["status_id"];

                                    if ($s == "1") {
                                    ?>
                                        <button id="blockbutton<?php echo $srow['email']; ?>" class="btn btn-danger col-4 offset-4 col-lg-12 offset-lg-0" onclick="blockusers('<?php echo $srow['email']; ?>')">Block</button>
                                    <?php
                                    } else {
                                    ?>
                                        <button id="blockbutton<?php echo $srow['email']; ?>" class="btn btn-success col-4 offset-4 col-lg-12 offset-lg-0" onclick="blockusers('<?php echo $srow['email']; ?>')">Unblock</button>
                                    <?php
                                    }
                                    ?>


                                </div>

                            </div>


                        </div>



                    </div>
                </div>

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
            <!-- Modal -->
            <div class="modal fade" id="msgmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">My Message</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12 py-5 px-4">
                                <div class="row rounded overflow-hidden shadow">
                                    <div class="col-12 px-0">
                                        <div class="bg-white">
                                            <div class="bg-light px-4 py-2">
                                                <h5 cass="mb-0 py-1">Recent</h5>
                                            </div>


                                            <div class="ms-box">
                                                <div class="list-group rounded-0">
                                                    <a href="#" class="list-group-item list-group-item-action text-white rounded-0 bg-primary">
                                                        <div class="media">
                                                            <img src="resources/demoProfileImg.jpg" width="50px" class="rounded-circle" />
                                                            <div>
                                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                                    <h6 class="mb-0">Kamal</h6>
                                                                    <small class="small fw-bold">01-10</small>

                                                                </div>
                                                                <p class="mb-0 ">Got the Product.</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 py-5 px-4">


                                    <div class="col-12 px-0">
                                        <div class="row px-4 py-5  chatbox">
                                            <!--sender ms-->
                                            <div class="media mb-3 w-50">
                                                <img src="resources/demoProfileImg.jpg" width="50px" class="rounded-circle" />
                                                <div class="media-body me-3">
                                                    <div class="bg-light rounded py-2 px-3 mb-2">
                                                        <p class="mb-0 text-text-black-50">Got it.Thank You !</p>
                                                    </div>
                                                    <p class="small text-text-black-50 text-end">12:00| 10.10.2021</p>
                                                </div>
                                            </div>

                                            <!--sender ms-->

                                            <!--resiver ms-->
                                            <div class="media w-50 mb-3">
                                                <div class="media-body">
                                                    <div class="bg-white py-2 px-2 mb-2">
                                                        <p class="mb-0 text bg-white">Have you got the product.?</p>
                                                    </div>
                                                    <p class="small text-text-black-50 text-end">12:00| 10.10.2021</p>
                                                </div>
                                            </div>
                                            <!--resiver ms-->


                                            <!--text-->
                                            <div class="col-12">
                                                <div class="row modal-dialog-scrollable">
                                                    <div class="input-group">
                                                        <input type="text" placeholder="Type a message..." aria-describedby="sendbox" class="form-control rounded-0 border-0 py-4 bg-light" />
                                                        <div class="input-group-append">
                                                            <buttton id="sendbtn" onclick="sendms();" class="btn btn-link fs-2"><i class="bi bi-cursor-fill"></i></buttton>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--text-->
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
    <div class="col-12 ds" style="margin-top: 230px;">
        <?php require "footer.php"; ?>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>