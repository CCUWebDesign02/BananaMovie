-- MySQL dump 10.13  Distrib 5.7.16, for Win64 (x86_64)
--
-- Host: localhost    Database: team02
-- ------------------------------------------------------
-- Server version	5.7.16-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carousel`
--

DROP TABLE IF EXISTS `carousel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carousel` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `movie_resource_id` int(8) NOT NULL,
  `url` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_resource_id` (`movie_resource_id`),
  CONSTRAINT `carousel_ibfk_1` FOREIGN KEY (`movie_resource_id`) REFERENCES `movie_resource` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carousel`
--

LOCK TABLES `carousel` WRITE;
/*!40000 ALTER TABLE `carousel` DISABLE KEYS */;
INSERT INTO `carousel` VALUES (1,1,NULL),(2,3,NULL),(3,5,NULL);
/*!40000 ALTER TABLE `carousel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motds`
--

DROP TABLE IF EXISTS `motds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `motds` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(4096) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motds`
--

LOCK TABLES `motds` WRITE;
/*!40000 ALTER TABLE `motds` DISABLE KEYS */;
INSERT INTO `motds` VALUES (1,'你最光棍！光棍節單人看電影只要111元！',NULL,'2017-11-09 16:00:00','2017-11-09 16:00:00'),(2,'香蕉影城11周年慶！來看電影就送香蕉！',NULL,'2017-11-16 16:00:00','2017-11-16 16:00:00'),(3,'香蕉老闆作功德！即日起所有票種調降10元！',NULL,'2017-11-22 16:00:00','2017-11-22 16:00:00'),(4,'來香蕉影城刷國泰世華卡 即送香蕉一串！',NULL,'2017-11-30 16:00:00','2017-11-30 16:00:00'),(5,'歌喉讚最終力作!12/27 美聲女力 終極對決',NULL,'2017-12-07 16:00:00','2017-12-07 16:00:00'),(6,'來香蕉影城帶香蕉 及享電影票買一送一優惠！',NULL,'2017-12-10 16:00:00','2017-12-10 16:00:00'),(7,'單身過聖誕不難過！看電影送香蕉！',NULL,'2017-12-16 16:00:00','2017-12-16 16:00:00'),(8,'聖誕慶祝！情侶雙人套票大優惠！',NULL,'2017-12-23 16:00:00','2017-12-23 16:00:00'),(9,'玉山聯名卡加碼送！活動只到明年3/1！',NULL,'2017-12-25 16:00:00','2017-12-25 16:00:00'),(10,'你上車了嗎？來看電影送521號公車票！',NULL,'2017-12-26 16:00:00','2017-12-26 16:00:00'),(11,'期末網設心好累？老闆香蕉大放送！','期末網設心好累？老闆香蕉大放送！','2018-01-06 17:07:14','2018-01-06 17:07:14');
/*!40000 ALTER TABLE `motds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_resource`
--

DROP TABLE IF EXISTS `movie_resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_resource` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `movie_id` int(8) DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_id` (`movie_id`),
  CONSTRAINT `movie_resource_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_resource`
--

