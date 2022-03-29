<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Shortcut icon" href="/images/logo.png" type="image/x-icon"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/main-style.css">
    <title>ПМОК</title>
</head>
<body>
    <?php
        include '../php/database.php';
        $thisDepId = $_GET['thisDepId'];
        $result2 = $mysql->query("SELECT * FROM `departament` WHERE `id` = '$thisDepId'");
        $result2 = $result2 -> fetch_all();
    ?>
    <main class="d-flex flex-column align-items-center w-75">
        <header class="d-flex flex-row justify-content-between align-items-center w-100 px-2">
            <a href="/pages/main.php?thisDepId=<?=$_GET['thisDepId']?>" class="nav-a px-3 d-flex align-items-center"> <i class="fa-solid fa-caret-left pe-2 fs-1"></i> Назад</a>
            <h4 class="pe-3"><?=$result2[0][1] ?></h4>
        </header>
        <nav class="d-flex flex-row align-items-center justify-content-start flex-wrap w-75">
        <?php
                
                $result = $mysql->query("SELECT * FROM `groups` WHERE `departament_id` = '$thisDepId'");
                $result = $result -> fetch_all();
                foreach($result as $group){     
            ?>
            <a href="/pages/timetableOfClasses.php?thisDepId=<?=$_GET['thisDepId']?>&thisGroupId=<?=$group[0]?>" class="nav-a px-4"><?=$group[1]?></a>
            <?php
                }
            ?>
        </nav>
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
                        <form action="" class="d-flex flex-column align-items-start auth-form">
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