-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 11 2020 г., 14:30
-- Версия сервера: 5.7.11
-- Версия PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Authors`
--

CREATE TABLE IF NOT EXISTS `Author` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Authors`
--

INSERT INTO `Author` (`id`, `first_name`, `last_name`) VALUES
(1, 'Dan', 'Abnett'),
(2, 'John', 'Tolkien'),
(3, 'Joanne', 'Rowling');

-- --------------------------------------------------------

--
-- Структура таблицы `Books`
--

CREATE TABLE IF NOT EXISTS `Book` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Books`
--

INSERT INTO `Book` (`id`, `title`, `location`, `author_id`) VALUES
(1, 'Властелин Колец: Возвращение короля', '11 стеллаж, 3 ряд, 13 полка', 2),
(2, 'Warhammer 40k: Инквизитор Эйзенхорн', '5 стеллаж, 1 ряд, 16 полка', 1),
(3, 'Гарри Поттер и Философский камень', '4 стеллаж, 2 ряд, 9 полка', 3),
(4, 'Сильмариллион', '9 стеллаж, 5 ряд, 14 полка', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Authors`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Books`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `location` (`location`,`title`),
  ADD KEY `author_id` (`author_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Authors`
--
ALTER TABLE `Author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `Books`
--
ALTER TABLE `Book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Books`
--
ALTER TABLE `Book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `Author` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
