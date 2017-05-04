-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2017 at 10:16 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beesmartv3`
--

-- --------------------------------------------------------

--
-- Table structure for table `cbt_admin`
--

CREATE TABLE `cbt_admin` (
  `Urut` int(11) NOT NULL,
  `XSekolah` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `XTingkat` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `XIp` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `XAlamat` text COLLATE latin1_general_ci NOT NULL,
  `XTelp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `XFax` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `XEmail` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `XWeb` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `XLogo` text COLLATE latin1_general_ci NOT NULL,
  `XBanner` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `XKepSek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `XAdmin` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `XPicAdmin` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `XWarna` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XStatus` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `XKodeSekolah` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `XNIPKepsek` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `XNIPAdmin` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `cbt_admin`
--

INSERT INTO `cbt_admin` (`Urut`, `XSekolah`, `XTingkat`, `XIp`, `XAlamat`, `XTelp`, `XFax`, `XEmail`, `XWeb`, `XLogo`, `XBanner`, `XKepSek`, `XAdmin`, `XPicAdmin`, `XWarna`, `XStatus`, `XKodeSekolah`, `XNIPKepsek`, `XNIPAdmin`) VALUES
(2, 'SMP BEESMART', 'SMP', '127.0.0.1', 'www.cbtbeesmart.com', '081615555611', '-', '-', 'www.tuwagapat.com', 'icon.gif', 'logo.png', 'Sigit Hariono', 'abizayra', '15541974_1211472018934821_4807101813906355199_n.png', 'ffca01', '1', 'P9999991', '99999999999', '3333333333');

-- --------------------------------------------------------

--
-- Table structure for table `cbt_audio`
--

