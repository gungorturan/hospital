-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 09:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hastane`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `ad` varchar(21) NOT NULL,
  `sifre` varchar(41) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `ad`, `sifre`) VALUES
(2, 'admin', '44209a6a592dea91bcf7d4dd53e47a5a');

-- --------------------------------------------------------

--
-- Table structure for table `birimler`
--

CREATE TABLE `birimler` (
  `birim_id` int(11) NOT NULL,
  `isim` varchar(50) DEFAULT NULL,
  `aciklama` text DEFAULT NULL,
  `resim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `birimler`
--

INSERT INTO `birimler` (`birim_id`, `isim`, `aciklama`, `resim`) VALUES
(1, 'Dahiliye', 'Dahiliye bölümü, vücuttaki birçok hastalığı teşhis etmek ve tedavi etmek için çeşitli tanı testleri ve tedavi yöntemleri kullanır. Dahiliye doktorları, hastalara genel sağlık durumları hakkında da tavsiyelerde bulunarak, sağlıklı bir yaşam tarzı benimsemeleri konusunda yardımcı olurlar.\r\n\r\nBu bölümdeki doktorlar, hastalıkların erken teşhisi ve tedavisi ile hastaların sağlıklı bir yaşam sürmelerini hedeflerler. Dahiliye bölümü, hastaların genel sağlık durumunu iyileştirmeye yardımcı olmakla birlikte, hastalıkların ilerlemesini engellemek ve ciddi sonuçlar doğurmasını önlemek için de önemlidir.', 'dahiliye.png'),
(2, 'Kardiyoloji', 'Kardiyoloji bölümü, kalp krizi, kalp yetmezliği, kalp ritim bozuklukları, kalp kapağı hastalıkları ve damar hastalıkları gibi birçok hastalığı teşhis ve tedavi etmektedir. Kardiyoloji doktorları, hastaların kalp sağlığını iyileştirmek için kalp hastalıklarının tedavisinde birçok tanı testi ve tedavi yöntemlerini kullanırlar.\r\n\r\nKardiyoloji bölümü, kalp hastalıklarının erken teşhisi ve tedavisi ile hastaların kalp sağlığını korumaya ve koroner kalp hastalığı ve diğer kalp problemleri gibi ciddi komplikasyonların oluşmasını engellemeye yardımcı olur. Kardiyoloji doktorları, hastalara kalp hastalıklarını önlemek için sağlıklı bir yaşam tarzı benimsemeleri konusunda da önerilerde bulunurlar.', 'kardiyoloji.png'),
(3, 'Genel Cerrahi', 'Genel cerrahi bölümü, çeşitli konularda cerrahi prosedürler uygular, bunlar arasında gastrointestinal sistem, karaciğer, safra kesesi, pankreas, meme, cilt, kan damarları, tiroid bezi ve diğer cerrahi prosedürler bulunur.\r\n\r\nGenel cerrahi bölümü, özellikle acil cerrahi prosedürlerde uzmanlaşmıştır ve hastaların yaralanmaları, travmaları veya diğer acil durumları tedavi etmek için hızlı ve etkili müdahaleler yapmaktadır.\r\n\r\nGenel cerrahi doktorları, cerrahi prosedürlerin yanı sıra hastaların cerrahi sonrası iyileşmesine yardımcı olan bakım ve rehabilitasyon programlarını da yönetirler.\r\n\r\nGenel cerrahi bölümü, ileri teknolojileri kullanarak, en son cerrahi teknikler ve tedavi yöntemleri ile hastaların tedavisinde en iyi sonuçları elde etmeyi hedeflemektedir. Genel cerrahi doktorları, hastaların tedavi edilmesi için her zaman bireysel yaklaşımlar benimserler ve hastaların tedavilerinin tüm süreçlerinde yanlarında yer alırlar.', 'genelcerrahi.png'),
(4, 'Acil Servis', 'Acil Servisimiz, aniden ortaya çıkan sağlık sorunlarına acil müdahale gerektiren hastalar için 7/24 hizmet veren bir birimdir. Donanımlı ve tecrübeli sağlık personelimiz, hastalarımıza hızlı bir şekilde müdahale ederek gereksinim duydukları tedaviyi uygular. Acil servisimizde, hayati tehlikesi olan hastalarımız öncelikli olarak değerlendirilir ve tedaviye alınır. Acil servisimize gelen tüm hastalarımız, en yüksek kalitede sağlık hizmeti alarak sağlıklarına kavuşmaları için çalışıyoruz.', 'acilservis.png'),
(5, 'Psikiyatri', 'Psikiyatri bölümümüz, ruh sağlığı sorunları yaşayan hastalarımıza özel birimimizdir. Donanımlı ve tecrübeli psikiyatri uzmanlarımız, psikolojik, davranışsal ve duygusal sorunlarla mücadele eden hastalarımıza en iyi tedaviyi sunmak için çalışır. Tedavilerimiz, hastalarımızın özel ihtiyaçlarına göre kişiselleştirilir ve her hasta, özenle hazırlanan bir tedavi planına sahip olur. Psikiyatri bölümümüz, depresyon, anksiyete, bipolar bozukluk, şizofreni gibi birçok ruh sağlığı sorunu için etkili tedavi seçenekleri sunar. Hastalarımız, gizlilik ve saygı çerçevesinde en üst düzeyde sağlık hizmeti alırlar.', 'psikiyatri.png');

