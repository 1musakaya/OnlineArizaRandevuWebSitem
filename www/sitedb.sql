-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 19 Haz 2019, 11:26:24
-- Sunucu sürümü: 5.7.19
-- PHP Sürümü: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sitedb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel`
--

DROP TABLE IF EXISTS `personel`;
CREATE TABLE IF NOT EXISTS `personel` (
  `personel_id` int(11) NOT NULL AUTO_INCREMENT,
  `personel_adsoyad` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `personel_posta` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `personel_tel` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `personel_is_bolumu` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `personel_durum` int(2) NOT NULL,
  PRIMARY KEY (`personel_id`),
  UNIQUE KEY `personel_posta` (`personel_posta`),
  UNIQUE KEY `personel_tel` (`personel_tel`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `personel`
--

INSERT INTO `personel` (`personel_id`, `personel_adsoyad`, `personel_posta`, `personel_tel`, `personel_is_bolumu`, `personel_durum`) VALUES
(3, 'musa kaya', 'musa.kya723@gmail.com', '05331387210', 'Sistem', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevular`
--

DROP TABLE IF EXISTS `randevular`;
CREATE TABLE IF NOT EXISTS `randevular` (
  `randevu_id` int(11) NOT NULL AUTO_INCREMENT,
  `randevu_ad` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `randevu_soyad` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `randevu_posta` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `randevu_neden` text COLLATE utf8_turkish_ci NOT NULL,
  `randevu_adres` text COLLATE utf8_turkish_ci NOT NULL,
  `randevu_tarih` date NOT NULL,
  `randevu_saat` time NOT NULL,
  PRIMARY KEY (`randevu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `randevular`
--

INSERT INTO `randevular` (`randevu_id`, `randevu_ad`, `randevu_soyad`, `randevu_posta`, `randevu_neden`, `randevu_adres`, `randevu_tarih`, `randevu_saat`) VALUES
(23, 'hakan', 'gür', 'hakangr@gmail.com', 'kurulum işlemi var', 'yakutiye erzurum', '2019-05-15', '20:00:00'),
(22, 'musa', 'kaya', 'kyaa.musa@gmail.com', 'sinyal kesintisi', 'lalapaşa mah erzurum', '2019-05-15', '18:00:00'),
(21, 'musa', 'kaya', 'musa.kya723@gmail.com', 'ekran kırıldı', 'ankara', '2019-05-08', '18:00:00'),
(20, 'musa', 'kaya', 'musa.kya723@gmail.com', 'sinyal kesintisi', 'yakutiye erzurum', '2019-05-08', '12:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevusaatleri`
--

DROP TABLE IF EXISTS `randevusaatleri`;
CREATE TABLE IF NOT EXISTS `randevusaatleri` (
  `saatID` int(11) NOT NULL AUTO_INCREMENT,
  `saat` time NOT NULL,
  PRIMARY KEY (`saatID`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `randevusaatleri`
--

INSERT INTO `randevusaatleri` (`saatID`, `saat`) VALUES
(1, '09:00:00'),
(2, '10:00:00'),
(3, '11:00:00'),
(4, '12:00:00'),
(5, '13:00:00'),
(6, '14:00:00'),
(7, '15:00:00'),
(8, '16:00:00'),
(9, '17:00:00'),
(10, '18:00:00'),
(11, '19:00:00'),
(12, '20:00:00'),
(13, '21:00:00'),
(14, '22:00:00'),
(28, '21:00:00'),
(29, '22:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE IF NOT EXISTS `uyeler` (
  `uye_id` int(11) NOT NULL AUTO_INCREMENT,
  `uye_ad` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `uye_soyad` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `uye_kadi` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `uye_sifre` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `uye_posta` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`uye_id`),
  UNIQUE KEY `uye_kadi` (`uye_kadi`),
  UNIQUE KEY `uye_posta` (`uye_posta`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `uye_ad`, `uye_soyad`, `uye_kadi`, `uye_sifre`, `uye_posta`) VALUES
(1, 'musa', 'kaya', 'kayamusa', 'Mk.1239+', 'musa.kya723@gmail.com'),
(5, 'hakan', 'gür', 'hakangr', '12345', 'hakangr84@gmail.com'),
(10, 'ömer', 'er', 'erömer', '12345', 'omer@gmail.com'),
(16, 'elif', 'kaya', 'lfky', '123456', 'lfky@gmail.com'),
(14, 'engin', 'doğan', 'ngin', '123456', 'engindogan@gmail.com'),
(15, 'mehmet', 'gökdeniz', 'gkdnz', 'memet', 'memtgkdnz@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
