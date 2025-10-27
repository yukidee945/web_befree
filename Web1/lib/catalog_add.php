<?php
require_once "./db.php";

$products = [
	["title" => "Платье Летнее", "description" => "Лёгкое платье для жаркой погоды.", "price" => 2499, "sizes" => "S–L", "material" => "100% лен", "color" => "Голубой", "category" => "dress", "image" => "image/dress1.jpg", "details" => "Идеально для прогулок и летних вечеринок.", "amount" => 15],
	["title" => "Платье Вечернее", "description" => "Элегантное платье для особых случаев.", "price" => 4999, "sizes" => "XS–M", "material" => "Шёлк 100%", "color" => "Чёрный", "category" => "dress", "image" => "image/dress2.jpg", "details" => "Отлично подходит для вечерних мероприятий.", "amount" => 8],
	["title" => "Платье Повседневное", "description" => "Удобное платье для ежедневной носки.", "price" => 1999, "sizes" => "XS–XL", "material" => "Хлопок 95%, Эластан 5%", "color" => "Розовый", "category" => "dress", "image" => "image/dress3.jpg", "details" => "Подходит для работы, прогулок и встреч с друзьями. Лёгкое и приятное к телу.", "amount" => 12],
	//Футболки
	["title" => "Футболка Classic", "description" => "Базовая белая футболка унисекс.", "price" => 899, "sizes" => "XS–XL", "material" => "100% хлопок", "color" => "Белый", "category" => "tshirt", "image" => "image/tshirt1.jpg", "details" => "Подходит для повседневного стиля. Отлично комбинируется с джинсами, шортами или юбкой.", "amount" => 12],
	["title" => "Футболка Sport", "description" => "Спортивная футболка с технологией влагоотведения.", "price" => 1099, "sizes" => "XS–XL", "material" => "100% полиэстер", "color" => "Синий", "category" => "tshirt", "image" => "image/tshirt2.jpg", "details" => "Отлично подходит для тренировок и активного отдыха.", "amount" => 23],
	["title" => "Футболка Oversize", "description" => "Свободная футболка для стильного повседневного образа.", "price" => 1299, "sizes" => "M–XXL", "material" => "100% хлопок", "color" => "Серый", "category" => "tshirt", "image" => "image/tshirt3.jpg", "details" => "Комфортная и универсальная, легко сочетается с джинсами и шортами.", "amount" => 16],

	// Джинсы
	["title" => "Джинсы Skinny", "description" => "Узкие джинсы для повседневного стиля.", "price" => 2999, "sizes" => "28–34", "material" => "Хлопок 98%, Эластан 2%", "color" => "Тёмно-синий", "category" => "jeans", "image" => "image/jeans1.jpg", "details" => "Отлично сочетаются с футболками и рубашками, подчёркивают фигуру.", "amount" => 17],
	["title" => "Джинсы Mom", "description" => "Свободные джинсы с высокой талией.", "price" => 3199, "sizes" => "26–32", "material" => "Хлопок 100%", "color" => "Светло-голубой", "category" => "jeans", "image" => "image/jeans2.jpg", "details" => "Идеальны для повседневных образов и прогулок. Удобные и стильные.", "amount" => 18],
	["title" => "Джинсы Straight", "description" => "Прямые джинсы классического кроя.", "price" => 2899, "sizes" => "28–36", "material" => "Хлопок 98%, Эластан 2%", "color" => "Синий", "category" => "jeans", "image" => "image/jeans3.jpg", "details" => "Универсальные джинсы для работы, прогулок и повседневного гардероба.", "amount" => 64]
];

foreach ($products as $p) {
	$stmt = $conn->prepare("INSERT INTO products (category, title, price, description, sizes, material, color, details, image, quantity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param(
		"ssisssss si",
		$p['category'],
		$p['title'],
		$p['price'],
		$p['description'],
		$p['sizes'],
		$p['material'],
		$p['color'],
		$p['details'],
		$p['image'],
		$p['quantity']
	);
	$stmt->execute();
}
echo "✅ Товары успешно добавлены в базу!";
?>