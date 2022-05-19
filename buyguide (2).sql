-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 07:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buyguide`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `name` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `name`) VALUES
(1, 'electronics'),
(2, 'clothes');

-- --------------------------------------------------------

--
-- Table structure for table `clothes_products`
--

CREATE TABLE `clothes_products` (
  `id` int(11) NOT NULL,
  `name` char(150) NOT NULL,
  `subcategories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clothes_products_stores`
--

CREATE TABLE `clothes_products_stores` (
  `clothes_product_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `rate` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `electronic_products`
--

CREATE TABLE `electronic_products` (
  `e_id` char(100) NOT NULL,
  `asins` char(100) NOT NULL,
  `brand` char(100) NOT NULL,
  `categories` varchar(500) NOT NULL,
  `ean` char(100) NOT NULL,
  `keys_product` varchar(500) NOT NULL,
  `manufacturer` char(100) NOT NULL,
  `manufacturerNumber` char(100) NOT NULL,
  `name` char(100) NOT NULL,
  `upc` char(100) NOT NULL,
  `weight` char(100) NOT NULL,
  `count_of_reviews_text` int(50) NOT NULL,
  `count_of_reviews_rating` int(50) NOT NULL,
  `avarage_rate` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `ram` enum('4','8','16') NOT NULL,
  `storage` enum('32','64','128','512','1024','2048') NOT NULL,
  `graphic_card` char(100) NOT NULL,
  `noise_cancellation` tinyint(1) NOT NULL,
  `water_resistance` tinyint(1) NOT NULL,
  `battery` int(100) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `color` enum('black','white','blue','red') NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `electronic_products`
--

INSERT INTO `electronic_products` (`e_id`, `asins`, `brand`, `categories`, `ean`, `keys_product`, `manufacturer`, `manufacturerNumber`, `name`, `upc`, `weight`, `count_of_reviews_text`, `count_of_reviews_rating`, `avarage_rate`, `price`, `ram`, `storage`, `graphic_card`, `noise_cancellation`, `water_resistance`, `battery`, `image`, `color`, `sub_id`) VALUES
('1', 'B00505EZYW', 'apple', 'Computers,Memory (RAM),Computers & Accessories,Computer Components,Memory,Memory Upgrades,Electronics,Computers & Tablets,Computer Cards & Components,Laptop Memory', '', 'corsaircmsa8gx3m2a1066c7apple8gbdualchannelkitddr31066pc38500204pinddr3laptopsodimmmemory15v/b00505ezyw,corsair8gb2pkx4gb10ghzddr3sodimmlaptopmemorykitgreen/2824528,corsair8gb2pkx4gb10ghzddr3sodimmlaptopmemorykitgreen/b00505ezyw,843591013857,corsair/cmsa8gx3m2a1066c7', '', 'CMSA8GX3M2A1066C7', 'iphone x', '844000000000', '0.8 ounces', 3, 3, 5, 11000, '4', '128', '', 1, 1, 5000, '\\buyguide\\img\\mobiles\\iphoneX.jpg', 'white', 1),
('10', 'B00C78VIUE', 'oppo', 'Audio & Video Accessories,TV Mounts,TV Accessories & Parts,Electronics,A/V Presentation,Accessories & Supplies,TV Ceiling & Wall Mounts', '', 'sanusvlf410b110inchsuperslimfullmotionmountfor3784inchestvs/savlf410b1,sanusvlf410b110inchsuperslimfullmotionmountfor3784inchestvs/b00c78viue,sanusvlf410b110inchsuperslimfullmotionmountfor3784inchestvs/5689019,sanus/vlf410b1,793795525420', '', 'VLF410B1', 'oppo A95', '794000000000', '32.8 pounds', 114, 114, 5, 3500, '4', '32', '', 1, 0, 4000, '\\buyguide\\img\\mobiles\\oppo_a95.jpg', 'blue', 1),
('11', 'B0172DS3ME,B00NTJKAXG', 'apple', 'Computers,Networking,Home Networking & Connectivity,Electronics,See more Novatel Jetpack MiFi 6620l Hotspot 4G LTE Veri...,Cell Phones,Cell Phone Accessories,Mobile Broadband,Mobile Broadband Devices,Access Points, Hubs & Switches,Computers/Tablets & Networking,Verizon Hotspots,Mobile Hotspots,Cell Phones & Accessories,Cell', '649000000000', 'verizonmifi6620ljetpack4gltemobilehotspotverizonwireless/b0172ds3me,novatel/mifi6620l,verizonmifi6620ljetpack4gltemobilehotspotverizonwireless/9940096,649496019587,verizonmifi6620ljetpack4gltemobilehotspotverizonwireless/b00ntjkaxg,0649496019587,verizonwireless/mifi6620l', 'Novatel', 'Mifi6620L', 'iphone 12', '649000000000', '14.4 ounces', 4, 4, 4, 13500, '16', '128', '', 1, 1, 5000, '\\buyguide\\img\\mobiles\\iphone-12.jpg', 'blue', 1),
('12', 'B06XSGYCHC', 'samsung', 'Satellite Radio,Satellite Radios,Car & Vehicle Electronics,Car Satellite Radios,Frys,Electronics,Car Electronics,Audio,SIRIUS XM Satellite Radio,Car Audio,Car Electronics & GPS', '', 'siriusxmonyxezrsatelliteradioreceiverwithvehiclekitblack/5792106,siriusxm/sxezr1v1,siriusxmonyxezrsatelliteradioreceiverwithvehiclekitblack/b06xsgychc,siriusxmsxezr1v1xmonyxezrsatelliteradioreceiverwithvehiclekit/b06xsgychc,siriusxmonyxezrsatelliteradioreceiverwithvehiclekitblack/565559502,884720013522', 'Siriusxm', 'SXEZR1V1', 'samsung s21 ultra', '885000000000', '1.25 pounds', 191, 191, 5, 25000, '16', '128', '', 1, 1, 6000, '\\buyguide\\img\\mobiles\\samsung_s21_ultra.jpg', 'black', 1),
('13', 'B075WKS4D8', 'oppo', 'Portable Bluetooth Speakers,Bluetooth & Wireless Speakers,Portable Audio & Video,Electronics,Portable Speakers & Docks,Audio,All Bluetooth & Wireless Speakers', '', 'ultimateearsmegablastsmartportablewifibluetoothspeakerwithamazonalexavoiceassistantgraphite/6172046,ultimateears984000911megablastportablewifibluetoothspeakerwithhandsfreeamazonalexavoicecontrolwaterproofgraphiteblack/b075wks4d8', '', '984-000911', 'oppo A16', '97855134431', '3.8 pounds', 6, 6, 5, 3000, '4', '32', '', 1, 0, 3500, '\\buyguide\\img\\mobiles\\oppo-a16.jpg', 'black', 1),
('14', 'B01LYGPB3J,B011QHAOWO', 'samsung', 'TV & Video,Media Streaming Players,New Technology,Frys,Electronics,Streaming Media Players,Television & Video,TVs Entertainment,TV & Home Theater,Internet TV Broadcasters,Streaming Media,All Streaming Media Players', '', 'slingboxm2/slm2,slingboxm2/b011qhaowo,753960014272,slingbox/sb375100,slingboxm2/8531135,slingboxm2/554328413,slingboxm2/b01lygpb3j,slingmedia/sb375100', 'Slingbox', 'SB375-100', 'samsung a32', '754000000000', '1.8 lbs                                                                                      1.8 pou', 65, 66, 4, 11000, '8', '128', '', 1, 1, 4200, '\\buyguide\\img\\mobiles\\samsung_a32.jpg', 'black', 1),
('15', 'B01J0BFAAO,B019Q88VAM', 'samsung', 'Portable Bluetooth Speakers,Audio Docks & Mini Speakers,Used:TV Entertainment,Bluetooth & Wireless Speakers,Portable Audio & Headphones,Used:Portable Audio,Portable Audio & Video,Frys,Electronics,Sony SRS-HG1,Used:Speakers,Home Audio & Theater,Wireless Home Speakers,All Home Speakers,Mobile,iPod, Audio Player Accessories,Consumer Electronics,Mobile Bluetooth Speakers,Audio Speakers,Home Audio,Portable Speakers & Docks,Audio,Mobile Speakers', '', 'sonyheargoportablebluetoothspeakerwithextrabass/b01j0bfaao,027242895300,sonyheargoportablebluetoothspeakerwithextrabass/1634464,sonyheargoportablebluetoothspeakerwithextrabass/sosrshg1blk,sonyheargoportablebluetoothspeakerwithextrabass/282547374236,sonyheargoportablebluetoothspeakerwithextrabass/192314904788,sonyheargoportablebluetoothspeakerwithextrabass/b019q88vam,sony/srshg1blk,sonyheargoportablebluetoothspeakerwithextrabass/4836819,sonysrshg1blkhireswirelessspeakercharcoalblack/b019q88vam', 'Sony', 'SRSHG1/BLK', 'samsung galaxy A52 s', '27242895300', '2.5 pounds', 142, 134, 5, 8000, '8', '128', '', 1, 1, 4000, '\\buyguide\\img\\mobiles\\samsung_a52s.jpg', 'white', 1),
('16', 'B004OVE61U', 'samsung', 'Electronics,Portable Audio,MP3 Accessories,All Portable Speakers,Audio,Docks, Radios & Boomboxes,Radios,Portable Audio & Video,Shortwave Radios', '', 'midlandweatheralertradio10ct/5059000,046014740914,midland/wr120c,midlandweatheralertradio10ct/553440159,midlandweatheralertradio10ct/b004ove61u', 'Midland', 'WR-120C', 'samsung galaxy note20', '46014740914', '1.4 pounds', 100, 100, 5, 22000, '16', '64', '', 1, 1, 4800, '\\buyguide\\img\\mobiles\\Samsung-Galaxy-Note20-Ultra.png', 'blue', 1),
('17', 'B007QOIP3M', 'huawei', 'Electronics,Computers,Computer Accessories,Blank Media,Accessories & Supplies,Data Cartridges,Cameras & Photo,Camera & Photo Accessories,Camcorder Tapes & Discs,Cameras & Camcorders,Camcorder Accessories,Blank DVDs & Tapes,Consumer Electronics,TV, Video & Home Audio,TV, Video & Audio Accessories,Other TV, Video & Audio Accs,Mini DVs,Accessories,Audio Cassettes', '', 'sony/dvm60prr6c,sonyminidigitalvideocassettesdvc1hour/b007qoip3m,027242272927,sonyminidigitalvideocassettesdvc1hour/201984471034,sonyminidigitalvideocassettesdvc1hour/322716983796,sonyminidigitalvideocassettesdvc1hour/7942845,sonyminidigitalvideocassettesdvc1hour/112548529547', 'Sony', 'DVM60PRR6C', 'huawei nova 7i', '27242272927', '6.2 ounces', 178, 178, 4, 5000, '4', '32', '', 1, 1, 4000, '\\buyguide\\img\\mobiles\\huawei_nava7i.jpg', 'white', 1),
('18', 'B01ETTL6LE', 'huawei', 'Portable Bluetooth Speakers,Audio Docks & Mini Speakers,Bluetooth & Wireless Speakers,Portable Audio & Headphones,Portable Audio & Video,Electronics,TVs Entertainment,Speakers,Home Audio & Theater,Wireless Home Speakers,All Home Speakers,iPod, Audio Player Accessories,Consumer Electronics,Wireless Speakers,Wireless & Multiroom Audio,Wireless and Bluetooth Speakers,Home Audio,Portable Speakers & Docks,Audio,Wireless Multiroom Speakers,Wireless Multi-Room Speakers', '27242896314', 'srszr7wirelessspeaker/sosrszr7blk,027242896314,sonyzr7hireswirelessspeakerblack/b01ettl6le,sonyzr7hireswirelessspeakerblack/331871717904,sonysrszr7hiresolutionwirelessspeakerwithbluetoothwifi/b01ettl6le,sonyzr7hireswirelessspeakerblack/4890401,sonyzr7hireswirelessspeakerblack/564690217,sonyzr7hireswirelessspeakerblack/sosrszr7blk,sony/srszr7,0027242896314', '', 'SRSZR7', 'huawei p20 pro', '27242896314', '3.5 lb', 143, 131, 5, 6000, '16', '128', '', 1, 1, 6500, '\\buyguide\\img\\mobiles\\huawei_p20.jpg', 'blue', 1),
('19', 'B009E6J1BU', 'huawei', 'Internal Solid State Drives,Computers & Accessories,Computer Accessories & Peripherals,Electronics,Computers & Tablets,Hard Drives & Storage,Data Storage', 'toshiba3tbinternalserialataiiiharddrivefordesktops/7479294,toshiba/ph3300u1i72,022265278338,oldmodel', '', '', 'PH3300U-1I72', 'huawei p40', '22265278338', '2 ounces', 357, 357, 4, 9500, '16', '64', '', 1, 1, 5000, '\\buyguide\\img\\mobiles\\huawei_p40.jpg', 'black', 1),
('2', 'B009AEMB6I', 'apple', 'Computers & Tablets,Computer Accessories & Peripherals,Laptop Accessories,Laptop Chargers & Adapters,Computers,Electronics,Computer Accessories', '', '887263410049,lenovoidea/45wslimacadapter88801419,lenovoacadapterforselectlenovoyogalaptopsblack/4020023,lenovoacadapterforselectlenovoyogalaptopsblack/554387852,lenovoacadapterforselectlenovoyogalaptopsblack/b009aemb6i,lenovo/45wslimacadapter88801419', 'Lenovo Idea', '45W SLIM AC ADAPTER - 88801419', 'iphone 13 pro max', '887000000000', '12.8 ounces', 39, 28, 5, 25000, '16', '128', '', 1, 1, 5000, '\\buyguide\\img\\mobiles\\iPhone-13-Pro-Max.jpg', 'white', 1),
('20', 'B00B7C07LC', 'mi', 'Auto & Tires,Auto Electronics,Car Speakers and Subwoofers,10\\\\ Car Subwoofer,Car Subwoofers,All Car Subwoofers,Car Electronics & GPS,Car Audio,Car Subwoofers & Enclosures,Component Subwoofers,Consumer Electronics,Vehicle Electronics & GPS,eBay Motors,Parts & Accessories,Car Electronics,Subwoofers & Enclosures,Subwoofers,Electronics,Car & Vehicle Electronics', '', 'poweracoustikgothicseries10dualvoicecoil2ohmsubwooferblack/552904673,poweracoustik/gw310,poweracoustikgothicseries10dualvoicecoil2ohmsubwooferblack/8927746,poweracoustikgothicseries10dualvoicecoil2ohmsubwooferblack/182119477700,709483046443,poweracoustikgothicseries10dualvoicecoil2ohmsubwooferblack/b00b7c07lc', '', 'GW3-10', 'xiaomi-redmi note11', '709000000000', '18.3 pounds', 160, 155, 4, 3000, '4', '32', '', 1, 1, 4000, '\\buyguide\\img\\mobiles\\redmi_note11.jpg', 'white', 1),
('21', 'B01700RNIO', 'mi', 'Headphones,Bluetooth Headphones,On-Ear Headphones,Electronics,Bluetooth Headphones rydyqsaxrbrdyuquyetsrydxefvucsr,Audio,Mobile', '', 'houseofmarleyrebelbtwirelessonearheadphonesblack/550703763,houseofmarley/emjh101bk,houseofmarleyrebelbluetoothonearheadphonesblack/b01700rnio,houseofmarleyrebelbtwirelessonearheadphonesblack/horebelbtbk,houseofmarleyrebelbtwirelessonearheadphonesblack/5688025,rebelbtonearwirelessbluetoothheadphonesblack/horebelbtbk,houseofmarleyrebelbtwirelessonearheadphonesblack/b01700rnio,846885007266', 'House of Marley', 'EM-JH101-BK', 'xiaomi-redmi 9A', '847000000000', '15.2 ounces', 156, 149, 5, 7000, '8', '32', '', 1, 1, 4000, '\\buyguide\\img\\mobiles\\mi9a.jpg', 'black', 1),
('22', 'B005YXXS4I', 'hp', 'TV, Video & Home Audio,Receivers,Electronics,TVs Entertainment,Compact & Shelf Stereos,Consumer Electronics,Home Audio Stereos, Components,Audio & Home Theatre,Receivers & Amplifiers,Home Audio Components,Home Audio,CD Players Changers,Audio,Compact Radios & Stereos,Stereo Shelf Systems', '', 'yamaha40wmicrocomponentsystemblack/yacrx332bl,yamaha40wmicrocomponentsystemblack/2877396,yamaha40wmicrocomponentsystemblack/162508611472,yamaha40wmicrocomponentsystemblack/b005yxxs4i,yamaha/crx332bl,027108939599,crx322cdreceiver/yacrx332bl', 'Yamaha', 'CRX-332BL', 'HP Elite x2', '27108939599', '6.5 lb', 54, 54, 5, 15000, '8', '1024', '‎Intel UHD Graphics 620\r\n', 0, 0, 3500, '\\buyguide\\img\\laptops\\hp_elite.jpg', 'black', 2),
('23', 'B00U0VEGRM', 'lenovo', 'Portable Bluetooth Speakers,Bluetooth & Wireless Speakers,Portable Audio & Video,Electronics,Portable Speakers & Docks,Audio', '', 'dreamwavetremorarmygreenblackaluminumwireless50wruggedoutdoorbluetoothspeaker/b00u0vegrm,dreamwave/tremor,752423791996,dreamwavetremorportablebluetoothspeakergreenblack/5436508', '', 'TREMOR', 'Lenovo v15', '752000000000', '13.2 pounds', 2, 2, 4, 10500, '8', '512', 'Integrated Intel Iris', 1, 1, 4500, '\\buyguide\\img\\laptops\\lenovo_v15.jpg', 'black', 2),
('24', 'B00Q397RJY,B005LKCDR2,B001447Z8Q', 'dell', 'stone products,electronics,Parts & Accessories,brick manufacturing,landmark stone,Car Electronics,brick manufacturing process,eBay Motors,natural stone,brick designs,Digital Media Receivers,Car Stereo Receivers,Vehicle Electronics & GPS,brick,Electronics Features,Video In-Dash Units w/o GPS,Car Video,thin brick,Car Audio In-Dash Units,Car Audio,Consumer Electronics,brick sizes,glen gery,manufactured stone,Car Video Units W/out GPS/Nav,Apple CarPlay Receivers,In-Dash with GPS,brick colors,Car Ele', '793000000000', '793276012944,glengery/alpine,0793276012944,alpine/282611072502,alpine/b001447z8q,alpine/302431154490,alpine/292217711461,alpine/b005lkcdr2,alpine/121935848708,alpine/alpine,alpine/9254006,alpine/b00q397rjy', 'Glengery', 'Alpine', 'Dell gaming', '793000000000', '7 pounds', 38, 30, 5, 18000, '16', '2048', 'NVIDIA GeForce RTX 3050 4GB GDDR6', 0, 0, 5500, '\\buyguide\\img\\laptops\\dell_gaming.jpg', 'red', 2),
('25', 'B06XVDYHQX', 'asus', 'Computers,Desktops Workstations,Desktop Computers,Desktop Computers wbeszexzzxeteywxtzby,Computers & Tablets,Desktop & All-in-One Computers,All Desktops,Electronics,Computers & Accessories,Desktops,Towers,Computers/Tablets & Networking,Desktops & All-In-Ones,PC Desktops & All-In-Ones', '', 'xps8920towerdesktopcomputer/201955397698,dell/xps89207529slvpus,xps8920towerdesktopcomputer/dex89207529s,xps8920towerdesktopcomputer/b06xvdyhqx,xps8920towerdesktopcomputer/5775301,884116255529', '', 'XPS8920-7529SLV-PUS', 'ASUS ExpertBook p2451fa', '884000000000', '22.0 lb', 1, 1, 5, 13500, '8', '1024', 'integrated', 1, 1, 4000, '\\buyguide\\img\\laptops\\asus.jpg', 'black', 2),
('26', 'B008FH1PJA', 'huawei', 'Headphones,Bluetooth Headphones,All Headphones,Electronics,Audio,Mobile', '', 'meelectronicsairfirunawaybluetoothwirelessonearheadphoneswhitegray/8826499,airfirunawayaf32stereobluetoothwirelessheadphoneswithhiddenmicrophonewhite/meaf32btwhmw,meeaudiorunaway40bluetoothstereowirelesswiredheadphoneswithmicrophonewhite/b008fh1pja,meelectronics/hpaf32gwmee,736211201263,0736211201263,meeaudiorunaway40bluetoothstereowirelesswiredheadphoneswithmicrophone/563477858,meeaudio/hpaf32gwmee', '', 'HP-AF32-GW-MEE', 'Huawei MateBook', '736000000000', '3.88 oz', 342, 342, 4, 16000, '8', '1024', 'integrated', 1, 1, 5400, '\\buyguide\\img\\laptops\\huawei.jpg', 'black', 2),
('27', 'B071ZVQVFQ', 'apple', 'LED & LCD TVs,All TVs,Refurbished TVs,TV & Video,Electronics,Shop TVs by Type,Television & Video,Televisions,TVs Entertainment', '', '841434197719,samsung40classfhd1080psmartledtvun40m5300/564823696,samsung40classfhd1080psmartledtvun40m5300/567138282,samsungun40m5300afxzaflat40led1920x1080p5seriessmarttv2017withflattiltwallmountbundletwo26foothdmicablessixoutletsurgeadapter/564823696,samsungelectronicsun40m5300afxzaflat40led1920x1080p5seriessmarttv2017/b071zvqvfq,samsungelectronicsun40m5300a40inch1080psmartledtv2017model/b071zvqvfq,m5300series40classfullhdsmartledtv/saun40m5300,887276222332,refurbishedsamsung40classfhd1080psma', '', 'UN40M5300AFXZA', 'Apple macBook pro 2020', '887000000000', '15.4 lb', 154, 154, 4, 31000, '16', '2048', 'integrated', 1, 1, 3500, '\\buyguide\\img\\laptops\\mac.jpg', 'black', 2),
('28', 'B001AVRD62', 'samsung', 'Surround Speakers,Electronics Features,Surround Sound Systems,Frys,Electronics,All Home Theater Systems,TVs Entertainment,Speakers,Home Audio & Theater,Home Electronics,TV Sound Systems rxxbwxxcscxuvutetd,Home & Kitchen Features,Home Theater Systems,Audio Speakers,TV Sound Systems,Home Audio,Home Theater,Electrical,Audio', '27108105321', 'nssp1800bl51channelhometheatersystemblack/yanssp1800bl,nssp1800bl51channelhometheatersystemblack/4452997,nssp1800bl51channelhometheatersystemblack/550726013,nssp1800bl51channelhometheatersystemblack/1306813820,799665006693,nssp1800bl51channelhometheatersystemblack/b001avrd62,027108105321,0027108105321,yamaha/nssp1800bl', 'YAMAHA', 'NS-SP1800BL', 'samsung galaxy watch4', '27108105321', '18.7 lbs', 1604, 1604, 4, 3100, '4', '32', '', 1, 1, 4500, '\\buyguide\\img\\smartwatches\\sam.jpg', 'white', 3),
('29', 'B00TVFO08S', 'honor', 'Surround Speakers,TV, Video & Home Audio,Surround Sound Systems,Electronics,All Home Theater Systems,TVs Entertainment,Speakers,Consumer Electronics,Home Theater Systems,TV Sound Systems,Audio & Home Theatre,Home Audio,Audio', '', 'acoustimass6seriesvhometheaterspeakersystemblack/boacm6svhts,acoustimass6seriesvhometheaterspeakersystemblack/182715469802,bose/7209601100,017817664585,acoustimass6seriesvhometheaterspeakersystemblack/b00tvfo08s,acoustimass6seriesvhometheaterspeakersystemblack/4368058', 'Bose', '720960-1100', 'Honor watch magic2', '17817664585', '1.18 lb', 48, 40, 4, 2500, '4', '32', '', 1, 1, 4000, '\\buyguide\\img\\smartwatches\\honor.jpg', 'black', 3),
('3', 'B012ASF1WQ', 'samsung', 'Desktop Memory,Computers/Tablets & Networking,Memory (RAM),Computer Components & Parts,Computers & Accessories,Computer Components,Memory (RAM,Memory,Electronics,Computers & Tablets,Computer Cards & Components', '', '751492584669,pnyanarchy16gb2pkx8gb24ghzddr4dimmdesktopmemorykitblue/4842608,pnyanarchy16gb2pkx8gb24ghzddr4dimmdesktopmemorykitblue/302308649204,pnyanarchy16gb2pkx8gb24ghzddr4dimmdesktopmemorykitblue/b012asf1wq,pnyanarchy16gbkit2x8gbddr42400mhzpc419200cl15desktopmemorybluemd16gk2d4240015ab/b012asf1wq,pnyanarchy16gb2pkx8gb24ghzddr4dimmdesktopmemorykitblue/322023560824,pny/md16gk2d4240015ab', '', 'MD16GK2D4240015AB', 'samsung a54', '751000000000', '0.8 ounces', 507, 495, 5, 6500, '4', '128', '', 1, 1, 4500, '\\buyguide\\img\\mobiles\\samsung_a54.jpg', 'white', 1),
('30', 'B01KUAMCWI', 'mi', 'Computers,Mice & Mice Pads,Computer Accessories,Computer Accessories & Peripherals,Keyboards, Mice & Joysticks,Electronics,Gaming Mice & Mice Pads,Accessories,Mice & Keyboards,Video Games,Gaming Mice,Computers & Tablets,Mice,Wireless & Bluetooth Mice', '', 'logitech/910004797,097855121868,logitechgg403prodigywirelessopticalgamingmouseblack/5705510,logitechg403wirelessgamingmousewithhighperformancegamingsensor/b01kuamcwi', '', '910-004797', 'mi lite watch', '97855121868', '3.68 ounces', 40, 40, 4, 1200, '4', '32', '', 1, 1, 5500, '\\buyguide\\img\\smartwatches\\mi.png', 'black', 3),
('31', 'B01CEAT9ZU', 'apple', 'Electronics,CD Players & Digital Media Receivers,Car Electronics,Motors,Marine Stereos,CD Players,Fishing,Car Audio,Automotive,Car & Vehicle Electronics,Car Stereo Receivers,Digital Media Receivers,Outdoor Sports,Marine Electronics,Car Electronics & GPS', '27242896000', '0027242896000,sony/mexm100bt,sonymexm100bt160wrmsmarinecdreceiverwithbluetoothblacksiriusxmready/b01ceat9zu,027242896000,sonyindashcddmreceiverbuiltinbluetoothsatelliteradioreadywithdetachablefaceplateblack/5495318,sonyindashcddmreceiverbuiltinbluetoothsatelliteradioreadywithdetachablefaceplateblack/b01ceat9zu', 'Sony', 'MEXM100BT', 'apple watch SE', '27242896000', '4.79 pounds', 82, 75, 5, 9000, '4', '32', '', 1, 1, 5400, '\\buyguide\\img\\smartwatches\\siri.jpg', 'white', 3),
('32', 'B01MUG578I,B072MP2CFG', 'apple', 'Portable Bluetooth Speakers,Audio Docks & Mini Speakers,Bluetooth & Wireless Speakers,Portable Audio & Headphones,Portable Audio & Video,Electronics,Portable Audio,Portable Wireless & Bluetooth Speakers,Speakers,Home Audio & Theater,Wireless Home Speakers,Mobile,iPod, Audio Player Accessories,Consumer Electronics,Mobile Bluetooth Speakers,Wireless and Bluetooth Speakers,UNNAV,Portable Speakers & Docks,Audio,Mobile Speakers,All Bluetooth & Wireless Speakers', '', 'sonysrsxb30blkxb30portablewirelessspeakerwithbluetooth/b01mug578i,027242902695,sonyxb30portablebluetoothspeakerblack/272855583204,sonyxb30portablebluetoothspeakerblack/311881660787,sony/srsxb30blk,sonyxb30portablebluetoothspeakerblack/b072mp2cfg,sonyxb30portablebluetoothspeakerblack/b01mug578i,sonyxb30portablebluetoothspeakerblack/5744203,sonyxb30portablebluetoothspeakerblack/282573811327,sonyxb30portablebluetoothspeakerblack/564734192,sonyxb30portablebluetoothspeakerblack/sosrsxb30b', '', 'SRSXB30/BLK', 'apple watch series 7', '27242902695', '3 pounds', 84, 80, 5, 8500, '4', '32', '', 1, 1, 3500, '\\buyguide\\img\\smartwatches\\siri_series.jpg', 'black', 3),
('33', 'B00IWQ3YPC', 'mi', 'Electronics,Home Audio & Theater,Home Theater,Home Theater Systems,Consumer Electronics,Portable Audio & Headphones,iPod, Audio Player Accessories,Audio Docks & Mini Speakers,TVs Entertainment,Tabletop Audio,Mini Hi-Fi Systems,Audio,Home Audio,Stereo Shelf Systems,Frys,Shelf Systems,CD Players,Portable Audio', '', 'sonylbtgpx555minisystemwithbluetoothnfc/331874713008,sonylbtgpx555minisystemwithbluetoothnfc/8038037,sonylbtgpx555minisystemwithbluetoothnfc/554400095,sonylbtgpx555minisystemwithbluetoothnfc/9sia0aj3md4812,027242875340,sonylbtgpx555minisystemwithbluetoothnfc/b00iwq3ypc,sony/lbtgpx555,sonylbtgpx555minisystemwithbluetoothnfc/solbtgpx555', 'Sony', 'LBTGPX555', 'mi band 4', '27242875340', '11.9 lb', 44, 44, 5, 1400, '4', '32', '', 1, 1, 4500, '\\buyguide\\img\\smartwatches\\mi_band.jpg', 'white', 3),
('34', 'B000O3TFWW', 'apple', 'Electronics,Cameras & Camcorders,All Camcorders,Home, Garage & Office,Pet Supplies & Technology,Pet Cameras & Technology,Wearable Pet Cameras,Computers & Accessories,Computer Accessories & Peripherals,Audio & Video Accessories,Webcams,Housewares,Pet Cameras,Dog,Training Aids,Training & Behavior,Networking,Computers,Routers,pet,Security & Surveillance,Surveillance Video Equipment,Security Monitors & Displays', '816000000000', '0816479012303,motorolawifipetvideocamera/4556600,816479012303,motorolawifipetvideocamera/554756472,motorolawifipetvideocamera/2399369,motorolawifipetvideocamera/b00lil7yvi,motorola/scout66', 'Motorola', 'SCOUT66', 'iphone 6 plus', '816000000000', '13.6 ounces', 101, 83, 5, 10000, '4', '32', '', 1, 1, 4500, '\\buyguide\\img\\mobiles\\iphone8_pro.jpg', 'red', 1),
('35', 'B000O3TFWW', 'mi', 'In-Wall & In-Ceiling Speakers,Electronics,In-Ceiling Speakers,TVs Entertainment,Speakers,Home Audio & Theater,All Home Speakers,Install Outdoor Speakers wbdadzefwwsbvcrtwtvxqqdxsqdwtdtrwt,Home Audio,Install Outdoor Speakers,In-Wall and In-Ceiling Speakers,Audio,all electronics', '', 'nsiw480cwhinceiling8naturalsoundthreewayspeakersystempair/yansiw480cwh,yamahansiw480cwh3wayinceilingspeakersystemwhite/b000o3tfww,027108105000,yamaha/nsiw480cwh,yamaha83wayinceilingspeakerspairwhite/8285884,yamahansiw480cwh83wayinceilingspeakersystemwhite/b000o3tfww,yamahansiw480cwh83wayinceilingspeakersystemwhite/553501954,yamaha/nsiw480cw', 'Yamaha', 'NS-IW480CWH', 'mi band 5', '27108105000', '4.6 lbs', 97, 97, 5, 500, '4', '32', '', 1, 1, 3500, '\\buyguide\\img\\smartwatches\\miband5.jpg', 'black', 3),
('36', 'Outdoor Speakers,Electronics Features,Electronics,TVs Entertainment,Speakers,Install Outdoor Speaker', 'apple', 'Outdoor Speakers,Electronics Features,Electronics,TVs Entertainment,Speakers,Install Outdoor Speakers,Home Audio,Home Audio & Theater,Audio,All Home Speakers', '93207057342', 'openboxlikenewdefinitivetechnologyaw6500200wrmsspeaker3waywhite/9sia3jx1uk9967,openboxlikenewdefinitivetechnologyaw6500200wrmsspeaker3waywhite/b00170o1hk,openboxlikenewdefinitivetechnologyaw6500200wrmsspeaker3waywhite/8819291,aw6500allweatheroutdoorspeakerwhitesingle/deaw6500wh,093207057342,0093207057342,definitivetechnology/aw6500wob,definitivetechnology/necb,openboxlikenewdefinitivetechnologyaw6500200wrmsspeaker3waywhite/b001bbt7ry,openboxlikenewdefinitivetechnologyaw6500200wrmsspeaker3waywhit', '5 Years', 'NECB', 'iphone 12 pro max', '93207057342', '9.2 lb', 162, 162, 5, 24000, '8', '32', '', 1, 1, 5000, '\\buyguide\\img\\mobiles\\i12promax.jpg', 'white', 1),
('37', 'B0038NMC8O', 'apple', 'Auto & Tires,Auto Electronics,Car Speakers and Subwoofers,6.5\\\\ Car Speakers,All Car Speakers & Subwoofers,Car Electronics & GPS,Car Audio,Car Speakers,Electronics,Car & Vehicle Electronics,Car Electronics,Speakers,Coaxial Speakers', '', 'alpine/spe6000,alpine6122waycoaxialcarspeakerswithpolypropyleneconespairblack/b0038nmc8o,alpine6122waycoaxialcarspeakerswithpolypropyleneconespairblack/1416147,793276601483', '', 'SPE-6000', 'iphone 6s plus', '793000000000', '5.2 pounds', 107, 107, 5, 8000, '4', '64', '', 1, 1, 3500, '\\buyguide\\img\\mobiles\\6splus.jpg', 'blue', 1),
('38', 'B01364B00K', 'infinix', 'Computers,Portable Battery Packs yxdasxffaabvrfusya,Portable Chargers/Power Packs,Computers & Accessories,Computer Accessories,Computer Accessories & Peripherals,Portable Battery Packs ccbdtucwsuccsbzvxsect,Frys,Electronics,Portable Battery Packs,Cell Phones,Cell Phone Accessories,Cell Phone Batteries & Power,Batteries,Surge Protectors,Surge Protectors, Power Strips,PC Computers,Consumer Electronics,Mobile Power,Power Accessories,Multipurpose Batteries & Power,Rechargeable Batteries,Portable Bat', '', 'belkin/bst301tt,belkintravelrockstarsurgeprotectorwith2acoutlets/bebst301tt,745883685172,belkintravelrockstarsurgeprotectorwith2acoutlets/3982531,belkintravelrockstarsurgeprotectorwith2acoutlets/222581045638,travelrockstar3in12ausbdualoutletwallchargerwithinternal3000mahbatterypack/bebst301tt,belkintravelrockstarsurgeprotectorwith2acoutlets/4859664,belkintravelrockstarsurgeprotectorwith2acoutlets/b01364b00k', 'Belkin', 'BST301TT', 'infinix zero 5', '746000000000', '12.6 ounces', 4, 4, 5, 3400, '4', '32', '', 1, 1, 4000, '\\buyguide\\img\\mobiles\\zero5.jpg', 'black', 1),
('39', 'B00F6PRSMW', 'infinix', 'Headphones,Electronics,Over-Ear Headphones,Audio,Over-Ear & On-Ear Headphones', '', 'bowerswilkinsp7overearheadphonesblack/2436009,714346319701,bowerswilkinsp7wiredoverearheadphones/b00f6prsmw,bowerswilkinsp7headphonesblackwired/b00f6prsmw,bowerswilkins/p7', '', 'P7', 'infinix hot 11', '714000000000', '2.43 pounds', 270, 260, 5, 4000, '4', '64', '', 1, 1, 5200, '\\buyguide\\img\\mobiles\\hot11.jpg', 'black', 1),
('4', 'B0168YIWSI', 'oppo', 'Electronics', '890000000000', 'microsoftsurfacepro4typecoverwithfingerprintid/4562009,microsoftsurfacepro4typecoverwithfingerprintid/554687153,889842011050,0889842011050,microsoftsurfacepro4typecoverwithfingerprintid/mirh700001,microsoftsurfacepro4typecoverwithfingerprintid/n82e16834735100,microsoftsurfacepro4typecoverwithfingerprintid/b0168yiwsi,microsoft/rh700001', 'Microsoft', 'RH7-00001', 'oppo reno6', '890000000000', '1.1 pounds', 17, 17, 5, 10000, '16', '128', '', 1, 1, 5500, '\\buyguide\\img\\mobiles\\oppo_reno_6.jpg', 'black', 1),
('40', 'B01AEW9E46', 'huawei', 'Mobile,Headphones,Bluetooth Headphones,Electronics,Audio,Over-Ear & On-Ear Headphones,Over-Ear Headphones,Shop Headphones by Type,Over-Ear and On-Ear Headphones,Frys', '', 'everestelite700aroundearwirelessheadphoneswhite/4403709,jbl/v700nxtwht,everestelite700aroundearwirelessheadphoneswhite/b01aew9e46,050036328623,everestelite700aroundearwirelessheadphoneswhite/jbv700nxtwht', 'JBL', 'V700NXTWHT', 'nova 3i', '50036328623', '10.8 oz', 11, 2, 5, 3500, '4', '128', '', 1, 1, 4500, '\\buyguide\\img\\mobiles\\nova3i.jpg', 'black', 1),
('41', 'B00009WCBT', 'huawei', 'Office,Office Technology,Phones & Accessories,Headsets & Accessories,Walmart for Business,Office Electronics,Phones,Home, Garage & Office,Telephones & Communication,Special Needs Telephones,Categories,Big Button & Amplified Telephones,Electronics Features,Connected Home & Housewares,Phones Video Conferencing,Analog Phones Accessories,Phone Accessories,Collaboration IP Telephony', '760000000000', '759599751809,0759599751809,allroundsoftware/claritysr200,claritysuperloudphoneringerwhite/2193417,claritysuperloudphoneringerwhite/b00009wcbt,claritysuperloudphoneringerwhite/2056242,claritytelecom/claritysr200,claritysuperloudphoneringerwhite/563251985', 'Allround Software', 'CLARITY-SR-200', 'HUAWEI nova 9', '760000000000', '1.2 pounds', 11, 11, 5, 8500, '4', '128', '', 1, 1, 5400, '\\buyguide\\img\\mobiles\\nova 9i.jpg', 'blue', 1),
('42', 'B00RZYD51A', 'anker', 'Headphones,Electronics,Over-Ear Headphones,Audio,Over-Ear & On-Ear Headphones', '', '846885005156,houseofmarleyemdh003psttrnoisecancellingoverearheadphonesblack/b00rzyd51a,houseofmarleyemdh003psttrnoisecancellingoverearheadphonesblack/9sia7vt3mm0380,houseofmarleyemdh003psttrnoisecancellingoverearheadphonesblack/2866123,houseofmarley/emdh003ps', '', 'EM-DH003-PS', 'Anker soundcore', '847000000000', '2.8 pounds', 148, 140, 4, 750, '4', '32', '', 1, 1, 4000, '\\buyguide\\img\\airpods\\anker.jpg', 'black', 4),
('43', 'B0742RMVQ8', 'apple', 'Home Theater Systems,Portable Audio & Video,Electronics,MP3 & MP4 Player Accessories,Home Audio,Home Audio & Theater,All Home Stereos,Audio,Stereo Shelf Systems', '', 'toshiba30wmainunitspeakersystemcombosetblack/5937008,toshibamicrocomponentspeakersystemwirelessbluetoothspeakersoundsystemwithfm/b0742rmvq8,toshiba30wmainunitspeakersystemcombosetblack/b0742rmvq8,toshiba/tyasw91,toshiba30wmainunitspeakersystemcombosetblack/564830042,818723020126', '', 'TY-ASW91', 'apple airpod', '819000000000', '10.2 pounds', 3, 3, 4, 4200, '4', '32', '', 1, 1, 5500, '\\buyguide\\img\\airpods\\airpod.jpg', 'white', 4),
('44', 'B00L2EWRW2', 'apple', 'Electronics,Home Audio & Theater,Home Audio,All Home Speakers,Speaker Systems,Audio,Bluetooth & Wireless Speakers,All Bluetooth & Wireless Speakers,Stereos,Speakers', '', 'kicker41ik5bt2v2amphitheaterhighperformanceaudiosystemwithbluetoothblack/4415503,kicker/41ik5bt2v2,kicker41ik5bt2v2amphitheaterhighperformanceaudiosystemwithbluetoothblack/b00l2ewrw2,kicker41ik5bt2v2amphitheaterhighperformanceaudiosystemwithbluetoothblack/553124514,713034070733', '', '41IK5BT2V2', 'apple airpod pro', '713000000000', '13.8 pounds', 69, 69, 4, 5000, '4', '32', '', 1, 1, 4000, '\\buyguide\\img\\airpods\\airpodpro.jpg', 'white', 4),
('45', 'B00PASUGTC', 'lenovo', 'Speaker Separates,Center Channel Speakers,Electronics,TVs Entertainment,Speakers,Home Audio,Center-Channel Speakers,Audio,Speaker Separates baesfadqwexxbctqsw', '', '850071005356,primethreewaycenterchannelspeakerpremiumblackash/b00pasugtc,primethreewaycenterchannelspeakerpremiumblackash/5707703,svs/primecenterblackash,primethreewaycenterchannelspeakerpremiumblackash/svprmcntrbka', '', 'PRIME CENTER - BLACK ASH', 'lenovo lp6', '850000000000', '20.2 lb', 123, 108, 5, 899, '4', '32', '', 1, 1, 5500, '\\buyguide\\img\\airpods\\lenovo.jpg', 'black', 4),
('46', 'B008JJLZ7G', 'huawei', 'Computers,Internal Hard Drives,Internal Drives,Drives, Storage & Blank Media,Computers & Accessories,Hard Drives (HDD, SSD & NAS),Computer Accessories & Peripherals,Internal Hard Disk Drives,Electronics,Hard Drives & Storage,Drives Storage,Computers/Tablets & Networking,Computer Components,Computers & Tablets,Data Storage', '', '2tbred5400rpmsataiii35internalnashdd/b008jjlz7g,wd/wd20efrx,718037799667,2tbred5400rpmsataiii35internalnashdd/2764463,2tbred5400rpmsataiii35internalnashdd/wewd20efrx,2tbred5400rpmsataiii35internalnashdd/142445493836,2tbred5400rpmsataiii35internalnashdd/6560007', '', 'WD20EFRX', 'huawei freebuds 4', '718000000000', '1.32 lb', 88, 88, 5, 2000, '4', '32', '', 1, 1, 5000, '\\buyguide\\img\\airpods\\huawei.jpg', 'black', 4),
('47', 'B073JHHNJ9', 'honor', 'Computers,Wireless Networking rwtaqbstbwzzteq,Networking,Computers & Accessories,Wireless Adapters Cards,Wireless Networking,Electronics,Networking Products,Network Adapters,Networking Cables & Accessories,USB Network Adapters', '', '606449120882,netgear/a700010000s,nighthawkac1900dualbandwifiusbadapter/b073jhhnj9,nighthawkac1900dualbandwifiusbadapter/nea7000', '', 'A7000-10000S', 'honor true wireless', '606000000000', '0.147 lb', 477, 477, 5, 977, '4', '32', '', 1, 1, 5400, '\\buyguide\\img\\airpods\\honor.jpg', 'white', 4),
('48', 'B00KGGK1J8', 'mi', 'Accessories,Portable Power Banks,Portable Chargers/Power Packs,Cell Phones & Accessories,Cell Phones,Portable Battery Packs,Cell Phone Accessories,Cell Phone Batteries & Power,Batteries & Battery Packs,cell,Power,Chargers & Cradles', '', 'samsunguniversal3100mahportableexternalbatterychargerwhite/131775755856,samsunguniversal3100mahportableexternalbatterychargerwhite/saebp310siwe,887276962818,samsunguniversal3100mahportableexternalbatterychargerwhite/5573022,samsunguniversal3100mahportableexternalbatterychargerwhite/b00kggk1j8,samsunguniversal3100mahportableexternalbatterychargerwhite/301798324803,samsung/ebp310siwesta', 'SAMSUNG', 'EB-P310SIWESTA', 'realme wireless buds', '887000000000', '5.6 ounces', 116, 116, 5, 700, '4', '32', '', 1, 1, 5400, '\\buyguide\\img\\airpods\\mi.jpg', 'white', 4),
('49', 'B00IAKLM54', 'lenovo', 'Electronics,Accessories & Supplies,Audio & Video Accessories,Remote Controls & Accessories,TV & Video,TV Accessories,Remote Controls,TVs Entertainment,General Accessories,Accessories,Consumer Electronics,TV, Video & Home Audio,TV, Video & Audio Accessories,See more Logitech Harmony Ultimate One IR Remote With C...,TV Remote Controls,TV & Home Theater,TV & Home Theater Accessories,Universal Remote Controls,Stereo Accessories,Electronics Features', '97855100818', 'logitech/915000224,logitech915000224harmonyultimateone15deviceuniversalinfraredremotewithcustomizabletouchscreencontrolblack/111448285620,logitech915000224harmonyultimateone15deviceuniversalinfraredremotewithcustomizabletouchscreencontrolblack/b00iaklm54,097855100818,0097855100818,logitech915000224harmonyultimateone15deviceuniversalinfraredremotewithcustomizabletouchscreencontrolblack/553645002,logitech915000224harmonyultimateone15deviceuniversalinfraredremotewithcustomizabletouchscreencontrolbl', 'Logitech', '915-000224', 'lenovo XG01', '97855100818', '1.7 pounds', 90, 90, 4, 444, '4', '32', '', 1, 0, 4000, '\\buyguide\\img\\airpods\\lenovoG.jpg', 'white', 4),
('5', 'B00R5WGT2E', 'apple', 'Electronics,Portable Audio,Auto & Tires,Auto Electronics,Car Receivers,All In-Dash Stereos,Car & Vehicle Electronics,Car Electronics,Car Video,In-Dash DVD & Video Receivers,Car Audio,Car Stereo Receivers,All Car Stereo Receivers,Automotive', '', 'jvckdx320btsappleipodandroiddigitalmediareceiverwithbluetooth/553496725,jvckdx320btsappleipodandroiddigitalmediareceiverwithbluetooth/b00r5wgt2e,046838070990,jvckdx320btsappleipodandroiddigitalmediareceiverwithbluetooth/1517965,jvckdx320btsappleipodandroiddigitalmediareceiverwithbluetooth/9sia0za2v93665,jvc/kdx320bts', '', 'KDX320BTS', 'iphone 12 pro max', '46838070990', '1.8 pounds', 1, 1, 5, 19000, '16', '128', '', 1, 1, 5000, '\\buyguide\\img\\mobiles\\iphone-12-pro.png', 'black', 1),
('50', 'B005MJHFHK,B00VXW0J5A,B00OY50CZU', 'sony', 'Office,Projectors & Presentation Equipment,Audio Visual Presentation,TV Stands, Mounts & Furniture,Projector Mounts Accessories,Projector Mounts & Screens,Projector Mounts,Electronics,TV & Home Theater,Office Technology,Mounts Carts,Mounting Plates,A/V Presentation,Networking Products,Powerline Network Adapters,Network Adapters', '735000000000', 'peerlessav/acc570,roundlcdprojectorceilingplateblack/8180158,peerless/acc570,roundlcdprojectorceilingplateblack/peacc570,735029200956,0735029200956,roundlcdprojectorceilingplateblack/b00oy50czu,roundlcdprojectorceilingplateblack/b005mjhfhk,roundlcdprojectorceilingplateblack/b00vxw0j5a', 'Peerless', 'ACC570', 'sony-WF-XB700', '735000000000', '1.2 lbs', 100, 100, 4, 2800, '4', '32', '', 1, 1, 5500, '\\buyguide\\img\\airpods\\sony.jpg', 'black', 4),
('6', 'B000YA33DC', 'apple', 'Photography,Photography Bags Cases,Camera Bags,Backpacks,Backpacks ffvzrevebzuqvcddwzzxeuwva,Cameras & Camcorders,Digital Camera Accessories,Camera Bags, Cases & Straps,Camera Backpacks', '56035351853', 'flipside300backpackblack/1446571,056035351853,0056035351853,lowepro/lp35185,flipside300backpackblack/555140249,flipside300backpackblack/lofs300b,flipside300backpackblack/301763910701,flipside300backpackblack/b000ya33dc', 'Lowepro', 'LP35185', 'iphone 8', '56035351853', '2.87 lbs', 340, 340, 4, 9000, '4', '64', '', 1, 1, 4000, '\\buyguide\\img\\mobiles\\iphone8.jpg', 'red', 1),
('7', 'B00WBS31OQ', 'apple', 'Portable Bluetooth Speakers,Stereos,Computers,Bluetooth & Wireless Speakers,Computer Accessories,Speaker Systems,Portable Audio & Video,Electronics,Portable Audio,Portable Wireless & Bluetooth Speakers,Speakers,Home Audio & Theater,Wireless and Bluetooth Speakers,Portable Speakers & Docks,Wireless & Portable Bluetooth Speakers,Audio,Computer Speakers', '', '047532907711,ihomerechargeablesplashproofstereobluetoothspeakerwithspeakerphone/4525009,ihome/ibt33bc,sditechnologies/ibt33bc,ihomerechargeablesplashproofstereobluetoothspeakerwithspeakerphone/555013051,ihomerechargeablesplashproofstereobluetoothspeakerblackibt33bc/b00wbs31oq,ihomerechargeablesplashproofstereobluetoothspeakerwithspeakerphone/b00wbs31oq', 'iHome', 'IBT33BC', 'iphone 11 pro', '47532907711', '12.5 ounces', 127, 114, 4, 12000, '8', '128', '', 1, 1, 5000, '\\buyguide\\img\\mobiles\\iphone11_pro.jpg', 'white', 1),
('8', 'B018K251JE,B00VILQKQ8', 'oppo', 'Electronics,Portable Audio & Video,Home Audio & Theater,Home Audio,All Home Speakers,Speaker Systems,Consumer Electronics,TV, Video & Home Audio,Home Theater Systems,See more Black BOYTONE Bt-210f 30 Watt FM Radio Bluetoo...,Audio,Stereos,Speakers,Cell,MP3 Player Accessories,Portable Bluetooth Speakers,See more BOYTONE Bt-210f Bluetooth Wireless Speaker Mp3...', '', 'boytone2500w21chhometheatersystemblackdiamond/b018k251je,boytone2500w21chhometheatersystemblackdiamond/4784804,boytone2500w21chhometheatersystemblackdiamond/b00vilqkq8,boytone/bt210f,boytone2500w21chhometheatersystemblackdiamond/554725012,642014746682', 'Boytone', 'BT-210F', 'oppo find x3', '642000000000', '14.55 pounds', 149, 149, 5, 5000, '8', '64', '', 0, 1, 4500, '\\buyguide\\img\\mobiles\\oppo_find_X3.jpg', 'white', 1),
('9', 'B00V631478', 'apple', 'Electronics,Car & Vehicle Electronics,Car Electronics,Car Audio,Speakers,Coaxial Speakers,Car Electronics & GPS,Car Speakers,6\\\\ x 8\\\\ Car Speakers', '', '050036322355,jbl/gx862,jbl6x82waycoaxialcarspeakerswithpolypropyleneconespairblack/8038064,jbl6x82waycoaxialcarspeakerswithpolypropyleneconespairblack/b00v631478', '', 'GX862', 'iphone 13 pro', '50036322355', '4.2 pounds', 25, 20, 5, 20000, '16', '128', '', 1, 1, 4500, '\\buyguide\\img\\mobiles\\iphone-13-pro.png', 'black', 1);

-- --------------------------------------------------------

--
-- Table structure for table `electronic_products_stores`
--

CREATE TABLE `electronic_products_stores` (
  `card_id` int(11) NOT NULL,
  `electronics_products_id` char(100) NOT NULL,
  `store_branch_id` int(11) NOT NULL,
  `rate` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `electronic_products_stores`
--

INSERT INTO `electronic_products_stores` (`card_id`, `electronics_products_id`, `store_branch_id`, `rate`) VALUES
(1, '1', 1, 4),
(2, '1', 3, 5),
(3, '1', 2, 5),
(4, '2', 1, 5),
(5, '2', 3, 5),
(6, '2', 2, 5),
(7, '10', 1, 4),
(8, '10', 3, 5),
(9, '15', 10, 4),
(10, '3', 20, 5),
(11, '5', 9, 5),
(12, '20', 6, 5),
(13, '3', 1, 5),
(14, '19', 19, 5),
(15, '18', 13, 3),
(16, '17', 2, 5),
(17, '16', 2, 5),
(18, '41', 3, 5),
(19, '40', 15, 5),
(20, '39', 11, 4),
(21, '38', 7, 4),
(22, '37', 14, 5),
(23, '36', 16, 5),
(24, '41', 19, 3),
(25, '40', 16, 5),
(26, '6', 20, 5),
(27, '5', 14, 5),
(28, '4', 8, 4),
(29, '22', 16, 4),
(30, '22', 6, 5),
(31, '22', 3, 5),
(32, '23', 20, 5),
(33, '24', 19, 5),
(34, '25', 8, 5),
(35, '26', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

CREATE TABLE `saved` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` char(100) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saved`
--

INSERT INTO `saved` (`id`, `user_id`, `product_id`, `branch_id`, `card_id`) VALUES
(652, 1, '10', 1, 7),
(653, 1, '22', 3, 31),
(654, 1, '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stores_address`
--

CREATE TABLE `stores_address` (
  `branch_id` int(11) NOT NULL,
  `branch_location` enum('القاهره','الجيزه','الاسكندريه','مطروح','سوهاج','الشرقيه','اسوان','الدقهليه') NOT NULL,
  `store_name` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stores_address`
--

INSERT INTO `stores_address` (`branch_id`, `branch_location`, `store_name`) VALUES
(1, 'القاهره', 'btech'),
(2, 'الجيزه', 'btech'),
(3, 'الاسكندريه', 'btech'),
(4, 'مطروح', 'btech'),
(5, 'سوهاج', 'dubai phone'),
(6, 'الدقهليه', 'dubai phone'),
(7, 'الشرقيه', 'btech'),
(8, 'اسوان', 'itrad'),
(9, 'اسوان', 'dubai phone'),
(10, 'القاهره', 'itrad'),
(11, 'سوهاج', 'itrad'),
(12, 'سوهاج', 'btech'),
(13, 'الجيزه', 'dubai phone'),
(14, 'القاهره', 'imedia'),
(15, 'الاسكندريه', 'venus group'),
(16, 'القاهره', 'venus group'),
(17, 'الدقهليه', 'iplus'),
(18, 'اسوان', 'iplus'),
(19, 'الشرقيه', 'iplus'),
(20, 'سوهاج', 'iplus');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `sub_id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`sub_id`, `name`, `categories_id`) VALUES
(1, 'mobiles', 1),
(2, 'laptops', 1),
(3, 'smartwatchs', 1),
(4, 'airpods', 1),
(5, 'men', 2),
(6, 'women', 2),
(7, 'kids', 2);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories_store`
--

CREATE TABLE `subcategories_store` (
  `store_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` char(100) NOT NULL,
  `lastname` char(100) NOT NULL,
  `email` char(250) NOT NULL,
  `password` char(250) NOT NULL,
  `phone` int(15) NOT NULL,
  `gender` enum('male','female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `phone`, `gender`) VALUES
(1, 'mohamed', 'abdelhalim', 'mohamed.halim@buyguide.com', '698d51a19d8a121ce581499d7b701668', 1021601747, 'male'),
(2, 'yossr', 'mohamed', 'yossr.mohamed@buyguide.com', 'bcbe3365e6ac95ea2c0343a2395834dd', 1121831314, 'female'),
(3, 'mariam', 'salah', 'mariam.halim@gmail.com', 'a5737e0f998eb0cf9f0e62b12c7c5ef6', 1025892251, 'female'),
(4, 'mariam', 'mohamed', 'mariam.halim@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1021601747, 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `clothes_products`
--
ALTER TABLE `clothes_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_id` (`subcategories_id`);

--
-- Indexes for table `clothes_products_stores`
--
ALTER TABLE `clothes_products_stores`
  ADD KEY `clothes_product_id` (`clothes_product_id`,`store_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `electronic_products`
--
ALTER TABLE `electronic_products`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `electronic_products_stores`
--
ALTER TABLE `electronic_products_stores`
  ADD PRIMARY KEY (`card_id`),
  ADD KEY `electronics_products_id` (`electronics_products_id`,`store_branch_id`),
  ADD KEY `store_branch_id` (`store_branch_id`);

--
-- Indexes for table `saved`
--
ALTER TABLE `saved`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `card_id` (`card_id`);

--
-- Indexes for table `stores_address`
--
ALTER TABLE `stores_address`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Indexes for table `subcategories_store`
--
ALTER TABLE `subcategories_store`
  ADD KEY `store_id` (`store_id`,`subcategory_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `electronic_products_stores`
--
ALTER TABLE `electronic_products_stores`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `saved`
--
ALTER TABLE `saved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=655;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clothes_products`
--
ALTER TABLE `clothes_products`
  ADD CONSTRAINT `clothes_products_ibfk_1` FOREIGN KEY (`subcategories_id`) REFERENCES `subcategories` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clothes_products_stores`
--
ALTER TABLE `clothes_products_stores`
  ADD CONSTRAINT `clothes_products_stores_ibfk_2` FOREIGN KEY (`clothes_product_id`) REFERENCES `clothes_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clothes_products_stores_ibfk_3` FOREIGN KEY (`store_id`) REFERENCES `stores_address` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `electronic_products`
--
ALTER TABLE `electronic_products`
  ADD CONSTRAINT `electronic_products_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subcategories` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `electronic_products_stores`
--
ALTER TABLE `electronic_products_stores`
  ADD CONSTRAINT `electronic_products_stores_ibfk_1` FOREIGN KEY (`electronics_products_id`) REFERENCES `electronic_products` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `electronic_products_stores_ibfk_2` FOREIGN KEY (`store_branch_id`) REFERENCES `stores_address` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `saved`
--
ALTER TABLE `saved`
  ADD CONSTRAINT `saved_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `saved_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `electronic_products` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `saved_ibfk_3` FOREIGN KEY (`branch_id`) REFERENCES `stores_address` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `saved_ibfk_4` FOREIGN KEY (`card_id`) REFERENCES `electronic_products_stores` (`card_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategories_store`
--
ALTER TABLE `subcategories_store`
  ADD CONSTRAINT `subcategories_store_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subcategories_store_ibfk_3` FOREIGN KEY (`store_id`) REFERENCES `stores_address` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
