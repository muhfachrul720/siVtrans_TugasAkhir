-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2021 at 08:51 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sivtrans`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_angkatan`
--

CREATE TABLE `tbl_angkatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_angkatan`
--

INSERT INTO `tbl_angkatan` (`id`, `nama`, `jumlah_siswa`) VALUES
(1, '2017', 67);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_trans`
--

CREATE TABLE `tbl_detail_trans` (
  `id_detail_trans` int(11) NOT NULL,
  `kode_mk_trans` varchar(255) NOT NULL,
  `mata_kuliah_trans` varchar(255) NOT NULL,
  `sks_mk_trans` int(11) NOT NULL,
  `nilai_mk_trans` int(11) NOT NULL COMMENT 'A = 4; B = 3; C = 2; D = 1;',
  `sks_angka_trans` int(11) NOT NULL,
  `ket_trans` tinytext NOT NULL,
  `id_info_trans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detail_trans`
--

INSERT INTO `tbl_detail_trans` (`id_detail_trans`, `kode_mk_trans`, `mata_kuliah_trans`, `sks_mk_trans`, `nilai_mk_trans`, `sks_angka_trans`, `ket_trans`, `id_info_trans`) VALUES
(1055, 'A12322', 'Pendidikan Agama', 3, 4, 12, '', 32),
(1056, 'A12323', 'Pancasila', 2, 2, 4, '', 32),
(1057, 'A12324', 'Bahasa Indonesia', 2, 4, 8, '', 32),
(1058, 'A12325', 'Pendidikan Karakter', 2, 4, 8, '', 32),
(1059, 'A12326', 'Teknologi Informasi', 2, 1, 2, '', 32),
(1060, 'A12327', 'Algoritma dan Pemrograman', 4, 2, 8, '', 32),
(1061, 'A12328', 'Kalkulus I', 2, 3, 6, '', 32),
(1062, 'A12329', 'Matematika Diskrit', 3, 4, 12, '', 32),
(1063, 'A12330', 'Fisika', 2, 4, 8, '', 32),
(1064, 'A12331', 'Praktikum Aplikasi Komputer', 1, 4, 4, '', 32),
(1065, 'A12332', 'Kewarganegaraan', 2, 4, 8, '', 32),
(1066, 'A12333', 'Bahasa Inggris', 2, 4, 8, '', 32),
(1067, 'A12334', 'Wawasan Kemaritiman', 3, 4, 12, '', 32),
(1068, 'A12335', 'Pemrograman Dasar', 2, 4, 8, '', 32),
(1069, 'A12336', 'Praktikum Pemrograman Dasar', 1, 4, 4, '', 32),
(1070, 'A12337', 'Kalkulus 2', 2, 4, 8, '', 32),
(1071, 'A12338', 'Aljabar Linear', 3, 4, 12, '', 32),
(1072, 'A12339', 'Sistem Basis Data', 3, 4, 12, '', 32),
(1073, 'A12340', 'Sistem Digital', 3, 4, 12, '', 32),
(1074, 'A12341', 'Sistem Operasi', 2, 4, 8, '', 32),
(1075, 'A12342', 'Pemrograman Web', 2, 4, 8, '', 32),
(1076, 'A12343', 'Praktikum Pemrograman Web', 1, 4, 4, '', 32),
(1077, 'A12344', 'Sistem Informasi', 3, 4, 12, '', 32),
(1078, 'A12345', 'Sistem Basis Data Lanjut', 2, 4, 8, '', 32),
(1079, 'A12346', 'Sistem Berkas', 3, 4, 12, '', 32),
(1080, '', 'Organisasi Dan Arsitektur Komputer', 3, 4, 12, '', 32),
(1081, '', 'Probabilitas dan Statistik', 2, 4, 8, '', 32),
(1082, '', 'Komunikasi Data', 2, 4, 8, '', 32),
(1083, '', 'Interaksi Manusia dan Komputer', 3, 4, 12, '', 32),
(1084, '', 'Metode Numerik', 2, 4, 8, '', 32),
(1085, '', 'Struktur Data', 3, 4, 12, '', 32),
(1086, 'A12322', 'Pendidikan Agama', 3, 4, 12, '', 33),
(1087, 'A12323', 'Pancasila', 2, 2, 4, '', 33),
(1088, 'A12324', 'Bahasa Indonesia', 2, 4, 8, '', 33),
(1089, 'A12325', 'Pendidikan Karakter', 2, 4, 8, '', 33),
(1090, 'A12326', 'Teknologi Informasi', 2, 4, 8, '', 33),
(1091, 'A12327', 'Algoritma dan Pemrograman', 4, 2, 8, '', 33),
(1092, 'A12328', 'Kalkulus I', 2, 3, 6, '', 33),
(1093, 'A12329', 'Matematika Diskrit', 3, 4, 12, '', 33),
(1094, 'A12330', 'Fisika', 2, 4, 8, '', 33),
(1095, 'A12331', 'Praktikum Aplikasi Komputer', 1, 4, 4, '', 33),
(1096, 'A12332', 'Kewarganegaraan', 2, 4, 8, '', 33),
(1097, 'A12333', 'Bahasa Inggris', 2, 4, 8, '', 33),
(1098, 'A12334', 'Wawasan Kemaritiman', 3, 4, 12, '', 33),
(1099, 'A12335', 'Pemrograman Dasar', 2, 4, 8, '', 33),
(1100, 'A12336', 'Praktikum Pemrograman Dasar', 1, 4, 4, '', 33),
(1101, 'A12337', 'Kalkulus 2', 2, 4, 8, '', 33),
(1102, 'A12338', 'Aljabar Linear', 3, 4, 12, '', 33),
(1103, 'A12339', 'Sistem Basis Data', 3, 4, 12, '', 33),
(1104, 'A12340', 'Sistem Digital', 3, 4, 12, '', 33),
(1105, 'A12341', 'Sistem Operasi', 2, 4, 8, '', 33),
(1106, 'A12342', 'Pemrograman Web', 2, 4, 8, '', 33),
(1107, 'A12343', 'Praktikum Pemrograman Web', 1, 4, 4, '', 33),
(1108, 'A12344', 'Sistem Informasi', 3, 4, 12, '', 33),
(1109, 'A12345', 'Sistem Basis Data Lanjut', 2, 4, 8, '', 33),
(1110, 'A12346', 'Sistem Berkas', 3, 3, 9, '', 33),
(1111, 'A12346', 'Organisasi Dan Arsitektur Komputer', 3, 4, 12, '', 33),
(1112, 'A12346', 'Probabilitas dan Statistik', 2, 4, 8, '', 33),
(1113, 'A12346', 'Komunikasi Data', 2, 4, 8, '', 33),
(1114, 'A12346', 'Interaksi Manusia dan Komputer', 3, 4, 12, '', 33),
(1115, 'A12346', 'Metode Numerik', 2, 4, 8, '', 33),
(1116, 'A12346', 'Struktur Data', 3, 4, 12, '', 33),
(1117, 'A12322', 'Pendidikan Agama', 3, 4, 12, '', 34),
(1118, 'A12323', 'Pancasila', 2, 2, 4, '', 34),
(1119, 'A12324', 'Bahasa Indonesia', 2, 4, 8, '', 34),
(1120, 'A12325', 'Pendidikan Karakter', 2, 4, 8, '', 34),
(1121, 'A12326', 'Teknologi Informasi', 2, 4, 8, '', 34),
(1122, 'A12327', 'Algoritma dan Pemrograman', 4, 2, 8, '', 34),
(1123, 'A12328', 'Kalkulus I', 2, 3, 6, '', 34),
(1124, 'A12329', 'Matematika Diskrit', 3, 4, 12, '', 34),
(1125, 'A12330', 'Fisika', 2, 4, 8, '', 34),
(1126, 'A12331', 'Praktikum Aplikasi Komputer', 1, 4, 4, '', 34),
(1127, 'A12332', 'Kewarganegaraan', 2, 4, 8, '', 34),
(1128, 'A12333', 'Bahasa Inggris', 2, 4, 8, '', 34),
(1129, 'A12334', 'Wawasan Kemaritiman', 3, 4, 12, '', 34),
(1130, 'A12335', 'Pemrograman Dasar', 2, 4, 8, '', 34),
(1131, 'A12336', 'Praktikum Pemrograman Dasar', 1, 4, 4, '', 34),
(1132, 'A12337', 'Kalkulus 2', 2, 4, 8, '', 34),
(1133, 'A12338', 'Aljabar Linear', 3, 4, 12, '', 34),
(1134, 'A12339', 'Sistem Basis Data', 3, 4, 12, '', 34),
(1135, 'A12340', 'Sistem Digital', 3, 4, 12, '', 34),
(1136, 'A12341', 'Sistem Operasi', 2, 4, 8, '', 34),
(1137, 'A12342', 'Pemrograman Web', 2, 4, 8, '', 34),
(1138, 'A12343', 'Praktikum Pemrograman Web', 1, 4, 4, '', 34),
(1139, 'A12344', 'Sistem Informasi', 3, 4, 12, '', 34),
(1140, 'A12345', 'Sistem Basis Data Lanjut', 2, 4, 8, '', 34),
(1141, 'A12346', 'Sistem Berkas', 3, 3, 9, '', 34),
(1142, 'A12346', 'Organisasi Dan Arsitektur Komputer', 3, 4, 12, '', 34),
(1143, 'A12346', 'Probabilitas dan Statistik', 2, 4, 8, '', 34),
(1144, 'A12346', 'Komunikasi Data', 2, 4, 8, '', 34),
(1145, 'A12346', 'Interaksi Manusia dan Komputer', 3, 4, 12, '', 34),
(1146, 'A12346', 'Metode Numerik', 2, 4, 8, '', 34),
(1147, 'A12346', 'Struktur Data', 3, 4, 12, '', 34),
(1148, 'A12322', 'Pendidikan Agama', 3, 4, 12, '', 35),
(1149, 'A12323', 'Pancasila', 2, 2, 4, '', 35),
(1150, 'A12324', 'Bahasa Indonesia', 2, 4, 8, '', 35),
(1151, 'A12325', 'Pendidikan Karakter', 2, 4, 8, '', 35),
(1152, 'A12326', 'Teknologi Informasi', 2, 1, 2, '', 35),
(1153, 'A12327', 'Algoritma dan Pemrograman', 4, 2, 8, '', 35),
(1154, 'A12328', 'Kalkulus I', 2, 3, 6, '', 35),
(1155, 'A12329', 'Matematika Diskrit', 3, 4, 12, '', 35),
(1156, 'A12330', 'Fisika', 2, 4, 8, '', 35),
(1157, 'A12331', 'Praktikum Aplikasi Komputer', 1, 4, 4, '', 35),
(1158, 'A12332', 'Kewarganegaraan', 2, 4, 8, '', 35),
(1159, 'A12333', 'Bahasa Inggris', 2, 4, 8, '', 35),
(1160, 'A12334', 'Wawasan Kemaritiman', 3, 4, 12, '', 35),
(1161, 'A12335', 'Pemrograman Dasar', 2, 4, 8, '', 35),
(1162, 'A12336', 'Praktikum Pemrograman Dasar', 1, 4, 4, '', 35),
(1163, 'A12337', 'Kalkulus 2', 2, 4, 8, '', 35),
(1164, 'A12338', 'Aljabar Linear', 3, 4, 12, '', 35),
(1165, 'A12339', 'Sistem Basis Data', 3, 4, 12, '', 35),
(1166, 'A12340', 'Sistem Digital', 3, 4, 12, '', 35),
(1167, 'A12341', 'Sistem Operasi', 2, 4, 8, '', 35),
(1168, 'A12342', 'Pemrograman Web', 2, 4, 8, '', 35),
(1169, 'A12343', 'Praktikum Pemrograman Web', 1, 4, 4, '', 35),
(1170, 'A12344', 'Sistem Informasi', 3, 4, 12, '', 35),
(1171, 'A12345', 'Sistem Basis Data Lanjut', 2, 4, 8, '', 35),
(1172, 'A12346', 'Sistem Berkas', 3, 4, 12, '', 35),
(1173, '', 'Organisasi Dan Arsitektur Komputer', 3, 4, 12, '', 35),
(1174, '', 'Probabilitas dan Statistik', 2, 4, 8, '', 35),
(1175, '', 'Komunikasi Data', 2, 4, 8, '', 35),
(1176, '', 'Interaksi Manusia dan Komputer', 3, 4, 12, '', 35),
(1177, '', 'Metode Numerik', 2, 4, 8, '', 35),
(1178, '', 'Struktur Data', 3, 4, 12, '', 35),
(1179, 'A12322', 'Pendidikan Agama', 3, 4, 12, '', 36),
(1180, 'A12323', 'Pancasila', 2, 4, 8, '', 36),
(1181, 'A12324', 'Bahasa Indonesia', 2, 4, 8, '', 36),
(1182, 'A12325', 'Pendidikan Karakter', 2, 4, 8, '', 36),
(1183, 'A12326', 'Teknologi Informasi', 2, 1, 2, '', 36),
(1184, 'A12327', 'Algoritma dan Pemrograman', 4, 2, 8, '', 36),
(1185, 'A12328', 'Kalkulus I', 2, 3, 6, '', 36),
(1186, 'A12329', 'Matematika Diskrit', 3, 4, 12, '', 36),
(1187, 'A12330', 'Fisika', 2, 4, 8, '', 36),
(1188, 'A12331', 'Praktikum Aplikasi Komputer', 1, 4, 4, '', 36),
(1189, 'A12332', 'Kewarganegaraan', 2, 4, 8, '', 36),
(1190, 'A12333', 'Bahasa Inggris', 2, 4, 8, '', 36),
(1191, 'A12334', 'Wawasan Kemaritiman', 3, 4, 12, '', 36),
(1192, 'A12335', 'Pemrograman Dasar', 2, 4, 8, '', 36),
(1193, 'A12336', 'Praktikum Pemrograman Dasar', 1, 4, 4, '', 36),
(1194, 'A12337', 'Kalkulus 2', 2, 4, 8, '', 36),
(1195, 'A12338', 'Aljabar Linear', 3, 4, 12, '', 36),
(1196, 'A12339', 'Sistem Basis Data', 3, 4, 12, '', 36),
(1197, 'A12340', 'Sistem Digital', 3, 4, 12, '', 36),
(1198, 'A12341', 'Sistem Operasi', 2, 4, 8, '', 36),
(1199, 'A12342', 'Pemrograman Web', 2, 4, 8, '', 36),
(1200, 'A12343', 'Praktikum Pemrograman Web', 1, 4, 4, '', 36),
(1201, 'A12344', 'Sistem Informasi', 3, 4, 12, '', 36),
(1202, 'A12345', 'Sistem Basis Data Lanjut', 2, 4, 8, '', 36),
(1203, 'A12346', 'Sistem Berkas', 3, 4, 12, '', 36),
(1204, '', 'Organisasi Dan Arsitektur Komputer', 3, 4, 12, '', 36),
(1205, '', 'Probabilitas dan Statistik', 2, 4, 8, '', 36),
(1206, '', 'Komunikasi Data', 2, 4, 8, '', 36),
(1207, '', 'Interaksi Manusia dan Komputer', 3, 4, 12, '', 36),
(1208, '', 'Metode Numerik', 2, 4, 8, '', 36),
(1209, '', 'Struktur Data', 3, 4, 12, '', 36),
(1210, 'A12322', 'Pendidikan Agama', 3, 4, 12, '', 37),
(1211, 'A12323', 'Pancasila', 2, 2, 4, '', 37),
(1212, 'A12324', 'Bahasa Indonesia', 2, 4, 8, '', 37),
(1213, 'A12325', 'Pendidikan Karakter', 2, 4, 8, '', 37),
(1214, 'A12326', 'Teknologi Informasi', 2, 1, 2, '', 37),
(1215, 'A12327', 'Algoritma dan Pemrograman', 4, 2, 8, '', 37),
(1216, 'A12328', 'Kalkulus I', 2, 3, 6, '', 37),
(1217, 'A12329', 'Matematika Diskrit', 3, 4, 12, '', 37),
(1218, 'A12330', 'Fisika', 2, 4, 8, '', 37),
(1219, 'A12331', 'Praktikum Aplikasi Komputer', 1, 4, 4, '', 37),
(1220, 'A12332', 'Kewarganegaraan', 2, 4, 8, '', 37),
(1221, 'A12333', 'Bahasa Inggris', 2, 4, 8, '', 37),
(1222, 'A12334', 'Wawasan Kemaritiman', 3, 4, 12, '', 37),
(1223, 'A12335', 'Pemrograman Dasar', 2, 4, 8, '', 37),
(1224, 'A12336', 'Praktikum Pemrograman Dasar', 1, 4, 4, '', 37),
(1225, 'A12337', 'Kalkulus 2', 2, 4, 8, '', 37),
(1226, 'A12338', 'Aljabar Linear', 3, 4, 12, '', 37),
(1227, 'A12339', 'Sistem Basis Data', 3, 4, 12, '', 37),
(1228, 'A12340', 'Sistem Digital', 3, 4, 12, '', 37),
(1229, 'A12341', 'Sistem Operasi', 2, 4, 8, '', 37),
(1230, 'A12342', 'Pemrograman Web', 2, 4, 8, '', 37),
(1231, 'A12343', 'Praktikum Pemrograman Web', 1, 4, 4, '', 37),
(1232, 'A12344', 'Sistem Informasi', 3, 4, 12, '', 37),
(1233, 'A12345', 'Sistem Basis Data Lanjut', 2, 4, 8, '', 37),
(1234, 'A12346', 'Sistem Berkas', 3, 4, 12, '', 37),
(1235, '', 'Organisasi Dan Arsitektur Komputer', 3, 4, 12, '', 37),
(1236, '', 'Probabilitas dan Statistik', 2, 4, 8, '', 37),
(1237, '', 'Komunikasi Data', 2, 4, 8, '', 37),
(1238, '', 'Interaksi Manusia dan Komputer', 3, 4, 12, '', 37),
(1239, '', 'Metode Numerik', 2, 4, 8, '', 37),
(1240, '', 'Struktur Data', 3, 4, 12, '', 37),
(1241, 'A12322', 'Pendidikan Agama', 3, 4, 12, '', 38),
(1242, 'A12323', 'Pancasila', 2, 2, 4, '', 38),
(1243, 'A12324', 'Bahasa Indonesia', 2, 4, 8, '', 38),
(1244, 'A12325', 'Pendidikan Karakter', 2, 4, 8, '', 38),
(1245, 'A12326', 'Teknologi Informasi', 2, 1, 2, '', 38),
(1246, 'A12327', 'Algoritma dan Pemrograman', 4, 2, 8, '', 38),
(1247, 'A12328', 'Kalkulus I', 2, 3, 6, '', 38),
(1248, 'A12329', 'Matematika Diskrit', 3, 4, 12, '', 38),
(1249, 'A12330', 'Fisika', 2, 4, 8, '', 38),
(1250, 'A12331', 'Praktikum Aplikasi Komputer', 1, 4, 4, '', 38),
(1251, 'A12332', 'Kewarganegaraan', 2, 4, 8, '', 38),
(1252, 'A12333', 'Bahasa Inggris', 2, 4, 8, '', 38),
(1253, 'A12334', 'Wawasan Kemaritiman', 3, 4, 12, '', 38),
(1254, 'A12335', 'Pemrograman Dasar', 2, 4, 8, '', 38),
(1255, 'A12336', 'Praktikum Pemrograman Dasar', 1, 4, 4, '', 38),
(1256, 'A12337', 'Kalkulus 2', 2, 4, 8, '', 38),
(1257, 'A12338', 'Aljabar Linear', 3, 4, 12, '', 38),
(1258, 'A12339', 'Sistem Basis Data', 3, 4, 12, '', 38),
(1259, 'A12340', 'Sistem Digital', 3, 4, 12, '', 38),
(1260, 'A12341', 'Sistem Operasi', 2, 4, 8, '', 38),
(1261, 'A12342', 'Pemrograman Web', 2, 4, 8, '', 38),
(1262, 'A12343', 'Praktikum Pemrograman Web', 1, 4, 4, '', 38),
(1263, 'A12344', 'Sistem Informasi', 3, 4, 12, '', 38),
(1264, 'A12345', 'Sistem Basis Data Lanjut', 2, 4, 8, '', 38),
(1265, 'A12346', 'Sistem Berkas', 3, 4, 12, '', 38),
(1266, '', 'Organisasi Dan Arsitektur Komputer', 3, 4, 12, '', 38),
(1267, '', 'Probabilitas dan Statistik', 2, 4, 8, '', 38),
(1268, '', 'Komunikasi Data', 2, 4, 8, '', 38),
(1269, '', 'Interaksi Manusia dan Komputer', 3, 4, 12, '', 38),
(1270, '', 'Metode Numerik', 2, 4, 8, '', 38),
(1271, '', 'Struktur Data', 3, 4, 12, '', 38),
(1272, 'A12322', 'Pendidikan Agama', 3, 4, 12, '', 39),
(1273, 'A12323', 'Pancasila', 2, 2, 4, '', 39),
(1274, 'A12324', 'Bahasa Indonesia', 2, 4, 8, '', 39),
(1275, 'A12325', 'Pendidikan Karakter', 2, 4, 8, '', 39),
(1276, 'A12326', 'Teknologi Informasi', 2, 1, 2, '', 39),
(1277, 'A12327', 'Algoritma dan Pemrograman', 4, 2, 8, '', 39),
(1278, 'A12328', 'Kalkulus I', 2, 3, 6, '', 39),
(1279, 'A12329', 'Matematika Diskrit', 3, 4, 12, '', 39),
(1280, 'A12330', 'Fisika', 2, 4, 8, '', 39),
(1281, 'A12331', 'Praktikum Aplikasi Komputer', 1, 4, 4, '', 39),
(1282, 'A12332', 'Kewarganegaraan', 2, 4, 8, '', 39),
(1283, 'A12333', 'Bahasa Inggris', 2, 4, 8, '', 39),
(1284, 'A12334', 'Wawasan Kemaritiman', 3, 4, 12, '', 39),
(1285, 'A12335', 'Pemrograman Dasar', 2, 4, 8, '', 39),
(1286, 'A12336', 'Praktikum Pemrograman Dasar', 1, 4, 4, '', 39),
(1287, 'A12337', 'Kalkulus 2', 2, 4, 8, '', 39),
(1288, 'A12338', 'Aljabar Linear', 3, 4, 12, '', 39),
(1289, 'A12339', 'Sistem Basis Data', 3, 4, 12, '', 39),
(1290, 'A12340', 'Sistem Digital', 3, 4, 12, '', 39),
(1291, 'A12341', 'Sistem Operasi', 2, 4, 8, '', 39),
(1292, 'A12342', 'Pemrograman Web', 2, 4, 8, '', 39),
(1293, 'A12343', 'Praktikum Pemrograman Web', 1, 4, 4, '', 39),
(1294, 'A12344', 'Sistem Informasi', 3, 4, 12, '', 39),
(1295, 'A12345', 'Sistem Basis Data Lanjut', 2, 4, 8, '', 39),
(1296, 'A12346', 'Sistem Berkas', 3, 4, 12, '', 39),
(1297, '', 'Organisasi Dan Arsitektur Komputer', 3, 4, 12, '', 39),
(1298, '', 'Probabilitas dan Statistik', 2, 4, 8, '', 39),
(1299, '', 'Komunikasi Data', 2, 4, 8, '', 39),
(1300, '', 'Interaksi Manusia dan Komputer', 3, 4, 12, '', 39),
(1301, '', 'Metode Numerik', 2, 4, 8, '', 39),
(1302, '', 'Struktur Data', 3, 4, 12, '', 39),
(1303, 'UHO6101', 'AGAMA', 3, 4, 12, '', 40),
(1304, 'UHO6102', 'PANCASILA', 2, 4, 8, '', 40),
(1305, 'UHO6103', 'KEWARGANEGARAAN', 2, 4, 8, '', 40),
(1306, 'UHO6104', 'BAHASA INDONESIA', 2, 4, 8, '', 40),
(1307, 'S16111', 'MATEMATIKA DISKRIT', 3, 3, 9, '', 40),
(1308, 'S16112', 'SISTEM DAN TEKNOLOGI INFORMASI', 3, 4, 12, '', 40),
(1309, 'S16113', 'ALGORITMA DAN BAHASA PEMROGRAMAN', 4, 4, 16, '', 40),
(1310, 'S16114', 'ADMINISTRASI BISNIS', 2, 4, 8, '', 40),
(1311, 'S16115', 'DASAR DASAR PENGEMBANGAN PERANGKAT LUNAK', 3, 3, 9, '', 40),
(1312, 'UHO6207', 'WAWSAN KEMARITIMAN', 3, 4, 12, '', 40),
(1313, 'S16216', 'ALGORITMA DAN STRUKTUR DATA', 4, 3, 12, '', 40),
(1314, 'S16217', 'PENGANTAR SISTEM OPERASI', 3, 3, 9, '', 40),
(1315, 'S16218', 'ARSITEKTUR SISTEM INFORMASI', 3, 4, 12, '', 40),
(1316, 'S16219', 'STATISTIKA', 3, 3, 9, '', 40),
(1317, 'S16220', 'INTERAKSI MANUSIA DAN KOMPUTER', 3, 4, 12, '', 40),
(1318, 'S16221', 'PENGANTAR BASIS DATA', 3, 3, 9, '', 40),
(1319, 'S16222', 'DESAIN DAN MANAJEMEN PROSES BISNIS', 4, 4, 16, '', 40),
(1320, 'S16223', 'JARINGAN KOMPUTER', 3, 3, 9, '', 40),
(1321, 'S16224', 'PEMROGRAMAN BERORIENTASI OBJEK', 3, 3, 9, '', 40),
(1322, 'TIF62025', 'SISTEM DIGITAL', 3, 3, 9, '', 40),
(1323, 'SI6326', 'RISET OPERASI', 3, 3, 9, '', 40),
(1324, 'SI6325', 'MANAJEMEN LAYANAN TEKNOLOGI INFORMASI', 3, 4, 12, '', 40),
(1325, 'SI6327', 'DESAIN BASIS DATA', 3, 3, 9, '', 40),
(1326, 'SI6328', 'SIMULASI SISTEM', 2, 3, 6, '', 40),
(1327, 'TIF62053', 'METODE RISET', 2, 3, 6, '', 40),
(1328, 'SI6536', 'SISTEM INFORMASI MANAJEMEN', 3, 4, 12, '', 40),
(1329, 'TIF64013', 'PRAKTIKUM KECERDASAN BUATAN', 1, 4, 4, '', 40),
(1330, 'TIF64045', 'KECERDASAN BUATAN', 2, 2, 4, '', 40),
(1331, 'TIF64046', 'TEORI GRAF DAN AUTOMATA', 2, 4, 8, '', 40),
(1332, 'TIF6416', 'PRAKTIKUM JARINGAN KOMPUTER 1', 1, 4, 4, '', 40),
(1333, 'TIF6434', 'METODE NUMERIK', 2, 3, 6, '', 40),
(1334, 'TIF6439', 'ANALISIS DAN PERANCANGAN SISTEM', 3, 2, 6, '', 40),
(1335, 'TIF6440', 'REKAYASA PERANGKAT LUNAK', 3, 4, 12, '', 40),
(1336, 'TIF65018', 'PRAKTIKUM JARINGAN KOMPUTER 2', 1, 4, 4, '', 40),
(1337, 'TIF65042', 'PENGANTAR MANAJEMEN PROYEK PERANGKAT LUNAK', 2, 4, 8, '', 40),
(1338, 'TIF65047', 'GRAFIKA KOMPUTER', 3, 4, 12, '', 40),
(1339, 'TIF65049', 'DATA MINING', 3, 3, 9, '', 40),
(1340, 'TIF65056', 'KRIPTOGRAFI', 3, 3, 9, '', 40),
(1341, 'TIF65062', 'MULTIMEDIA', 3, 4, 12, '', 40),
(1342, 'TIF6648', 'ARSITEKTUR PERANGKAT LUNAK', 3, 4, 12, '', 40),
(1343, 'TIF6655', 'MANAJEMEN PROYEK PERANGKAT LUNAK', 3, 4, 12, '', 40),
(1344, 'TIF6657', 'PEMROGRAMAN PERANGKAT MOBILE', 3, 4, 12, '', 40),
(1345, 'TIF6658', 'ANIMASI KOMPUTER', 3, 4, 12, '', 40),
(1346, 'TIF6678', 'SISTEM INFORMASI GEOGRAFIS', 2, 4, 8, '', 40),
(1347, 'TIF67068', 'SISTEM PENDUKUNG KEPUTUSAN', 3, 3, 9, '', 40),
(1348, 'TIF67079', 'SIMULASI DAN GAME KOMPUTER', 2, 4, 8, '', 40),
(1349, 'UHO62005', 'BAHASA INGGRIS', 2, 4, 8, '', 40),
(1350, 'UHO7010', 'KEWIRAUSAHAAN', 2, 4, 8, '', 40),
(1351, 'TIF6654', 'KERJA PRAKTEK', 2, 4, 8, '', 40),
(1352, 'TIF67076', 'ETIKA PROFESI', 2, 4, 8, '', 40),
(1353, 'TIF67069', 'REKAYASA PERANGKAT LUNAK BERBASIS OBJEK', 3, 3, 9, '', 40),
(1354, 'UHO61006', 'PENDIDIKAN KARAKTER', 2, 4, 8, '', 40),
(1355, 'UHO68008', 'KKN', 4, 4, 16, '', 40),
(1356, 'UHO6101', 'AGAMA', 3, 4, 12, '', 41),
(1357, 'UHO6102', 'PANCASILA', 2, 4, 8, '', 41),
(1358, 'UHO6103', 'KEWARGANEGARAAN', 2, 4, 8, '', 41),
(1359, 'UHO6104', 'BAHASA INDONESIA', 2, 4, 8, '', 41),
(1360, 'S16111', 'MATEMATIKA DISKRIT', 3, 3, 9, '', 41),
(1361, 'S16112', 'SISTEM DAN TEKNOLOGI INFORMASI', 3, 4, 12, '', 41),
(1362, 'S16113', 'ALGORITMA DAN BAHASA PEMROGRAMAN', 4, 4, 16, '', 41),
(1363, 'S16114', 'ADMINISTRASI BISNIS', 2, 4, 8, '', 41),
(1364, 'S16115', 'DASAR DASAR PENGEMBANGAN PERANGKAT LUNAK', 3, 3, 9, '', 41),
(1365, 'UHO6207', 'WAWSAN KEMARITIMAN', 3, 4, 12, '', 41),
(1366, 'S16216', 'ALGORITMA DAN STRUKTUR DATA', 4, 3, 12, '', 41),
(1367, 'S16217', 'PENGANTAR SISTEM OPERASI', 3, 3, 9, '', 41),
(1368, 'S16218', 'ARSITEKTUR SISTEM INFORMASI', 3, 4, 12, '', 41),
(1369, 'S16219', 'STATISTIKA', 3, 3, 9, '', 41),
(1370, 'S16220', 'INTERAKSI MANUSIA DAN KOMPUTER', 3, 4, 12, '', 41),
(1371, 'S16221', 'PENGANTAR BASIS DATA', 3, 3, 9, '', 41),
(1372, 'S16222', 'DESAIN DAN MANAJEMEN PROSES BISNIS', 4, 4, 16, '', 41),
(1373, 'S16223', 'JARINGAN KOMPUTER', 3, 3, 9, '', 41),
(1374, 'S16224', 'PEMROGRAMAN BERORIENTASI OBJEK', 3, 3, 9, '', 41),
(1375, 'TIF62025', 'SISTEM DIGITAL', 3, 3, 9, '', 41),
(1376, 'SI6326', 'RISET OPERASI', 3, 3, 9, '', 41),
(1377, 'SI6325', 'MANAJEMEN LAYANAN TEKNOLOGI INFORMASI', 3, 4, 12, '', 41),
(1378, 'SI6327', 'DESAIN BASIS DATA', 3, 3, 9, '', 41),
(1379, 'SI6328', 'SIMULASI SISTEM', 2, 3, 6, '', 41),
(1380, 'TIF62053', 'METODE RISET', 2, 3, 6, '', 41),
(1381, 'SI6536', 'SISTEM INFORMASI MANAJEMEN', 3, 4, 12, '', 41),
(1382, 'TIF64013', 'PRAKTIKUM KECERDASAN BUATAN', 1, 4, 4, '', 41),
(1383, 'TIF64045', 'KECERDASAN BUATAN', 2, 2, 4, '', 41),
(1384, 'TIF64046', 'TEORI GRAF DAN AUTOMATA', 2, 4, 8, '', 41),
(1385, 'TIF6416', 'PRAKTIKUM JARINGAN KOMPUTER 1', 1, 4, 4, '', 41),
(1386, 'TIF6434', 'METODE NUMERIK', 2, 3, 6, '', 41),
(1387, 'TIF6439', 'ANALISIS DAN PERANCANGAN SISTEM', 3, 2, 6, '', 41),
(1388, 'TIF6440', 'REKAYASA PERANGKAT LUNAK', 3, 4, 12, '', 41),
(1389, 'TIF65018', 'PRAKTIKUM JARINGAN KOMPUTER 2', 1, 4, 4, '', 41),
(1390, 'TIF65042', 'PENGANTAR MANAJEMEN PROYEK PERANGKAT LUNAK', 2, 4, 8, '', 41),
(1391, 'TIF65047', 'GRAFIKA KOMPUTER', 3, 4, 12, '', 41),
(1392, 'TIF65049', 'DATA MINING', 3, 3, 9, '', 41),
(1393, 'TIF65056', 'KRIPTOGRAFI', 3, 3, 9, '', 41),
(1394, 'TIF65062', 'MULTIMEDIA', 3, 4, 12, '', 41),
(1395, 'TIF6648', 'ARSITEKTUR PERANGKAT LUNAK', 3, 4, 12, '', 41),
(1396, 'TIF6655', 'MANAJEMEN PROYEK PERANGKAT LUNAK', 3, 4, 12, '', 41),
(1397, 'TIF6657', 'PEMROGRAMAN PERANGKAT MOBILE', 3, 4, 12, '', 41),
(1398, 'TIF6658', 'ANIMASI KOMPUTER', 3, 4, 12, '', 41),
(1399, 'TIF6678', 'SISTEM INFORMASI GEOGRAFIS', 2, 4, 8, '', 41),
(1400, 'TIF67068', 'SISTEM PENDUKUNG KEPUTUSAN', 3, 3, 9, '', 41),
(1401, 'TIF67079', 'SIMULASI DAN GAME KOMPUTER', 2, 4, 8, '', 41),
(1402, 'UHO62005', 'BAHASA INGGRIS', 2, 4, 8, '', 41),
(1403, 'UHO7010', 'KEWIRAUSAHAAN', 2, 4, 8, '', 41),
(1404, 'TIF6654', 'KERJA PRAKTEK', 2, 4, 8, '', 41),
(1405, 'TIF67076', 'ETIKA PROFESI', 2, 4, 8, '', 41),
(1406, 'TIF67069', 'REKAYASA PERANGKAT LUNAK BERBASIS OBJEK', 3, 3, 9, '', 41),
(1407, 'UHO61006', 'PENDIDIKAN KARAKTER', 2, 4, 8, '', 41),
(1408, 'UHO68008', 'KKN', 4, 4, 16, '', 41),
(1409, 'UHO6101', 'AGAMA', 3, 4, 12, '', 42),
(1410, 'UHO6102', 'PANCASILA', 2, 4, 8, '', 42),
(1411, 'UHO6103', 'KEWARGANEGARAAN', 2, 4, 8, '', 42),
(1412, 'UHO6104', 'BAHASA INDONESIA', 2, 4, 8, '', 42),
(1413, 'UHO6207', 'WAWASAN KEMARITIMAN', 3, 4, 12, '', 42),
(1414, 'S16216', 'ALGORITMA DAN STRUKTUR DATA', 4, 2, 8, '', 42),
(1415, 'S16217', 'PENGANTAR SISTEM OPERASI', 3, 4, 12, '', 42),
(1416, 'S16111', 'MATEMATIKA DISKRIT', 3, 3, 9, '', 42),
(1417, 'S16112', 'SISTEM DAN TEKNOLOGI INFORMASI', 3, 4, 12, '', 42),
(1418, 'S16113', 'ALGORITMA DAN BAHASA PEMROGRAMAN', 4, 3, 12, '', 42),
(1419, 'S16114', 'ADMINISTRASI BISNIS', 2, 3, 6, '', 42),
(1420, 'S16115', 'DASAR-DASAR PEMROGRAMAN PERANGKAT LUNAK', 3, 3, 9, '', 42),
(1421, 'S16218', 'ARSITEKTUR SISTEM INFORMASI', 3, 4, 12, '', 42),
(1422, 'S16219', 'STATISTIKA', 3, 4, 12, '', 42),
(1423, 'S16220', 'INTERAKSI MANUSIA DAN KOMPUTER', 3, 4, 12, '', 42),
(1424, 'S16221', 'PENGANTAR BASIS DATA', 3, 3, 9, '', 42),
(1425, 'S16322', 'DESAIN DAN MANAJEMEN PROSES BISNIS', 4, 4, 16, '', 42),
(1426, 'S16326', 'RISET OPERASI', 3, 3, 9, '', 42),
(1427, 'S16325', 'MANAJEMEN LAYANAN TEKNOLOGI INFORMASI', 3, 3, 9, '', 42),
(1428, 'S16327', 'DESAIN BASIS DATA', 3, 3, 9, '', 42),
(1429, 'S16328', 'SIMULASI SISTEM', 2, 4, 8, '', 42),
(1430, 'S16536', 'SISTEM INFORMASI MANAJEMEN', 3, 3, 9, '', 42),
(1431, 'S16323', 'JARINGAN KOMPUTER', 3, 3, 9, '', 42),
(1432, 'S16324', 'PEMROGRAMAN BERORIENTASI OBJEK', 3, 4, 12, '', 42),
(1433, 'TIF62025', 'SISTEM DIGITAL', 3, 3, 9, '', 42),
(1434, 'TIF62053', 'METODE RISET', 2, 4, 8, '', 42),
(1435, 'TIF64013', 'PRAKTIKUM KECERDASAN BUATAN', 1, 3, 3, '', 42),
(1436, 'TIF64045', 'KECERDASAN BUATAN', 2, 2, 4, '', 42),
(1437, 'TIF64046', 'TEORI GRAF DAN AUTOMATA', 2, 4, 8, '', 42),
(1438, 'TIF6416', 'PRAKTIKUM JARINGAN KOMPUTER 1', 1, 4, 4, '', 42),
(1439, 'TIF6434', 'METODE NUMERIK', 2, 4, 8, '', 42),
(1440, 'TIF6439', 'ANALISIS DAN PERANCANGAN SISTEM', 3, 4, 12, '', 42),
(1441, 'TIF6440', 'REKAYASA PERANGKAT LUNAK', 3, 4, 12, '', 42),
(1442, 'UHO62005', 'BAHASA INGGRIS', 2, 4, 8, '', 42),
(1443, 'TIF65018', 'PRAKTIKUM JARINGAN KOMPUTER 2', 1, 4, 4, '', 42),
(1444, 'TIF65042', 'PENGANTAR MANAJEMEN PROYEK PERANGKAT LUNAK', 2, 4, 8, '', 42),
(1445, 'TIF65047', 'GRAFIKA KOMPUTER', 3, 4, 12, '', 42),
(1446, 'TIF65049', 'DATA MINING', 3, 4, 12, '', 42),
(1447, 'TIF65056', 'KRIPTOGRAFI', 3, 3, 9, '', 42),
(1448, 'TIF65062', 'MULTIMEDIA', 3, 4, 12, '', 42),
(1449, 'TIF6648', 'ARSITEKTUR PERANGKAT LUNAK', 3, 4, 12, '', 42),
(1450, 'TIF6655', 'MANAJEMEN PROYEK PERANGKAT LUNAK', 3, 4, 12, '', 42),
(1451, 'TIF6657', 'PEMROGRAMAN PERANGKAT MOBILE', 3, 4, 12, '', 42),
(1452, 'TIF6658', 'ANIMASI KOMPUTER', 3, 4, 12, '', 42),
(1453, 'TIF6678', 'SISTEM INFORMASI GEOGRAFIS', 2, 4, 8, '', 42),
(1454, 'TIF6654', 'KERJA PRAKTEK', 2, 4, 8, '', 42),
(1455, 'TIF67012', 'MIKROPROSESOR DAN MIKROKONTROLLER', 2, 4, 8, '', 42),
(1456, 'TIF67067', 'ETIKA PROFESI', 2, 4, 8, '', 42),
(1457, 'TIF67068', 'SISTEM PENDUKUNG KEPUTUSAN', 3, 4, 12, '', 42),
(1458, 'TIF67069', 'REKAYASA PERANGKAT LUNAK BERBASIS OBJEK', 3, 3, 9, '', 42),
(1459, 'UHO61006', 'PENDIDIKAN KARAKTER', 2, 4, 8, '', 42),
(1460, 'UHO67010', 'KEWIRAUSAHAAN', 2, 4, 8, '', 42),
(1461, 'UHO68008', 'KKN', 4, 4, 16, '', 42),
(1462, 'UHO61001', 'PENDIDIKAN AGAMA', 3, 4, 12, '', 43),
(1463, 'UHO61002', 'PANCASILA', 2, 4, 8, '', 43),
(1464, 'UHO61004', 'BAHASA INDONESIA', 2, 4, 8, '', 43),
(1465, 'UHO61009', 'TEKNOLOG INFORMASI', 2, 4, 8, '', 43),
(1466, 'UHO62003', 'KEWARGANEGARAAN', 2, 4, 8, '', 43),
(1467, 'UHO62007', 'WAWASAN KEMARITIMAN', 3, 4, 12, '', 43),
(1468, 'TIF61011', 'ALGORITMA DAN PEMROGRAMAN', 4, 4, 16, '', 43),
(1469, 'UHO61005', 'BAHASA INGGRIS', 2, 4, 8, '', 43),
(1470, 'TIG61014', 'KALKULUS 1', 2, 4, 8, '', 43),
(1471, 'TIG61015', 'MATEMATIKA DISKRIT', 3, 4, 12, '', 43),
(1472, 'TIF61017', 'FISIKA', 2, 3, 6, '', 43),
(1473, 'TIF61019', 'PRAKTIKUM APLIKASI KOMPUTER', 1, 3, 3, '', 43),
(1474, 'TIF62020', 'PEMROGRAMAN DASAR', 2, 4, 8, '', 43),
(1475, 'TIF62022', 'PRAKTIKUM PEMROGRAMAN DASSAR', 1, 2, 2, '', 43),
(1476, 'TIF62021', 'KALKULUS 2', 2, 4, 8, '', 43),
(1477, 'TIF62023', 'ALJABAR LINEAR', 3, 2, 6, '', 43),
(1478, 'TIF62024', 'SISTEM BASIS DATA', 3, 3, 9, '', 43),
(1479, 'TIF62025', 'SISTEM DIGITAL', 3, 3, 9, '', 43),
(1480, 'TIF62026', 'SISTEM OPERASI', 2, 4, 8, '', 43),
(1481, 'TIF62053', 'METODE RISET', 2, 3, 6, '', 43),
(1482, 'TIF63027', 'PEMROGRAMAN WEB', 2, 4, 8, '', 43),
(1483, 'TIF63028', 'PRAKTIKUM PEMROGRAMAN WEB', 1, 3, 3, '', 43),
(1484, 'TIF63029', 'SISTEM INFORMASI', 3, 4, 12, '', 43),
(1485, 'TIF63030', 'SISTEM BASIS DATA LANJUT', 2, 4, 8, '', 43),
(1486, 'TIF63031', 'SISTEM BERKAS', 3, 3, 9, '', 43),
(1487, 'TIF63032', 'ORGANISASI DAN ARSITEKTUR KOMPUTER', 3, 3, 9, '', 43),
(1488, 'TIF63033', 'PROBABILITAS DAN STATISTIKA', 2, 2, 4, '', 43),
(1489, 'TIF63038', 'KOMUNIKASI DATA', 2, 4, 8, '', 43),
(1490, 'TIF63041', 'INTERAKSI MANUSIA DAN KOMPUTER', 3, 4, 12, '', 43),
(1491, 'TIF64013', 'PRAKTIKUM KECERDASAN BUATAN', 1, 4, 4, '', 43),
(1492, 'TIF65045', 'KECERDASAN BUATAN', 2, 4, 8, '', 43),
(1493, 'TIF6416', 'PRAKTIKUM JARINGAN KOMPUTER 1', 1, 4, 4, '', 43),
(1494, 'TIF6434', 'METODE NUMERIK', 2, 4, 8, '', 43),
(1495, 'TIF6435', 'STRUKTUR DATA', 3, 4, 12, '', 43),
(1496, 'TIF6436', 'PRAKTIKUM STRUKTUR DATA', 1, 4, 4, '', 43),
(1497, 'TIF6437', 'JARINGAN KOMPUTER', 2, 2, 4, '', 43),
(1498, 'TIF6439', 'ANALISIS DAN PERANCANGAN SISTEM', 3, 4, 12, '', 43),
(1499, 'TIF6440', 'REKAYASA PERANGKAT LUNAK', 3, 4, 12, '', 43),
(1500, 'TIF64046', 'TEORI DAN GRAF AUTOMATA', 2, 4, 8, '', 43),
(1501, 'TIF65018', 'PRAKTIKUM JARINGAN KOMPUTER 2', 1, 3, 3, '', 43),
(1502, 'TIF65042', 'PENGANTAR MANAJEMEN PROYEK PERANGKAT LUNAK', 2, 4, 8, '', 43),
(1503, 'TIF65043', 'PEMROGRAMAN BERORIENTASI OBJEK', 2, 4, 8, '', 43),
(1504, 'TIF65044', 'PRAKTIKUM PEMROGRAMAN BERORIENTASI OBJEK', 1, 4, 4, '', 43),
(1505, 'TIF65047', 'GRAFIKA KOMPUTER', 3, 3, 9, '', 43),
(1506, 'TIF65049', 'DATA MINING (PILIHAN MINAT 1)', 3, 4, 12, '', 43),
(1507, 'TIF65056', 'KRIPTOGRAFI', 3, 4, 12, '', 43),
(1508, 'TIF65062', 'MULTIMEDIA', 3, 4, 12, '', 43),
(1509, 'TIF6675', 'KOMPUTASI GRID (PILIHAN 1)', 2, 4, 8, '', 43),
(1510, 'TIF67012', 'MIKROPROSESOR DAN MIKROKONTROLLER', 2, 4, 8, '', 43),
(1511, 'TIF67067', 'ETIKA PROFESI', 2, 4, 8, '', 43),
(1512, 'UHO67010', 'KEWIRAUSAHAAN', 2, 3, 6, '', 43);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id_hak_akses` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id_hak_akses`, `id_user_level`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 6),
(5, 2, 7),
(6, 2, 8),
(7, 2, 99),
(8, 2, 12),
(9, 2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_trans`
--

