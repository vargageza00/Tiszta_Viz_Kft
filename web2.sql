CREATE DATABASE IF NOT EXISTS`web2`
CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `web2`;

CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `csaladi_nev` varchar(45) NOT NULL default '',
  `utonev` varchar(45) NOT NULL default '',
  `bejelentkezes` varchar(12) NOT NULL default '',
  `jelszo` varchar(256) NOT NULL default '',
  `jogosultsag` varchar(3) NOT NULL default '_1_',
  PRIMARY KEY  (`id`)
)
ENGINE=InnoDB DEFAULT
CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS `menu` (
  `url` varchar(30) NOT NULL,
  `nev` varchar(30) NOT NULL,
  `szulo` varchar(30) NOT NULL,
  `jogosultsag` varchar(3) NOT NULL,
  `sorrend` tinyint(4) NOT NULL,
  PRIMARY KEY (`url`)
) ENGINE=InnoDB DEFAULT 
CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO `menu` (`url`, `nev`, `szulo`, `jogosultsag`, `sorrend`) VALUES
 ('admin', 'Admin', '', '001', 70),
 ('alapinfok', 'Alapinfók', 'elerhetoseg', '111', 10),
 ('belepes', 'Belépés', '', '100', 50),
 ('elerhetoseg', 'Elérhetőség', '', '111', 30),
 ('kiegeszitesek', 'Kiegészítések', 'elerhetoseg', '011', 20),
 ('kilepes', 'Kilépés', '', '011', 60),
 ('linkek', 'Linkek', '', '100', 40),
 ('teszt', 'Teszt', '', '111', 20),
 ('nyitolap', 'Nyitólap', '', '111', 10);
