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


INSERT INTO `categories` (`cat_id`, `parent_cat`, `cat_title`) VALUES
(1, 0, 'Tiles'),
(2, 1,'Floor Tiles'),
(3, 1,'Paving tiles'),
(4, 1,'Vitrified tiles'),
(5, 1,'Roofing Tiles'),
(6, 1,'Wall Tiles'),
(7, 0,'Basins'),
(8, 7,'Colored Ceramic'),
(9, 7,'Marble Basin'),
(10, 7,'Resin Washbasin'),
(11, 7,'Wall Mounted Basin'),
(12, 7,'Table Mounted'),
(13, -1,'Pipes and Fittings'),
(14, -1,'Tanks'),
(15, 0,'Shower & Faucets'),
(16, 15,'Digital Showers'),
(17, 15,'Electric Shower'),
(18, 15,'Mixer shower'),
(19, 15,'Hand Shower'),
(20, 15,'Pillar Taps'),
(21, 15,'Mixer Taps');


INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES
(1, 2, 7, 15, '07M47684BS5725041', 'Completed'),
(2, 2, 7, 5, '07M47684BS5256374', 'Completed'),
(3, 1, 7, 30, '07M47684BS5983448', 'Completed'),
(4, 1, 2, 1, '07M47684BS5245253', 'Completed');


INSERT INTO `invoice` (`invoice_no`, `customer_name`, `order_date`, `sub_total`, `gst`, `discount`, `net_total`, `paid`, `due`, `payment_type`) VALUES
(30, 'I am Cus', '2018-11-02', 3500, 11700, 500, 76200, 76200, 0, 'Cash'),
(31, '', '2018-01-03', 1499, 10800, 0, 70800, 70800, 0, 'Cash'),
(32, 'Arjun', '2018-01-03', 3000, 5220, 55, 34165, 34165, 0, 'Cash'),
(33, '', '2018-01-03', 1499, 10800, 0, 70800, 70800, 0, 'Cash'),
(34, 'Ritwiz', '2018-01-03', 94500, 17010, 1500, 110010, 110010, 0, 'Cash'),
(35, 'Ramos', '2018-01-03', 154000, 27720, 550, 181170, 181170, 0, 'Cash'),
(36, 'Sergio', '2018-01-03', 154500, 27810, 2500, 179810, 179810, 0, 'Cash'),
(37, 'Tyson', '2018-01-03', 90000, 16200, 25.5, 106174.5, 106174.5, 0, 'Cash'),
(38, 'Rajdhani', '2018-01-03', 89500, 16110, 750.5, 104859.5, 104859.5, 0, 'Cash'),
(39, 'Kapoor & Son', '2018-01-03', 89500, 16110, 25, 105585, 105585, 0, 'Cash'),
(40, 'Ajay', '2018-01-03', 89000, 16020, 0, 105020, 105020, 0, 'Cash'),
(41, 'Jayanta', '2018-01-03', 89000, 16020, 0, 105020, 105020, 0, 'Cash'),
(42, 'Ajay Kant', '2018-01-03', 65500, 11790, 0, 77290, 77290, 0, 'Cash'),
(43, 'Egjdks', '2018-01-03', 125500, 22590, 5000, 143090, 143090, 0, 'Cash'),
(44, 'Tyson', '2018-01-03', 275000, 49500, 4950, 319550, 319550, 0, 'Cash'),
(45, 'Hndksks', '2018-01-03', 59000, 10620, 0, 69620, 69620, 0, 'Cash');


INSERT INTO `invoice_details` (`id`, `invoice_no`, `product_name`, `price`, `qty`) VALUES
(4, 30, 'Air Controlled Rain', 3500, 1),
(5, 31, 'Overhead', 1499, 1),
(6, 32, 'Waterfall', 3000, 1),
(7, 33, 'Overhead', 1499, 1),
(8, 34, 'Ambrosia Marfil', 500, 1),
(9, 34, 'Air Controlled Rain', 3500, 1),
(10, 34, 'Waterfall', 3000, 1),
(11, 35, 'Overhead', 1499, 1),
(12, 35, 'Waterfall', 3000, 1),
(13, 35, 'Air Controlled Rain', 3500, 1),
(14, 36, 'Overhead', 1499, 1),
(15, 36, 'Waterfall', 3000, 1),
(16, 36, 'Air Controlled Rain', 3500, 1),
(17, 36, 'Ambrosia Marfil', 500, 1),
(18, 37, 'Overhead', 1499, 1),
(19, 37, 'Waterfall', 3000, 1),
(20, 37, 'Ambrosia Marfil', 500, 2),
(21, 38, 'Overhead', 1499, 1),
(22, 38, 'Waterfall', 3000, 1),
(23, 38, 'Ambrosia Marfil', 500, 1),
(24, 39, 'Overhead', 1499, 1),
(25, 39, 'Waterfall', 3000, 1),
(26, 39, 'Ambrosia Marfil', 500, 1),
(27, 40, 'Overhead', 1499, 1),
(28, 40, 'Waterfall', 3000, 1),
(29, 41, 'Overhead', 1499, 1),
(30, 41, 'Waterfall', 3000, 1),
(31, 42, 'Air Controlled Rain', 3500, 1),
(32, 42, 'Ambrosia Marfil', 500, 1),
(33, 43, 'Overhead', 1499, 1),
(34, 43, 'Ambrosia Marfil', 500, 1),
(35, 43, 'Air Controlled Rain', 3500, 1),
(36, 44, 'Waterfall', 3000, 5),
(37, 44, 'Air Controlled Rain', 3500, 2),
(38, 45, 'Waterfall', 3000, 2),
(39, 45, 'Ambrosia Marfil', 500, 2);


INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_stock`, `added_date`) VALUES
(1, 17, 4, 'Air Controlled Rain', 1499, 'Electric Shower', 'electric_shower_air_controlled_rain.jpg', 984, '2018-01-31'),
(2, 2, 3, 'Ambrosia Marfil', 250, 'Floor Tiles', 'floor_tiles_Ambrosia_marfil.jpg', 9840, '2018-01-31'),
(3, 2, 3, 'Areana Copper', 300, 'Floor Tiles', 'floor_tiles_Areana_Copper.jpg', 9804, '2018-01-31'),
(4, 2, 3, 'Areana Stone Decor', 320, 'Floor Tiles', 'floor_tiles_Areana_Stone_Decor.jpg', 9084, '2018-01-31'),
(5, 2, 1, 'Areana Stone Creama', 100, 'Floor Tiles', 'floor_tiles_Arean_Stone_Creama.jpg', 84, '2018-01-31'),
(6, 19, 5, 'KA51387 Function 2', 2500, 'Hand Shower', 'hand_shower_2_function.jpg', 94, '2018-01-31'),
(7, 19, 2, 'KA51388 Function 3', 5000, 'Hand Shower' , 'hand_shower_3_function.jpg', 98, '2018-01-31'),
(8, 19, 4, 'KA51009 ', 4000, 'Single Flow Hand Shower', 'hand_shower_ka51009_single_flow.jpg', 904, '2018-01-31'),
(9, 18, 5, 'Overhead', 1200, 'Mixer Shower', 'mixer_shower_overhead.jpg', 980, '2018-01-31'),
(10, 18, 5, 'Waterfall', 1000, 'Single Function Mixer Shower', 'mixer_shower_water_fall_single_function.jpg',  785, '2018-01-31'),
(11, 21, 2, '2 in 1', 1200, 'Mixer Taps', 'mixer_taps_2in1.jpg',  66, '2018-01-31'),
(12, 21, 4, '3-Way Flow', 1500, 'Mixer Taps', 'mixer_taps_3_way_flow.jpg', 68, '2018-01-31'),
(13, 21, 4, 'Dark Monted Sink', 1200, 'Mixer Taps', 'mixer_taps_dark_monted_sink.jpg', 48, '2018-01-31'),
(14, 3, 6, 'Archieve', 140, 'Paving Tiles', 'paving_tiles_archieve.jpg',375, '2018-01-31'),
(15, 3, 6, 'Cubix Jaislaimer', 450, 'Paving Tiles', 'paving_tiles_cubix_jaislaimer.jpg', 574, '2018-01-31'),
(16, 3, 1, 'Delta Ivory', 600, 'Paving Tiles', 'paving_tiles_delta_Ivory.jpg', 845, '2018-01-31'),
(17, 3, 1, 'Duno Azul Strato', 1000, 'Paving Tiles', 'paving_tiles_Duno_azul_Strato.jpg', 489, '2018-01-31'),
(19, 20, 2, '3 Inlet', 300, 'Pillar Taps', 'pillar_taps_3inlet.jpg', 946, '2018-01-31'),
(20, 20, 2, 'Tall Body', 1600, 'Pillar Taps', 'pillar_taps_tall_body.jpg',  925, '2018-01-31'),
(21, 20, 4, 'Tall Single FLow', 1300, 'Pillar Taps', 'pillar_taps_tall_single_flow.jpg',  554, '2018-01-31'),
(22, 5, 1, 'Coffee Brown', 480, 'Roofing Tiles', 'roofing_tiles_coffe_brown.jpg',  976, '2018-01-31'),
(23, 5, 1, 'Double Shade', 420, 'Roofing Tiles', 'roofing_tiles_double_shade.jpg',  256, '2018-01-31'),
(24, 5, 1, 'Kalon Stone Coated Sheets', 380, 'Roofing Tiles', 'roofing_tiles_kalon_stone_Coated_sheets.jpg',  845, '2018-01-31'),
(25, 4, 3, 'Decor', 538, 'K1809 Vitrified Tiles', 'virtified_tiles_k1809_decor.jpg',  355, '2018-01-31'),
(26, 4, 6, 'Matte Red', 550, 'K6809 Vitrified Tiles', 'virtified_tiles_k6809_matte_red.jpg',  113, '2018-01-31'),
(27, 4, 6, 'Slate', 340, 'K6890 Vitrified Tiles', 'virtified_tiles_k6890_slate.jpg',  531, '2018-01-31'),
(28, 6, 1, 'Brown Leaf Beige', 640, 'Wall Tiles', 'wall_tiles_Brown_Leaf_Beige.jpg',  1351, '2018-01-31'),
(29, 6, 3, 'Brown Leaf Decor', 430, 'Wall Tiles', 'wall_tiles_Brown_Leaf_decore.jpg',  75, '2018-01-31'),
(30, 6, 6, 'Charm Bianca', 400, 'Wall Tiles', 'wall_tiles_Charm_Bianca.jpg',  30, '2018-01-31');



INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`, `usertype`, `register_date`, `last_login`) VALUES
(1, 'Shinichi', 'Kudo', 'sk@gmail.com', 'c44a471bd78cc6c2fea32b9fe028d30a', '9873402305', 'Coep Hostel', 'Pune', 'Admin', '2017-12-23', '2018-03-01 04:03:17'),
(2, 'Shubham', 'Khandelwal', 'shubham18@gmail.com', 'ae25736b64e474cd634075494d9fa88e', '8389080183', 'Opposite Khatri Store', 'Amravati', 'Admin', '2017-12-23', '2018-03-01 04:03:17');

