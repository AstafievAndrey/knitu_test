-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 21 2014 г., 15:43
-- Версия сервера: 5.6.20
-- Версия PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `knitu`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Questions`
--

CREATE TABLE IF NOT EXISTS `Questions` (
`id_question` int(5) NOT NULL,
  `question` varchar(255) NOT NULL,
  `rigth` int(11) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `Questions`
--

INSERT INTO `Questions` (`id_question`, `question`, `rigth`, `type`) VALUES
(1, 'Сегодня плохая погода?', 1, 0),
(2, 'Функции о.с.', 8, 0),
(3, 'Где хранится BIOS?', 9, 0),
(4, 'Куда помещаются удаляемые файлы?', 13, 0),
(5, 'Текущий диск - это', 17, 0),
(6, 'Что обрабатывает command.com?', 21, 1),
(7, 'Сколько цифр в двоичной системе', 22, 1),
(8, 'Сколько чисел в шестнадцатиричной системе счисления?', 23, 1),
(9, 'Сколько чисел в восьмириченой системе счисления? ', 24, 1),
(10, 'Вопрос 10', 25, 1),
(11, 'Вопрос 11', 26, 1),
(12, 'Вопрос 12', 27, 1),
(13, 'Вопрос 13', 28, 1),
(14, 'Вопрос 14', 29, 1),
(15, 'Вопрос 15', 30, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
`id_user` int(5) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `rating` float DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id_user`, `login`, `password`, `rating`) VALUES
(1, 'root', 'root', 4),
(2, 'user', 'user', 5),
(3, 'Andrey', '123qwe', 3),
(4, 'Anton', 'qwe', 3),
(5, 'Vasya', '321', 3),
(6, 'Kostya', 'asd', 4),
(7, 'Petya', '321', 3),
(8, 'Valentin', 'asd', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `variant`
--

CREATE TABLE IF NOT EXISTS `variant` (
`id_variant` int(11) NOT NULL,
  `variant` varchar(255) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `variant`
--

INSERT INTO `variant` (`id_variant`, `variant`, `id_question`) VALUES
(1, 'У природы нет плохой погоды', 1),
(2, 'Плохая', 1),
(3, 'Хорошая', 1),
(4, 'Нормальная', 1),
(5, 'обеспечение организации и хранения файлов', 2),
(6, 'подключения устройств ввода/вывода ', 2),
(7, 'организация обмена данными между компьютером и различными периферийными устройствами ', 2),
(8, 'организация диалога с пользователем, управления аппаратурой и ресурсами компьютера', 2),
(9, 'в постоянно-запоминающем устройстве (ПЗУ)', 3),
(10, 'на CD-ROM ', 3),
(11, 'на винчестере', 3),
(12, 'в оперативно-запоминающем устройстве (ОЗУ) ', 3),
(13, 'корзина', 4),
(14, 'портфель', 4),
(15, 'оперативная', 4),
(16, 'блокнот', 4),
(17, 'диск, с которым пользователь работает в данный момент времени ', 5),
(18, 'CD-ROM', 5),
(19, 'жесткий диск', 5),
(20, 'диск, в котором хранится операционная система', 5),
(21, 'команды о.с.', 6),
(22, '2', 7),
(23, '16', 8),
(24, '8', 9),
(25, '10', 10),
(26, '11', 11),
(27, '12', 12),
(28, '13', 13),
(29, '14', 14),
(30, '15', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Questions`
--
ALTER TABLE `Questions`
 ADD PRIMARY KEY (`id_question`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `variant`
--
ALTER TABLE `variant`
 ADD PRIMARY KEY (`id_variant`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Questions`
--
ALTER TABLE `Questions`
MODIFY `id_question` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
MODIFY `id_variant` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
