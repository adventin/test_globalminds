-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 01 2020 г., 23:51
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phonebookdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `person_type`
--

CREATE TABLE `person_type` (
  `id` int NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `person_type`
--

INSERT INTO `person_type` (`id`, `type`) VALUES
(1, 'Юридическое лицо'),
(2, 'Физическое лицо');

-- --------------------------------------------------------

--
-- Структура таблицы `phonebook`
--

CREATE TABLE `phonebook` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `phonebook`
--

INSERT INTO `phonebook` (`id`, `name`, `phone`, `type_id`) VALUES
(1, 'Иван', '+7 (999) 123-45-67', 2),
(2, 'Мария', '+7 (999) 123-45-68', 2),
(3, 'Денис', '+7 (999) 123-45-69', 2),
(4, 'Константин', '+7 (999) 123-45-70', 2),
(5, 'Константин', '+7 (999) 123-45-71', 2),
(6, 'Николай', '+7 (999) 123-45-72', 2),
(7, 'Михаил', '+7 (999) 123-45-73', 2),
(8, 'Иван', '+7 (999) 123-45-74', 2),
(9, 'Василий', '+7 (999) 123-45-75', 2),
(10, 'Татьяна', '+7 (999) 123-45-76', 2),
(11, 'Светлана', '+7 (999) 123-45-77', 2),
(12, 'Валерия', '+7 (999) 123-45-78', 2),
(13, 'Вероника', '+7 (999) 123-45-79', 2),
(24, 'Михаил', '+7 (333) 333-33-33', 2),
(25, 'Рога и копыта', '+7 (333) 333-33-33', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `person_type`
--
ALTER TABLE `person_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `phonebook`
--
ALTER TABLE `phonebook`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `person_type`
--
ALTER TABLE `person_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `phonebook`
--
ALTER TABLE `phonebook`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
