<?php
// Проверяем, есть ли кука login
if (!isset($_COOKIE['login'])) {
    // Если нет куки — перенаправляем на страницу входа
    header('Location: /Web1/reg.php');
    exit;
}

// Получаем ник пользователя из куки
$user_login = $_COOKIE['login'];
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/main.css">
    <title>Личный кабинет</title>
</head>

<body>
    <div class="container">
        <?php if (isset($_COOKIE['login']))
            require_once "./src/menu_login.php";
        else
            require_once "./src/menu.php"; ?>
        <?php require_once "./src/mod.php"; ?>

        <main class="content">

            <h1>Вы авторизованы!</h1>
            <p>Привет, <strong><?php echo htmlspecialchars($user_login); ?></strong>!</p>
            <a href="/Web1/lib/logout.php">Выйти</a>
        </main>
    </div>
</body>

</html>