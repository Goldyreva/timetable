<?php
    include "database.php";

    $files = $_FILES['excel'];
    $group_id = $_POST['group_id'];
// echo $files;
//         exit();
    if(!empty($_FILES['excel']['name'])){
        if(move_uploaded_file($_FILES['excel']['tmp_name'],
        '../table-temp/'.$_FILES['excel']['name'])){

        }else{
            echo 'Ошибка загрузки файла';
            exit();
        }
        $excelFile = '/table-temp/'.$_FILES['excel']['name'];
        
        $mysql->query("INSERT INTO `timetables` (`link`, `group_id`) VALUES ('$excelFile', '$group_id');");
        $mysql->close();
    }
    header('Location: /pages/admin_panel.php');