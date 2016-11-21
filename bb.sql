-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6
-- 
-- ิิิิww
-- 

SET FOREIGN_KEY_CHECKS=0;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

SET AUTOCOMMIT=0;
START TRANSACTION;

-- 
-- ฐานข้อมูล: `bee`
-- 
CREATE DATABASE `bee` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bee`;

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `room1`
-- 
-- สร้างเมื่อ: 
-- ปรับปรุงครั้งสุดท้ายเมื่อ: 
-- 

DROP TABLE IF EXISTS `room1`;
CREATE TABLE IF NOT EXISTS `room1` (
  `id` int(3) NOT NULL,
  `curdate` date NOT NULL,
  `curtime` time NOT NULL,
  `status` decimal(10,1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `room1`
-- 

INSERT INTO `room1` (`id`, `curdate`, `curtime`, `status`) VALUES 
(1, '2016-11-13', '14:14:59', 30.6),
(1, '2016-11-13', '12:02:23', 27.5),
(1, '2016-11-11', '11:17:46', 29.0),
(1, '2016-11-11', '11:02:44', 29.0),
(1, '2016-11-11', '09:55:09', 28.3);

SET FOREIGN_KEY_CHECKS=1;

COMMIT;
