INSERT INTO campuses (id, name, created_at, updated_at)
VALUES (1, 'UNT Main Campus', NOW(), NOW()),
       (2, 'Discovery Park Campus', NOW(), NOW());

INSERT INTO restaurants (id, name, campus_id, created_at, updated_at)
VALUES (1, 'Chick-fil-A', 1, NOW(), NOW()),
       (2, 'Burger King', 1, NOW(), NOW()),
       (3, 'Fuzzys', 1, NOW(), NOW()),
       (4, 'Starbucks', 1, NOW(), NOW()),
       (5, 'Basic', 2, NOW(), NOW());

INSERT INTO categories (id, created_at, updated_at, category_name) 
VALUES (1, NOW(), NOW(), 'basic'),
       (2, NOW(), NOW(), 'burger king'),
       (3, NOW(), NOW(), 'chick-fil-a'),
       (4, NOW(), NOW(), 'fuzzys'),
       (5, NOW(), NOW(), 'starbucks');

INSERT INTO products (id, title, description, image, quantity, price, discount_price, play, created_at, updated_at, category)
VALUES  (1, 'Top Sirloin', 'Can be ordered rare , medium well or done', '1727183102.avif', '100', '10', '9', NULL, '2024-09-24 10:05:02', '2024-09-24 10:05:02', 'basic'),
        (2, 'Boneless Wings', '6 pc wings', '1727183203.avif', '60', '20', '15', NULL, '2024-09-24 10:06:43', '2024-09-24 10:06:43', 'basic'),
        (3, 'Brew Pub Loaded Waffle Fries', 'Waffle fries topped with spicy sauce and melted cheese', '1727183263.avif', '70', '40', '30', NULL, '2024-09-24 10:07:43', '2024-09-24 10:07:43', 'basic'),
        (4, 'Cinnabon Mini Swirls', 'Really good', '1727183381.avif', '50', '15', '10', NULL, '2024-09-24 10:09:41', '2024-09-24 10:09:41', 'basic'),
        (5, 'Double-Glazed Baby Back Ribs', 'Really good', '1727183439.avif', '40', '10', '9', NULL, '2024-09-24 10:10:39', '2024-09-24 10:10:39', 'basic'),
        (6, 'Kids Cheesy Pizza', 'really good', '1727183601.avif', '40', '15', '10', NULL, '2024-09-24 10:13:21', '2024-09-24 10:13:21', 'basic'),
        (7, 'Shrimp N Parmesan Sirloin', 'Really good', '1727183644.avif', '50', '20', '15', NULL, '2024-09-24 10:14:04', '2024-09-24 10:14:04', 'basic'),
        (8, 'Sizzlin Butter Pecan Blondie', 'Really good', '1727184387.avif', '70', '20', '15', NULL, '2024-09-24 10:26:27', '2024-09-24 10:26:27', 'basic'),
        (9, 'Southwest Chicken Bowl', 'Really good', '1727184439.avif', '70', '40', '35', NULL, '2024-09-24 10:27:19', '2024-09-24 10:27:19', 'basic'),
        (10, 'Spinach & Artichoke Dip', 'Really good', '1727184476.avif', '50', '20', '15', NULL, '2024-09-24 10:27:56', '2024-09-24 10:27:56', 'basic'),
        (11, 'Tex-Mex Shrimp Bowl', 'Really good', '1727184515.avif', '60', '10', '5', NULL, '2024-09-24 10:28:35', '2024-09-24 10:28:35', 'basic'),
        (12, 'The Classic Combo', 'Really good', '1727184572.avif', '70', '5', '5', NULL, '2024-09-24 10:29:32', '2024-09-24 10:29:32', 'basic'),
        (13, 'Whopper', 'Really good', '1727185262.png', '40', '20', '10', NULL, '2024-09-24 10:41:02', '2024-09-24 10:41:02', 'burger king'),
        (14, 'Double Cheese Bacon Burger', 'Really good', '1727185325.png', '60', '40', '30', NULL, '2024-09-24 10:42:05', '2024-09-24 10:42:05', 'burger king'),
        (15, 'Crispy Chicken', 'Really good', '1727185366.png', '60', '20', '10', NULL, '2024-09-24 10:42:46', '2024-09-24 10:42:46', 'burger king'),
        (16, 'Value Chicken Burger', 'Really good', '1727185475.png', '20', '15', '10', NULL, '2024-09-24 10:44:35', '2024-09-24 10:44:35', 'burger king'),
        (17, 'Cheeseburger', 'Really good', '1727185749.png', '100', '10', '5', NULL, '2024-09-24 10:49:09', '2024-09-24 10:49:09', 'burger king'),
        (18, 'Chilli Cheese Bites', 'Really good', '1727185795.png', '70', '20', '15', NULL, '2024-09-24 10:49:55', '2024-09-24 10:49:55', 'burger king'),
        (19, 'Crunchy Chicken Salad', 'Really good', '1727186095.png', '50', '15', '10', NULL, '2024-09-24 10:54:55', '2024-09-24 10:54:55', 'burger king'),
        (20, 'Kitkat/Oreo Flurry  ', 'Really good', '1727186131.png', '30', '20', '15', NULL, '2024-09-24 10:55:31', '2024-09-24 10:55:31', 'burger king'),
        (21, 'Junior Hamburger', 'Really good', '1727186175.png', '10', '10', '8', NULL, '2024-09-24 10:56:15', '2024-09-24 10:56:15', 'burger king'),
        (22, 'King Wings', 'Really good', '1727186207.png', '30', '15', '10', NULL, '2024-09-24 10:56:47', '2024-09-24 10:56:47', 'burger king'),
        (23, 'Oreo Shake', 'Really good', '1727186239.png', '30', '10', '9', NULL, '2024-09-24 10:57:19', '2024-09-24 10:57:19', 'burger king'),
        (24, 'Rebel Whopper', 'Really good', '1727186269.png', '60', '10', '5', NULL, '2024-09-24 10:57:49', '2024-09-24 10:57:49', 'burger king'),
        (25, 'Chicken Sandwich', 'Really good', '1727186548.png', '40', '20', '15', NULL, '2024-09-24 11:02:28', '2024-09-24 11:02:28', 'chick-fil-a'),
        (26, 'Chick-n-Strips®', 'Really good', '1727186588.png', '30', '10', '8', NULL, '2024-09-24 11:03:08', '2024-09-24 11:03:08', 'chick-fil-a'),
        (27, 'Cool Wrap®', 'Really good', '1727186638.png', '50', '15', '10', NULL, '2024-09-24 11:03:58', '2024-09-24 11:03:58', 'chick-fil-a'),
        (28, 'Deluxe Sandwich', 'Really good', '1727186688.png', '60', '15', '10', NULL, '2024-09-24 11:04:48', '2024-09-24 11:04:48', 'chick-fil-a'),
        (29, 'Grilled Chicken Club Sandwich', 'Really good', '1727187114.png', '60', '30', '25', NULL, '2024-09-24 11:11:54', '2024-09-24 11:11:54', 'chick-fil-a'),
        (30, 'Nuggets', 'Really good', '1727187163.png', '70', '10', '5', NULL, '2024-09-24 11:12:43', '2024-09-24 11:12:43', 'chick-fil-a'),
        (31, 'Grilled Chicken Sandwich', 'Really good', '1727187198.png', '50', '5', '3', NULL, '2024-09-24 11:13:18', '2024-09-24 11:13:18', 'chick-fil-a'),
        (32, 'Grilled Nuggets', 'Really good', '1727187253.png', '70', '20', '15', NULL, '2024-09-24 11:14:13', '2024-09-24 11:14:13', 'chick-fil-a'),
        (33, 'Honey Pepper Pimento Sandwich', 'Really good', '1727187304.png', '70', '15', '10', NULL, '2024-09-24 11:15:04', '2024-09-24 11:15:04', 'chick-fil-a'),
        (34, 'Spicy Chicken Sandwich', 'Really good', '1727187348.png', '60', '50', '45', NULL, '2024-09-24 11:15:48', '2024-09-24 11:15:48', 'chick-fil-a'),
        (35, 'Spicy Deluxe Sandwich', 'Really good', '1727187396.png', '70', '20', '15', NULL, '2024-09-24 11:16:36', '2024-09-24 11:16:36', 'chick-fil-a'),
        (36, 'Spicy Honey Pepper Pimento Sandwich', 'Really good', '1727187438.png', '60', '25', '20', NULL, '2024-09-24 11:17:18', '2024-09-24 11:17:18', 'chick-fil-a'),
        (37, 'BeefTaco', 'Really good', '1727187906.png', '50', '40', '30', NULL, '2024-09-24 11:25:06', '2024-09-24 11:25:06', 'fuzzys'),
        (38, 'GrilledVeggieTaco', 'Really good', '1727187961.png', '70', '30', '20', NULL, '2024-09-24 11:26:01', '2024-09-24 11:26:01', 'fuzzys'),
        (39, 'OreoChurros', 'Really good', '1727188001.png', '60', '15', '10', NULL, '2024-09-24 11:26:41', '2024-09-24 11:26:41', 'fuzzys'),
        (40, 'ShreddedChickenTaco', 'Really good', '1727188043.png', '70', '20', '15', NULL, '2024-09-24 11:27:23', '2024-09-24 11:27:23', 'fuzzys'),
        (41, 'SopapillaBites_NoFrosting_Full', 'Really good', '1727188101.png', '80', '20', '15', NULL, '2024-09-24 11:28:21', '2024-09-24 11:28:21', 'fuzzys'),
        (42, 'TempuraShrimpTaco', 'Really good', '1727188153.png', '90', '20', '15', NULL, '2024-09-24 11:29:13', '2024-09-24 11:29:13', 'fuzzys'),
        (43, 'GrilledMahiTaco', 'Really good', '1727188206.png', '89', '30', '20', NULL, '2024-09-24 11:30:06', '2024-09-24 11:30:06', 'fuzzys'),
        (44, 'Coffee', 'Really good', '1727188335.webp', '8', '10', '5', NULL, '2024-09-24 11:32:15', '2024-09-24 11:32:15', 'starbucks'),
        (45, 'espresso beverages', 'Really good', '1727188389.jpg', '70', '20', '15', NULL, '2024-09-24 11:33:09', '2024-09-24 11:33:09', 'starbucks'),
        (46, 'Starbucks Frappuccino', 'Really good', '1727188440.jpg', '80', '30', '20', NULL, '2024-09-24 11:34:00', '2024-09-24 11:34:00', 'starbucks'),
        (48, 'Pizza', '14 INCH CHEEZY PIZZA', '1732239870.png', '200', '10', NULL, NULL, '2024-11-22 01:44:30', '2024-11-22 01:44:30', 'burger king');


