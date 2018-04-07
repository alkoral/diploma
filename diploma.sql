-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2018 at 02:25 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diploma`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `login` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `login`, `password`) VALUES
(1, 'admin', 'admin'),
(3, 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Астрономия'),
(2, 'Биология'),
(3, 'География');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status`) VALUES
(1, 'Ожидает ответа'),
(2, 'Опубликован'),
(3, 'Скрыт');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text,
  `category_id` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `question`, `answer`, `category_id`, `author`, `email`, `date`, `status`) VALUES
(1, 'На каком астрономическом теле есть кратер Водяной и тёмное пятно Кикимора?', 'Почти все географические объекты на Тритоне, самом большом спутнике Нептуна, названы в честь водяных духов, божеств и монстров. Например, здесь есть кратер, названный в честь Левиафана, а также линия кратеров «Цепь Кракена». Астрономы не забыли и о духах славянской мифологии: один из кратеров носит имя Водяной, а одно из тёмных пятен на поверхности спутника называется Кикимора.', 1, 'Alex', '100kphoto@mail.ru', '2018-03-25 20:36:20', 2),
(2, 'Что сказал Галилей инквизиции?', 'Инквизиция заставила Галилея отречься от своих слов о том, что Земля вертится вокруг Солнца, а не наоборот, но своих убеждений учёный не поменял. Однако знаменитую фразу — «И всё-таки она вертится!» — он не произносил. Этот миф сочинил через сто лет итальянский журналист.', 1, 'Koral', 'koral-99@yandex.ru', '2018-03-25 20:40:08', 2),
(3, 'Какой небесный объект сопровождал рождение и смерть Марка Твена?', 'В 1835 году рядом с Землёй пролетала комета Галлея, а через две недели после её перигелия родился Марк Твен. В 1909 году он написал: «Я пришёл в этот мир с кометой и уйду тоже с ней, когда она прилетит в следующем году». Так и случилось: Твен умер 21 апреля 1910 года, на следующий день после очередного перигелия кометы.', 1, 'Alkoral', 'alkoral@yandex.ru', '2018-03-25 20:42:57', 2),
(4, 'Сколько может весить самая тяжёлая клетка?', 'Только что отложенное яйцо, в котором ещё не началось формирование нового организма, является фактически одной-единственной клеткой в скорлупе — яйцеклеткой. Если учесть, что самые большие яйца весом до 2 кг откладывают страусы, именно такую массу имеют самые тяжёлые на Земле клетки. Во времена динозавров, соответственно, клетки-рекордсмены весили ещё больше.', 2, 'Koral', 'koral-99@yandex.ru', '2018-03-25 23:00:42', 2),
(5, 'Сколько ножек у сороконожек?', 'Сороконожка — это бытовое название разных видов членистоногих, объединённых по-научному в надкласс многоножек. У разных видов многоножек от 30 до 354 ног, причём это число может быть разным даже у особей одного вида. Более того, у любой многоножки обязательно нечётное количество пар конечностей, поэтому их может быть 38 или 42, но не 40. В английском же языке устоялись два названия для этих животных — centipede («стоножка» в переводе с латыни) и millipede («тысяченожка»). Причём разница между ними существенна — тысяченожки не опасны для человека, а стоножки очень больно кусаются.', 2, 'Alex', '100kphoto@mail.ru', '2018-03-25 23:04:19', 2),
(6, 'Где жил самый знаменитый холостяк в мире?', 'В 2012 году на одной из исследовательских станций Галапагосских островов скончался самец черепахи по имени Одинокий Джордж, которого называли самым знаменитым холостяком мира. Он считался последним представителем подвида Абингдонских слоновых черепах. Несколько десятков лет учёные пытались найти для него генетически схожую самку из родственных подвидов, но все попытки спаривания заканчивались кладкой нежизнеспособных яиц.', 2, 'Alkoral', 'alkoral@yandex.ru', '2018-03-25 23:06:01', 2),
(7, 'В каком городе практически все жители живут в одном доме?', 'Население городка Уиттиер на Аляске составляет 217 человек. Практически все они живут в одном 14-этажном доме, когда-то служившем казармой. В этом же доме располагаются все необходимые организации — кабинет мэра, больница, полиция, почта, магазин, комната Методистской церкви. Школа расположена отдельно, но соединена с домом тёплым переходом.', 3, 'Alkoral', 'alkoral@yandex.ru', '2018-03-25 23:09:13', 2),
(8, 'Где находится Лукоморье?', 'Лукоморье — это не только сказочная страна из пролога к «Руслану и Людмиле» Пушкина. На западноевропейских картах 16—18 веков Лукоморьем подписывалась местность в Сибири по правому берегу реки Оби. Но ещё раньше в древнерусских летописях так именовали место обитания половцев где-то в низовьях Днепра, а самих половцев называли лукоморцами. В «Задонщине» Лукоморьем названо место, куда отступило войско Золотой Орды после поражения в Куликовской битве, правда, без каких-либо географических деталей.', 3, 'Koral', 'koral-99@yandex.ru', '2018-03-25 23:11:11', 2),
(9, 'Сколько государств имеют флаги без белого, синего или красного цвета?', 'Флаги почти всех государств мира содержат фрагменты белого, синего или красного цвета. Единственным исключением является чёрно-жёлто-зелёный флаг Ямайки.', 3, 'Alex', '100kphoto@mail.ru', '2018-03-25 23:22:07', 2),
(10, 'Есть ли жизнь на Марсе?', NULL, 2, 'Vasya', 'vasya@mail.ru', '2018-04-04 23:59:09', 2),
(11, 'Где находится Кудыкина-гора?', NULL, 3, 'Petya', 'petya@mail.ru', '2018-04-05 00:01:30', 0),
(12, 'На какой планете Солнечной системы сутки длятся дольше года?', NULL, 1, 'Zhora', 'zhora@mail.ru', '2018-04-05 00:15:34', 0),
(13, 'Бывают ли царевны-лягушки?', NULL, 2, 'Иван', 'ivan@mail.ru', '2018-04-06 11:25:36', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
