<?php
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
$user_name = trim(filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS));
$user_surname = trim(filter_var($_POST['surname'], FILTER_SANITIZE_SPECIAL_CHARS));
$user_lastname = trim(filter_var($_POST['lastname'], FILTER_SANITIZE_SPECIAL_CHARS));
$phone = trim(filter_var($_POST['phone'], FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

$requiredFields = [
    'Логин' => $login,
    'Имя' => $user_name,
    'Фамилия' => $user_surname,
    'Отчество' => $user_lastname,
    'Телефон' => $phone,
    'Почта' => $email,
    'Пароль' => $password
];

foreach ($requiredFields as $fieldName => $value) {
    if (empty($value)) {
        exit("Поле '$fieldName' обязательно для заполнения");
    }
}

// --- Новая проверка галочки согласия ---
if (!isset($_POST['subscribe'])) {
    exit("Вы должны согласиться с Политикой конфиденциальности");
}

// Проверки
if (strlen($login) < 4) {
    exit("Логин должен состоять минимум из 4 символов");
}

if (strlen($user_name) < 2) {
    exit("Имя должно состоять минимум из 2 символов");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("Некорректный формат почты");
}

if (strlen($password) < 4) {
    exit("Пароль должен состоять минимум из 4 символов");
}

// Хэш пароля
$password = password_hash($password, PASSWORD_DEFAULT);

// Подключение к БД
require "db.php";

// Проверка на существующего пользователя
$check = $pdo->prepare("SELECT id FROM web_users WHERE login = ? OR email = ?");
$check->execute([$login, $email]);
if ($check->rowCount() > 0) {
    exit("Пользователь с таким логином или почтой уже существует");
}

// Запись в БД
$sql = 'INSERT INTO web_users (login, user_name, user_surname, user_lastname, phone, email, password)
        VALUES (?, ?, ?, ?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$login, $user_name, $user_surname, $user_lastname, $phone, $email, $password]);

header('Location: ../user.php');
exit;
?>