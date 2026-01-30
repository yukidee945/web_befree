<?php
session_start();
require "lib/db.php";

// Проверка, залогинен ли пользователь
if (!isset($_COOKIE['login'])) {
    // Если не залогинен — редирект на страницу входа
    header("Location: reg.php");
    exit;
}

// Инициализация корзины
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
// Установка количества вручную
if (isset($_POST['update_qty'])) {
    $id = $_POST['product_id'];
    $qty = intval($_POST['qty']);

    if ($qty <= 0) {
        unset($_SESSION['cart'][$id]);
    } else {
        $_SESSION['cart'][$id] = $qty;
    }

    header("Location: cart.php");
    exit;
}

/* =====================
   ДОБАВИТЬ ТОВАР ?add=id
===================== */
if (isset($_GET['add'])) {
    $id = intval($_GET['add']);

    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = 1; // если товара нет — добавляем 1 шт
    } else {
        $_SESSION['cart'][$id]++;   // если есть — увеличиваем количество
    }

    header("Location: cart.php");
    exit;
}

/* =====================
   УМЕНЬШИТЬ КОЛ-ВО ?minus=id
===================== */
if (isset($_GET['minus'])) {
    $id = intval($_GET['minus']);

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]--;

        if ($_SESSION['cart'][$id] <= 0) {
            unset($_SESSION['cart'][$id]);
        }
    }

    header("Location: cart.php");
    exit;
}

/* =====================
   УДАЛИТЬ ТОВАР ?remove=id
===================== */
if (isset($_GET['remove'])) {
    unset($_SESSION['cart'][$_GET['remove']]);
    header("Location: cart.php");
    exit;
}

/* =====================
   ОЧИСТИТЬ КОРЗИНУ ?clear=1
===================== */
if (isset($_GET['clear'])) {
    $_SESSION['cart'] = [];
    header("Location: cart.php");
    exit;
}

/* =====================
   ОФОРМИТЬ ЗАКАЗ (POST)
===================== */
if (isset($_POST['checkout'])) {

    foreach ($_SESSION['cart'] as $id => $qty) {

        // Получаем текущий остаток
        $stmt = $pdo->prepare("SELECT amount FROM web_catalog WHERE id=?");
        $stmt->execute([$id]);
        $stock = $stmt->fetchColumn();

        if ($stock < $qty) {
            die("Ошибка: товара ID=$id недостаточно на складе.");
        }

        // Вычитаем товар
        $update = $pdo->prepare("UPDATE web_catalog SET amount = amount - ? WHERE id=?");
        $update->execute([$qty, $id]);
    }

    $_SESSION['cart'] = []; // очищаем корзину

    echo "<h1>Заказ успешно оформлен!</h1>";
    exit;
}

/* =====================
   ПОЛУЧЕНИЕ ДАННЫХ ТОВАРОВ
===================== */
$cartItems = [];
if (!empty($_SESSION['cart'])) {
    $ids = implode(",", array_keys($_SESSION['cart']));
    $stmt = $pdo->query("SELECT * FROM web_catalog WHERE id IN ($ids)");
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Корзина</title>
    <link rel="stylesheet" href="./CSS/main.css">

</head>


<body>
    <div class="container">
        <?php
        if (isset($_COOKIE['login']))
            require_once "./src/menu_login.php";
        else
            require_once "./src/menu.php"; ?>
        <?php require_once "./src/mod.php"; ?>
        <main class="content">
            <div class="cart-container">

                <h1>Ваша корзина</h1>

                <?php if (empty($cartItems)): ?>
                    <p>Корзина пуста.</p>
                    <a class="back-link" href="catalog.php">Вернуться в каталог</a>

                <?php else: ?>

                    <table class="cart-table">
                        <tr>
                            <th>Фото</th>
                            <th>Название</th>
                            <th>Цена за 1</th>
                            <th>Количество</th>
                            <th>Сумма</th>
                            <th></th>
                        </tr>

                        <?php
                        $total = 0;
                        foreach ($cartItems as $item):
                            $id = $item['id'];
                            $qty = $_SESSION['cart'][$id];
                            $sum = $item['price'] * $qty;
                            $total += $sum;
                            ?>
                            <tr>
                                <td><img src="<?= $item['image'] ?>" width="80"></td>
                                <td><?= htmlspecialchars($item['title']) ?></td>
                                <td><?= $item['price'] ?> ₽</td>

                                <td>
                                    <div class="qty-control">
                                        <form method="POST" class="qty-form">
                                            <input type="hidden" name="product_id" value="<?= $id ?>">

                                            <input type="number" name="qty" value="<?= $qty ?>" min="1" class="qty-input">

                                            <button name="update_qty" class="qty-btn">OK</button>
                                        </form>
                                    </div>
                                </td>

                                <td><b><?= $sum ?> ₽</b></td>

                                <td>
                                    <a href="cart.php?remove=<?= $id ?>" class="remove-btn">Удалить</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                    <div class="cart-summary">
                        <h3>Итого:</h3>
                        <p style="font-size:20px; font-weight:bold;">
                            <?= $total ?> ₽
                        </p>

                        <form method="POST">
                            <button class="checkout-btn" name="checkout">Купить</button>
                        </form>

                        <a class="clear-cart" href="cart.php?clear=1">Очистить корзину</a>
                    </div>

                <?php endif; ?>

            </div>
        </main>
    </div>
    <?php require_once "./src/footer.php"; ?>

</body>

</html>