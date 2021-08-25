-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 12:11 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digibook`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `label` varchar(200) COLLATE utf32_persian_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_persian_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `label`, `created_at`, `updated_at`) VALUES
(1, 'حقوق عمومی', '2021-06-02 20:37:21', '2021-06-02 20:37:21'),
(2, 'آیین دادرسی', '2021-06-02 20:37:21', '2021-06-02 20:37:21'),
(3, 'برنامه نویسی', '2021-06-02 20:42:15', '2021-06-02 20:42:15'),
(4, 'کامپيوترهاي کوانتومي ', '2021-06-02 20:42:15', '2021-06-02 20:42:15'),
(5, 'رياضيات', '2021-06-02 20:42:57', '2021-06-02 20:42:57'),
(6, 'سخت‌افزار ', '2021-06-02 20:42:57', '2021-06-02 20:42:57'),
(7, 'دیتابيس', '2021-06-02 20:43:53', '2021-06-02 20:43:53'),
(8, 'آفيس', '2021-06-02 20:43:53', '2021-06-02 20:43:53'),
(9, 'فني مهندسي', '2021-06-02 20:44:19', '2021-06-02 20:44:19'),
(10, 'لغت نامه', '2021-06-02 20:44:19', '2021-06-02 20:44:19'),
(17, 'کمک آموزشی', '2021-06-05 06:55:00', '2021-06-05 06:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_price` int(11) NOT NULL,
  `status` enum('Unpaid','Paid','','') COLLATE utf32_persian_ci NOT NULL DEFAULT 'Paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_persian_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `total_price`, `status`) VALUES
