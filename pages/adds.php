<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/main-style.css">
    <link rel="stylesheet" href="/styles/style.css">
    <title>Объявления</title>
</head>

<body>
    <header class="d-flex flex-row justify-content-between align-items-center w-75 px-2 mx-auto">
        <a href="/pages/main.php?thisDepId=<?=$_GET['thisDepId']?>" class="nav-a px-3 d-flex align-items-center"> <i
                class="fa-solid fa-caret-left pe-2 fs-1"></i> Назад</a>
                <?php
            if($_COOKIE['admin'] != ""){
                ?>    
    <div class="d-flex align-items-end">
    <button type="button" class="btn btn-success d-flex align-items-center" class="btn btn-primary btn-lg btn-block " class=""
                data-bs-toggle="modal" data-bs-target="#add">Добавить объявления</button>
                <div class="modal fade" id="add" tabindex="-1" aria-labelledby="authLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- Добавление объявлений -->
                            <h5 class="modal-title" id="authLabel">Добавить объявления</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body ">
                            <form action="/php/check_add.php" method="POST" class="d-flex flex-column align-items-start auth-form">
                                <label for="name">Название:</label>
                                <input type="name" name="name" class="w-100 mb-3">
                                <label for="">Описание</label>
                                <textarea name="description" id="" cols="" rows="" class="w-100 mb-3"></textarea>
                                <input class="form-control" type="file" name="img">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn auth-btn">Сохранить</button>
                        </div>
                    </div> </form>
                </div>
            </div>
   </div>
   <?php
            }else{?>
            <?php
            }
            ?>
        <h4 class="pe-3">ОБЪЯВЛЕНИЯ</h4>
    </header>

    <div class="d-flex flex-row w-75 mx-auto" style="align-items: center; justify-content: center;">

        <div class="d-flex flex-column container-content">

            <div class="d-flex flex-column align-items-center">
                <div>
                    <img src="/images/add_2.jpg" class="rounded mx-auto d-block" alt="">
                </div>
                <div>
                    <h2>8 марта - Международный женский день!</h2>
                </div>
                <div>
                    <h1 class="text-center">Дорогие женщины и девушки! От всего сердца поздравляем вас с праздником и
                        желаем вам море
                        цветов,
                        позитива, здоровья, счастья и добра! Тысячи поздравлений, теплых слов и ярких улыбок
                        Удивляйте, творите, очаровывайте, вдохновляйтесь и вдохновляйте, продолжайте освещать планету
                        своей женственностью, нежностью и обаянием. Будьте красивы, любимы, неповторимы, успешны,
                        здоровы и счастливы. Украшайте собой этот мир! </h1>
                </div>

            </div>
            <div class="d-flex justify-content-between flex-row-reverse">
            <div>
                <p>06.04.2022</p>
            </div>
            <div>
            <button type="button" class="btn btn-danger">Удалить объявления</button>
            </div>
        </div>
            <div class="d-flex flex-column align-items-center">
                <div>
                    <img src="/images/add_3.jpg" class="rounded mx-25 d-block" alt="">
                </div>
                <div>
                    <h2>Свершилось то, чего все так долго ждали! </h2>
                </div>
                <div>
                    <h1 class="text-center">Сегодня на факультете «ИТиУ» впервые прошёл товарищеский матч по волейболу
                        между сборной
                        преподавателей и сборной студентов
                        Не обошлось и без группы поддержки: наши девочки собрали свою команду по чирлидингу и
                        подготовили зажигательный номер для поднятия боевого духа спортсменов
                        По итогу соревнований, все три раунда выиграла команда преподавателей. Весь факультет гордится
                        вами, вы - большие молодцы!
                        Большое спасибо всем, кто принимал участие: преподаватели, студенты, группа поддержки, зрители.
                        Такие мероприятия очень здорово сплачивают коллектив и продвигают спорт в массы </h1>
                </div>

            </div>
            <div class="d-flex justify-content-between flex-row-reverse">
            <div>
                <p>06.04.2022</p>
            </div>
            <div>
            <button type="button" class="btn btn-danger">Удалить объявления</button>
            </div>
        </div>
        </div>

    </div>
    
    <footer class="d-flex flex-row justify-content-around py-5">
        <div class="icon-container"></div>
        <h1>Первый Московский Образовательный Комплекс</h1>
        <div class="icon-container">
        <?php
            if($_COOKIE['superadmin'] != ""){?>
            <form action="/php/exit.php">
                <button type="submit" class="btn btn-secondary">Выход</button>
            </form>
            <?php
            }elseif($_COOKIE['admin'] != ""){
                ?>    
            <form action="/php/exit.php">
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
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/php/check-auth.php" method="$_POST" class="d-flex flex-column align-items-start auth-form">
                                <label for="email">E-mail:</label>
                                <input type="email" name="email" class="w-100" placeholder="Example@mail.ru">
                                <label for="password">Пароль:</label>
                                <input type="password" name="password" class="w-100" placeholder="********">
                           
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn auth-btn">Войти</button>
                        </div>
                    </div> 
                </div>
            </div></form>
            <!-- Поп - ап окно авторизации -->
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/cc824b8f17.js" crossorigin="anonymous"></script>
</body>

</html>