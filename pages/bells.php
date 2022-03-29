<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/main-style.css">
    <link rel="stylesheet" href="/styles/style.css">
    <title>ПМОК</title>
</head>
<body>
    <main class="d-flex flex-column w-75">
        <header class="d-flex flex-row justify-content-between align-items-center w-100 px-2">
            <a href="/pages/main.php" class="nav-a px-3 d-flex align-items-center"> <i class="fa-solid fa-caret-left pe-2 fs-1"></i> Назад</a>
            <h4 class="pe-3">РАСПИСАНИЕ ЗВОНКОВ</h4>
        </header>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">№</th>
                      <th scope="col">Время занятий</th>
                      <th scope="col">Перемена</th>
                      
    
                    </tr>
                  </thead>
                <tbody>
                <tr class="">
                <th scope="row">Урок 1</th>
                <td>8-30/9-15</td>
                <td>15 минут</td>
                </tr>
                <tr class="">
                <th scope="row">Урок 2</th>
               
                <td>9-30/10-15</td>
                <td>20 минут</td>
                </tr>
                <tr class="">
                <th scope="row">Урок 3</th>
                <td>10-35/11-20</td>
                <td>15 минут</td>
                </tr>
                <tr class="">
                <th scope="row">Урок 4</th>
        
                <td>11-35/12-20</td>
                <td>20 минут</td>
                </tr>
                <tr class="">
                <th scope="row">Урок 5</th>
          
                <td>12-40/13-25</td>
                <td>15 минут</td>
                </tr>
                <tr class="">
                <th scope="row">Урок 6</th>
               
                <td>13-40/14-25</td>
                <td>10 минут</td>
                </tr>
                <tr class="">
                <th scope="row">Урок 7</th>
                <td>14-35/15-20</td>
                <td>10 минут</td>
                </tr>
                <tr class="">
                <th scope="row">Урок 8</th>
                <td>15-30/16-15</td>
                <td>10 минут</td>
                </tr>
                <tr class="">
                <th scope="row">Урок 9</th>
                <td>16-25/17-10</td>
                <td>10 минут</td>
                </tr>
                
                </tbody>
                </table>
        </div>
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


<!-- border: 4px dashed white; -->