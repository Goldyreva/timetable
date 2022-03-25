<?php
    include "database.php";

    $name = trim($_POST['name']);
    $type = trim($_POST['type']);

    $mysql->query("INSERT INTO `departament` (`name`, `type`) VALUES('$name', '$type') ");
    $mysql->close();
    header('Location: /pages/admin_panel.php');

