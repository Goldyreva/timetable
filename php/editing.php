<?php
    include "database.php";
    $dep_id = $_POST['dep_id'];
    $user_id = $_POST['user_id'];
    // echo $user_id;
    // print_r($dep_id);
    // exit();
    
    foreach ($dep_id as $dep_id){
        
        
    $mysql->query("INSERT INTO `user-departament` (`departament_id`, `user_id` ) VALUES('$dep_id', '$user_id' ) ");
    // echo $dep_id;
    }
    // echo is_array($dep_id);
    // echo
    $mysql->close();
    header('Location: /pages/admin_panel.php');