CREATE TABLE `cbt_audio` (
  `Urut` int(11) NOT NULL,
  `XMulai` float NOT NULL,
  `XPutar` int(11) NOT NULL,
  `XUserJawab` varchar(50) NOT NULL,
  `XTokenUjian` varchar(10) NOT NULL,
  `XKodeSoal` varchar(50) NOT NULL,
  `XNomerSoal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_jawaban`
--

CREATE TABLE `cbt_jawaban` (
  `Urutan` int(11) NOT NULL,
  `Urut` int(11) NOT NULL,
  `XNomerSoal` int(11) NOT NULL,
  `XKodeUjian` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `XKodeKelas` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `XKodeJurusan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `XKodeMapel` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `XKodeSoal` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `XJenisSoal` int(11) NOT NULL,
  `XTokenUjian` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `XA` int(11) NOT NULL,
  `XB` int(11) NOT NULL,
  `XC` int(11) NOT NULL,
  `XD` int(11) NOT NULL,
  `XE` int(11) NOT NULL,
  `XJawaban` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `XTemp` text COLLATE latin1_general_ci NOT NULL,
  `XJawabanEsai` text COLLATE latin1_general_ci NOT NULL,
  `XKodeJawab` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `XNilaiJawab` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `XNilai` int(11) NOT NULL,
  `XNilaiEsai` float NOT NULL,
  `XRagu` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `XMulai` float NOT NULL,
  `XPutar` int(11) NOT NULL,
  `XMulaiV` float NOT NULL,
  `XPutarV` int(11) NOT NULL,
  `XTglJawab` date NOT NULL,
  `XJamJawab` time NOT NULL,
  `XKunciJawaban` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `XUserJawab` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Campur` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `XSetId` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XSemester` int(1) NOT NULL,
  `XUserPeriksa` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `XTglPeriksa` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XJamPeriksa` varchar(8) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_kelas`
--

CREATE TABLE `cbt_kelas` (
  `Urut` int(11) NOT NULL,
  `XKodeLevel` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XNamaKelas` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `XKodeJurusan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `XKodeKelas` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XStatusKelas` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `XKodeSekolah` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_mapel`
--

CREATE TABLE `cbt_mapel` (
  `Urut` int(11) NOT NULL,
  `XKodeKelas` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XKodeMapel` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XNamaMapel` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `XTglBuat` date NOT NULL,
  `XPersenUH` int(11) NOT NULL,
  `XPersenUTS` int(11) NOT NULL,
  `XPersenUAS` int(11) NOT NULL,
  `XKKM` float NOT NULL,
  `XMapelAgama` char(1) COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `XKodeSekolah` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_nilai`
--

CREATE TABLE `cbt_nilai` (
  `Urut` int(11) NOT NULL,
  `XNomerUjian` varchar(20) NOT NULL,
  `XNIK` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `XKodeUjian` varchar(10) NOT NULL,
  `XTokenUjian` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `XTgl` date NOT NULL,
  `XJumSoal` int(11) NOT NULL,
  `XBenar` int(11) NOT NULL,
  `XSalah` int(11) NOT NULL,
  `XNilai` int(11) NOT NULL,
  `XPersenPil` float NOT NULL,
  `XPersenEsai` float NOT NULL,
  `XEsai` float NOT NULL,
  `XTotalNilai` float NOT NULL,
  `XKodeMapel` varchar(10) NOT NULL,
  `XKodeKelas` varchar(10) NOT NULL,
  `XKodeSoal` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `XSetId` varchar(10) NOT NULL,
  `XSemester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_paketsoal`
--

CREATE TABLE `cbt_paketsoal` (
  `Urut` int(11) NOT NULL,
  `XKodeKelas` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XLevel` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `XKodeJurusan` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XKodeMapel` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XPaketSoal` text COLLATE latin1_general_ci NOT NULL,
  `XSesi` int(11) NOT NULL DEFAULT '1',
  `XJenisSoal` int(11) NOT NULL,
  `XPilGanda` int(11) NOT NULL,
  `XEsai` int(11) NOT NULL,
  `XPersenPil` int(11) NOT NULL,
  `XPersenEsai` int(11) NOT NULL,
  `XKodeSoal` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `XJumPilihan` int(11) NOT NULL DEFAULT '5',
  `XJumSoal` int(11) NOT NULL,
  `JumUjian` int(11) NOT NULL,
  `XAcakSoal` char(1) COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `XGuru` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `XSetId` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XSemua` enum('Y','T') COLLATE latin1_general_ci NOT NULL DEFAULT 'T',
  `XStatusSoal` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `XTglBuat` date NOT NULL,
  `XKodeSekolah` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_setid`
--

CREATE TABLE `cbt_setid` (
  `Urut` int(11) NOT NULL,
  `XKodeAY` varchar(10) NOT NULL,
  `XNamaAY` varchar(100) NOT NULL,
  `XStatus` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbt_setid`
--

INSERT INTO `cbt_setid` (`Urut`, `XKodeAY`, `XNamaAY`, `XStatus`) VALUES
(1, 'BEE2015/16', 'Tahun Ajaran 2015/2016', '0'),
(2, 'BEE2016/17', 'Tahun Ajaran 2016/2017', '0'),
(3, '2016/2017', 'Tahun Ajaran 2016/2017', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cbt_siswa`
--

CREATE TABLE `cbt_siswa` (
  `Urut` int(11) NOT NULL,
  `XNomerUjian` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `XNIK` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XKodeJurusan` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XNamaSiswa` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `XKodeKelas` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XKodeLevel` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XJenisKelamin` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `XPassword` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `XFoto` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `XAgama` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `XSetId` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XSesi` int(11) NOT NULL,
  `XRuang` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `XKodeSekolah` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `XPilihan` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_siswa_ujian`
--

CREATE TABLE `cbt_siswa_ujian` (
  `Urut` int(11) NOT NULL,
  `XNomerUjian` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `XNISN` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `XKodeKelas` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XKodeMapel` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XKodeSoal` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `XPilGanda` int(11) NOT NULL,
  `XEsai` int(11) NOT NULL,
  `XJumSoal` int(11) NOT NULL,
  `XTglUjian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `XJamUjian` time NOT NULL,
  `XMulaiUjian` time NOT NULL,
  `XLastUpdate` time NOT NULL,
  `XSisaWaktu` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `XLamaUjian` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `XTargetUjian` time NOT NULL,
  `XTokenUjian` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `XSelesaiUjian` time NOT NULL,
  `XSetId` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XKodeUjian` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XSesi` int(11) NOT NULL,
  `XStatusUjian` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `XKodeSekolah` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `XGetIP` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_soal`
--

CREATE TABLE `cbt_soal` (
  `Urut` int(11) NOT NULL,
  `XKodeMapel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `XKodeSoal` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `XJenisSoal` int(11) NOT NULL DEFAULT '1',
  `XKodeKelas` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `XLevel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `XNomerSoal` int(11) NOT NULL,
  `XRagu` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `XTanya` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `XAudioTanya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `XVideoTanya` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `XGambarTanya` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `XJawab1` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `XJawab2` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `XJawab3` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `XJawab4` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `XJawab5` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `XGambarJawab1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `XGambarJawab2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `XGambarJawab3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `XGambarJawab4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `XGambarJawab5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `XKunciJawaban` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `XKategori` int(11) NOT NULL DEFAULT '1',
  `XAcakSoal` enum('A','T') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `XAcakOpsi` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `XAgama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `XKodeSekolah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_tes`
--

CREATE TABLE `cbt_tes` (
  `Urut` int(11) NOT NULL,
  `XKodeUjian` varchar(5) NOT NULL,
  `XNamaUjian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbt_tes`
--

INSERT INTO `cbt_tes` (`Urut`, `XKodeUjian`, `XNamaUjian`) VALUES
(1, 'UH', 'Ulangan Harian'),
(2, 'UTS', 'Ujian Tengah Semester'),
(3, 'UAS', 'Ujian Akhir Semester'),
(4, 'TO1', 'Try Out I'),
(5, 'TO2', 'Try Out II'),
(6, 'TO3', 'Try Out III'),
(7, 'TO4', 'Try Out IV'),
(8, 'TO5', 'Try Out V');

-- --------------------------------------------------------

--
-- Table structure for table `cbt_tugas`
--

CREATE TABLE `cbt_tugas` (
  `Urut` int(11) NOT NULL,
  `XLevel` varchar(10) NOT NULL,
  `XNIK` varchar(10) NOT NULL,
  `XKodeMapel` varchar(10) NOT NULL,
  `XKodeKelas` varchar(10) NOT NULL,
  `XKodeJurusan` varchar(10) NOT NULL,
  `XSemester` int(11) NOT NULL,
  `XSetId` varchar(10) NOT NULL,
  `XNilaiTugas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_ujian`
--

CREATE TABLE `cbt_ujian` (
  `Urut` int(11) NOT NULL,
  `XKodeUjian` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XSemester` int(11) NOT NULL,
  `XLevel` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XKodeKelas` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XKodeJurusan` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XKodeMapel` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XKodeSoal` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `XLambat` enum('0','1') COLLATE latin1_general_ci NOT NULL,
  `XJumPilihan` int(11) NOT NULL,
  `XJumSoal` int(11) NOT NULL,
  `XPilGanda` int(11) NOT NULL,
  `XEsai` int(11) NOT NULL,
  `XAcakSoal` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `XTglUjian` date NOT NULL,
  `XJamUjian` time NOT NULL,
  `XBatasMasuk` time NOT NULL,
  `XSisaWaktu` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `XLamaUjian` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `XIdleTime` int(11) NOT NULL,
  `XTokenUjian` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `XGuru` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `XTglBuat` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XSetId` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `XStatusUjian` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `XPengawas` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `XNIPPengawas` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `XSesi` int(11) NOT NULL,
  `XKodeSekolah` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_upload_file`
--

CREATE TABLE `cbt_upload_file` (
  `Urut` int(11) NOT NULL,
  `XNamaFile` varchar(250) NOT NULL,
  `XFolder` varchar(250) NOT NULL,
  `XCreated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_user`
--

CREATE TABLE `cbt_user` (
  `Urut` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `Nama` varchar(200) NOT NULL,
  `HP` varchar(20) NOT NULL,
  `FacebookID` varchar(100) NOT NULL,
  `login` int(11) NOT NULL,
  `Status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbt_user`
--

INSERT INTO `cbt_user` (`Urut`, `Username`, `Password`, `NIP`, `Nama`, `HP`, `FacebookID`, `login`, `Status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', '', '', 1, '1'),
(2, 'guru', '77e69c137812518e359196bb2f5e9bb9', '', '', '', '', 0, '1'),
(4, 'guru1', '92afb435ceb16630e9827f54330c59c9', '', 'Guru ke 2', '', '', 0, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cbt_admin`
--
ALTER TABLE `cbt_admin`
  ADD PRIMARY KEY (`Urut`);

--
-- Indexes for table `cbt_audio`
--
ALTER TABLE `cbt_audio`
  ADD PRIMARY KEY (`Urut`);

--
-- Indexes for table `cbt_jawaban`
--
ALTER TABLE `cbt_jawaban`
  ADD PRIMARY KEY (`Urutan`);

--
-- Indexes for table `cbt_kelas`
--
ALTER TABLE `cbt_kelas`
  ADD PRIMARY KEY (`Urut`);

--
-- Indexes for table `cbt_mapel`
--
ALTER TABLE `cbt_mapel`
  ADD PRIMARY KEY (`Urut`);

--
-- Indexes for table `cbt_nilai`
--
ALTER TABLE `cbt_nilai`
  ADD PRIMARY KEY (`Urut`);

--
-- Indexes for table `cbt_paketsoal`
--
ALTER TABLE `cbt_paketsoal`
  ADD PRIMARY KEY (`Urut`),
  ADD KEY `Urut` (`Urut`);

--
-- Indexes for table `cbt_setid`
--
ALTER TABLE `cbt_setid`
  ADD PRIMARY KEY (`Urut`);

--
-- Indexes for table `cbt_siswa`
--
ALTER TABLE `cbt_siswa`
  ADD PRIMARY KEY (`Urut`);

--
-- Indexes for table `cbt_siswa_ujian`
--
ALTER TABLE `cbt_siswa_ujian`
  ADD PRIMARY KEY (`Urut`);

--
-- Indexes for table `cbt_soal`
--
ALTER TABLE `cbt_soal`
  ADD PRIMARY KEY (`Urut`);

--
-- Indexes for table `cbt_tes`
--
ALTER TABLE `cbt_tes`
  ADD PRIMARY KEY (`Urut`);

--
-- Indexes for table `cbt_tugas`
--
ALTER TABLE `cbt_tugas`
  ADD PRIMARY KEY (`Urut`);

--
-- Indexes for table `cbt_ujian`
--
ALTER TABLE `cbt_ujian`
  ADD PRIMARY KEY (`Urut`);

--
-- Indexes for table `cbt_upload_file`
--
ALTER TABLE `cbt_upload_file`
  ADD PRIMARY KEY (`Urut`);

--
-- Indexes for table `cbt_user`
--
ALTER TABLE `cbt_user`
  ADD PRIMARY KEY (`Urut`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cbt_admin`
--
ALTER TABLE `cbt_admin`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cbt_audio`
--
ALTER TABLE `cbt_audio`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbt_jawaban`
--
ALTER TABLE `cbt_jawaban`
  MODIFY `Urutan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbt_kelas`
--
ALTER TABLE `cbt_kelas`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbt_mapel`
--
ALTER TABLE `cbt_mapel`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbt_nilai`
--
ALTER TABLE `cbt_nilai`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbt_paketsoal`
--
ALTER TABLE `cbt_paketsoal`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbt_setid`
--
ALTER TABLE `cbt_setid`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cbt_siswa`
--
ALTER TABLE `cbt_siswa`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbt_siswa_ujian`
--
ALTER TABLE `cbt_siswa_ujian`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbt_soal`
--
ALTER TABLE `cbt_soal`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbt_tes`
--
ALTER TABLE `cbt_tes`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cbt_tugas`
--
ALTER TABLE `cbt_tugas`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbt_ujian`
--
ALTER TABLE `cbt_ujian`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbt_upload_file`
--
ALTER TABLE `cbt_upload_file`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbt_user`
--
ALTER TABLE `cbt_user`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
