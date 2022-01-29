-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Sty 2022, 17:46
-- Wersja serwera: 10.4.13-MariaDB
-- Wersja PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `logowanie`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logged_in_users`
--

CREATE TABLE `logged_in_users` (
  `sessionId` varchar(100) CHARACTER SET utf8 NOT NULL,
  `userId` int(11) NOT NULL,
  `lastUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fullName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `userName`, `fullName`, `email`, `password`, `date`) VALUES
(1, 'qwerty', 'Adrian Duwer', 'adrian.duwer@gmail.com', '$2y$10$yE8Vo4nAHhbNCJbsoIpDNO2nGJIQUEHEeC4VX9AYVUMI0OymH9u9u', '2022-01-29 12:02:14'),
(2, 'zxcvb', 'Kamil Kamilak', 'kamilkamilak@gmail.com', '$2y$10$p8n1RXee/DQCD5GM7YtoC.i3DCAkBBUlbSlPBxqs6SlUPVGkvJV6C', '2022-01-29 12:02:45'),
(3, 'asdfg', 'Michał Michalak', 'michalmichalak@gmail.com', '$2y$10$Bd9pXevJElMJOvUBJBxuGuQ3ug4D8sGEOf1GKmEq7t2ys9Is6bZaW', '2022-01-29 12:03:01'),
(4, 'poiuy', 'Karol Karolak', 'karolkarolak@gmail.com', '$2y$10$/j8uhRrczv0RFLlZrAwad.z6pN5M3yPKuUz3wwe9nj.ryB1g8QYd.', '2022-01-29 12:03:35');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `logged_in_users`
--
ALTER TABLE `logged_in_users`
  ADD PRIMARY KEY (`sessionId`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
