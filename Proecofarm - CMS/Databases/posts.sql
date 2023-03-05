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
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_polish_ci NOT NULL,
  `heading` text COLLATE utf8_polish_ci NOT NULL,
  `content_poczatek` text COLLATE utf8_polish_ci NOT NULL,
  `content_main` text COLLATE utf8_polish_ci NOT NULL,
  `content_main2` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb3 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id`, `title`, `heading`, `content_poczatek`, `content_main`, `content_main2`) VALUES
(1, 'Realizacja projektu:', 'Badania naukowe:', '    Badania naukowe w ramach operacji ProEcoFarm są prowadzone w gospodarstwach rolnych Marcina Majewskiego oraz Piotra Zajkowskiego na kompleksach łąkowych w Dolinie Środkowej Odry, objętych programem Natura 2000. W operacji przewiduje się zastosowanie innowacyjnej technologii chowu krów mamek wykorzystującej do sterowania stadem system IoT z uwzględnieniem 4 ras bydła (Limousine, Hereford, Polska Czerwona oraz mieszańców mięsnych) po 10 sztuk każda na wydzielonych kwaterach z częścią wspólną dla krów mamek i cieląt oraz z częściami dedykowanymi dla obu tych grup.\r\n     W ramach prac rozwojowych prowadzone są i będą kontynuowane w kolejnych etapach badania łąkarskie, zootechniczne oraz etologiczne/informatyczne.', 'W ramach badań łąkarskich na wyznaczonych stałych powierzchniach badawczych wg Crabbe et al. (2019) przewiduje się:\r\n- ocenę składu botanicznego i wartości użytkowej runi – w okresie wegetacji (raz w miesiącu) i w latach badań, odpowiednio, metodą Klappa i Filipka,\r\n- ocenę struktury runi – w tym celu raz w miesiącu badane są warunki świetlne w runi (promieniowanie fotosyntetycznie czynne nad runią i w runi; wskaźnik LAI - współczynnik powierzchni liści) za pomocą przyrządu Accupar LP-80; wysokość runi (herbometrem Jenquip EC20 Plate Meter); stan żywotności dominant runi za pomocą chlorofilomierza firmy Minolta w wersji N-Tester oraz stan kondycji runi w zakresie NDVI za pomocą przyrządu Field Scout CM 1000,\r\n- ocenę plonowania runi – badania wykonywane są w okresie wegetacji (raz w miesiącu) i w latach badań metodą ukosów próbnych (ramka o boku 0,5 m),\r\n- wycenę produkcyjności pastwiska – za pomocą metody Różyckiego,\r\n\r\n- analizę wartości pokarmowej runi – w jej zakres wchodzi analiza podstawowa (sucha masa, popiół surowy, białko ogólne, tłuszcz surowy, włókno surowe), energia brutto, profil kwasów tłuszczowych, karoteny; przygotowanie materiału do analiz poprzedzone jest suszeniem próbek runi w kontrolowanych warunkach (suszarnia komorowa Bindera) i ich zmieleniem młynem tnącym.\r\nPonadto na obiektach badawczych prowadzone są badania siedliskowe określające warunki wzrostu i rozwoju runi pastwiskowej:\r\n- warunki wilgotnościowe gleby w warstwie 0-10 cm (wilgotność objętościowa gleby, niedosyt wilgotności, konduktywność) – za pomocą sondy Delta-T WET Sensor,\r\n- warunki termiczne gleby w warstwie 0-10 cm (temperatura powierzchni czynnej) – za pomocą sondy Delta-T WET Sensor,\r\n- zawartość materii organicznej i makroskładników w glebie, pH gleby – na podstawie próbek zebranych po każdym sezonie pastwiskowym\r\nW okresie prowadzenia badań prowadzony jest także monitoring warunków pogodowych w miejscu operacji za pomocą danych z stacji meteorologicznej zlokalizowanej w pobliżu.\r\n\r\n     W ramach badań zootechnicznych przewiduje się::\r\n- wytyczenie wirtualnego pastwiska i opracowanie harmonogramu wypasu – w oparciu o system VF,\r\n- ocenę współczynnika wykorzystania runi przez zwierzęta – na podstawie badań produkcyjności pastwiska,\r\n- badania smakowitości runi – w oparciu o indeks smakowitości wybranych gatunków runi pastwiska (analiza zgryzów),\r\n- ocenę przyrostów masy zwierząt w sezonie pastwiskowym – na podstawie wyników ważenia cieląt raz w miesiącu.\r\n- analizę jakości poubojowej mięsa – obejmującą analizę podstawowa, cholesterol, witaminę A, profil kwasów tłuszczowych, składniki mineralne, pH i barwę (w systemie CIE: L*, a*, b*, h, C*), zdolność do zatrzymania wody własnej oraz plastyczność, teksturę mięsa: Warner Bratzler i gryzienie (siła maksymalna).\r\nW ramach badań etologicznych/informatycznych przewiduje się:\r\n- badania aktywności żywieniowej krów mamek i cieląt na wirtualnych kwaterach oraz badania etologiczne – w oparciu o system VF.\r\n- analizę danych empirycznych pod kątem wskazania zależności pomiędzy plonem, jakością i wykorzystaniem runi przez pasące się zwierzęta, ich zachowaniem, przyrostami, jakością mięsa wołowego i cechami systemu IoT na tle 4 ras bydła – na podstawie analizy statystycznej danych.', '     W pierwszych dwóch etapach w 2021 roku badania koncentrowały się na charakterystyce składu botanicznego runi pastwisk, siedliska łąkowego, wartości użdddytkowej, plonowania i wartości pokarmowej runi. Szczegółowe badania runi łąkowej stanowiącej bazę paszową dla krów mamek są konieczne, gdyż operacja będzie przeprowadzona na naturalnych kompleksach łąkowych w dolinie rzecznej, których charakterystyczną cechą jest zróżnicowanie szaty roślinnej i podłoża glebowego determinującego niejednorodny potencjał paszowy obiektu.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
