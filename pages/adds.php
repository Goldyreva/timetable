<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/main-style.css">
    <link rel="stylesheet" href="/styles/style.css">
    <title>Объявления</title>
</head>
<body>
    <header class="d-flex flex-row justify-content-between align-items-center w-75 px-2 mx-auto">
        <a href="/pages/main.php?thisDepId=<?=$_GET['thisDepId']?>" class="nav-a px-3 d-flex align-items-center"> <i class="fa-solid fa-caret-left pe-2 fs-1"></i> Назад</a>
        <h4 class="pe-3">ОБЪЯВЛЕНИЯ</h4>
    </header>

    <div class="d-flex flex-row w-75 mx-auto" style="align-items: center; justify-content: center;">
        
        <div class="d-flex flex-column container-content">
           <a href="#"><h2>Уважаемые родители! Внимание!</h2></a>
           <h1>С 16.02.2022 отдел по вопросам комплектования будет работать по адресу: Ул. Тихомирова д. 10 к. 1 (головное здание Комплекса) 1 этаж 104 кабинет. Часы и дни приема остаются прежними: Понедельник ,среда с 16.00 до 20.00 Пятница с 8.00 до 12.00. Телефон специалиста по комплектованию: 8929-625-50-60 Смирнова Оксана Валерьевна.</h1>
           <p>16.02.2022</p>

           <a href="#"><h2>Изменение родительской платы за присмотр и уход в детском<br>саду в 2022 году</h2></a>
           <h1>Уважаемые родители! Обращаем ваше внимание на то, что в<br>настоящее время стоимость услуги «присмотр и уход за детьми», от<br>размера которой зависит родительская плата, рассчитывается для<br>каждой организации в индивидуальном порядке. Размер родительской<br>платы устанавливается с 1 января ежегодно, исходя из фактического<br>размера затрат на обеспечение содержания ребенка за<br>предшествующий год.e</h1>
           <p>19.01.2022</p>

           <a href="#"><h2>В настоящее время ГБПОУ «1-й МОК» не входит в список<br>образовательных учреждений осуществляющих мероприятия<br>по экспресс-диагностике.</h2></a>
           <h1>Мероприятия по раннему выявлению (диагностике) COVID-19 с<br>использованием экспресс-теста на антиген SARS-CoV-2 в<br>образовательных организациях, подведомственных Департаменту<br>образования и науки города Москвы осуществляются на основании<br>Приказа Департамента здравоохранения города Москвы и ДОНМ от<br>13.10.2021 № 997/567 (далее – Приказ). В соответствии с п.п. 3.3.<br>Приказа родителям предоставляется возможность выбора способа<br>тестирования (3 варианта).</h1>
           <p>18.10.2021</p>

           <a href="#"><h2>Вниманию родителей и обучающихся! Изменился способ<br>входа в электронный журнал и библиотеку МЭШ</h2></a>
           <h1>Уважаемые родители и обучающиеся! С 16 августа изменился способ<br>входа в электронный журнал и библиотеку МЭШ.</h1>
           <p>19.08.2021</p>

           <a href="#"><h2>Итоги соревнований IX Открытого чемпионата<br>профессионального мастерства города Москвы «Московские<br>мастера» по стандартам WorldSkills Russia</h2></a>
           <h1>Торжественная церемония закрытия первой части регионального<br>чемпионата Москвы пройдёт в онлайн-формате. Победителей и<br>призёров самых масштабных соревнований по профессиональному<br>мастерству объявят в прямом эфире Московского образовательного<br>телеканала mosobr.tv.</h1>
           <p>10.03.2021</p>

           <a href="#"><h2>Школа: День открытых дверей</h2></a>
           <h1>16.02. и 17.02 дни открытых дверей в начальной школе в режиме<br>онлайн</h1>
           <p>16.02.2021</p>
        </div>
    </div>
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