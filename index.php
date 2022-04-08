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

    <main class="d-flex flex-column align-items-center w-75">
        <header class="d-flex flex-column align-items-center w-100">
            <img src="/images/logo.png" alt="logo">
            <h2 class="md-3">Выбор подразделения</h2>
            
        </header>
        <nav class="d-flex flex-column align-items-center w-100">
            <?php
                include 'php/database.php';
                $result = $mysql->query("SELECT * FROM `departament` ");
                $result = $result -> fetch_all();
                foreach($result as $dep){     
            ?>
            <a href="/pages/main.php?thisDepId=<?=$dep[0]?>" class="nav-a w-50"><?=$dep[1]?></a>
            <?php
                }
            ?>
            
        </nav>
    </main>

    <footer class="d-flex flex-row justify-content-around py-5">
        
        <div class="icon-container"></div>
        <h1>Первый Московский Образовательный Комплекс</h1>
        <div class="icon-container">
        <?php
            if($_COOKIE['superadmin'] != ""){?>
            <form action="php/exit.php">
                <button type="submit" class="btn btn-secondary">Выход</button>
            </form>
            <?php
            }elseif($_COOKIE['admin'] != ""){
                ?>    
            <form action="php/exit.php">
                <button type="submit" class="btn btn-secondary">Выход</button>
            </form>
            <?php
            }else{?>
            <a href="" type="button" class="" data-bs-toggle="modal" data-bs-target="#auth"><i class="fa-solid fa-user-tie"></i></a>
            <?php
            }
            ?>
            <!-- Поп - ап окно авторизации -->
            <div class="modal fade" id="auth" tabindex="-1" aria-labelledby="authLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="authLabel">Авторизация</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="php/check-auth.php" method="POST" class="d-flex flex-column align-items-start auth-form">
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" class="w-100" placeholder="Example@mail.ru">
                            <label for="password">Пароль:</label>
                            <input type="password" name="password" class="w-100" placeholder="********">
                        
                       
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn auth-btn">Войти</button>
                    </div>
                </div>
                </div> </form>
            </div>
            <!-- Поп - ап окно авторизации -->
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cc824b8f17.js" crossorigin="anonymous"></script>
</body>
</html>