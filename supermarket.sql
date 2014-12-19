-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014-12-19 10:19:06
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `supermarket`
--

-- --------------------------------------------------------

--
-- 表的结构 `super_cash`
--

CREATE TABLE IF NOT EXISTS `super_cash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cash_num` char(20) COLLATE utf8mb4_bin NOT NULL,
  `goods_name` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `goods_money` int(11) NOT NULL,
  `goods_int` int(11) NOT NULL,
  `goods_num` int(11) NOT NULL,
  `goods_number` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `super_cashlogs`
--

CREATE TABLE IF NOT EXISTS `super_cashlogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logs_number` varchar(80) COLLATE utf8mb4_bin NOT NULL,
  `user_name` char(15) COLLATE utf8mb4_bin NOT NULL,
  `user_where` char(30) COLLATE utf8mb4_bin NOT NULL,
  `time` int(10) NOT NULL,
  `itotal` int(10) NOT NULL,
  `mtotal` int(10) NOT NULL,
  `money` int(10) NOT NULL,
  `zmoney` int(10) NOT NULL,
  `buyer` char(15) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `super_cashlogs`
--

INSERT INTO `super_cashlogs` (`id`, `logs_number`, `user_name`, `user_where`, `time`, `itotal`, `mtotal`, `money`, `zmoney`, `buyer`) VALUES
(6, '2004201412150003', '员工A', '中山店', 1418613274, 100, 100, 100, 0, 'tianwei'),
(5, '2004201412150002', '员工A', '中山店', 1418613162, 100, 100, 100, 0, 'tianwei'),
(4, '2004201412150001', '员工A', '中山店', 1418611910, 200, 200, 200, 0, 'tianwei'),
(7, '1006201412190001', '员工A', '重庆店', 1418958980, 100, 100, 100, 0, 'tianwei');

-- --------------------------------------------------------

--
-- 表的结构 `super_cashlogs_goods`
--

CREATE TABLE IF NOT EXISTS `super_cashlogs_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `logs_number` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `goods_number` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `goods_name` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `goods_money` int(11) NOT NULL,
  `goods_int` int(11) NOT NULL,
  `goods_num` int(11) NOT NULL,
  `user_name` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `user_where` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `buyer` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `super_cashlogs_goods`
--

INSERT INTO `super_cashlogs_goods` (`id`, `cid`, `logs_number`, `goods_number`, `goods_name`, `goods_money`, `goods_int`, `goods_num`, `user_name`, `user_where`, `buyer`, `time`) VALUES
(5, 4, '2004201412150001', '00003', '商品C', 100, 100, 1, '员工A', '中山店', 'tianwei', 1418611910),
(4, 4, '2004201412150001', '00001', '商品AAAA', 100, 100, 1, '员工A', '中山店', 'tianwei', 1418611910),
(6, 5, '2004201412150002', '00001', '商品AAAA', 100, 100, 1, '员工A', '中山店', 'tianwei', 1418613162),
(7, 6, '2004201412150003', '00001', '商品AAAA', 100, 100, 1, '员工A', '中山店', 'tianwei', 1418613274),
(8, 7, '1006201412190001', '00001', '商品AAAA', 100, 100, 1, '员工A', '重庆店', 'tianwei', 1418958980);

-- --------------------------------------------------------

--
-- 表的结构 `super_goods`
--

CREATE TABLE IF NOT EXISTS `super_goods` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `goods_number` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `goods_name` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `goods_money` int(11) NOT NULL,
  `goods_int` int(11) NOT NULL,
  `goods_stock` int(11) NOT NULL,
  PRIMARY KEY (`gid`),
  UNIQUE KEY `goods_number` (`goods_number`),
  KEY `goods_number_2` (`goods_number`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `super_goods`
--

INSERT INTO `super_goods` (`gid`, `goods_number`, `goods_name`, `goods_money`, `goods_int`, `goods_stock`) VALUES
(6, '00006', '商品F', 100, 100, 100),
(5, '00005', '商品E', 100, 100, 100),
(4, '00004', '商品D', 100, 100, 100),
(3, '00003', '商品C', 100, 100, 99),
(2, '00002', '商品B', 1001, 1001, 100),
(1, '00001', '商品AAAA', 100, 100, 44),
(15, '00008', '商品8', 800, 50, 99),
(34, '00009', '商品8', 123, 123, 123);

-- --------------------------------------------------------

--
-- 表的结构 `super_shops`
--

CREATE TABLE IF NOT EXISTS `super_shops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` char(20) COLLATE utf8mb4_bin NOT NULL,
  `shop_num` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `shop_address` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `shop_user` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shop_name` (`shop_name`),
  UNIQUE KEY `shop_num` (`shop_num`),
  KEY `shop_name_2` (`shop_name`),
  KEY `shop_num_2` (`shop_num`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `super_shops`
--

INSERT INTO `super_shops` (`id`, `shop_name`, `shop_num`, `shop_address`, `shop_user`) VALUES
(5, '武昌店', '1002', '武汉', 'tianwei'),
(7, '上海店', '2000', '上海', 'seller'),
(8, '北京店', '1005', '北京', 'tianwei'),
(9, '重庆店', '1006', '重庆', 'seller');

-- --------------------------------------------------------

--
-- 表的结构 `super_user`
--

CREATE TABLE IF NOT EXISTS `super_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` char(15) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `tel` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  `user_where` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `permission` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `user_name_2` (`user_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `super_user`
--

INSERT INTO `super_user` (`uid`, `user_name`, `password`, `tel`, `user_where`, `permission`) VALUES
(1, 'superadmin', 'ec8905987b99c70a577510deb2e4e66f', '15102754945', '', 9),
(3, '员工A', 'ec8905987b99c70a577510deb2e4e66f', '15102754945', '中山店', 0),
(4, '员工B', 'ec8905987b99c70a577510deb2e4e66f', '15102754945', '', 0),
(5, '员工C', 'ec8905987b99c70a577510deb2e4e66f', '15102754945', '', 0),
(6, '员工D', 'ec8905987b99c70a577510deb2e4e66f', '15102754945', '', 0),
(7, '员工AA', 'ec8905987b99c70a577510deb2e4e66f', '15102754945', '武汉店', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
