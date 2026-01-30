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
			<h1>О нас</h1>
			<BR>
			<a href="catalog.php" target="_self">
				<img src="image/main_banner.jpg" alt="Новая коллекция" width="90%">
			</a>
			</p><BR>
			<h2>Новые поступления</h2>
			<p>Откройте для себя последние тренды сезона: стильные платья, удобные джинсы и модные аксессуары.</p>
			<ul>
				<li><a href="#">Женская коллекция</a></li>
				<li><a href="#">Мужская коллекция</a></li>
				<li><a href="#">Аксессуары</a></li>
			</ul>
			<BR>
			<h2>Наши преимущества</h2>
			<ol>
				<li>Современный стиль по доступным ценам</li>
				<li>Более 800 магазинов по всей России</li>
				<li>Удобный онлайн-каталог</li>
				<li>Регулярные акции и скидки</li>
			</ol>
			<BR>
			<h2>Новости</h2>
			<p><b>Сентябрь 2025:</b> Открытие нового флагманского магазина Befree в Москве!</p>
			<p><b>Август 2025:</b> Старт осенней коллекции — будь готова к новым трендам!</p>
			<BR>
		</main>
		<?php require_once "./src/banners.php"; ?>

	</div>

	<?php require_once "./src/footer.php"; ?>

</body>

</html>