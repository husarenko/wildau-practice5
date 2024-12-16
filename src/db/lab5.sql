-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Гру 16 2024 р., 08:58
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
-- База даних: `lab5`
--

-- --------------------------------------------------------

--
-- Структура таблиці `tov`
--

CREATE TABLE `tov` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `cost` int(11) NOT NULL,
  `kol` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `tov`
--

INSERT INTO `tov` (`id`, `name`, `cost`, `kol`, `date`) VALUES
(3, 'Хліб столовий', 24, 100, '2023-12-01'),
(4, 'Хліб житній', 20, 50, '2023-12-02'),
(5, 'Молоко', 18, 150, '2023-12-03'),
(6, 'Яйця курячі', 35, 200, '2023-12-04'),
(7, 'Сир твердий', 90, 60, '2023-12-05'),
(8, 'Печиво', 40, 80, '2023-12-06'),
(9, 'Рис', 35, 120, '2023-12-07'),
(10, 'Гречка', 28, 110, '2023-12-08'),
(11, 'М`ясо яловичина', 150, 30, '2023-12-09'),
(12, 'Картопля', 20, 500, '2023-12-10');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`, `address`, `age`, `gender`, `profile_picture`, `created_at`) VALUES
(1, 'admin', '$2y$10$qwNBpD8bciMYJ0Txud8mXO3ACA6YzgteycI3Ka0XdnzrfqjVAP1v6', 'dadsasdasd@ggg.ggg', NULL, NULL, NULL, NULL, NULL, '2024-12-16 07:14:16');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `tov`
--
ALTER TABLE `tov`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `tov`
--
ALTER TABLE `tov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
