-- MySQL dump 10.13  Distrib 8.3.0, for macos14.2 (arm64)
--
-- Host: localhost    Database: well
-- ------------------------------------------------------
-- Server version	8.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE = @@TIME_ZONE */;
/*!40103 SET TIME_ZONE = '+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache`
(
    `key`        varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `value`      mediumtext COLLATE utf8mb4_unicode_ci   NOT NULL,
    `expiration` int                                     NOT NULL,
    PRIMARY KEY (`key`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `cache`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks`
(
    `key`        varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `owner`      varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `expiration` int                                     NOT NULL,
    PRIMARY KEY (`key`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_items`
(
    `id`         bigint unsigned NOT NULL AUTO_INCREMENT,
    `user_id`    bigint unsigned NOT NULL,
    `product_id` bigint unsigned NOT NULL,
    `quantity`   int             NOT NULL DEFAULT '0',
    `items`      int             NOT NULL DEFAULT '0',
    `subtotal`   decimal(8, 2)   NOT NULL DEFAULT '0.00',
    `total`      decimal(8, 2)   NOT NULL DEFAULT '0.00',
    `created_at` timestamp       NULL     DEFAULT NULL,
    `updated_at` timestamp       NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `cart_items_product_id_foreign` (`product_id`),
    KEY `cart_items_user_id_index` (`user_id`),
    CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
    CONSTRAINT `cart_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_items`
--

LOCK TABLES `cart_items` WRITE;
/*!40000 ALTER TABLE `cart_items`
    DISABLE KEYS */;
