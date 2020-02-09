-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 12:09 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_diagnosa_kucing`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_diagnosa`
--

CREATE TABLE IF NOT EXISTS `detail_diagnosa` (
  `id_diagnosa` varchar(10) NOT NULL,
  `id_gejala` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_diagnosa`
--

INSERT INTO `detail_diagnosa` (`id_diagnosa`, `id_gejala`) VALUES
('D004', 'G002'),
('D005', 'G010'),
('D005', 'G002');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE IF NOT EXISTS `diagnosa` (
  `id_diagnosa` varchar(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_kucing` int(10) NOT NULL,
  `id_solusi` varchar(10) NOT NULL,
  `tgl_diagnosa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`id_diagnosa`, `id_user`, `id_kucing`, `id_solusi`, `tgl_diagnosa`) VALUES
('D001', 2, 7, 'S001', '2019/10/27 12:20:07'),
('D002', 2, 3, 'S004', '2019/10/28 00:25:04'),
('D003', 2, 3, 'S002', '2019/10/28 19:20:32'),
('D004', 2, 7, 'S005', '2019/10/29 04:57:03'),
('D005', 2, 7, 'S005', '2019/10/29 04:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE IF NOT EXISTS `gejala` (
  `id_gejala` varchar(10) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`) VALUES
('G001', 'Diare'),
('G002', 'Hewan Kurus'),
('G003', 'Rambut Kusam'),
('G004', 'Rambut Rontok'),
('G005', 'Gatal-gatal / Sering Menggaruk'),
('G006', 'Terdapat Kerak'),
('G007', 'Luka / Bau di Daerah Telinga atau Ujung Hidung'),
('G008', 'Terlihat Parasit / Gatal Karena Parasit'),
('G009', 'Penebalan Kulit Mati di Sekitar Kaki, Telinga, atau Ujung Hidung'),
('G010', 'Lesu / Lemah'),
('G011', 'Demam'),
('G012', 'Muntah'),
('G013', 'Tidak Nafsu Makan'),
('G014', 'Buang Air Terganggu / Sulit'),
('G015', 'Sariawan'),
('G016', 'Perut Membesar / Terasa Kebas'),
('G017', 'Berat Badan Menurun'),
('G018', 'Gusi Pucat'),
('G019', 'Flu'),
('G020', 'Mudah Terserang Penyakit'),
('G021', 'Mata Merah / Bengkak'),
('G022', 'Hewan Galak dan Agresif'),
('G023', 'Takut Cahaya dan Air'),
('G024', 'Suka Menggigit'),
('G025', 'Keluar Air Liur');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kucing`
--

CREATE TABLE IF NOT EXISTS `jenis_kucing` (
  `id_jenis_kucing` varchar(10) NOT NULL,
  `jenis_kucing` varchar(30) NOT NULL,
  `masa_hidup` varchar(15) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kucing`
--

