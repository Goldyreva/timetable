<?php
    include "database.php";

    $dep_id = $_POST['departament_id'];
    $user_id = $_POST['user_id'];
    $mysql->query("DELETE FROM `user-departament` WHERE `departament_id` = '$dep_id' AND `user_id` = '$user_id' ");
    header('Location: /pages/admin_panel.php');