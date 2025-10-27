<?php
// db.php для MySQLi
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php-web";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Получаем поисковый запрос
$query = strtolower(trim($_GET['query'] ?? ''));

// Базовый SQL
$sql = "SELECT * FROM web_catalog";
$params = [];

if ($query !== '') {
	$sql .= " WHERE LOWER(title) LIKE ? OR LOWER(category) LIKE ?";
	$like = "%{$query}%";
}

// Подготовка запроса
$stmt = $conn->prepare($sql);

// Привязка параметров, если есть поиск
if ($query !== '') {
	$stmt->bind_param("ss", $like, $like);
}

// Выполнение запроса
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<title>Befree</title>
	<link rel="stylesheet" href="./CSS/main.css">
</head>

<body>
	<div class="container">
		<?php require_once "./src/menu.php"; ?>

		<main class="content">
			<h1>Каталог</h1>

			<!-- Форма поиска -->
			<form action="" method="GET" style="display:flex; align-items:flex-start;">
				<input type="text" id="search-input" name="query" placeholder="Поиск по товарам..."
					value="<?= htmlspecialchars($_GET['query'] ?? '') ?>">
				<button type="submit" id="search-button" style="margin-left:5px;">Найти</button>
			</form>

			<br>

			<div class="catalog-grid">
				<div class="catalog-header">
					<div>Название</div>
					<div>Описание</div>
					<div>Подробности</div>
				</div>

				<?php if ($result->num_rows > 0): ?>
					<?php while ($item = $result->fetch_assoc()): ?>
						<div class="catalog-item">
							<div><b><?= htmlspecialchars($item['title']) ?></b></div>
							<div>
								<a href="<?= htmlspecialchars($item['image']) ?>" target="_blank">
									<img src="<?= htmlspecialchars($item['image']) ?>" alt="" width="150">
								</a><br>
								<?= htmlspecialchars($item['description']) ?>
							</div>
							<div>
								<!-- Модальное окно через checkbox -->
								<input type="checkbox" id="modal-<?= $item['id'] ?>" class="modal-checkbox">
								<label for="modal-<?= $item['id'] ?>" class="modal-btn">Подробнее</label>

								<div class="modal">
									<div class="modal-content">
										<label for="modal-<?= $item['id'] ?>" class="modal-close">&times;</label>

										<div class="modal-body">
											<div class="modal-left">
												<a href="<?= htmlspecialchars($item['image']) ?>" target="_blank">
													<img src="<?= htmlspecialchars($item['image']) ?>"
														alt="<?= htmlspecialchars($item['title']) ?>">
												</a>
											</div>

											<div class="modal-right">
												<h3><?= htmlspecialchars($item['title']) ?></h3>
												<p><?= htmlspecialchars($item['description']) ?></p>

												<div class="modal-specs">
													<p><b>Цена:</b> <?= $item['price'] ?> ₽</p>
													<p><b>Размеры:</b> <?= htmlspecialchars($item['sizes']) ?></p>
													<p><b>Материал:</b> <?= htmlspecialchars($item['material']) ?></p>
													<p><b>Цвет:</b> <?= htmlspecialchars($item['color']) ?></p>
													<p><b>Количество:</b> <?= $item['amount'] ?></p>
												</div>

												<p class="modal-details"><?= nl2br(htmlspecialchars($item['details'])) ?></p>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					<?php endwhile; ?>
				<?php else: ?>
					<p>Товары не найдены.</p>
				<?php endif; ?>
			</div>

		</main>
	</div>

	<?php require_once "./src/footer.php"; ?>
</body>

</html>




