<?php
    include "database.php";
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password' ");
    $user =  $result->fetch_assoc();

    if(count($user) == 0){
        echo "Пользователь не найден";
        exit();
    } else if ($user ["role_id"]=="1"){
        setcookie('superadmin', $user['email'], time() + 3600, "/");
        header('Location: /pages/admin_panel.php');
    } else if ($user ["role_id"]=="2"){
        setcookie('admin', $user['email'], time() + 3600, "/");
        header('Location: /index.php');
    }
    
    
    $mysql->close();

    