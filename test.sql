-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.16 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица test.attributes
CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test.attributes: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `attributes` DISABLE KEYS */;
INSERT INTO `attributes` (`id`, `title`) VALUES
	(1, '42'),
	(2, '43'),
	(3, '44'),
	(4, '39'),
	(5, '36');
/*!40000 ALTER TABLE `attributes` ENABLE KEYS */;

-- Дамп структуры для таблица test.goods
CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `color` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test.goods: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` (`id`, `title`, `price`, `color`, `code`, `created_at`, `updated_at`) VALUES
	(1, 'мокасины', 1000, 'белый', '10010', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'ботфорды', 1000, 'черный', '20010', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'въетнамки', 1100, 'зеленый', '30010', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 'угги', 500, 'красный', '50010', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 'туфли ', 500, 'белый', '60010', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(11, 'кроссовки', 400, 'белый', '11010', '2018-01-16 19:10:05', '2018-01-16 19:10:05'),
	(12, 'мокасины', 1000, 'черный', '10010', '2018-01-17 12:19:18', '2018-01-17 12:19:18');
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;

-- Дамп структуры для таблица test.goods_attribute
CREATE TABLE IF NOT EXISTS `goods_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `good_id` int(11) NOT NULL DEFAULT '0',
  `attribute_id` int(11) NOT NULL DEFAULT '0',
  `sku` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_goods_attribute_goods` (`good_id`),
  KEY `FK_goods_attribute_attribute` (`attribute_id`),
  CONSTRAINT `FK_goods_attribute_attribute` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`),
  CONSTRAINT `FK_goods_attribute_goods` FOREIGN KEY (`good_id`) REFERENCES `goods` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test.goods_attribute: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `goods_attribute` DISABLE KEYS */;
INSERT INTO `goods_attribute` (`id`, `good_id`, `attribute_id`, `sku`) VALUES
	(1, 1, 5, 121123),
	(2, 1, 4, 123321),
	(3, 1, 1, 123123),
	(4, 2, 1, 211332),
	(5, 3, 4, 321332),
	(6, 3, 3, 321123),
	(8, 5, 5, 512321),
	(9, 6, 4, 652321),
	(13, 11, 2, 732132),
	(14, 12, 3, 122322);
/*!40000 ALTER TABLE `goods_attribute` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
