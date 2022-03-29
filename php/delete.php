<?php
    include "database.php";

    $dep_id = $_POST['departament_id'];
    $mysql->query("DELETE FROM `user-departament` WHERE `user-departament`.`id` = '$dep_id'");

    header('Location: /pages/admin_panel.php');