-- --------------------------------------------------------

--
-- Table structure for table `doktorlar`
--

CREATE TABLE `doktorlar` (
  `doktor_id` int(11) NOT NULL,
  `birim_id` int(11) NOT NULL,
  `isim` varchar(50) DEFAULT NULL,
  `telno` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ozgecmis` text NOT NULL,
  `resim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `doktorlar`
--

INSERT INTO `doktorlar` (`doktor_id`, `birim_id`, `isim`, `telno`, `email`, `ozgecmis`, `resim`) VALUES
(1, 1, 'Dr. Elif Yılmaz', '+90 555 123 4567', 'dr.elifyilmaz@eskulaphastanesi.com', 'Dr. Elif Yılmaz, 1990 yılında İstanbul\'da doğmuştur. Tıp eğitimini İstanbul Üniversitesi Tıp Fakültesi\'nde tamamlamıştır. Ardından Dahiliye alanında uzmanlık eğitimini aynı üniversitenin İç Hastalıkları Anabilim Dalı\'nda tamamlamıştır. Eğitim süreci boyunca dahiliye konularında çeşitli araştırmalara katılmış ve akademik makaleler yayınlamıştır. Özellikle diyabet, hipertansiyon ve tiroid hastalıkları gibi endokrinoloji alanında uzmanlaşmıştır. Dr. Elif Yılmaz, hasta odaklı bir yaklaşıma sahiptir ve hastalarının sağlığını ön planda tutmayı amaçlamaktadır.', 'elif-yilmaz.jpg'),
(2, 1, 'Dr. Ahmet Kaya', '+90 555 987 6543', 'dr.ahmetkaya@eskulaphastanesi.com', 'Dr. Ahmet Kaya, 1985 yılında Ankara\'da doğmuştur. Tıp eğitimini Hacettepe Üniversitesi Tıp Fakültesi\'nde tamamlamıştır. Dahiliye alanında uzmanlaşmış ve aynı üniversitenin İç Hastalıkları Anabilim Dalı\'nda çalışmıştır. Eğitimi sırasında kalp ve dolaşım sistemi hastalıkları konusunda özel ilgi duymuş ve bu alanda uzmanlaşmıştır. Dr. Ahmet Kaya, hasta bakımında kapsamlı bir yaklaşım benimsemektedir ve hastalarının fiziksel ve duygusal sağlığını iyileştirmeyi hedeflemektedir. Aynı zamanda tıp öğrencilerine mentorluk yapmak ve yeni araştırmalara katılmak konularında da ilgilenmektedir.', 'ahmet-kaya.jpg'),
(3, 1, 'Dr. Ayşe Korkmaz', '+90 555 123 4564', 'dr.aysekorkmaz@eskulaphastanesi.com', 'Dr. Ayşe Korkmaz, 1987 yılında İstanbul\'da doğmuştur. Tıp eğitimini İstanbul Üniversitesi İstanbul Tıp Fakültesi\'nde tamamlamıştır. Dahiliye alanında uzmanlaşmış ve uzmanlık eğitimini aynı üniversitenin Dahiliye Anabilim Dalı\'nda tamamlamıştır. Dr. Ayşe Korkmaz, genel sağlık sorunlarına odaklanmıştır ve birçok farklı dahiliye konusunda deneyime sahiptir. Hastalarının sağlığını önemseyen bir doktordur ve kapsamlı bir değerlendirme yaparak doğru teşhis ve tedavi planlarını oluşturmayı hedeflemektedir. Aynı zamanda sağlıklı yaşam ve koruyucu tıp konularında da danışmanlık yapmaktadır.', 'ayse-korkmaz.jpg'),
(4, 2, 'Dr. Ahmet Yılmaz', '+90 555 987 6541', ' dr.ahmetyilmaz@example.com', 'Dr. Ahmet Yılmaz, kardiyoloji alanında uzmanlaşmış deneyimli bir doktordur. Kalp hastalıkları, koroner arter hastalığı, hipertansiyon ve aritmiler gibi kardiyovasküler rahatsızlıklar üzerine çalışmaktadır.\r\n', 'ahmet-yilmaz.jpg'),
(5, 2, 'Dr. Elif Şahin', '+90 555 234 5673', 'dr.elifsahin@eskulaphastanesi.com', 'Dr. Elif Şahin, kardiyoloji konusunda uzmanlaşmış bir doktordur. Kalp hastalıkları, elektrokardiyografi (EKG) yorumlama, kalp ritim bozuklukları ve koroner anjiyografi gibi konularda deneyime sahiptir.', 'elif-sahin.jpg'),
(6, 3, 'Dr. Mehmet Karaca', '+90 555 876 5439', ' dr.mehmetkaraca@eskulaphastanesi.com', 'Dr. Mehmet Karaca, genel cerrahi konusunda uzmanlaşmış bir doktordur. Laparoskopik cerrahi, yara iyileşmesi, apendektomi ve herni ameliyatları gibi genel cerrahi prosedürleri üzerinde deneyimlidir.', 'mehmet-karaca.jpg'),
(8, 4, 'Dr. Ali Öztürk', '+90 555 345 1789', 'dr.aliozturk@eskulaphastanesi.com', 'Dr. Ali Öztürk, acil tıp konusunda uzmanlaşmış deneyimli bir doktordur. Acil durumların hızlı ve etkili bir şekilde müdahale gerektirdiği acil servis ortamında çalışmaktadır. Travmalar, acil hastalıklar, acil cerrahi müdahaleler ve hayati tehlike arz eden durumlar üzerinde deneyimlidir.\r\n', 'ali-ozturk.jpg'),
(10, 5, 'Dr. Ayşe Demir', '+90 555 123 4367', 'dr.aysedemir@eskulaphastanesi.com', '<p>\r\n	<span style=\"color: rgb(209, 213, 219); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"white-space-collapse: preserve; background-color: rgb(68, 70, 84);\"> <span style=\"text-align: left;\">Dr. Ayşe Demir, psikiyatri alanında uzmanlaşmış bir doktordur. Ruh sağlığı sorunları, anksiyete bozuklukları, depresyon, bipolar bozukluk ve obsesif-kompulsif bozukluk gibi psikiyatrik rahatsızlıklar üzerinde çalışmaktadır.</span> <br /></span></span>\r\n</p>', '1686071321724.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `genel_bilgiler`
--

CREATE TABLE `genel_bilgiler` (
  `id` int(11) NOT NULL,
  `site_adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `aciklama` text NOT NULL,
  `hakkinda` text NOT NULL,
  `telefon` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `genel_bilgiler`
--

INSERT INTO `genel_bilgiler` (`id`, `site_adi`, `slogan`, `aciklama`, `hakkinda`, `telefon`, `e_mail`, `adres`) VALUES
(1, 'Eskülap Hastanesi', 'Sağlığınız Bizim Önceliğimizdir', 'Hastanemizde, en kaliteli sağlık hizmetini sunmak için çalışıyoruz. Hastalarımızın ihtiyaçlarına uygun tedaviler sunuyor ve sağlıkla ilgili her konuda yardımcı oluyoruz.', '<p>\r\n	Hastanemiz, sağlık sektöründe uzun yıllar boyunca hizmet veren bir kuruluştur. Kuruluşumuzun temeli, topluma en üst seviyede sağlık hizmeti sunmak amacıyla atılmıştır. Misyonumuz, hastalarımıza her zaman en kaliteli sağlık hizmetini sunmak ve onların sağlıkla ilgili ihtiyaçlarını karşılamaktır. Bu amacımız doğrultusunda, tüm çalışanlarımızın etik değerlere uygun hareket etmesini ve kalite standartlarını en üst seviyede tutmasını sağlamak için sürekli eğitimler veriyoruz. Vizyonumuz, sağlık sektöründeki gelişmeleri yakından takip ederek, hastalarımızın sağlığına en uygun ve en son teknolojik imkanları kullanarak çözümler sunmaktır. Hastalarımızın sağlık hizmetlerinden en üst seviyede faydalanmaları için çalışıyor ve onların memnuniyetini sağlamak için tüm imkanlarımızı seferber ediyoruz. Hastanemiz, bünyesinde bulundurduğu uzman doktorlar, deneyimli sağlık personeli ve son teknolojik ekipmanlarla, siz değerli hastalarımıza en kaliteli sağlık hizmetini sunmak için çalışıyor. Kendimizi sürekli geliştirerek, sağlık sektöründeki yenilikleri yakından takip ediyor ve hastalarımızın sağlığı için her zaman en iyi yöntemleri uyguluyoruz.\r\n</p>', '(222) 222 2222', 'eskulaphastanesi@gmail.com', 'Büyükdere, Osmangazi Ünv. No:2, 26040 Odunpazarı/Eskişehir, Türkiye');

-- --------------------------------------------------------

--
-- Table structure for table `hastalar`
--

CREATE TABLE `hastalar` (
  `hasta_id` bigint(11) NOT NULL,
  `isim` varchar(50) DEFAULT NULL,
  `telno` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `hastalar`
--

INSERT INTO `hastalar` (`hasta_id`, `isim`, `telno`, `email`) VALUES
(10987654321, 'sdalşad dasşlkads', '111-111-1111', 'dsalsksa@sadl.com'),
(11122233341, 'Mehmet Şenol', '123-123-4321', 'turangungor1@gmail.com'),
(11122233343, 'Mehmet Şenol', '123-123-4321', 'turangungor1@gmail.com'),
(11122233344, 'Mehmet Şenol', '123-123-4321', 'turangungor1@gmail.com'),
(11122233347, 'Mehmet Şenol', '123-123-4321', 'turangungor1@gmail.com'),
(12345678900, 'Güngör Turan', '555-555-5555', 'turangungor1@gmail.com'),
(12345678901, 'Güngör TURAN', '555-555-5555', 'turangungor1@gmail.com'),
(12345678902, 'Güngör TURAN', '555-555-5555', 'turangungor1@gmail.com'),
(12345678903, 'Ali Candan', '555-555-5554', 'alicandan@alicandan.com'),
(12345678933, 'Güngör Turan', '555-555-5555', 'turangungor1@gmail.com'),
(12345678936, 'Güngör Turan', '555-555-5555', 'turangungor1@gmail.com'),
(98765432100, 'Recep Ulusoy', '333-333-3333', 'turangungor1@gmail.com'),
(98765432199, 'Ali Yılmaz', '555-444-5454', 'turangungor1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `randevular`
--

CREATE TABLE `randevular` (
  `randevu_id` int(11) NOT NULL,
  `hasta_id` bigint(11) DEFAULT NULL,
  `birim_id` int(11) NOT NULL,
  `doktor_id` int(11) DEFAULT NULL,
  `aciklama` varchar(100) DEFAULT NULL,
  `randevu_tarih` date DEFAULT NULL,
  `randevu_saat` time DEFAULT NULL,
  `aktiflik` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `randevular`
--

INSERT INTO `randevular` (`randevu_id`, `hasta_id`, `birim_id`, `doktor_id`, `aciklama`, `randevu_tarih`, `randevu_saat`, `aktiflik`) VALUES
(3, 12345678901, 4, 1, NULL, '2023-06-02', '09:00:00', 1),
(7, 12345678903, 4, 1, NULL, '2023-06-02', '09:30:00', 1),
(8, 12345678900, 2, 1, NULL, '2023-06-03', '12:30:00', 1),
(9, 12345678933, 2, 1, NULL, '2023-06-01', '15:00:00', 1),
(10, 12345678936, 2, 1, NULL, '2023-06-01', '14:30:00', 1),
(11, 98765432199, 4, 1, NULL, '2023-06-04', '14:30:00', 1),
(12, 98765432100, 3, 1, NULL, '2023-06-04', '10:30:00', 1),
(13, 11122233344, 5, 1, NULL, '2023-06-10', '09:00:00', 1),
(14, 11122233343, 5, 1, NULL, '2023-06-10', '09:00:00', 1),
(15, 11122233347, 5, 1, NULL, '2023-06-10', '09:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `referanslar`
--

CREATE TABLE `referanslar` (
  `id` int(11) NOT NULL,
  `ref_isim` varchar(255) NOT NULL,
  `ref_gorus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `referanslar`
--

INSERT INTO `referanslar` (`id`, `ref_isim`, `ref_gorus`) VALUES
(1, 'Ayşe Güneş', 'Hastanenizdeki sağlık hizmetlerinden son derece memnun kaldım. Doktorlar ve sağlık personeli çok profesyonel ve ilgililerdi. Tedavi sürecim boyunca bana her zaman destek oldular ve sağlığıma kavuşmamda büyük rol oynadılar.'),
(2, 'Mehmet Yılmaz', 'Hastanenizde yaptırdığım ameliyat son derece başarılı geçti. Doktorum, ameliyat öncesinde ve sonrasında her aşamada benimle ilgilenerek büyük bir güven verdi. Hastanenizin modern ekipmanları ve yüksek kaliteli sağlık hizmeti, kendimi çok rahat ve güvende hissetmemi sağladı.'),
(3, 'Zeynep Çetin', 'Hastanenizdeki sağlık personeli, hastalara karşı son derece nazik ve sabırlılar. Benim tedavi sürecim boyunca hep yanımda oldular ve en ufak bir sorunumda bile hemen yardım ettiler. Bu sebeple, hastanenizi herkese gönül rahatlığıyla tavsiye edebilirim.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `birimler`
--
ALTER TABLE `birimler`
  ADD PRIMARY KEY (`birim_id`);

--
-- Indexes for table `doktorlar`
--
ALTER TABLE `doktorlar`
  ADD PRIMARY KEY (`doktor_id`),
  ADD KEY `birim_id` (`birim_id`);

--
-- Indexes for table `genel_bilgiler`
--
ALTER TABLE `genel_bilgiler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hastalar`
--
ALTER TABLE `hastalar`
  ADD PRIMARY KEY (`hasta_id`);

--
-- Indexes for table `randevular`
--
ALTER TABLE `randevular`
  ADD PRIMARY KEY (`randevu_id`),
  ADD KEY `doktor_id` (`doktor_id`),
  ADD KEY `birim_id` (`birim_id`),
  ADD KEY `hasta_id` (`hasta_id`);

--
-- Indexes for table `referanslar`
--
ALTER TABLE `referanslar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `birimler`
--
ALTER TABLE `birimler`
  MODIFY `birim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doktorlar`
--
ALTER TABLE `doktorlar`
  MODIFY `doktor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `genel_bilgiler`
--
ALTER TABLE `genel_bilgiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `randevular`
--
ALTER TABLE `randevular`
  MODIFY `randevu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `referanslar`
--
ALTER TABLE `referanslar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doktorlar`
--
ALTER TABLE `doktorlar`
  ADD CONSTRAINT `doktorlar_ibfk_1` FOREIGN KEY (`birim_id`) REFERENCES `birimler` (`birim_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `randevular`
--
ALTER TABLE `randevular`
  ADD CONSTRAINT `randevular_ibfk_2` FOREIGN KEY (`doktor_id`) REFERENCES `doktorlar` (`doktor_id`),
  ADD CONSTRAINT `randevular_ibfk_3` FOREIGN KEY (`birim_id`) REFERENCES `birimler` (`birim_id`),
  ADD CONSTRAINT `randevular_ibfk_4` FOREIGN KEY (`hasta_id`) REFERENCES `hastalar` (`hasta_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
