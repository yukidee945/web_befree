<?php
// Массив товаров
/*
$products = [
    // Платья
    
    [
        "title" => "Платье Летнее",
        "description" => "Лёгкое платье для жаркой погоды.",
        "price" => 2499,
        "sizes" => "S–L",
        "material" => "100% лен",
        "color" => "Голубой",
        "category" => "dress",
        "image" => "image/dress1.jpg",
        "details" => "Идеально для прогулок и летних вечеринок. Комфортное и стильное."
    ],
    [
        "title" => "Платье Вечернее",
        "description" => "Элегантное платье для особых случаев.",
        "price" => 4999,
        "sizes" => "XS–M",
        "material" => "Шёлк 100%",
        "color" => "Чёрный",
        "category" => "dress",
        "image" => "image/dress2.jpg",
        "details" => "Отлично подходит для вечерних мероприятий и торжеств. Подчёркивает фигуру."
    ],
    [
        "title" => "Платье Повседневное",
        "description" => "Удобное платье для ежедневной носки.",
        "price" => 1999,
        "sizes" => "XS–XL",
        "material" => "Хлопок 95%, Эластан 5%",
        "color" => "Розовый",
        "category" => "dress",
        "image" => "image/dress3.jpg",
        "details" => "Подходит для работы, прогулок и встреч с друзьями. Лёгкое и приятное к телу."
    ],

    // Футболки
    [
        "title" => "Футболка Classic",
        "description" => "Базовая белая футболка унисекс.",
        "price" => 899,
        "sizes" => "XS–XL",
        "material" => "100% хлопок",
        "color" => "Белый",
        "category" => "tshirt",
        "image" => "image/tshirt1.jpg",
        "details" => "Подходит для повседневного стиля. Отлично комбинируется с джинсами, шортами или юбкой."
    ],
    [
        "title" => "Футболка Sport",
        "description" => "Спортивная футболка с технологией влагоотведения.",
        "price" => 1099,
        "sizes" => "XS–XL",
        "material" => "100% полиэстер",
        "color" => "Синий",
        "category" => "tshirt",
        "image" => "image/tshirt2.jpg",
        "details" => "Отлично подходит для тренировок и активного отдыха."
    ],
    [
        "title" => "Футболка Oversize",
        "description" => "Свободная футболка для стильного повседневного образа.",
        "price" => 1299,
        "sizes" => "M–XXL",
        "material" => "100% хлопок",
        "color" => "Серый",
        "category" => "tshirt",
        "image" => "image/tshirt3.jpg",
        "details" => "Комфортная и универсальная, легко сочетается с джинсами и шортами."
    ],

    // Джинсы
    [
        "title" => "Джинсы Skinny",
        "description" => "Узкие джинсы для повседневного стиля.",
        "price" => 2999,
        "sizes" => "28–34",
        "material" => "Хлопок 98%, Эластан 2%",
        "color" => "Тёмно-синий",
        "category" => "jeans",
        "image" => "image/jeans1.jpg",
        "details" => "Отлично сочетаются с футболками и рубашками, подчёркивают фигуру."
    ],
    [
        "title" => "Джинсы Mom",
        "description" => "Свободные джинсы с высокой талией.",
        "price" => 3199,
        "sizes" => "26–32",
        "material" => "Хлопок 100%",
        "color" => "Светло-голубой",
        "category" => "jeans",
        "image" => "image/jeans2.jpg",
        "details" => "Идеальны для повседневных образов и прогулок. Удобные и стильные."
    ],
    [
        "title" => "Джинсы Straight",
        "description" => "Прямые джинсы классического кроя.",
        "price" => 2899,
        "sizes" => "28–36",
        "material" => "Хлопок 98%, Эластан 2%",
        "color" => "Синий",
        "category" => "jeans",
        "image" => "image/jeans3.jpg",
        "details" => "Универсальные джинсы для работы, прогулок и повседневного гардероба."
    ],
];
*/
// Получаем поисковый запрос
$query = strtolower(trim($_GET['query'] ?? ''));

// Фильтруем товары
$results = [];
if ($query !== '') {
    foreach ($products as $product) {
        if (
            strpos(strtolower($product['title']), $query) !== false ||
            strpos(strtolower($product['category']), $query) !== false
        ) {
            $results[] = $product;
        }
    }
} else {
    $results = $products;
}
?>

<!-- HTML форма поиска -->
<div class="search-bar">
    <form action="" method="GET">
        <input type="text" id="search-input" name="query" placeholder="Поиск по товарам..."
            style="width:400px; padding:8px;">
        <button type="submit" id="search-button">Найти</button>
    </form>
</div>

<!-- Вывод каталога -->
<div class="catalog-grid">
    <div class="catalog-header">
        <div>Название товара</div>
        <div>Описание товара</div>
        <div>Характеристики товара</div>
        <div>Подробное описание</div>
    </div>

    <?php foreach ($results as $item): ?>
        <div class="catalog-item">
            <div><b><?= htmlspecialchars($item['title']) ?></b></div>
            <div>
                <a href="<?= $item['image'] ?>" target="_blank">
                    <img src="<?= $item['image'] ?>" alt="<?= htmlspecialchars($item['title']) ?>" width="150">
                </a><br>
                <?= htmlspecialchars($item['description']) ?>
            </div>
            <div>
                Цена: <?= $item['price'] ?> ₽<br>
                Размеры: <?= htmlspecialchars($item['sizes']) ?><br>
                Материал: <?= htmlspecialchars($item['material']) ?><br>
                Цвет: <?= htmlspecialchars($item['color']) ?>
            </div>
            <div>
                <?= htmlspecialchars($item['details']) ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>