-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014-12-31 09:03:29
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
  `buyer` char(15) COLLATE utf8mb4_bin NOT NULL,
  `state` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `super_cashlogs`
--

INSERT INTO `super_cashlogs` (`id`, `logs_number`, `user_name`, `user_where`, `time`, `itotal`, `mtotal`, `money`, `buyer`, `state`) VALUES
(1, '1005201412210001', '员工A', '北京店', 1419146025, 1301, 1301, 1310, 'tianwei', 0),
(2, '1005201412210002', '员工A', '北京店', 1419146052, 1501, 1501, 1510, 'tianwei', 0),
(3, 'TH1005201412210001', 'superadmin', '北京店', 1419146092, -1301, -1301, -1301, 'tianwei', 2),
(4, 'TH1005201412210002', 'superadmin', '北京店', 1419146519, -1501, -1501, -1501, 'tianwei', 3),
(5, '1005201412210003', '员工A', '北京店', 1419147171, 1501, 1501, 1501, 'tianwei', 0),
(6, 'TH1005201412210003', 'superadmin', '北京店', 1419147194, -1301, -1301, -1301, 'tianwei', 2),
(7, '2000201412210004', '员工A', '上海店', 1419147491, 1201, 1201, 1201, 'tianwei', 0),
(8, 'TH2000201412210004', 'superadmin', '上海店', 1419147545, -100, -100, 0, 'tianwei', 2),
(9, '1005201412220001', '员工A', '北京店', 1419234236, 1101, 1101, 1101, 'tianwei', 0),
(10, '1005201412310001', '员工A', '北京店', 1420011587, 500, 500, 500, 'tianwei', 0),
(13, 'TH1005201412310001', 'superadmin', '北京店', 1420012610, -500, -500, 0, 'tianwei', 3);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=40 ;

--
-- 转存表中的数据 `super_cashlogs_goods`
--

INSERT INTO `super_cashlogs_goods` (`id`, `cid`, `logs_number`, `goods_number`, `goods_name`, `goods_money`, `goods_int`, `goods_num`, `user_name`, `user_where`, `buyer`, `time`) VALUES
(1, 1, '1005201412210001', '00001', '商品AAAA', 100, 100, 1, '员工A', '北京店', 'tianwei', 1419146025),
(2, 1, '1005201412210001', '00002', '商品B', 1001, 1001, 1, '员工A', '北京店', 'tianwei', 1419146025),
(3, 1, '1005201412210001', '00003', '商品C', 100, 100, 1, '员工A', '北京店', 'tianwei', 1419146025),
(4, 1, '1005201412210001', '00005', '商品E', 100, 100, 1, '员工A', '北京店', 'tianwei', 1419146025),
(5, 2, '1005201412210002', '00001', '商品AAAA', 100, 100, 1, '员工A', '北京店', 'tianwei', 1419146052),
(6, 2, '1005201412210002', '00002', '商品B', 1001, 1001, 1, '员工A', '北京店', 'tianwei', 1419146052),
(7, 2, '1005201412210002', '00003', '商品C', 100, 100, 1, '员工A', '北京店', 'tianwei', 1419146052),
(8, 2, '1005201412210002', '00004', '商品D', 100, 100, 1, '员工A', '北京店', 'tianwei', 1419146052),
(9, 2, '1005201412210002', '00005', '商品E', 100, 100, 1, '员工A', '北京店', 'tianwei', 1419146052),
(10, 2, '1005201412210002', '00006', '商品F', 100, 100, 1, '员工A', '北京店', 'tianwei', 1419146052),
(11, 3, 'TH1005201412210001', '00001', '商品AAAA', 100, 100, -1, 'superadmin', '北京店', 'tianwei', 1419146092),
(12, 3, 'TH1005201412210001', '00002', '商品B', 1001, 1001, -1, 'superadmin', '北京店', 'tianwei', 1419146096),
(13, 3, 'TH1005201412210001', '00003', '商品C', 100, 100, -1, 'superadmin', '北京店', 'tianwei', 1419146099),
(14, 3, 'TH1005201412210001', '00005', '商品E', 100, 100, -1, 'superadmin', '北京店', 'tianwei', 1419146102),
(15, 4, 'TH1005201412210002', '00001', '商品AAAA', 100, 100, -1, 'superadmin', '北京店', 'tianwei', 1419146519),
(16, 4, 'TH1005201412210002', '00002', '商品B', 1001, 1001, -1, 'superadmin', '北京店', 'tianwei', 1419146519),
(17, 4, 'TH1005201412210002', '00003', '商品C', 100, 100, -1, 'superadmin', '北京店', 'tianwei', 1419146519),
(18, 4, 'TH1005201412210002', '00004', '商品D', 100, 100, -1, 'superadmin', '北京店', 'tianwei', 1419146519),
(19, 4, 'TH1005201412210002', '00005', '商品E', 100, 100, -1, 'superadmin', '北京店', 'tianwei', 1419146519),
(20, 4, 'TH1005201412210002', '00006', '商品F', 100, 100, -1, 'superadmin', '北京店', 'tianwei', 1419146519),
(21, 5, '1005201412210003', '00001', '商品AAAA', 100, 100, 1, '员工A', '北京店', 'tianwei', 1419147171),
(22, 5, '1005201412210003', '00002', '商品B', 1001, 1001, 1, '员工A', '北京店', 'tianwei', 1419147171),
(23, 5, '1005201412210003', '00003', '商品C', 100, 100, 2, '员工A', '北京店', 'tianwei', 1419147171),
(24, 5, '1005201412210003', '00004', '商品D', 100, 100, 1, '员工A', '北京店', 'tianwei', 1419147171),
(25, 5, '1005201412210003', '00005', '商品E', 100, 100, 1, '员工A', '北京店', 'tianwei', 1419147171),
(26, 6, 'TH1005201412210003', '00001', '商品AAAA', 100, 100, -1, 'superadmin', '北京店', 'tianwei', 1419147194),
(27, 6, 'TH1005201412210003', '00002', '商品B', 1001, 1001, -1, 'superadmin', '北京店', 'tianwei', 1419147196),
(28, 6, 'TH1005201412210003', '00003', '商品C', 100, 100, -1, 'superadmin', '北京店', 'tianwei', 1419147200),
(29, 6, 'TH1005201412210003', '00004', '商品D', 100, 100, -1, 'superadmin', '北京店', 'tianwei', 1419147202),
(30, 7, '2000201412210004', '00001', '商品AAAA', 100, 100, 1, '员工A', '上海店', 'tianwei', 1419147491),
(31, 7, '2000201412210004', '00002', '商品B', 1001, 1001, 1, '员工A', '上海店', 'tianwei', 1419147491),
(32, 7, '2000201412210004', '00003', '商品C', 100, 100, 1, '员工A', '上海店', 'tianwei', 1419147491),
(33, 8, 'TH2000201412210004', '00001', '商品AAAA', 100, 100, -1, 'superadmin', '上海店', 'tianwei', 1419147545),
(34, 9, '1005201412220001', '00002', '商品B', 1001, 1001, 1, '员工A', '北京店', 'tianwei', 1419234237),
(35, 9, '1005201412220001', '00003', '商品C', 100, 100, 1, '员工A', '北京店', 'tianwei', 1419234237),
(36, 10, '1005201412310001', '55', '商品FFF', 100, 100, 5, '员工A', '北京店', 'tianwei', 1420011587),
(39, 13, 'TH1005201412310001', '55', '商品FFF', 100, 100, -5, 'superadmin', '北京店', 'tianwei', 1420012610);

