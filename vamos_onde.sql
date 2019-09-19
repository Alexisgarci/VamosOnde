-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Maio-2019 às 23:57
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vamos_onde`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorites`
--

CREATE TABLE `favorites` (
  `user_id` int(11) NOT NULL,
  `local_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `favorites`
--

INSERT INTO `favorites` (`user_id`, `local_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `locals`
--

CREATE TABLE `locals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gallery` varchar(255) NOT NULL,
  `opening` varchar(255) NOT NULL,
  `closing` varchar(255) NOT NULL,
  `ranking` decimal(2,1) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `trending` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `locals`
--

INSERT INTO `locals` (`id`, `name`, `adress`, `category_id`, `type`, `image`, `gallery`, `opening`, `closing`, `ranking`, `active`, `trending`) VALUES
(1, 'Lux Fragil', 'Sta Apolónia, Lisboa', '1,2,15', 'discoteca, bar', 'lux.jpg', '1.jpg, 2.jpg, 3.jpg, 4.jpg', '23:00', '8:00', '4.7', 1, 1),
(2, 'MusicBox', 'Cais do Sodré, Lisboa', '2,7,14,15', 'discoteca', 'musicbox.jpg', '1.jpg, 2.jpg, 3.jpg, 4.jpg', '22:00', '6:00', '4.2', 1, 1),
(3, 'Ministerium Club', 'Terreiro do Paço, Lisboa', '1,2,15', 'discoteca', 'ministerium.jpg', '1.jpg, 2.jpg, 3.jpg, 4.jpg', '23:00', '6:00', '4.0', 1, 1),
(4, 'Urban Beach', 'Av. Brasília, 1200-109 Lisboa', '4,8,12', 'discoteca', 'urban.jpg', '1.jpg, 2.jpg, 3.jpg, 4.jpg', '22:00', '6:00', '2.2', 1, 0),
(5, 'Bosq', 'R. Rodrigues de Faria 103, Lisboa', '2,4,7,8,10', 'Discoteca', 'bosq.jpg', '1.jpg, 2.jpg, 3.jpg, 4.jpg', '00:00', '06:00', '4.8', 1, 0),
(6, 'Radio-Hotel', 'Travessa do Conde da Ponte 12, Lisboa', '2,4,8,10,15', 'Discoteca', 'hotelradio.jpg', '1.jpg, 2.jpg, 3.jpg, 4.jpg', '23:00', '07:00', '3.6', 1, 0),
(7, 'Roterdão Club', 'R. Nova do Carvalho 28, Lisboa', '6,,13', 'Bar', 'roterdao.jpg', '1.jpg, 2.jpg, 3.jpg, 4.jpg', '23:00', '04:00', '3.8', 1, 0),
(8, 'Bismark', 'R. Miguel bombarda 344, Lisboa', '2,4,7,8,,14', 'Discoteca', 'bismarq.jpg', '1.jpg, 2.jpg, 3.jpg, 4.jpg', '22:00', '01:00', '3.4', 1, 0),
(9, 'Discoteca Luanda', 'Travessa Teixeira Junior 6, Lisboa', '2', 'Discoteca', 'luanda.jpg', '1.jpg, 2.jpg, 3.jpg, 4.jpg', '23:00', '06:00', '3.3', 1, 0),
(10, 'Praia do Parque', 'Alameda Cardeal Cerejeira, Parque Eduardo VII, Lisboa', '2,8,9,10,14', 'Bar', 'praiadoparque.jpg', '1.jpg, 2.jpg, 3.jpg, 4.jpg', '12:00', '24:00', '4.2', 1, 0),
(11, 'Entretanto Rooftop Bar', 'Hotel do Chiado, Rua Nova do Almada 114, Lisboa', '2,4,8,10,14,15', 'Bar', 'entretanto.jpg', '1.jpg, 2.jpg, 3.jpg, 4.jpg', '11:00', '24:00', '4.3', 1, 0),
(12, 'Plateau', 'Escadinhas da Praia, Lisboa', '2,4,10,12,13,14,15', 'Discoteca', 'plateau.jpg', '1.jpg, 2.jpg, 3.jpg, 4.jpg', '24:00', '06:00', '4.0', 1, 0),
(13, 'Studio 44', 'Avenida Dom Carlos I 44A, Lisboa', '4,7,8,10,12,15', 'Bar', 'studio44.jpg', '1.jpg, 2.jpg, 3.jpg, 4.jpg', '23:00', '04:00', '3.9', 1, 0),
(14, 'Viking', 'Rua Nova do Carvalho 1-7, Lisboa ', '13,14', 'Bar', 'viking.jpg', '1.jpg, 2.jpg, 3.jpg, 4.jpg', '23:00', '06:00', '3.9', 1, 0),
(15, 'Lust in Rio', 'Rua Cintura do Porto de Lisboa Armazém 255, Lisboa', '4,7,8,11,12,15', 'Discoteca', 'lustinrio.jpg', '1.jpg, 2.jpg, 3.jpg, 4.jpg', '24:00', '06:00', '3.7', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `local_partys`
--

CREATE TABLE `local_partys` (
  `total_partys` int(111) NOT NULL,
  `local_id` int(111) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ranking` decimal(2,1) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `partys_id` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `local_partys`
--

INSERT INTO `local_partys` (`total_partys`, `local_id`, `title`, `text`, `image`, `start_date`, `end_date`, `ranking`, `active`, `partys_id`) VALUES
(1, 1, 'ALOHA Party', 'Festa tematica com o tema do Hawai.', 'urban3.jpg', '2019-05-14 22:00:00', '2019-05-09 05:00:00', '4.4', 1, 0),
(2, 1, 'Testar', 'Isto é um teste', 'urban3.jpg', '2019-06-14 22:00:00', '2019-06-15 05:00:00', '4.3', 1, 0),
(5, 1, 'ola', 'batatas', 'urban3.jpg', '2019-04-28 01:43:38', '2019-04-17 05:00:00', '0.0', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `music_type`
--

CREATE TABLE `music_type` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `music_type_icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `music_type`
--

INSERT INTO `music_type` (`id`, `category`, `music_type_icon`) VALUES
(1, 'Alternativo', 'electricguitar.svg'),
(2, 'Eletrônica', 'tablemix.svg'),
(3, 'Fado', 'guitar.svg'),
(4, 'Funk', 'vuvuzela.svg'),
(5, 'Hardcore', 'hand.svg'),
(6, 'Heavy Metal', 'heavymetal.svg'),
(7, 'Hip Hop/Rap', 'dj.svg'),
(8, 'House', 'tablemix.svg'),
(9, 'Instrumental', 'dj.svg'),
(10, 'Pop', 'pop.svg'),
(11, 'Reggae', 'reggae.svg'),
(12, 'Reggaeton', 'maracas.svg'),
(13, 'Rock', 'hand.svg'),
(14, 'Musica ao vivo', 'karaoke.svg'),
(15, 'Techno', 'dj.svg'),
(16, 'Trance', 'tablemix.svg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ranking`
--

CREATE TABLE `ranking` (
  `user_id` int(111) NOT NULL,
  `local_id` int(111) NOT NULL,
  `ranking_given` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ranking`
--

INSERT INTO `ranking` (`user_id`, `local_id`, `ranking_given`) VALUES
(1, 2, 5),
(1, 1, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `permissions` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `v_code` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `image`, `permissions`, `created`, `v_code`, `active`) VALUES
(1, 'user', '$2y$10$kkf5AwrrRDVDpNyFEXnz4etbvu7zKNdV7Xi8rKxPrSSH6YbB0v7Hq', 'user@user.com', 'john.jpg', 1, '0000-00-00 00:00:00', '12345', 1),
(2, 'local', '$2y$10$99MKYB62ySUPfATdxvMKWuJJkIj.Z7JAvPUXJ3DvSZlakBn/7f5v6', 'local@user.com', '123.jpg', 2, '0000-00-00 00:00:00', '12345', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `visited`
--

CREATE TABLE `visited` (
  `user_id` int(11) NOT NULL,
  `local_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locals`
--
ALTER TABLE `locals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `local_partys`
--
ALTER TABLE `local_partys`
  ADD PRIMARY KEY (`total_partys`);

--
-- Indexes for table `music_type`
--
ALTER TABLE `music_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locals`
--
ALTER TABLE `locals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `local_partys`
--
ALTER TABLE `local_partys`
  MODIFY `total_partys` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `music_type`
--
ALTER TABLE `music_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
