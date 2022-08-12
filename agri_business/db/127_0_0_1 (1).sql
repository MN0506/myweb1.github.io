-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2019 at 10:20 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agri_business`
--
CREATE DATABASE IF NOT EXISTS `agri_business` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `agri_business`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(100) NOT NULL,
  `ad_contact` bigint(20) NOT NULL,
  `ad_email_id` varchar(100) NOT NULL,
  `ad_address` text NOT NULL,
  `ad_username` varchar(100) NOT NULL,
  `ad_password` varchar(100) NOT NULL,
  `ad_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`ad_id`, `ad_name`, `ad_contact`, `ad_email_id`, `ad_address`, `ad_username`, `ad_password`, `ad_date`) VALUES
(9, 'Anusha', 9620180079, 'anusha1996@gmail.com', 'Last cross ayyappa nagar sirsi', 'anusha', 'QW51c2hhMTk5Ng==', '2019-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `cd_id` int(11) NOT NULL,
  `cd_name` varchar(100) NOT NULL,
  `cd_contact` bigint(20) NOT NULL,
  `cd_email_id` varchar(100) NOT NULL,
  `cd_address` text NOT NULL,
  `cd_username` varchar(100) NOT NULL,
  `cd_password` varchar(100) NOT NULL,
  `cd_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`cd_id`, `cd_name`, `cd_contact`, `cd_email_id`, `cd_address`, `cd_username`, `cd_password`, `cd_date`) VALUES
(1, 'Vijay S H', 9591104033, 'vijay@gmail.com', 'vidya nagar\r\nHubli', 'Vijay', 'dmlqYXkxOTkz', '2019-05-01'),
(2, 'Sandhya Gouda', 8792342569, 'sandy1994@gmail.com', 'H no.182 3rd cross Amar Nagar\r\nNavnagar Hubli', 'Sandhya', 'U2h3ZTE5OTY=', '2019-05-01'),
(10, 'Geeta Mulimani', 9164678319, 'gee1996@gmail.com', '5th cross Behind mathad bulding\r\nSaptapur bhavi Dharwad', 'Geeta', 'R2VlTTE5OTY=', '2019-05-01'),
(11, 'Kumar', 9019837348, 'kumar@gmail.com', 'Dharwad', 'kumar', 'S3VtYXIxMjM0', '2019-05-01'),
(12, 'ankita', 9739121436, 'ankita@gmail.com', 'last cross ayyappanagar sirsi', 'ankita', 'QW5raXRhMTk5Ng==', '2019-05-01'),
(13, 'amar', 9620180079, 'amar@gmail.com', 'Saptapur dwd', 'amar', 'QW1hcjE5OTY=', '2019-05-03'),
(14, 'vishwa', 7204040613, 'vishurg1996@gmil.com', 'hhubli', 'vishwanath', 'dmlzaHVAMTQz', '2019-06-04'),
(15, 'vishu', 7204040612, 'vishurg1@gmil.com', 'hubli', 'vishu', 'MTIzNDU2', '2019-06-04'),
(16, 'VISHWA', 9620180073, 'anusha@gmail.com', 'DWDGF', 'AMRIT', '', '2019-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `customer_invoice`
--

CREATE TABLE `customer_invoice` (
  `ci_id` int(11) NOT NULL,
  `cd_id` int(11) NOT NULL,
  `ci_order_no` int(11) NOT NULL,
  `ci_shipping_address` text NOT NULL,
  `ci_landmark` text NOT NULL,
  `ci_delivery_charges` float NOT NULL,
  `ci_contact_no` bigint(20) NOT NULL,
  `ci_date` date NOT NULL,
  `ci_payment_mode` text NOT NULL,
  `ci_transaction_no` int(11) NOT NULL,
  `ci_total_price` float NOT NULL,
  `ci_cgst_percent` float NOT NULL,
  `ci_cgst` float NOT NULL,
  `ci_sgst_percent` float NOT NULL,
  `ci_sgst` float NOT NULL,
  `ci_sub_total` float NOT NULL,
  `ci_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_invoice`
--

INSERT INTO `customer_invoice` (`ci_id`, `cd_id`, `ci_order_no`, `ci_shipping_address`, `ci_landmark`, `ci_delivery_charges`, `ci_contact_no`, `ci_date`, `ci_payment_mode`, `ci_transaction_no`, `ci_total_price`, `ci_cgst_percent`, `ci_cgst`, `ci_sgst_percent`, `ci_sgst`, `ci_sub_total`, `ci_status`) VALUES
(1, 11, 899484, 'DWD', 'DWD', 100, 9019837348, '2019-05-01', 'COD', 0, 166, 5, 3, 5, 3, 60, 'ORDER DELIVERED'),
(2, 12, 479232, 'LAST CROSS ROYAL PLAZA', 'DWD', 0, 9620180079, '2019-05-01', 'COD', 0, 922.9, 5, 41.95, 5, 41.95, 839, 'ORDER CONFIRMED'),
(3, 12, 869703, 'DWD', 'DWD', 0, 9620180079, '2019-05-01', 'COD', 0, 2715.9, 5, 123.45, 5, 123.45, 2469, 'ORDER DELIVERED'),
(4, 12, 202113, 'DWD', 'DWD', 0, 9019837348, '2019-05-02', 'COD', 0, 3097.6, 5, 140.8, 5, 140.8, 2816, 'ORDER DELIVERED'),
(5, 12, 997822, 'DWD', 'DWD', 0, 9019837348, '2019-05-03', 'COD', 0, 1483.9, 5, 67.45, 5, 67.45, 1349, 'ORDER DELIVERED'),
(6, 12, 185680, 'DWD', 'DWD', 0, 9019837348, '2019-05-04', 'COD', 0, 1042.8, 5, 47.4, 5, 47.4, 948, 'ORDER DELIVERED'),
(7, 12, 627878, 'lat cross vidya nagar ', 'hubli', 0, 9019837348, '2019-05-28', 'COD', 0, 1598.3, 5, 72.65, 5, 72.65, 1453, 'ORDER DELIVERED');

-- --------------------------------------------------------

--
-- Table structure for table `dealers_details`
--

CREATE TABLE `dealers_details` (
  `dd_id` int(11) NOT NULL,
  `dd_name` varchar(100) NOT NULL,
  `dd_contact` bigint(20) NOT NULL,
  `dd_address` text NOT NULL,
  `dd_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealers_details`
--

INSERT INTO `dealers_details` (`dd_id`, `dd_name`, `dd_contact`, `dd_address`, `dd_date`) VALUES
(6, 'Ajay S Patil', 9921275994, 'Barakotri last cross\r\n pune', '2019-04-29'),
(7, 'Suresh H', 9739121436, 'Last cross ayyappa nagar\r\nsirsi', '2019-04-29'),
(8, 'Aishwarya Patil', 9742131231, '3rd cross Behind Royal Plaza \r\nKeshwapur Hubli', '2019-05-01'),
(9, 'Shashank Bhat Thoti', 9483790045, '5th main last cross\r\nNeharu Nagar Honnavara', '2019-05-01'),
(10, 'Anil Patil', 8105409061, 'Gandhi Nagar\r\nBallari', '2019-05-01'),
(11, 'Ashwin', 8884927169, 'KHB colony 2nd Cross\r\nMysore', '2019-05-01'),
(12, 'B N Uppin', 8310430458, '4th Cross Malmaddi Dharwad', '2019-05-01'),
(13, 'Pooja Hegde', 9164247585, 'Behind Royal \r\nPlaza Kalyan Nagar\r\nDharwad', '2019-05-01'),
(14, 'anju', 7896541232, 'kjjoi', '2019-06-20'),
(15, 'sudha', 9632587412, 'nkjhuyguy', '2019-06-20'),
(16, 'maitili', 9620180096, 'hmsgug', '2019-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `dealers_purchase_details`
--

CREATE TABLE `dealers_purchase_details` (
  `dpd_id` int(11) NOT NULL,
  `dd_id` int(11) NOT NULL,
  `pc_id` int(11) NOT NULL,
  `dpd_name` varchar(100) NOT NULL,
  `dpd_quantity` int(11) NOT NULL,
  `dpd_amount_paid` float NOT NULL,
  `dpd_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealers_purchase_details`
--

INSERT INTO `dealers_purchase_details` (`dpd_id`, `dd_id`, `pc_id`, `dpd_name`, `dpd_quantity`, `dpd_amount_paid`, `dpd_date`) VALUES
(2, 4, 3, 'dfvsv', 22, 58, '2019-04-10'),
(3, 6, 6, 'General Liquid', 96, 5200, '2019-04-29'),
(4, 7, 8, 'Urban Green', 45, 850, '2019-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `extra_charges`
--

CREATE TABLE `extra_charges` (
  `ec_id` int(11) NOT NULL,
  `ec_cgst` float NOT NULL,
  `ec_sgst` float NOT NULL,
  `ec_minimum_amount` float NOT NULL,
  `ec_delivery_charges` float NOT NULL,
  `ec_min_stock_qty` int(11) NOT NULL,
  `ec_max_stock_qty` int(11) NOT NULL,
  `ec_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_charges`
--

INSERT INTO `extra_charges` (`ec_id`, `ec_cgst`, `ec_sgst`, `ec_minimum_amount`, `ec_delivery_charges`, `ec_min_stock_qty`, `ec_max_stock_qty`, `ec_date`) VALUES
(1, 5, 5, 500, 100, 10, 100, '2019-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `product_cart_details`
--

CREATE TABLE `product_cart_details` (
  `pcd_id` int(11) NOT NULL,
  `cd_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `pcd_name` varchar(100) NOT NULL,
  `pcd_quantity` int(11) NOT NULL,
  `pcd_unitprice` float NOT NULL,
  `pcd_total` float NOT NULL,
  `pcd_order_no` int(11) NOT NULL,
  `pcd_order_date` date NOT NULL,
  `pcd_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_cart_details`
--

INSERT INTO `product_cart_details` (`pcd_id`, `cd_id`, `pd_id`, `pcd_name`, `pcd_quantity`, `pcd_unitprice`, `pcd_total`, `pcd_order_no`, `pcd_order_date`, `pcd_status`) VALUES
(1, 11, 14, 'BLOOM BUDDY', 1, 60, 60, 899484, '2019-05-01', 'ORDER DELIVERED'),
(3, 12, 26, 'EARTHMAGIC POTTING SOIL', 1, 866, 599, 479232, '2019-05-01', 'ORDER CONFIRMED'),
(4, 12, 24, 'VERMICOMPOST', 1, 480, 240, 479232, '2019-05-01', 'ORDER CONFIRMED'),
(5, 12, 27, 'TRUST BIN', 1, 2478, 1720, 869703, '2019-05-01', 'ORDER DELIVERED'),
(6, 12, 16, 'TSR Organic Micro Nutrients', 1, 520, 450, 869703, '2019-05-01', 'ORDER DELIVERED'),
(7, 12, 30, 'CHARMINAR EVERYDAY RICE', 1, 420, 299, 869703, '2019-05-01', 'ORDER DELIVERED'),
(9, 12, 32, 'ORGANIC PROSO MILLET', 1, 142, 67, 202113, '2019-05-01', 'ORDER PLACED'),
(10, 12, 27, 'TRUST BIN', 1, 2478, 1720, 202113, '2019-05-01', 'ORDER PLACED'),
(11, 12, 21, 'KISAN KRAFT', 1, 274, 274, 202113, '2019-05-02', 'ORDER DELIVERED'),
(12, 12, 18, 'BIO FUNGI', 1, 548, 465, 202113, '2019-05-02', 'ORDER DELIVERED'),
(13, 12, 47, 'GREEN VERTICILL BIO PESTICIDE', 1, 290, 290, 202113, '2019-05-02', 'ORDER DELIVERED'),
(15, 12, 26, 'EARTHMAGIC POTTING SOIL', 1, 866, 599, 997822, '2019-05-03', 'ORDER DELIVERED'),
(16, 12, 52, 'SPINACH SEEDS', 1, 100, 100, 997822, '2019-05-03', 'ORDER DELIVERED'),
(17, 12, 48, 'GREEN BIOPHYT LIQUID BIO PESTICIDE', 1, 650, 650, 997822, '2019-05-03', 'ORDER DELIVERED'),
(18, 12, 34, 'OJAL ORGANIC JAWAR', 1, 799, 649, 185680, '2019-05-04', 'ORDER DELIVERED'),
(19, 12, 30, 'CHARMINAR EVERYDAY RICE', 1, 420, 299, 185680, '2019-05-04', 'ORDER DELIVERED'),
(20, 12, 26, 'EARTHMAGIC POTTING SOIL', 1, 866, 599, 627878, '2019-05-28', 'ORDER DELIVERED'),
(21, 12, 24, 'VERMICOMPOST', 1, 480, 240, 627878, '2019-05-28', 'ORDER DELIVERED'),
(22, 12, 53, 'RAW SUNFLOWER SEEDS', 1, 175, 149, 627878, '2019-05-28', 'ORDER DELIVERED'),
(23, 12, 18, 'BIO FUNGI', 1, 548, 465, 627878, '2019-05-28', 'ORDER DELIVERED');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `pc_id` int(11) NOT NULL,
  `pc_name` varchar(100) NOT NULL,
  `pc_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`pc_id`, `pc_name`, `pc_date`) VALUES
(6, 'Micro Nutrients', '2019-04-29'),
(7, 'Fertilizers', '2019-04-29'),
(8, 'Pesticides', '2019-04-29'),
(9, 'Cereal crops', '2019-04-29'),
(10, 'Seeds', '2019-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `pd_id` int(11) NOT NULL,
  `pc_id` int(11) NOT NULL,
  `dd_id` int(11) NOT NULL,
  `pd_name` varchar(100) NOT NULL,
  `pd_image1` varchar(100) NOT NULL,
  `pd_image2` varchar(100) NOT NULL,
  `pd_description` text NOT NULL,
  `pd_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`pd_id`, `pc_id`, `dd_id`, `pd_name`, `pd_image1`, `pd_image2`, `pd_description`, `pd_date`) VALUES
