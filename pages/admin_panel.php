<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Shortcut icon" href="/images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/main-style.css">
    <link rel="stylesheet" href="/styles/admin-style.css">

    <title>ПМОК</title>
</head>

<body>
    <header class="d-flex justify-content-between">

        <div>
            <h2 class="md-3">Личный кабинет</h2>
            <button type="button" class="btn btn-success" class="btn btn-primary btn-lg btn-block" class=""
                data-bs-toggle="modal" data-bs-target="#auth">Зарегистрировать пользователя</button>
            <!-- Добавила кнопку для добавления таблицы -->
            <button type="button" class="btn btn-success" class="btn btn-primary btn-lg btn-block" class=""
                data-bs-toggle="modal" data-bs-target="#addTable">Добавить расписание</button>
            <!-- Добавила кнопку для добавления таблицы -->
        </div>
        <div>
            <form action="/php/exit.php">
                <button type="submit" class="btn btn-secondary">Выход</button>
            </form>
        </div>
    </header>
    <div class="modal fade" id="auth" tabindex="-1" aria-labelledby="authLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="authLabel">Регистрация пользователя</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/php/check-reg.php" method="POST"
                        class="d-flex flex-column align-items-start auth-form">
                        <label for="name">Имя:</label>
                        <input type="name" name="firstname" class="w-100" placeholder="Елизавета">
                        <label for="surname">Фамилия:</label>
                        <input type="surname" name="secondname" class="w-100" placeholder="Голдырева">
                        <label for="patronymic">Отчество:</label>
                        <input type="patronymic" name="patronymic" class="w-100" placeholder="Алексеевна">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" class="w-100" placeholder="Example@mail.ru">
                        <label for="password">Пароль:</label>
                        <input type="password" name="password" class="w-100" placeholder="********">
                        <div class="btn-group d-flex flex-column w-100" data-toggle="buttons" name="departament_id">
                            <label for="checkbox">Выбрать подразделение:</label>
                            <?php 
                        include "../php/database.php";
                        $result = $mysql->query("SELECT * FROM `departament` ");
                        $result = $result -> fetch_all();
                        foreach ($result as $dep){
                            ?>
                            <label class="btn btn-primary m-2">
                                <input type="checkbox" name="dep_id[]" value="<?= $dep[0];?>"> <?= $dep[1];?></label>
                            <?php
                        }

                        ?>

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn auth-btn">Зарегистрировать</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- Модальное окно для добавления таблицы -->
    <div class="modal fade" id="addTable" tabindex="-1" aria-labelledby="addTableLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTableLabel">Добавить расписание</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/php/excel-add.php" method="POST"
                        class="d-flex flex-column align-items-start auth-form" enctype="multipart/form-data">
                        <div class="btn-group d-flex flex-column w-100" data-toggle="buttons" name="departament_id">
                            <label for="select_group">Выбрать класс/группу:</label>
                            <?php 
                        $result = $mysql->query("SELECT * FROM `groups` ");
                        $result = $result -> fetch_all();
                        
                            ?>

                            <select class="form-control" name="group_id" id="select_group">
                                <?php
                                    foreach ($result as $group){
                                ?>
                                <option value="<?= $group[0]?>"><?= $group[1]?></option>
                                <?php
                        }

                        ?>
                            </select><br>


                            <input type="file" name="excel">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn auth-btn">Добавить</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Модальное окно для добавления таблицы -->
    </form>
    <div id="categorii" class="categorii my-5">
        <h2>Пользователи</h2>
        <!-- изменили стиль кнопки -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#categoryModal">
            Добавить подразделение
        </button>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#categoryModal1">
            Добавить классы/группы
        </button>

        <div class="modal fade" tabindex="-1" id="categoryModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Добавить подразделение</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/php/check-departament.php" method="post" class="d-flex flex-column  auth-form">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="w-100" name="name" placeholder="Школа №1"
                                        aria-label="Добавить подразделение" />
                                </div>

                            </div>
                            <br>
                            <select class="form-control" name="type">
                                <option value="CПО">СПО</option>
                                <option value="Школа">Школа</option>
                                <option value="ДС">Дет. сад</option>
                            </select>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn auth-btn">
                            Сохранить
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div class="modal fade" tabindex="-1" id="categoryModal1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Добавить классы/группы</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/php/check-groups.php" method="post" class="d-flex flex-column  auth-form">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="w-100" name="name" placeholder="1-А"
                                        aria-label="Добавить классы/группы" />
                                </div>

                            </div>
                            <br>
                            <?php 
                        include "../php/database.php";
                        $result = $mysql->query("SELECT * FROM `departament` ");
                        $result = $result -> fetch_all();
                        foreach ($result as $dep){
                            ?>
                            <label class="btn btn-primary m-2">
                                <input type="checkbox" name="dep_id[]" value="<?= $dep[0];?>"> <?= $dep[1];?></label>
                            <?php
                            }
                            ?>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn auth-btn">
                            Сохранить
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <table class="table">
            <!-- вставили таблицу -->

            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Отчество</th>
                    <th scope="col">Подразделение</th>

                </tr>
            </thead>
            <tbody>
                <?php
             $result_user = $mysql->query("SELECT * FROM `users` WHERE NOT `role_id` = 1 ");
             $result_user = $result_user -> fetch_all();
             foreach ($result_user as $user){
            ?>
                <tr>
                    <th scope="row"> <?= $user[0];?></th>
                    <td><?= $user[1];?></td>
                    <td><?= $user[2];?></td>
                    <td><?= $user[3];?></td>
                    <?php
                    // $dep_user = $mysql ->query("SELECT `departament_id` FROM `user-departament` LEFT JOIN `users` ON (users.id = `user-departament`.user_id) WHERE users.id = '$user[0]' ");
                    $dep_user = $mysql ->query("SELECT * FROM `departament` LEFT JOIN `user-departament` ON (`departament`.`id` = `user-departament`.`departament_id`) WHERE `user-departament`.`user_id` = '$user[0]' ");
                    $dep_user = $dep_user -> fetch_all();
                    
                    
                    ?>
                    <td><?php
                    // $del = $mysql ->query( "SELECT * FROM `user-departament`");
                    // $del = $del -> fetch_all();
                    // print_r($del);
                    foreach($dep_user as $dep_name){
                        echo $dep_name[1];

                    ?>
                    <input type="button" class="btn btn-danger m-2" data-bs-toggle="modal"
                            data-bs-target="#delModaladd<?= $user[0]?><?= $dep_name[0]?>" " value="-">
                       
                        <div class="modal fade" tabindex="-1" id="delModaladd<?= $user[0]?><?= $dep_name[0]?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <h5 class="modal-title">Редактирование подразделений</h5> -->
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <form action="/php/delete.php" method="POST"
                                                class="d-flex flex-column align-items-start auth-form">

                                                <div class="btn-group d-flex flex-column w-100" data-toggle="buttons">
                                                    <label for="checkbox" class=" pb-3">Вы уверены, что хотите ограничить пользователю <?= $user[1]?> <?= $user[2]?> доступ к подразделению <?= $dep_name[1]?>?</label>
                                                  
                                                    <input type="hidden" value="<?= $user[0]?>" name="user_id">
                                                    <input type="hidden" value="<?= $dep_name[0]?>" name="departament_id">
                                            <div class="modal-footer">
                                                        <button type="submit" class="btn auth-btn">Удалить</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                            </div>

                        </div>

                    </div>
                </div>
                        <?php
                        
                    }
                    ?>
                    </td>
                    <td class=" ">

                        <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                            data-bs-target="#katModaladd<?= $user[0]?>">
                            Добавление подразделения
                        </button>
                    </td>
                </tr>


                <div class="modal fade" tabindex="-1" id="katModaladd<?= $user[0]?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Редактирование подразделений</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <form action="/php/editing.php" method="POST"
                                                class="d-flex flex-column align-items-start auth-form">

                                                <div class="btn-group d-flex flex-column w-100" data-toggle="buttons">
                                                    <label for="checkbox">Выбрать подразделение:</label>
                                                    <input type="hidden" name="user_id" value="<?= $user[0]?>">

                                                    <?php 
                                                $userDepId = $mysql ->query("SELECT `departament`.`id` FROM `departament` LEFT JOIN `user-departament` ON (`departament`.`id` = `user-departament`.`departament_id`) WHERE `user-departament`.`user_id` = '$user[0]' ");
                                                $allDepId = $mysql->query("SELECT `departament`.`id` FROM `departament` ");
                                                $userDepId = $userDepId -> fetch_all();
                                                $allDepId = $allDepId -> fetch_all();

                                                $notUserDep = array();

                                                foreach($allDepId as $item){   
                                                    if(!in_array($item,$userDepId)){   
                                                    $notUserDep[] = $item;
                                                    }
                                                }
                                                foreach ($notUserDep as $dep){
                                                    $result = $mysql->query("SELECT * FROM `departament` WHERE `id` = $dep[0]");
                                                    $result = $result-> fetch_assoc();
                                                    ?>

                                                    <label class="btn btn-primary m-2">
                                                        <input type="checkbox" name="dep_id[]"
                                                            value="<?= $result['id'];?>">
                                                        <?= $result['name'];?></label>
                                                    
                                                    <?php
                                                }

                                            ?>
                                            
                                            <div class="modal-footer">
                                                        <button type="submit" class="btn auth-btn">Сохранить</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                            </div>

                        </div>

                    </div>
                </div>
                <?php
             }
            ?>
            </tbody>
        </table>
    </div>
    <!-- <div class="modal fade" tabindex="-1" id="katModaladd">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Редактирование подразделений</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col">
                                <form action="../php/editing.php" method="POST"
                                    class="d-flex flex-column align-items-start auth-form">

                                    <div class="btn-group d-flex flex-column w-100" data-toggle="buttons">
                                        <label for="checkbox">Выбрать подразделение:</label>

                                        <?php 
                                            include "../php/database.php";
                                            $result = $mysql->query("SELECT * FROM `departament` ");
                                            $result = $result -> fetch_all();
                                            foreach ($result as $dep){
                                                ?>

                                        <label class="btn btn-primary m-2">
                                            <input type="checkbox" name="dep_id[]" value="<?= $dep[0];?>">
                                            <?= $dep[1];?></label>
                                        <?php
                                            }

                                            ?><div class="modal-footer">
                                            <button type="submit" class="btn auth-btn">Сохранить</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                </div>

            </div>

        </div>
    </div> -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/cc824b8f17.js" crossorigin="anonymous"></script>

</html>