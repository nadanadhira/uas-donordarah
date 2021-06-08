-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.5.9-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for project_nada
CREATE DATABASE IF NOT EXISTS `project_nada` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `project_nada`;

-- Dumping structure for table project_nada.kartu_identitas
CREATE TABLE IF NOT EXISTS `kartu_identitas` (
  `idKK` int(11) NOT NULL AUTO_INCREMENT,
  `ktm` longblob DEFAULT NULL,
  `ktp` longblob DEFAULT NULL,
  PRIMARY KEY (`idKK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table project_nada.kartu_identitas: ~0 rows (approximately)
/*!40000 ALTER TABLE `kartu_identitas` DISABLE KEYS */;
/*!40000 ALTER TABLE `kartu_identitas` ENABLE KEYS */;

-- Dumping structure for table project_nada.kategori_pmi
CREATE TABLE IF NOT EXISTS `kategori_pmi` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table project_nada.kategori_pmi: ~4 rows (approximately)
/*!40000 ALTER TABLE `kategori_pmi` DISABLE KEYS */;
INSERT INTO `kategori_pmi` (`id_kategori`, `nama_kategori`) VALUES
	(1, 'Kampus'),
	(2, 'Sma'),
	(3, 'TK'),
	(4, 'Bukan Kampus');
/*!40000 ALTER TABLE `kategori_pmi` ENABLE KEYS */;

-- Dumping structure for table project_nada.pasfoto
CREATE TABLE IF NOT EXISTS `pasfoto` (
  `idPasFoto` int(11) NOT NULL AUTO_INCREMENT,
  `pasfoto` longblob DEFAULT NULL,
  PRIMARY KEY (`idPasFoto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table project_nada.pasfoto: ~0 rows (approximately)
/*!40000 ALTER TABLE `pasfoto` DISABLE KEYS */;
/*!40000 ALTER TABLE `pasfoto` ENABLE KEYS */;

-- Dumping structure for table project_nada.pmi
CREATE TABLE IF NOT EXISTS `pmi` (
  `id_pmi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pmi` varchar(50) DEFAULT NULL,
  `nomor_pmi` int(11) DEFAULT NULL,
  `id_wilayah` int(11) DEFAULT NULL,
  `instansi_pmi` varchar(50) DEFAULT NULL,
  `kapasitas_pmi` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pmi`),
  KEY `FKwilayah` (`id_wilayah`),
  KEY `FKkategori` (`id_kategori`),
  CONSTRAINT `FKkategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_pmi` (`id_kategori`) ON DELETE CASCADE,
  CONSTRAINT `FKwilayah` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah_pmi` (`id_wilayah`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table project_nada.pmi: ~3 rows (approximately)
/*!40000 ALTER TABLE `pmi` DISABLE KEYS */;
INSERT INTO `pmi` (`id_pmi`, `nama_pmi`, `nomor_pmi`, `id_wilayah`, `instansi_pmi`, `kapasitas_pmi`, `id_kategori`) VALUES
	(5, 'Sukses Bersamaaa', 10101, 3, 'UIN', 1000, 1),
	(6, 'Tadika', 9123, 2, 'Mesra', 9999, 3),
	(7, 'Hore', 12392, 1, 'GATAU', 212319, 2);
/*!40000 ALTER TABLE `pmi` ENABLE KEYS */;

-- Dumping structure for table project_nada.profil_user
CREATE TABLE IF NOT EXISTS `profil_user` (
  `idProfilUser` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) DEFAULT NULL,
  `tmp_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `goldar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idProfilUser`),
  KEY `iduser` (`iduser`),
  CONSTRAINT `FK_profil_user_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table project_nada.profil_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `profil_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `profil_user` ENABLE KEYS */;

-- Dumping structure for table project_nada.tujuan_donor
CREATE TABLE IF NOT EXISTS `tujuan_donor` (
  `idTujuan` int(11) NOT NULL DEFAULT 0,
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `id_PMI` int(11) DEFAULT NULL,
  `id_instansi` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTujuan`),
  KEY `iduser` (`iduser`),
  KEY `id_PMI` (`id_PMI`),
  KEY `id_instansi` (`id_instansi`),
  CONSTRAINT `FK_tujuan_donor_instansi` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`),
  CONSTRAINT `FK_tujuan_donor_profil_pmi` FOREIGN KEY (`id_PMI`) REFERENCES `pmi` (`id_pmi`),
  CONSTRAINT `FK_tujuan_donor_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table project_nada.tujuan_donor: ~0 rows (approximately)
/*!40000 ALTER TABLE `tujuan_donor` DISABLE KEYS */;
/*!40000 ALTER TABLE `tujuan_donor` ENABLE KEYS */;

-- Dumping structure for table project_nada.user
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `idPasFoto` int(11) DEFAULT NULL,
  `idProfilUser` int(11) DEFAULT NULL,
  `idKK` int(11) DEFAULT NULL,
  `nim` int(25) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  KEY `idProfilUser` (`idProfilUser`),
  KEY `idKK` (`idKK`),
  KEY `idPasPoto` (`idPasFoto`),
  CONSTRAINT `FK_user_kartu_identitas` FOREIGN KEY (`idKK`) REFERENCES `kartu_identitas` (`idKK`),
  CONSTRAINT `FK_user_pasfoto` FOREIGN KEY (`idPasFoto`) REFERENCES `pasfoto` (`idPasFoto`),
  CONSTRAINT `FK_user_profil_user` FOREIGN KEY (`idProfilUser`) REFERENCES `profil_user` (`idProfilUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table project_nada.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`iduser`, `idPasFoto`, `idProfilUser`, `idKK`, `nim`, `nama`, `email`, `password`, `level`) VALUES
	(2, NULL, NULL, NULL, NULL, NULL, 'shevaathalla@gmail.com', 'sheva1209', 'user'),
	(3, NULL, NULL, NULL, NULL, NULL, 'admin@mail.com', 'admin', 'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table project_nada.wilayah_pmi
CREATE TABLE IF NOT EXISTS `wilayah_pmi` (
  `id_wilayah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_wilayah` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_wilayah`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table project_nada.wilayah_pmi: ~3 rows (approximately)
/*!40000 ALTER TABLE `wilayah_pmi` DISABLE KEYS */;
INSERT INTO `wilayah_pmi` (`id_wilayah`, `nama_wilayah`) VALUES
	(1, 'Malang'),
	(2, 'Surabaya'),
	(3, 'Jonggol');
/*!40000 ALTER TABLE `wilayah_pmi` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