(14, 6, 6, 'BLOOM BUDDY', 'IMG_738311022.jpg', 'IMG_1526975833.jpg', '<ul><li>100% Organic and Control Union Certified</li><li>Enhances plant growth and protects from pests and diseases</li><li>Improves flowering and maximises fruit formation</li><li>Provides essential micro, macro and trace nutrients</li><li>Slowly releases nutrients for almost a month keeping the soil nourished</li></ul>', '2019-05-01'),
(15, 6, 7, 'LEADER', 'IMG_1843782436.jpg', 'IMG_1416260718.jpg', '<ul><li>âž¤&bull;&bull; Improve soil structure and increases production efficiency. It helps in increasing growth of the&nbsp; plant and increases yield and quality.</li><li>&nbsp;âž¤&bull;&bull; Protects the beneficial bacteria and elements from the damage caused by ultraviolet rays.</li><li>&nbsp;âž¤&bull;&bull; The weight and shape of the fruits increases which gives Exportable quality crop and the crop remains constant even after storage.</li><li>&nbsp;âž¤&bull;&bull; Useful in organic farming.</li></ul>', '2019-05-01'),
(16, 6, 8, 'TSR Organic Micro Nutrients', 'IMG_173013788.jpg', 'IMG_518236470.jpg', '<ul><li>Primary (macro) nutrients are nitrogen, phosphorus, and potassium. They are the most frequently required in a crop fertilization program. Also, they are need in the greatest total quantity by plants as fertilizer. NITROGEN</li><li>n addition to the 13 nutrients listed above, plants require carbon, hydrogen, and oxygen, which are extracted from air and water to make up the bulk of plant weight.</li><li>Micro nutrients like Calcium, Sulphur, Zinc, Copper, Iron, Boron, Molybdenum, Manganese, chlorine</li></ul>', '2019-05-01'),
(17, 6, 9, 'BIOVANT', 'IMG_762572216.jpg', 'IMG_815273536.jpg', '<ul><li>Mix of all Zn, Fe, Mn, Cu, Mo, B</li><li>Plants and garden soil application</li><li>Micronutrient fetilizer for plants and garden soil application</li></ul>', '2019-05-01'),
(18, 8, 7, 'BIO FUNGI', 'IMG_459645134.jpg', 'IMG_1279531422.jpg', '<ul><li>Pai Organics Plant Protector offers gardeners an organic alternative to pest control and disease control of plant</li><li>Protects Flowers, Fruits, Vegetables, Ornamental plants and Shrubs</li><li>Safe for honey bee &amp; butterflies</li><li>No residual effect and does not penetrate the plant tissues</li><li>It kills a variety of leaf feeding caterpillars and worms including corn earworm, bollworm</li></ul>', '2019-05-01'),
(19, 8, 11, 'ACCON', 'IMG_1490777333.jpg', 'IMG_950444553.jpg', '<ul><li>Npop Approved For Use In Organic Production By Imo Control</li><li>Organic Plant Insecticide</li><li>Safe Plant Protection</li><li>Cropex Accon</li></ul>', '2019-05-01'),
(20, 8, 7, 'SURYA NEEM', 'IMG_2135738727.jpg', 'IMG_905387209.jpg', '<ul><li>Neem mainly affects chewing and sucking insects. Neem is effective in controlling black spot, powdery mildew,anthracnose and rust fungi</li><li>It is also effective against mealy bug, beet armyworm, aphids, cabbage worm, thrips, whiteflies, mites,fungus gnats, beetle</li></ul>', '2019-05-01'),
(21, 8, 11, 'KISAN KRAFT', 'IMG_2145029577.jpg', 'IMG_1165475802.jpg', '<ul><li>Used for spraying pesticides</li><li>Package Contents: 1 Sprayer</li><li>Warranty: 6 months on manufacturing defects only</li></ul>', '2019-05-01'),
(22, 7, 9, 'GROWTH PLUS', 'IMG_99118925.jpg', 'IMG_2041028145.jpg', '<ul><li>rovides nutrients for flowers, vegetables, trees, shrubs and houseplants.Advantages of liquid fertilizer are its more rapid effect and easier coverage</li><li>Because of its liquid form, intake of the nutrients by plants or trees is expedited. It can be used for home or fields. Unique in market with more ORGANIC CARBON thereby improving photosynthesis &amp; Soil Organic Carbon (SOC).</li></ul>', '2019-05-01'),
(23, 8, 12, 'AGRO PLUS', 'IMG_2130368051.jpg', 'IMG_1842494478.jpg', '<ul><li>Material: Plastic</li><li>Color: White</li><li>Volume: 100 ml</li><li>No.of Pieces: 1</li></ul>', '2019-05-01'),
(24, 7, 11, 'VERMICOMPOST', 'IMG_1951824175.jpg', 'IMG_791822460.jpg', '<ul><li>OrganicWays brings you the highest quality, odour free, premium Vermicompost. It offers an effective combination of natural properties of cow dung manure and vermi-composting. Feed your plants organically rich and balanced diet, which releases essential nutrients like Nitrogen, Phosphorus and Potassium ( NPK ) slowly and as plants require.</li><li>This product is made from cow dung manure, using Red Wigglers earth worms, which are considered best in vermicomposting process, making it the highest quality natural fertilizer. This product is ideal for your plants in lawns, yards, home gardens, bins, containers, pots, indoor plants and farm beds. It makes an ideal composition of potting mix too.</li></ul>', '2019-05-01'),
(25, 7, 6, 'VERMI COMPOST', 'IMG_87616365.jpg', 'IMG_1038125118.jpg', '<ul><li>Attracts Deep-Burrowing Earthworms Already Present In The Soil</li><li>Improves Soil Aeration</li><li>Enriches soil with micro-organisms (adding enzymes such as phosphatase and cellulose)</li></ul>', '2019-05-01'),
(26, 7, 10, 'EARTHMAGIC POTTING SOIL', 'IMG_1539857494.jpg', 'IMG_1571312400.jpg', '<ul><li>Contains microbes which enhance the soil properties</li><li>Completely organic and does not contain any harmful chemicals</li><li>Contains micro and macro nutrients, has good water holding capacity</li><li>Its antifungal property helps the plants to grow healthy</li></ul>', '2019-05-01'),
(27, 7, 12, 'TRUST BIN', 'IMG_270603542.jpg', 'IMG_2116248302.jpg', '<ul><li>Includes compost bin, bokashi compost maker, detailed instruction manual</li><li>No foul smell</li><li>Convert waste to compost in 4 to 6 weeks.</li><li>Worried on food waste? Use our composter to feed your plants</li></ul>', '2019-05-01'),
(28, 6, 7, 'NUTES', 'IMG_948802976.jpg', 'IMG_196197899.jpg', '<ul><li>Consist of 2 bottles (100 ml each) of CG Nutes</li><li>Balanced blend of 7 essential Micro-nutrients</li><li>Boost immunity and promotes overall health of plants</li><li>pH balanced to provide optimal pH for your plant roots</li><li>Ideal for soil based and hydroponic set-up</li></ul>', '2019-05-01'),
(29, 6, 8, 'TSR HOMEO ORGANIC MICRO NUTRIENT', 'IMG_1069118175.jpg', 'IMG_2086675905.jpg', '<ul><li>Primary (macro) nutrients are nitrogen, phosphorus, and potassium. They are the most frequently required in a crop fertilization program. Also, they are need in the greatest total quantity by plants as fertilizer. NITROGEN</li><li>The secondary nutrients are calcium, magnesium, and sulphur. For most crops, these three are needed in lesser amounts that the primary nutrients. They are growing in importance in crop fertilization programs due to more stringent clean air standards and efforts to improve the environment.</li></ul>', '2019-05-01'),
(30, 9, 10, 'CHARMINAR EVERYDAY RICE', 'IMG_1957901312.jpg', 'IMG_1424084053.jpg', '<ul><li>Value for money rice</li><li>Everyday use rice</li><li>Non-sticky</li><li>Delightful taste</li><li>Ideal for everyday dishes like steam rice, jeera rice, pulao, khichdi and kheer</li></ul>', '2019-05-01'),
(31, 9, 13, 'ARYA ORGANIC WHEAT', 'IMG_964605582.jpg', 'IMG_604589513.jpg', '<ul><li>It is an excellent source of fiber and has the highest amount of fiber among the whole grains. It is a good source of manganese, copper,magnesium and pantothenic acid</li><li>Health benefits are numerous when fiber content is high, like aiding in digestion, burning of body fat, regulating sugar levels in blood</li></ul>', '2019-05-01'),
(32, 9, 9, 'ORGANIC PROSO MILLET', 'IMG_720128941.jpg', 'IMG_153438754.jpg', '<ul><li>Pure &amp; Sure Organic Proso Millet</li></ul>', '2019-05-01'),
(33, 9, 6, 'BB ORGANICS MAIZE', 'IMG_1969221868.jpg', 'IMG_563579990.jpg', '<ul><li>It is not suitable to prepare pop corn</li><li>It has many benefits during pregnancy for both mother and the baby</li><li>It contains complex carbohydrate which gets digested at a slower pace</li><li>Lowers Blood Sugar &amp; Cholesterol Level</li></ul>', '2019-05-01'),
(34, 9, 10, 'OJAL ORGANIC JAWAR', 'IMG_1400178564.jpg', 'IMG_1292797413.jpg', '<ul><li>100% Gluten Free Organic Jawar.Rich in Nutrition, Vitamins, Fibers &amp; Minerals</li><li>High Quality Whole Grains with natual taste and colour.</li><li>Great Source of Natural Proteins</li><li>Ojal Organic promises 100% certified organic food products which does not contain any harmful chemicals, fertilizers and pesticides.</li></ul>', '2019-05-01'),
(35, 9, 12, 'MOTHER ORGANIC BARLEY', 'IMG_298825371.jpg', 'IMG_440061588.jpg', '<ul><li>Pure organic, your body reflects what you eat no pesticides, no chemicals, no fertilizers</li></ul>', '2019-05-01'),
(36, 9, 7, 'PRO NATURE RYE', 'IMG_1727594279.jpg', 'IMG_385999663.jpg', '<ul><li>Authentic aroma, colour and texture</li><li>Helps reduce&nbsp;constipation</li><li>No gmo used in production</li></ul>', '2019-05-01'),
(37, 10, 9, 'US COTTON', 'IMG_1681943423.jpg', 'IMG_1180020304.jpg', '<ul><li>Medium maturity hybrid</li><li>Good tolerance for cotton leaf curl virus</li><li>Big Boll Size</li><li>Tolerance to sucking pests</li><li>High Yield</li></ul>', '2019-05-01'),
(38, 10, 12, 'SWASTIK WATERMELON SEEDS', 'IMG_1799839738.jpg', 'IMG_1559364179.jpg', '<ul><li>Vacuum pack</li><li>No ingredients, pure char magaz</li><li>Tarbooj magaz | magaz |tarbooj beej | char magaz |</li><li>Watermelon seeds are also a valuable source of macro-nutrients like vitamin b, protein and the healthy fats</li><li>It is rich in vitamins, minerals and essential fatty acids</li></ul>', '2019-05-01'),
(39, 7, 12, 'M PLANT FOOD ORGANIC MANURE', 'IMG_1585648407.jpg', 'IMG_1805172462.jpg', '<ul><li>Fully decomposed organic manure and enriched with millions of beneficial nitrogen fixing bacteria, phosphorus solubilizing micro organisms and decomposing organisms</li><li>Fortified with neem, castor and pongamia cakes and rich in humus and free from weed seeds</li><li>Non toxic and ecologically compatible</li><li>M-Plant Food helps in improving soil structures i.e. the physical condition of the soil and also improves fertility of the soil</li><li>There is better root proliferation and it acts as a strong repellent to insects and reduces larvicidal activity, nematode population and mycoplasmas (MLO&rsquo;s)</li><li>It checks activity of root grubs and soil other soil insects</li><li>It does not leave harmful residue and does not cause problem of pollution.</li></ul>', '2019-05-01'),
(40, 7, 9, 'POWER FULL GROWTH BOOSTER', 'IMG_1287784231.jpg', 'IMG_2090432801.jpg', '<ul><li>Slow release formula. Results seen in 10-15 days. Made in USA.</li><li>Apply 5 grams around each plant &amp; irrigate in 24 hours.</li><li>To be applied once in 3 months.</li><li>Suitable for all home garden, potted plants, lawn, turf and flowering plants like rose etc.</li><li>Rich fertilizer mixed with Nitrogen(N) Phosphate(P) Potassium(K) &amp; micro nutrients.</li></ul>', '2019-05-01'),
(41, 7, 13, 'PASUTHAI ORGANIC FERTILIZER', 'IMG_1943444376.jpg', 'IMG_1164841444.jpg', '<ul><li>All purpose Liquid Fertilizer, pesticide and insecticide. Intensified with organic Desi cow&#39;s Milk, Ghee, Curd, Urine, dung, organic jaggery, Banana, and Tender Coconut.</li><li>Application: All agricultural plants, vegetables plants, spinach, Home garden, Roof top garden, pot plants, flowering plants etc.</li><li>Preventive Application: Prevents Pest infestations and microbial infections, improved resistance to diseases, drastic climate change and water availability.</li></ul>', '2019-05-01'),
(42, 7, 12, 'HOMEMADE ORGANIC FERTILIZER', 'IMG_600344054.jpg', 'IMG_1007422332.jpg', '<ul><li>Organic Ways brings you the highest quality, odour free, premium Vermicompost. It offers an effective combination of natural properties of cow dung manure and vermicomposting. Feed your plants organically rich and balanced diet, which releases essential nutrients like Nitrogen, Phosphorus and Potassium ( NPK ) slowly and as plants require.</li><li>This Product Is Made From Cow Dung manure, Using Red Wigglers Earth Worms, Which Are Considered Best In Vermicomposting Process, Making It The Highest Quality Natural Fertilizer. This Product Is Ideal For Your Plants In Lawns, Yards, Home Gardens, Bins, Containers, Pots, Indoor Plants And Farm Beds. It Makes An Ideal Composition Of Potting Mix Too.</li><li>Organic Ways Homemade Vermicompost Fertilizer Is Chemical Free. Also There Are No Pesticides. Let Your Children And Pets Play Around Plants And In Lawn Grass After Applying This. It Is Completely Safe For Them. Natural Compositions Of The Fertilizer Will Take Care Of Overall Health Of Your Plants Like Vegetables Such As Tomato, Potato, Flowers Such As Rose, Marigold, Fruits Like Strawberry, Grass And Herbs.</li></ul>', '2019-05-01'),
(43, 7, 8, 'TURTYE COWDANG MANURE', 'IMG_1622540849.jpg', 'IMG_1917772810.jpg', '<ul><li>Turtye Cow Dung Manure is 100% Organic, Pure and Nature.</li><li>Turtye Cow Dung Manure is a nutrient-rich fertilizer because of its satisfactory level of nutrients and fertile efficiency.</li><li>Turtye Cow Dung Manure contains nutrients required for your plant growth.</li><li>Pack contains 15 Kg&#39;s of Turtye Cow Dung Manure for Garden Plants</li></ul>', '2019-05-01'),
(44, 8, 8, 'MAHAGRO ORGANIC AND NATURAL ORGANIC PESTICIDES', 'IMG_2015481027.jpg', 'IMG_504885622.jpg', '<ul><li>Unique concentration to control insects, white flies and white infestation</li><li>For use on vegetables, fruit trees, ornamentals, shrubs, flowers &amp; gardens</li><li>For use indoors, outdoors and in greenhouses. Kills pests on contact</li><li>100% Organic and safe bio pest contorl. Easy to use formula.</li><li>Does not kill beneficial insects and can be used up until the day of harvest</li></ul>', '2019-05-01'),
(45, 8, 6, 'GREEN BEAUVERIA BIO PESTICIDE', 'IMG_1447124047.jpg', 'IMG_1397124331.jpg', '<ul><li>Green Beauveria is a biopesticide containing the white muscardine fungus. Green Beauveria is widely used for control of crop such as pests thirips, White flies, aphids, Caterpillars, Weevils, Grass hoppers, Ants, Colorado Potato beetle etc</li><li>Penetrates the cuticle and colonizes inside the target pest. Compatible with several chemical insecticides.</li><li>Flied Crops- Cotton, Paddy, Sorghum, Sunflower, Groundnut, Potato etc. Fruit Crops- Grapes, Guava,Sapota, Citrus, Mango, Pomegranate, Custard Apple</li><li>Vegetable crops- Tomato, Chilly, Brinjal, Lady&#39;s Finger etc.</li><li>Dosage: Foliar Spray - Green Beaveria 50-100ml/10 litre of water or 1-1.5 litre in 200-300 litres of water per acre.</li></ul>', '2019-05-01'),
(46, 8, 11, 'GREEN META LIQUID BIO PESTICIDES', 'IMG_1498091615.jpg', 'IMG_31762051.jpg', '<ul><li>It is widely used for control of insects such as pests root weevils, plant hopers, japanese beetle, black vine weevil, spittlebug, termites and white grubs etc</li><li>Penetrates the cuticle and colonizes inside the target pest. Compatible with several chemical insecticides</li><li>Fruit crops: Grapes, guava, sapota, citrus, mango, pomegranate, custard apple, coconut</li><li>Field crops: Cotton, paddy, sorghum, sunflower, groundnut, potato, mustard, cumin</li><li>Vegetable crops: Tomato, chilly, brinjal, onion, lady&#39;s finger. Plantatin crops: cardamom, tea, coffee, floriculture</li></ul>', '2019-05-01'),
(47, 8, 7, 'GREEN VERTICILL BIO PESTICIDE', 'IMG_1324139620.jpg', 'IMG_858616364.jpg', '<ul><li>Green Verticill is known as &quot;white-halo&quot; fungus because of the white mycelial growth on the edges of infected scale insects.</li><li>The white halo fungus is found effective against several species of sucking insects especially aphids, thrips, soft bodied scale insects white flies, mealy bugs and mites.</li><li>It can be combined with various insecticides to obtain effective control.It kills the insects quickly and afterwards white fungal matter colonises the cadaver and fresh spores are produced.</li><li>Mix 5 ml of verticill in one litre of water (0.5%) and spray over both sides of the foliage preferably during evening hours. If necessary, repeat the spray after 10-15 days</li><li>Fruit Crops: Grapes, Guava, Sapota, Citrus, Mango, Pomegranate, Custard Apple, Coconut etc. Field crops: Cotton, Paddy, Sorghum, Sunflower, Groundnut, Potato, Mustard, Cumin etc. Vegetable crops: Tomato, Chilly, Brinjal, Onion, Lady&#39;s Finger etc. Plantation Crops: Cardamom, Tea, coffee, Floriculture.</li></ul>', '2019-05-01'),
(48, 8, 6, 'GREEN BIOPHYT LIQUID BIO PESTICIDE', 'IMG_616908436.jpg', 'IMG_1264303633.jpg', '<ul><li>Green Bio Phyt is an organic, plant pathogen destructor based on organic acids of potassium.</li><li>It is highly effective against phytophthora infection in pepper, cardamom, Arecanut, Ginger, Turmeric, Fruit rot of vegetable, Drowny Mildew of Gourds and late Blight of potato, etc</li><li>This is systemic in action, highly bio degradable and doesn&#39;t allow any residue on the sprayed crop. Targeted plant pathogens do not develop resistance. Generally, two sprays are recommended and it is effective for 60-90 days. Avoid spraying during rains or in hot sun.</li><li>For Foliar Spray use 4-5 ml/litre of water, For soil drenching apply 5ml/litre</li><li>Compatible with all bio fertilizers, biocontrol agents, Fungicides and Insecticides</li></ul>', '2019-05-01'),
(49, 9, 7, 'PRO NATURE ORGANIC RAZMA', 'IMG_2090014292.jpg', 'IMG_2074407463.jpg', '<ul><li>Superior quality grains</li><li>Consistency in grain size</li></ul>', '2019-05-01'),
(50, 9, 11, 'FLAX SEED', 'IMG_1336413321.jpg', 'IMG_136675004.jpg', '<ul><li>Sortex Cleaned and Superior Quality</li><li>Consistency in taste, aroma and quality across the year</li><li>Hygienic packing and best quality control processes</li><li>Packed in transparent covers to display product quality</li></ul>', '2019-05-01'),
(51, 10, 12, 'KRAFT TOMATO SEEDS', 'IMG_554655112.jpg', 'IMG_1539049526.jpg', '<ul><li>Sowing Time : Jun To Nov</li><li>100 Each Packet</li><li>70-80% Germination</li><li>Tested and superb quality by Kraft Seeds</li><li>All pictures shown are for illustration purpose only actual product may vary due to product enhancement.</li></ul>', '2019-05-01'),
(52, 10, 13, 'SPINACH SEEDS', 'IMG_1776830595.jpg', 'IMG_1802404334.jpg', '<ul><li>Sowing Time: Jun to Nov</li><li>200 each packet</li><li>70-80% germination</li><li>Tested and superb quality by Kraft Seeds</li><li>All pictures shown are for illustration purpose only actual product may vary due to product enhancement</li></ul>', '2019-05-01'),
(53, 10, 13, 'RAW SUNFLOWER SEEDS', 'IMG_2095565141.jpg', 'IMG_493819167.jpg', '<p>&nbsp;</p><ul><li>They&#39;re rich source of antioxidants</li><li>It contains magnesium and selenium which are rich sources of anti oxidants</li></ul>', '2019-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `stock_details`
--

CREATE TABLE `stock_details` (
  `sd_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `sd_quantity` varchar(11) NOT NULL,
  `sd_unitprice` float NOT NULL,
  `sd_discount` float NOT NULL,
  `sd_date` date NOT NULL,
  `sd_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_details`
--

INSERT INTO `stock_details` (`sd_id`, `pd_id`, `sd_quantity`, `sd_unitprice`, `sd_discount`, `sd_date`, `sd_status`) VALUES
(6, 38, '25', 450, 25, '2019-05-01', 'IN STOCK'),
(7, 37, '10', 730, 10, '2019-05-01', 'IN STOCK'),
(8, 36, '100', 28, 0, '2019-05-01', 'IN STOCK'),
(9, 35, '50', 165, 20, '2019-05-01', 'IN STOCK'),
(10, 34, '89', 799, 150, '2019-05-01', 'IN STOCK'),
(11, 33, '50', 250, 98, '2019-05-01', 'IN STOCK'),
(12, 32, '60', 142, 75, '2019-05-01', 'IN STOCK'),
(13, 31, '40', 120, 0, '2019-05-01', 'IN STOCK'),
(14, 30, '68', 420, 121, '2019-05-01', 'IN STOCK'),
(15, 16, '47', 520, 70, '2019-05-01', 'IN STOCK'),
(16, 28, '45', 600, 99, '2019-05-01', 'IN STOCK'),
(17, 27, '49', 2478, 758, '2019-05-01', 'IN STOCK'),
(18, 26, '57', 866, 267, '2019-05-01', 'IN STOCK'),
(19, 24, '23', 480, 240, '2019-05-01', 'IN STOCK'),
(20, 25, '56', 999, 709, '2019-05-01', 'IN STOCK'),
(21, 23, '20', 115, 16, '2019-05-01', 'IN STOCK'),
(22, 22, '30', 430, 60, '2019-05-01', 'IN STOCK'),
(23, 21, '24', 274, 0, '2019-05-01', 'IN STOCK'),
(24, 20, '50', 500, 25, '2019-05-01', 'IN STOCK'),
(25, 19, '30', 300, 0, '2019-05-01', 'IN STOCK'),
(26, 18, '83', 548, 83, '2019-05-01', 'IN STOCK'),
(27, 17, '20', 799, 500, '2019-05-01', 'IN STOCK'),
(28, 14, '80', 410, 0, '2019-05-01', 'IN STOCK'),
(29, 53, '89', 175, 26, '2019-05-01', 'IN STOCK'),
(30, 52, '59', 100, 0, '2019-05-01', 'IN STOCK'),
(31, 51, '54', 120, 6, '2019-05-01', 'IN STOCK'),
(32, 50, '65', 400, 100, '2019-05-01', 'IN STOCK'),
(33, 49, '30', 112, 20, '2019-05-01', 'IN STOCK'),
(34, 48, '19', 650, 0, '2019-05-01', 'IN STOCK'),
(35, 47, '22', 290, 0, '2019-05-01', 'IN STOCK'),
(36, 46, '30', 480, 0, '2019-05-01', 'IN STOCK'),
(37, 45, '45', 180, 0, '2019-05-01', 'IN STOCK'),
(38, 44, '85', 699, 300, '2019-05-01', 'IN STOCK'),
(39, 43, '56', 1429, 0, '2019-05-01', 'IN STOCK'),
(40, 42, '50', 150, 65, '2019-05-01', 'IN STOCK'),
(41, 41, '65', 296, 0, '2019-05-01', 'IN STOCK'),
(42, 40, '20', 850, 535, '2019-05-01', 'IN STOCK'),
(43, 39, '30', 200, 0, '2019-05-01', 'IN STOCK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`cd_id`);

--
-- Indexes for table `customer_invoice`
--
ALTER TABLE `customer_invoice`
  ADD PRIMARY KEY (`ci_id`);

--
-- Indexes for table `dealers_details`
--
ALTER TABLE `dealers_details`
  ADD PRIMARY KEY (`dd_id`);

--
-- Indexes for table `dealers_purchase_details`
--
ALTER TABLE `dealers_purchase_details`
  ADD PRIMARY KEY (`dpd_id`);

--
-- Indexes for table `extra_charges`
--
ALTER TABLE `extra_charges`
  ADD PRIMARY KEY (`ec_id`);

--
-- Indexes for table `product_cart_details`
--
ALTER TABLE `product_cart_details`
  ADD PRIMARY KEY (`pcd_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `stock_details`
--
ALTER TABLE `stock_details`
  ADD PRIMARY KEY (`sd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `cd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer_invoice`
--
ALTER TABLE `customer_invoice`
  MODIFY `ci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dealers_details`
--
ALTER TABLE `dealers_details`
  MODIFY `dd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `dealers_purchase_details`
--
ALTER TABLE `dealers_purchase_details`
  MODIFY `dpd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `extra_charges`
--
ALTER TABLE `extra_charges`
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_cart_details`
--
ALTER TABLE `product_cart_details`
  MODIFY `pcd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `stock_details`
--
ALTER TABLE `stock_details`
  MODIFY `sd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('', '2019-04-05 07:11:53', '{\"Console\\/Mode\":\"collapse\"}'),
('root', '2019-06-22 08:16:38', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
