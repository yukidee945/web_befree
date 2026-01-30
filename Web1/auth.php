<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Befree</title>
    <link rel="stylesheet" href="./CSS/main.css">
</head>

<body>

    <div class="container">
        <?php if (isset($_COOKIE['login']))
            require_once "./src/menu_login.php";
        else
            require_once "./src/menu.php"; ?>
        <?php require_once "./src/mod.php"; ?>

        <main class="content">
            <h1>Авторизация</h1>
            <BR>
            <form method="post" action="./lib/autha.php">
                <div class="form-bottom">
                    <label>Логин</label>
                    <input type="text" name="login" class="one-line">

                    <label>Пароль</label>
                    <input type="password" name="password" class="one-line">

                    <button type="submit">Войти</button>
                </div>

            </form>

        </main>


    </div>

    <?php require_once "./src/footer.php"; ?>

</body>

</html>