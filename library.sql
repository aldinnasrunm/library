-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jul 2023 pada 15.14
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` varchar(10) NOT NULL,
  `admin_name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`admin_id`, `admin_name`, `password`) VALUES
('1', 'Budi', 'adminpass1'),
('10', 'Rina', 'adminpass10'),
('11', 'Eka', 'adminpass11'),
('12', 'Wahyu', 'adminpass12'),
('13', 'Rahma', 'adminpass13'),
('14', 'Irfan', 'adminpass14'),
('15', 'Dina', 'adminpass15'),
('16', 'Yoga', 'adminpass16'),
('17', 'Sinta', 'adminpass17'),
('18', 'Herman', 'adminpass18'),
('19', 'Linda', 'adminpass19'),
('2', 'Siti', 'adminpass2'),
('20', 'Bayu', 'adminpass20'),
('21', 'Rita', 'adminpass21'),
('22', 'Fauzi', 'adminpass22'),
('23', 'Nina', 'adminpass23'),
('24', 'Rudi', 'adminpass24'),
('25', 'Dini', 'adminpass25'),
('3', 'Agus', 'adminpass3'),
('4', 'Rini', 'adminpass4'),
('5', 'Joko', 'adminpass5'),
('6', 'Dewi', 'adminpass6'),
('7', 'Hadi', 'adminpass7'),
('8', 'Lina', 'adminpass8'),
('9', 'Hendra', 'adminpass9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `book`
--

CREATE TABLE `book` (
  `book_id` varchar(10) NOT NULL,
  `book_title` varchar(45) DEFAULT NULL,
  `imageurl` varchar(255) DEFAULT NULL,
  `book_author` varchar(45) DEFAULT NULL,
  `stock` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `imageurl`, `book_author`, `stock`) VALUES
('1', 'Harry Potter and the Philosopher\'s Stone', 'Harry Potter and the Philosopher\'s Stone.png', 'J.K. Rowling', '5'),
('10', 'Moby-Dick', 'Moby-Dick.png', 'Herman Melville', '1'),
('11', 'The Hobbit', 'The Hobbit.png', 'J.R.R. Tolkien', '5'),
('12', 'The Great Expectations', 'The Great Expectations.png', 'Charles Dickens', '3'),
('13', 'The Da Vinci Code', 'The DA Vinci Code - Copy.png', 'Dan Brown', '8'),
('14', 'The Chronicles of Narnia', 'The Chronicles of Narnia - Copy.png', 'C.S. Lewis', '6'),
('15', 'The Picture of Dorian Gray', 'The Picture of Dorian Gray.png', 'Oscar Wilde', '10'),
('16', 'Alice in Wonderland', 'Alice in Wonderland.png', 'Lewis Carroll', '5'),
('2', 'To Kill a Mockingbird', 'To Kill a Mockingbird.png', 'Harper Lee', '3'),
('3', '1984', '1984.png', 'George Orwell', '8'),
('4', 'The Great Gatsby', 'The Great Gatsby - Copy.png', 'F. Scott Fitzgerald', '6'),
('5', 'Pride and Prejudice', 'Pride and Prejudice.png', 'Jane Austen', '4'),
('6', 'The Lord of the Rings', 'The Lord of the Rings.png', 'J.R.R. Tolkien', '10'),
('7', 'To the Lighthouse', 'To the Lighthouse.png', 'Virginia Woolf', '2'),
('8', 'Brave New World', 'Brave New World.png', 'Aldous Huxley', '7'),
('9', 'The Catcher in the Rye', 'The Lord of the Rings.png', 'J.D. Salinger', '9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lend`
--

CREATE TABLE `lend` (
  `lend_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `book_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lend`
--

INSERT INTO `lend` (`lend_id`, `date`, `user_id`, `book_id`) VALUES
(2, '2023-02-05', '2', '3'),
(3, '2023-03-10', '1', '2'),
(4, '2023-04-15', '3', '4'),
(5, '2023-05-20', '2', '5'),
(6, '2023-06-25', '3', '2'),
(7, '2023-07-30', '1', '3'),
(8, '2023-08-04', '2', '1'),
(9, '2023-09-09', '3', '5'),
(10, '2023-10-14', '1', '4'),
(11, '2023-11-19', '4', '6'),
(12, '2023-12-24', '5', '8'),
(13, '2024-01-29', '6', '7'),
(14, '2024-02-02', '7', '9'),
(15, '2024-03-08', '8', '10'),
(16, '2024-04-13', '9', '12'),
(26, '2023-07-08', '26', '11'),
(27, '2023-07-08', '34', '15'),
(28, '2023-07-08', '35', '14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `user_contact` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_contact`, `password`) VALUES
(1, 'Doe Budi', 'john.doe@example.com', 'password123'),
(2, 'Jane Smith', 'jane.smith@example.com', 'password456'),
(3, 'David Johnson', 'david.johnson@example.com', 'password789'),
(4, 'Sarah Williams', 'sarah.williams@example.com', 'passwordabc'),
(5, 'Michael Brown', 'michael.brown@example.com', 'passworddef'),
(6, 'Emily Davis', 'emily.davis@example.com', 'passwordghi'),
(7, 'Daniel Wilson', 'daniel.wilson@example.com', 'passwordjkl'),
(8, 'Olivia Anderson', 'olivia.anderson@example.com', 'passwordmno'),
(9, 'Matthew Taylor', 'matthew.taylor@example.com', 'passwordpqr'),
(10, 'Sophia Martinez', 'sophia.martinez@example.com', 'passwordstu'),
(11, 'Laura Davis', 'laura.davis@example.com', 'passwordvwx'),
(12, 'Ryan Johnson', 'ryan.johnson@example.com', 'passwordyz1'),
(13, 'Emma Wilson', 'emma.wilson@example.com', 'password234'),
(14, 'Christopher Brown', 'christopher.brown@example.com', 'password567'),
(15, 'Ava Martinez', 'ava.martinez@example.com', 'password890'),
(16, 'William Smith', 'william.smith@example.com', 'passwordabc2'),
(17, 'Olivia Anderson', 'olivia.anderson@example.com', 'passworddef3'),
(18, 'James Taylor', 'james.taylor@example.com', 'passwordghi4'),
(19, 'Isabella Johnson', 'isabella.johnson@example.com', 'passwordjkl5'),
(20, 'Sophia Davis', 'sophia.davis@example.com', 'passwordmno6'),
(21, 'Joseph Wilson', 'joseph.wilson@example.com', 'passwordpqr7'),
(22, 'Mia Smith', 'mia.smith@example.com', 'passwordstu8'),
(23, 'Alexander Anderson', 'alexander.anderson@example.com', 'passwordvwx9'),
(24, 'Emily Taylor', 'emily.taylor@example.com', 'passwordyz10'),
(25, 'Daniel Martinez', 'daniel.martinez@example.com', 'password12311'),
(26, 'aldin', 'hello@nasrun.com', '1234567'),
(27, 'adink', 'hello@adink.com', 'chocochip123'),
(28, 'beruang', 'hello@beruang.com', 'macan123'),
(29, 'macan', 'berunag@macan.com', 'beruang123'),
(30, 'cacing', 'cacing@tanah.com', 'tanah123'),
(31, 'test', 'test@gmai.com', 'test123'),
(32, 'kambing', 'kuda@kambing.com', 'kuda123'),
(33, 'siput', 'siput@tanah.com', 'tanah123'),
(34, 'krita', 'hello@krita.com', 'atlantic123'),
(35, 'aku', 'hello@aku.com', 'test1234');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indeks untuk tabel `lend`
--
ALTER TABLE `lend`
  ADD PRIMARY KEY (`lend_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lend`
--
ALTER TABLE `lend`
  MODIFY `lend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
