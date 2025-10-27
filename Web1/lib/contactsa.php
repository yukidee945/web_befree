<?php

// Подключение к базе
require "db.php";
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем login из куки или формы
    $login = trim($_POST['login'] ?? ($_COOKIE['login'] ?? ''));

    // Чекбоксы
    $gender = $_POST['gender'] ?? null;
    $online = isset($_POST['online']) ? 1 : 0;
    $city = $_POST['city'] ?? null;
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $address = trim($_POST['scrolltext'] ?? '');
    $subscribe = isset($_POST['subscribe']) ? 1 : 0;

    // Проверка обязательных полей
    if ($login === '' || $gender === null || $city === '' || $subject === '' || $message === '' || $address === '') {
        die('Пожалуйста, заполните все обязательные поля!');
    }

    // Проверка допустимых значений для ENUM gender
    if (!in_array($gender, ['male', 'female'])) {
        die('Некорректное значение пола!');
    }
    // Сохраняем login в куку на 30 дней
    setcookie('login', $login, time() + 60 * 60 * 24 * 30, "/");

    // Вставка в базу
    $stmt = $pdo->prepare("
        INSERT INTO web_reviews 
        (login, gender, online, city, subject, message, address, subscribe)
        VALUES (:login, :gender, :online, :city, :subject, :message, :address, :subscribe)
    ");

    $stmt->execute([
        ':login' => $login,
        ':gender' => $gender,
        ':online' => $online,
        ':city' => $city,
        ':subject' => $subject,
        ':message' => $message,
        ':address' => $address,
        ':subscribe' => $subscribe
    ]);

    // Перенаправление на contacts.php
    header('Location: ../contacts.php');
    exit;
}
?>