-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2014 at 05:08 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ka_reservation`
--
CREATE DATABASE IF NOT EXISTS `ka_reservation` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ka_reservation`;

-- --------------------------------------------------------

--
-- Table structure for table `cms_group_user`
--

CREATE TABLE IF NOT EXISTS `cms_group_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` set('0','1') NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cms_group_user`
--

INSERT INTO `cms_group_user` (`id`, `group_name`, `description`, `status`, `created`, `updated`, `created_by`, `updated_by`) VALUES
(1, 'super admin', 'Owner sistem', '1', '2014-01-28 14:29:13', '2014-02-08 08:47:43', 'Dela', 'admin'),
(2, 'administrator', 'Administrator aplikasi', '1', '2014-01-28 14:31:36', '2014-02-08 08:48:03', 'Dela', 'admin'),
(3, 'user', 'Pengguna Aplikasi', '1', '2014-01-29 15:23:07', '2014-02-08 08:48:20', 'tes3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE IF NOT EXISTS `cms_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` set('0','1') NOT NULL DEFAULT '0',
  `subscribe` enum('y','n') NOT NULL DEFAULT 'n',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`id`, `nama`, `username`, `password`, `group_id`, `email`, `status`, `subscribe`, `created`, `updated`, `created_by`, `updated_by`) VALUES
(11, 'dzikri robbi', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'admin@admin.com', '1', 'n', '2014-01-28 15:53:19', '2014-02-08 10:19:35', 'Dela', 'admin'),
(15, 'kris', 'member', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 'member@gmail.com', '1', 'n', '2014-02-08 07:55:04', '2014-02-08 10:20:06', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ka_kelas_kereta`
--

CREATE TABLE IF NOT EXISTS `ka_kelas_kereta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kelas_kereta` varchar(100) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ka_kelas_kereta`
--

INSERT INTO `ka_kelas_kereta` (`id`, `kode_kelas_kereta`, `nama_kelas`, `keterangan`, `created`, `updated`, `created_by`, `updated_by`) VALUES
(1, 'Eks', 'Eksekutif', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', '2014-02-08 11:27:48', '2014-02-19 17:01:09', 'admin', 'admin'),
(2, 'Bis', 'Bisnis', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', '2014-02-08 11:35:11', '2014-02-19 17:01:26', 'admin', 'admin'),
(3, 'Eko', 'Ekonomi', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', '2014-02-08 11:35:17', '2014-02-19 17:01:34', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ka_kereta`
--

CREATE TABLE IF NOT EXISTS `ka_kereta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kereta` varchar(100) NOT NULL,
  `nama_kereta` varchar(200) NOT NULL,
  `kelas_kereta` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ka_kereta`
--

INSERT INTO `ka_kereta` (`id`, `kode_kereta`, `nama_kereta`, `kelas_kereta`, `status`, `created`, `updated`, `created_by`, `updated_by`) VALUES
(3, 'AB001', 'Argobromo', 'Eksekutif, Bisnis', '1', '2014-02-08 11:52:36', '2014-02-08 22:22:03', 'admin', 'admin'),
(4, 'AB002', 'Argolawu', 'Eksekutif', '1', '2014-02-08 21:10:29', '2014-02-08 22:22:11', 'admin', 'admin'),
(5, 'AB003', 'Fajar Utama', 'Bisnis, Ekonomi', '1', '2014-02-08 21:13:20', '2014-02-08 22:22:26', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ka_pejabat`
--

CREATE TABLE IF NOT EXISTS `ka_pejabat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nnip` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ka_pejabat`
--

INSERT INTO `ka_pejabat` (`id`, `nnip`, `nama`, `jabatan`, `created`, `updated`, `created_by`, `updated_by`) VALUES
(1, '00001', 'Djoko Susilo', 'Kepala Departemen B', '2014-02-08 22:45:52', '2014-02-08 22:46:35', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ka_penumpang`
--

CREATE TABLE IF NOT EXISTS `ka_penumpang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_penumpang` varchar(100) NOT NULL,
  `jenis_penumpang` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ka_penumpang`
--

INSERT INTO `ka_penumpang` (`id`, `kode_penumpang`, `jenis_penumpang`, `keterangan`, `created`, `updated`, `created_by`, `updated_by`) VALUES
(1, 'dw', 'Dewasa', 'Penumpang berusia 12 tahun ke atas', '2014-02-19 17:55:48', '2014-02-19 17:55:48', 'admin', 'admin'),
(2, 'ank', 'Anak-anak', 'Penumpang berusia 6 tahun s/d 11 tahun', '2014-02-19 17:56:57', '2014-02-19 17:56:57', 'admin', 'admin'),
(3, 'inf', 'Inflant', 'Balita', '2014-02-19 17:57:13', '2014-02-19 17:57:13', 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
