-- phpMyAdmin SQL Dump
-- version 3.4.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 08 月 15 日 09:44
-- 服务器版本: 5.5.8
-- PHP 版本: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `merge`
--
CREATE DATABASE `merge` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `merge`;

-- --------------------------------------------------------

--
-- 表的结构 `video1`
--

CREATE TABLE IF NOT EXISTS `video1` (
  `id` smallint(5) unsigned NOT NULL,
  `vaname` varchar(50) DEFAULT NULL,
  `price` decimal(9,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `video2`
--

CREATE TABLE IF NOT EXISTS `video2` (
  `id` smallint(5) unsigned NOT NULL,
  `vname` varchar(50) DEFAULT NULL,
  `price` decimal(9,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `videoall`
--

CREATE TABLE IF NOT EXISTS `videoall` (
  `id` smallint(5) unsigned NOT NULL,
  `vname` varchar(50) DEFAULT NULL,
  `price` decimal(9,2) DEFAULT NULL
) ENGINE=MRG_MyISAM DEFAULT CHARSET=utf8 INSERT_METHOD=LAST UNION=(`video1`,`video2`);
--
-- 数据库: `partition`
--
CREATE DATABASE `partition` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `partition`;

DELIMITER $$
--
-- 存储过程
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `load_part_tab`()
begin
    declare v int default 0;
    while v < 8000000
    do
        insert into part_tab
        values (v,'testing partitions',adddate('1995-01-01',(rand(v)*36520) mod 3652));
         set v = v + 1;
    end while;
    end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `no_part_tab`
--

CREATE TABLE IF NOT EXISTS `no_part_tab` (
  `c1` int(11) DEFAULT NULL,
  `c2` varchar(30) DEFAULT NULL,
  `c3` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `part_tab`
--

CREATE TABLE IF NOT EXISTS `part_tab` (
  `c1` int(11) DEFAULT NULL,
  `c2` varchar(30) DEFAULT NULL,
  `c3` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8
/*!50100 PARTITION BY RANGE (year(c3))
(PARTITION p0 VALUES LESS THAN (1995) ENGINE = MyISAM,
 PARTITION p1 VALUES LESS THAN (1996) ENGINE = MyISAM,
 PARTITION p2 VALUES LESS THAN (1997) ENGINE = MyISAM,
 PARTITION p3 VALUES LESS THAN (1998) ENGINE = MyISAM,
 PARTITION p4 VALUES LESS THAN (1999) ENGINE = MyISAM,
 PARTITION p5 VALUES LESS THAN (2000) ENGINE = MyISAM,
 PARTITION p6 VALUES LESS THAN (2001) ENGINE = MyISAM,
 PARTITION p7 VALUES LESS THAN (2002) ENGINE = MyISAM,
 PARTITION p8 VALUES LESS THAN (2003) ENGINE = MyISAM,
 PARTITION p9 VALUES LESS THAN (2004) ENGINE = MyISAM,
 PARTITION p10 VALUES LESS THAN (2010) ENGINE = MyISAM,
 PARTITION p11 VALUES LESS THAN MAXVALUE ENGINE = MyISAM) */;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
