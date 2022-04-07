<?php
    include "database.php";

    $files = $_FILES['excel'];
    $group_id = $_POST['group_id'];
    $today = date("Y-m-d ");       

    if(!empty($_FILES['excel']['name'])){
        if(move_uploaded_file($_FILES['excel']['tmp_name'],
        '../table-temp/'.$_FILES['excel']['name'])){

        }else{
            echo 'Ошибка загрузки файла';
            exit();
        }
        $excelFile = '/table-temp/'.$_FILES['excel']['name'];
        
        $result = $mysql->query("SELECT * FROM `timetables` WHERE `group_id` = '$group_id'");
        $result = $result -> fetch_all();
        print_r($result);
        if(empty($result)){
            $mysql->query("INSERT INTO `timetables` (`link`, `group_id`, `date`) VALUES ('$excelFile', '$group_id', '$today');");
        }else{
            $mysql->query("UPDATE `timetables` SET `link` = '$excelFile', `date` = '$today' WHERE `group_id` = '$group_id'");
        }
        $mysql->close();
    }
    header('Location: /pages/admin_panel.php');