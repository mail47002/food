-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Вер 26 2017 р., 15:12
-- Версія сервера: 5.7.16
-- Версія PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `food`
--

-- --------------------------------------------------------

--
-- Структура таблиці `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `build` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `adresses`
--

CREATE TABLE `adresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `build` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `adresses`
--

INSERT INTO `adresses` (`id`, `user_id`, `city`, `street`, `build`, `created_at`, `updated_at`) VALUES
(1, 1, 'Вінниця', 'Стрілецька', '75', '2017-09-02 13:51:57', '2017-09-02 10:56:04');

-- --------------------------------------------------------

--
-- Структура таблиці `adverts`
--

CREATE TABLE `adverts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `custom_price` decimal(5,2) NOT NULL,
  `everyday` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sticker_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `coocking_time_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `adverts`
--

INSERT INTO `adverts` (`id`, `name`, `description`, `product_id`, `user_id`, `quantity`, `price`, `custom_price`, `everyday`, `category_id`, `sticker_id`, `sort_order`, `status`, `coocking_time_id`, `created_at`, `updated_at`) VALUES
(1, 'Adverts 1', 'Lorem Ipsum - це текст-\"риба\", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною \"рибою\" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. \"Риба\" не тільки успішно пережила п\'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп\'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.', 1, 1, 5, '120.50', '140.50', 1, 1, 2, 1, 1, 1, '2017-09-02 13:51:57', NULL),
(2, 'Adverts 2', 'Lorem Ipsum - це текст-\"риба\", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною \"рибою\" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. \"Риба\" не тільки успішно пережила п\'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп\'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.', 2, 1, 5, '120.50', '140.50', 1, 1, 2, 1, 1, 1, '2017-09-02 13:51:57', NULL),
(3, 'Adverts 3', 'Lorem Ipsum - це текст-\"риба\", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною \"рибою\" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. \"Риба\" не тільки успішно пережила п\'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп\'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.', 3, 2, 5, '120.50', '140.50', 1, 1, 2, 1, 1, 1, '2017-09-02 13:51:57', NULL),
(4, 'Adverts 4', 'Lorem Ipsum - це текст-\"риба\", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною \"рибою\" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. \"Риба\" не тільки успішно пережила п\'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп\'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.', 4, 3, 5, '120.50', '140.50', 1, 1, 2, 1, 1, 1, '2017-09-02 13:51:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `advert_adresses`
--

CREATE TABLE `advert_adresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `advert_id` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `build` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `advert_adresses`
--

INSERT INTO `advert_adresses` (`id`, `advert_id`, `city`, `street`, `build`, `created_at`, `updated_at`) VALUES
(1, 1, 'Vinnica', 'Strilecka', '75', '2017-09-02 13:51:57', NULL),
(2, 2, 'Vinnica', 'Strilecka', '74', '2017-09-02 13:51:57', NULL),
(3, 3, 'Vinnica', 'Strilecka', '75', '2017-09-02 13:51:57', NULL),
(4, 4, 'Vinnica', 'Strilecka', '73', '2017-09-02 13:51:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `advert_categories`
--

CREATE TABLE `advert_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `advert_categories`
--

INSERT INTO `advert_categories` (`id`, `name`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Страва у меню', 1, 1, '2017-09-02 13:51:57', NULL),
(2, 'Готова страва', 1, 1, '2017-09-02 13:51:57', NULL),
(3, 'Страва під замовлення', 1, 1, '2017-09-02 13:51:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `advert_coocking_time`
--

CREATE TABLE `advert_coocking_time` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `advert_coocking_time`
--

INSERT INTO `advert_coocking_time` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'coocing 1', 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом', '2017-09-02 13:51:57', NULL),
(2, 'coocing 2', 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом', '2017-09-02 13:51:57', NULL),
(3, 'coocing 3', 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом', '2017-09-02 13:51:57', NULL),
(4, 'coocing 4', 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом', '2017-09-02 13:51:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `advert_everyday_terms`
--

CREATE TABLE `advert_everyday_terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `advert_id` int(11) NOT NULL,
  `date_start` timestamp NULL DEFAULT NULL,
  `date_end` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `advert_everyday_terms`
--

INSERT INTO `advert_everyday_terms` (`id`, `advert_id`, `date_start`, `date_end`, `created_at`, `updated_at`) VALUES
(1, 1, '2014-06-25 21:00:00', '2014-06-25 21:00:00', '2017-09-02 13:51:57', NULL),
(2, 2, '2014-06-25 21:00:00', '2014-06-25 21:00:00', '2017-09-02 13:51:57', NULL),
(3, 3, '2014-06-25 21:00:00', '2014-06-25 21:00:00', '2017-09-02 13:51:57', NULL),
(4, 4, '2014-06-25 21:00:00', '2014-06-25 21:00:00', '2017-09-02 13:51:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `advert_image`
--

CREATE TABLE `advert_image` (
  `advert_image_id` int(10) UNSIGNED NOT NULL,
  `advert_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `advert_image`
--

INSERT INTO `advert_image` (`advert_image_id`, `advert_id`, `image`, `alt`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, '/products/image1.jpg', 'image1', 1, '2017-09-02 13:51:57', NULL),
(2, 1, '/products/image2.jpg', 'image1', 2, '2017-09-02 13:51:57', NULL),
(3, 2, '/products/image1.jpg', 'image1', 1, '2017-09-02 13:51:57', NULL),
(4, 2, '/products/image2.jpg', 'image1', 1, '2017-09-02 13:51:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `advert_images`
--

CREATE TABLE `advert_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `advert_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `advert_option_values`
--

CREATE TABLE `advert_option_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_value_id` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `advert_product_terms`
--

CREATE TABLE `advert_product_terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `advert_id` int(11) NOT NULL,
  `date_start` timestamp NULL DEFAULT NULL,
  `date_end` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `advert_product_terms`
--

INSERT INTO `advert_product_terms` (`id`, `advert_id`, `date_start`, `date_end`, `created_at`, `updated_at`) VALUES
(1, 1, '2014-06-25 21:00:00', '2014-06-25 21:00:00', '2017-09-02 13:51:57', NULL),
(2, 2, '2014-06-25 21:00:00', '2014-06-25 21:00:00', '2017-09-02 13:51:57', NULL),
(3, 3, '2014-06-25 21:00:00', '2014-06-25 21:00:00', '2017-09-02 13:51:57', NULL),
(4, 4, '2014-06-25 21:00:00', '2014-06-25 21:00:00', '2017-09-02 13:51:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `advert_stickers`
--

CREATE TABLE `advert_stickers` (
  `advert_stickers_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `advert_stickers`
--

INSERT INTO `advert_stickers` (`advert_stickers_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'share', '/products/image1.jpg', '2017-09-02 13:51:57', NULL),
(2, 'sale', '/products/image2.jpg', '2017-09-02 13:51:57', NULL),
(3, 'share', '/products/image3.jpg', '2017-09-02 13:51:57', NULL),
(4, 'sale', '/products/image4.jpg', '2017-09-02 13:51:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `advert_to_category`
--

CREATE TABLE `advert_to_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `advert_id` int(11) NOT NULL,
  `advert_category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `advert_to_category`
--

INSERT INTO `advert_to_category` (`id`, `advert_id`, `advert_category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-09-02 13:51:57', NULL),
(2, 2, 2, '2017-09-02 13:51:57', NULL),
(3, 3, 1, '2017-09-02 13:51:57', NULL),
(4, 4, 2, '2017-09-02 13:51:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Article 1', 'Article 1', 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом', '2017-09-02 13:51:57', NULL),
(2, 2, 'Article 2', 'Article 2', 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом', '2017-09-02 13:51:57', NULL),
(3, 3, 'Article 3', 'Article 3', 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом', '2017-09-02 13:51:57', NULL),
(4, 2, 'Article 4', 'Article 4', 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом', '2017-09-02 13:51:57', NULL),
(5, 1, 'Article 5', 'Article 5', 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом', '2017-09-02 13:51:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `article_categories`
--

CREATE TABLE `article_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `article_categories`
--

INSERT INTO `article_categories` (`id`, `name`, `meta_title`, `meta_description`, `meta_keyword`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Category 1', 'Category 1', 'Category 1', 'Category 1', 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом', '2017-09-02 13:51:57', NULL),
(2, 'Category 2', 'Category 2', 'Category 2', 'Category 2', 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом', '2017-09-02 13:51:57', NULL),
(3, 'Category 3', 'Category 3', 'Category 3', 'Category 3', 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом', '2017-09-02 13:51:57', NULL),
(4, 'Category 4', 'Category 4', 'Category 4', 'Category 4', 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом', '2017-09-02 13:51:57', NULL),
(5, 'Category 5', 'Category 5', 'Category 5', 'Category 5', 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом', '2017-09-02 13:51:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`id`, `name`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Category 1', 4, 1, '2017-09-02 13:51:57', NULL),
(2, 'Category 2', 3, 1, '2017-09-02 13:51:57', NULL),
(3, 'Category 3', 2, 1, '2017-09-02 13:51:57', NULL),
(4, 'Category 4', 1, 1, '2017-09-02 13:51:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `content`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'faq 1', 'Lorem Ipsum є псевдо- латинський текст використовується у веб - дизайні, типографіка, верстка, і друку замість англійської підкреслити елементи дизайну над змістом. Це також називається заповнювач ( або наповнювач) текст. Це зручний інструмент для макетів. Це допомагає намітити візуальні елементи в документ або презентацію, наприклад, друкарня, шрифт, або макет.', 1, 0, NULL, NULL),
(2, 'faq 2', 'Lorem Ipsum є псевдо- латинський текст використовується у веб - дизайні, типографіка, верстка, і друку замість англійської підкреслити елементи дизайну над змістом. Це також називається заповнювач ( або наповнювач) текст. Це зручний інструмент для макетів. Це допомагає намітити візуальні елементи в документ або презентацію, наприклад, друкарня, шрифт, або макет.', 1, 0, NULL, NULL),
(3, 'faq 3', 'Lorem Ipsum є псевдо- латинський текст використовується у веб - дизайні, типографіка, верстка, і друку замість англійської підкреслити елементи дизайну над змістом. Це також називається заповнювач ( або наповнювач) текст. Це зручний інструмент для макетів. Це допомагає намітити візуальні елементи в документ або презентацію, наприклад, друкарня, шрифт, або макет.', 1, 0, NULL, NULL),
(4, 'faq 4', 'Lorem Ipsum є псевдо- латинський текст використовується у веб - дизайні, типографіка, верстка, і друку замість англійської підкреслити елементи дизайну над змістом. Це також називається заповнювач ( або наповнювач) текст. Це зручний інструмент для макетів. Це допомагає намітити візуальні елементи в документ або презентацію, наприклад, друкарня, шрифт, або макет.', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_17_091159_create_products_table', 1),
(4, '2017_08_17_171636_create_categories_table', 1),
(5, '2017_08_17_172301_create_product_image_table', 1),
(6, '2017_08_17_172428_create_product_to_category_table', 1),
(7, '2017_08_17_172501_create_adverts_table', 1),
(8, '2017_08_17_173011_create_advert_categories_table', 1),
(9, '2017_08_17_173028_create_advert_to_category_table', 1),
(10, '2017_08_17_173049_create_advert_image_table', 1),
(11, '2017_08_17_173109_create_advert_stickers_table', 1),
(12, '2017_08_17_173159_create_advert_product_terms_table', 1),
(13, '2017_08_17_173233_create_advert_everyday_terms_table', 1),
(14, '2017_08_17_173327_create_advert_coocking_time_table', 1),
(15, '2017_08_17_173432_create_advert_adresses_table', 1),
(16, '2017_08_17_173445_create_articles_table', 1),
(17, '2017_08_17_173530_create_article_categories_table', 1),
(18, '2017_08_17_173551_create_reviews_table', 1),
(19, '2017_08_17_173615_create_review_answers_table', 1),
(20, '2017_08_17_173641_create_adresses_table', 1),
(21, '2017_08_17_173650_create_roles_table', 1),
(22, '2017_08_17_173706_create_options_table', 1),
(23, '2017_08_17_173716_create_option_values_table', 1),
(24, '2017_08_17_173738_create_advert_option_values_table', 1),
(25, '2017_08_17_173804_create_option_to_advert_category_table', 1),
(26, '2017_08_17_173820_create_order_table', 1),
(27, '2017_08_31_101530_create_pages_table', 1),
(28, '2017_08_17_173049_create_advert_images_table', 2),
(29, '2017_08_17_173641_create_addresses_table', 2),
(30, '2017_09_15_080832_create_faqs_table', 2);

-- --------------------------------------------------------

--
-- Структура таблиці `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `options`
--

INSERT INTO `options` (`id`, `type`, `name`, `created_at`, `updated_at`) VALUES
(1, 'type 1', 'type 1', '2017-09-02 13:51:57', NULL),
(2, 'type 2', 'type 2', '2017-09-02 13:51:57', NULL),
(3, 'type 3', 'type 3', '2017-09-02 13:51:57', NULL),
(4, 'type 4', 'type 5', '2017-09-02 13:51:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `option_to_advert_category`
--

CREATE TABLE `option_to_advert_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `advert_category_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `option_to_advert_category`
--

INSERT INTO `option_to_advert_category` (`id`, `advert_category_id`, `option_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-09-02 13:51:58', NULL),
(2, 2, 2, '2017-09-02 13:51:58', NULL),
(3, 3, 3, '2017-09-02 13:51:58', NULL),
(4, 4, 4, '2017-09-02 13:51:58', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `option_values`
--

CREATE TABLE `option_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `required` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `advert_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `order`
--

INSERT INTO `order` (`id`, `advert_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', '2017-09-02 13:51:58', NULL),
(2, 2, 1, '1', '2017-09-02 13:51:58', NULL),
(3, 3, 3, '1', '2017-09-02 13:51:58', NULL),
(4, 4, 4, '1', '2017-09-02 13:51:58', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Про проект', 'pro-proekt', NULL, 'Про проект', NULL, NULL, 1, NULL, NULL),
(2, 'Допомога', 'dopomoga', NULL, 'Допомога', NULL, NULL, 1, NULL, NULL),
(3, 'Правила', 'pravila', NULL, 'Правила', NULL, NULL, 1, NULL, NULL),
(4, 'Умови та конфіденційність', 'umovi-ta-konfidentsiynist', NULL, 'Умови та конфіденційність', NULL, NULL, 1, NULL, NULL),
(5, 'Зворотний звя\'зок', 'zvorotniy-zvyazok', NULL, 'Зворотний звя\'зок', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `ingredients` json NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `user_id`, `ingredients`, `image`, `video`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Продукт 1', 'Lorem Ipsum - це текст-\"риба\", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною \"рибою\" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. \"Риба\" не тільки успішно пережила п\'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп\'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.', 1, '{\"1\": \"Картопля\", \"2\": \"Лосось\", \"3\": \"Цукіні\", \"4\": \"Цибуля\", \"5\": \"Оливкова олія\"}', 'uploads/food2.jpg', 'https://youtu.be/kP9OeIiTAmw', 4, 1, '2017-09-02 13:51:58', NULL),
(2, 'Продукт 2', 'Lorem Ipsum - це текст-\"риба\", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною \"рибою\" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. \"Риба\" не тільки успішно пережила п\'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп\'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.', 1, '{\"1\": \"Картопля\", \"2\": \"Лосось\", \"3\": \"Цукіні\", \"4\": \"Цибуля\", \"5\": \"Оливкова олія\"}', 'uploads/food2.jpg', 'https://youtu.be/kP9OeIiTAmw', 1, 1, '2017-09-02 13:51:58', NULL),
(3, 'Продукт 3', 'Lorem Ipsum - це текст-\"риба\", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною \"рибою\" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. \"Риба\" не тільки успішно пережила п\'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп\'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.', 2, '{\"1\": \"Картопля\", \"2\": \"Лосось\", \"3\": \"Цукіні\", \"4\": \"Цибуля\", \"5\": \"Оливкова олія\"}', 'uploads/food2.jpg', 'https://youtu.be/kP9OeIiTAmw', 5, 1, '2017-09-02 13:51:58', NULL),
(4, 'Продукт 4', 'Lorem Ipsum - це текст-\"риба\", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною \"рибою\" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. \"Риба\" не тільки успішно пережила п\'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп\'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.', 2, '{\"1\": \"Картопля\", \"2\": \"Лосось\", \"3\": \"Цукіні\", \"4\": \"Цибуля\", \"5\": \"Оливкова олія\"}', 'uploads/food2.jpg', 'https://youtu.be/kP9OeIiTAmw', 4, 1, '2017-09-02 13:51:58', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `product_image`
--

CREATE TABLE `product_image` (
  `product_image_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `product_image`
--

INSERT INTO `product_image` (`product_image_id`, `product_id`, `image`, `alt`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '/products/image11.jpg', 'image 11', 1, 1, '2017-09-02 13:51:58', NULL),
(2, 1, '/products/image22.jpg', 'image 22', 1, 1, '2017-09-02 13:51:58', NULL),
(3, 2, '/products/image33.jpg', 'image 33', 1, 1, '2017-09-02 13:51:58', NULL),
(4, 2, '/products/image44.jpg', 'image 33', 1, 1, '2017-09-02 13:51:58', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `product_to_category`
--

CREATE TABLE `product_to_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `product_to_category`
--

INSERT INTO `product_to_category` (`id`, `product_id`, `product_category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-09-02 13:51:58', NULL),
(2, 2, 1, '2017-09-02 13:51:58', NULL),
(3, 3, 2, '2017-09-02 13:51:58', NULL),
(4, 4, 2, '2017-09-02 13:51:58', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` decimal(5,2) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `text`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.', '3.20', 1, '2017-09-02 13:51:58', NULL),
(2, 1, 3, 'review 2', '4.20', 1, '2017-09-02 13:51:58', NULL),
(3, 2, 3, 'В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.', '5.00', 1, '2017-09-02 13:51:58', NULL),
(4, 4, 1, 'review 4', '2.50', 1, '2017-09-02 13:51:58', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `review_answers`
--

CREATE TABLE `review_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `review_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `review_answers`
--

INSERT INTO `review_answers` (`id`, `review_id`, `text`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'text 1', 1, '2017-09-02 13:51:58', NULL),
(2, 2, 'В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.', 1, '2017-09-02 13:51:58', NULL),
(3, 3, 'text 3', 1, '2017-09-02 13:51:58', NULL),
(4, 4, 'text 4', 1, '2017-09-02 13:51:58', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'user', '2017-09-02 13:51:58', NULL),
(2, 'administrator', '2017-09-02 13:51:58', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `role_id`, `image`, `name`, `nickname`, `phone`, `email`, `token`, `password`, `remember_token`, `about`, `status`, `ip`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/users/1/unnamed.png', 'Volodymyr Gajchenja', 'DPI5UYg', '[\"+38 (099) 320-8600\",\"+38 (099) 320-9800\",null]', 'mail47002@gmail.com', '', '$2y$10$lOwFu8rqdRbQ/aRU6MaPEeEw/sHrA947Vz0kUdUS2A9Tul8cgpUU.', NULL, 'hello', 0, NULL, '2017-09-02 10:52:37', '2017-09-22 10:04:16'),
(2, 1, 'uploads/users/1//unnamed.png', 'Gajchenja', 'DPI5UY1', '[\"+38 (099) 320-8600\",\"+38 (099) 320-9800\",null]', 'mail47003@gmail.com', '', '$2y$10$lOwFu8rqdRbQ/aRU6MaPEeEw/sHrA947Vz0kUdUS2A9Tul8cgpUU.', NULL, 'hello 2', 0, NULL, '2017-09-02 10:52:37', '2017-09-12 08:58:10'),
(3, 1, 'uploads/users/1//unnamed.png', 'Volodymyr', 'DPI5UY5', '[\"+38 (099) 320-8600\",\"+38 (099) 320-9800\",null]', 'mail47004@gmail.com', '', '$2y$10$lOwFu8rqdRbQ/aRU6MaPEeEw/sHrA947Vz0kUdUS2A9Tul8cgpUU.', NULL, 'hello 3', 0, NULL, '2017-09-02 10:52:37', '2017-09-12 08:58:10');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Індекси таблиці `adverts`
--
ALTER TABLE `adverts`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `advert_adresses`
--
ALTER TABLE `advert_adresses`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `advert_categories`
--
ALTER TABLE `advert_categories`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `advert_coocking_time`
--
ALTER TABLE `advert_coocking_time`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `advert_everyday_terms`
--
ALTER TABLE `advert_everyday_terms`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `advert_image`
--
ALTER TABLE `advert_image`
  ADD PRIMARY KEY (`advert_image_id`);

--
-- Індекси таблиці `advert_images`
--
ALTER TABLE `advert_images`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `advert_option_values`
--
ALTER TABLE `advert_option_values`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `advert_product_terms`
--
ALTER TABLE `advert_product_terms`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `advert_stickers`
--
ALTER TABLE `advert_stickers`
  ADD PRIMARY KEY (`advert_stickers_id`);

--
-- Індекси таблиці `advert_to_category`
--
ALTER TABLE `advert_to_category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `article_categories`
--
ALTER TABLE `article_categories`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `option_to_advert_category`
--
ALTER TABLE `option_to_advert_category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `option_values`
--
ALTER TABLE `option_values`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Індекси таблиці `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`product_image_id`);

--
-- Індекси таблиці `product_to_category`
--
ALTER TABLE `product_to_category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `review_answers`
--
ALTER TABLE `review_answers`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `adverts`
--
ALTER TABLE `adverts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `advert_adresses`
--
ALTER TABLE `advert_adresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `advert_categories`
--
ALTER TABLE `advert_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблиці `advert_coocking_time`
--
ALTER TABLE `advert_coocking_time`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `advert_everyday_terms`
--
ALTER TABLE `advert_everyday_terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `advert_image`
--
ALTER TABLE `advert_image`
  MODIFY `advert_image_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `advert_images`
--
ALTER TABLE `advert_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `advert_option_values`
--
ALTER TABLE `advert_option_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `advert_product_terms`
--
ALTER TABLE `advert_product_terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `advert_stickers`
--
ALTER TABLE `advert_stickers`
  MODIFY `advert_stickers_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `advert_to_category`
--
ALTER TABLE `advert_to_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `article_categories`
--
ALTER TABLE `article_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблиці `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `option_to_advert_category`
--
ALTER TABLE `option_to_advert_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `option_values`
--
ALTER TABLE `option_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `product_image`
--
ALTER TABLE `product_image`
  MODIFY `product_image_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `product_to_category`
--
ALTER TABLE `product_to_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `review_answers`
--
ALTER TABLE `review_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
