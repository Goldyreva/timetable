<?php
    include "database.php";

    $name = trim($_POST['name']);
    $dep_id = $_POST['dep_id'];


    $mysql->query("INSERT INTO `groups` (`name`) VALUES('$name') ");
    $user_id = $mysql->query("SELECT `id` FROM `groups` WHERE `name` = '$name' ");
    $user_id = $user_id -> fetch_assoc();
    $user_id = $user_id['id'];
    // print_r($user_id);
    // exit();
    foreach ($dep_id as $dep_id){
    $mysql->query("INSERT INTO `groups` (`name`, `departament_id`  ) VALUES('$name', '$dep_id'  ) ");
    
    }
    
    $mysql->close();
    header('Location: /pages/admin_panel.php');