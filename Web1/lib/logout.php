<?php
session_start();

setcookie('login', '', time() - 3600, '/'); // ставим время в прошлом, чтобы удалить

// Если используем сессию, уничтожаем её
$_SESSION = [];
session_destroy();

// Перенаправляем на главную или страницу входа
header('Location: /Web1/reg.php');
exit;
?>