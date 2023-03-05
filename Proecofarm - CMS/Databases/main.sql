-- phpMyAdmin SQL Dump
-- version 3.5.FORPSI
-- http://www.phpmyadmin.net
--
-- Host: 185.129.138.46
-- Czas wygenerowania: 16 Sie 2022, 22:19
-- Wersja serwera: 8.0.26-16
-- Wersja PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `a5509`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `main`
--

CREATE TABLE IF NOT EXISTS `main` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cel_operacji` text COLLATE utf8_polish_ci NOT NULL,
  `tytul_zdj` text COLLATE utf8_polish_ci NOT NULL,
  `zdj` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `opis_operacji` text COLLATE utf8_polish_ci NOT NULL,
  `sklad_grupy` text COLLATE utf8_polish_ci NOT NULL,
  `budzet` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb3 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `main`
--

INSERT INTO `main` (`id`, `cel_operacji`, `tytul_zdj`, `zdj`, `opis_operacji`, `sklad_grupy`, `budzet`) VALUES
(1, 'Celem operacji jest produkcja najwyższej jakości wołowiny kulinarnej w oparciu o technologię chowu krów mamek w systemie żywienia pastwiskowego na ekstensywnych użytkach zielonych położonych na obszarach cennych przyrodniczo z wykorzystaniem systemu IoT (internetu rzeczy). Zastosowanie do organizacji wypasu stada i podejmowania decyzji systemu informatycznego IoT umożliwi uzyskanie innowacyjnego produktu, technologii, metod organizacji i marketingu oraz wsparcia lokalnego rynku doskonałej jakości wołowiny.', 'Opaski dla bydła – wirtualne ogrodzenie: ', '1.PNG', 'Doskonałej jakości wołowinę kulinarną pozyskuje się w warunkach żywienia pastwiskowego. Do tego celu predysponowane jest młode bydło opasowe, a przede wszystkim technologia krów mamek, od których odsadki stanowią cenny surowiec rzeźny lub mogą być dalej opasane do uzyskania większej masy. Opas ekstensywny bydła może obejmować zarówno byki lub jałówki, jak i wolce, których mięso jest traktowane jako lepsze jakościowo, zaś same zwierzęta są lepiej predysponowane do efektywnego wykorzystania pasz objętościowych. Stosowanie w żywieniu bydła mięsnego runi pastwiskowej posiada bardzo korzystny wpływ na jakość mięsa. W odróżnieniu od żywienia bydła kiszonkami i paszami treściwymi, w mięsie pozyskanym od zwierząt wypasanych na pastwisku stwierdza się zwiększoną zawartość nienasyconych kwasów tłuszczowych, składników o właściwościach antyoksydacyjnych (CLA cis9 trans11, Iso-C15:0, β-karoten, witaminy z grupy B i inne), a także składników mineralnych, m.in. żelaza i cynku. W wielu krajach Europy i świata konsumenci poszukują tego typu wołowiny jako prozdrowotnego produktu spożywczego („green beef”). Ten aspekt, jak i dobrostan zwierząt, przemawiają za większym wykorzystaniem pastwisk w chowie zwierząt, co stało się jednym z priorytetów w polityce rolnej Unii Europejskiej. Pastwisko dostarcza paszy naturalnej, wartościowej oraz dostosowanej do fizjologii trawienia przeżuwaczy. Zorganizowanie efektywnego żywienia pastwiskowego bydła mięsnego nie jest jednak łatwe. Wymaga wiedzy i nakładów materiałowych. Aktualne trendy w użytkowaniu pastwisk polegają na aplikacji innowacyjnych narzędzi wspomagających decyzje, głównie poprzez sterowanie wypasem za pomocą systemu IoT (Internetu rzeczy). Jego kluczowym elementem jest stosowanie wirtualnych ogrodzeń pastwisk. Poprzez technologię GPS i montowane na szyjach zwierząt odbiorniki sygnału fal możliwe jest sterowanie stadem dla lepszego planowania i organizacji wypasu.', '1.Piotr Zajkowski Rolnik\r\n2.Marcin Majewski Rolnik\r\n3.Zachodniopomorski Ośrodek Doradztwa Rolniczego w Barzkowicach\r\n4.Vivende sp. z o.o.\r\n5.Uniwersytet Przyrodniczy w Poznaniu. ', 'Budżet całkowity: 1 635 147,36 zł\r\nKwota pomocy : 1 262 822,00 zł ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
