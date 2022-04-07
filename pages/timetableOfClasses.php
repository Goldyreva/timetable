<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Shortcut icon" href="/images/logo.png" type="image/x-icon"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/main-style.css">
    <link rel="stylesheet" href="/styles/table-style.css">
    <title>ПМОК</title>
</head>
<body>
<?php
include "../php/database.php";
$groupId = $_GET['thisGroupId'];
$thisDepId = $_GET['thisDepId'];
$result = $mysql->query("SELECT * FROM `groups` WHERE `id` = '$groupId'");
$result = $result -> fetch_all();

$result2 = $mysql->query("SELECT * FROM `departament` WHERE `id` = '$thisDepId'");
$result2 = $result2 -> fetch_all();

$resultTable = $mysql->query("SELECT `link` FROM `timetables` WHERE `group_id` = '$groupId'");
$resultTable = $resultTable -> fetch_assoc();
$resultDepType = $mysql->query("SELECT `type` FROM `departament` WHERE `id` = '$thisDepId'");
$resultDepType = $resultDepType -> fetch_assoc();
if($resultDepType['type'] == 'СОШ'){
?>
<main class="d-flex flex-column align-items-center w-100">
<?php
}else{
?>
<main class="d-flex flex-column align-items-center">
<?php
}
?>
    
        <header class="d-flex flex-row justify-content-between align-items-center w-100 px-2">
            <a href="/pages/class.php?thisDepId=<?=$_GET['thisDepId']?>" class="nav-a px-3 d-flex align-items-center"> <i class="fa-solid fa-caret-left pe-2 fs-1"></i> Назад</a>
            <h4 class="pe-3"><?=$result2[0][1] ?> <br> <span><?=$result[0][1] ?></span> </h4>
        </header>
        <section class="timetable w-100">

        <?php





