<?php

require "connection.php";

if(isset($_POST["k"])){
    $k=$_POST["k"];
$c=$_POST["c"];
$b=$_POST["b"];
$m=$_POST["m"];
$con=$_POST["con"];
$clr=$_POST["clr"];
$pf=$_POST["pf"];
$pt=$_POST["pt"];

if (isset($_GET["page"])) {
$pageno = $_GET["page"];
} else {
    $pageno = 1;
}



$productrs=Database::search("SELECT * FROM `product` WHERE `description` LIKE '%".$k."%'");
$n=$productrs->num_rows;

$results_per_page = 20;
$number_of_page = ceil($n / $results_per_page);

$page_first_result = ((int)$pageno - 1) * $results_per_page;

// $selectedrs = Database::search("SELECT * FROM `user` LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
$product = Database::search("SELECT * FROM `product`  WHERE `description` LIKE '%".$k."%' LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");

$productnum=$product->num_rows;



for($x=0;$x<$productnum;$x++){
    $r=$productrs->fetch_assoc();

    ?>
 <div class="card mb-3 col-12 col-lg-5  mt-3 ms-0 ms-lg-5 ">
                                        <div class=" row g-0">
                                            <div class="col-md-4 mt-4">
                                            <?php
                                                $imgrs=Database::search("SELECT * FROM `images` WHERE `product_id`='".$r["id"]."'");   
                                                 $in=$imgrs->num_rows;

                                                 for($z=0;$z<$in;$z++){
                                                     $ir=$imgrs->fetch_assoc();
                                                  ?>
                                                <img src="<?php echo $ir["code"];?>" class="img-fluid rounded-start" alt="...">
                                                <?php
                                                 }
                                                   
                                                ?>
                                                    
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title fw-bold"><?php echo $r["title"];?></h5>
                                                    <span class="card-text fw-bold text-primary">Rs. <?php echo $r["price"];?> .00</span>
                                                    <br />
                                                    <span class="card-text fw-bold text-success"><?php echo $r["qty"];?> Item Left</span>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckDefault">
                                                        <label class="form-check-label fw-bold text-info"
                                                            for="flexSwitchCheckDefault">Make your Product Deactive
                                                        </label>
                                                    </div>
                                                    <div clss="col-12">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-5">
                                                                <a href="#" class="btn btn-success d-grid">Buy Now </a>
                                                            </div>
                                                            <div class="col-12 col-lg-5 mt-1 mt-lg-0">
                                                                <a href="#" class="btn btn-danger d-grid">Add to Cart</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




    <?php

    if(!empty($k) && $c!=="0"){
        $a=Database::search("SELECT * FROM `product` WHERE `description` LIKE '%".$k."%'   AND `category` ='".$c."'");
    }else if( !empty($k) && $b !==0){
        $brs=Database::search("SELECT * FROM `product` WHERE `description` LIKE '%".$k."%'   AND `model_has_brand_id` IN (SELECT `id` FROM `model_has_brand` WHERE `brand_id`='".$b."' )");
        $num=$brs->num_rows;
        for($v=0;$v<$num;$v++){
        $row=$brs->fetch_assoc();
        
 }
}else if( !empty($k) && $m !==0){
    $mrs=Database::search("SELECT * FROM `product` WHERE `description` LIKE '%".$k."%' AND `model_has_brand_id` IN (SELECT `id` FROM `model_has_brand` WHERE `model_id`='".$m."' )");
   
}
}

?>
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

<?php

}else{
   echo "you must enter a keyword to search."; 
}




// echo $k;
// echo $c;
// echo $b;
// echo $m;
// echo $con;
// echo $clr;
// echo $pf;
// echo $pt;
?>