(9, 9, '2021-06-05 09:59:42', 120000, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_persian_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(15, 9, 14, 2, 13000, '2021-06-05 07:29:43', '2021-06-05 07:29:43'),
(16, 9, 13, 1, 79000, '2021-06-05 07:29:43', '2021-06-05 07:29:43'),
(17, 9, 12, 1, 15000, '2021-06-05 07:29:43', '2021-06-05 07:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf32_persian_ci NOT NULL,
  `description` text COLLATE utf32_persian_ci NOT NULL,
  `image` text COLLATE utf32_persian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `author` varchar(200) COLLATE utf32_persian_ci DEFAULT NULL,
  `translator` varchar(200) COLLATE utf32_persian_ci DEFAULT NULL,
  `page_count` int(11) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_persian_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `category_id`, `user_id`, `author`, `translator`, `page_count`, `status`, `created_at`, `updated_at`) VALUES
(8, ' سه سطحی زیست شناسی یازدهم قلم چی', ' سه سطحی زیست شناسی یازدهم قلم چی', 'images/1622885166.jpg', 34200, 17, 7, 'قلم چی', 'کانون قلم چی', 135, 1, '2021-06-05 06:56:06', '2021-06-05 06:56:06'),
(9, 'مغز سخن چین', 'درباره مغز سخن چین:\r\nکتاب مغز سخن چین (the tell-tale brain) نام یکی مشهورترین کتاب‌های علمی جهان برای عموم در حوزه مغز است. این کتاب به قلم عصب شناس سرشناس ویلیانور راماچاندران به رشته تحریر درآمده است و هم چنان که از عنوان فرعی آن پیداست (جست و جوی یک عصب شناس برای آنچه ما را انسان می سازد) از دیدگاه عصب شناسی به ماهیت انسان بودن و شاکله هویت آدمی می پردازد. البته راماچاندران در سفر به درون مغز از اسکنر ام ار ای استفاده نمی کند و درست مانند شرلوک هولمز (همچنان که در دنیا به این لقب مشهور است) به حل معماهای مرتبط با ماهیت انسان می پردازد. کتاب مغز سخن چین بلافاصله پس از انتشار در فهرست پرفروش ترین های نیویورک تایمز قرار گرفت و برنده جوایز معتبری چون جایزه ودافون شده است. نشر سایلاو این کتاب علمی را برای اولین بار در کشور و با ترجمه دکتر معصومه ملکیان در تیراژ 1100 نسخه به عنوان یکی از کتاب های حوزه علم مدرن و فلسفه خود منتشر کرده است. \r\n\r\n \r\n\r\nراماچاندران یکی از پیشگامان علم در عصر حاضر و دانشمند برجسته علوم اعصاب است که به خاطر اکتشافات جالب توجه وی، ریچارد داوکینز به او لقب مارکوپلوی علوم اعصاب را داده است. راماچاندران در شاهکار تکرار نشدنی خود یعنی کتاب مغزسخن چین، در جستجوی ویژگی هایی است که ما را انسان می سازند. او در مغز سخن چین نشان می دهد چگونه مختل شدن کارکرد مغز، می تواند اسراری را درباره عملکرد طبیعی مغز برملا کند. تاکید وی در این کتاب بیش از همه بر روی خصوصیات منحصر به فرد انسانی است.\r\n\r\nکتاب مغز سخن چین، ماجراهای بیمارانی را به تصویر می کشد که دچار آسیب و یا ضایعه مغزی شده اند و در نتیجه آن، تجربه ذهنی یا ادراکی غیرعادی را گزارش می کنند. راماچاندران تلاش می کند با مطالعه این بیماران به ویژگی های منحصر به فرد انسانی ما پی ببرد. از داستان زنی که در مواجهه با درد می خندد، خلبانی که پس از جراحی آپاندیس همسر خود را نمی شناسد؛ مردی که بعد از تصادف مادرش را زنی شیاد می داند که تظاهر می کند مادر اوست، دختری که هر عدد را به رنگ خاصی می بیند، پسر بچه اوتیسمی که بهتر از داوینچی نقاشی می کشد، فرد مبتلا به سکته مغزی که فلج خود را انکار می کند گرفته تا مهندس نرم افزاری که در نتیجه تومور مغزی حضور دوقلوی خیالی خودش را تجربه می کند، همه و همه در این کتاب با ذکر جزئیات به تصویر کشیده شده اند و اطلاعات شگفت انگیزی از مغز در اختیار ما می گذارند.', 'images/1622885650.jpg', 690000, 2, 7, ' راما چاندران', ' راما چاندران', 305, 1, '2021-06-05 07:04:10', '2021-06-05 07:04:10'),
(10, 'مرجع جامع و کاربردی ARCHICAD 16', 'مرجع جامع و کاربردی ARCHICAD 16\r\n\r\nنویسنده: مسعود باقری-مصطفی علی نژادیان\r\n\r\nانتشارات : دایره دانش\r\n\r\nسرفصل ها:\r\n\r\nفصل1: تنظیمات اولیه\r\n\r\nفصل2: اطلاعات پایه\r\n\r\nفصل3: ابزار خط و فرمانهای پایه\r\n\r\nفصل4: روشهای انتخاب المانها\r\n\r\nفصل5: مباحث اندازه گیری و اندازه یابی\r\n\r\nفصل 6:ابزار های مدیریت تصاویر، محاسبات سطح، حجم و هاشورزنی\r\n\r\nفصل 7:مباحث جنس مواد و تنظیمات نمایشی\r\n\r\nفصل8: ابزار های ایجاد برش و نما و مباحث مربوطه\r\n\r\nفصل9: امکانات مدیریت ترسیم ها\r\n\r\nفصل10: روش ایجاد طبقات\r\n\r\nفصل11: المانهای پر کاربرد مدل سازی\r\n\r\nو...', 'images/1622885868.jpg', 52000, 9, 7, 'مسعود باقری-مصطفی علی نژادیان', '', 225, 1, '2021-06-05 07:07:48', '2021-06-05 07:07:48'),
(11, 'مدیریت شبکه های محلی', 'مدیریت شبکه های محلی( برای  تدریس در دانشگاه)\r\n\r\nنویسنده: قرت اله طلایی ،  سابینا نوری\r\n\r\nانتشارات: دایره دانش\r\n\r\nسرفصل ها:\r\n\r\nفصل1: مفاهیم اولیه شبکه network\r\n\r\nفصل2: سیستم های عامل تک کاربرد single user operating system\r\n\r\nفصل3: تجهیزات اصلی شبکه\r\n\r\nفصل4:قرار دادهای شبکه protocol\r\n\r\nفصل5: استاندارد های شبکه محلی بی سیم\r\n\r\nفصل6: انواع شبکه\r\n\r\nفصل7: ریخت شناسی شبکه network topology\r\n\r\nفصل8: آشنایی با اصطلاحات خطوط مخابراتی\r\n\r\nفصل9: راهنمای مدیریت فناوری اطلاعات (IT)\r\n\r\nفصل10: تجارت الکترونیک\r\n\r\nفصل11: طراحی مدیریت شبکه\r\n\r\nفصل12: حفاظت از شبکه با بهره گیری از فایروال (دیوار حفاظتی)\r\n\r\n \r\n\r\n ', 'images/1622885936.jpg', 65000, 9, 7, ' قرت اله طلایی ،  سابینا نوری', '', 200, 1, '2021-06-05 07:08:56', '2021-06-05 07:08:56'),
(12, 'AutoCAD Electical اتوکد الکتریکال', 'آموزش نرم افزارAutoCAD Electical\r\n\r\nنام نویسنده: سید احسان مرزنی - نسیم مرندی\r\n\r\nانتشارات: کیان رایانه\r\n\r\nتوضیحات: بخشی از سرفصل ها،مدارهای الکتریکی - آشنایی با محیط کاربردی اتوکد الکتریکال - آشنایی با نرم افزار اتو کد الکتریکال - شروع کار با پروژه - شماتیک قطعات - مدار بندی گسترش مدار - پنل جانمایی - دیاگرارام هایی از نوع نقطه به نقطه و...', 'images/1622886066.jpg', 15000, 9, 7, 'سید احسان مرزنی - نسیم مرندی', '', 100, 1, '2021-06-05 07:11:06', '2021-06-05 07:11:06'),
(13, 'مهندسی کنترل،(ویراست پنجم )', 'نام کالا: مهندسی کنترل،(ویراست پنجم )\r\n\r\nنویسنده: کاتسو هیلووگاتا\r\n\r\nمترجم : محمود دیانی      \r\n\r\nانتشارات: نص\r\n\r\nموضوع: مهندسی برق\r\n\r\nسرفصل ها:\r\n\r\n1. معرفی سیستم های کنترل\r\n\r\n2.مدل سازی ریاضی سیستم های دینامیکی\r\n\r\n3.مدل سازی ریاضی سیستم های مکانیکی سیستم های التریکی\r\n\r\n4.مدل سازی ریاضی سیستم هایسیالاتی و  گرمایی\r\n\r\n5.تحلیل پاسخ گذار و پاسخ حالات ماندگار\r\n\r\n6.تحلیل و طراحی سیستمهای کنترل به روش مکان هندسه ریشه ها       ', 'images/1622886173.jpg', 79000, 9, 7, 'کاتسو هیلووگاتا', 'محمود دیانی', 100, 1, '2021-06-05 07:12:53', '2021-06-05 07:12:53'),
(14, 'انسان و ادیان- نقش دین در زندگی فردی و اجتماعی', 'انسان و ادیان- نقش دین در زندگی فردی و اجتماعی\r\n\r\nنویسنده: میشل مالرب\r\n\r\nمترجم: مهران توکلی\r\n\r\nانتشارات: نی\r\n\r\nدرباره این کتاب:\r\n\r\nدر میان عناصری که یک تمدن را می‌سازند، دین را نباید نادیده انگاشت. در حقیقت، هر تمدنی یک زیرساخت دینی دارد که به یقین، روشنگر فرهنگ در معنای هرچه گسترده‌تر این کلمه است. دربارهٔ هریک از ادیان کوهی از کتاب نوشته شده است، که ادعای گردآوری چکیدهٔ همهٔ آن‌ها در یک کتاب گزافه خواهد بود. هدف این کتاب این است که خواننده دریابد که بنیان جریان‌های بزرگ معنوی بر چه ارزش‌هایی است و در عمل، چگونه به کار بسته شده یا می‌شود.\r\nاین کتاب می‌کوشد هر دینی را آنچنان بنمایاند که یکی از پیروان همان دین در می‌یابد، و در عین حال، خواننده را برانگیزد که دربارهٔ انسان و گونه‌گون بودن انسان‌ها اندیشه کند تا بتواند همنوعان خود را بهتر بشناسد و آگاهانه‌تر به گزینش بنشیند.', 'images/1622886246.jpg', 13000, 17, 7, 'میشل مالرب', 'مهران توکلی', 0, 1, '2021-06-05 07:14:06', '2021-06-05 07:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) COLLATE utf32_persian_ci NOT NULL,
  `password` varchar(200) COLLATE utf32_persian_ci NOT NULL,
  `role` enum('Admin','User') COLLATE utf32_persian_ci NOT NULL DEFAULT 'User',
  `first_name` varchar(200) COLLATE utf32_persian_ci DEFAULT NULL,
  `last_name` varchar(200) COLLATE utf32_persian_ci DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf32_persian_ci DEFAULT NULL,
  `address` text COLLATE utf32_persian_ci DEFAULT NULL,
  `postal_code` varchar(10) COLLATE utf32_persian_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `first_name`, `last_name`, `mobile`, `address`, `postal_code`, `created_at`, `updated_at`) VALUES
(7, 'admin', '$2y$10$LUn.Hq/efMWVrhk0HcFSW.nHrFaTAw1YVa7ji.LnVChPHjtUG9ra2', 'Admin', NULL, NULL, NULL, NULL, NULL, '2021-06-02 19:18:20', '2021-06-04 08:13:27'),
(9, 'ali', '$2y$10$jeJjU9UzOPYD.54MVI0T2.M1eykB/A7fYQkNH.kmm0TfkzDRxfWVy', 'User', 'علی', 'حافظی', '1234567890', 'مهاجران', '1234567890', '2021-06-05 07:16:08', '2021-06-05 07:16:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
