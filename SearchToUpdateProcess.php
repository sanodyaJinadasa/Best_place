<?php

// $id = $_GET["id"];

// echo $id;
require "connection.php";
$array;

if(isset($_GET["id"])){
    $id = $_GET["id"];

    if(empty($id)){
        echo "Please Enter the Product Id";
    }else{
        $prs = Database::search("SELECT * FROM `product` WHERE `id`='".$id."';");
        $n = $prs->num_rows;

        if($n == 1){
            $r = $prs->$prs->fetch_assoc();

            $array["id"] = $r["id"];
            $array["title"] = $r["title"];

            $crs = Database::search("SELECT * FROM `category` WHERE `id`='".$r["categpry_id"]."';");
            if($crs->num_rows == 1){
                $cr = $crs->fetch_assoc();
                $array["catergory"]  = $cr["name"];
            }
            // $array["category_id"] = $r["category_id"];
            // $array["id"] = $r["id"];
            // $array["id"] = $r["id"];
            
            echo json_encode($array);

        }else{
            echo "Invalid Product Id";
        }
    }
}

?>