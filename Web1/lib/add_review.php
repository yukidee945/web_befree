<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$host = 'localhost';
$db = 'php-web';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=3306";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // выбрасывать исключения при ошибках
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Проверяем, пришли ли данные из формы
if (isset($_POST['title']) && isset($_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Подготавливаем запрос и выполняем
    $stmt = $pdo->prepare("INSERT INTO reviews (title, content) VALUES (?, ?)");
    $stmt->execute([$title, $content]);

    echo "Отзыв успешно добавлен!";
} else {
    echo "Заполните все поля формы.";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (
        isset($_POST['item_id'], $_POST['username'], $_POST['stars'], $_POST['review'])
        && !empty($_POST['username'])
        && !empty($_POST['review'])
    ) {

        $item_id = intval($_POST['item_id']);
        $username = trim($_POST['username']);
        $stars = intval($_POST['stars']);
        $review = trim($_POST['review']);

        $sql = "INSERT INTO web_stars (item_id, username, stars, review) 
                VALUES (?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$item_id, $username, $stars, $review]);

        header("Location: /Web1/catalog.php");
        exit();

    } else {
        echo "Не переданы все данные!";
    }
}

?>