INSERT INTO `jenis_kucing` (`id_jenis_kucing`, `jenis_kucing`, `masa_hidup`, `keterangan`, `gambar`) VALUES
('J001', 'asdasd', '4555', 'Kemajuan teknologi memang sangat penting untuk kehidupan manusia zaman sekarang. Karena teknologi adalah salah satu penunjang kemajuan manusia. Di banyak masyarakat, teknologi telah membantu memperbaiki ekonomi, pangan, komputer, dan masih banyak lagi. Hal ini juga berdampak tak terkecuali pada bidang pendidikan. Dunia pendidikan zaman sekarang telah semakin canggih pada pelaksanaannya. Tidak hanya menggunakan papan tulis dan kapur, namun telah beralih pada komputer dan proyektor. Para pendidik pun semakin mudah dalam membagikan ilmunya dengan bantuan teknologi, salah satunya yang dikenal dengan nama Internet. Melalui Internet, pendidik dan murid tidak harus bertatap muka dalam kegiatan belajar mengajar, melainkan dapat melakukannya secara online di tempat masing-masing.\r\nDalam sisi anak usia dini, banyak anak yang â€˜takutâ€™ akan belajar, karena mereka dituntut untuk selalu belajar dengan buku dan pensil untuk mendapatkan nilai yang bagus. Ketakutan tersebut akan menimbulkan ketidakpercayadirian sang anak terhadap kemampuan mereka. Maka dari itu, anak usia dini tidak bisa â€˜dipaksaâ€™ hanya untuk belajar, tetapi  belajar harus disandingkan dengan bermain. Salah satu pelajaran yang ditakuti oleh anak usia dini adalah matematika dasar. Gambaran atau informasi yang tidak benar dari luar diri anak yang mencoba mendeskripsikan matematika sebagai sesuatu yang rumit, turut memberikan andil yang cukup signifikan bagi meningkatnya ketakutan anak pada matematika sebelum mempelajarinya. Anak-anak seringkali begitu tegang menghadapi pelajaran matematika bahkan beberapa anak menjadi hilang kepercayaan diri. Selain itu, karakterisitik matematikayang abstrak dan sistematis menjadi salah satu alasan sulitnya anak usia dini dalam memahami konsep matematika.\r\nGame adalah permainan yang menggunakan media elektronik, merupakan sebuah hiburan berbentuk multimedia yang dibuat semenarik mungkin agar pemain bisa mendapatkan sesuatu sehingga adanya kepuasaan batin. Penerapan game untuk media pendidikan atau yang disebut education game bermula dari perkembangan video game yang sangat pesat dan menjadikannya sebagai media alternatif untuk kegiatan pembelajaran. Oleh karena itu, game edukasi ini perlu dikembangkan dan seharusnya game tidak hanya menyenangkan, tapi juga dapat mendidik. Melihat kepopuleran game tersebut, diharapkan para pendidik berpikir bahwa mereka mempunyai kesempatan yang baik untuk menggunakan komponen rancangan game dan menerapkannya pada pembelajaran yang disesuaikan dengan kurikulum. \r\nGame edukasi merupakan sebuah permainan yang telah dirancang untuk mengajarkan pemainnya tentang topik tertentu, memperluas konsep, memperkuat pembangunan, memahami sebuah peristiwa sejarah atau budaya, atau membantu mereka dalam belajar keterampilan karena mereka bermain. Munculnya berbagai macam game, termasuk game edukasi juga dipengaruhi oleh semakin berkembangnya teknologi di sekitar kita. Berdasarkan minat siswa pada permainan, itu dapat digunakan dalam bidang pendidikan sebagai media untuk membantu siswa belajar lebih baik. Aspek edukatif dan konstruktif dari permainan ini adalah individu ingin maju permainan dan modifikasi cara bermain. Sepertinya kemajuan dan keinginan untuk menang dalam game memotivasi siswa pasif untuk berpikir (Risnawati, 2018:2).\r\nPemanfaatan dan penggunaan game edukasi dapat menunjang proses pembelajaran terhadap anak. Dengan adanya game edukasi, diharapkan semangat anak untuk belajar akan lebih terpacu. Game edukasi juga dapat diterapkan dalam proses belajar matematika terutama pada aspek kognitif. Pembelajaran dengan bermain mempermudah anak untuk berpikir serta anak pun merasa memiliki kesenangan tersendiri, sehingga aspek kognitif yang membutuhkan pemikiran yang lebih besar dapat diasah. Permainan yang membuat anak senang dengan alat peraga dapat meningkatkan kreatifitas anak dalam berhitung. \r\nMasuknya game edukasi dapat melahirkan suasana yang menyenangkan dalam proses belajar anak. Gambar dan suara yang muncul membuat anak tidak merasa bosan, karena sifat anak suka cepat jenuh apabila mata pelajaran dikemas dalam bentuk tulisan. Hal ini dikarenakan pada usia dini anak sangat peka terhadap rangsangan yang diterima dari lingkungan. Rasa ingin tahunya yang tinggi akan tersalurkan apabila mendapatkan rangsangan yang sesuai dengan tugas perkembangannya. Ini diyakini akan berhasil memacu anak untuk mempelajari sesuatu dengan minat, kebutuhan dan kemampuannya. \r\n', ''),
('J002', 'jenis kucing1', '5', 'ASD', 'Jellyfish.jpg'),
('J003', 'mahal', '20', 'ini kucing mahal', 'Koala.jpg'),
('J004', 'murah', '1', 'kucing murahan', 'Desert.jpg'),
('J005', '', '', '', ''),
('J006', 'kucing cebol', '5', 'ya cebol', 'Munchkin.png'),
('J007', 'gggggg', '5', 'ggggggggg', ''),
('J008', 'jjjjjjjjjjjjjjjjjjj', '5', 'ggggggggg', ''),
('J009', 'jjjj5555', '5', 'llll', ''),
('J010', 'wwwwww', '2', 'sadasd', ''),
('J011', 'hhhhhhhhhhhhhh', '2', 'fffffffffffffffffffffff', '');