if(empty($resultTable)){
  echo '<p color="white"> Расписание не доступно </p>';
}else{
    require_once $path = $_SERVER['DOCUMENT_ROOT'] . '/PHPExcel.php';

    $excel = PHPExcel_IOFactory::load($_SERVER['DOCUMENT_ROOT'] . $resultTable['link']);

    Foreach($excel ->getWorksheetIterator() as $worksheet) {
        // $worksheet = $worksheet->getSheet(0);
        $lists[] = $worksheet->toArray();
    }

    function strpos_arr($haystack, $needle) {
        if(!is_array($needle)) $needle = array($needle);
        foreach($needle as $what) {
            if((strpos($haystack, $what))!==false) return true;
        }
        return false;
    }


    $days = ['', '', '1', '2', '3', '4', '5'];

    echo '<br>';
    if($resultDepType['type'] == 'СОШ'){
        foreach($lists as $list){
            // echo '<div class="table-responsive">';
            // echo '<table class="table table-dark m-0 table-striped timetable table-bordered">';
            ?>

            <?php
            // echo '<tbody>';
            // Перебор строк
            foreach($list as $row){
                // unset($row[0]);
            // echo '<tr>';
            
    
                $c = 0;
                for($i=0; $i<=count($row); $i++){
                    //   $row[$i] = trim($row[$i]);
                    if(empty($row[$i])){
                        $c += 1;
                    }
                    
                        if($c >= count($row)){
                            array_splice($row, 0, count($row));
                        }   
                }
    
                // $month = ['мар', 'фев' , 'апр', 'май', 'янв', 'сен', 'окт', 'ноя', 'дек', 'июн', 'июл', 'авг'];
                // $days = ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'пн', 'вт', 'ср', 'чт', 'пт'];
                // foreach($row as $r){
                //     if(strpos_arr($r, $month) == true){
                //         array_splice($row, 0, count($row));
                //     }
                // }
                // foreach($row as $r){
                //     if(strpos_arr($r, $days) == true){
                //         array_splice($row, 0, count($row));
                //     }
                // }
    
            // Перебор столбцов
            ?>
            <!-- <div class="container">
            <div class="row d-flex justify-content-md-center ">
                <div class="col-sm-4 col-md-4 col-xl-2 border border-secondary"> -->
                    <?php
                        //  echo '<table class="table table-dark m-0 table-striped timetable table-bordered">';
                        //  echo '<tbody>';
                        //  echo '<tr>';
                         foreach($row as $col){
                             if(empty($col)){
                                 unset($col);
                             }
            }
            // echo '</tr>';
            // echo '</tbody>';
            // echo '</table>';
                    ?>
                </div>
                <!-- <div class="col-sm-4 col-md-4 col-xl-2 border border-secondary">
                    <p>пн</p>
                </div>
                <div class="col-sm-4 col-md-4 col-xl-2 border border-secondary">
                    <p>вт</p>
                </div>
                <div class="col-sm-4 col-md-4 col-xl-2 border border-secondary">
                    <p>ср</p>
                </div>
                <div class="col-sm-4 col-md-4 col-xl-2 border border-secondary">
                    <p>чт</p>
                </div>
                <div class="col-sm-4 col-md-4 col-xl-2 border border-secondary">
                    <p>пт</p>
                </div> -->
            </div>
            <?php
            // foreach($row as $col){
            //     echo '<td>'.$col.'</td>';
            // }
            // echo '</tr>';
            }
            // echo '</tbody>';
            // echo '</table>';
            // echo '</div>';
        }
        print_r($list[6][0]);
?>
        <div class="container w-100">
            <div class="row d-flex">
                <div class="col-sm-12 col-md-12 col-xl-6">
                    <table class="table table-dark m-0 table-striped timetable table-bordered">
                        <thead>
                            <th><?=$list[4][0]?></th>
                            <th><?=$list[4][1]?></th>
                            <th></th>
                            <th><?=$list[4][2]?></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                <?=$list[6][0]?>
                                </td>
                                <td>
                                <?=$list[6][1]?>
                                </td>
                                <td>
                                <?=$list[6][2]?>
                                </td>
                                <td>
                                <?=$list[6][3]?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <?=$list[7][0]?>
                                </td>
                                <td>
                                <?=$list[7][1]?>
                                </td>
                                <td>
                                <?=$list[7][2]?>
                                </td>
                                <td>
                                <?=$list[7][3]?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <?=$list[8][0]?>
                                </td>
                                <td>
                                <?=$list[8][1]?>
                                </td>
                                <td>
                                <?=$list[8][2]?>
                                </td>
                                <td>
                                <?=$list[8][3]?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <?=$list[9][0]?>
                                </td>
                                <td>
                                <?=$list[9][1]?>
                                </td>
                                <td>
                                <?=$list[9][2]?>
                                </td>
                                <td>
                                <?=$list[9][3]?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <?=$list[10][0]?>
                                </td>
                                <td>
                                <?=$list[10][1]?>
                                </td>
                                <td>
                                <?=$list[10][2]?>
                                </td>
                                <td>
                                <?=$list[10][3]?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <?=$list[11][0]?>
                                </td>
                                <td>
                                <?=$list[11][1]?>
                                </td>
                                <td>
                                <?=$list[11][2]?>
                                </td>
                                <td>
                                <?=$list[11][3]?>
                                </td>
                            </tr>
                        </tbody>
                </table>
                </div>
                <div class="col-sm-12 col-md-12 col-xl-6">
                    <table class="table table-dark m-0 table-striped timetable table-bordered">
                        <thead>
                            <th><?=$list[4][4]?></th>
                            <th><?=$list[4][5]?></th>
                            <th></th>
                            <th><?=$list[4][6]?></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                <?=$list[6][4]?>
                                </td>
                                <td>
                                <?=$list[6][5]?>
                                </td>
                                <td>
                                <?=$list[6][6]?>
                                </td>
                                <td>
                                <?=$list[6][7]?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <?=$list[7][4]?>
                                </td>
                                <td>
                                <?=$list[7][5]?>
                                </td>
                                <td>
                                <?=$list[7][6]?>
                                </td>
                                <td>
                                <?=$list[7][7]?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <?=$list[8][4]?>
                                </td>
                                <td>
                                <?=$list[8][5]?>
                                </td>
                                <td>
                                <?=$list[8][6]?>
                                </td>
                                <td>
                                <?=$list[8][7]?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <?=$list[9][4]?>
                                </td>
                                <td>
                                <?=$list[9][5]?>
                                </td>
                                <td>
                                <?=$list[9][6]?>
                                </td>
                                <td>
                                <?=$list[9][7]?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <?=$list[10][4]?>
                                </td>
                                <td>
                                <?=$list[10][5]?>
                                </td>
                                <td>
                                <?=$list[10][6]?>
                                </td>
                                <td>
                                <?=$list[10][7]?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <?=$list[11][4]?>
                                </td>
                                <td>
                                <?=$list[11][5]?>
                                </td>
                                <td>
                                <?=$list[11][2]?>
                                </td>
                                <td>
                                <?=$list[11][3]?>
                                </td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
    }else if($resultDepType['type'] == 'СПО'){

        foreach($lists as $list){
         
            echo '<table class="table table-dark m-0 table-striped timetable table-bordered">';
            ?>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Пн</th>
                    <th>Вт</th>
                    <th>Ср</th>
                    <th>Чт</th>
                    <th>Пт</th>
                </tr>
            </thead>
            <?php
            echo '<tbody>';
            // Перебор строк
            foreach($list as $row){
                unset($row[0]);
            echo '<tr>';
            
    
                $c = 0;
                for($i=0; $i<=count($row); $i++){
                    //   $row[$i] = trim($row[$i]);
                    if(empty($row[$i])){
                        $c += 1;
                    }
                    
                        if($c >= count($row)){
                            array_splice($row, 0, count($row));
                        }   
                }
    
                $month = ['мар', 'фев' , 'апр', 'май', 'янв', 'сен', 'окт', 'ноя', 'дек', 'июн', 'июл', 'авг'];
                $days = ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'пн', 'вт', 'ср', 'чт', 'пт'];
                $trigerWords = ', Факультет';
                foreach($row as $r){
                    if(strpos_arr($r, $month) == true){
                        array_splice($row, 0, count($row));
                    }
                }
                foreach($row as $r){
                    if(strpos_arr($r, $days) == true){
                        array_splice($row, 0, count($row));
                    }
                }
    
            // Перебор столбцов
            foreach($row as $col){
                if(strpos_arr($col, $trigerWords) == true){
                    // $position = mb_strrpos($col, $trigerWords);
                    // echo $position;
                    // $subinput = mb_substr($col, 0, 14);
                    $col = strstr($col, $trigerWords, true);
                    // $col =  str_replace($subinput, '', $col);
                    
                }
                echo '<td>'.$col.'</td>';
            }
            echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';

        }

    
    }else{
        // echo 'Дет сад';
    } 


}
?>


        </section>
    </main>

    <footer class="d-flex flex-row justify-content-around py-5">
        <div class="icon-container"></div>
        <h1>Первый Московский Образовательный Комплекс</h1>
        <div class="icon-container">
            <a href="" type="button" class="" data-bs-toggle="modal" data-bs-target="#auth"><i class="fa-solid fa-user-tie"></i></a>
  
            <!-- Поп - ап окно авторизации -->
            <div class="modal fade" id="auth" tabindex="-1" aria-labelledby="authLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="authLabel">Авторизация</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/php/check-auth.php" class="d-flex flex-column align-items-start auth-form">
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" class="w-100" placeholder="Example@mail.ru">
                            <label for="password">Пароль:</label>
                            <input type="password" name="password" class="w-100" placeholder="********">
                        </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn auth-btn">Войти</button>
                    </div>
                </div>
                </div>
            </div>
            <!-- Поп - ап окно авторизации -->
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cc824b8f17.js" crossorigin="anonymous"></script>
</body>
</html>