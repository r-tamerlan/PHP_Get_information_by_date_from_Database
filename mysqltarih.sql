-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 29 Haz 2019, 16:06:50
-- Sunucu sürümü: 5.7.23
-- PHP Sürümü: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `mysqltarih`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rapor`
--

DROP TABLE IF EXISTS `rapor`;
CREATE TABLE IF NOT EXISTS `rapor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urunad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `urunfiyat` float NOT NULL,
  `tarih` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `rapor`
--

INSERT INTO `rapor` (`id`, `urunad`, `urunfiyat`, `tarih`) VALUES
(1, 'Buzdolabı', 700, '2018-11-08'),
(2, 'Televizyon', 1500, '2018-11-07'),
(3, 'Telefon', 2500, '2018-11-01'),
(4, 'Bilgisayar', 100, '2018-10-18'),
(5, 'Kulaklık', 250, '2018-10-01'),
(6, 'Saat', 600, '2018-10-27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
