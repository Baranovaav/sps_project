-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 14 2024 г., 15:04
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `alena`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_clients`
--

CREATE TABLE `auth_clients` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `auth_clients`
--

INSERT INTO `auth_clients` (`id`, `login`, `password`) VALUES
(1, 'client', 'client');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_personnel`
--

CREATE TABLE `auth_personnel` (
  `id` int(11) NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `auth_personnel`
--

INSERT INTO `auth_personnel` (`id`, `login`, `password`, `role`) VALUES
(1, 'admin', 'admin', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int(4) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `price` int(10) NOT NULL,
  `image_url` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `title`, `description`, `price`, `image_url`) VALUES
(2, ' ', ' ', 1, ' '),
(3, 'Подарочный набор', 'Стоящий подарок, который оценит любая девушка', 7500, 'https://amiel.club/uploads/posts/2022-03/1647541038_1-amiel-club-p-kartinki-s-podarkami-i-tsvetami-1.jpg'),
(19, 'Самые крутые духи', 'Действительно очень хороший товар', 28215, 'https://avatars.mds.yandex.net/get-mpic/11900957/2a0000018be80ba14147ba1d0b277add4ec7/600x800'),
(20, 'Абонемент СПА (1 визит)', 'Отдохни от серых будней!', 5000, 'https://kartinki.pics/uploads/posts/2022-03/1647021249_34-kartinkin-net-p-spa-salon-kartinki-37.jpg'),
(21, 'Абонемент Фитнесс (1 год)', 'Ваша девушка будет здоровее и крепче!', 24000, 'https://put-sily.ru/wp-content/uploads/9/e/6/9e6216d234746dfca01288366439156d.jpeg'),
(22, 'Скромный красивый букетик', 'Все любят цветы! И мужчины тоже :)', 3000, 'https://flowers-country.ru/wp-content/uploads/2018/01/Buket_s_rozami_liziantusom_alstromeriej_romashkami.jpg'),
(23, 'Билет в Питерлэнд', 'Прикольно, экстримально, заряд адреналина и яркие эмоции - гарантированы', 2500, 'https://kidpassage.com/images/activity/akvapark-piterlend/Piterland_01749424369.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_clients`
--
ALTER TABLE `auth_clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `auth_personnel`
--
ALTER TABLE `auth_personnel`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auth_clients`
--
ALTER TABLE `auth_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `auth_personnel`
--
ALTER TABLE `auth_personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
