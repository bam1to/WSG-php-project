-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 05 2021 г., 17:53
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `restauracji`
--

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `CITY_ID` int(11) NOT NULL,
  `CITY_NAME` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`CITY_ID`, `CITY_NAME`) VALUES
(1, 'Bydgoszcz'),
(2, 'Warszawa'),
(3, 'Toruń');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `IMAGE_ID` int(11) NOT NULL,
  `IMAGE_NAZWA` varchar(1024) NOT NULL,
  `IMAGE_OPIS` varchar(256) NOT NULL,
  `IMAGE_REST` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `rating`
--

CREATE TABLE `rating` (
  `RATING_ID` int(11) NOT NULL,
  `RATING_VALUE` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `restauracja_widok`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `restauracja_widok` (
`RESTAURANT_ID` int(11)
,`RESTAURANT_NAZWA` varchar(64)
,`RESTAURANT_OPIS` longtext
,`RESTAURANT_ADRES` varchar(128)
,`RESTAURANT_CITY` int(11)
,`RESTAURANT_TELNUM` varchar(32)
,`RESTAURANT_EMAIL` varchar(256)
,`RESTAURANT_WEBSITE` varchar(256)
,`CITY_ID` int(11)
,`CITY_NAME` varchar(256)
);

-- --------------------------------------------------------

--
-- Структура таблицы `restaurant`
--

CREATE TABLE `restaurant` (
  `RESTAURANT_ID` int(11) NOT NULL,
  `RESTAURANT_NAZWA` varchar(64) NOT NULL,
  `RESTAURANT_OPIS` longtext NOT NULL,
  `RESTAURANT_ADRES` varchar(128) NOT NULL,
  `RESTAURANT_CITY` int(11) NOT NULL,
  `RESTAURANT_TELNUM` varchar(32) NOT NULL,
  `RESTAURANT_EMAIL` varchar(256) NOT NULL,
  `RESTAURANT_WEBSITE` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `restaurant`
--

INSERT INTO `restaurant` (`RESTAURANT_ID`, `RESTAURANT_NAZWA`, `RESTAURANT_OPIS`, `RESTAURANT_ADRES`, `RESTAURANT_CITY`, `RESTAURANT_TELNUM`, `RESTAURANT_EMAIL`, `RESTAURANT_WEBSITE`) VALUES
(2, 'test', 'test opis', 'test', 2, '+48 123 456 789', 'test@test.com', 'test.com'),
(3, '123123', '12312312', '123123', 1, '123123', '12321@12312', '123123'),
(4, '123213', '312321312312', '11312312', 1, '1235326dsfsd', '124efsa@fasa', '23sda'),
(6, 'asdasd', 'asfasf', '1123', 1, 'safsaf', '123@1', '12321'),
(8, 'asdas', '1231', '1123123', 1, '12312', '1231@1', '13123'),
(10, '1231', '123123', '112312412412', 1, '1213', '1323@123', '123123'),
(12, '12312', '12312', '1213', 1, '123', '312@1', '1231'),
(16, '12312', '12312', '1213', 1, '123', '312@1', '1231'),
(22, '123123', '666', '1666', 2, '666', '666@6', '666'),
(23, '', '', '', 0, '', '', ''),
(24, '', '', '', 0, '', '', ''),
(25, '', '', '', 0, '', '', ''),
(26, '', '', '', 0, '', '', ''),
(27, '', '', '', 0, '', '', ''),
(28, '', '', '', 0, '', '', ''),
(29, '', '', '', 0, '', '', ''),
(30, '', '', '', 0, '', '', ''),
(31, '1231', '13223213', '21321', 1, '1232132', '123321123@3', '13123'),
(32, '', '', '', 0, '', '', ''),
(33, '', '', '', 0, '', '', ''),
(34, '', '', '', 0, '', '', ''),
(35, '', '', '', 0, '', '', ''),
(36, '', '', '', 0, '', '', ''),
(37, '', '', '', 0, '', '', ''),
(38, '', '', '', 0, '', '', ''),
(39, '', '', '', 0, '', '', ''),
(40, '', '', '', 0, '', '', ''),
(41, '', '', '', 0, '', '', ''),
(42, '', '', '', 0, '', '', ''),
(43, '', '', '', 0, '', '', ''),
(44, '', '', '', 0, '', '', ''),
(45, '', '', '', 0, '', '', ''),
(46, '', '', '', 0, '', '', ''),
(47, '', '', '', 0, '', '', ''),
(48, '', '', '', 0, '', '', ''),
(49, '', '', '', 0, '', '', ''),
(50, '', '', '', 0, '', '', ''),
(51, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(52, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(53, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(54, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(55, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(56, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(57, '', '', '', 0, '', '', ''),
(58, '', '', '', 0, '', '', ''),
(59, '', '', '', 0, '', '', ''),
(60, '', '', '', 0, '', '', ''),
(61, '', '', '', 0, '', '', ''),
(62, '', '', '', 0, '', '', ''),
(63, '', '', '', 0, '', '', ''),
(64, '', '', '', 0, '', '', ''),
(65, '', '', '', 0, '', '', ''),
(66, '', '', '', 0, '', '', ''),
(67, '', '', '', 0, '', '', ''),
(68, '', '', '', 0, '', '', ''),
(69, '', '', '', 0, '', '', ''),
(70, '', '', '', 0, '', '', ''),
(71, '', '', '', 0, '', '', ''),
(72, '', '', '', 0, '', '', ''),
(73, '', '', '', 0, '', '', ''),
(74, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(75, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(76, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(77, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(78, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(79, '', '', '', 0, '', '', ''),
(80, '', '', '', 0, '', '', ''),
(81, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(82, '', '', '', 0, '', '', ''),
(83, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(84, '', '', '', 0, '', '', ''),
(85, '', '', '', 0, '', '', ''),
(86, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(87, '', '', '', 0, '', '', ''),
(88, '', '', '', 0, '', '', ''),
(89, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(90, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(91, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(92, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(93, '', '', '', 0, '', '', ''),
(94, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(95, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(96, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(97, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(98, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(99, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(100, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(101, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(102, '', '', '', 0, '', '', ''),
(103, '', '', '', 0, '', '', ''),
(104, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(105, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(106, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(107, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(108, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(109, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(110, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(111, '', '', '', 0, '', '', ''),
(112, '1234567', '12345', '12345', 1, '123456', '123@123', '12345'),
(113, '', '', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `REVIEW_ID` int(11) NOT NULL,
  `REVIEW_NIK` varchar(256) NOT NULL,
  `REVIEW_KOMENT` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура для представления `restauracja_widok`
--
DROP TABLE IF EXISTS `restauracja_widok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `restauracja_widok`  AS SELECT `restaurant`.`RESTAURANT_ID` AS `RESTAURANT_ID`, `restaurant`.`RESTAURANT_NAZWA` AS `RESTAURANT_NAZWA`, `restaurant`.`RESTAURANT_OPIS` AS `RESTAURANT_OPIS`, `restaurant`.`RESTAURANT_ADRES` AS `RESTAURANT_ADRES`, `restaurant`.`RESTAURANT_CITY` AS `RESTAURANT_CITY`, `restaurant`.`RESTAURANT_TELNUM` AS `RESTAURANT_TELNUM`, `restaurant`.`RESTAURANT_EMAIL` AS `RESTAURANT_EMAIL`, `restaurant`.`RESTAURANT_WEBSITE` AS `RESTAURANT_WEBSITE`, `city`.`CITY_ID` AS `CITY_ID`, `city`.`CITY_NAME` AS `CITY_NAME` FROM (`restaurant` join `city`) WHERE `restaurant`.`RESTAURANT_CITY` = `city`.`CITY_ID` ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CITY_ID`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`IMAGE_ID`);

--
-- Индексы таблицы `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RATING_ID`);

--
-- Индексы таблицы `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`RESTAURANT_ID`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`REVIEW_ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `IMAGE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `rating`
--
ALTER TABLE `rating`
  MODIFY `RATING_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `RESTAURANT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `REVIEW_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
