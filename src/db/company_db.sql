-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Гру 16 2024 р., 08:59
-- Версія сервера: 10.4.32-MariaDB
-- Версія PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `company_db`
--

-- --------------------------------------------------------

--
-- Структура таблиці `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `salary` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `employees`
--

INSERT INTO `employees` (`id`, `name`, `position`, `salary`) VALUES
(11, 'Іван Іванов', 'Менеджер', 24000.50),
(12, 'Петро Петренко', 'Розробник', 20000.00),
(13, 'Олена Оленова', 'Технічний директор', 40000.00),
(14, 'Марія Марченко', 'Аналітик', 22000.00),
(15, 'Сергій Сергієнко', 'Дизайнер', 18000.00),
(16, 'Олександр Олександров', 'Тестувальник', 15000.00),
(17, 'Тетяна Тетянич', 'HR-менеджер', 20000.00),
(18, 'Владислав Владов', 'Системний адміністратор', 28000.00),
(19, 'Наталія Наталенко', 'Маркетолог', 23000.00),
(20, 'Дмитро Дмитренко', 'Веб-розробник', 27000.00);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
