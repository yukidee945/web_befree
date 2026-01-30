<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<title>Befree</title>
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
			<h1>Добро пожаловать в Befree!</h1>
			<BR>

			<form action="/Web1/catalog.php" method="GET" class="search-box" style="display:flex;">
				<input type="text" name="query" placeholder="Поиск по каталогу..." required>
				<button type="submit">Найти</button>
			</form>

			<p>
				<a href="catalog.php" target="_self">
					<img src="image/start_banner.jpg" alt="Новая коллекция" width="100%"></a>
			</p>


			<table class="baseInf">
				<tr>
					<th colspan="2">О бренде Befree</th>
					<th>Целевая аудитория</th>
					<th colspan="2">Стиль</th>
				</tr>
				<tr>
					<td>Современный, динамичный</td>
					<td>Трендовые фасоны, удобство</td>
					<td>Молодежь 16–30 лет</td>
					<td>Коллекции</td>
					<td>Тренды</td>
				</tr>
				<tr>
					<td colspan="5">Befree — молодежная мода для яркой жизни</td>
				</tr>
			</table>
			<p>
				<i>Befree</i> — это российский бренд одежды, принадлежащий компании <b>Melon Fashion Group</b>
				(Мэлон Фэшн Груп).
				Компания была основана в 2002 году и специализируется на мультибрендовых магазинах женской и мужской
				одежды.
			</p>

			<BR>
			<p>Управляет более чем <b> 800 магазинами </b>. В 2021 году компания вошла в число 500 крупнейших
				предприятий России по размеру выручки согласно рейтингу <i>РБК-500</i>.
			</p>
			<BR>
			<!-- Слайдер -->
			<div class="slider">
				<?php
				error_reporting(E_ALL);
				ini_set('display_errors', 1);
				require "lib/db.php";



				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $pdo->query("SELECT image FROM web_catalog");
				$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$first = true;
				$count = 0;
				if ($images) {
					foreach ($images as $img) {
						if ($count >= 5)
							break;
						$active = $first ? ' active' : '';
						echo '<div class="item' . $active . '">
                        <img src="' . htmlspecialchars($img['image']) . '" alt="Слайд">
                      </div>';
						$first = false;
						$count++;
					}
				}

				?>

				<!-- Кнопки -->
				<div class="previous" onclick="previousSlide()">&#10094;</div>
				<div class="next" onclick="nextSlide()">&#10095;</div>
			</div>

			<div class="slider-dots">
				<?php
				for ($i = 0; $i < $count; $i++) {
					$activeDot = $i === 0 ? ' active' : ''; // первая точка активна
					echo '<span class="' . $activeDot . '" onclick="currentSlide(' . $i . ')"></span>';
				}
				?>
			</div>


			Наша команда живет <B>любимым делом</B>, а не просто ходит на работу. Потому что вместе мы строим не
			просто компанию. Мы хотим, чтобы Melon стал местом притяжения <B>талантов</B> и воплощения
			<B>суперидей</B>.
		</main>

		<?php require_once "./src/banners.php"; ?>


	</div>

	<?php require_once "./src/footer.php"; ?>
	<script>
		let slideIndex = 0;
		showSlide(slideIndex);

		function nextSlide() { showSlide(slideIndex += 1); }
		function previousSlide() { showSlide(slideIndex -= 1); }
		function currentSlide(n) { showSlide(slideIndex = n); }

		function showSlide(n) {
			const slides = document.querySelectorAll(".slider .item");
			const dots = document.querySelectorAll(".slider-dots span");

			if (slides.length === 0) return;

			if (n >= slides.length) slideIndex = 0;
			if (n < 0) slideIndex = slides.length - 1;

			slides.forEach(slide => slide.style.display = "none");
			dots.forEach(dot => dot.classList.remove("active"));

			slides[slideIndex].style.display = "block";
			slides[slideIndex].classList.add("active");
			dots[slideIndex].classList.add("active");
		}

		// Автопрокрутка каждые 5 секунд
		setInterval(() => nextSlide(), 5000);

	</script>


</body>

</html>