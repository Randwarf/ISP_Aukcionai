-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 08:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isp_aukcionai`
--

-- --------------------------------------------------------

--
-- Table structure for table `administratorius`
--

CREATE TABLE `administratorius` (
  `darbuotojo_ak` varchar(11) NOT NULL,
  `vardas` varchar(32) NOT NULL,
  `pavarde` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `telefono_nr` varchar(20) NOT NULL,
  `id_Administratorius` int(11) NOT NULL,
  `slaptazodis` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administratorius`
--

INSERT INTO `administratorius` (`darbuotojo_ak`, `vardas`, `pavarde`, `email`, `telefono_nr`, `id_Administratorius`, `slaptazodis`) VALUES
('37001011111', 'Vardaitis', 'Pavardaitis', 'varpav@ktu.lt', '+37061111111', 1, 'ABC123');

-- --------------------------------------------------------

--
-- Table structure for table `adresas`
--

CREATE TABLE `adresas` (
  `gatve` varchar(32) NOT NULL,
  `namo_nr` varchar(6) NOT NULL,
  `pasto_kodas` varchar(6) NOT NULL,
  `buto_nr` varchar(6) NOT NULL,
  `id_Adresas` int(11) NOT NULL,
  `fk_Miestasid_Miestas` int(11) NOT NULL,
  `fk_Vartotojasid_Vartotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adresas`
--

INSERT INTO `adresas` (`gatve`, `namo_nr`, `pasto_kodas`, `buto_nr`, `id_Adresas`, `fk_Miestasid_Miestas`, `fk_Vartotojasid_Vartotojas`) VALUES
('Tylos', '16', '38122', '', 1, 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `aukcionas`
--

CREATE TABLE `aukcionas` (
  `pradzia` datetime NOT NULL,
  `pabaiga` datetime NOT NULL,
  `min` float DEFAULT NULL,
  `max` float DEFAULT NULL,
  `galutine_kaina` float DEFAULT NULL,
  `statusas` int(11) NOT NULL,
  `id_Aukcionas` int(11) NOT NULL,
  `fk_Administratoriusid_Administratorius` int(11) DEFAULT NULL,
  `fk_Vartotojasid_Vartotojas` int(11) DEFAULT NULL,
  `fk_Prekeid_Preke` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aukcionas`
--

INSERT INTO `aukcionas` (`pradzia`, `pabaiga`, `min`, `max`, `galutine_kaina`, `statusas`, `id_Aukcionas`, `fk_Administratoriusid_Administratorius`, `fk_Vartotojasid_Vartotojas`, `fk_Prekeid_Preke`) VALUES
('2022-12-09 12:47:56', '2022-12-24 13:47:57', 10, 500, NULL, 4, 1, 1, NULL, 1),
('2022-12-09 14:18:00', '2022-12-09 14:18:00', 1000, 5000, NULL, 4, 3, 1, NULL, 3),
('2022-12-10 13:36:50', '2022-12-10 13:36:50', NULL, NULL, NULL, 1, 5, NULL, NULL, 2),
('2022-12-14 19:21:45', '2022-12-14 19:21:45', 10, 100, NULL, 4, 6, 1, NULL, 4),
('2022-12-14 19:57:02', '2022-12-14 19:57:02', 50, 500, NULL, 4, 7, 1, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `blokuotas_vartotojas`
--

CREATE TABLE `blokuotas_vartotojas` (
  `laiko_zyme` datetime NOT NULL DEFAULT current_timestamp(),
  `komentaras` varchar(255) NOT NULL,
  `id_Blokuotas_vartotojas` int(11) NOT NULL,
  `fk_Administratoriusid_Administratorius` int(11) NOT NULL,
  `fk_Vartotojasid_Vartotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blokuotas_vartotojas`
--

INSERT INTO `blokuotas_vartotojas` (`laiko_zyme`, `komentaras`, `id_Blokuotas_vartotojas`, `fk_Administratoriusid_Administratorius`, `fk_Vartotojasid_Vartotojas`) VALUES
('2022-12-09 14:07:25', 'Spamas', 1, 1, 2),
('2022-12-14 13:17:46', ' Spamuoja', 2, 1, 2),
('2022-12-14 15:18:28', ' Blokuoju', 3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `formatas`
--

CREATE TABLE `formatas` (
  `id_FORMATAS` int(11) NOT NULL,
  `name` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formatas`
--

INSERT INTO `formatas` (`id_FORMATAS`, `name`) VALUES
(1, '.png'),
(2, '.jpg'),
(3, '.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `id_KATEGORIJA` int(11) NOT NULL,
  `name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`id_KATEGORIJA`, `name`) VALUES
(1, 'Automobiliai'),
(2, 'Antikvaras'),
(3, 'Elektronika'),
(4, 'Baldai'),
(5, 'Kita'),
(6, 'Laisvalaikis');

-- --------------------------------------------------------

--
-- Table structure for table `komentaras`
--

CREATE TABLE `komentaras` (
  `tekstas` text DEFAULT NULL,
  `laiko_zyme` datetime NOT NULL DEFAULT current_timestamp(),
  `id_Komentaras` int(11) NOT NULL,
  `fk_Aukcionasid_Aukcionas` int(11) NOT NULL,
  `fk_Vartotojasid_Vartotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentaras`
--

INSERT INTO `komentaras` (`tekstas`, `laiko_zyme`, `id_Komentaras`, `fk_Aukcionasid_Aukcionas`, `fk_Vartotojasid_Vartotojas`) VALUES
('Aš dirbdamas iš namų į dieną uždirbu net 5000€!! Ar ir tu norėtum tiek uždirbti? Spausk -->> <a href=\"http://localhost/ISP_Aukcionai/PagrindinisPuslapis.php\"> ČIA </a> <<--', '2022-12-09 14:09:16', 1, 1, 2),
('Sveiki, testuoju komentarų sistemą.', '2022-12-10 00:30:08', 225, 1, 3),
('skelbiu komentara kaip prisijunges vartotojas', '2022-12-10 13:34:53', 230, 1, 2),
('Naujas komentaras by admin', '2022-12-14 19:31:50', 232, 1, 5),
('Dar vienas komentaras po truputį vėliau', '2022-12-14 19:33:53', 233, 1, 5),
('dar vienas komentaras, kad bučiau labiausiai aktyvus', '2022-12-14 19:56:21', 234, 1, 5),
('Ar buvote iškviete egzorcistą? bijau vaiduoklių.........', '2022-12-14 20:23:43', 235, 6, 3),
('Net nesijaudinkite, čia nieko nėra', '2022-12-14 20:27:07', 236, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `kortele`
--

CREATE TABLE `kortele` (
  `korteles_nr` varchar(16) NOT NULL,
  `galiojimo_menuo` varchar(2) NOT NULL,
  `galiojimo_metai` varchar(2) NOT NULL,
  `id_Kortele` int(11) NOT NULL,
  `fk_Vartotojasid_Vartotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kortele`
--

INSERT INTO `kortele` (`korteles_nr`, `galiojimo_menuo`, `galiojimo_metai`, `id_Kortele`, `fk_Vartotojasid_Vartotojas`) VALUES
('111111111111', '01', '24', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lytis`
--

CREATE TABLE `lytis` (
  `id_LYTIS` int(11) NOT NULL,
  `name` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lytis`
--

INSERT INTO `lytis` (`id_LYTIS`, `name`) VALUES
(1, 'vyras'),
(2, 'moteris'),
(3, 'kita');

-- --------------------------------------------------------

--
-- Table structure for table `miestas`
--

CREATE TABLE `miestas` (
  `Pavadinimas` varchar(64) NOT NULL,
  `id_Miestas` int(11) NOT NULL,
  `fk_Salisid_Salis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `miestas`
--

INSERT INTO `miestas` (`Pavadinimas`, `id_Miestas`, `fk_Salisid_Salis`) VALUES
('Vilnius', 15, 1),
('Kaunas', 16, 1),
('Panevėžys', 21, 1),
('Vyčiai', 22, 1),
('Ryga', 23, 2),
('Talinas', 24, 3);

-- --------------------------------------------------------

--
-- Table structure for table `nuotrauka`
--

CREATE TABLE `nuotrauka` (
  `pavadinimas` varchar(64) NOT NULL,
  `nuoroda` text NOT NULL,
  `formatas` int(11) NOT NULL,
  `id_Nuotrauka` int(11) NOT NULL,
  `fk_Prekeid_Preke` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nuotrauka`
--

INSERT INTO `nuotrauka` (`pavadinimas`, `nuoroda`, `formatas`, `id_Nuotrauka`, `fk_Prekeid_Preke`) VALUES
('laikrodis', 'foto/laikrodis.jpg', 2, 1, 1),
('corolla verso', 'foto/TOYOTA-Corolla-Verso-647_20.jpg', 2, 2, 3),
('zaislas', 'foto/zaislas.jpg', 2, 3, 2),
('laikrodis', 'foto/laikrodis2.jpg', 2, 4, 4),
('saldainiai', 'foto/saldainiai.jpg', 2, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `preke`
--

CREATE TABLE `preke` (
  `aprasymas` varchar(255) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  `pavadinimas` varchar(64) NOT NULL,
  `kategorija` int(11) NOT NULL,
  `id_Preke` int(11) NOT NULL,
  `fk_Vartotojasid_Vartotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preke`
--

INSERT INTO `preke` (`aprasymas`, `data`, `pavadinimas`, `kategorija`, `id_Preke`, `fk_Vartotojasid_Vartotojas`) VALUES
('Gražus antikvarinis laikrodis', '2022-12-09 13:42:36', 'Laikrodis', 2, 1, 1),
('Senovinis žaislas, XIXa., Anglija', '2022-12-09 13:42:47', 'Senovinis žaislas', 2, 2, 1),
('Tvarkinga, 2003m, 305k km rida, tepalai tik ką pakeisti', '2022-12-09 15:16:06', 'Toyota Corolla Verso', 1, 3, 1),
('Senovinis laikrodis, veikiantis. Vidurnakčiais skamba, trukdo miegoti, noriu greičiau atsikratyti', '2022-12-14 20:21:36', 'Senovinis laikrodis', 4, 4, 5),
('Firminiai mėlinieji saldainiai iš Albukerkio, Naujosios Meksikos', '2022-12-14 20:56:56', 'Saldainiai', 6, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `salis`
--

CREATE TABLE `salis` (
  `Pavadinimas` varchar(32) NOT NULL,
  `id_Salis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salis`
--

INSERT INTO `salis` (`Pavadinimas`, `id_Salis`) VALUES
('Lietuva', 1),
('Latvija', 2),
('Estija', 3);

-- --------------------------------------------------------

--
-- Table structure for table `statusas`
--

CREATE TABLE `statusas` (
  `id_STATUSAS` int(11) NOT NULL,
  `name` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statusas`
--

INSERT INTO `statusas` (`id_STATUSAS`, `name`) VALUES
(1, 'patvirtintas'),
(2, 'blokuotas'),
(3, 'nepatvirtintas'),
(4, 'Inicijuotas');

-- --------------------------------------------------------

--
-- Table structure for table `statymas`
--

CREATE TABLE `statymas` (
  `verte` decimal(10,2) NOT NULL,
  `laiko_zyme` datetime NOT NULL DEFAULT current_timestamp(),
  `id_Statymas` int(11) NOT NULL,
  `fk_Vartotojasid_Vartotojas` int(11) NOT NULL,
  `fk_Aukcionasid_Aukcionas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statymas`
--

INSERT INTO `statymas` (`verte`, `laiko_zyme`, `id_Statymas`, `fk_Vartotojasid_Vartotojas`, `fk_Aukcionasid_Aukcionas`) VALUES
('10.15', '2022-12-14 20:03:48', 1, 3, 1),
('12.00', '2022-12-14 20:04:01', 2, 1, 1),
('20.00', '2022-12-14 20:04:15', 3, 5, 1),
('25.00', '2022-12-14 20:17:04', 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stebi`
--

CREATE TABLE `stebi` (
  `fk_Aukcionasid_Aukcionas` int(11) NOT NULL,
  `fk_Vartotojasid_Vartotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transakcija`
--

CREATE TABLE `transakcija` (
  `pokytis` decimal(10,2) NOT NULL,
  `laiko_zyme` datetime NOT NULL DEFAULT current_timestamp(),
  `komentaras` text NOT NULL,
  `id_Transakcija` int(11) NOT NULL,
  `fk_Vartotojasid_Vartotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vartotojas`
--

CREATE TABLE `vartotojas` (
  `vardas` varchar(32) NOT NULL,
  `pavarde` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `telefono_nr` varchar(20) DEFAULT NULL,
  `slaptazodis` varchar(32) NOT NULL,
  `likutis` decimal(10,2) NOT NULL,
  `blokuotas` tinyint(1) NOT NULL,
  `lytis` int(11) DEFAULT NULL,
  `id_Vartotojas` int(11) NOT NULL,
  `fk_Administratorius` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vartotojas`
--

INSERT INTO `vartotojas` (`vardas`, `pavarde`, `email`, `telefono_nr`, `slaptazodis`, `likutis`, `blokuotas`, `lytis`, `id_Vartotojas`, `fk_Administratorius`) VALUES
('Matas', 'Vaitkevičius', 'matvai2@ktu.lt', '+37061719386', 'ABC123', '68.59', 0, 1, 1, NULL),
('Spamas', 'Spamaitis', 'spam@ktu.lt', NULL, 'ABC123', '0.00', 0, 1, 2, NULL),
('TESTAS', 'TESTUOTOJAS', 'test@ktu.lt', NULL, 'ABC123', '0.00', 0, 3, 3, NULL),
('', '', '', NULL, '', '0.00', 0, NULL, 4, NULL),
('Matas', 'Vait', 'matas.vaitkevicius@gmail.com', NULL, 'ABC', '0.00', 0, NULL, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `zinute`
--

CREATE TABLE `zinute` (
  `tekstas` varchar(512) NOT NULL,
  `laiko_zyme` datetime NOT NULL DEFAULT current_timestamp(),
  `id_Zinute` int(11) NOT NULL,
  `fk_Vartotojasid_Vartotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administratorius`
--
ALTER TABLE `administratorius`
  ADD PRIMARY KEY (`id_Administratorius`);

--
-- Indexes for table `adresas`
--
ALTER TABLE `adresas`
  ADD PRIMARY KEY (`id_Adresas`),
  ADD KEY `Mieste` (`fk_Miestasid_Miestas`),
  ADD KEY `Gyvena` (`fk_Vartotojasid_Vartotojas`);

--
-- Indexes for table `aukcionas`
--
ALTER TABLE `aukcionas`
  ADD PRIMARY KEY (`id_Aukcionas`),
  ADD KEY `statusas` (`statusas`),
  ADD KEY `Validuoja` (`fk_Administratoriusid_Administratorius`),
  ADD KEY `Laimi` (`fk_Vartotojasid_Vartotojas`),
  ADD KEY `Pardavimas` (`fk_Prekeid_Preke`);

--
-- Indexes for table `blokuotas_vartotojas`
--
ALTER TABLE `blokuotas_vartotojas`
  ADD PRIMARY KEY (`id_Blokuotas_vartotojas`),
  ADD KEY `Uzblokavo` (`fk_Administratoriusid_Administratorius`),
  ADD KEY `YraBlokuotas` (`fk_Vartotojasid_Vartotojas`);

--
-- Indexes for table `formatas`
--
ALTER TABLE `formatas`
  ADD PRIMARY KEY (`id_FORMATAS`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`id_KATEGORIJA`);

--
-- Indexes for table `komentaras`
--
ALTER TABLE `komentaras`
  ADD PRIMARY KEY (`id_Komentaras`),
  ADD KEY `Prekei` (`fk_Aukcionasid_Aukcionas`),
  ADD KEY `Raso` (`fk_Vartotojasid_Vartotojas`);

--
-- Indexes for table `kortele`
--
ALTER TABLE `kortele`
  ADD PRIMARY KEY (`id_Kortele`),
  ADD KEY `Turi` (`fk_Vartotojasid_Vartotojas`);

--
-- Indexes for table `lytis`
--
ALTER TABLE `lytis`
  ADD PRIMARY KEY (`id_LYTIS`);

--
-- Indexes for table `miestas`
--
ALTER TABLE `miestas`
  ADD PRIMARY KEY (`id_Miestas`),
  ADD KEY `fk_Salisid_Salis` (`fk_Salisid_Salis`);

--
-- Indexes for table `nuotrauka`
--
ALTER TABLE `nuotrauka`
  ADD PRIMARY KEY (`id_Nuotrauka`),
  ADD KEY `formatas` (`formatas`),
  ADD KEY `vaizduoja` (`fk_Prekeid_Preke`);

--
-- Indexes for table `preke`
--
ALTER TABLE `preke`
  ADD PRIMARY KEY (`id_Preke`),
  ADD KEY `kategorija` (`kategorija`),
  ADD KEY `Sukuria` (`fk_Vartotojasid_Vartotojas`);

--
-- Indexes for table `salis`
--
ALTER TABLE `salis`
  ADD PRIMARY KEY (`id_Salis`);

--
-- Indexes for table `statusas`
--
ALTER TABLE `statusas`
  ADD PRIMARY KEY (`id_STATUSAS`);

--
-- Indexes for table `statymas`
--
ALTER TABLE `statymas`
  ADD PRIMARY KEY (`id_Statymas`),
  ADD KEY `Pastato` (`fk_Vartotojasid_Vartotojas`),
  ADD KEY `Pastatytas` (`fk_Aukcionasid_Aukcionas`);

--
-- Indexes for table `stebi`
--
ALTER TABLE `stebi`
  ADD PRIMARY KEY (`fk_Aukcionasid_Aukcionas`,`fk_Vartotojasid_Vartotojas`),
  ADD KEY `Stebi2` (`fk_Vartotojasid_Vartotojas`);

--
-- Indexes for table `transakcija`
--
ALTER TABLE `transakcija`
  ADD PRIMARY KEY (`id_Transakcija`),
  ADD KEY `Atlieka` (`fk_Vartotojasid_Vartotojas`);

--
-- Indexes for table `vartotojas`
--
ALTER TABLE `vartotojas`
  ADD PRIMARY KEY (`id_Vartotojas`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `lytis` (`lytis`),
  ADD KEY `admin` (`fk_Administratorius`);

--
-- Indexes for table `zinute`
--
ALTER TABLE `zinute`
  ADD PRIMARY KEY (`id_Zinute`),
  ADD KEY `Gauna` (`fk_Vartotojasid_Vartotojas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administratorius`
--
ALTER TABLE `administratorius`
  MODIFY `id_Administratorius` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adresas`
--
ALTER TABLE `adresas`
  MODIFY `id_Adresas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aukcionas`
--
ALTER TABLE `aukcionas`
  MODIFY `id_Aukcionas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blokuotas_vartotojas`
--
ALTER TABLE `blokuotas_vartotojas`
  MODIFY `id_Blokuotas_vartotojas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komentaras`
--
ALTER TABLE `komentaras`
  MODIFY `id_Komentaras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `kortele`
--
ALTER TABLE `kortele`
  MODIFY `id_Kortele` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `miestas`
--
ALTER TABLE `miestas`
  MODIFY `id_Miestas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nuotrauka`
--
ALTER TABLE `nuotrauka`
  MODIFY `id_Nuotrauka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `preke`
--
ALTER TABLE `preke`
  MODIFY `id_Preke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salis`
--
ALTER TABLE `salis`
  MODIFY `id_Salis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statymas`
--
ALTER TABLE `statymas`
  MODIFY `id_Statymas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transakcija`
--
ALTER TABLE `transakcija`
  MODIFY `id_Transakcija` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vartotojas`
--
ALTER TABLE `vartotojas`
  MODIFY `id_Vartotojas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `zinute`
--
ALTER TABLE `zinute`
  MODIFY `id_Zinute` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adresas`
--
ALTER TABLE `adresas`
  ADD CONSTRAINT `Gyvena` FOREIGN KEY (`fk_Vartotojasid_Vartotojas`) REFERENCES `vartotojas` (`id_Vartotojas`),
  ADD CONSTRAINT `Mieste` FOREIGN KEY (`fk_Miestasid_Miestas`) REFERENCES `miestas` (`id_Miestas`);

--
-- Constraints for table `aukcionas`
--
ALTER TABLE `aukcionas`
  ADD CONSTRAINT `Laimi` FOREIGN KEY (`fk_Vartotojasid_Vartotojas`) REFERENCES `vartotojas` (`id_Vartotojas`),
  ADD CONSTRAINT `Pardavimas` FOREIGN KEY (`fk_Prekeid_Preke`) REFERENCES `preke` (`id_Preke`),
  ADD CONSTRAINT `Validuoja` FOREIGN KEY (`fk_Administratoriusid_Administratorius`) REFERENCES `administratorius` (`id_Administratorius`),
  ADD CONSTRAINT `aukcionas_ibfk_1` FOREIGN KEY (`statusas`) REFERENCES `statusas` (`id_STATUSAS`);

--
-- Constraints for table `blokuotas_vartotojas`
--
ALTER TABLE `blokuotas_vartotojas`
  ADD CONSTRAINT `Uzblokavo` FOREIGN KEY (`fk_Administratoriusid_Administratorius`) REFERENCES `administratorius` (`id_Administratorius`),
  ADD CONSTRAINT `YraBlokuotas` FOREIGN KEY (`fk_Vartotojasid_Vartotojas`) REFERENCES `vartotojas` (`id_Vartotojas`);

--
-- Constraints for table `komentaras`
--
ALTER TABLE `komentaras`
  ADD CONSTRAINT `Prekei` FOREIGN KEY (`fk_Aukcionasid_Aukcionas`) REFERENCES `aukcionas` (`id_Aukcionas`),
  ADD CONSTRAINT `Raso` FOREIGN KEY (`fk_Vartotojasid_Vartotojas`) REFERENCES `vartotojas` (`id_Vartotojas`);

--
-- Constraints for table `kortele`
--
ALTER TABLE `kortele`
  ADD CONSTRAINT `Turi` FOREIGN KEY (`fk_Vartotojasid_Vartotojas`) REFERENCES `vartotojas` (`id_Vartotojas`);

--
-- Constraints for table `miestas`
--
ALTER TABLE `miestas`
  ADD CONSTRAINT `miestas_ibfk_1` FOREIGN KEY (`fk_Salisid_Salis`) REFERENCES `salis` (`id_Salis`);

--
-- Constraints for table `nuotrauka`
--
ALTER TABLE `nuotrauka`
  ADD CONSTRAINT `nuotrauka_ibfk_1` FOREIGN KEY (`formatas`) REFERENCES `formatas` (`id_FORMATAS`),
  ADD CONSTRAINT `vaizduoja` FOREIGN KEY (`fk_Prekeid_Preke`) REFERENCES `preke` (`id_Preke`);

--
-- Constraints for table `preke`
--
ALTER TABLE `preke`
  ADD CONSTRAINT `Sukuria` FOREIGN KEY (`fk_Vartotojasid_Vartotojas`) REFERENCES `vartotojas` (`id_Vartotojas`),
  ADD CONSTRAINT `preke_ibfk_1` FOREIGN KEY (`kategorija`) REFERENCES `kategorija` (`id_KATEGORIJA`);

--
-- Constraints for table `statymas`
--
ALTER TABLE `statymas`
  ADD CONSTRAINT `Pastato` FOREIGN KEY (`fk_Vartotojasid_Vartotojas`) REFERENCES `vartotojas` (`id_Vartotojas`),
  ADD CONSTRAINT `Pastatytas` FOREIGN KEY (`fk_Aukcionasid_Aukcionas`) REFERENCES `aukcionas` (`id_Aukcionas`);

--
-- Constraints for table `stebi`
--
ALTER TABLE `stebi`
  ADD CONSTRAINT `Stebi` FOREIGN KEY (`fk_Aukcionasid_Aukcionas`) REFERENCES `aukcionas` (`id_Aukcionas`),
  ADD CONSTRAINT `Stebi2` FOREIGN KEY (`fk_Vartotojasid_Vartotojas`) REFERENCES `vartotojas` (`id_Vartotojas`);

--
-- Constraints for table `transakcija`
--
ALTER TABLE `transakcija`
  ADD CONSTRAINT `Atlieka` FOREIGN KEY (`fk_Vartotojasid_Vartotojas`) REFERENCES `vartotojas` (`id_Vartotojas`);

--
-- Constraints for table `vartotojas`
--
ALTER TABLE `vartotojas`
  ADD CONSTRAINT `admin` FOREIGN KEY (`fk_Administratorius`) REFERENCES `administratorius` (`id_Administratorius`),
  ADD CONSTRAINT `vartotojas_ibfk_1` FOREIGN KEY (`lytis`) REFERENCES `lytis` (`id_LYTIS`);

--
-- Constraints for table `zinute`
--
ALTER TABLE `zinute`
  ADD CONSTRAINT `Gauna` FOREIGN KEY (`fk_Vartotojasid_Vartotojas`) REFERENCES `vartotojas` (`id_Vartotojas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
