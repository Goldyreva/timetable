<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_table_name = "pmok_db";


$mysql = new mysqli($db_host, $db_user, $db_pass, $db_table_name );

if($mysql == false){
    echo "Ошибка подключения к БД";
    exit();
};