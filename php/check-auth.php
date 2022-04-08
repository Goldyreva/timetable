<?php
    include "database.php";
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password' ");
    $_COOKIE =  $result->fetch_assoc();

    if(count($_COOKIE) == 0){
        echo "Пользователь не найден";
        exit();
    } else if ($_COOKIE ["role_id"]=="1"){
        setcookie('superadmin', $_COOKIE['email'], time() + 3600, "/");
        header('Location: /pages/admin_panel.php');
    } else if ($_COOKIE ["role_id"]=="2"){
        setcookie('admin', $_COOKIE['email'], time() + 3600, "/");
        header('Location: /index.php');
    }
    
    
    $mysql->close();

    