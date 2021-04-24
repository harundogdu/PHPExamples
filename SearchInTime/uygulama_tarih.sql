-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Haz 2020, 22:05:54
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `uygulama_tarih`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tarih`
--

CREATE TABLE `tarih` (
  `id` int(11) NOT NULL,
  `urun_ad` varchar(75) COLLATE utf8_turkish_ci NOT NULL,
  `urun_fiyat` int(11) NOT NULL,
  `tarih` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tarih`
--

INSERT INTO `tarih` (`id`, `urun_ad`, `urun_fiyat`, `tarih`) VALUES
(1, 'Buzdolabı', 750, '2020-06-14'),
(2, 'Televizyon', 850, '2020-06-07'),
(3, 'Bilgisayar', 1050, '2020-05-27'),
(4, 'Laptop', 2500, '2020-06-09'),
(5, 'Uydu', 150, '2020-06-01'),
(6, 'Monitör', 450, '2020-04-16'),
(7, 'Araba', 1500, '2020-06-13'),
(8, 'Ayakkabı', 350, '2020-06-13');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tarih`
--
ALTER TABLE `tarih`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tarih`
--
ALTER TABLE `tarih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
