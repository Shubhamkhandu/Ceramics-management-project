SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'ARK'),
(2, 'Jaquar'),
(3, 'AGL'),
(4, 'Hindware'),
(5, 'Kohler'),
(6, 'Kajaria'),
(7, 'Nitco'),
(8, 'Safari'),
(9, 'Sintex'),
(10, 'SWR');

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `parent_cat` int(100) NOT NULL,
  `cat_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `categories` (`cat_id`, `parent_cat`, `cat_title`) VALUES
(1, 0, 'Tiles'),
(2, 1,'Floor Tiles'),
(3, 1,'Paving tiles'),
(4, 1,'Polished Vitrified tiles'),
(5, 1,'Roofing Tiles'),
(6, 1,'Wall Tiles'),
(7, 0,'Basins'),
(8, 7,'Colored Ceramic'),
(9, 7,'Marble Basin'),
(10, 7,'Resin Washbasin'),
(11, 7,'Wall Mounted Basin'),
(12, 7,'Table Mounted'),
(13, 0,'Pipes and fiting'),
(14, 0,'Tanks'),
(15, 0,'Shower & Faucets'),
(16, 15,'Digital Showers'),
(17, 15,'Electric Shower'),
(18, 15,'Mixer shower'),
(19, 15,'Power Shower'),
(20, 15,'Pillar Taps'),
(21, 15,'Mixer Taps');

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES
(1, 2, 7, 1, '07M47684BS5725041', 'Completed'),
(2, 2, 2, 1, '07M47684BS5725041', 'Completed');

-- --------------------------------------------------------
CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `sub_total` double NOT NULL,
  `gst` double NOT NULL,
  `discount` double NOT NULL,
  `net_total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `customer_name`, `order_date`, `sub_total`, `gst`, `discount`, `net_total`, `paid`, `due`, `payment_type`) VALUES
(30, 'I am Cus', '2018-11-02', 65000, 11700, 500, 76200, 76200, 0, 'Cash'),
(31, '', '2018-01-03', 60000, 10800, 0, 70800, 70800, 0, 'Cash'),
(32, 'Arjun', '2018-01-03', 29000, 5220, 55, 34165, 34165, 0, 'Cash'),
(33, '', '2018-01-03', 60000, 10800, 0, 70800, 70800, 0, 'Cash'),
(34, 'Rizwan', '2018-01-03', 94500, 17010, 1500, 110010, 110010, 0, 'Cash'),
(35, 'Rizwan', '2018-01-03', 154000, 27720, 550, 181170, 181170, 0, 'Cash'),
(36, 'Rizwan', '2018-01-03', 154500, 27810, 2500, 179810, 179810, 0, 'Cash'),
(37, 'Tyson', '2018-01-03', 90000, 16200, 25.5, 106174.5, 106174.5, 0, 'Cash'),
(38, 'Rajdhani', '2018-01-03', 89500, 16110, 750.5, 104859.5, 104859.5, 0, 'Cash'),
(39, 'Kapoor & Son', '2018-01-03', 89500, 16110, 25, 105585, 105585, 0, 'Cash'),
(40, 'Ajay', '2018-01-03', 89000, 16020, 0, 105020, 105020, 0, 'Cash'),
(41, 'Jayanta', '2018-01-03', 89000, 16020, 0, 105020, 105020, 0, 'Cash'),
(42, 'Ajay Kant', '2018-01-03', 65500, 11790, 0, 77290, 77290, 0, 'Cash'),
(43, 'Egjdks', '2018-01-03', 125500, 22590, 5000, 143090, 143090, 0, 'Cash'),
(44, 'Tyson', '2018-01-03', 275000, 49500, 4950, 319550, 319550, 0, 'Cash'),
(45, 'Hndksks', '2018-01-03', 59000, 10620, 0, 69620, 69620, 0, 'Cash');


CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_no`, `product_name`, `price`, `qty`) VALUES
(4, 30, 'Iphone 8', 65000, 1),
(5, 31, 'Samsung Galaxy S8', 60000, 1),
(6, 32, 'Honor 9i', 29000, 1),
(7, 33, 'Samsung Galaxy S8', 60000, 1),
(8, 34, 'Avira Antivirus', 500, 1),
(9, 34, 'Iphone 8', 65000, 1),
(10, 34, 'Honor 9i', 29000, 1),
(11, 35, 'Samsung Galaxy S8', 60000, 1),
(12, 35, 'Honor 9i', 29000, 1),
(13, 35, 'Iphone 8', 65000, 1),
(14, 36, 'Samsung Galaxy S8', 60000, 1),
(15, 36, 'Honor 9i', 29000, 1),
(16, 36, 'Iphone 8', 65000, 1),
(17, 36, 'Avira Antivirus', 500, 1),
(18, 37, 'Samsung Galaxy S8', 60000, 1),
(19, 37, 'Honor 9i', 29000, 1),
(20, 37, 'Avira Antivirus', 500, 2),
(21, 38, 'Samsung Galaxy S8', 60000, 1),
(22, 38, 'Honor 9i', 29000, 1),
(23, 38, 'Avira Antivirus', 500, 1),
(24, 39, 'Samsung Galaxy S8', 60000, 1),
(25, 39, 'Honor 9i', 29000, 1),
(26, 39, 'Avira Antivirus', 500, 1),
(27, 40, 'Samsung Galaxy S8', 60000, 1),
(28, 40, 'Honor 9i', 29000, 1),
(29, 41, 'Samsung Galaxy S8', 60000, 1),
(30, 41, 'Honor 9i', 29000, 1),
(31, 42, 'Iphone 8', 65000, 1),
(32, 42, 'Avira Antivirus', 500, 1),
(33, 43, 'Samsung Galaxy S8', 60000, 1),
(34, 43, 'Avira Antivirus', 500, 1),
(35, 43, 'Iphone 8', 65000, 1),
(36, 44, 'Honor 9i', 29000, 5),
(37, 44, 'Iphone 8', 65000, 2),
(38, 45, 'Honor 9i', 29000, 2),
(39, 45, 'Avira Antivirus', 500, 2);

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_stock` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `product_keywords` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_stock`, `added_date`, `product_keywords`) VALUES
(1, 1, 2, 'Samsung Dous 2', 5000, 'Samsung Dous 2 sgh ', 'samsung mobile.jpg', 984, '2018-01-31', 'samsung mobile electronics'),
(2, 1, 3, 'iPhone 5s', 25000, 'iphone 5s', 'iphone mobile.jpg', 984, '2018-01-31', 'mobile iphone apple'),
(3, 1, 3, 'iPad', 30000, 'ipad apple brand', 'ipad.jpg', 984, '2018-01-31', 'apple ipad tablet'),
(4, 1, 3, 'iPhone 6s', 32000, 'Apple iPhone ', 'iphone.jpg', 984, '2018-01-31', 'iphone apple mobile'),
(5, 1, 2, 'iPad 2', 10000, 'samsung ipad', 'ipad 2.jpg', 984, '2018-01-31', 'ipad tablet samsung'),
(6, 1, 1, 'Hp Laptop r series', 35000, 'Hp Red and Black combination Laptop', 'k2-_ed8b8f8d-e696-4a96-8ce9-d78246f10ed1.v1.jpg-bc204bdaebb10e709a997a8bb4518156dfa6e3ed-optim-450x450.jpg', 984, '2018-01-31', 'hp laptop '),
(7, 1, 1, 'Laptop Pavillion', 50000, 'Laptop Hp Pavillion', '12039452_525963140912391_6353341236808813360_n.png', 984, '2018-01-31', 'Laptop Hp Pavillion'),
(8, 1, 4, 'Sony', 40000, 'Sony Mobile', 'sony mobile.jpg', 984, '2018-01-31', 'sony mobile'),
(9, 1, 3, 'iPhone New', 12000, 'iphone', 'white iphone.png', 984, '2018-01-31', 'iphone apple mobile'),
(10, 2, 6, 'Red Ladies dress', 1000, 'red dress for girls', 'red dress.jpg',  984, '2018-01-31','red dress '),
(11, 2, 6, 'Blue Heave dress', 1200, 'Blue dress', 'images.jpg',  984, '2018-01-31','blue dress cloths'),
(12, 2, 6, 'Ladies Casual Cloths', 1500, 'ladies casual summer two colors pleted', '7475-ladies-casual-dresses-summer-two-colors-pleated.jpg', 984, '2018-01-31', 'girl dress cloths casual'),
(13, 2, 6, 'SpringAutumnDress', 1200, 'girls dress', 'Spring-Autumn-Winter-Young-Ladies-Casual-Wool-Dress-Women-s-One-Piece-Dresse-Dating-Clothes-Medium.jpg_640x640.jpg', 984, '2018-01-31', 'girl dress'),
(14, 2, 6, 'Casual Dress', 1400, 'girl dress', 'download.jpg', 984, '2018-01-31', 'ladies cloths girl'),
(15, 2, 6, 'Formal Look', 1500, 'girl dress', 'shutterstock_203611819.jpg', 984, '2018-01-31', 'ladies wears dress girl'),
(16, 3, 6, 'Sweter for men', 600, '2012-Winter-Sweater-for-Men-for-better-outlook', '2012-Winter-Sweater-for-Men-for-better-outlook.jpg', 984, '2018-01-31', 'black sweter cloth winter'),
(17, 3, 6, 'Gents formal', 1000, 'gents formal look', 'gents-formal-250x250.jpg', 984, '2018-01-31', 'gents wear cloths'),
(19, 3, 6, 'Formal Coat', 3000, 'ad', 'images (1).jpg', 984, '2018-01-31', 'coat blazer gents'),
(20, 3, 6, 'Mens Sweeter', 1600, 'jg', 'Winter-fashion-men-burst-sweater.png',  984, '2018-01-31','sweeter gents '),
(21, 3, 6, 'T shirt', 800, 'ssds', 'IN-Mens-Apparel-Voodoo-Tiles-09._V333872612_.jpg',  984, '2018-01-31','formal t shirt black'),
(22, 4, 6, 'Yellow T shirt ', 1300, 'yello t shirt with pant', '1.0x0.jpg',  984, '2018-01-31','kids yellow t shirt'),
(23, 4, 6, 'Girls cloths', 1900, 'sadsf', 'GirlsClothing_Widgets.jpg', 984, '2018-01-31', 'formal kids wear dress'),
(24, 4, 6, 'Blue T shirt', 700, 'g', 'images.jpg', 984, '2018-01-31', 'kids dress'),
(25, 4, 6, 'Yellow girls dress', 750, 'as', 'images (3).jpg', 984, '2018-01-31', 'yellow kids dress'),
(26, 4, 6, 'Skyblue dress', 650, 'nbk', 'kids-wear-121.jpg', 984, '2018-01-31', 'skyblue kids dress'),
(27, 4, 6, 'Formal look', 690, 'sd', 'image28.jpg', 984, '2018-01-31', 'formal kids dress'),
(32, 5, 0, 'Book Shelf', 2500, 'book shelf', 'furniture-book-shelf-250x250.jpg', 984, '2018-01-31', 'book shelf furniture'),
(33, 6, 2, 'Refrigerator', 35000, 'Refrigerator', 'CT_WM_BTS-BTC-AppliancesHome_20150723.jpg', 984, '2018-01-31', 'refrigerator samsung'),
(34, 6, 4, 'Emergency Light', 1000, 'Emergency Light', 'emergency light.JPG', 984, '2018-01-31', 'emergency light'),
(35, 6, 0, 'Vaccum Cleaner', 6000, 'Vaccum Cleaner', 'images (2).jpg',  984, '2018-01-31','Vaccum Cleaner'),
(36, 6, 5, 'Iron', 1500, 'gj', 'iron.JPG',  984, '2018-01-31','iron'),
(37, 6, 5, 'LED TV', 20000, 'LED TV', 'images (4).jpg',  984, '2018-01-31','led tv lg'),
(38, 6, 4, 'Microwave Oven', 3500, 'Microwave Oven', 'images.jpg',  984, '2018-01-31','Microwave Oven'),
(39, 6, 5, 'Mixer Grinder', 2500, 'Mixer Grinder', 'singer-mixer-grinder-mg-46-medium_4bfa018096c25dec7ba0af40662856ef.jpg',  984, '2018-01-31','Mixer Grinder'),
(40, 2, 6, 'Formal girls dress', 3000, 'Formal girls dress', 'girl-walking.jpg', 984, '2018-01-31', 'ladies'),
(45, 1, 2, 'Samsung Galaxy Note 3', 10000, '0', 'samsung_galaxy_note3_note3neo.JPG', 984, '2018-01-31', 'samsung galaxy Note 3 neo');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL,
  `usertype` enum('Admin','Customer') NOT NULL,
  `register_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `notes` varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`, `usertype`, `register_date`, `last_login`) VALUES
(1, 'Rizwan', 'Khan', 'rizwankhan.august16@gmail.com', '25f9e794323b453885f5181f1b624d0b', '8389080183', 'Rahmat Nagar Burnpur Asansol', 'Asansol', 'Admin', '2017-12-23', '2018-03-01 04:03:17'),
(2, 'Rizwan', 'Khan', 'rizwankhan.august16@yahoo.com', '25f9e794323b453885f5181f1b624d0b', '8389080183', 'Rahmat Nagar Burnpur Asansol', 'Asa', 'Admin', '2017-12-23', '2018-03-01 04:03:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `brand_title` (`brand_title`);


ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_no` (`invoice_no`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_title` (`cat_title`);


--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_title` (`product_title`),
  ADD KEY `product_cat` (`product_cat`),
  ADD KEY `product_brand` (`product_brand`);


--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
  
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
  
--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
 
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_brand`) REFERENCES `brands` (`brand_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
