-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Sep 2025 pada 12.19
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahbudayasumba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about_us`
--

CREATE TABLE `about_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL,
  `title` text NOT NULL,
  `subtitle` text DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `about_us`
--

INSERT INTO `about_us` (`id`, `image`, `title`, `subtitle`, `description`, `created_at`, `updated_at`) VALUES
(5, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756694648/gm6aq7pjlygqgfzoid05.jpg', 'Sumba – Latar Belakang Sejarah', 'Pulau kecil di ujung timur Nusa Tenggara yang menyimpan kekayaan budaya dan alam memukau.', 'Rumah Budaya Sumba lahir dari semangat untuk menjaga dan memperkenalkan kekayaan budaya Sumba kepada dunia. Didirikan dengan nilai gotong royong masyarakat lokal, tempat ini menjadi simbol pelestarian tradisi sekaligus ruang belajar bagi generasi muda. Rumah Budaya Sumba adalah museum khusus yang digunakan untuk memperkenalkan sejarah dan budaya Sumba. Fungsi Rumah Budaya Sumba adalah sebagai museum sekaligus tempat wisata, penelitian, dan pertemuan, serta pusat pembelajaran kebudayaan Sumba. Rumah Budaya Sumba mengoleksi berbagai macam peninggalan kelompok etnik daerah Sumba yang berasal dari masa prasejarah hingga masa kini. Koleksi-koleksi ini merupakan sumbangan koleksi pribadi Pater Robert Ramone dan sumbangan dari setiap rumah adat Sumba.', '2025-08-21 02:27:27', '2025-09-01 20:38:52'),
(9, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756786710/uhehkavojsurc0auukve.jpg', 'Pesona Laut Sumba', 'Keindahan yang Menyatu dengan Budaya', 'Hamparan laut biru jernih dan pantai yang tenang menjadi bagian tak terpisahkan dari pengalaman di Rumah Budaya Sumba. Di sini, pengunjung tidak hanya merasakan kehangatan budaya dan tradisi, tetapi juga disuguhkan panorama alam yang memukau sepanjang hari. Ombak yang berirama lembut berpadu dengan hembusan angin tropis, menciptakan suasana yang damai dan menyegarkan jiwa.\r\n\r\nDari pagi hingga senja, lautan ini menawarkan pesona yang berbeda. Di pagi hari, sinar matahari yang hangat menyinari permukaan laut seperti permadani kristal biru. Menjelang sore, langit mulai bergradasi keemasan, menghadirkan panorama matahari terbenam di ufuk barat yang seolah melukis cakrawala. Momen ini menjadikan setiap kunjungan begitu istimewa, menghadirkan ketenangan, keindahan yang abadi, dan kenangan yang akan selalu melekat di hati.\r\n\r\nKeindahan laut ini adalah bukti bahwa Sumba bukan hanya rumah bagi kekayaan budaya yang luhur, tetapi juga surga alam yang mampu menyatukan hati setiap pengunjung.', '2025-09-01 21:18:27', '2025-09-01 21:19:30'),
(10, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756787179/vbbsvuewlev89m7u5goa.jpg', 'Rumah Adat & Arsitektur', 'Jejak Warisan Leluhur dalam Setiap Tiang dan Atap', 'Rumah adat Sumba, yang dikenal dengan nama Uma Bokulu atau rumah menara, merupakan simbol kuat dari identitas dan kearifan lokal masyarakat Sumba. Arsitekturnya khas dengan atap menjulang tinggi berbentuk menara, melambangkan hubungan antara manusia dengan leluhur dan Sang Pencipta. Setiap bagian rumah memiliki makna mendalam: bagian bawah sebagai tempat hewan ternak, bagian tengah sebagai ruang kehidupan sehari-hari, dan bagian atas sebagai ruang sakral untuk penyimpanan benda pusaka. Keunikan arsitektur ini tidak hanya terletak pada bentuknya, tetapi juga pada proses pembangunannya yang melibatkan gotong royong, doa, serta ritual adat. Material yang digunakan pun sepenuhnya alami—seperti kayu, bambu, dan alang-alang—mencerminkan keharmonisan masyarakat Sumba dengan alam. Rumah adat ini bukan sekadar tempat tinggal, melainkan juga pusat kehidupan sosial, budaya, dan spiritual yang diwariskan lintas generasi.', '2025-09-01 21:24:26', '2025-09-01 21:26:15'),
(11, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756787571/zaj2pzqeh3tstvedqsal.jpg', 'Filosofi & Kepercayaan Marapu', 'Warisan Leluhur yang Menjaga Harmoni Alam dan Manusia', 'Kepercayaan Marapu merupakan jiwa dari budaya Sumba yang telah diwariskan turun-temurun oleh para leluhur. Marapu bukan sekadar sistem kepercayaan, melainkan sebuah filosofi hidup yang menekankan keseimbangan antara manusia, alam, dan Sang Pencipta. Dalam pandangan Marapu, setiap unsur kehidupan—baik pohon, batu, laut, maupun tanah—memiliki roh yang harus dihormati.\r\n\r\nRitual-ritual sakral yang dijalankan masyarakat, seperti persembahan dan upacara adat, menjadi sarana menjaga keharmonisan dengan leluhur dan alam sekitar. Nilai gotong royong, rasa hormat kepada alam, serta penghargaan terhadap kehidupan diwariskan melalui kepercayaan ini. Bagi masyarakat Sumba, Marapu adalah identitas, spiritualitas, sekaligus jembatan yang menghubungkan masa lalu, masa kini, dan masa depan.', '2025-09-01 21:29:05', '2025-09-01 21:32:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Sumba – Latar Belakang Sejarah', 'Bagian utara dan timur dari pulau ini cenderung kering, semen tara bagian selatan dan barat curah hujan lebih banyak dan tanahnya lebih subur. Suhu pada siang hari pada umumnya 30-an ć namun di beberapa tempat pada bagian yang lebih tinggi se perti bagian tengah pulau ini, iklimnya lebih sejuk. Musim penghujan mulai dari bulan Desember sampai bulan Maret, dan selama 8 bulan musim kering (tak ada hujan). Sumba secara mengagumkan amat kaya dengan nilai budaya, khususnya aliran kepercayaan Marapu yang unik. Kepercayaan animis ini mempengaruhi bentuk dan model rumah adat, batu-batu kubur megalitik, pemaka man dan upacara pasola yang terkenal itu. Berhubungan dengan torisme atau pariwisata, Sumba ibarat sebuah mutiara yang belum ditemukan. Saat kini telah banyak hotel dan resort yang tersebar di beberapa pesisir Pantai.  Sumba juga memiliki Pantai-pantai yang sangat indah untuk berselancar. Sumba dapat dicapai melalui udara; ada dua lapangan terbang yakni Lede Kalumbang - Tambolaka di Sumba Barat Daya dan Ir. Mehang Kunda di Sumba Timur. juga bisa dicapai lewat laut melalui dua pelabuhan di Waikelo, Sumba Barat Daya dan di Waingapu, Sumba Timur.', NULL, '2025-08-31 22:11:06', '2025-08-31 22:11:06'),
(4, 'Agama', 'Lebih dari 60 % penduduk Sumba beraliran kepercayaan Marapu. Aliran kepercayaan ini cukup unik karena sa ngat mempengaruhi penduduknya dalam cara berpikir dan bertindak. 40 % lainnya beragama Protestan, Kato lik dan sedikit persentasi penganut agama Islam, Hindu dan Budha. Marapu terbentuk dari 2 kata ‘Mar’ dan ‘Apu’. Mar berarti pencipta semesta dan sumber kehidu pan; Apu berarti kakek. Marapu bersifat animistis, roh dan berupa unsur dina mis. Marapu mengajarkan keseimbangan hidup alam semesta yang di dalamnya manusia dapat mencapai kebahagiaan yang dirindukan. Keseimbangan ini dilam bangkan oleh ‘Ina Mawolo’ (ibu yang menenun) dan ‘Ama Marawi’ (ayah yang memintal). Ina Mawolo dan Ama Marawi hadir di alam semesta dan mengambil bentuk berupa Bulan atau Matahari. Ama Mawolo dan Ina Marawi adalah pasangan suami-isteri yang melahir kan leluhur orang Sumba. Aliran kepercayaan ini yakin bahwa hidup di dunia ini sifatnya sementara belaka atau dengan kata lain setelah hidup ini (dunia) akan datang hidup kekal. Melalui ke matian, seseorang masuk dalam dunia roh; ‘Praing Marapu’ (Nirwana). Keperca-yaan Marapu yakin bahwa semua roh terdiri atas dua unsur yakni ‘Ndewa’ (roh spirit) dan ‘Hamaghu’ (anima-jiwa). Di dalam Surga kekal, roh menjelma dalam hidup manusia di dunia. Dan bentuknya yang paling konkrit ialah hidup ber- pasang-pasangan sebagai pria dan wanita. Marapu diyakini memiliki sebuah rahasia dan sifatnya gaib serta mempengaruhi hidup manusia. Orang Sumba, dalam rangka menghormati arwah para leluhur mereka dapat dilakukan dengan cara menaruh patung atau arca pada batu kubur. Selanjutnya mereka mempersembahkan suatu barang atau benda. Dan wujud yang paling umum ialah ‘sirih-pinang’, mengur bankan hewan seperti ayam, babi atau kerbau. Arca arca pada umumnya terbuat dari kayu dan diukir dalam bentuk wajah manusia (antromorfis).', NULL, '2025-08-31 22:11:35', '2025-08-31 22:11:35'),
(5, 'Batu Kubur Megalitik', 'Para ahli geologi berpendapat bahwa Sumba meru pakan salah satu kebudayaan megalitik yang masih hidup sampai kini. Batu-batu kubur megalitik ukuran besar merupakan sebuah pemandangan biasa yang dapat dilihat di kampung-kampung tradisional di selu ruh pulau Sumba. Dapat diduga bahwa kira-kira 4500 tahun yang lampau kebudayaan megalitik menjadi suatu fakta yang terus hidup sampai sekarang. Batu-batu kubur ini terbuat dari wadas yang keras. Salah satu je nis batu terkenal ialah Batu Tarimbang dari pantai Tarimbang, Sumba Timur. jenis batu ini biasanya lebih mahal karena mirip marmer atau pualam. Batu plat didirikan diatas 4 tiang batu dengan tinggi kurang lebih 1.5 meter; mirip sebuah altar dengan berat kurang lebih 40 – 70 ton. Untuk mendapatkan potongan batu besar ini, masyara kat Sumba mempunyai upacara ‘Tingi Watu’ (tarik batu). Sebelum upacara ini dilangsungkan, pertama-tama mesti mendapat izin dari Marapu; roh pemilik atau penjaga batu tersebut. Ada beberapa upacara yang di lakukan untuk mendapatkan ijin dari ‘pemilik batu’. Pertama, ‘Pogo Watu’, sebuah upacara ritual yang dia dakan di tempat pemotongan atau penggalian batu. Imam Marapu memimpin upacara dengan mempersem bahkan ayam, beras dan sirih pinang kepada roh pemi lik batu. Ia memohon supaya para arwah leluhur meres tui upacara penarikan batu dapat berlangsung dengan baik. Upacara kedua disebut ‘Tingi Watu’ (tarik batu). Ratusan bahkan kadang ribuan orang diperlukan untuk memindahkan batu besar ke tempat yang dikehendaki. Penarikan batu ini biasanya memakan waktu beberapa hari. Pada saat penarikan batu, Untuk menjaga sema ngat para penarik batu, seseorang berdiri di atas batu yang sedang ditarik dengan tujuan memberi semangat kepada para penarik lewat syair dan lagu-lagu adat. Upacara penarikan batu ini memerlukan banyak biaya berupa: uang, hewan berupa babi, kerbau, kuda dll. Bila harga sebuah batu diuangkan, cukup mahal berkisar di atas Rp. 65.000.000 atau sekitar € 5.000,00. Dan juga untuk membeli hewan yang diperlukan untuk upacara ini. juga makan dan minum serta lauk-pauk untuk jum lah besar orang yang ikut ambil bagian dalam upacara ini. Oleh karena itu upacara tarik batu hanya untuk orang orang tertentu atau mampu saja. Upacara terakhir ialah menata kuburan dengan memberi oranamen simbol simbol Marapu pada sekeliling atau pada bagian ter tentu batu kubur tergantung permintaan pemilik. Kebanyakan simbol dihubungkan dengan perjalanan setelah hidup di dunia ini menuju ‘Praing Marapu’ (surga).', NULL, '2025-08-31 22:11:59', '2025-08-31 22:11:59'),
(6, 'Pemakaman', 'Para penganut aliran kepercayaan Marapu meyakini adanya hidup setelah kematian. Itu sebabnya pemaka man orang mati menjadi amat penting dan menjadi ritual adat yang amat mahal. Normalnya, jenazah dise mayamkan selama beberapa hari dan diadakan be berapa upacara sebelum dimakamkan. Akan tetapi, upacara pemakaman dapat ditunda sampai sepuluh tahun atau bahkan lebih. Dan selama itu jenazah tetap disemayamkan di dalam rumah keluarga duka. Hal ini terjadi khususnya untuk keluarga bangsawan. Mengapa lama? Upacara pemakaman mahal! Keluarga perlu mempersiapkan hal-hal yang diperlukan untuk upacara pemakaman tersebut seperti uang dalam jumlah besar, kerbau, sapi, babi dan kadang-kadang kuda untuk dikor bankan (disembelih). Banyak suku di Sumba; menguburkan orang mati dengan posisi seperti janin dalam rahim ibu. Posisi ini melambangkan kelahiran baru dalam rahim bumi yakni di dalam dunia roh. jenazah dibungkus dengan kain tenun ikat yang bagus dan mahal serta perhiasan-per hiasan lainnya. Persiapan-persiapan ini perlu dilakukan sedemikian rupa agar roh si arwah benar-benar siap masuk ke dalam ‘Praing Marapu’ (Surga). Di Praing Marapu itulah mereka (para arwah) memulai hidup baru dalam keabadian dengan pesta atau jamuan besar.', NULL, '2025-08-31 22:12:26', '2025-08-31 22:12:26'),
(7, 'Rumah Adat', 'Rumah adat Sumba bukan sekedar rumah untuk tinggal (dihuni). Rumah tersebut dikerjakan dengan sentuhan seni, penuh dengan simbol-simbol yang merupakan warisan tradisi leluhur mereka yang kaya makna. Pada umumnya kita menyaksikan bahwa rumah-rumah adat tersebut dibangun di atas bukit; dikelilingi pagar batu yang rapih tersusun dan dilengkapi dengan dua pintu gerbang sebagai pintu masuk dan keluar. Dengan letak rumah seperti ini dimaksudkan untuk mengintai musuh lebih mudah. Atau dengan kata lain lebih pada pertimbangan security; melindungi kampung atau suku mereka dari serangan musuh. Empat tiang soko-guru terbuat dari kayu dengan ukuran besar dan kokoh menjadi penopang utama bangunan rumah adat Sumba. Empat pilar ini melambangkan 4 (empat) arah angin utama: Utara, Selatan, Timur dan Barat. Di tengah terletak perapian untuk memasak, yang juga melambangkan Matahari. Setiap tiang dilingkari dengan ring yang terbuat dari kayu atau batu yang menandai ‘lingga’ dan ‘yoni’ atau melambangkan organ kelamin laki dan perempuan. Ada banyak hal yang ter ungkap lewat seni tradisional rumah adat yang di hubungkan dengan aspek-aspek kesuburan atau sek sual (pria dan wanita). Rumah adat ini dirancang dengan menara tinggi yang melambangkan hubungan harmo nis antara manusia dengan roh para leluhur Marapu (Sang Khalik). Fungsi lain dari atap (menara) yang tinggi ialah untuk menyimpan bahan-bahan makanan atau benda-benda pusaka yang bernilai. Selain atap atau menara yang tinggi; rumah-rumah adat tersebut bi asanya dirancang dengan pelataran terbuka yang di dalamnya ada tempat keramat yang disebut ‘natara paddu’ (tempat suci). Pelataran ini menjadi tempat atraksi seni-budaya atau pesta adat/suku dilangsung kan. juga di sekeliling pelataran ini terdapat batu-batu kubur megalitik tempat disemayamkan jasad para le luhur.', NULL, '2025-08-31 22:12:57', '2025-08-31 22:12:57'),
(8, 'Upacara pasola', 'Pasola adalah upacara ritual Marapu. Upacara ini dise lenggarakan hanya oleh orang Sumba bagian barat dengan tujuan merayakan musim tanam padi. Pasola merupakan bentuk ritual untuk menghormati Marapu: mohon pengampunan, kemakmuran dan hasil panen yang melimpah.Upacara ini biasanya diselenggarakan pada bulan Februari di daerah Lamboya dan Kodi; dan pada bulan Maret di daerah Gaura dan Wanukaka. Pe rayaan puncak mulai 6 (enam) sampai 8 (delapan) hari setelah bulan purnama. Sesudah perhitungan tersebut, orang berduyun-duyun ke arah pantai bagian selatan untuk memungut ‘cacing nyale’ (worms). Pada saat inilah upacara pasola dimulai. Saat Pasola berlangsung, para ‘prajurit’ melarikan kuda mereka sambil melemparkan lembing kayu kepada penunggang kuda lainnya. yang menjadi lawan tanding ialah dari suku lain. Mereka yang bertarung di arena pasola mesti mempunyai ketangkasan menunggang kuda dan tangkas pula melempar lembing. Menurut aliran kepercayaan Marapu, darah yang tertumpah akan menyuburkan tanah dan menghasilkan panen yang melimpah. Semakin banyak darah yang tumpah, maka panen akan lebih baik. Para penganut aliran kepercayaan ini yakin pula bahwa setiap tetes darah yang ditumpah kan (korban binatang atau peserta pasola terluka atau bahkan mati di arena Pasola) dianggap sebagai tanda kemakmuran untuk panen yang akan datang. Dan pada akhirnya darah yang tertumpah dan kekerasan Pasola, harmoni dengan alam ciptaan dapat dibangun dan di perbaharui lagi di dalam masyarakat Sumba. Dengan demikian mereka dapat hidup dalam keadaan damai sejahtera dan dalam kebersamaan sebagai orang Sumba.', NULL, '2025-08-31 22:13:23', '2025-08-31 22:13:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `guest_count` int(11) DEFAULT NULL,
  `special_request` text DEFAULT NULL,
  `status` enum('pending','confirmed','canceled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `phone`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'asda', '1312', 'asda@asdas.com', 'asda', 'sadasd', '2025-08-20 21:45:27', '2025-08-20 21:45:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Pemandangan Laut Matahari Terbenam', 'Saksikan keindahan matahari terbenam di atas lautan yang luas. Perpaduan warna jingga, ungu, dan biru menciptakan suasana romantis yang tak terlupakan, sempurna untuk dinikmati bersama orang tercinta.', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756696652/bdzamqf040hhxh9dpova.jpg', '2025-08-25 20:26:13', '2025-08-31 23:10:53'),
(6, 'Pemandangan Laut', 'Nikmati pemandangan laut yang menakjubkan langsung dari kamar maupun area bersantai. Suara deburan ombak dan birunya samudra akan membuat pengalaman menginap Anda semakin istimewa.', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756696621/m0cslykrnk6n0l7tfmgn.jpg', '2025-08-25 20:26:39', '2025-08-31 23:10:39'),
(7, 'Pemandangan Indah', 'Nikmati keindahan pemandangan alam sekitar yang mempesona, mulai dari hamparan hijau hingga birunya langit. Pemandangan ini memberikan suasana damai yang menyegarkan pikiran.', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756696533/ge2l9ymsv4nsaj0jwmm6.jpg', '2025-08-25 20:27:05', '2025-08-31 23:10:23'),
(8, 'Pemandangan Matahari Terbenam', 'Abadikan momen indah saat matahari terbenam dengan panorama yang memukau. Tempat terbaik untuk bersantai sambil menikmati suasana hangat dan romantis menjelang senja.', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756696782/iaeas1biioo4ylk8gtog.jpg', '2025-08-31 20:19:37', '2025-08-31 23:10:13'),
(9, 'Sensasi Santai', 'Rasakan pengalaman relaksasi menyeluruh dengan layanan spa dan pijat yang menenangkan. Cocok untuk melepas penat setelah seharian beraktivitas, memberikan ketenangan jiwa dan raga.', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756696899/psiglac7mcdll2y5ocxr.jpg', '2025-08-31 20:21:35', '2025-08-31 23:09:58'),
(10, 'Kamar yang Nyaman', 'Nikmati kenyamanan kamar dengan desain modern dan fasilitas lengkap. Setiap kamar dirancang untuk memberikan suasana rileks, bersih, serta dilengkapi dengan tempat tidur empuk yang membuat istirahat Anda semakin berkualitas.', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756696970/bmiiknj3v4hv5duh9mmf.jpg', '2025-08-31 20:22:45', '2025-08-31 22:31:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `footer`
--

INSERT INTO `footer` (`id`, `address`, `email`, `phone`, `facebook`, `youtube`, `instagram`, `created_at`, `updated_at`) VALUES
(2, 'Jl. Rumah Budaya no 212 Kalembu Nga’banga Weetebula Southwest Sumba 87254 East Nusa Tenggara Indonesia', 'info@rumahbudayasumba.com', '(+62) 0811 189 2908', 'https://rumahbudayasumba.com/', 'https://rumahbudayasumba.com/', 'https://rumahbudayasumba.com/', '2025-08-21 02:21:51', '2025-08-21 02:21:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `image`, `created_at`, `updated_at`) VALUES
(10, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756693908/hrmicf4vj0y6bwf5u6nb.jpg', '2025-08-31 19:31:44', '2025-08-31 19:31:44'),
(11, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756693934/jjr3bqgzjwbcnxodpa5r.jpg', '2025-08-31 19:32:09', '2025-08-31 19:32:09'),
(12, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756693955/bxhd1zld9stsuzmhds2q.jpg', '2025-08-31 19:32:30', '2025-08-31 19:32:30'),
(13, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756693981/xejvd06hb5osrrqerte3.jpg', '2025-08-31 19:32:56', '2025-08-31 19:32:56'),
(14, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756693990/ibooc3dbaxj6fx5chmud.jpg', '2025-08-31 19:33:06', '2025-08-31 19:33:06'),
(15, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756694007/jmfavg09wxhninjkysgd.jpg', '2025-08-31 19:33:23', '2025-08-31 19:33:23'),
(16, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756694021/rannepajpumiyywgbshc.jpg', '2025-08-31 19:33:36', '2025-08-31 19:33:36'),
(17, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756694053/vc6wdsqhpriyy1m4txcb.jpg', '2025-08-31 19:34:09', '2025-08-31 19:34:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `main_image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `home`
--

INSERT INTO `home` (`id`, `main_image`, `title`, `desc`, `created_at`, `updated_at`) VALUES
(6, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756692147/gfsimznmxef4dy7ot9sm.jpg', 'Selamat Datang di Rumah Budaya Sumba', 'Rumah Budaya Sumba adalah tempat di mana budaya, alam, dan tradisi masyarakat Sumba berpadu menjadi sebuah pengalaman yang tak terlupakan. Di sini, Anda dapat merasakan atmosfer khas Sumba melalui keindahan arsitektur rumah adat yang unik, karya seni tenun ikat yang diwariskan turun-temurun, serta alunan musik dan tarian tradisional yang sarat makna. Lebih dari sekadar destinasi wisata, Rumah Budaya Sumba menjadi jendela untuk memahami nilai kehidupan masyarakat Sumba yang menjunjung tinggi kebersamaan, kesederhanaan, dan kehangatan. Setiap sudutnya menghadirkan cerita mulai dari sejarah leluhur, ritual adat, hingga keramahan penduduk lokal yang akan menyambut Anda seperti keluarga.', '2025-08-31 19:02:23', '2025-09-02 03:56:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `image`, `title`, `desc`, `created_at`, `updated_at`) VALUES
(3, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756704344/ee7jgwtjsy7czethizla.jpg', 'Independence Day Rumah Budaya Sumba', 'The group, named them ‘Friends of Rumah Budaya Sumba’ anchored by Yori Antar and his initiative on community-based cultural promotion ‘Rumah Asuh’ solemnly celebrated the', '2025-08-21 01:52:31', '2025-08-31 22:25:39'),
(4, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1755766467/rgj5bo0o8x4eodedz4ph.jpg', 'SUMBA Forgotten Island: photo voices', 'Illustrated book of Father Robert Ramone, CSsR personal collection canvassing the island with his lenses, passion and imagination display Sumba natural and cultural uniqueness. Designed', '2025-08-21 01:54:28', '2025-08-31 22:24:33'),
(5, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756704234/v8f3qwvkrhlptrlig4sy.jpg', 'A day with Kick Andy', 'Andy Noya, the host of Kick Andy, Indonesia top rated television program made a visit to get closer coverage on cultural promotion of Rumah Budaya', '2025-08-21 01:54:45', '2025-08-31 22:23:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name_room` varchar(100) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL DEFAULT 1,
  `jumlah_tamu` int(11) NOT NULL DEFAULT 1,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  `image6` varchar(255) DEFAULT NULL,
  `image7` varchar(255) DEFAULT NULL,
  `image8` varchar(255) DEFAULT NULL,
  `image9` varchar(255) DEFAULT NULL,
  `image10` varchar(255) DEFAULT NULL,
  `fasilitas1` varchar(255) DEFAULT NULL,
  `fasilitas2` varchar(255) DEFAULT NULL,
  `fasilitas3` varchar(255) DEFAULT NULL,
  `fasilitas4` varchar(255) DEFAULT NULL,
  `fasilitas5` varchar(255) DEFAULT NULL,
  `fasilitas6` varchar(255) DEFAULT NULL,
  `fasilitas7` varchar(255) DEFAULT NULL,
  `fasilitas8` varchar(255) DEFAULT NULL,
  `fasilitas9` varchar(255) DEFAULT NULL,
  `fasilitas10` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `room`
--

INSERT INTO `room` (`id`, `name_room`, `price`, `jumlah_kamar`, `jumlah_tamu`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `image7`, `image8`, `image9`, `image10`, `fasilitas1`, `fasilitas2`, `fasilitas3`, `fasilitas4`, `fasilitas5`, `fasilitas6`, `fasilitas7`, `fasilitas8`, `fasilitas9`, `fasilitas10`, `desc`, `created_at`, `updated_at`) VALUES
(17, 'Kamar Twin dengan Balkon (Twin Room with Balcony)', 459949.00, 1, 2, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756886132/usmg5s0wg0ntq9zwyexs.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756886134/knqrzayu1wxgbbzpzn7u.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756886136/zmer4wbdqz180nqcxely.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756886138/yqxuckbeq5myu2tpiguj.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756886140/fyyqzdnoehsvshfmgbnx.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756886143/ny3ew0v8yrvqhyeapyio.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756886145/gl3wfo4q26o5qce9pqrd.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756886147/j37pr8we4hjr0sjrz5rm.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756886150/izo01dealm56kx10zjov.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756886153/y4ztnsqx8gdzapuksonz.jpg', 'WiFi Gratis', 'Termasuk Sarapan', 'AC', 'Kamar mandi pribadi', 'Balkon/teras', 'Perlengkapan kenyamanan tidur', 'Sandal dalam kamar', 'Perlengkapan kenyamanan tidur', 'Parkir', 'Lantai dasar tersedia', 'Kamar ini menghadirkan kenyamanan lengkap dengan akses difabel dan roll-in shower untuk memudahkan tamu dengan kebutuhan khusus. Setiap kamar dilengkapi kamar mandi pribadi dengan pancuran, handuk, serta perlengkapan mandi yang menunjang kenyamanan. Fasilitas penunjang seperti AC, linen bersih, perlengkapan tidur yang nyaman, dan sandal dalam kamar siap memberikan pengalaman istirahat terbaik. Untuk kebutuhan harian, tersedia air mineral kemasan, area tempat duduk yang nyaman, serta ruang makan terpisah. Kamar juga didesain dengan balkon atau teras untuk bersantai, pilihan lantai dasar bagi tamu yang membutuhkan kemudahan akses, serta lantai ubin atau marmer yang menambah kesan elegan. Setiap detail, termasuk tempat sampah yang disediakan, dirancang agar tamu dapat menikmati suasana menginap yang praktis, nyaman, dan menyenangkan.', '2025-09-03 00:55:48', '2025-09-03 01:14:15'),
(18, 'Kamar King dengan Balkon (King Room with Balcony)', 656760.00, 1, 2, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756887507/l5hmrdfsdy2gdzvcnsb7.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756887509/gz0eu8blgup5ntuyzhr6.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756887511/g1lkqdhtz1wjbtvioyww.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756887513/cml1xeziaa8nxjyuhlz2.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756887515/gaptjzye8rsvg2ocysoq.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756887517/zjabomgf4dkjeje1ou2k.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756887519/hlxlvasyt6qunnz1aqbm.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756887521/fqrzajnadimnbnfmwj2u.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756887523/fvx4vl1gycnjqcfu1cwk.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756887525/vdgs6skuemdt7ektvo5b.jpg', 'Termasuk sarapan', '1 kasur king size', 'Pemandangan: Laut', 'WiFi Gratis', 'Parkir', 'Balkon/teras', 'Perlengkapan kenyamanan tidur', 'Kamar mandi pribadi', 'Lemari pakaian', 'AC', 'Nikmati kenyamanan menginap di Kamar King dengan Balkon yang luas dan elegan, dilengkapi 1 kasur king size dengan perlengkapan tidur berkualitas untuk istirahat optimal. Dari balkon atau teras pribadi, Anda dapat menikmati pemandangan laut yang menenangkan. Kamar ini juga dilengkapi fasilitas modern seperti AC, kamar mandi pribadi dengan pancuran, lemari pakaian, serta air mineral kemasan untuk menunjang kenyamanan Anda. Terletak di lantai dasar yang mudah diakses, kamar ini memberikan kenyamanan sekaligus kemudahan. Setiap tamu berhak menikmati sarapan gratis setiap pagi, WiFi gratis untuk tetap terhubung, serta fasilitas parkir tanpa biaya tambahan. Ditambah lagi, tersedia kebijakan pembatalan gratis sebelum 8 September 2025, sehingga Anda dapat merencanakan perjalanan dengan lebih tenang.', '2025-09-03 01:18:41', '2025-09-03 01:18:41'),
(19, 'Kamar Deluxe Twin dengan Pemandangan Laut (Deluxe Twin Room with Sea View)', 673203.00, 1, 2, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756887920/sffylnz1ydfajzxoxarf.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756887922/crfg9zwmw720ysr9gerw.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756887924/rrbglnnjkmkw19rsdohs.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756887926/pi1uv4o2ecrpqcxjyqhd.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756887928/kz3pb49ysxvfxjxjjcns.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756887930/i7cuck1yc34tdkea1kn1.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756887933/zzvifsvnyuvz9fwslalo.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756887934/ep595wnmvj3i1kkizuiu.jpg', NULL, NULL, 'Termasuk sarapan', 'WiFi Gratis', 'Pemandangan: Laut', '2 kasur single', 'Balkon/teras', 'AC', 'Kamar mandi pribadi', 'Pancuran', 'Sandal dalam kamar', 'Air mineral kemasan', 'Nikmati kenyamanan menginap di Kamar Deluxe Twin dengan Pemandangan Laut, pilihan ideal untuk 2 tamu. Kamar ini dilengkapi dengan 2 kasur single yang nyaman, serta balkon/teras pribadi untuk menikmati panorama laut yang menenangkan.\r\n\r\nSetiap kamar hanya tersedia 1 unit eksklusif, menghadirkan pengalaman privat dan tenang. Untuk kenyamanan Anda, kamar sudah termasuk sarapan pagi, WiFi gratis, dan dilengkapi dengan fasilitas modern seperti AC, air mineral kemasan, serta sandal dalam kamar.\r\n\r\nKamar mandi pribadi dirancang praktis dengan pancuran dan perlengkapan mandi yang lengkap, memastikan pengalaman menginap Anda tetap segar dan menyenangkan.', '2025-09-03 01:25:30', '2025-09-03 01:25:30'),
(20, 'Kamar Twin (Twin Room)', 344889.00, 1, 2, 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756888306/fbi2ruowcypexrzqc4mh.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756888308/m7bebyxaeqpmayo7ccrr.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756888310/tfjd1pf68aeuiviexalp.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756888312/a5btxrv8y7sze7iwlpar.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756888314/f3qbnptxwrv23ihubxrw.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756888316/lye3trjvwnvd2skwrskt.jpg', NULL, NULL, NULL, NULL, 'Termasuk sarapan', 'WiFi Gratis', '2 kasur single', 'Parkir', 'Kamar Nyaman', NULL, NULL, NULL, NULL, NULL, 'Kamar Twin (Twin Room) ini dirancang untuk kenyamanan dua tamu dengan dilengkapi 2 kasur single yang nyaman. Setiap tamu dapat menikmati sarapan gratis di pagi hari serta akses WiFi gratis selama menginap. Kamar ini juga menyediakan fasilitas parkir, sehingga semakin praktis untuk tamu yang membawa kendaraan. Dengan suasana kamar yang nyaman dan fasilitas penunjang, pengalaman menginap Anda akan terasa lebih menyenangkan.', '2025-09-03 01:31:51', '2025-09-03 01:31:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_home`
--

CREATE TABLE `sub_home` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sub_home`
--

INSERT INTO `sub_home` (`id`, `title`, `sub_title`, `description`, `image1`, `image2`, `created_at`, `updated_at`) VALUES
(3, 'Simbol Kehidupan, Budaya, dan Kepercayaan Marapu', 'Warisan Leluhur yang Hidup dalam Setiap Detail', 'Marapu bukan sekadar kepercayaan, melainkan cara hidup yang menyatu dengan alam dan budaya masyarakat Sumba. Di Rumah Budaya Sumba, Anda dapat melihat bagaimana simbol-simbol kehidupan ini diwujudkan dalam arsitektur rumah adat, seni tenun ikat, tarian, hingga ritual tradisional. Setiap pengalaman membawa Anda lebih dekat pada kearifan lokal dan harmoni yang diwariskan dari generasi ke generasi.', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756693546/subhome/ilz7y1zoyfixqfywxtdr.jpg', 'https://res.cloudinary.com/dcpdfgyt7/image/upload/v1756693550/subhome/iq8agsuvrx4utn5aeymp.jpg', '2025-08-31 19:25:45', '2025-09-02 03:57:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$3guZ3PHn69Tog/VrrP9hnOP2qQpiWUiHiZyeasELvr37HHRmuKIPi', 'admin', '2025-08-19 21:38:29', '2025-08-22 06:59:37'),
(2, 'test', '$2y$10$uIjTCiLe3F065NwjKwqF4egij2pyVsWGyCi7TesCKdD4iPGDBNRGi', 'user', '2025-08-22 00:26:18', '2025-08-22 00:26:18'),
(3, 'test1', '$2y$10$qGcfzBGKflaLBfDdjHVeR.CRUfsUZK/dauY.oF9vyCi0b.ASZsQpS', 'user', '2025-08-22 00:28:04', '2025-08-22 00:28:04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_booking_room` (`room_id`);

--
-- Indeks untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_home`
--
ALTER TABLE `sub_home`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `sub_home`
--
ALTER TABLE `sub_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_booking_room` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
