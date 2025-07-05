<?php

require "connection.php";

if (isset($_POST["id"])) {

    $id = $_POST["id"];
  

    $productr = Database::search("SELECT * FROM `product` WHERE `id`='" .$id. "'");
    $num = $productr->num_rows;

    if ($num == 1) {
        $row = $productr->fetch_assoc();
        $us = $row["status_id"];

        if ($us == 1) {

            Database::iud("UPDATE `product` SET `status_id`='2' WHERE `id` = '" . $id. "'");
            echo "1";
        } else {

            Database::iud("UPDATE `product` SET `status_id`='1' WHERE `id` = '" . $id . "'");
              echo "2";
        }
    }
}