-- --------------------------------------------------------

--
-- Table structure for table `kucing`
--

CREATE TABLE IF NOT EXISTS `kucing` (
  `id_kucing` int(10) NOT NULL,
  `nama_kucing` varchar(30) NOT NULL,
  `umur` int(11) NOT NULL,
  `jenis_kelamin_kucing` varchar(10) NOT NULL,
  `warna_kucing` varchar(20) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `id_jenis_kucing` int(10) NOT NULL,
  `id_pengguna` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kucing`
--

INSERT INTO `kucing` (`id_kucing`, `nama_kucing`, `umur`, `jenis_kelamin_kucing`, `warna_kucing`, `gambar`, `id_jenis_kucing`, `id_pengguna`) VALUES
(3, 'kucing1', 0, 'J', 'biru', 'dsaaas.jpg', 4, 2),
(4, 'kucing2', 5, 'B', 'oren', '20180324_200134.jpg', 4, 2),
(5, 'kuciang', 3, 'B', 'hitam', '20180324_200134.jpg', 4, 2),
(6, 'kocheng1', 15, 'J', 'biru', 'Penguins.jpg', 4, 7),
(7, 'chessterjr', 1, 'B', 'biru', 'Penguins.jpg', 4, 2),
(8, 'Lambe', 1, 'B', 'hitam', '', 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` int(10) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat_pengguna` varchar(500) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `hak_akses` varchar(12) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `tgl_lahir`, `email`, `alamat_pengguna`, `jenis_kelamin`, `no_telp`, `hak_akses`, `foto`) VALUES
(2, 'sadasd', 'hohoho', '8b0dc2e34844337434b8475108a490ab', '1995-10-17', 'rivaldish01@gmail.com', 'sad', 'L', '23333', 'pengguna', 'marker.jpg'),
(4, 'Sekar', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00', 'yusufyangtaksempurna@yahoo.co.', '123', 'P', '23333', 'admin', ''),
(7, 'testing', 'testing1', '6b7330782b2feb4924020cc4a57782a9', '17/10/2019', 'test@gmail.com', 'jl. bli', 'L', '23333', 'pengguna', ''),
(8, 'tes dulu', 'tesuser', 'b93939873fd4923043b9dec975811f66', '06/10/2010', 'tesdulu@gmail.com', 'jalanin dulu', 'P', '23333', 'pengguna', '');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit_kucing`
--

CREATE TABLE IF NOT EXISTS `penyakit_kucing` (
  `id_penyakit_kucing` varchar(10) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `nama_penyakit_kucing` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit_kucing`
--

INSERT INTO `penyakit_kucing` (`id_penyakit_kucing`, `kategori`, `nama_penyakit_kucing`, `keterangan`) VALUES
('P001', 'Umum', 'Cacingan', 'cacing cacing di perut curi semua nutrisi. tapi tak perlu takut ada combantrine\r\n'),
('P002', 'Umum', 'Jamur', 'kalpanax obatnya'),
('P003', 'Umum', 'Ear Mites', 'rajinlah korek kuping cing'),
('P004', 'Umum', 'Kutu / Pinjal', 'pakai peditox'),
('P005', 'Umum', 'Skabiosis', 'hehe '),
('P006', 'Umum', 'Kontipasi', 'minum dulcolax'),
('P007', 'Umum', 'FLUTD', 'sanjfn'),
('P008', 'Tidak Umum', 'Feline Calici Virus', 'cvav'),
('P009', 'Tidak Umum', 'Feline Panleukopenia', 'dsvv'),
('P010', 'Tidak Umum', 'Feline Infectious Peritonitis ', 'dsf'),
('P011', 'Tidak Umum', 'Feline Immunodifieicency Virus', 'fnlk'),
('P012', 'Tidak Umum', 'Feline Leukimia Virus', 'vddvs'),
('P013', 'Tidak Umum', 'Feline Chlamydia', 'dsf'),
('P014', 'Tidak Umum', 'Rhinotrachecitis', 'nsnl'),
('P015', 'Tidak Umum', 'Rabies', 'sdafds');

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE IF NOT EXISTS `rule` (
  `id_penyakit_kucing` varchar(10) NOT NULL,
  `id_gejala` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id_penyakit_kucing`, `id_gejala`) VALUES
('P002', 'G001'),
('P002', 'G004'),
('P002', 'G005'),
('P002', 'G008'),
('P007', 'G002'),
('P007', 'G006'),
('P007', 'G010'),
('P007', 'G011'),
('P003', 'G001'),
('P003', 'G017'),
('P003', 'G018'),
('P003', 'G024'),
('P003', 'G025'),
('P010', 'G022'),
('P010', 'G023'),
('P010', 'G024'),
('P001', 'G004'),
('P001', 'G010'),
('P001', 'G012');

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE IF NOT EXISTS `solusi` (
  `id_solusi` varchar(10) NOT NULL,
  `solusi` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `id_penyakit_kucing` varchar(10) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id_solusi`, `solusi`, `keterangan`, `id_penyakit_kucing`, `gambar`) VALUES
('S001', 'Lalalalalalla', 'ggggggggggggggggggggggggg', 'P0010', ''),
('S002', 'hgghjghjhgfgfs', 'sddfssfdsdfsdsdf', 'P001', 'coba2.png'),
('S003', 'asdasdasdas', 'asdasdas', 'P003', ''),
('S004', 'bingung', 'asdasdas', 'P002', ''),
('S005', 'minum obat cacing', 'sadasdas', 'P007', '');

-- --------------------------------------------------------

--
-- Table structure for table `tips_kucing`
--

CREATE TABLE IF NOT EXISTS `tips_kucing` (
  `id_tips` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar_tips` varchar(30) NOT NULL,
  `judul` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tips_kucing`
--

INSERT INTO `tips_kucing` (`id_tips`, `keterangan`, `gambar_tips`, `judul`) VALUES
('T001', 'asd', 'Jellyfish.jpg', 'asdsadas'),
('T002', 'asd', 'Chrysanthemum.jpg', 'asd'),
('T003', 'pas lagi pengen datengin', 'Tulips.jpg', 'cara menjinakan mantan'),
('T004', 'Kemajuan teknologi memang sangat penting untuk kehidupan manusia zaman sekarang. Karena teknologi adalah salah satu penunjang kemajuan manusia. Di banyak masyarakat, teknologi telah membantu memperbaiki ekonomi, pangan, komputer, dan masih banyak lagi. Hal ini juga berdampak tak terkecuali pada bidang pendidikan. Dunia pendidikan zaman sekarang telah semakin canggih pada pelaksanaannya. Tidak hanya menggunakan papan tulis dan kapur, namun telah beralih pada komputer dan proyektor. Para pendidik pun semakin mudah dalam membagikan ilmunya dengan bantuan teknologi, salah satunya yang dikenal dengan nama Internet. Melalui Internet, pendidik dan murid tidak harus bertatap muka dalam kegiatan belajar mengajar, melainkan dapat melakukannya secara online di tempat masing-masing.\r\nDalam sisi anak usia dini, banyak anak yang â€˜takutâ€™ akan belajar, karena mereka dituntut untuk selalu belajar dengan buku dan pensil untuk mendapatkan nilai yang bagus. Ketakutan tersebut akan menimbulkan ketidakpercayadirian sang anak terhadap kemampuan mereka. Maka dari itu, anak usia dini tidak bisa â€˜dipaksaâ€™ hanya untuk belajar, tetapi  belajar harus disandingkan dengan bermain. Salah satu pelajaran yang ditakuti oleh anak usia dini adalah matematika dasar. Gambaran atau informasi yang tidak benar dari luar diri anak yang mencoba mendeskripsikan matematika sebagai sesuatu yang rumit, turut memberikan andil yang cukup signifikan bagi meningkatnya ketakutan anak pada matematika sebelum mempelajarinya. Anak-anak seringkali begitu tegang menghadapi pelajaran matematika bahkan beberapa anak menjadi hilang kepercayaan diri. Selain itu, karakterisitik matematikayang abstrak dan sistematis menjadi salah satu alasan sulitnya anak usia dini dalam memahami konsep matematika.\r\nGame adalah permainan yang menggunakan media elektronik, merupakan sebuah hiburan berbentuk multimedia yang dibuat semenarik mungkin agar pemain bisa mendapatkan sesuatu sehingga adanya kepuasaan batin. Penerapan game untuk media pendidikan atau yang disebut education game bermula dari perkembangan video game yang sangat pesat dan menjadikannya sebagai media alternatif untuk kegiatan pembelajaran. Oleh karena itu, game edukasi ini perlu dikembangkan dan seharusnya game tidak hanya menyenangkan, tapi juga dapat mendidik. Melihat kepopuleran game tersebut, diharapkan para pendidik berpikir bahwa mereka mempunyai kesempatan yang baik untuk menggunakan komponen rancangan game dan menerapkannya pada pembelajaran yang disesuaikan dengan kurikulum. \r\nGame edukasi merupakan sebuah permainan yang telah dirancang untuk mengajarkan pemainnya tentang topik tertentu, memperluas konsep, memperkuat pembangunan, memahami sebuah peristiwa sejarah atau budaya, atau membantu mereka dalam belajar keterampilan karena mereka bermain. Munculnya berbagai macam game, termasuk game edukasi juga dipengaruhi oleh semakin berkembangnya teknologi di sekitar kita. Berdasarkan minat siswa pada permainan, itu dapat digunakan dalam bidang pendidikan sebagai media untuk membantu siswa belajar lebih baik. Aspek edukatif dan konstruktif dari permainan ini adalah individu ingin maju permainan dan modifikasi cara bermain. Sepertinya kemajuan dan keinginan untuk menang dalam game memotivasi siswa pasif untuk berpikir (Risnawati, 2018:2).\r\nPemanfaatan dan penggunaan game edukasi dapat menunjang proses pembelajaran terhadap anak. Dengan adanya game edukasi, diharapkan semangat anak untuk belajar akan lebih terpacu. Game edukasi juga dapat diterapkan dalam proses belajar matematika terutama pada aspek kognitif. Pembelajaran dengan bermain mempermudah anak untuk berpikir serta anak pun merasa memiliki kesenangan tersendiri, sehingga aspek kognitif yang membutuhkan pemikiran yang lebih besar dapat diasah. Permainan yang membuat anak senang dengan alat peraga dapat meningkatkan kreatifitas anak dalam berhitung. \r\nMasuknya game edukasi dapat melahirkan suasana yang menyenangkan dalam proses belajar anak. Gambar dan suara yang muncul membuat anak tidak merasa bosan, karena sifat anak suka cepat jenuh apabila mata pelajaran dikemas dalam bentuk tulisan. Hal ini dikarenakan pada usia dini anak sangat peka terhadap rangsangan yang diterima dari lingkungan. Rasa ingin tahunya yang tinggi akan tersalurkan apabila mendapatkan rangsangan yang sesuai dengan tugas perkembangannya. Ini diyakini akan berhasil memacu anak untuk mempelajari sesuatu dengan minat, kebutuhan dan kemampuannya. \r\n', '', 'ffffffffffffffffffffffffffffff'),
('T005', 'sadasds', 'logo_mydents.png', 'sadasdas');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_analisa`
--

CREATE TABLE IF NOT EXISTS `tmp_analisa` (
  `id_gejala` varchar(10) NOT NULL,
  `id_penyakit_kucing` varchar(10) NOT NULL,
  `id_kucing` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_gejala`
--

CREATE TABLE IF NOT EXISTS `tmp_gejala` (
  `id_gejala` varchar(10) NOT NULL,
  `id_kucing` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_penyakit_kucing`
--

CREATE TABLE IF NOT EXISTS `tmp_penyakit_kucing` (
  `id_penyakit_kucing` varchar(10) NOT NULL,
  `id_kucing` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `jenis_kucing`
--
ALTER TABLE `jenis_kucing`
  ADD PRIMARY KEY (`id_jenis_kucing`);

--
-- Indexes for table `kucing`
--
ALTER TABLE `kucing`
  ADD PRIMARY KEY (`id_kucing`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `penyakit_kucing`
--
ALTER TABLE `penyakit_kucing`
  ADD PRIMARY KEY (`id_penyakit_kucing`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id_solusi`);

--
-- Indexes for table `tips_kucing`
--
ALTER TABLE `tips_kucing`
  ADD PRIMARY KEY (`id_tips`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kucing`
--
ALTER TABLE `kucing`
  MODIFY `id_kucing` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
