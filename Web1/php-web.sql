-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Янв 30 2026 г., 22:55
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php-web`
--

-- --------------------------------------------------------

--
-- Структура таблицы `trending`
--

CREATE TABLE `trending` (
  `id` int(5) UNSIGNED NOT NULL,
  `image` varchar(60) NOT NULL,
  `followers` int(5) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `trending`
--

INSERT INTO `trending` (`id`, `image`, `followers`) VALUES
(1, 'game1.png', 50),
(2, 'game2.png', 226),
(3, 'game3.png', 56),
(4, 'game4.png', 123),
(5, 'game1.png', 32);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(130) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `user_name`, `email`, `password`) VALUES
(2, 'rorth', 'Vladimir', '1234@php.com', '4a4f99b595ca76bfb5384cb8a414de2d'),
(3, 'popik', 'Youyh', 'zadaka65@gmail.com', 'f90838d157ec0dfbdb7e07bb64a71d8e'),
(4, 'popik', 'Youyh', 'zadaka65@gmail.com', 'f90838d157ec0dfbdb7e07bb64a71d8e'),
(5, 'popka', 'Alex', 'asdf@mama.com', '4f1af7501a86d63061e3ec6439b5b2ad'),
(6, '1234', 'stepan', 'stepabru@mail.ru', '3f08273865bcc1c8b7f34b93e588ac6c'),
(7, 'Stepan1337', 'stepa', 'adaf@mail.ru', '10657a4b8ff76a1ec1561757e4261df9');

-- --------------------------------------------------------

--
-- Структура таблицы `web_catalog`
--

CREATE TABLE `web_catalog` (
  `id` int(5) UNSIGNED NOT NULL,
  `category` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `description` text DEFAULT NULL,
  `sizes` varchar(50) NOT NULL,
  `amount` int(5) NOT NULL,
  `material` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `details` text DEFAULT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `web_catalog`
--

INSERT INTO `web_catalog` (`id`, `category`, `title`, `price`, `description`, `sizes`, `amount`, `material`, `color`, `details`, `image`) VALUES
(1, 'dress', 'Платье Летнее', 2498, 'Лёгкое платье для жаркой погоды.', 'S–L', 12, '100% лен', 'Голубой', 'Идеально для прогулок и летних вечеринок.', 'image/dress1.jpg'),
(2, 'dress', 'Платье Вечернее', 4999, 'Элегантное платье для особых случаев.', 'XS–M', 8, 'Шёлк 100%', 'Чёрный', 'Отлично подходит для вечерних мероприятий.', 'image/dress2.jpg'),
(3, 'dress', 'Платье Повседневное', 1999, 'Удобное платье для ежедневной носки.', 'XS–XL', 12, 'Хлопок 95%, Эластан 5%', 'Розовый', 'Подходит для работы, прогулок и встреч с друзьями. Лёгкое и приятное к телу.', 'image/dress3.jpg'),
(4, 'tshirt', 'Футболка Classic', 899, 'Базовая белая футболка унисекс.', 'XS–XL', 12, '100% хлопок', 'Белый', 'Подходит для повседневного стиля. Отлично комбинируется с джинсами, шортами или юбкой.', 'image/tshirt1.jpg'),
(5, 'tshirt', 'Футболка Sport', 1099, 'Спортивная футболка с технологией влагоотведения.', 'XS–XL', 23, '100% полиэстер', 'Синий', 'Отлично подходит для тренировок и активного отдыха.', 'image/tshirt2.jpg'),
(6, 'tshirt', 'Футболка Oversize', 1299, 'Свободная футболка для стильного повседневного образа.', 'M–XXL', 16, '100% хлопок', 'Серый', 'Комфортная и универсальная, легко сочетается с джинсами и шортами.', 'image/tshirt3.jpg'),
(7, 'jeans', 'Джинсы Skinny', 2999, 'Узкие джинсы для повседневного стиля.', '28–34', 17, 'Хлопок 98%, Эластан 2%', 'Тёмно-синий', 'Отлично сочетаются с футболками и рубашками, подчёркивают фигуру.', 'image/jeans1.jpg'),
(8, 'jeans', 'Джинсы Mom', 3199, 'Свободные джинсы с высокой талией.', '26–32', 18, 'Хлопок 100%', 'Светло-голубой', 'Идеальны для повседневных образов и прогулок. Удобные и стильные.', 'image/jeans2.jpg'),
(9, 'jeans', 'Джинсы Straight', 2899, 'Прямые джинсы классического кроя.', '28–36', 64, 'Хлопок 98%, Эластан 2%', 'Синий', 'Универсальные джинсы для работы, прогулок и повседневного гардероба.', 'image/jeans3.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `web_reviews`
--

CREATE TABLE `web_reviews` (
  `id` int(5) NOT NULL,
  `login` varchar(50) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `city` varchar(50) NOT NULL,
  `online` tinyint(1) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `address` text NOT NULL,
  `subscribe` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `web_reviews`
--

INSERT INTO `web_reviews` (`id`, `login`, `gender`, `city`, `online`, `subject`, `message`, `address`, `subscribe`) VALUES
(1, 'petr', 'male', 'Новосибирск', 1, 'Тест', 'header(\'Location: /contacts.php\');\r\n    exit;', 'Ситуация, описанная выше произошла по адресу...', 1),
(2, 'petr', 'female', 'Санкт-Петербург', 0, 'Некачественный товар', 'Текст для проверка', 'Ситуация, описанная выше произошла по адресу...', 1),
(3, 'petr', 'female', 'Санкт-Петербург', 0, 'Некачественный товар', 'Текст для проверка', 'Ситуация, описанная выше произошла по адресу...', 1),
(4, 'petr', 'female', 'Санкт-Петербург', 0, 'Некачественный товар', 'Текст для проверка', 'Ситуация, описанная выше произошла по адресу...', 1),
(5, 'petr', 'female', 'Санкт-Петербург', 0, 'Некачественный товар', 'Текст для проверка', 'Ситуация, описанная выше произошла по адресу...', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `web_stars`
--

CREATE TABLE `web_stars` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `stars` tinyint(4) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `web_stars`
--

INSERT INTO `web_stars` (`id`, `item_id`, `username`, `stars`, `review`) VALUES
(1, 1, 'petr', 5, 'пывпыв'),
(2, 2, 'petr', 5, 'afaf');

-- --------------------------------------------------------

--
-- Структура таблицы `web_users`
--

CREATE TABLE `web_users` (
  `id` int(5) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_surname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `web_users`
--

INSERT INTO `web_users` (`id`, `login`, `user_name`, `user_surname`, `user_lastname`, `email`, `phone`, `password`) VALUES
(1, 'petr', 'Иван', 'Петров', 'Петрович', 'pochta@mai.ru', '88005553535', '$2y$10$NwfTtjz5Zn5q5Rh2o9p6mu/mQa5M9MCLqUdXLWEaFtP8GJ5AtxNyq'),
(3, 'petr12', 'Иван', 'Иванов', 'Петрович', 'pochta12@mai.ru', '88005553535', '$2y$10$YH6rfFpvIxjPkFK8eTJsj.ZodqaaMm3fsJkXno5poni08JGIK1kzS'),
(4, 'petr2', 'Иван', 'Петров', 'Петрович', 'pochta1@gmail.com', '79450523532', '$2y$10$PKrrjNORIrG33L5BLug1F.mOu55.JPAeIQZmVxDK1CWeIq8GPByUC'),
(5, 'Stepan1337', 'Иван', 'Петров', 'Петрович', 'adafaf@mail.ru', '88005553535', '$2y$10$1dDPFzvJX.o.gTsNi3QAj.U.yGChz0FmcmbNjZH68KvBerjqn1LWK'),
(6, 'epodvigina', 'Елена', 'Подвигина', 'Анатольевна', 'stankin@mail.ru', '+79051234567', '$2y$10$V5DDPiwv.SWcqAr7NtFZB.Azu/GzGLDQQIh9H345KAABjTCslm5jm');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `trending`
--
ALTER TABLE `trending`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `web_catalog`
--
ALTER TABLE `web_catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `web_reviews`
--
ALTER TABLE `web_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `web_stars`
--
ALTER TABLE `web_stars`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `web_users`
--
ALTER TABLE `web_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `trending`
--
ALTER TABLE `trending`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `web_catalog`
--
ALTER TABLE `web_catalog`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `web_reviews`
--
ALTER TABLE `web_reviews`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `web_stars`
--
ALTER TABLE `web_stars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `web_users`
--
ALTER TABLE `web_users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
