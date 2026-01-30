<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<title>Befree</title>
	<link rel="stylesheet" href="./CSS/main.css">
</head>

<body>

	<div class="container">
		<?php if (isset($_COOKIE['login']))
			require_once "./src/menu_login.php";
		else
			require_once "./src/menu.php"; ?>
		<?php require_once "./src/mod.php"; ?>
		<main class="content">
			<h1>Контакты
				<h1>
					<BR>
					<img src="image/main_banner_contacts.jpg" alt="Контакты" width="100%">
					<table class="contacts">
						<tr>
							<td>
								<h3>СЛУЖБА ПОДДЕРЖКИ</h3>
								<p>8 (800) 250-01-02<br>
									Звонок бесплатный, ежедневно с 7:00 до 24:00 по МСК<br>
									Email: <a href="mailto:info@befree.ru">info@befree.ru</a><br>
									По вопросам производственного сотрудничества: <a
										href="mailto:suppliers.befree@melonfashion.com">suppliers.befree@melonfashion.com</a>
								</p>

								<h3>ОФИС BEFREE</h3>
								<p>190020, 10-я Красноармейская, 22, литер А, пом. 1-Н, 6-й этаж</p>

								<p>Не нашли, что искали? Свяжитесь с нами</p>

								<a href="https://befree.ru/faq">FAQ</a><br>
								8 (800) 250-01-02<br>
								<a href="mailto:info@befree.ru">info@befree.ru</a>
								</p>
							</td>

							<td>
								<h3>РЕКВИЗИТЫ</h3>
								<p>Акционерное общество «Мэлон Фэшн Груп»<br>
									Юридический адрес: 190020, г. Санкт-Петербург, 10-я Красноармейская, дом 22, литер
									А,
									пом. 1-Н, 6 этаж<br>
									ИНН 7839326623<br>
									КПП 783450001<br>
									ОГРН 1057813298553<br>
									ОКПО 79723322<br>
									ОКВЭД 47.71<br>
									Ф-Л «СЕВЕРНАЯ СТОЛИЦА» АО «РАЙФФАЙЗЕНБАНК», САНКТ-ПЕТЕРБУРГ<br>
									БИК 044030723<br>
									К/с 30101810100000000723<br>
									Р/с 40702810403000421433</p>
							</td>
						</tr>
					</table>
					<div style="position:relative;overflow:hidden;"><a
							href="https://yandex.ru/maps/2/saint-petersburg/?utm_medium=mapframe&utm_source=maps"
							style="color:#eee;font-size:12px;position:absolute;top:0px;">Санкт‑Петербург</a><a
							href="https://yandex.ru/maps/2/saint-petersburg/house/10_ya_krasnoarmeyskaya_ulitsa_22/Z0kYdA5lSEcBQFtjfXVwc3xhZQ==/?ll=30.295126%2C59.912021&utm_medium=mapframe&utm_source=maps&z=17"
							style="color:#eee;font-size:12px;position:absolute;top:14px;">10-я Красноармейская улица, 22
							на
							карте Санкт‑Петербурга, ближайшее метро Балтийская — Яндекс Карты</a><iframe
							src="https://yandex.ru/map-widget/v1/?ll=30.295126%2C59.912021&mode=whatshere&whatshere%5Bpoint%5D=30.295126%2C59.912021&whatshere%5Bzoom%5D=17&z=17"
							width="900" height="400" frameborder="1" allowfullscreen="true"
							style="position:relative;"></iframe></div>

					<BR>
					</td>
					<h1>Остались вопросы? Свяжитесь с нами!</h1>
					<br>

					<form method="post" action="./lib/contactsa.php">
						<div class="faq">
							<label>Логин пользователя</label>

							<div class="login-display">
								<?= htmlspecialchars($_COOKIE['login'] ?? 'Войдите в аккаунт!!!') ?>
							</div>

							<input type="hidden" name="login" value="<?= htmlspecialchars($_COOKIE['login'] ?? '') ?>">


							<label>Пол</label><br>
							<label><input type="radio" name="gender" value="male" required> Мужской</label>
							<label><input type="radio" name="gender" value="female" required> Женский</label>


							<label><input type="checkbox" name="online"> Онлайн покупка</label><br>

							<label>Ваш город</label>
							<select name="city" required>
								<option value="">Выберите город</option>
								<option value="Москва">Москва</option>
								<option value="Санкт-Петербург">Санкт-Петербург</option>
								<option value="Новосибирск">Новосибирск</option>
								<option value="Екатеринбург">Екатеринбург</option>
							</select>

							<label>Тема</label>
							<input type="text" name="subject" placeholder="Тема сообщения..." required>

							<label>Текст</label>
							<textarea name="message" rows="4" placeholder="Ваше сообщение..." required></textarea>

							<label>Адрес</label>
							<textarea name="scrolltext" rows="6" style="resize:none; overflow:auto;" required>
Ситуация, описанная выше произошла по адресу...
		</textarea>

							<label class="switch-label">Подписаться на новости</label>
							<label class="switch">
								<input type="checkbox" name="subscribe">
								<span class="slider"></span>
							</label>

							<button type="submit">Отправить</button>
						</div>
					</form>




		</main>

		<?php require_once "./src/banners.php"; ?>
	</div>

	<?php require_once "./src/footer.php"; ?>

</body>

</html>