CREATE TABLE `tbl_info_trans` (
  `id_info_trans` int(11) NOT NULL,
  `no_surat_trans` varchar(255) NOT NULL,
  `nama_mhs_info` varchar(255) NOT NULL,
  `nim_mhs_info` varchar(255) NOT NULL,
  `prgstd_mhs_info` varchar(255) NOT NULL,
  `jml_sks` int(11) NOT NULL,
  `nilai_ipk` float NOT NULL,
  `id_sign` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_info_trans`
--

INSERT INTO `tbl_info_trans` (`id_info_trans`, `no_surat_trans`, `nama_mhs_info`, `nim_mhs_info`, `prgstd_mhs_info`, `jml_sks`, `nilai_ipk`, `id_sign`) VALUES
(14, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(15, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(16, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(17, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(18, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(19, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(20, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(21, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(22, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(23, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(24, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(25, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(26, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(27, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(28, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(29, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(30, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(31, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(32, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(33, '-', 'MUH FACHRUL', 'E1E117037', 'TEKNIK INFORMATIKA', 72, 3.76, 0),
(34, '-', 'MUH FACHRUL', 'E1E117037', 'TEKNIK INFORMATIKA', 72, 3.76, 0),
(35, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(36, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.78, 0),
(37, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(38, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(39, '-', 'ALPIN', 'E1E1', 'TEKNIK INFORMATIKA', 72, 3.72, 0),
(40, '-', 'MUH FACHRUL', 'E1E117037', 'S1-TEKNIK INFORMATIKA', 140, 3.56, 0),
(41, '-', 'MUH FACHRUL', 'E1E117037', 'S1-TEKNIK INFORMATIKA', 140, 3.56, 0),
(42, '-', 'SINDI SANTIJA', 'E1E117053', 'S1-TEKNIK INFORMATIKA', 140, 3.63, 43),
(43, '-', 'ETRILIAN TONGALU', 'E1E118003', 'S1-TEKNIK INFORMATIKA', 113, 3.65, 44);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_key`
--

CREATE TABLE `tbl_key` (
  `id_key` int(11) NOT NULL,
  `public_key` varchar(255) NOT NULL,
  `private_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_key`
--

INSERT INTO `tbl_key` (`id_key`, `public_key`, `private_key`) VALUES
(1, '11|2', '11|3\r\n'),
(2, '2921|5', '2921|1109'),
(3, '481|5', '481|173'),
(4, '2921|5', '2921|1109'),
(5, '377|5', '377|269'),
(6, '2599,3', '2599,1643'),
(7, '2501633|5', '2501633|1499033'),
(8, '2024353,5', '2024353,1212905'),
(9, '299|5', '299|53'),
(10, '2537|5', '2537|1949'),
(11, '299|5', '299|53'),
(12, '299|5', '299|53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` char(1) NOT NULL COMMENT 'y=yes, n=no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'Kelola Pengguna', 'admin/user', 'fas fa-user', 0, 'y'),
(2, 'Kelola Level', 'admin/level', 'fas fa-users', 0, 'y'),
(3, 'Kelola Menu', 'admin/menu', 'fas fa-bars', 0, 'y'),
(4, 'Menu', 'menu', '', 3, 'y'),
(5, 'Hak Akses', 'menu/hak_akses', '', 3, 'y'),
(6, 'Tanda Tangan Dokumen', 'user/sign', 'fas fa-signature', 0, 'y'),
(7, 'Riwayat Penanda Tanganan', 'user/log', 'fas fa-list', 0, 'y'),
(8, 'Pengaturan', 'user/setting', 'fas fa-cog', 0, 'y'),
(9, 'Akun', 'user/setting', 'fas fa-user', 8, 'y'),
(10, 'Kunci', 'user/setting/key', 'fas fa-key', 8, 'y'),
(12, 'Data Mahasiswa', '', 'fas fa-users', 0, 'y'),
(13, 'Angkatan', 'user/mahasiswa/angkatan', '', 12, 'y'),
(14, 'Input Data', 'user/mahasiswa', '', 12, 'y'),
(15, 'Transkrip Nilai', 'user/transkrip', 'fas fa-file-signature', 0, 'y'),
(99, 'Dashboard', 'user/dashboard', 'fas fa-tachometer-alt', 0, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sign`
--

CREATE TABLE `tbl_sign` (
  `id` int(11) NOT NULL,
  `date_sign` int(11) NOT NULL,
  `target_email` varchar(255) NOT NULL,
  `target_whatsapp` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sign`
--

INSERT INTO `tbl_sign` (`id`, `date_sign`, `target_email`, `target_whatsapp`, `file_name`, `id_user`) VALUES
(32, 3123213, 'sadsa', 'dsaasdas', 'sadsa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `default_key` int(11) NOT NULL,
  `picture_profile` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `unique_id`, `username`, `password`, `user_level`, `default_key`, `picture_profile`) VALUES
(1, '94cc0d4ededa6443a29eb63a440a229904f9c6af', 'superadmin', '$2y$10$swO84tcNb9.WoEOk.R9D5OVME0r.84uRBeF1AAKSju4/2eizA.yS2', 1, 0, ''),
(2, '5813efe5c3f25dbb907947690a3e17f5d01bf874', 'jurusanteknikinformatika', '$2y$10$06/UcjVZfr5lr3X2QQpNLeNCZX/YYhLrMxFVNgUPXtWDBixmsL8Gu', 2, 0, ''),
(5, 'f493f33412e8c6920d1a9ef3cee454a571238cb9', 'Teknik_Informatika', '$2y$10$swO84tcNb9.WoEOk.R9D5OVME0r.84uRBeF1AAKSju4/2eizA.yS2', 2, 6, 'e36551685cc0f6b77abc4ccf44f584d8.png'),
(6, 'f3949a1a81424ebf18d2470399fb876d93b2f88e', 'erisboreasgreyrat', '$2y$10$n37D7pxg0UHoVhD6rbL3VO5A82luu.JytNP/X8MvKuAPr/k4Hv46u', 2, 8, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL,
  `date_modificate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id`, `nama`, `date_created`, `date_modificate`) VALUES
(1, 'Super Admin', 1618873456, 1618873456),
(2, 'Admin', 1618873456, 1618873456),
(4, 'Newbie', 1618941861, 1618941891);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_angkatan`
--
ALTER TABLE `tbl_angkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_detail_trans`
--
ALTER TABLE `tbl_detail_trans`
  ADD PRIMARY KEY (`id_detail_trans`);

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`);

--
-- Indexes for table `tbl_info_trans`
--
ALTER TABLE `tbl_info_trans`
  ADD PRIMARY KEY (`id_info_trans`);

--
-- Indexes for table `tbl_key`
--
ALTER TABLE `tbl_key`
  ADD PRIMARY KEY (`id_key`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_sign`
--
ALTER TABLE `tbl_sign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_angkatan`
--
ALTER TABLE `tbl_angkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_detail_trans`
--
ALTER TABLE `tbl_detail_trans`
  MODIFY `id_detail_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1513;

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id_hak_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_info_trans`
--
ALTER TABLE `tbl_info_trans`
  MODIFY `id_info_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_key`
--
ALTER TABLE `tbl_key`
  MODIFY `id_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tbl_sign`
--
ALTER TABLE `tbl_sign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