-- --------------------------------------------------------

--
-- 表的结构 `super_goods`
--

CREATE TABLE IF NOT EXISTS `super_goods` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `goods_where` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `goods_number` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `goods_name` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `goods_money` int(11) NOT NULL,
  `goods_int` int(11) NOT NULL,
  `goods_stock` int(11) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=39 ;

--
-- 转存表中的数据 `super_goods`
--

INSERT INTO `super_goods` (`gid`, `goods_where`, `goods_number`, `goods_name`, `goods_money`, `goods_int`, `goods_stock`) VALUES
(6, '北京店', '00006', '商品F', 100, 100, 105),
(5, '', '00005', '商品E', 100, 100, 100),
(4, '', '00004', '商品D', 100, 100, 110),
(3, '', '00003', '商品C', 100, 100, 96),
(2, '', '00002', '商品B', 1001, 1001, 94),
(1, '', '00001', '商品AAAA', 100, 100, 111),
(15, '北京店', '00008', '商品8', 800, 50, 99),
(35, '重庆店', '00009', '商品A', 100, 100, 100),
(38, '武昌店', '55', '商品FFF', 100, 100, 100),
(37, '北京店', '55', '商品FFF', 100, 100, 110);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `super_user`
--

INSERT INTO `super_user` (`uid`, `user_name`, `password`, `tel`, `user_where`, `permission`) VALUES
(1, 'superadmin', 'ec8905987b99c70a577510deb2e4e66f', '15102754945', '', 9),
(3, '员工A', 'ec8905987b99c70a577510deb2e4e66f', '15102754945', '重庆店', 2),
(4, '员工B', 'ec8905987b99c70a577510deb2e4e66f', '15102754945', '', 0),
(5, '员工C', 'ec8905987b99c70a577510deb2e4e66f', '15102754945', '', 0),
(6, '员工D', 'ec8905987b99c70a577510deb2e4e66f', '15102754945', '', 0),
(7, '员工AA', 'ec8905987b99c70a577510deb2e4e66f', '15102754945', '武汉店', 0),
(8, '员工AAB', 'ec8905987b99c70a577510deb2e4e66f', '15102754945', '中山店', 1),
(9, '员工AAA', 'ec8905987b99c70a577510deb2e4e66f', '15102754945', '北京店', 2),
(10, '员工AAAA', 'ec8905987b99c70a577510deb2e4e66f', '15102754945', '上海店', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