INSERT INTO `cart_items`
VALUES (1, 1, 1, 2, 0, 200.00, 200.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51'),
       (2, 1, 2, 1, 0, 50.00, 50.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51'),
       (3, 2, 3, 3, 0, 60.00, 60.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51');
/*!40000 ALTER TABLE `cart_items`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories`
(
    `id`         bigint unsigned                         NOT NULL AUTO_INCREMENT,
    `name`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `image`      varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    `updated_at` timestamp                               NULL DEFAULT NULL,
    `deleted_at` timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 7
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories`
    DISABLE KEYS */;
INSERT INTO `categories`
VALUES (1, 'Skincare', 'images/home/category_1.jpg', '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (2, 'Haircare', 'images/home/category_2.jpg', '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (3, 'Makeup', 'images/home/category_3.jpg', '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (4, 'Health Supplements', 'images/home/category_4.jpg', '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (5, 'Body Care', 'images/home/category_5.jpg', '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (6, 'Essential Oils', 'images/home/category_6.jpg', '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL);
/*!40000 ALTER TABLE `categories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configs`
--

DROP TABLE IF EXISTS `configs`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `configs`
(
    `id`          bigint unsigned                         NOT NULL AUTO_INCREMENT,
    `key`         varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `type`        varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `value`       text COLLATE utf8mb4_unicode_ci         NOT NULL,
    `description` text COLLATE utf8mb4_unicode_ci,
    `created_at`  timestamp                               NULL DEFAULT NULL,
    `updated_at`  timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `configs_key_unique` (`key`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configs`
--

LOCK TABLES `configs` WRITE;
/*!40000 ALTER TABLE `configs`
    DISABLE KEYS */;
INSERT INTO `configs`
VALUES (1, 'home_banner', 'json',
        '[{\"image\":\"images\\/home\\/home_banner1.jpg\",\"title\":\"SALE\",\"description\":\"Skincare, fitness products, nutritional supplements\",\"bold_text\":\"Up to 50% discount, check it out\",\"button_text\":\"Explore\",\"button_link\":\"#\"},{\"image\":\"images\\/home\\/home_banner2.jpg\",\"title\":\"NEW ARRIVALS\",\"description\":\"Check out our latest products\",\"bold_text\":\"Special prices available now\",\"button_text\":\"Shop Now\",\"button_link\":\"#\"},{\"image\":\"images\\/home\\/home_banner3.jpg\",\"title\":\"LIMITED TIME OFFER\",\"description\":\"Exclusive deals on select items\",\"bold_text\":\"Hurry, while stocks last\",\"button_text\":\"Discover\",\"button_link\":\"#\"}]',
        'Configuration for homepage banners', NULL, NULL);
/*!40000 ALTER TABLE `configs`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_queries`
--

DROP TABLE IF EXISTS `contact_queries`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_queries`
(
    `id`         bigint unsigned                                                  NOT NULL AUTO_INCREMENT,
    `name`       varchar(255) COLLATE utf8mb4_unicode_ci                          NOT NULL,
    `email`      varchar(255) COLLATE utf8mb4_unicode_ci                          NOT NULL,
    `phone`      varchar(255) COLLATE utf8mb4_unicode_ci                                   DEFAULT NULL,
    `subject`    varchar(255) COLLATE utf8mb4_unicode_ci                          NOT NULL,
    `message`    text COLLATE utf8mb4_unicode_ci                                  NOT NULL,
    `status`     enum ('new','in_progress','resolved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
    `created_at` timestamp                                                        NULL     DEFAULT NULL,
    `updated_at` timestamp                                                        NULL     DEFAULT NULL,
    `deleted_at` timestamp                                                        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_queries`
--

LOCK TABLES `contact_queries` WRITE;
/*!40000 ALTER TABLE `contact_queries`
    DISABLE KEYS */;
INSERT INTO `contact_queries`
VALUES (1, 'John Doe', 'john.doe@example.com', '1234567890', 'Product Inquiry',
        'I would like to know more about your product range.', 'new', '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (2, 'Jane Smith', 'jane.smith@example.com', '0987654321', 'Order Issue', 'I have an issue with my recent order.',
        'in_progress', '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (3, 'Alice Johnson', 'alice.johnson@example.com', '5555555555', 'Feedback',
        'I love your website! Keep up the great work.', 'resolved', '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL);
/*!40000 ALTER TABLE `contact_queries`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries`
(
    `id`            bigint unsigned                         NOT NULL AUTO_INCREMENT,
    `code`          varchar(2) COLLATE utf8mb4_unicode_ci   NOT NULL,
    `name`          varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `available`     tinyint(1)                              NOT NULL DEFAULT '1',
    `shipping_rate` decimal(8, 2)                           NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `countries_code_unique` (`code`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 193
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries`
    DISABLE KEYS */;
INSERT INTO `countries`
VALUES (1, 'CA', 'Canada', 1, 10.00),
       (2, 'US', 'United States', 1, 15.00),
       (3, 'AF', 'Afghanistan', 1, 45.00),
       (4, 'AL', 'Albania', 1, 35.00),
       (5, 'DZ', 'Algeria', 1, 40.00),
       (6, 'AD', 'Andorra', 1, 30.00),
       (7, 'AO', 'Angola', 1, 50.00),
       (8, 'AG', 'Antigua and Barbuda', 1, 25.00),
       (9, 'AR', 'Argentina', 1, 35.00),
       (10, 'AM', 'Armenia', 1, 40.00),
       (11, 'AU', 'Australia', 1, 55.00),
       (12, 'AT', 'Austria', 1, 30.00),
       (13, 'AZ', 'Azerbaijan', 1, 40.00),
       (14, 'BS', 'Bahamas', 1, 25.00),
       (15, 'BH', 'Bahrain', 1, 45.00),
       (16, 'BD', 'Bangladesh', 1, 50.00),
       (17, 'BB', 'Barbados', 1, 30.00),
       (18, 'BY', 'Belarus', 1, 35.00),
       (19, 'BE', 'Belgium', 1, 30.00),
       (20, 'BZ', 'Belize', 1, 25.00),
       (21, 'BJ', 'Benin', 1, 45.00),
       (22, 'BT', 'Bhutan', 1, 50.00),
       (23, 'BO', 'Bolivia', 1, 35.00),
       (24, 'BA', 'Bosnia and Herzegovina', 1, 35.00),
       (25, 'BW', 'Botswana', 1, 50.00),
       (26, 'BR', 'Brazil', 1, 40.00),
       (27, 'BN', 'Brunei', 1, 55.00),
       (28, 'BG', 'Bulgaria', 1, 35.00),
       (29, 'BF', 'Burkina Faso', 1, 45.00),
       (30, 'BI', 'Burundi', 1, 50.00),
       (31, 'KH', 'Cambodia', 1, 55.00),
       (32, 'CM', 'Cameroon', 1, 45.00),
       (33, 'CV', 'Cape Verde', 1, 40.00),
       (34, 'CF', 'Central African Republic', 1, 50.00),
       (35, 'TD', 'Chad', 1, 50.00),
       (36, 'CL', 'Chile', 1, 40.00),
       (37, 'CN', 'China', 1, 55.00),
       (38, 'CO', 'Colombia', 1, 35.00),
       (39, 'KM', 'Comoros', 1, 55.00),
       (40, 'CG', 'Congo', 1, 50.00),
       (41, 'CR', 'Costa Rica', 1, 30.00),
       (42, 'HR', 'Croatia', 1, 35.00),
       (43, 'CU', 'Cuba', 1, 25.00),
       (44, 'CY', 'Cyprus', 1, 40.00),
       (45, 'CZ', 'Czech Republic', 1, 35.00),
       (46, 'DK', 'Denmark', 1, 30.00),
       (47, 'DJ', 'Djibouti', 1, 50.00),
       (48, 'DM', 'Dominica', 1, 30.00),
       (49, 'DO', 'Dominican Republic', 1, 30.00),
       (50, 'EC', 'Ecuador', 1, 35.00),
       (51, 'EG', 'Egypt', 1, 45.00),
       (52, 'SV', 'El Salvador', 1, 30.00),
       (53, 'GQ', 'Equatorial Guinea', 1, 50.00),
       (54, 'ER', 'Eritrea', 1, 50.00),
       (55, 'EE', 'Estonia', 1, 35.00),
       (56, 'ET', 'Ethiopia', 1, 50.00),
       (57, 'FJ', 'Fiji', 1, 60.00),
       (58, 'FI', 'Finland', 1, 35.00),
       (59, 'FR', 'France', 1, 30.00),
       (60, 'GA', 'Gabon', 1, 50.00),
       (61, 'GM', 'Gambia', 1, 45.00),
       (62, 'GE', 'Georgia', 1, 40.00),
       (63, 'DE', 'Germany', 1, 30.00),
       (64, 'GH', 'Ghana', 1, 45.00),
       (65, 'GR', 'Greece', 1, 35.00),
       (66, 'GD', 'Grenada', 1, 30.00),
       (67, 'GT', 'Guatemala', 1, 30.00),
       (68, 'GN', 'Guinea', 1, 45.00),
       (69, 'GW', 'Guinea-Bissau', 1, 45.00),
       (70, 'GY', 'Guyana', 1, 35.00),
       (71, 'HT', 'Haiti', 1, 30.00),
       (72, 'HN', 'Honduras', 1, 30.00),
       (73, 'HU', 'Hungary', 1, 35.00),
       (74, 'IS', 'Iceland', 1, 35.00),
       (75, 'IN', 'India', 1, 50.00),
       (76, 'ID', 'Indonesia', 1, 55.00),
       (77, 'IR', 'Iran', 1, 45.00),
       (78, 'IQ', 'Iraq', 1, 45.00),
       (79, 'IE', 'Ireland', 1, 30.00),
       (80, 'IL', 'Israel', 1, 40.00),
       (81, 'IT', 'Italy', 1, 35.00),
       (82, 'CI', 'Ivory Coast', 1, 45.00),
       (83, 'JM', 'Jamaica', 1, 30.00),
       (84, 'JP', 'Japan', 1, 55.00),
       (85, 'JO', 'Jordan', 1, 45.00),
       (86, 'KZ', 'Kazakhstan', 1, 45.00),
       (87, 'KE', 'Kenya', 1, 50.00),
       (88, 'KI', 'Kiribati', 1, 60.00),
       (89, 'KP', 'North Korea', 1, 55.00),
       (90, 'KR', 'South Korea', 1, 55.00),
       (91, 'KW', 'Kuwait', 1, 45.00),
       (92, 'KG', 'Kyrgyzstan', 1, 45.00),
       (93, 'LA', 'Laos', 1, 55.00),
       (94, 'LV', 'Latvia', 1, 35.00),
       (95, 'LB', 'Lebanon', 1, 45.00),
       (96, 'LS', 'Lesotho', 1, 50.00),
       (97, 'LR', 'Liberia', 1, 45.00),
       (98, 'LY', 'Libya', 1, 45.00),
       (99, 'LI', 'Liechtenstein', 1, 30.00),
       (100, 'LT', 'Lithuania', 1, 35.00),
       (101, 'LU', 'Luxembourg', 1, 30.00),
       (102, 'MK', 'North Macedonia', 1, 35.00),
       (103, 'MG', 'Madagascar', 1, 55.00),
       (104, 'MW', 'Malawi', 1, 50.00),
       (105, 'MY', 'Malaysia', 1, 55.00),
       (106, 'MV', 'Maldives', 1, 55.00),
       (107, 'ML', 'Mali', 1, 45.00),
       (108, 'MT', 'Malta', 1, 40.00),
       (109, 'MH', 'Marshall Islands', 1, 60.00),
       (110, 'MR', 'Mauritania', 1, 45.00),
       (111, 'MU', 'Mauritius', 1, 55.00),
       (112, 'MX', 'Mexico', 1, 25.00),
       (113, 'FM', 'Micronesia', 1, 60.00),
       (114, 'MD', 'Moldova', 1, 35.00),
       (115, 'MC', 'Monaco', 1, 30.00),
       (116, 'MN', 'Mongolia', 1, 55.00),
       (117, 'ME', 'Montenegro', 1, 35.00),
       (118, 'MA', 'Morocco', 1, 40.00),
       (119, 'MZ', 'Mozambique', 1, 50.00),
       (120, 'MM', 'Myanmar', 1, 55.00),
       (121, 'NA', 'Namibia', 1, 50.00),
       (122, 'NR', 'Nauru', 1, 60.00),
       (123, 'NP', 'Nepal', 1, 50.00),
       (124, 'NL', 'Netherlands', 1, 30.00),
       (125, 'NZ', 'New Zealand', 1, 60.00),
       (126, 'NI', 'Nicaragua', 1, 30.00),
       (127, 'NE', 'Niger', 1, 45.00),
       (128, 'NG', 'Nigeria', 1, 45.00),
       (129, 'NO', 'Norway', 1, 35.00),
       (130, 'OM', 'Oman', 1, 45.00),
       (131, 'PK', 'Pakistan', 1, 50.00),
       (132, 'PW', 'Palau', 1, 60.00),
       (133, 'PA', 'Panama', 1, 30.00),
       (134, 'PG', 'Papua New Guinea', 1, 60.00),
       (135, 'PY', 'Paraguay', 1, 40.00),
       (136, 'PE', 'Peru', 1, 40.00),
       (137, 'PH', 'Philippines', 1, 55.00),
       (138, 'PL', 'Poland', 1, 35.00),
       (139, 'PT', 'Portugal', 1, 35.00),
       (140, 'QA', 'Qatar', 1, 45.00),
       (141, 'RO', 'Romania', 1, 35.00),
       (142, 'RU', 'Russia', 1, 45.00),
       (143, 'RW', 'Rwanda', 1, 50.00),
       (144, 'KN', 'Saint Kitts and Nevis', 1, 30.00),
       (145, 'LC', 'Saint Lucia', 1, 30.00),
       (146, 'VC', 'Saint Vincent and the Grenadines', 1, 30.00),
       (147, 'WS', 'Samoa', 1, 60.00),
       (148, 'SM', 'San Marino', 1, 35.00),
       (149, 'ST', 'Sao Tome and Principe', 1, 50.00),
       (150, 'SA', 'Saudi Arabia', 1, 45.00),
       (151, 'SN', 'Senegal', 1, 45.00),
       (152, 'RS', 'Serbia', 1, 35.00),
       (153, 'SC', 'Seychelles', 1, 55.00),
       (154, 'SL', 'Sierra Leone', 1, 45.00),
       (155, 'SG', 'Singapore', 1, 55.00),
       (156, 'SK', 'Slovakia', 1, 35.00),
       (157, 'SI', 'Slovenia', 1, 35.00),
       (158, 'SB', 'Solomon Islands', 1, 60.00),
       (159, 'SO', 'Somalia', 1, 50.00),
       (160, 'ZA', 'South Africa', 1, 50.00),
       (161, 'SS', 'South Sudan', 1, 50.00),
       (162, 'ES', 'Spain', 1, 35.00),
       (163, 'LK', 'Sri Lanka', 1, 55.00),
       (164, 'SD', 'Sudan', 1, 50.00),
       (165, 'SR', 'Suriname', 1, 35.00),
       (166, 'SE', 'Sweden', 1, 35.00),
       (167, 'CH', 'Switzerland', 1, 30.00),
       (168, 'SY', 'Syria', 1, 45.00),
       (169, 'TJ', 'Tajikistan', 1, 45.00),
       (170, 'TZ', 'Tanzania', 1, 50.00),
       (171, 'TH', 'Thailand', 1, 55.00),
       (172, 'TL', 'Timor-Leste', 1, 55.00),
       (173, 'TG', 'Togo', 1, 45.00),
       (174, 'TO', 'Tonga', 1, 60.00),
       (175, 'TT', 'Trinidad and Tobago', 1, 30.00),
       (176, 'TN', 'Tunisia', 1, 40.00),
       (177, 'TR', 'Turkey', 1, 40.00),
       (178, 'TM', 'Turkmenistan', 1, 45.00),
       (179, 'TV', 'Tuvalu', 1, 60.00),
       (180, 'UG', 'Uganda', 1, 50.00),
       (181, 'UA', 'Ukraine', 1, 35.00),
       (182, 'AE', 'United Arab Emirates', 1, 45.00),
       (183, 'GB', 'United Kingdom', 1, 30.00),
       (184, 'UY', 'Uruguay', 1, 40.00),
       (185, 'UZ', 'Uzbekistan', 1, 45.00),
       (186, 'VU', 'Vanuatu', 1, 60.00),
       (187, 'VA', 'Vatican City', 1, 35.00),
       (188, 'VE', 'Venezuela', 1, 35.00),
       (189, 'VN', 'Vietnam', 1, 55.00),
       (190, 'YE', 'Yemen', 1, 45.00),
       (191, 'ZM', 'Zambia', 1, 50.00),
       (192, 'ZW', 'Zimbabwe', 1, 50.00);
/*!40000 ALTER TABLE `countries`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `default_addresses`
--

DROP TABLE IF EXISTS `default_addresses`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `default_addresses`
(
    `id`                   bigint unsigned NOT NULL AUTO_INCREMENT,
    `user_id`              bigint unsigned NOT NULL,
    `billing_name`         varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `billing_address`      varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `billing_city`         varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `billing_province`     varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `billing_country`      varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `billing_postal_code`  varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `billing_email`        varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `billing_phone`        varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `shipping_name`        varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `shipping_address`     varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `shipping_city`        varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `shipping_province`    varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `shipping_country`     varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `shipping_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `shipping_email`       varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `shipping_phone`       varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at`           timestamp       NULL                    DEFAULT NULL,
    `updated_at`           timestamp       NULL                    DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `default_addresses_user_id_foreign` (`user_id`),
    CONSTRAINT `default_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `default_addresses`
--

LOCK TABLES `default_addresses` WRITE;
/*!40000 ALTER TABLE `default_addresses`
    DISABLE KEYS */;
INSERT INTO `default_addresses`
VALUES (1, 1, 'Admin User', '123 Admin Street', 'Admin City', 'Admin Province', 'Admin Country', '12345',
        'admin@gmail.com', '1234567890', 'Admin User', '123 Admin Street', 'Admin City', 'MB', 'CA', '12345',
        'admin@gmail.com', '1234567890', '2024-08-16 06:25:51', '2024-08-16 06:25:51'),
       (2, 2, 'MyDasa User', '456 John Street', 'MyDasa City', 'MyDasa Province', 'MyDasa Country', '67890',
        'mydasa@gmail.com', '0987654321', 'MyDasa User', '456 John Street', 'MyDasa City', 'MB', 'CA', '67890',
        'mydasa@gmail.com', '0987654321', '2024-08-16 06:25:51', '2024-08-16 06:25:51');
/*!40000 ALTER TABLE `default_addresses`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_logs`
--

DROP TABLE IF EXISTS `event_logs`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_logs`
(
    `id`         bigint unsigned                         NOT NULL AUTO_INCREMENT,
    `event`      varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `url`        varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `method`     varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `user_id`    bigint unsigned                              DEFAULT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    `updated_at` timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `event_logs_user_id_foreign` (`user_id`),
    CONSTRAINT `event_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_logs`
--

LOCK TABLES `event_logs` WRITE;
/*!40000 ALTER TABLE `event_logs`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `event_logs`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs`
(
    `id`         bigint unsigned                         NOT NULL AUTO_INCREMENT,
    `uuid`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `connection` text COLLATE utf8mb4_unicode_ci         NOT NULL,
    `queue`      text COLLATE utf8mb4_unicode_ci         NOT NULL,
    `payload`    longtext COLLATE utf8mb4_unicode_ci     NOT NULL,
    `exception`  longtext COLLATE utf8mb4_unicode_ci     NOT NULL,
    `failed_at`  timestamp                               NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flagged_reviews`
--

DROP TABLE IF EXISTS `flagged_reviews`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `flagged_reviews`
(
    `id`          bigint unsigned NOT NULL AUTO_INCREMENT,
    `product_id`  bigint unsigned NOT NULL,
    `user_id`     bigint unsigned NOT NULL,
    `rating`      int             NOT NULL,
    `review_text` text COLLATE utf8mb4_unicode_ci,
    `image`       varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at`  timestamp       NULL                    DEFAULT NULL,
    `updated_at`  timestamp       NULL                    DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `flagged_reviews_product_id_foreign` (`product_id`),
    KEY `flagged_reviews_user_id_foreign` (`user_id`),
    CONSTRAINT `flagged_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
    CONSTRAINT `flagged_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flagged_reviews`
--

LOCK TABLES `flagged_reviews` WRITE;
/*!40000 ALTER TABLE `flagged_reviews`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `flagged_reviews`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches`
(
    `id`             varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`           varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `total_jobs`     int                                     NOT NULL,
    `pending_jobs`   int                                     NOT NULL,
    `failed_jobs`    int                                     NOT NULL,
    `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci     NOT NULL,
    `options`        mediumtext COLLATE utf8mb4_unicode_ci,
    `cancelled_at`   int DEFAULT NULL,
    `created_at`     int                                     NOT NULL,
    `finished_at`    int DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs`
(
    `id`           bigint unsigned                         NOT NULL AUTO_INCREMENT,
    `queue`        varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `payload`      longtext COLLATE utf8mb4_unicode_ci     NOT NULL,
    `attempts`     tinyint unsigned                        NOT NULL,
    `reserved_at`  int unsigned DEFAULT NULL,
    `available_at` int unsigned                            NOT NULL,
    `created_at`   int unsigned                            NOT NULL,
    PRIMARY KEY (`id`),
    KEY `jobs_queue_index` (`queue`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations`
(
    `id`        int unsigned                            NOT NULL AUTO_INCREMENT,
    `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `batch`     int                                     NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1006
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations`
    DISABLE KEYS */;
INSERT INTO `migrations`
VALUES (984, '0001_01_01_000000_create_users_table', 1),
       (985, '0001_01_01_000001_create_cache_table', 1),
       (986, '0001_01_01_000002_create_jobs_table', 1),
       (987, '2024_08_01_125107_create_categories_table', 1),
       (988, '2024_08_01_154607_create_products_table', 1),
       (989, '2024_08_01_155820_create_orders_table', 1),
       (990, '2024_08_01_160450_create_cart_items_table', 1),
       (991, '2024_08_01_160839_create_transactions_table', 1),
       (992, '2024_08_01_161412_create_payments_table', 1),
       (993, '2024_08_01_161618_create_reviews_table', 1),
       (994, '2024_08_01_162135_create_wishlist_table', 1),
       (995, '2024_08_02_022237_create_order_details_table', 1),
       (996, '2024_08_04_232339_create_countries_table', 1),
       (997, '2024_08_05_000018_create_provinces_table', 1),
       (998, '2024_08_06_161540_create_configs_tables', 1),
       (999, '2024_08_07_010822_add_addresses_to_users_table', 1),
       (1000, '2024_08_07_161327_create_stores_table', 1),
       (1001, '2024_08_11_042630_create_contact_queries_table', 1),
       (1002, '2024_08_11_173446_add_order_references_to_users_table', 1),
       (1003, '2024_08_11_211145_create_default_addresses_table', 1),
       (1004, '2024_08_12_222244_create_flagged_reviews_table', 1),
       (1005, '2024_08_13_154613_create_event_logs_table', 1);
/*!40000 ALTER TABLE `migrations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details`
(
    `id`          bigint unsigned NOT NULL AUTO_INCREMENT,
    `order_id`    bigint unsigned NOT NULL,
    `product_id`  bigint unsigned NOT NULL,
    `price`       decimal(10, 2)  NOT NULL,
    `quantity`    int             NOT NULL,
    `total_price` decimal(10, 2)  NOT NULL,
    `created_at`  timestamp       NULL DEFAULT NULL,
    `updated_at`  timestamp       NULL DEFAULT NULL,
    `deleted_at`  timestamp       NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `order_details_order_id_foreign` (`order_id`),
    KEY `order_details_product_id_foreign` (`product_id`),
    CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
    CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details`
    DISABLE KEYS */;
INSERT INTO `order_details`
VALUES (1, 1, 1, 50.00, 2, 100.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL);
/*!40000 ALTER TABLE `order_details`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders`
(
    `id`                   bigint unsigned                                                                           NOT NULL AUTO_INCREMENT,
    `user_id`              bigint unsigned                                                                           NOT NULL,
    `quantity`             int                                                                                            DEFAULT NULL,
    `pre_tax_amount`       decimal(10, 2)                                                                                 DEFAULT NULL,
    `post_tax_amount`      decimal(10, 2)                                                                                 DEFAULT NULL,
    `gst`                  decimal(10, 2)                                                                                 DEFAULT NULL,
    `pst`                  decimal(10, 2)                                                                                 DEFAULT NULL,
    `shipping_rate`        decimal(10, 2)                                                                                 DEFAULT NULL,
    `shipping_name`        varchar(255) COLLATE utf8mb4_unicode_ci                                                        DEFAULT NULL,
    `shipping_email`       varchar(255) COLLATE utf8mb4_unicode_ci                                                        DEFAULT NULL,
    `shipping_phone`       varchar(255) COLLATE utf8mb4_unicode_ci                                                        DEFAULT NULL,
    `shipping_address`     varchar(255) COLLATE utf8mb4_unicode_ci                                                        DEFAULT NULL,
    `shipping_city`        varchar(100) COLLATE utf8mb4_unicode_ci                                                        DEFAULT NULL,
    `shipping_province`    varchar(100) COLLATE utf8mb4_unicode_ci                                                        DEFAULT NULL,
    `shipping_country`     varchar(100) COLLATE utf8mb4_unicode_ci                                                        DEFAULT NULL,
    `shipping_postal_code` varchar(10) COLLATE utf8mb4_unicode_ci                                                         DEFAULT NULL,
    `coupon_code`          varchar(20) COLLATE utf8mb4_unicode_ci                                                         DEFAULT NULL,
    `delivery_date`        date                                                                                           DEFAULT NULL,
    `status`               enum ('Pending','Confirmed','Shipped','Delivered','Cancelled') COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at`           timestamp                                                                                 NULL DEFAULT NULL,
    `updated_at`           timestamp                                                                                 NULL DEFAULT NULL,
    `deleted_at`           timestamp                                                                                 NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `orders_user_id_foreign` (`user_id`),
    CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders`
    DISABLE KEYS */;
INSERT INTO `orders`
VALUES (1, 1, 2, 100.00, 110.00, 5.00, 5.00, 5.00, 'John Doe', 'john@gmail.com', '+1-431-123-1234', '123 Main St',
        'Winnipeg', 'MB', 'Canada', 'R3C 1A1', 'hello-world', NULL, 'Delivered', '2024-08-16 06:25:51',
        '2024-08-16 06:25:51', NULL);
/*!40000 ALTER TABLE `orders`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens`
(
    `email`      varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `token`      varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`email`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments`
(
    `id`                  bigint unsigned                                                  NOT NULL AUTO_INCREMENT,
    `order_id`            bigint unsigned                                                       DEFAULT NULL,
    `method`              enum ('Credit Card','PayPal','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
    `amount`              decimal(10, 2)                                                   NOT NULL,
    `discount`            decimal(5, 2)                                                         DEFAULT NULL,
    `status`              enum ('Pending','Completed','Failed') COLLATE utf8mb4_unicode_ci NOT NULL,
    `payer_name`          varchar(255) COLLATE utf8mb4_unicode_ci                          NOT NULL,
    `payer_card`          varchar(255) COLLATE utf8mb4_unicode_ci                          NOT NULL,
    `billing_name`        varchar(255) COLLATE utf8mb4_unicode_ci                               DEFAULT NULL,
    `billing_email`       varchar(255) COLLATE utf8mb4_unicode_ci                               DEFAULT NULL,
    `billing_phone`       varchar(255) COLLATE utf8mb4_unicode_ci                               DEFAULT NULL,
    `billing_address`     varchar(255) COLLATE utf8mb4_unicode_ci                               DEFAULT NULL,
    `billing_city`        varchar(100) COLLATE utf8mb4_unicode_ci                               DEFAULT NULL,
    `billing_province`    varchar(100) COLLATE utf8mb4_unicode_ci                               DEFAULT NULL,
    `billing_country`     varchar(100) COLLATE utf8mb4_unicode_ci                               DEFAULT NULL,
    `billing_postal_code` varchar(10) COLLATE utf8mb4_unicode_ci                                DEFAULT NULL,
    `created_at`          timestamp                                                        NULL DEFAULT NULL,
    `updated_at`          timestamp                                                        NULL DEFAULT NULL,
    `deleted_at`          timestamp                                                        NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `payments_order_id_foreign` (`order_id`),
    CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments`
    DISABLE KEYS */;
INSERT INTO `payments`
VALUES (1, 1, 'Credit Card', 100.00, 0.00, 'Completed', 'Tom', '****4312', 'John Doe', 'john@gmail.com',
        '+1-431-123-1234', '123 Main St', 'Winnipeg', 'MB', 'Canada', 'R3C 1A1', '2024-08-16 06:25:51',
        '2024-08-16 06:25:51', NULL);
/*!40000 ALTER TABLE `payments`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products`
(
    `id`               bigint unsigned                         NOT NULL AUTO_INCREMENT,
    `name`             varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`      text COLLATE utf8mb4_unicode_ci,
    `long_description` text COLLATE utf8mb4_unicode_ci,
    `price`            decimal(10, 2)                          NOT NULL,
    `category_id`      bigint unsigned                         NOT NULL,
    `stock`            int                                     NOT NULL DEFAULT '0',
    `image_url`        varchar(255) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `color`            varchar(50) COLLATE utf8mb4_unicode_ci           DEFAULT NULL,
    `rating`           decimal(3, 2)                                    DEFAULT NULL,
    `discount`         decimal(5, 2)                                    DEFAULT NULL,
    `created_at`       timestamp                               NULL     DEFAULT NULL,
    `updated_at`       timestamp                               NULL     DEFAULT NULL,
    `deleted_at`       timestamp                               NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `products_category_id_foreign` (`category_id`),
    CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 51
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products`
    DISABLE KEYS */;
INSERT INTO `products`
VALUES (1, 'Organic Face Wash',
        'Organic Face Wash cleanses gently, preserving moisture for all skin types. Leaves skin fresh and rejuvenated.',
        'This Organic Face Wash is a premium skincare product that is carefully crafted from a selection of the highest quality organic ingredients. It not only cleanses the skin but also nourishes and revitalizes it, ensuring that all impurities, including dirt and excess oil, are thoroughly removed.\n                 Unlike many other face washes, it retains the skin\'s essential moisture, preventing dryness and irritation. It is suitable for all skin types, including sensitive and acne-prone skin. The formula includes natural extracts that work synergistically to improve skin texture and tone, giving you a refreshed and rejuvenated look. Daily use of this face wash helps in maintaining a balanced complexion, free of blemishes, and contributes to long-term skin health. Over time, you will notice a significant improvement in skin clarity, softness, and overall appearance, as the product works to restore your skin’s natural glow. This product is also free from harsh chemicals, parabens, and artificial fragrances, making it a safe and healthy choice for your skincare routine.',
        15.99, 1, 100, 'images/product_1.jpg', 'White', 4.50, 10.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (2, 'Moisturizing Lotion',
        'Moisturizing Lotion hydrates deeply, keeping skin soft, smooth, and balanced all day. Perfect for daily use.',
        'Our Moisturizing Lotion offers an unparalleled skincare experience, blending a unique combination of natural emollients and vitamins that penetrate deeply to provide intense hydration. This advanced formula not only moisturizes but also locks in essential moisture, ensuring that your skin remains hydrated for longer periods. It works to repair and strengthen the skin barrier, reducing dryness and flakiness while improving elasticity and smoothness. With its lightweight, non-greasy texture, the lotion is quickly absorbed, leaving no residue, making it ideal for daily use under makeup or on its own. It is suitable for all skin types, including sensitive skin, as it is free from irritants and harmful chemicals. Regular application will leave your skin feeling incredibly soft, smooth, and radiant, as well as visibly healthier. The infusion of vitamins such as Vitamin E and B5 supports the skin’s natural repair processes, enhancing its resilience against environmental stressors like pollution and UV rays. Additionally, this lotion’s soothing properties calm irritation and redness, making it perfect for use on sun-exposed or irritated skin. Whether you\'re dealing with dry patches or simply want to maintain a healthy glow, this lotion is an essential part of any skincare regimen.',
        12.50, 1, 150, 'images/product_2.jpg', 'Pink', 4.60, 7.50, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (3, 'Vitamin C Serum',
        'Vitamin C Serum brightens and reduces dark spots, promoting a radiant, youthful complexion. Ideal for daily use.',
        'Our Vitamin C Serum is a powerful treatment that brightens and rejuvenates your skin by targeting dark spots and uneven skin tone. This high-potency formula contains a stabilized form of Vitamin C, which is renowned for its antioxidant properties and ability to promote collagen synthesis. With regular use, this serum reduces the appearance of hyperpigmentation and evens out your skin tone, giving you a more luminous complexion. The Vitamin C in the serum also helps to protect your skin from environmental damage caused by free radicals, which can lead to premature aging. By boosting collagen production, the serum minimizes the appearance of fine lines and wrinkles, making your skin look firmer and more youthful. The lightweight, fast-absorbing formula ensures that the serum penetrates deeply into your skin, delivering potent ingredients where they are needed most. This serum is suitable for all skin types, including sensitive skin, and can be used daily as part of your skincare routine. Over time, you will notice a significant improvement in your skin’s texture, brightness, and overall health, making it an essential addition to your skincare arsenal.',
        25.00, 1, 80, 'images/product_3.jpg', 'Orange', 4.80, 5.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (4, 'Anti-Aging Cream',
        'Anti-Aging Cream reduces fine lines, hydrates skin, and improves texture for a youthful, radiant appearance.',
        'Our Anti-Aging Cream is an advanced skincare product that targets multiple signs of aging, providing comprehensive care for your skin. It contains a blend of potent anti-aging ingredients, including peptides, hyaluronic acid, and antioxidants, which work together to reduce the appearance of fine lines and wrinkles. These ingredients stimulate collagen production, improve skin elasticity, and help to firm and plump the skin, resulting in a smoother, more youthful appearance. The cream also deeply hydrates and nourishes the skin, restoring its natural moisture balance and enhancing its overall texture and tone. It is enriched with antioxidants that protect the skin from environmental stressors and free radical damage, which can accelerate the aging process. With regular use, you will notice a visible improvement in your skin’s firmness, radiance, and resilience. The lightweight, non-greasy formula absorbs quickly and can be used both day and night as part of your skincare routine. Suitable for all skin types, this cream is particularly beneficial for those concerned with fine lines, wrinkles, and loss of firmness. Experience the transformative power of our Anti-Aging Cream and reveal smoother, more youthful-looking skin.',
        30.00, 1, 60, 'images/product_4.jpg', 'White', 4.90, 15.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (5, 'Rose Water Toner',
        'Rose Water Toner balances pH, tightens pores, and hydrates skin. Suitable for all skin types.',
        'Our Rose Water Toner is a luxurious skincare essential that offers multiple benefits for your skin. Made from pure, distilled rose petals, this toner helps to balance your skin\'s natural pH levels, which is crucial for maintaining a healthy barrier and preventing acne breakouts. It has natural astringent properties that tighten and minimize the appearance of pores, giving your skin a smoother, more refined look. The toner also delivers a burst of hydration that instantly revitalizes dull and tired skin, leaving it feeling refreshed and rejuvenated. With its soothing and anti-inflammatory properties, rose water is perfect for calming irritated or sensitive skin. The delicate floral scent of rose water adds a touch of elegance to your skincare routine, making it a sensory delight as well. Regular use of this toner will improve your skin’s texture, tone, and overall radiance, making it an indispensable part of your daily regimen. Whether you use it as a refreshing mist throughout the day or as a preparatory step before applying your moisturizer, our Rose Water Toner will leave your skin looking and feeling its best. It is suitable for all skin types, including sensitive and acne-prone skin, and is free from alcohol, parabens, and artificial fragrances.',
        7.99, 1, 150, 'images/product_5.jpg', 'Pink', 4.80, 1.50, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (6, 'Cleansing Balm',
        'Cleansing Balm melts away makeup, nourishes, and leaves skin hydrated without greasy residue. Ideal for all types.',
        'Our Cleansing Balm is a luxurious skincare product that offers a superior cleansing experience. It is formulated with a blend of nourishing oils and emollients that work together to dissolve and remove all traces of makeup, dirt, and impurities from your skin. Unlike traditional cleansers, this balm transforms into a silky oil upon contact with the skin, allowing it to effortlessly break down even the most stubborn makeup, including waterproof mascara. The balm’s rich texture ensures that your skin is thoroughly cleansed without stripping away its natural oils, leaving it feeling soft, hydrated, and balanced. This product is perfect for those who prefer a gentle, yet effective, cleansing method that also provides skincare benefits. The balm is enriched with ingredients like shea butter, almond oil, and vitamin E, which nourish and soothe the skin while cleansing, making it ideal for all skin types, including sensitive skin. Its non-greasy formula rinses off easily, leaving no residue behind, and reveals a clean, refreshed complexion that is ready for the next steps in your skincare routine. Regular use of this Cleansing Balm will improve the texture and appearance of your skin, giving it a radiant, healthy glow. It is an essential product for anyone looking to maintain clear, hydrated, and well-nourished skin.',
        20.00, 1, 50, 'images/product_6.jpg', 'Yellow', 4.90, 2.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (7, 'Face Toner',
        'Face Toner balances, refreshes, and hydrates skin post-cleansing. Suitable for all skin types.',
        'Our Face Toner is an essential step in your skincare routine, designed to balance, refresh, and revitalize your skin after cleansing. This toner is formulated with a blend of natural extracts, including witch hazel, chamomile, and aloe vera, which work together to soothe and calm the skin, reducing redness and irritation. It helps to remove any remaining impurities or traces of cleanser, ensuring that your skin is perfectly prepped for the application of serums, moisturizers, and other skincare products. The toner’s astringent properties help to tighten pores, giving your skin a smoother and more refined appearance. Additionally, it provides a burst of hydration, leaving your skin feeling soft, supple, and rejuvenated. The lightweight, non-sticky formula absorbs quickly into the skin, making it suitable for use both morning and night. Whether you have oily, dry, or combination skin, this toner is designed to restore your skin’s natural pH balance and enhance its overall health and appearance. Regular use of our Face Toner will result in clearer, more radiant skin, as it helps to control excess oil, minimize breakouts, and improve skin texture. It is free from alcohol, parabens, and artificial fragrances, making it gentle enough for even the most sensitive skin types.',
        11.00, 1, 140, 'images/product_7.jpg', 'Blue', 4.70, 1.50, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (8, 'Shampoo',
        'Our Shampoo is formulated to cleanse and nourish your hair, leaving it soft, shiny, and manageable.',
        'Our Shampoo is not just a cleansing product; it is a comprehensive hair care solution designed to nourish and protect your hair. Enriched with a blend of natural ingredients, it works to remove impurities while ensuring that the hair retains its natural oils, which are essential for a healthy scalp and lustrous hair. This shampoo provides a luxurious lather that cleanses deeply, yet gently, making it suitable for daily use. It is formulated to strengthen the hair shaft, reduce breakage, and prevent split ends, resulting in hair that is stronger, more resilient, and full of life. Additionally, the shampoo is infused with essential vitamins and minerals that support hair growth and improve texture. Its invigorating scent provides a refreshing experience, turning your hair washing routine into a moment of relaxation and self-care. Over time, you’ll notice your hair becoming softer, shinier, and easier to manage, with a noticeable reduction in frizz and tangles. Whether you have straight, curly, thick, or fine hair, this shampoo is tailored to meet the needs of all hair types, making it a versatile addition to your hair care regimen.',
        12.99, 2, 120, 'images/product_8.jpg', 'Clear', 4.50, 2.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (9, 'Conditioner',
        'Shampoo cleanses gently while nourishing hair, leaving it soft, shiny, and healthy. Suitable for all types.',
        'Our Conditioner is a deeply moisturizing product that enhances the health and appearance of your hair with every use. Formulated with a blend of hydrating and nourishing ingredients, this conditioner works to restore moisture and repair damage caused by environmental factors, heat styling, and chemical treatments. It detangles the hair, making it easier to comb through, reducing breakage and split ends. The conditioner also smooths the hair cuticle, resulting in hair that is silky, shiny, and more manageable. It is suitable for all hair types, from fine and straight to thick and curly, and can be used daily for optimal results. The formula is enriched with essential oils and vitamins that penetrate deep into the hair shaft, providing long-lasting hydration and protection. Whether you have color-treated, chemically processed, or naturally dry hair, this conditioner will leave your hair looking and feeling healthier, stronger, and more vibrant. The lightweight texture ensures that it doesn’t weigh your hair down, making it perfect for daily use. Experience the transformative effects of our Conditioner and enjoy hair that is not only beautiful but also deeply nourished and protected.',
        14.50, 2, 100, 'images/product_9.jpg', 'White', 4.60, 3.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (10, 'Hair Mask', 'Our Hair Mask is a deep conditioning treatment that repairs and nourishes damaged hair.',
        'Our Hair Mask is an intensive treatment designed to repair and rejuvenate even the most damaged hair. This rich, creamy formula is infused with natural oils, proteins, and vitamins that penetrate deep into the hair shaft, providing intense hydration and nourishment. It works to restore the hair’s natural strength, elasticity, and shine, making it an essential part of any hair care regimen. The mask is particularly beneficial for hair that has been damaged by heat styling, coloring, or chemical treatments, as it helps to repair the hair’s structure from within. With regular use, this hair mask will transform your hair, making it softer, smoother, and more manageable. It also helps to reduce frizz and improve the overall texture of your hair, leaving it looking healthy and vibrant. The mask’s luxurious formula is easy to apply and rinse out, and it provides long-lasting results that you can see and feel. Whether you have dry, damaged, or color-treated hair, this hair mask will provide the care and attention your hair needs to look its best.',
        20.00, 2, 70, 'images/product_10.jpg', 'Pink', 4.70, 5.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (11, 'Hair Oil', 'Our Hair Oil is a nourishing blend of natural oils that strengthen and condition your hair.',
        'Our Hair Oil is a luxurious blend of natural oils that provides deep nourishment and protection for your hair. This oil is formulated to strengthen the hair shaft, reduce breakage, and enhance the overall health and appearance of your hair. It works to tame frizz, add shine, and improve manageability, making it an essential product for anyone looking to maintain healthy, beautiful hair. The lightweight, non-greasy formula is quickly absorbed into the hair and scalp, delivering vital nutrients where they are needed most. It also helps to protect your hair from environmental damage, such as pollution and UV rays, which can lead to dryness and brittleness. This oil is suitable for all hair types, from fine and straight to thick and curly, and can be used daily to maintain optimal hair health. Whether you use it as a leave-in treatment or as a pre-shampoo treatment, our Hair Oil will leave your hair feeling soft, smooth, and revitalized. The blend of oils, including argan, jojoba, and coconut oil, works synergistically to provide long-lasting hydration and nourishment, ensuring that your hair looks and feels its best every day.',
        18.00, 2, 80, 'images/product_11.jpg', 'Gold', 4.80, 4.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (12, 'Leave-In Conditioner',
        'Our Leave-In Conditioner is a lightweight formula that provides extra moisture and detangles your hair.',
        'Our Leave-In Conditioner is a versatile hair care product that provides long-lasting moisture and protection for your hair. This lightweight formula is designed to be applied after washing your hair, providing a protective barrier that locks in moisture and prevents dryness throughout the day. It also works to detangle your hair, making it easier to manage and style, while reducing the risk of breakage and split ends. The conditioner is enriched with nourishing ingredients, including natural oils and vitamins, that hydrate and repair the hair, leaving it soft, smooth, and shiny. Whether you have straight, curly, or wavy hair, this leave-in conditioner is suitable for all hair types and can be used daily to maintain healthy, beautiful hair. The non-greasy formula absorbs quickly, without weighing your hair down or leaving any residue, making it ideal for use on both wet and dry hair. It also provides heat protection, making it a great choice for those who regularly use heat styling tools. With regular use, our Leave-In Conditioner will improve the overall health and appearance of your hair, leaving it looking and feeling its best.',
        13.00, 2, 150, 'images/product_12.jpg', 'White', 4.50, 2.50, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (13, 'Scalp Treatment',
        'Our Scalp Treatment is a soothing formula that revitalizes your scalp and promotes healthy hair growth.',
        'Our Scalp Treatment is an advanced formula designed to promote a healthy scalp and encourage hair growth. This treatment is enriched with natural ingredients that work to soothe and nourish the scalp, reducing dryness, flakiness, and irritation. The lightweight formula is quickly absorbed into the scalp, delivering essential nutrients that support healthy hair growth and improve the overall condition of your hair. Regular use of this treatment helps to balance the scalp’s natural oil production, preventing both excess oiliness and dryness. It also stimulates blood circulation to the hair follicles, promoting stronger, thicker hair growth. Whether you are dealing with dandruff, an itchy scalp, or thinning hair, this scalp treatment provides the care and attention your scalp needs to thrive. The formula is free from harsh chemicals, sulfates, and parabens, making it gentle enough for daily use. Incorporate this treatment into your hair care routine to maintain a healthy scalp and achieve beautiful, healthy hair.',
        16.00, 2, 90, 'images/product_13.jpg', 'Green', 4.60, 3.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (14, 'Volumizing Spray',
        'Volumizing Spray adds body and lift, creating fuller hair with a natural look. Suitable for daily use.',
        'Our Volumizing Spray is a must-have product for anyone looking to add volume and body to fine or limp hair. This spray is formulated with lightweight ingredients that lift your hair from the roots, creating a fuller, thicker appearance that lasts all day. The spray provides a natural-looking boost without weighing your hair down or leaving it sticky or stiff. It is easy to apply and works quickly to give your hair the lift it needs, making it perfect for both everyday use and special occasions. The formula also helps to improve the overall texture of your hair, leaving it soft, smooth, and manageable. Whether you have straight, wavy, or curly hair, this volumizing spray is suitable for all hair types and can be used on both wet and dry hair. It also provides heat protection, making it a great addition to your hair care routine if you regularly use blow dryers or styling tools. With regular use, you will notice a significant improvement in the volume and body of your hair, giving you the confidence to rock any hairstyle with ease.',
        11.50, 2, 110, 'images/product_14.jpg', 'Clear', 4.40, 2.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (15, 'Foundation',
        'Foundation provides full coverage with a smooth, lightweight finish for a flawless look. Available in shades.',
        'Our Foundation is a high-performance makeup product that provides full coverage with a natural, flawless finish. The lightweight, smooth texture blends effortlessly into the skin, evening out your complexion and concealing imperfections without feeling heavy or cakey. The foundation is available in a wide range of shades to match all skin tones, ensuring that you find the perfect match for your unique complexion. It is formulated to provide long-lasting coverage, keeping your skin looking fresh and radiant throughout the day. The foundation also contains skin-nourishing ingredients that hydrate and protect your skin, making it suitable for all skin types, including dry, oily, and combination skin. Whether you\'re looking for a foundation for everyday wear or a special occasion, this product delivers a beautiful, natural finish that enhances your skin\'s natural beauty. With its buildable coverage, you can customize your look, from a sheer, natural finish to full coverage, depending on your preference. The foundation is also free from parabens, sulfates, and artificial fragrances, making it a safe and gentle choice for your skin. Achieve a flawless complexion with our Foundation and enjoy beautiful, radiant skin every day.',
        25.00, 3, 150, 'images/product_15.jpg', 'Beige', 4.60, 5.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (16, 'Mascara', 'Mascara adds volume and length, keeping lashes curled and defined. Suitable for daily use.',
        'Our Mascara is a must-have for anyone looking to enhance the natural beauty of their lashes. This mascara is formulated to provide both volume and length, giving your lashes a fuller, more dramatic appearance. The special formula ensures that your lashes stay curled and defined throughout the day, without smudging or flaking. The mascara is easy to apply, with a precision brush that coats each lash evenly, from root to tip. It is perfect for daily use, whether you\'re going for a natural look or something more glamorous. The mascara is also enriched with conditioning ingredients that nourish and protect your lashes, keeping them healthy and strong. With its long-lasting formula, you can enjoy beautiful, voluminous lashes all day long. Whether you have short, sparse lashes or long, thick ones, this mascara is suitable for all lash types and provides the perfect finishing touch to any makeup look. Experience the transformative power of our Mascara and enjoy lashes that are fuller, longer, and more defined.',
        18.00, 3, 120, 'images/product_16.jpg', 'Black', 4.70, 3.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (17, 'Lipstick',
        'Lipstick delivers intense color with a creamy finish, hydrating lips for a bold, beautiful look.',
        'Our Lipstick is a luxurious makeup product that offers rich, intense color with a smooth, creamy finish. The formula is enriched with hydrating ingredients that keep your lips soft, supple, and moisturized throughout the day. Available in a wide range of shades, from bold reds to subtle nudes, this lipstick is perfect for any occasion, whether you\'re going for a dramatic look or a natural one. The lipstick glides on smoothly, providing full coverage with just one swipe, and the long-lasting formula ensures that your color stays vibrant and fresh all day long. It is also infused with antioxidants that protect your lips from environmental damage, making it a great choice for those who want both beauty and skincare benefits in one product. The lipstick is free from parabens, sulfates, and artificial fragrances, making it a safe and gentle choice for your lips. Whether you\'re heading to the office, a night out, or a special event, our Lipstick will give you the confidence to rock any look with ease. Experience the rich, bold color and smooth finish of our Lipstick and enjoy lips that are as beautiful as they are healthy.',
        15.00, 3, 200, 'images/product_17.jpg', 'Red', 4.80, 2.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (18, 'Blush', 'Blush adds a natural, radiant glow to cheeks with buildable color. Available in multiple shades.',
        'Our Blush is a beautifully crafted makeup product that adds a natural, healthy glow to your cheeks. The formula is designed to blend seamlessly into your skin, creating a soft, radiant complexion that looks fresh and youthful. Available in a range of shades, from soft pinks to deeper tones, this blush is suitable for all skin types and can be customized to suit your desired look. Whether you\'re going for a subtle hint of color or a more dramatic flush, this blush provides buildable coverage that can be layered to achieve your perfect shade. The lightweight, silky texture ensures that the blush applies smoothly and evenly, without caking or settling into fine lines. It is also enriched with skin-loving ingredients that nourish and protect your skin, making it a great addition to your daily makeup routine. The long-lasting formula ensures that your color stays vibrant and fresh throughout the day, giving you a beautiful, radiant glow that lasts. Whether you\'re heading to work, a social event, or just enjoying a day out, our Blush will enhance your natural beauty and leave you looking and feeling your best.',
        22.00, 3, 140, 'images/product_18.jpg', 'Pink', 4.50, 3.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (19, 'Eyeshadow Palette',
        'Our Eyeshadow Palette features a variety of shades that allow you to create versatile and stunning eye looks.',
        'Our Eyeshadow Palette is a versatile makeup product that offers a wide range of shades to create stunning eye looks for any occasion. The palette includes a mix of matte, shimmer, and metallic shades, allowing you to experiment with different textures and finishes. Each shade is highly pigmented, ensuring vibrant, long-lasting color that stays true throughout the day. The smooth, blendable formula makes it easy to apply and layer the shades, whether you\'re going for a subtle daytime look or a bold, dramatic evening look. The palette is designed to suit all skin tones and eye colors, making it a must-have in any makeup collection. The eyeshadows are also enriched with nourishing ingredients that care for the delicate skin around your eyes, ensuring that your makeup not only looks beautiful but also feels comfortable to wear. The compact, travel-friendly design of the palette makes it easy to take with you wherever you go, so you can touch up your look anytime, anywhere. Whether you\'re a makeup novice or a seasoned pro, our Eyeshadow Palette will inspire your creativity and help you achieve flawless, eye-catching looks with ease.',
        30.00, 3, 100, 'images/product_19.jpg', 'Mixed', 4.60, 5.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (20, 'Eyeliner',
        'Our Eyeliner is a precise and easy-to-use formula that helps you define your eyes with accuracy.',
        'Our Eyeliner is a high-precision makeup product that allows you to create bold, defined lines with ease. The formula is designed to glide smoothly across your eyelids, delivering intense color that stays put throughout the day without smudging or fading. Whether you prefer a subtle, natural line or a dramatic, winged look, this eyeliner provides the control and flexibility you need to achieve your desired style. The fine tip of the eyeliner ensures that you can create sharp, precise lines with minimal effort, making it suitable for both beginners and makeup experts. The long-lasting formula is resistant to water and humidity, ensuring that your eye makeup stays flawless from morning to night. It is also enriched with conditioning ingredients that care for the delicate skin around your eyes, making it comfortable to wear all day long. Whether you\'re heading to the office, a night out, or a special event, our Eyeliner will help you achieve a stunning eye look that enhances your natural beauty. Experience the ease and precision of our Eyeliner and enjoy beautifully defined eyes that make a statement.',
        12.00, 3, 180, 'images/product_20.jpg', 'Black', 4.40, 1.50, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (21, 'Setting Spray',
        'Our Setting Spray is a lightweight formula that helps to set your makeup and extend its wear throughout the day.',
        'Our Setting Spray is a must-have makeup product that locks in your look and keeps your makeup fresh and flawless all day long. This lightweight, fine mist is designed to create a protective barrier over your makeup, preventing it from smudging, fading, or melting away, even in humid or hot conditions. The setting spray is suitable for all skin types and works to enhance the longevity of your makeup, ensuring that it stays in place from morning to night. It also helps to minimize the appearance of pores and control excess shine, giving your skin a smooth, matte finish. The formula is infused with skin-loving ingredients that hydrate and soothe your skin, making it comfortable to wear all day. Whether you\'re heading to a special event, a night out, or just want to ensure your makeup stays put during a busy day, our Setting Spray is the perfect finishing touch to your makeup routine. Simply spritz it over your completed makeup look for a long-lasting, fresh finish that enhances your natural beauty. Experience the confidence of knowing your makeup will stay flawless all day with our Setting Spray.',
        20.00, 3, 130, 'images/product_21.jpg', 'Clear', 4.70, 2.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (22, 'Multivitamins',
        'Our Multivitamins provide a comprehensive blend of essential vitamins and minerals to support your overall health.',
        'Our Multivitamins are a comprehensive dietary supplement designed to support your overall health and wellbeing. Each tablet contains a carefully balanced blend of essential vitamins and minerals that are vital for maintaining good health. These multivitamins are formulated to meet the nutritional needs of adults, providing key nutrients that may be missing from your diet. They help to boost your immune system, improve energy levels, and support the health of your skin, hair, and nails. Regular intake of these multivitamins can help to fill nutritional gaps, ensuring that your body gets the nutrients it needs to function at its best. The formula is designed to be easily absorbed by the body, making it an effective way to maintain your health and vitality. Whether you have a busy lifestyle, a restrictive diet, or just want to ensure you\'re getting the nutrients you need, our Multivitamins are a convenient and effective solution. They are free from artificial colors, flavors, and preservatives, making them a safe and healthy choice for daily supplementation. Take them daily to support your health and wellbeing and enjoy the peace of mind that comes with knowing you\'re giving your body the nutrients it needs to thrive.',
        29.99, 4, 200, 'images/product_22.jpg', 'Yellow', 4.70, 5.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (23, 'Omega-3 Fish Oil',
        'Our Omega-3 Fish Oil is rich in essential fatty acids that support heart health and brain function.',
        'Our Omega-3 Fish Oil is a high-quality dietary supplement that provides essential fatty acids that are vital for maintaining your overall health. These fatty acids, particularly EPA and DHA, are known to support heart health by helping to reduce inflammation, lower triglyceride levels, and maintain healthy blood pressure. Omega-3s are also crucial for brain function, as they contribute to cognitive health and may help to reduce the risk of cognitive decline as you age. Our fish oil is sourced from high-quality fish and undergoes a rigorous purification process to remove any impurities, including heavy metals and toxins, ensuring that you receive a pure and potent product. The capsules are easy to swallow and have a neutral taste, making them convenient for daily use. Regular intake of Omega-3 Fish Oil can also support joint health, reduce inflammation, and improve skin health, making it a comprehensive supplement for overall wellbeing. Whether you\'re looking to support your heart, brain, or overall health, our Omega-3 Fish Oil is an essential addition to your daily routine. Take it daily to enjoy the numerous health benefits of this powerful supplement.',
        22.50, 4, 150, 'images/product_23.jpg', 'Clear', 4.80, 4.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (24, 'Probiotics', 'Our Probiotics contain a blend of beneficial bacteria that support your digestive health.',
        'Our Probiotics are a powerful dietary supplement designed to support your digestive health by promoting a healthy balance of good bacteria in your gut. This blend of beneficial bacteria helps to improve your gut flora, which is essential for proper digestion, nutrient absorption, and overall health. By maintaining a healthy balance of gut bacteria, probiotics can help to reduce the risk of digestive issues such as bloating, gas, and constipation. They also support your immune system, as a significant portion of your immune function is located in the gut. Regular intake of probiotics can help to enhance your body\'s natural defenses and improve your overall wellbeing. Our probiotics are formulated to survive the harsh conditions of the stomach, ensuring that they reach the intestines where they are most effective. They are free from artificial colors, flavors, and preservatives, making them a safe and healthy choice for daily supplementation. Whether you have a sensitive digestive system or just want to maintain your gut health, our Probiotics are a convenient and effective solution. Take them daily to support a healthy digestive system and enjoy the benefits of a balanced gut microbiome.',
        19.99, 4, 180, 'images/product_24.jpg', 'White', 4.60, 3.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (25, 'Vitamin D3',
        'Vitamin D3 supports bone health, immunity, and mood. Essential for maintaining healthy bones.',
        'Our Vitamin D3 supplements are a crucial part of any health regimen, providing the essential nutrient that supports bone health and immune function. Vitamin D3 is necessary for the absorption of calcium, which is vital for maintaining strong and healthy bones. Without sufficient vitamin D3, your body cannot effectively absorb calcium, leading to weakened bones and an increased risk of fractures. In addition to its role in bone health, vitamin D3 also plays a key role in supporting your immune system, helping to protect you from infections and illnesses. Our Vitamin D3 supplements are formulated to be easily absorbed by the body, ensuring that you get the maximum benefit from each dose. They are free from artificial colors, flavors, and preservatives, making them a safe and healthy choice for daily supplementation. Whether you have limited sun exposure, a restrictive diet, or just want to ensure you\'re getting enough vitamin D3, our supplements are a convenient and effective solution. Take them daily to support your overall health and wellbeing and enjoy the peace of mind that comes with knowing you\'re giving your body the nutrients it needs to thrive.',
        15.00, 4, 200, 'images/product_25.jpg', 'Yellow', 4.50, 2.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (26, 'Magnesium Complex',
        'Our Magnesium Complex supplements provide a blend of magnesium that supports muscle and nerve function.',
        'Our Magnesium Complex supplements are a comprehensive solution for supporting muscle and nerve function, as well as overall health. Magnesium is an essential mineral that plays a crucial role in energy production, muscle contraction, and nerve transmission. It also helps to maintain healthy bones by regulating calcium absorption and supporting bone density. Our Magnesium Complex provides a blend of different forms of magnesium, ensuring optimal absorption and effectiveness. Whether you have a physically demanding lifestyle, experience muscle cramps, or just want to maintain your overall health, our Magnesium Complex supplements are a convenient and effective solution. They are free from artificial colors, flavors, and preservatives, making them a safe and healthy choice for daily supplementation. Take them daily to support your energy levels, muscle function, and bone health, and enjoy the peace of mind that comes with knowing you\'re giving your body the essential nutrients it needs to thrive.',
        18.00, 4, 160, 'images/product_26.jpg', 'White', 4.70, 2.50, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (27, 'Turmeric Curcumin',
        'Our Turmeric Curcumin supplements provide natural anti-inflammatory support with turmeric. Curcumin.',
        'Our Turmeric Curcumin supplements are a powerful natural solution for supporting joint health and reducing inflammation. Curcumin, the active ingredient in turmeric, is known for its potent anti-inflammatory and antioxidant properties. It helps to reduce inflammation in the body, which can be beneficial for those with joint pain, arthritis, or other inflammatory conditions. Curcumin also helps to protect your cells from damage caused by free radicals, supporting overall health and wellbeing. Our Turmeric Curcumin supplements are formulated with a high concentration of curcumin, ensuring maximum effectiveness. They are also enhanced with black pepper extract, which has been shown to improve the absorption of curcumin in the body. Whether you\'re looking to support your joint health, reduce inflammation, or simply boost your overall health, our Turmeric Curcumin supplements are a convenient and effective solution. They are free from artificial colors, flavors, and preservatives, making them a safe and healthy choice for daily supplementation. Take them daily to enjoy the numerous health benefits of this powerful natural supplement.',
        27.00, 4, 140, 'images/product_27.jpg', 'Orange', 4.80, 3.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (28, 'Protein Powder',
        'Our Protein Powder provides high-quality protein that supports muscle recovery and growth.',
        'Our Protein Powder is a high-quality dietary supplement that provides the essential protein your body needs to support muscle recovery and growth. This protein powder is formulated with a blend of essential amino acids that help to repair and build muscle tissue, making it the perfect post-workout supplement for athletes and fitness enthusiasts. The protein in our powder is easily absorbed by the body, ensuring that your muscles get the nutrients they need to recover quickly and effectively. Whether you\'re looking to build muscle, improve your athletic performance, or simply maintain a healthy diet, our Protein Powder is a convenient and effective solution. It is available in a variety of flavors, making it easy to incorporate into your daily routine. The powder is also free from artificial colors, flavors, and preservatives, making it a safe and healthy choice for daily supplementation. Take it after your workouts or as a meal replacement to support your fitness goals and enjoy the benefits of a strong, healthy body.',
        35.00, 4, 110, 'images/product_28.jpg', 'Chocolate', 4.60, 5.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (29, 'Iron Supplements', 'Our Iron Supplements help to maintain healthy iron levels in your blood.',
        'Our Iron Supplements are a crucial part of any health regimen, providing the essential nutrient that supports oxygen transport and energy production. Iron is a vital nutrient that plays a key role in maintaining healthy red blood cells, which are responsible for carrying oxygen throughout your body. Without sufficient iron, your body cannot produce enough hemoglobin, leading to fatigue, weakness, and other symptoms of anemia. Our Iron Supplements are formulated to be easily absorbed by the body, ensuring that you get the maximum benefit from each dose. They are free from artificial colors, flavors, and preservatives, making them a safe and healthy choice for daily supplementation. Whether you have a restrictive diet, are pregnant, or just want to ensure you\'re getting enough iron, our supplements are a convenient and effective solution. Take them daily to support your overall health and wellbeing and enjoy the peace of mind that comes with knowing you\'re giving your body the nutrients it needs to thrive.',
        21.00, 4, 130, 'images/product_29.jpg', 'Red', 4.40, 3.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (30, 'Body Lotion', 'Our Body Lotion is a rich and creamy formula that provides deep hydration for your skin.',
        'Our Body Lotion is a luxurious skincare product that offers deep hydration and nourishment for your skin. The rich, creamy formula is infused with nourishing ingredients that penetrate deeply into the skin, providing long-lasting moisture and softness. This lotion is perfect for all skin types, from dry to sensitive, and can be used daily to maintain healthy, hydrated skin. It also helps to improve the texture and appearance of your skin, leaving it smooth, supple, and radiant. The lightweight formula absorbs quickly, without leaving a greasy residue, making it ideal for use after a shower or bath. Whether you\'re dealing with dry patches or simply want to maintain a healthy glow, our Body Lotion is an essential part of any skincare regimen. It is also free from parabens, sulfates, and artificial fragrances, making it a safe and gentle choice for your skin. Treat your skin to the hydration and care it deserves with our Body Lotion and enjoy soft, smooth, and beautiful skin every day.',
        24.00, 5, 130, 'images/product_30.jpg', 'White', 4.60, 3.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (31, 'Body Scrub',
        'Our Body Scrub is an exfoliating formula that removes dead skin cells and leaves your skin smooth.',
        'Our Body Scrub is a luxurious exfoliating product that provides a spa-like experience in the comfort of your own home. This scrub is formulated with natural exfoliants, such as sugar or salt, that gently buff away dead skin cells, revealing a smoother, more radiant complexion. The rich, creamy formula is also infused with nourishing oils and butters that moisturize and soften your skin, leaving it feeling silky smooth and hydrated. This scrub is suitable for all skin types, from dry to sensitive, and can be used once or twice a week to maintain healthy, glowing skin. The exfoliating action of the scrub helps to improve circulation, reduce the appearance of cellulite, and promote the regeneration of new skin cells. The invigorating scent of the scrub also provides a refreshing and uplifting experience, making it a perfect addition to your self-care routine. Whether you use it in the shower or as part of a luxurious bath, our Body Scrub will leave your skin feeling soft, smooth, and rejuvenated.',
        22.00, 5, 140, 'images/product_31.jpg', 'Pink', 4.70, 2.50, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (32, 'Body Wash', 'Our Body Wash is a gentle formula that cleanses and nourishes your skin.',
        'Our Body Wash is a gentle yet effective cleansing product that provides a refreshing and invigorating shower experience. This body wash is formulated with natural ingredients that cleanse your skin without stripping away its natural moisture, leaving it feeling soft, smooth, and hydrated. The rich, luxurious lather washes away dirt, oil, and impurities, while the nourishing ingredients work to moisturize and protect your skin. This body wash is suitable for all skin types, including sensitive skin, and can be used daily to maintain healthy, beautiful skin. The refreshing scent of the body wash provides an uplifting experience that awakens your senses and leaves you feeling energized. Whether you use it in the morning to start your day or in the evening to unwind, our Body Wash is an essential part of any skincare routine. Treat your skin to the gentle care it deserves with our Body Wash and enjoy the feeling of clean, refreshed, and nourished skin every day.',
        18.00, 5, 150, 'images/product_32.jpg', 'Clear', 4.50, 3.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (33, 'Hand Cream', 'Our Hand Cream is a rich and nourishing formula that keeps your hands soft and hydrated.',
        'Our Hand Cream is a luxurious skincare product that provides deep hydration and nourishment for your hands. This rich, creamy formula is infused with natural moisturizers, such as shea butter and jojoba oil, that penetrate deeply into the skin, providing long-lasting moisture and protection. This hand cream is perfect for all skin types, from dry to sensitive, and can be used daily to maintain soft, smooth, and beautiful hands. It also helps to improve the texture and appearance of your skin, leaving it feeling smooth, supple, and radiant. The lightweight formula absorbs quickly, without leaving a greasy residue, making it ideal for use throughout the day. Whether you\'re dealing with dry, chapped hands or just want to maintain healthy, hydrated skin, our Hand Cream is an essential part of any skincare regimen. It is also free from parabens, sulfates, and artificial fragrances, making it a safe and gentle choice for your skin. Treat your hands to the hydration and care they deserve with our Hand Cream and enjoy soft, smooth, and beautiful skin every day.',
        15.00, 5, 160, 'images/product_33.jpg', 'White', 4.60, 2.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (34, 'Body Oil',
        'Our Body Oil is a luxurious formula that provides deep hydration and leaves your skin with a healthy glow.',
        'Our Body Oil is a luxurious skincare product that offers deep hydration and nourishment for your skin. The rich, silky formula is infused with a blend of nourishing oils, such as argan oil and jojoba oil, that penetrate deeply into the skin, providing long-lasting moisture and softness. This body oil is perfect for all skin types, from dry to sensitive, and can be used daily to maintain healthy, hydrated skin. It also helps to improve the texture and appearance of your skin, leaving it smooth, supple, and radiant. The lightweight formula absorbs quickly, without leaving a greasy residue, making it ideal for use after a shower or bath. Whether you\'re dealing with dry patches or simply want to maintain a healthy glow, our Body Oil is an essential part of any skincare regimen. It is also free from parabens, sulfates, and artificial fragrances, making it a safe and gentle choice for your skin. Treat your skin to the hydration and care it deserves with our Body Oil and enjoy soft, smooth, and beautiful skin every day.',
        30.00, 5, 120, 'images/product_34.jpg', 'Golden', 4.80, 4.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (35, 'After-Sun Lotion',
        'Our After-Sun Lotion is a cooling and soothing formula that helps to hydrate your skin.',
        'Our After-Sun Lotion is a must-have skincare product for anyone who spends time in the sun. This cooling and soothing formula is designed to relieve sunburn and hydrate your skin after sun exposure, helping to reduce redness and inflammation. The lotion is infused with natural ingredients, such as aloe vera and chamomile, that calm and soothe the skin, leaving it feeling refreshed and comfortable. This after-sun lotion is suitable for all skin types, including sensitive skin, and can be used daily to maintain healthy, hydrated skin. The lightweight formula absorbs quickly, without leaving a greasy residue, making it ideal for use after a day at the beach or pool. Whether you\'re dealing with sunburn or just want to keep your skin healthy and hydrated, our After-Sun Lotion is an essential part of any skincare regimen. It is also free from parabens, sulfates, and artificial fragrances, making it a safe and gentle choice for your skin. Treat your skin to the care it deserves with our After-Sun Lotion and enjoy soft, smooth, and beautiful skin every day.',
        25.00, 5, 130, 'images/product_35.jpg', 'White', 4.80, 4.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (36, 'Lavender Oil', 'Our Lavender Oil is a soothing essential oil that promotes relaxation and calm.',
        'Our Lavender Oil is a premium essential oil that offers a wide range of benefits for both the mind and body. This soothing oil is perfect for aromatherapy, helping to promote relaxation, reduce stress, and improve sleep quality. The calming scent of lavender is known to have a positive effect on the nervous system, making it an excellent choice for those dealing with anxiety or insomnia. In addition to its aromatherapeutic benefits, lavender oil is also a powerful skincare ingredient that can be used to soothe and heal the skin. It has anti-inflammatory and antimicrobial properties that make it ideal for treating minor cuts, burns, and insect bites, as well as for calming irritated or acne-prone skin. Our Lavender Oil is 100% pure and natural, ensuring that you receive the highest quality product with every use. Whether you use it in a diffuser, add it to your bath, or apply it directly to your skin, our Lavender Oil is a versatile and valuable addition to your wellness routine. Experience the calming and healing power of lavender with our Lavender Oil and enjoy a sense of peace and wellbeing every day.',
        18.00, 6, 150, 'images/product_36.jpg', 'Purple', 4.80, 2.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (37, 'Peppermint Oil',
        'Our Peppermint Oil is a refreshing essential oil that promotes mental clarity and focus.',
        'Our Peppermint Oil is a high-quality essential oil that offers a refreshing and invigorating experience for both the mind and body. The crisp, cool scent of peppermint is known to promote mental clarity, improve focus, and increase energy levels, making it an excellent choice for aromatherapy. Whether you\'re feeling sluggish or need a mental boost, our Peppermint Oil can help to awaken your senses and keep you sharp throughout the day. In addition to its cognitive benefits, peppermint oil is also a valuable skincare ingredient that can be used to soothe and cool the skin. It has anti-inflammatory and analgesic properties that make it ideal for relieving muscle pain, headaches, and minor skin irritations. Our Peppermint Oil is 100% pure and natural, ensuring that you receive the highest quality product with every use. Whether you use it in a diffuser, add it to your bath, or apply it directly to your skin, our Peppermint Oil is a versatile and valuable addition to your wellness routine. Experience the refreshing and energizing power of peppermint with our Peppermint Oil and enjoy a sense of vitality and wellbeing every day.',
        20.00, 6, 140, 'images/product_37.jpg', 'Green', 4.70, 3.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (38, 'Eucalyptus Oil',
        'Our Eucalyptus Oil is a cleansing essential oil that supports respiratory health and wellbeing.',
        'Our Eucalyptus Oil is a premium essential oil that offers powerful benefits for both the mind and body. The invigorating scent of eucalyptus is known to support respiratory health, making it an excellent choice for aromatherapy. Whether you\'re dealing with congestion, allergies, or a cold, our Eucalyptus Oil can help to clear your airways and improve breathing, allowing you to feel more comfortable and breathe easier. In addition to its respiratory benefits, eucalyptus oil is also a valuable skincare ingredient that can be used to purify and refresh the skin. It has antiseptic and antimicrobial properties that make it ideal for treating minor cuts, wounds, and skin irritations, as well as for clearing acne and blemishes. Our Eucalyptus Oil is 100% pure and natural, ensuring that you receive the highest quality product with every use. Whether you use it in a diffuser, add it to your bath, or apply it directly to your skin, our Eucalyptus Oil is a versatile and valuable addition to your wellness routine. Experience the cleansing and revitalizing power of eucalyptus with our Eucalyptus Oil and enjoy a sense of health and wellbeing every day.',
        22.00, 6, 130, 'images/product_38.jpg', 'Clear', 4.60, 2.50, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (39, 'Tea Tree Oil',
        'Our Tea Tree Oil is a powerful antiseptic essential oil that promotes healthy skin and hair.',
        'Our Tea Tree Oil is a potent essential oil that offers a wide range of benefits for both the mind and body. The powerful antiseptic and antimicrobial properties of tea tree oil make it an excellent choice for promoting healthy skin and hair. Whether you\'re dealing with acne, dandruff, or other skin conditions, our Tea Tree Oil can help to purify and cleanse your skin and scalp, leaving them feeling fresh and revitalized. In addition to its skincare benefits, tea tree oil is also a valuable aromatherapy ingredient that can be used to purify the air and promote a sense of wellbeing. The invigorating scent of tea tree oil is known to have a positive effect on the mind, helping to reduce stress and improve focus. Our Tea Tree Oil is 100% pure and natural, ensuring that you receive the highest quality product with every use. Whether you use it in a diffuser, add it to your bath, or apply it directly to your skin, our Tea Tree Oil is a versatile and valuable addition to your wellness routine. Experience the cleansing and healing power of tea tree with our Tea Tree Oil and enjoy a sense of health and wellbeing every day.',
        25.00, 6, 120, 'images/product_39.jpg', 'Yellow', 4.80, 3.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (40, 'Frankincense Oil',
        'Our Frankincense Oil is a rejuvenating essential oil that promotes healthy and youthful skin.',
        'Our Frankincense Oil is a luxurious essential oil that offers powerful benefits for both the mind and body. The rejuvenating properties of frankincense make it an excellent choice for promoting healthy and youthful skin. Whether you\'re dealing with wrinkles, fine lines, or other signs of aging, our Frankincense Oil can help to reduce their appearance and improve the overall texture and tone of your skin. In addition to its skincare benefits, frankincense oil is also a valuable aromatherapy ingredient that can be used to promote a sense of calm and wellbeing. The soothing scent of frankincense is known to have a positive effect on the mind, helping to reduce stress and improve focus. Our Frankincense Oil is 100% pure and natural, ensuring that you receive the highest quality product with every use. Whether you use it in a diffuser, add it to your bath, or apply it directly to your skin, our Frankincense Oil is a versatile and valuable addition to your wellness routine. Experience the rejuvenating and healing power of frankincense with our Frankincense Oil and enjoy a sense of health and wellbeing every day.',
        30.00, 6, 110, 'images/product_40.jpg', 'Golden', 4.90, 4.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (41, 'Ylang Ylang Oil',
        'Our Ylang Ylang Oil is a sensual essential oil that promotes relaxation and mood enhancement.',
        'Our Ylang Ylang Oil is a premium essential oil that offers powerful benefits for both the mind and body. The sensual, floral scent of ylang ylang is known to promote relaxation, reduce stress, and enhance mood, making it an excellent choice for aromatherapy. Whether you\'re feeling anxious, stressed, or just want to create a calming atmosphere, our Ylang Ylang Oil can help to promote a sense of calm and wellbeing. In addition to its aromatherapeutic benefits, ylang ylang oil is also a valuable skincare ingredient that can be used to balance and hydrate the skin. It has anti-inflammatory and antibacterial properties that make it ideal for treating acne, balancing oil production, and improving the overall texture and tone of your skin. Our Ylang Ylang Oil is 100% pure and natural, ensuring that you receive the highest quality product with every use. Whether you use it in a diffuser, add it to your bath, or apply it directly to your skin, our Ylang Ylang Oil is a versatile and valuable addition to your wellness routine. Experience the calming and healing power of ylang ylang with our Ylang Ylang Oil and enjoy a sense of health and wellbeing every day.',
        28.00, 6, 120, 'images/product_41.jpg', 'Yellow', 4.80, 4.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (42, 'Whitening Toothpaste',
        'Our Whitening Toothpaste is a powerful formula that removes stains and whitens your teeth.',
        'Our Whitening Toothpaste is a high-performance oral care product that provides powerful stain removal and whitening benefits. This toothpaste is formulated with gentle abrasives that polish the surface of your teeth, removing surface stains and revealing a brighter, whiter smile. In addition to its whitening benefits, our toothpaste also helps to protect your teeth from cavities and plaque buildup, promoting overall oral health. The fresh, minty flavor leaves your mouth feeling clean and refreshed, making it a pleasure to use every day. Whether you\'re looking to remove stains from coffee, tea, or tobacco, or just want to maintain a bright smile, our Whitening Toothpaste is a safe and effective solution. It is free from harsh chemicals, artificial flavors, and preservatives, making it a gentle choice for daily use. Use it as part of your daily oral care routine to maintain a healthy, beautiful smile that you can be proud of.',
        12.00, 5, 150, 'images/product_42.jpg', 'White', 4.50, 2.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (43, 'Mouthwash', 'Our Mouthwash is a refreshing formula that helps to maintain fresh breath and oral hygiene.',
        'Our Mouthwash is a high-performance oral care product that provides powerful antimicrobial benefits to maintain fresh breath and oral hygiene. This mouthwash is formulated with active ingredients that kill bacteria and prevent plaque buildup, helping to protect your teeth and gums from decay and disease. The refreshing mint flavor leaves your mouth feeling clean and fresh, making it a pleasure to use every day. Whether you\'re looking to maintain fresh breath or enhance your oral hygiene routine, our Mouthwash is a safe and effective solution. It is free from alcohol, artificial flavors, and preservatives, making it a gentle choice for daily use. Use it as part of your daily oral care routine to maintain a healthy, beautiful smile that you can be proud of.',
        15.00, 5, 130, 'images/product_43.jpg', 'Blue', 4.60, 2.50, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (44, 'Fluoride Toothpaste',
        'Our Fluoride Toothpaste is a protective formula that helps to prevent cavities and tooth decay.',
        'Our Fluoride Toothpaste is a high-performance oral care product that provides powerful protection against cavities and tooth decay. This toothpaste is formulated with fluoride, a mineral that strengthens your tooth enamel and protects against acid erosion, helping to keep your teeth strong and healthy. In addition to its protective benefits, our toothpaste also helps to remove plaque and freshen your breath, promoting overall oral health. The fresh, minty flavor leaves your mouth feeling clean and refreshed, making it a pleasure to use every day. Whether you\'re looking to prevent cavities or just want to maintain a healthy smile, our Fluoride Toothpaste is a safe and effective solution. It is free from harsh chemicals, artificial flavors, and preservatives, making it a gentle choice for daily use. Use it as part of your daily oral care routine to maintain a healthy, beautiful smile that you can be proud of.',
        10.00, 5, 140, 'images/product_44.jpg', 'White', 4.70, 1.50, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (45, 'Electric Toothbrush',
        'Our Electric Toothbrush is a high-performance toothbrush that offers multiple cleaning modes to suit your oral care needs.',
        'Our Electric Toothbrush is a state-of-the-art oral care product that provides a superior cleaning experience. This toothbrush is equipped with advanced technology that offers multiple cleaning modes, allowing you to customize your brushing experience to suit your oral care needs. The powerful yet gentle brush head removes plaque and promotes healthy gums, helping to protect your teeth from cavities and gum disease. The ergonomic design of the toothbrush makes it comfortable to use, while the long-lasting battery ensures that you can enjoy a thorough clean every time. Whether you\'re looking to improve your oral hygiene routine or just want to maintain a healthy smile, our Electric Toothbrush is a safe and effective solution. It is free from harsh chemicals, artificial flavors, and preservatives, making it a gentle choice for daily use. Use it as part of your daily oral care routine to maintain a healthy, beautiful smile that you can be proud of.',
        60.00, 5, 120, 'images/product_45.jpg', 'Black', 4.80, 10.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (46, 'Dental Floss',
        'Our Dental Floss is a mint-flavored formula that provides effective interdental cleaning. It removes plaque.',
        'Our Dental Floss is a high-performance oral care product that provides effective interdental cleaning to promote healthy gums and prevent cavities. This floss is formulated with a refreshing mint flavor that leaves your mouth feeling clean and fresh. The strong, durable fibers of the floss easily glide between your teeth, removing plaque and food particles that brushing alone can\'t reach. Whether you\'re looking to improve your oral hygiene routine or just want to maintain a healthy smile, our Dental Floss is a safe and effective solution. It is free from harsh chemicals, artificial flavors, and preservatives, making it a gentle choice for daily use. Use it as part of your daily oral care routine to maintain a healthy, beautiful smile that you can be proud of.',
        8.00, 5, 180, 'images/product_46.jpg', 'White', 4.40, 1.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (47, 'Tooth Whitening Kit',
        'Our Tooth Whitening Kit is a complete system that allows you to whiten your teeth at home.',
        'Our Tooth Whitening Kit is a high-performance oral care product that provides a professional-grade teeth whitening experience in the comfort of your own home. This kit contains powerful whitening agents that remove surface stains and brighten your teeth, giving you a beautiful, radiant smile. The easy-to-use system includes everything you need to achieve professional results, including a whitening gel, applicator, and detailed instructions. Whether you\'re looking to remove stains from coffee, tea, or tobacco, or just want to maintain a bright smile, our Tooth Whitening Kit is a safe and effective solution. It is free from harsh chemicals, artificial flavors, and preservatives, making it a gentle choice for daily use. Use it as part of your daily oral care routine to maintain a healthy, beautiful smile that you can be proud of.',
        45.00, 5, 100, 'images/product_47.jpg', 'White', 4.70, 5.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (48, 'Hyaluronic Acid Serum',
        'Our Hyaluronic Acid Serum provides intense hydration, plumping and smoothing your skin for a youthful appearance. It absorbs quickly and is suitable for all skin types, helping to reduce the appearance of fine lines and wrinkles.',
        'Our Hyaluronic Acid Serum is a powerful hydrating formula that draws moisture into the skin, helping to plump and smooth out fine lines and wrinkles. This serum is lightweight and absorbs quickly, making it perfect for all skin types, including sensitive and acne-prone skin. With regular use, your skin will feel softer, look more radiant, and appear more youthful. It’s an essential addition to any skincare routine.',
        22.00, 1, 100, 'images/product_48.jpg', 'Clear', 4.70, 3.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (49, 'Heat Protectant Spray',
        'Our Heat Protectant Spray shields your hair from heat damage caused by styling tools. It provides a protective barrier that locks in moisture, leaving your hair soft, shiny, and healthy.',
        'Our Heat Protectant Spray is a must-have for anyone who uses heat styling tools. This spray forms a protective barrier on your hair, reducing the risk of heat damage while locking in moisture. It leaves your hair soft, shiny, and more manageable, making it easier to style. Suitable for all hair types, this spray is lightweight and non-greasy, ensuring that your hair stays healthy and beautiful.',
        16.00, 2, 120, 'images/product_49.jpg', 'Light Blue', 4.60, 2.50, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (50, 'BB Cream',
        'Our BB Cream provides light coverage with skincare benefits. It evens out skin tone, hydrates, and protects your skin with SPF, making it perfect for everyday wear.',
        'Our BB Cream is a versatile beauty product that combines makeup and skincare in one. This cream provides light, buildable coverage that evens out skin tone while offering hydration and sun protection with SPF. It’s perfect for everyday wear, giving you a natural, healthy-looking glow. Suitable for all skin types, it’s lightweight, non-greasy, and available in multiple shades to match your skin tone.',
        20.00, 3, 130, 'images/product_50.jpg', 'Beige', 4.50, 3.00, '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL);
/*!40000 ALTER TABLE `products`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `provinces`
(
    `id`           bigint unsigned                         NOT NULL AUTO_INCREMENT,
    `country_code` varchar(10) COLLATE utf8mb4_unicode_ci  NOT NULL,
    `name`         varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `short_name`   varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `gst_rate`     decimal(4, 2)                           NOT NULL,
    `pst_rate`     decimal(4, 2)                           NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 14
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinces`
--

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces`
    DISABLE KEYS */;
INSERT INTO `provinces`
VALUES (1, 'CA', 'Alberta', 'AB', 5.00, 0.00),
       (2, 'CA', 'British Columbia', 'BC', 5.00, 7.00),
       (3, 'CA', 'Manitoba', 'MB', 5.00, 7.00),
       (4, 'CA', 'New Brunswick', 'NB', 5.00, 10.00),
       (5, 'CA', 'Newfoundland and Labrador', 'NL', 5.00, 10.00),
       (6, 'CA', 'Northwest Territories', 'NT', 5.00, 0.00),
       (7, 'CA', 'Nova Scotia', 'NS', 5.00, 10.00),
       (8, 'CA', 'Nunavut', 'NU', 5.00, 0.00),
       (9, 'CA', 'Ontario', 'ON', 5.00, 8.00),
       (10, 'CA', 'Prince Edward Island', 'PE', 5.00, 10.00),
       (11, 'CA', 'Quebec', 'QC', 5.00, 9.98),
       (12, 'CA', 'Saskatchewan', 'SK', 5.00, 6.00),
       (13, 'CA', 'Yukon', 'YT', 5.00, 0.00);
/*!40000 ALTER TABLE `provinces`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews`
(
    `id`          bigint unsigned                                                NOT NULL AUTO_INCREMENT,
    `product_id`  bigint unsigned                                                NOT NULL,
    `user_id`     bigint unsigned                                                NOT NULL,
    `rating`      int                                                            NOT NULL,
    `review_text` text COLLATE utf8mb4_unicode_ci,
    `image`       varchar(255) COLLATE utf8mb4_unicode_ci                                 DEFAULT NULL,
    `status`      enum ('active','flagged','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
    `created_at`  timestamp                                                      NULL     DEFAULT NULL,
    `updated_at`  timestamp                                                      NULL     DEFAULT NULL,
    `deleted_at`  timestamp                                                      NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `reviews_user_id_foreign` (`user_id`),
    KEY `reviews_product_id_index` (`product_id`),
    CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
    CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 11
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews`
    DISABLE KEYS */;
INSERT INTO `reviews`
VALUES (1, 1, 1, 5, 'Amazing product! Highly recommend it.', NULL, 'active', '2024-08-16 06:25:51',
        '2024-08-16 06:25:51', NULL),
       (2, 2, 1, 4, 'Good value for money.', NULL, 'active', '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (3, 3, 1, 3, 'It\'s okay, but I expected more.', NULL, 'active', '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (4, 4, 2, 5, 'Excellent quality and fast shipping.', NULL, 'active', '2024-08-16 06:25:51',
        '2024-08-16 06:25:51', NULL),
       (5, 5, 2, 4, 'Works as advertised.', NULL, 'active', '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (6, 6, 2, 2, 'Not satisfied with the product.', NULL, 'active', '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (7, 7, 1, 5, 'Best purchase I\'ve made in a while!', NULL, 'active', '2024-08-16 06:25:51',
        '2024-08-16 06:25:51', NULL),
       (8, 8, 1, 3, 'It\'s alright, but not great.', NULL, 'active', '2024-08-16 06:25:51', '2024-08-16 06:25:51',
        NULL),
       (9, 9, 2, 4, 'Pretty good product.', NULL, 'active', '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL),
       (10, 10, 2, 5, 'I love this product!', NULL, 'active', '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL);
/*!40000 ALTER TABLE `reviews`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions`
(
    `id`            varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `user_id`       bigint unsigned                        DEFAULT NULL,
    `ip_address`    varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `user_agent`    text COLLATE utf8mb4_unicode_ci,
    `payload`       longtext COLLATE utf8mb4_unicode_ci     NOT NULL,
    `last_activity` int                                     NOT NULL,
    PRIMARY KEY (`id`),
    KEY `sessions_user_id_index` (`user_id`),
    KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stores`
(
    `id`         bigint unsigned NOT NULL AUTO_INCREMENT,
    `created_at` timestamp       NULL DEFAULT NULL,
    `updated_at` timestamp       NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stores`
--

LOCK TABLES `stores` WRITE;
/*!40000 ALTER TABLE `stores`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `stores`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions`
(
    `id`               bigint unsigned                                                   NOT NULL AUTO_INCREMENT,
    `order_id`         bigint unsigned                                                   NOT NULL,
    `user_id`          bigint unsigned                                                   NOT NULL,
    `amount`           decimal(10, 2)                                                    NOT NULL,
    `transaction_type` enum ('Payment','Refund','Chargeback') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Payment',
    `currency`         varchar(10) COLLATE utf8mb4_unicode_ci                            NOT NULL DEFAULT 'USD',
    `status`           enum ('Pending','Completed','Failed') COLLATE utf8mb4_unicode_ci  NOT NULL DEFAULT 'Pending',
    `response`         text COLLATE utf8mb4_unicode_ci,
    `created_at`       timestamp                                                         NULL     DEFAULT NULL,
    `updated_at`       timestamp                                                         NULL     DEFAULT NULL,
    `deleted_at`       timestamp                                                         NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `transactions_order_id_foreign` (`order_id`),
    KEY `transactions_user_id_foreign` (`user_id`),
    CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
    CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions`
    DISABLE KEYS */;
INSERT INTO `transactions`
VALUES (1, 1, 1, 100.00, 'Payment', 'USD', 'Pending', 'Transaction response details here.', '2024-08-16 06:25:51',
        '2024-08-16 06:25:51', NULL);
/*!40000 ALTER TABLE `transactions`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users`
(
    `id`                bigint unsigned                         NOT NULL AUTO_INCREMENT,
    `name`              varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email`             varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email_verified_at` timestamp                               NULL     DEFAULT NULL,
    `password`          varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `remember_token`    varchar(100) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `full_name`         varchar(255) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `address`           varchar(255) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `phone`             varchar(15) COLLATE utf8mb4_unicode_ci           DEFAULT NULL,
    `is_admin`          tinyint                                 NOT NULL DEFAULT '0',
    `created_at`        timestamp                               NULL     DEFAULT NULL,
    `updated_at`        timestamp                               NULL     DEFAULT NULL,
    `deleted_at`        timestamp                               NULL     DEFAULT NULL,
    `billing_address`   varchar(255) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `shipping_address`  varchar(255) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `last_order_id`     bigint unsigned                                  DEFAULT NULL,
    `previous_order_id` bigint unsigned                                  DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_email_unique` (`email`),
    KEY `users_last_order_id_foreign` (`last_order_id`),
    KEY `users_previous_order_id_foreign` (`previous_order_id`),
    CONSTRAINT `users_last_order_id_foreign` FOREIGN KEY (`last_order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
    CONSTRAINT `users_previous_order_id_foreign` FOREIGN KEY (`previous_order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL
) ENGINE = InnoDB
  AUTO_INCREMENT = 5
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users`
    DISABLE KEYS */;
INSERT INTO `users`
VALUES (1, 'well-admin', 'well.yongdong@gmail.com', '2024-08-16 06:25:51',
        '$2y$10$Z77y9ggXTJZykoBD4g5cX.49oXUihPj7rbKg.0poJJ98r40KWkSLm', 'qANh0NPwcL', 'Admin User', '123 Admin Street',
        '1234567890', 1, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL, NULL, NULL, NULL, NULL),
       (2, 'admin', 'admin@gmail.com', '2024-08-16 06:25:51',
        '$2y$10$8cfMz6VI.KwG9MokOMGtfe3HPXRsX4.H5KrPTvUukHxQA2GbXadGa', 'rIlrsE7jaw', 'Admin User', '123 Admin Street',
        '1234567890', 1, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL, NULL, NULL, NULL, NULL),
       (3, 'mydasa', 'mydasa@gmail.com', '2024-08-16 06:25:51',
        '$2y$10$WrD4Sou/C/TFJYwixMdHu.TTJHhu8nQqHD0h9ujUiWQxBrFTdHP6u', 'LwLsigTvp4', 'MyDasa User', '456 John Street',
        '0987654321', 0, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL, NULL, NULL, NULL, NULL),
       (4, 'mydasa', 'well.mydasa@gmail.com', '2024-08-16 06:25:51',
        '$2y$10$M2.y3VwfzPvD0PrYC6/VUenK3uFMT8T.7/NCsHndrZqKWxjJU7HU2', '0X1FAdePGv', 'MyDasa User', '456 John Street',
        '0987654321', 0, '2024-08-16 06:25:51', '2024-08-16 06:25:51', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlists`
(
    `id`         bigint unsigned NOT NULL AUTO_INCREMENT,
    `user_id`    bigint unsigned NOT NULL,
    `product_id` bigint unsigned NOT NULL,
    `created_at` timestamp       NULL DEFAULT NULL,
    `updated_at` timestamp       NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `wishlists_user_id_foreign` (`user_id`),
    KEY `wishlists_product_id_foreign` (`product_id`),
    CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
    CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 6
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists`
    DISABLE KEYS */;
INSERT INTO `wishlists`
VALUES (1, 1, 1, '2024-08-16 06:25:51', '2024-08-16 06:25:51'),
       (2, 2, 2, '2024-08-16 06:25:51', '2024-08-16 06:25:51'),
       (3, 1, 3, '2024-08-16 06:25:51', '2024-08-16 06:25:51'),
       (4, 2, 4, '2024-08-16 06:25:51', '2024-08-16 06:25:51'),
       (5, 1, 5, '2024-08-16 06:25:51', '2024-08-16 06:25:51');
/*!40000 ALTER TABLE `wishlists`
    ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE = @OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE = @OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES = @OLD_SQL_NOTES */;

-- Dump completed on 2024-08-15 20:28:34