INSERT INTO users (id, name, email, usertype, phone, address, email_verified_at, password, two_factor_secret, two_factor_recovery_codes, two_factor_confirmed_at, remember_token, current_team_id, profile_photo_path, university, created_at, updated_at) 
VALUES  (1, 'Sravani Meka', 'mekasravani24@gmail.com', '1', '9403540196', '3130 Heritage Trail Blvd', '2024-11-06 06:56:24', '$2y$10$EkytcBDOCPeYIHTrRYK/cew/QP03DtViXbA3Hrn8v645GayJLIr8m', NULL, NULL, NULL, 'bmgaE4o8xK3syruICBoe2Z1IpOr91ca1GWZjKgTTExSIyerDB3X4DoGJTYnJ', NULL, NULL, 'UNT Main Campus', '2024-11-06 06:55:51', '2024-11-06 06:56:28');
        (19, 'Sanjana', 'mynedisanjana@gmail.com', '0', '9405958392', 'Avenue', '2024-11-21 20:19:48', '$2y$10$RXK3CEer28h0JCgHOssDneI.cYhi.fNCTfheGROHp0SrCsauXOBtO', NULL, NULL, NULL, NULL, NULL, NULL, 'UNT Main Campus', '2024-11-21 20:17:12', '2024-11-21 20:19:54'),
        (21, 'Suvarnanand k', 'suvarnanandkanumilli0308@gmail.com', '0', '9452743740', 'denton', '2024-11-22 01:35:57', '$2y$10$6jRymdGydv4whb46zu0yYuMRv3NUGe6ttS.Ov9aSUJ2HFVobewqSe', NULL, NULL, NULL, 'KWq98N75MkoSsrgho8YZoI5yYoEqjWxCcbGsfWc2M4lTxBztt5q6OoAURtrM', NULL, NULL, 'Discovery Park Campus', '2024-11-22 01:34:35', '2024-11-22 01:38:01');