<!--
			</form>
			<div class="catalog-grid">
				<div class="catalog-header">
					<div>Название товара</div>
					<div>Описание товара</div>
					<div>Характеристики товара</div>
					<div>Подробное описание</div>
				</div>

				<div class="catalog-item">
					<div><b>Платье Летнее</b></div>
					<div>
						<a href="image/dress1.jpg" target="_blank">
							<img src="image/dress1.jpg" alt="Платье Летнее" width="150">
						</a><br>
						Лёгкое платье для жаркой погоды.
					</div>
					<div>
						Цена: 2499 ₽<br>
						Размеры: S–L<br>
						Материал: 100% лен<br>
						Цвет: Голубой
					</div>
					<div>
						Идеально для прогулок и летних вечеринок. Комфортное и стильное.
					</div>
				</div>

				<div class="catalog-item">
					<div><b>Платье Вечернее</b></div>
					<div>
						<a href="image/dress2.jpg" target="_blank">
							<img src="image/dress2.jpg" alt="Платье Вечернее" width="150">
						</a><br>
						Элегантное платье для особых случаев.
					</div>
					<div>
						Цена: 4999 ₽<br>
						Размеры: XS–M<br>
						Материал: Шёлк 100%<br>
						Цвет: Чёрный
					</div>
					<div>
						Отлично подходит для вечерних мероприятий и торжеств. Подчёркивает фигуру.
					</div>
				</div>

				<div class="catalog-item">
					<div><b>Платье Повседневное</b></div>
					<div>
						<a href="image/dress3.jpg" target="_blank">
							<img src="image/dress3.jpg" alt="Платье Повседневное" width="150">
						</a><br>
						Удобное платье для ежедневной носки.
					</div>
					<div>
						Цена: 1999 ₽<br>
						Размеры: XS–XL<br>
						Материал: Хлопок 95%, Эластан 5%<br>
						Цвет: Розовый
					</div>
					<div>
						Подходит для работы, прогулок и встреч с друзьями. Лёгкое и приятное к телу.
					</div>
				</div>

				<div class="catalog-item">
					<div><b>Футболка Sport</b></div>
					<div>
						<a href="image/tshirt1.jpg" target="_blank">
							<img src="image/tshirt1.jpg" alt="Футболка Sport" width="150">
						</a><br>
						Спортивная футболка с технологией влагоотведения.
					</div>
					<div>
						Цена: 1099 ₽<br>
						Размеры: XS–XL<br>
						Материал: 100% полиэстер<br>
						Цвет: Синий
					</div>
					<div>
						Отлично подходит для тренировок и активного отдыха.
					</div>
				</div>

				<div class="catalog-item">
					<div><b>Футболка Oversize</b></div>
					<div>
						<a href="image/tshirt2.jpg" target="_blank">
							<img src="image/tshirt2.jpg" alt="Футболка Oversize" width="150">
						</a><br>
						Свободная футболка для стильного повседневного образа.
					</div>
					<div>
						Цена: 1299 ₽<br>
						Размеры: M–XXL<br>
						Материал: 100% хлопок<br>
						Цвет: Серый
					</div>
					<div>
						Комфортная и универсальная, легко сочетается с джинсами и шортами.
					</div>
				</div>

				<div class="catalog-item">
					<div><b>Футболка с Принтом</b></div>
					<div>
						<a href="image/tshirt3.jpg" target="_blank">
							<img src="image/tshirt3.jpg" alt="Футболка с Принтом" width="150">
						</a><br>
						Модная футболка с ярким принтом на груди.
					</div>
					<div>
						Цена: 1199 ₽<br>
						Размеры: XS–XL<br>
						Материал: 100% хлопок<br>
						Цвет: Белый с принтом
					</div>
					<div>
						Подходит для кэжуал образов и активного отдыха.
					</div>
				</div>

				<div class="catalog-item">
					<div><b>Джинсы Skinny</b></div>
					<div>
						<a href="image/jeans1.jpg" target="_blank">
							<img src="image/jeans1.jpg" alt="Джинсы Skinny" width="150">
						</a><br>
						Узкие джинсы для повседневного стиля.
					</div>
					<div>
						Цена: 2999 ₽<br>
						Размеры: 28–34<br>
						Материал: Хлопок 98%, Эластан 2%<br>
						Цвет: Тёмно-синий
					</div>
					<div>
						Отлично сочетаются с футболками и рубашками, подчёркивают фигуру.
					</div>
				</div>

				<div class="catalog-item">
					<div><b>Джинсы Mom</b></div>
					<div>
						<a href="image/jeans2.jpg" target="_blank">
							<img src="image/jeans2.jpg" alt="Джинсы Mom" width="150">
						</a><br>
						Свободные джинсы с высокой талией.
					</div>
					<div>
						Цена: 3199 ₽<br>
						Размеры: 26–32<br>
						Материал: Хлопок 100%<br>
						Цвет: Светло-голубой
					</div>
					<div>
						Идеальны для повседневных образов и прогулок. Удобные и стильные.
					</div>
				</div>

				<div class="catalog-item">
					<div><b>Джинсы Straight</b></div>
					<div>
						<a href="image/jeans3.jpg" target="_blank">
							<img src="image/jeans3.jpg" alt="Джинсы Straight" width="150">
						</a><br>
						Прямые джинсы классического кроя.
					</div>
					<div>
						Цена: 2899 ₽<br>
						Размеры: 28–36<br>
						Материал: Хлопок 98%, Эластан 2%<br>
						Цвет: Синий
					</div>
					<div>
						Универсальные джинсы для работы, прогулок и повседневного гардероба.

					</div>
-->