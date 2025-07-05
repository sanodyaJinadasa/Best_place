<?php

session_start();

$user=$_SESSION["a"];

require "connection.php";

$aray;

$search=$_POST["s"];
$age=$_POST["a"];
$qty=$_POST["q"];
$condition=$_POST["c"];

 
if(!empty($search)){
  $products=Database::search("SELECT * FROM `product` WHERE `admin_email`='".$user["email"]."' AND `title` LIKE '%".$search."%'");
  $pn=$products->num_rows;
   echo $pn;
for($x=0;$x<$pn;$x++){
    $pd=$products->fetch_assoc();

    $aray[$x]=$products->fetch_assoc();
    
  $product_id=$pd["id"];
    
    //$aray['id']=$product_id;
  //$aray['price']=$pd["price"]; 
  //  $aray['qty']=$pd["qty"];
  //  $aray['title']=$pd["title"];
   //$aray['status_id']=$pd["status_id"];

   $productimg=Database::search("SELECT * FROM `images`  WHERE `product_id`='".$product_id."'");

   if($productimg->num_rows==1){
       $img=$productimg->fetch_assoc();
       $aray['img']=$img["code"];
   }
  
}
 
echo json_encode($aray);

}else if($age !=0){
  if($age==1){
  $page=Database::search("SELECT * FROM `product` WHERE `admin_email`='".$user["email"]."' ORDER BY `datetime_added` DESC");

$an=$age->num_rows;
for($i=0;$i<$an;$i++){
  $aray[$i]=$page->fetch_assoc();

}
echo json_encode($aray);

  }else if($age==2){
    $page=Database::search("SELECT * FROM `product` WHERE `admin_email`='".$user["email"]."' ORDER BY `datetime_added` ASC");

    $an=$age->num_rows;
    for($i=0;$i<$an;$i++){
      $aray[$i]=$page->fetch_assoc();
    

  }
  echo json_encode($aray);
}

}else if($qty !=0){
  if($qty==1){
  $pqty=Database::search("SELECT * FROM `product` WHERE `admin_email`='".$user["email"]."' ORDER BY `qty` ASC");

$aq=$qty->num_rows;
for($i=0;$i<$aq;$i++){
  $aray[$i]=$pqty->fetch_assoc();

}
echo json_encode($aray);

  }else if($qty==2){
    $pqty=Database::search("SELECT * FROM `product` WHERE `admin_email`='".$user["email"]."' ORDER BY `qty` DESC");

    $aq=$qty->num_rows;
    for($i=0;$i<$aq;$i++){
      $aray[$i]=$pqty->fetch_assoc();
    

  }
  echo json_encode($aray);

}else if(!empty($search) && $age !=0){
      if($age==1){
        $prs=Database::search("SELECT * FROM `product` WHERE `admin_email`='".$user["email"]."' AND `title` LIKE '%".$search."%' ORDER BY `datetime_added` DESC;");
        $ans=$prs->num_rows;
        for($i=0;$i<$ans;$i++){
          $aray[$i]=$prs->fetch_assoc();
        
        }
        echo json_encode($aray);

      }
}
}
?>