LOCK TABLES `movie_resource` WRITE;
/*!40000 ALTER TABLE `movie_resource` DISABLE KEYS */;
INSERT INTO `movie_resource` VALUES (1,1,'banner','MR-00000001-banner.jpg'),(2,1,'poster','MR-00000001-poster.jpg'),(3,2,'banner','MR-00000002-banner.jpg'),(4,2,'poster','MR-00000002-poster.jpg'),(5,3,'banner','MR_00000003-banner.jpg'),(6,3,'poster','MR_00000003-poster.jpg'),(7,4,'poster','MR_00000004-poster.jpg');
/*!40000 ALTER TABLE `movie_resource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movies` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `zh_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `released` datetime DEFAULT NULL,
  `director` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trailer_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (1,'歌喉讚3','Pitch Perfect 3',94,1,'2017-12-26 16:00:00','崔希西耶(Trish Sie)','安娜坎卓克(Anna Kendrick), 海莉史坦菲德(Hailee Steinfeld), 伊莉莎白班克斯(Elizabeth Banks), 布蘭妮史諾(Brittany Snow), 瑞貝爾威爾森(Rebel Wilson)','在大學畢業後進入到苛刻嚴峻的社會，美麗女聲決定重返《歌喉讚3》，這部深受影迷喜愛的《歌喉讚》系列的下一篇章，在全球票房已累積超過4億美元。\r\n \r\n在贏得世界錦標賽的最高榮譽之後，美麗女聲成員各分東西，卻發現現實社會並沒有能夠善用她們才華的工作。所以當他們獲得一個機會到國外參加勞軍表演徵選時，這組地表最強的阿卡貝拉美聲團將三度聚首，最後一次用音樂感動人心。','https://www.youtube.com/watch?v=EY5HJ_HeV7s','2018-01-06 19:59:16','2018-01-06 19:59:16'),(2,'與神同行','Along With the Gods: The Two Worlds',139,2,'2017-12-21 16:00:00','金容華(KIM Yong-hwa)','河正宇(Jung-woo Ha), 車太鉉(CHA Tae-hyun), 朱智勳(JU Ji-hoon), 金香起(KIM Hyang-Gi), 李政宰, 金東昱, 馬東錫, 金秀安, 吳達庶(Oh Dal-su), 林元熙, 鄭海均, 張光, 金海淑, 李璟榮(Lee Kyoung-Young), 金荷娜','★ LINE WEBTOON同名人氣獲獎漫畫改編！\r\n★ 集結南韓最輝煌的演技派卡司，呈現最精彩絕倫的集體演出！\r\n★ 繼《屍速列車》、《軍艦島》後，南韓最重要的年度話題強片！\r\n★ 籌備拍攝6年，耗資400億韓圜，南韓近年最高製作預算電影！\r\n★ 《狄仁傑之神都龍王》、《智取威虎山》特效團隊打造華麗視覺！\r\n★ 轟動全球話題延燒！國際版權狂銷北美、加拿大等世界百餘國！\r\n \r\n這是一個，你不曾見過的世界\r\n金自鴻（車太鉉飾演）是個正直又盡責的消防員，卻為了拯救一個小女孩而葬身火窟。來自地府的三位陰間使者出現在他面前，指引他通往死後的世界。這三位陰間使者分別是：「領袖」江林公子（河正宇飾演）、「護衛」解怨脈（朱智勳飾演）、「助手」李德春（金香起飾演）。作為19年來的第一位「模範死者」，他們告訴金自鴻，如果想要「轉世」，他就必須在七七四十九天之內，通過七場審判。\r\n \r\n三位陰間使者積極幫助金自鴻轉世，因為他們和閻羅王有過協定──如果能在1000年內引渡49個靈魂轉世，他們自己也能輪迴轉世，而金自鴻是他們經手的第48位有機會轉世的備選亡魂。\r\n \r\n審判依據七大罪來評斷，包括：「謀殺、怠惰、欺騙、不公正、背叛、暴力、不孝」。金自鴻回想著自己的人生，他覺得自己應該能順利通過大部分的審判。而且他發現，如果能通過這些審判，他就能在轉世之前，託夢給在陽世的人。金自鴻非常希望能託夢給年邁的母親，於是他下定決心，一定要通過七大審判。\r\n \r\n就在金自鴻進行審判的同時，他的弟弟蘇鴻（金東昱飾演）竟在軍中服役時意外死亡。因為充滿憤怒與不甘，蘇鴻成為無法超生、徘徊在陽間的冤鬼。這個冤鬼的出現，同時震撼了死後的世界，並影響到金自鴻在陰間的審判。當江林公子來到人間調查蘇鴻冤死實情的同時，金自鴻的人生也不斷被揭露，讓他愈來愈難在審判中證明自己的清白。金自鴻最後的命運會如何？他能否還有機會託夢給母親，並成功轉世為人呢？\r\n \r\n【關於電影】\r\n \r\n6年籌備拍攝， 400億韓圜製作預算，南韓年度話題強片\r\n繼《屍速列車》、《軍艦島》之後，又一刷新南韓影史製作預算的年度強片《與神同行》，即將在12月22日於台灣盛大上映！本片改編自漫畫家周浩旻的同名人氣漫畫，故事笑中帶淚，以陰間世界諷刺陽間，強烈翻轉人們對於地府的既定印象，並在神與人之間探討命運的牽連，深受各年齡層讀者喜愛。這也讓本作不僅成為入口網站「Naver」瀏覽次數最高的漫畫作品，推出實體紙本漫畫之後，更狂銷超過45萬冊，並接連榮獲「富川國際漫畫獎」優秀故事漫畫、「韓國漫畫大賞」總統獎、「讀者漫畫大獎」等獎項肯定，在漫畫界享有高度聲譽，原著漫畫並在LINE WEBTOON連載當中。\r\n \r\n本作如今翻拍成電影，製作團隊更花費6年時間籌備製作，並斥資400億韓圜（約新台幣10.8億元）預算，先後在首爾、京畿道、釜山、安城、平昌、平澤、益州等150多個地方取景拍攝。此外，更請來曾為《狄仁傑之神都龍王》、《智取威虎山》等片打造特效的南韓第一大特效公司「DexterStudios」，將漫畫中各式各樣的地獄場面，栩栩如生地還原在大銀幕上。這也讓本片強勢超越《屍速列車》的100億韓圜，以及《軍艦島》的220億韓圜，成為南韓影史拍攝預算最高的話題強片。不僅如此，本片演員卡司也堪稱是近年韓片最完美、最整齊陣容。除了河正宇、車太鉉、朱智勳、金香起、李政宰領銜主演之外， EXO成員「D.O.」都敬秀（又譯都暻秀）、金東昱、馬東錫、吳達庶、林元熙、李浚赫、金海淑、金荷娜等人也將加盟演出。\r\n \r\n值得一提的是，本片在國際版權銷售上也有亮眼表現，並在各大電影市場展上掀起瘋狂的競價風潮。這也讓本片國際版權狂銷台灣、香港、澳門、新加坡、馬來西亞、印尼、汶萊、菲律賓、柬埔寨、寮國、美國、加拿大、歐洲、拉丁美洲、大洋洲等100多國，更在亞洲各國創出韓片影史對外銷售的最高版權金額。許多海外買家紛紛表示：「這是從來沒出現過、非常有創意的南韓電影，不僅有華麗視覺和演員陣容，還有感人的故事，預計將在亞洲各國、甚至是全世界取得巨大成功。」也讓本片勢必成為今年最重要的南韓電影，值得觀眾進戲院一同震撼！','https://www.youtube.com/watch?v=ES4f-wkeTqg','2018-01-06 20:20:59','2018-01-06 20:20:59'),(3,'大娛樂家','The Greatest Showman',105,0,'2017-12-19 16:00:00','麥可格雷西(Michael Gracey)','休傑克曼(Hugh Jackman), 柴克艾弗隆(Zac Efron), 蜜雪兒威廉斯(Michelle Williams), 蕾貝卡弗格森(Rebecca Ferguson)','★一生必看！福斯影片年度壓軸鉅獻 今年聖誕最觸動人心的奇幻大作 ★百老匯之王休傑克曼攜柴克艾弗隆回歸初心 再創生涯顛峰代表作★《樂來越愛你》幕後音樂團隊再次聯手出擊 力揭新世紀歌舞劇豪華篇章★美國魔幻馬戲團始祖P.T. 巴納姆 生涯傳奇故事首度搬上大銀幕\r\n由鬼才導演麥可格雷希所指導的首部長片電影《大娛樂家》，為一部大膽原創的音樂劇電影，他將我們現在生活中所能看到的馬戲團以及大型娛樂表演事業的源起搬上大銀幕，希望能夠藉此機會激發觀眾對夢想與未來的無限想像。故事靈感來自於傳奇馬戲團始祖P.T.巴納姆〈休傑克曼 飾〉，描述他如何從一個窮困潦倒的無名小卒，搖身一變成為一個能夠將歡樂、感動、勇氣與淚水，這些情感原素全部融入至他的表演中，將希望散播至全世界的玩夢大師。\r\n《大娛樂家》更是與甫於今年初獲得奧斯卡金獎的《樂來樂愛你》幕後音樂團隊，一同協力打造總計共超過10首原創動聽歌曲；而令人期待的卡司陣容群，除了一攬本身為百老匯出身的休傑克曼之外，本次更是找來了能跳能唱的柴克艾弗隆、蜜雪兒威廉絲以及蕾貝卡弗格森，聽覺加上視覺的絕對饗宴，勢必將為這部備受期待的歌舞劇打造最豪華的精采篇章！','https://www.youtube.com/watch?v=sR6-3_5CtTQ','2018-01-06 21:33:14','2018-01-06 21:33:14'),(4,'縮小人生','Downsizing',NULL,NULL,'2018-01-26 16:00:00','亞歷山大潘恩(Alexander Payne)','麥特戴蒙(Matt Damon), 克莉絲汀薇格(Kristen Wiig), 克里斯多夫沃茲(Christoph Waltz), 洪曹','保羅薩夫拉內克（麥特戴蒙 飾）老早就對縮小人生感興趣，他在奧瑪哈冷凍牛排公司當職能治療師的薪水入不敷出，無法實現老婆奧黛莉（克莉絲汀薇格 飾）夢想中的生活。這對中產階級夫妻沒有孩子，年約40歲，正歷經人生撞牆期。十年前，挪威科學家約根奧斯布朗森博士（羅夫拉斯加德 飾）及其團隊想出解決人口過剩的方法，亦即細胞微型化，又稱縮小手術，他們的目標是用200年的時間，說服全球6成人口自願縮小為5吋，以免人類滅絕，但縮小手術光憑如此遠大的使命並無法說服太多人去做。\r\n \r\n保羅和奧黛莉在同學會遇見老朋友戴夫（傑森蘇戴西斯 飾），頓時發現縮小人生的其他好處，戴夫過著令保羅眼紅的富豪生活：戴夫和老婆卡洛只有5吋高，在完美的享樂園社區住豪宅吃美食，保羅決定親自去那個社區看一看—全球最高檔的縮小社區。這段旅程令保羅夫婦瞠目結舌，存款10萬美元在一般世界什麼都買不起，在那裡卻可以換算成1,250萬美元，一輩子不用愁，況且縮小手術已經有10年歷史，問題都克服了。只不過，做了縮小手術，身體質量和體積會變成目前的0.0364％，不可以還原，不料縮小人生似乎沒有保羅想像那麼美好，術後一年，他離婚了，孤單一人，做電話客服維生，還有一個吵人的鄰居。他鄰居是來自賽爾維亞的花花公子杜森默克維克（克里斯多夫華茲 飾），以及他的生意夥伴康拉德（尤杜基爾 飾），他們打亂保羅千篇一律的生活，慫恿他嘗試燈紅酒綠的派對人生，因此遇見杜森的幫傭，亦即越南難民陳玉蘭（周洪 飾），她遭到越南政府強迫縮小，後來流亡國外，保羅透過她看到了縮小世界的另一面—玉蘭和其他貧窮移民所居住的廉租公寓，從而明白他原本無法想像的愛，以及他從未想過的觀點。\r\n \r\n派拉蒙影業發行《縮小人生》，Ad Hominem Enterprises和Gran Via Productions共同製作，導演是金獎得主亞歷山大潘恩（《繼承人生》、《尋找新方向》）。演員陣容堅強，有金獎得主麥特戴蒙（《火星任務》、《心靈捕手》）、金獎得主克里斯多夫華茲（《惡棍特工》、《決殺令》）、周洪（《性本惡》、影集《美麗心計》）、金獎入圍者克莉絲汀薇格（《火星任務》、《伴娘我最大》）、尤杜基爾（《世紀末婚禮》）、傑森蘇戴西斯（《柯羅索巨獸》）、金獎入圍者蘿拉鄧恩（《那時候我只剩下勇敢》、《激情薔薇》）、尼爾派翠克哈里斯（《控制》）、羅夫拉斯加德（《明天別再來敲門》）。劇本是潘恩和金獎編劇吉姆泰勒（《尋找新方向》、《繼承人生》）共同寫成，製片有潘恩、泰勒、金獎得主馬克強森（《雨人》、《納尼亞傳奇》系列）和金獎入圍者吉米伯克（《繼承人生》）。執行製片有艾美獎得主黛安娜波可妮（《家有兩個爸》、《無盡的控訴》），攝影指導是金獎入圍者費頓巴巴麥克（《內布拉斯加》、《繼承人生》），美術設計是史黛芬妮亞雀拉（《黑勢力》、《絕美之城》），服裝設計是溫蒂查克（《內布拉斯加》、《心的方向》），剪輯是凱文坦特（《繼承人生》、《內布拉斯加》）。','https://www.youtube.com/watch?v=_CEE0iaudms','2018-01-07 00:30:49','2018-01-07 00:30:49');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`,`user_id`,`ticket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_cart`
--

DROP TABLE IF EXISTS `shopping_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_cart` (
  `user_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`ticket_id`),
  KEY `ticket_id` (`ticket_id`),
  CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `shopping_cart_ibfk_2` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_cart`
--

LOCK TABLES `shopping_cart` WRITE;
/*!40000 ALTER TABLE `shopping_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NOT NULL,
  `showing_time` datetime DEFAULT NULL,
  `hall` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `remanded` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_id` (`movie_id`),
  CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `account` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_loggedin` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'vincent','$2y$10$Kqmblws7tjqaCcmBVBoxheDuNONTU73Gfa7ZUquQYXy0zH7wtLiL.','黃柏翔','vincent0740@gmail.com','eea1f5cad61075eb946c9f5186e20845d566259d0336cb7dd2c15f736e0638af','2018-01-05 22:35:42','2018-01-05 20:16:57','2018-01-05 20:16:57'),(2,'nana','$2y$10$qXvj16rhN3SpCLogcAl21OUVHC0xH10sxgtt1baxNTjWwMzX2stq6','nana','nana@example.com',NULL,NULL,'2018-01-06 15:23:57','2018-01-06 15:23:57'),(3,'hihi','$2y$10$YGa.M9yWkxdRpU/D9VVuwemKDVGVoC4mGQUR.imLyRqpfumQEvqnK','nana','nana@example.com',NULL,NULL,'2018-01-06 15:46:49','2018-01-06 15:46:49');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-07  1:31:20
