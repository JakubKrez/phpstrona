-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 18, 2025 at 04:29 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id`, `nazwa`) VALUES
(1, 'Laptop Dell Inspiron'),
(2, 'Smartphone Samsung Galaxy S23'),
(3, 'Telewizor LG OLED 55\"'),
(4, 'Słuchawki Sony WH-1000XM5'),
(5, 'Konsola PlayStation 5'),
(6, 'Tablet Apple iPad Pro'),
(7, 'Aparat Canon EOS 90D'),
(8, 'Smartwatch Garmin Forerunner 9'),
(9, 'Drukarka HP LaserJet Pro MFP'),
(10, 'Głośnik Bluetooth JBL Charge 5');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `imie` varchar(20) NOT NULL,
  `nazwisko` varchar(40) NOT NULL,
  `haslo` varchar(40) NOT NULL,
  `email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `haslo`, `email`) VALUES
(1, 'Jakub', 'Brzoska', '$$2y$10$iHXKUVaGPdrL8fKIkWWCU.guDUH7kGu4', 'jbrzoska@wp.pl'),
(2, 'admin', 'admin', '$$2y$10$EQb.ZZXCumUemyCqWdjF6.ecDosatuBO', 'admin@gmail.com'),
(3, 'damian', 'nowak', '$$2y$10$XR/Ox7X4Q8VjitPXPfG5RuJa7Fvzwk/l', 'nowak@wp.pl'),
(4, 'Ryszard', 'Cebula', '$2y$10$7pGk9gL440gjelDD7v5p0.Bpj5zySOlqA', 'cebula@gmail.com'),
(5, 'Darek', 'Truskawka', '$2y$10$XC2tsRmAsR.zqZN9rtTbdug5LafoPC6KA', 'daro123@gmail.com'),
(6, 'Arek', 'Banan', 'Banan', 'banan@wp.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zakupy`
--

CREATE TABLE `zakupy` (
  `id_produkt` int(11) NOT NULL,
  `id_uzytkownik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zakupy`
--

INSERT INTO `zakupy` (`id_produkt`, `id_uzytkownik`) VALUES
(1, 6),
(4, 6);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zakupy`
--
ALTER TABLE `zakupy`
  ADD PRIMARY KEY (`id_produkt`,`id_uzytkownik`),
  ADD KEY `id_uzytkownik` (`id_uzytkownik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `zakupy`
--
ALTER TABLE `zakupy`
  ADD CONSTRAINT `zakupy_ibfk_1` FOREIGN KEY (`id_produkt`) REFERENCES `produkty` (`id`),
  ADD CONSTRAINT `zakupy_ibfk_2` FOREIGN KEY (`id_uzytkownik`) REFERENCES `uzytkownicy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
