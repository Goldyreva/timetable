<?php
    include "database.php";

    $firstname = trim($_POST['firstname']);
    $secondname = trim($_POST['secondname']);
    $patronymic = trim($_POST['patronymic']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $dep_id = $_POST['dep_id'];


    // print_r($dep_id);
    // exit();

    $mysql->query("INSERT INTO `users` (`firstname`, `secondname`, `patronymic`, `email`, `password`) VALUES('$firstname', '$secondname', '$patronymic', '$email', '$password') ");
    $user_id = $mysql->query("SELECT `id` FROM `users` WHERE `email` = '$email' ");
    $user_id = $user_id -> fetch_assoc();
    $user_id = $user_id['id'];
    // print_r($user_id);
    // exit();
    foreach ($dep_id as $dep_id){
    $mysql->query("INSERT INTO `user-departament` (`departament_id`, `user_id` ) VALUES('$dep_id', '$user_id' ) ");
    
    }
    
    $mysql->close();
    header('Location: /pages/admin_panel.php');