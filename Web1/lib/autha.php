<?php
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

if (strlen($login) < 4) {
    exit("Логин должен состоять минимум из 4 символов");
}

if (strlen($password) < 4) {
    exit("Пароль должен состоять минимум из 4 символов");
}

require "db.php";

// 1. Проверяем, существует ли пользователь
$sql = "SELECT * FROM web_users WHERE login = ?";
$query = $pdo->prepare($sql);
$query->execute([$login]);
$user = $query->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    exit("Неверный логин или пароль!");
}

// 2. Проверяем пароль
if (!password_verify($password, $user['password'])) {
    exit("Неверный логин или пароль!");
}

// 3. Авторизация прошла успешно
session_start();
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_login'] = $user['login'];

// 4. (опционально) Можно создать cookie для удобства
setcookie('login', $login, time() + 3600 * 24 * 30, "/", "", false, true);

// 5. Перенаправляем на личную страницу
header('Location: /Web1/');
exit;
?>