-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 22 2020 г., 18:28
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_execute` int(11) NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`task_id`, `title`, `description`, `user_execute`, `status`) VALUES
(1, 'Укрепить фундамент', 'Залить больше битона .......', 13, 'In Progress'),
(3, 'Построить крышу', '          \r\n        Нужна черепица , доски и многое другое', 13, 'In Progress'),
(4, 'Поставить двери', 'Поехать  в магазин и купить двери         \r\n        ', 7, 'In Progress'),
(5, 'Поставить окна', 'Нужны пластиковые окна вместо старых', 7, 'In Progress'),
(6, 'Посадить дерево', 'Выкопать дерево и посадить в саду', 7, 'In Progress'),
(7, 'Бибурашвили нужно уволить ', 'Плохой сотрудник , не выполняющий обязаности', 7, 'In Progress'),
(8, 'Проверить лестницу на прочность ', 'Протестировать лестницу разными способами\r\nПротестировать лестницу разными способами\r\nПротестировать лестницу разными способами\r\nПротестировать лестницу разными способами\r\nПротестировать лестницу разными способами', 7, 'In Progress'),
(9, 'Положить плитку', 'Положить плитку в  ванной и кухне', 11, 'In Progress'),
(10, 'Паркет скрипит', 'Сделать что то с паркетом , срочно!', 11, 'In Progress'),
(11, 'Вынести мусор', 'Заказать машину и вынести весь строительный мусор', 11, 'In Progress'),
(12, 'Записаться на секцию', 'Найти интересную спортивную секцию и записаться', 9, 'In Progress'),
(13, 'Установить телевизор', 'Купить и  установить телевизор , вместе с антенной  ', 11, 'In Progress'),
(14, 'Выгуялть собаку', 'Накормить и  погулять с  собакой по городу', 12, 'Done'),
(15, 'Купить одежду', 'Найти хороший магазин и  купить зимнюю одежду', 17, 'In Progress');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(2, 'Алексей ', 'богданов', '123r3', '123'),
(3, 'Богдан', 'Алексеенко', '1zzzzzzzzz', '1zzzzzzzzz'),
(7, 'Кристина', 'Заворотнюк', '55', '55'),
(9, 'Вика', 'Игнатовна', '12', '12'),
(10, 'Семён', 'Слепаков', '45', '45'),
(11, 'Никита', 'Мясников', '11', '1'),
(13, 'Володя', 'Божанной', '1', '1'),
(14, 'Кирил', 'Лесичянский', '2', '2'),
(15, 'Артём', 'Конюк', '3', '3'),
(16, 'Артём', 'Коновал', '4', '4'),
(17, 'Светлана', 'Кирова', '5', '5');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
