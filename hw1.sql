-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 05, 2024 alle 23:08
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hw1`
--
Create DATABASE hw1;
USE hw1:
-- --------------------------------------------------------

--
-- Struttura della tabella `clienti`
--

CREATE TABLE `clienti` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `clienti`
--

INSERT INTO `clienti` (`id`, `nome`, `cognome`, `telefono`, `username`, `email`, `password`) VALUES
(1, 'Giulio', 'Calia', '393000123', 'Giul', 'giulio@outlook.it', '$2y$10$D6zjzqHDw63fZGrucS0KVex3YUJXrUMqBE0QbHSMnGi0QQaNW4cHe'),
(2, 'Rosario', 'Lippi', '393756821', 'Ros11', 'rosario10@outlook.it', '$2y$10$3RlN5HbpAr0TyrdPiQhdNe5LdqgtMwEnaYHeGPLpSn..nv/SytqGG'),
(3, 'Lucia', 'Pavarotti', '393444723', 'Lucy1970', 'lucia00@gmail.com', '$2y$10$oTeqSK.wEFCNdeYmca6viupqDVd3jZ7KVwNDijx61m1DHEpyAgsV2'),
(4, 'Paolo', 'Cassano', '393123089', 'Pablo', 'paoluccio12@gmail.com', '$2y$10$OkSSnhLP/fY/lKttAOFd..lNjXK9wP6znFSa5MBdWlgUlQfqZbR9u'),
(5, 'Andrea', 'Rodriguez', '371012488', 'Mrandre', 'mitico@gmail.com', '$2y$10$EE4P1crMaJ.VVYy1o6Q/euDqyKqojJrMWsMQA5UW7GUhGHP1f71F.'),
(6, 'Elisa', 'Fiorini', '345893077', 'Eli_fio', 'fiorin@libero.it', '$2y$10$q0ymzEQzIGC0NFSSRYANX.3Xoyw35lLtowbfSQwZrnP0dBeJoelpu'),
(7, 'Simone', 'Tomaselli', '3650008121', 'Sim0ne', 'simbersek@gmail.com', '$2y$10$3KVQMn1LW5tqvu0eG3sf4ucwxosrPTm.ZshWgnUnkd0zEwZH7eHQu');

-- --------------------------------------------------------

--
-- Struttura della tabella `commenti`
--

CREATE TABLE `commenti` (
  `id` int(11) NOT NULL,
  `id_c` int(11) DEFAULT NULL,
  `commento` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `commenti`
--

INSERT INTO `commenti` (`id`, `id_c`, `commento`) VALUES
(1, 2, 'Ottime offerte da non perdere'),
(2, 4, 'Che dire sono ben 8 anni la uso e va tutto bene');

