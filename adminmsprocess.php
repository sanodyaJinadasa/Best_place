<?php

require "connection.php";

if (isset($_POST["e"])) {

    $emal = $_POST["e"];
  

    $userrs = Database::search("SELECT * FROM `chat` WHERE `email`='" . $emal . "'");
    $num = $userrs->num_rows;

    if ($num == 1) {
        $row = $userrs->fetch_assoc();
        $us = $row["msgpro"];

        if ($us == 1) {

            Database::iud("UPDATE `chat` SET `msgpro`='2' WHERE `email` = '" . $emal . "'");
            echo "success1";
        } else {

            Database::iud("UPDATE `chat` SET `msgpro`='1' WHERE `email` = '" . $emal . "'");
              echo "success2";
        }
    }
}
//echo $_POST["e"];