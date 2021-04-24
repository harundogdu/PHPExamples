-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Nis 2020, 19:06:35
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `hit`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `makaleler`
--

CREATE TABLE `makaleler` (
  `id` int(11) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `icerik` text NOT NULL,
  `hit` int(11) NOT NULL,
  `resim` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `makaleler`
--

INSERT INTO `makaleler` (`id`, `baslik`, `icerik`, `hit`, `resim`) VALUES
(1, '1 Milyon 250 Bin TL Ödüllü Next Game Startup İçin Başvurular Başladı', 'INTEL ESL Gaming Fest kapsamında, İzmir Büyükşehir Belediyesi desteği ile bu yıl beşincisi düzenlenecek olan oyun girişimciliği yarışması “Next Game Startup” için başvurular başladı. Yarışmada dereceye giren girişimlere toplamda 1 milyon 250 bin TL değerinde destek sunulacak.\r\nTürkiyenin en uzun gaming festivali olan INTEL ESL Türkiye Şampiyonası kapsamında düzenlenen oyun girişimciliği yarışması “Next Game Startup” için başvurular başladı. Oyun dünyasında kariyere sahip olmak isteyen girişimciler için harika bir ekosistem sunan organizasyonda, oyun sektöründe yeni istihdam alanları açılması ve yatırımcıların dikkatinin oyun sektörüne çekilmesi hedefleniyor.\r\n\r\nNext Game Startup yarışmasında mobil, masaüstü ve konsol platformlarına geliştirilmiş oyunlar değerlendirmeye alınacak. Yarışmaya tamamlanmış, proje halinde veya demo ürünler ile katılmak da mümkün. Projeler; ekip yapısı, örnek ürün, finansal ve pazarlama alanında değerleme ve yatırım ihtiyacını bilme kriterlerine göre değerlendirilecek. Son teslim tarihi ise 15 Temmuz.', 24, 'a.jpg'),
(2, 'MHPden Sahte Hesaplar İçin Kanun Teklifi: Sosyal Medyaya T.C. Kimlik No ile Giriş Yapılsın', 'MHP, TBMM Başkanlığına, İnternet ortamında yayınların düzenlenmesi ve bu yayınlar yoluyla işlenen suçlarla mücadele edilmesi hakkında hazırladığı kanun teklifini sundu.\r\nMHP, sosyal medyada dolaşan sahte hesaplara karşı kanun teklifi düzenledi. Meclis Başkanlığına sunulan teklifle ilgili açıklamayı, MHP Kırıkkale Milletvekili Halil Öztürk yaptı.\r\n\r\nSosyal medya platformlarında dolaşan yalan haberler ve sahte hesaplar yüzünden internet kullanıcılarının mağduriyet yaşadığına değinen Öztürk, Koronavirüs ile mücadele ettiğimiz şu dönemde dâhi durum değişmemiş, sahte hesaplar üzerinden yapılan algı yaratmaya yönelik korku salıcı haberler yüzünden zaman zaman toplumda endişeler yükselmiştir. Bu bağlamda, tüm sosyal medya mecraları için 2018’de yapılan genel bir araştırma sonucuna göre Türkiye; Sahte habere en çok maruz kalan ülkeler kategorisinde yüzde 49 ile ilk sırada yer almaktadır. Sosyal medya platformu Facebook’tan yapılan açıklamada; 2018’in ilk 3 ayında dünya genelinde 1,2 milyar sahte hesap silinirken, 2019’un aynı döneminde 2,2 milyar sahte hesap silindiği belirtilmiştir. Tüm dünyanın sahte hesaplarla başı ağrımaktadır dedi.', 4, 'b.jpg'),
(3, 'Koronavirüs Krizini Yöneteceğiniz Strateji Oyunu COVID: The Outbreak Duyuruldu', 'Koronavirüs salgınını durdurmak için mücadele vereceğiniz strateji oyunu COVID: The Outbreak, bilgisayar oyuncuları için duyuruldu. Oyun, insanları salgına karşı bilinçlendirme amacı taşıyan Plague Inc. tarzı bir deneyim sunuyor.\r\nPolonyalı geliştirici Jujubee S.A., koronavirüs temalı gerçek zamanlı strateji oyunu COVID: The Outbreaki yayınladığı fragmanla duyurdu. Stüdyo, yeni oyunuyla dünyanın dört bir yanındaki insanların COVID-19 salgınıyla yüzleşmelerini ve salgın konusunda bilinçlenmelerini amaçlıyor.\r\n\r\nCOVID: The Outbreakte Küresel Sağlık Örgütünün (GHO) lideri olarak koronavirüsün yayılmasını kontrol etmeye ve çok geç olmadan insanlığı kurtarmaya çalışıyorsunuz. Oyun, kriz yönetimine ek olarak, oyunculara salgın durumunda nasıl davranacakları, hangi önlemleri uygulayacakları, kendilerini ve sevdiklerini en etkili şekilde nasıl koruyacakları hakkında bilgiler sağlıyor.', 8, 'c.jpg'),
(4, '2021 Model Samsung Telefonlar, AMDnin Mobil GPUlarını Kullanacak', 'Samsungun geçtiğimiz yıl AMD ile kurduğu ortaklık, meyvelerini vermek üzere gibi görünüyor. İddialara göre AMDnin Samsung için ürettiği mobil GPUlar beklenenin ötesinde güç veriyor ve bu mobil GPUlar, Exynos 1000 işlemcilere eşlik edecek.\r\nGüney Koreli teknoloji devi Samsung, uzunca bir süredir akıllı telefon sektörünün lideri konumunda. Şirket, gerek amiral gemisi gerekse giriş ve orta seviye akıllı telefonları ile tüketicilerin ilgisini üzerinde toplamayı başarırken zaman zaman yaptığı çalışmalarla da sektöre yön vermeyi başarıyor. Yeni ortaya atılan iddialar ise Samsungun geçtiğimiz yıl açıkladığı AMD iş birliğinin yakında meyveleri vereceğini ortaya koyuyor.\r\n\r\nGeçtiğimiz yıl Samsung ile AMD, ortak bir basın toplantısı gerçekleştirerek bir iş birliği içerisine girdiklerini ve bu iş birliği kapsamında mobil GPUlar üzerinde çalışacaklarını duyurmuşlardı. O dönemlerde yapılan resmi açıklamalarda, bu iş birliğinin 2021 yılında nihai ürünler olarak tüketicilerle buluşacağı belirtiliyordu. Şimdi ortaya atılan iddialara göre süreç, beklenenden iyi gidiyor.Güney Koreli teknoloji devi Samsung, uzunca bir süredir akıllı telefon sektörünün lideri konumunda. Şirket, gerek amiral gemisi gerekse giriş ve orta seviye akıllı telefonları ile tüketicilerin ilgisini üzerinde toplamayı başarırken zaman zaman yaptığı çalışmalarla da sektöre yön vermeyi başarıyor. Yeni ortaya atılan iddialar ise Samsung\'un geçtiğimiz yıl açıkladığı AMD iş birliğinin yakında meyveleri vereceğini ortaya koyuyor.\r\n\r\nGeçtiğimiz yıl Samsung ile AMD, ortak bir basın toplantısı gerçekleştirerek bir iş birliği içerisine girdiklerini ve bu iş birliği kapsamında mobil GPU\'lar üzerinde çalışacaklarını duyurmuşlardı. O dönemlerde yapılan resmi açıklamalarda, bu iş birliğinin 2021 yılında nihai ürünler olarak tüketicilerle buluşacağı belirtiliyordu. Şimdi ortaya atılan iddialara göre süreç, beklenenden iyi gidiyor.', 7, 'd.jpg'),
(5, 'Yarasa Kadın Lakaplı Virolog, Yeni Koronavirüs Salgını İçin 2018de Uyarıda Bulunmuş', 'Çinin en iyi virologlarından biri olan ve yarasa kökenli virüsler üzerine yaptığı araştırmalar nedeniyle yarasa kadın” olarak bilinen Shi Zhenglinin 2018 yılında yaptığı bir konuşmada, yeni bir koronavirüs salgının patlak vermemesi için hangi önlemlerin alınması gerektiği konusunda uyarılarda bulunduğu ortaya çıktı.\r\nYeni bulaşıcı hastalıkları tamamen önlemek istiyorsak, yapmamız gereken şey çok basit: Patojenik hayvanlardan uzak durmak.” Bu sözler, Çin’in en başarılı virologlarından biri olarak gösterilen Shi Zhengli’ne ait. Yeni tip koronavirüs salgını COVID-19’un ilk kez görüldüğü yer olan Wuhan’daki canlı hayvan pazarına sadece 200 metre mesafedeki Wuhan Viroloji Enstitüsü’nde çalışan Zhengli, yarasa kökenli virüsler konusunda uzman bir isim.\r\n\r\nBu alanda yaptığı araştırmalar nedeniyle yarasa kadın” lakabını alan Çinli bilim insanı, savaşmakta olduğumuz pandeminin başlamasından bir yıldan daha fazla bir süre önce yaptığı konuşmada, dünyayı koronavirüslerin tehlikeleri konusunda uyarmış ve olası bir salgını önlemek için nelerin yapılması gerektiğini söylemiş.', 6, 'e.jpg'),
(6, 'Lenovo Türkiye, WhatsApp Danışma Hattını Hizmete Açtı', 'Lenovo Türkiye, tablet ve dizüstü bilgisayarla ilgili merak ettiğiniz tüm soruları sorarak, isteklerinize en uygun bilgisayarı almak için kullanabileceğiniz WhatsApp Danışma Hattını hizmete sundu. Yeni bir bilgisayar almayı düşünen müşteriler, Lenovo’nun son teknoloji bilgisayarlarının her türlü teknik özelliğini ve bilmek istedikleri tüm ayrıntıları danışma hattından öğrenebilecek.\r\nLenovo, dünyanın ve Türkiyenin önde gelen teknoloji şirketlerinden biri olarak, sektördeki gücünü son kullanıcı ihtiyaçlarını karşılayacak şekilde devam ettiriyor. WhatsApp Danışma Hattı’nı hizmete sunan Lenovo Türkiye, son kullanıcının dizüstü bilgisayar ve tabletle ilgili merak ettiği tüm soruları sorarak kendilerine en uygun bilgisayarı seçmelerini sağlayacak.Lenovo, dünyanın ve Türkiye\'nin önde gelen teknoloji şirketlerinden biri olarak, sektördeki gücünü son kullanıcı ihtiyaçlarını karşılayacak şekilde devam ettiriyor. WhatsApp Danışma Hattı’nı hizmete sunan Lenovo Türkiye, son kullanıcının dizüstü bilgisayar ve tabletle ilgili merak ettiği tüm soruları sorarak kendilerine en uygun bilgisayarı seçmelerini sağlayacak.', 6, 'f.jpg');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `makaleler`
--
ALTER TABLE `makaleler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `makaleler`
--
ALTER TABLE `makaleler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
