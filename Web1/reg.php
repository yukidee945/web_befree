<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Befree</title>
    <link rel="stylesheet" href="./CSS/main.css">
</head>

<body>

    <div class="container">
        <?php require_once "./src/menu.php"; ?>

        <main class="content">
            <h1>Регистрация</h1>
            <BR>
            <form method="post" action="./lib/rega.php">
                <div class="inline">
                    <div>
                        <label>Фамилия</label>
                        <input type="text" name="surname">
                    </div>
                    <div>
                        <label>Имя</label>
                        <input type="text" name="name">
                    </div>
                    <div>
                        <label>Отчество</label>
                        <input type="text" name="lastname">
                    </div>
                </div>
                <div class="inline">
                    <div>
                        <label>Почта</label>
                        <input type="email" name="email">
                    </div>
                    <div>
                        <label>Телефон</label>
                        <input type="text" name="phone" placeholder="+79...">
                    </div>
                </div>
                <div class="form-bottom">
                    <label>Логин</label>
                    <input type="text" name="login" class="one-line">

                    <label>Пароль</label>
                    <input type="password" name="password" class="one-line">

                    <div class="faq"><input type="checkbox" name="subscribe"> Я согласен(а) с <a
                            href="https://befree.ru/privacy-policy" class="login-link">Политикой
                            конфеденциальности</a>,<a href="https://befree.ru/user-agreement"
                            class="login-link">пользовательским соглашением</a> и <a href="#" class="login-link"></a><a
                            href="https://befree.ru/terms-of-service" class="login-link">условиями обслуживания
                        </a>
                    </div><BR>
                    <a href="./auth.php" class="login-link">Уже есть аккаунт? Войдите здесь!</a>
                    <BR>
                    <button type="submit">Зарегистрироваться</button>
                </div>

            </form>

        </main>


    </div>

    <?php require_once "./src/footer.php"; ?>

</body>

</html>