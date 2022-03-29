<?php
    include "database.php";
    $dep_id = $_POST['dep_id'];

    $user_id = $mysql->query("SELECT `id` FROM `users` WHERE `email` = '$email' ");
    $user_id = $user_id -> fetch_assoc();
    $user_id = $user_id['id'];
    print_r($user_id);
    exit();
    
    foreach ($dep_id as $dep_id){
    $mysql->query("INSERT INTO `user-departament` (`dep_id`, `user_id` ) VALUES('$dep_id', '$user_id' ) ");
    
    }
    // echo is_array($dep_id);
    // echo
    $mysql->close();
    header('Location: /pages/admin_panel.php');
