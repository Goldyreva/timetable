<?php
    include "database.php";

    $dep_id = $_POST['departament_id'];
    $mysql->query("DELETE FROM `user-departament` WHERE `departament_id` = '$dep_id'");
