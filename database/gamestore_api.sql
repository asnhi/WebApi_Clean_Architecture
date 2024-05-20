-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 10:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamestore_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'default.webp',
  `publisher_id` int(11) NOT NULL DEFAULT 1,
  `like` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `name`, `description`, `price`, `image`, `publisher_id`, `like`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Plants vs. Zombies GOTY Edition', 'Zombies are invading your home, and the only defense is your arsenal of plants! Armed with an alien nursery-worth of zombie-zapping plants like peashooters and cherry bombs, you\\\'ll need to think fast and plant faster to stop dozens of types of zombies dead in their tracks.', 200000, 'plants-vs-zombies-goty-edition.webp', 1, 920, 'In Stock', '2024-05-05 02:33:07', '2024-05-05 02:33:07'),
(2, 'Bloons TD 5', 'The Bloons are back and better than ever! Get ready for a massive 3D tower defense game designed to give you hours and hours of the best strategy gaming available.', 188000, 'bloons-td-5.webp', 8, 710, 'In Stock', '2024-05-05 03:04:43', '2024-05-05 03:04:43'),
(3, 'Bloons TD 6', 'Five-star tower defense with unrivaled depth and replayability. The Bloons are back in full HD glory and this time they mean business! Build awesome towers, choose your favorite upgrades, hire new Special Agents, and pop every last invading Bloon in the most popular tower defense series in history.', 120000, 'bloons-td-6.webp', 8, 320, 'In Stock', '2024-05-05 03:06:46', '2024-05-05 03:06:46'),
(4, 'test', 'Five-star tower defense with unrivaled depth and replayability. The Bloons are back in full HD glory and this time they mean business! Build awesome towers, choose your favorite upgrades, hire new Special Agents, and pop every last invading Bloon in the most popular tower defense series in history.', 120000, 'bloons-td-6.webp', 2, 300, 'In Stock', '2024-05-07 06:57:01', '2024-05-07 06:57:01'),
(5, 'Cyberpunk 2077', 'Cyberpunk 2077 is an open-world, action-adventure RPG set in the dark future of Night City — a dangerous megalopolis obsessed with power, glamor, and ceaseless body modification.', 990000, 'cyberpunk-2077.webp', 4, 644, 'In Stock', '2024-05-07 10:26:41', '2024-05-07 10:26:41'),
(6, 'ELDEN RING', 'THE NEW FANTASY ACTION RPG. Rise, Tarnished, and be guided by grace to brandish the power of the Elden Ring and become an Elden Lord in the Lands Between.', 800000, 'elden-ring.webp', 17, 630, 'In Stock', '2024-05-10 07:34:25', '2024-05-10 07:34:25'),
(7, 'Azure Striker Gunvolt', 'A 2D action game featuring a young man with the power of lightning who stands for freedom against the evil ambitions of a massive organization. When lightning strikes, a new legend is born.', 165000, 'azure-striker-gunvolt.webp', 15, 630, 'In Stock', '2024-05-10 07:35:55', '2024-05-10 07:35:55'),
(8, 'Azure Striker Gunvolt 2', 'The ultra-refined 2D side-scrolling action you remember from \\\"Azure Striker Gunvolt\\\" is recharged and better than ever! In Gunvolt 2, series anti-hero Copen joins the fray as a playable character! Copy abilities from defeated boss characters and use them as your own!', 188000, 'azure-striker-gunvolt-2.webp', 15, 630, 'In Stock', '2024-05-10 07:37:01', '2024-05-10 07:37:01'),
(9, 'Azure Striker Gunvolt 3', 'The next installment in the high-speed 2D action Gunvolt series is finally here with Azure Striker Gunvolt 3. Balancing both an involving story and satisfying gameplay, Gunvolt 3 is the most extravagant entry in the series yet!', 705000, 'azure-striker-gunvolt-3.webp', 15, 117, 'In Stock', '2024-05-10 07:37:56', '2024-05-10 07:37:56'),
(10, 'Left 4 Dead 2', 'Set in the zombie apocalypse, Left 4 Dead 2 (L4D2) is the highly anticipated sequel to the award-winning Left 4 Dead, the #1 co-op game of 2008. This co-operative action horror FPS takes you and your friends through the cities, swamps and cemeteries of the Deep South, from Savannah to New Orleans.', 142000, 'left-4-dead-2.webp', 7, 81, 'In Stock', '2024-05-10 07:38:47', '2024-05-10 07:38:47'),
(11, 'Persona 5 Royal', 'Don the mask and join the Phantom Thieves of Hearts as they stage grand heists, infiltrate the minds of the corrupt, and make them change their ways!', 1380000, 'persona-5-royal.webp', 5, 740, 'In Stock', '2024-05-10 07:39:34', '2024-05-10 07:39:34'),
(12, 'Starbound', 'The Bloons are back and better than ever! Get ready for a massive 3D tower defense game designed to give you hours and hours of the best strategy gaming available.', 188000, 'starbound.webp', 3, 344, 'In Stock', '2024-05-10 07:40:20', '2024-05-10 07:40:20'),
(13, 'Stray', 'Lost, alone and separated from family, a stray cat must untangle an ancient mystery to escape a long-forgotten cybercity and find their way home.', 319000, 'stray.webp', 9, 206, 'In Stock', '2024-05-10 07:41:05', '2024-05-10 07:41:05'),
(14, 'Valiant Hearts: The Great War™', 'Valiant Hearts : The Great War is the story of 4 crossed destinies and a broken love in a world torn apart. Dive into a 2D animated comic book adventure, mixing exploration, action and puzzles. Lost in the middle of the trenches, play as each of the 4 strangers, relive the War and help a young German', 249000, 'valiant-hearts-the-great-war.webp', 2, 99, 'In Stock', '2024-05-10 07:41:44', '2024-05-10 07:41:44'),
(15, 'Mega Man X Legacy Collection 2', 'Complete the exciting Mega Man X saga with four action-packed titles! This collection showcases the evolution of the series with Mega Man X5, Mega Man X6, Mega Man X7, and Mega Man X8. Test your skills in the new X Challenge mode, which pits players against two deadly bosses at once.', 276000, 'mega-man-x-legacy-collection-2.webp', 12, 661, 'In Stock', '2024-05-10 07:42:35', '2024-05-10 07:42:35'),
(16, 'Mega Man Zero/ZX Legacy Collection', 'Mega Man Zero/ZX Legacy Collection brings together six classic titles in one game: Mega Man Zero 1, 2, 3 and 4, as well as Mega Man ZX and ZX Advent. The collection also features Z-Chaser, an exclusive new mode created just for this set of games.', 550000, 'mega-man-zero-zx-legacy-collection.webp', 12, 338, 'In Stock', '2024-05-10 07:43:44', '2024-05-10 07:43:44'),
(17, 'Mega Man Legacy Collection', 'Mega Man Legacy Collection is a celebration of the 8-bit history of Capcom’s iconic Blue Bomber featuring faithful reproductions of the series’ origins with the original six Mega Man games.', 206000, 'mega-man-legacy-collection.webp', 12, 359, 'In Stock', '2024-05-10 07:44:23', '2024-05-10 07:44:23'),
(18, 'To the Moon', 'A story-driven experience about two doctors traversing backwards through a dying man\\\'s memories to artificially fulfill his last wish.', 142000, 'to-the-moon.webp', 2, 749, 'In Stock', '2024-05-10 07:45:02', '2024-05-10 07:45:02'),
(19, 'Dying Light', 'First-person action survival game set in a post-apocalyptic open world overrun by flesh-hungry zombies. Roam a city devastated by a mysterious virus epidemic. Scavenge for supplies, craft weapons, and face hordes of the infected.', 329000, 'dying-light.webp', 2, 982, 'In Stock', '2024-05-10 07:45:36', '2024-05-10 07:45:36'),
(21, 'Blaster Master Zero', 'Mutant scum never learn! Blaster Master Zero makes its Steam debut! Blaster Master Zero is a 8-bit style top-down & sideview 2D action-adventure game that hearkens back to the golden age of the NES. The game features new gameplay elements such as improved gameplay, and a more robust scenario.', 120000, 'bmz1.webp', 2, 99, 'In Stock', '2024-05-10 07:46:17', '2024-05-10 07:46:17'),
(22, 'Gunvolt Chronicles: Luminous Avenger iX', 'Experience the apeX of 2D action! A new era of 2D action begins now! Get ready for high-speed, stylish 2D side-scrolling action like never before. Inti Creates presents the ultimate in classic 2D action with \"Luminous Avenger iX\"!', 165000, 'laix1.webp', 15, 986, 'In Stock', '2024-05-10 07:47:41', '2024-05-10 07:47:41'),
(23, 'Project Zomboid', 'Project Zomboid is the ultimate in zombie survival. Alone or in MP: you loot, build, craft, fight, farm and fish in a struggle to survive. A hardcore RPG skillset, a vast map, massively customisable sandbox and a cute tutorial raccoon await the unwary. So how will you die? All it takes is a bite..', 260000, 'project-zomboid.webp', 2, 970, 'In Stock', '2024-05-10 07:48:17', '2024-05-10 07:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `game_genre`
--

CREATE TABLE `game_genre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` int(11) NOT NULL DEFAULT 1,
  `game_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `game_genre`
--

INSERT INTO `game_genre` (`id`, `genre_id`, `game_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, NULL, NULL),
(2, 2, 3, NULL, NULL),
(3, 3, 2, NULL, NULL),
(4, 3, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Action', NULL, NULL),
(3, 'Co-op', NULL, NULL),
(4, 'RPG', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cd_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_id` int(11) NOT NULL DEFAULT 1,
  `is_redeemed` tinyint(1) NOT NULL DEFAULT 0,
  `is_expired` tinyint(1) NOT NULL DEFAULT 0,
  `expire_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `cd_key`, `game_id`, `is_redeemed`, `is_expired`, `expire_date`, `created_at`, `updated_at`) VALUES
(1, 'MmRVTFNBZEJkSlhmMnBUZWtpUTk0SmtxQ2dVTFl3NGlNVkxIT09UbUNKem8rR2JpTXlsWlpVMWhKOWNXa2JkeA==', 1, 0, 0, NULL, '2024-05-01 15:03:24', '2024-05-01 15:03:24'),
(2, 'dU1CMk1xbjJkaG9ZNzdidVJ2Q1krOG1oMWJyR080a3I3VkU3RCsxUEc3bHo2VWRRTUFxUU5uVHR5Um5vQWhVag==', 1, 0, 0, NULL, '2024-05-01 15:03:24', '2024-05-01 15:03:24'),
(3, 'VVZITUdpVTk5UER6cCtUMkZmWkZxK3pDbjJGSU1oU0NDZk5jV1ptKzVUNVY2NjB0aVpjM1NDN21TY0IwdEJ2cw==', 1, 0, 0, NULL, '2024-05-01 15:04:25', '2024-05-01 15:04:25'),
(4, 'am52bVQxMFE1MDN3MmtZYUcyNVZTZVpkQXdnYzBzRnlOL0Qxbk8ycVZkczk3NlpPS25EWU83czB5WExzbGNMSA==', 1, 0, 0, NULL, '2024-05-01 15:04:25', '2024-05-01 15:04:25'),
(5, 'Y2tseUJYWEhJcmZWU3hINzdJaVQvY1YxRHJtckdHanQ5ZktqUFYvYzh5eVRrbXQwYUVEOEd6VjZFVmU2ajRQMA==', 1, 0, 0, NULL, '2024-05-01 15:05:00', '2024-05-01 15:05:00'),
(6, 'blhQVXlJTThiTExpSU9FbEtNcTU1L2hEdE9kbHN4QmVrbmVvNm5UenhJOD0=', 2, 0, 0, NULL, '2024-05-01 15:05:00', '2024-05-01 15:05:00'),
(7, 'bENTWkhhNnp2RFhmMmZPck0yMEdjL21xK0Zoc3JOV3o2dVBia0dObHgybz0=', 2, 0, 0, NULL, '2024-05-01 15:05:28', '2024-05-01 15:05:28'),
(8, 'L0FDb3FmcGlGZXQ5T3hiYXZFT082MzZtSHJpTms0WHF2M2ZRL0ptMXB2MD0=', 2, 0, 0, NULL, '2024-05-01 15:05:28', '2024-05-01 15:05:28'),
(9, 'S3FDQUpQZnlTaUNtaEhIMWhuWHJ1UTlZcTliTmxQTmxmTXpWbTVSSXZsRT0=', 2, 0, 0, NULL, '2024-05-01 15:06:01', '2024-05-01 15:06:01'),
(10, 'bllFSExCTVh5cVdaZ2ZsQitEZ3Jib1pacG9XdG83dWFjMlBkU3hUZDlOND0=', 2, 0, 0, NULL, '2024-05-01 15:06:01', '2024-05-01 15:06:01'),
(11, 'OG5FMHNyc2IwOFp0bUF2OXBzMk9uMEg1UUZCTWtZamNDMmFrQUZJU0thTT0=', 2, 0, 0, NULL, '2024-05-01 15:06:27', '2024-05-01 15:06:27'),
(12, 'Q0RUNzJnYnM5N3NPSFJOK1dxZWVwWm9URHlWK1VQR2dNenZ0S0NxWlkyQT0=', 3, 0, 0, NULL, '2024-05-01 15:06:27', '2024-05-01 15:06:27'),
(13, 'TFpVSVE3cG5XNDAwNHk1OUk4Y2tTUUlDWkUwOG5wOVBGUHlUcysrbmFXMD0=', 3, 0, 0, NULL, '2024-05-01 15:06:56', '2024-05-01 15:06:56'),
(14, 'WVgydFdWdmZoRWVvckZaYTRDdEgybnFDaXB4U1pnOFpSQmxHeFlWSnFIa1BOeEI4TExsR2NWSUh6bDFlWi9QTQ', 3, 0, 0, NULL, '2024-05-01 15:06:56', '2024-05-01 15:06:56'),
(15, 'N2tPRmptaDdFR1VVcFVSaGUxZ0xjR3dzNUlsdTFVZ1hoUHVRdm9QUUE5YU5zOXBmVVBGMnpOVHcwM1krNDNRMg==', 3, 0, 0, NULL, '2024-05-01 15:07:22', '2024-05-01 15:07:22'),
(16, 'Mkg5YjRpU1NuU3BLTE5YYXNDNlJIa1JYL0ZTRlN4RWVncldlWG5OY1JUWEtHZVJJNGdyWWIvZFg5Ymc2L3FDVg==', 3, 0, 0, NULL, '2024-05-01 15:07:22', '2024-05-01 15:07:22'),
(17, 'ck9pUkJNNndqVCtqL1l4TXJMNDFmMWFySVJHWWFrOWJtS2RzUlRHNDFKZ1l0Tlo3ZmpqWWhwWFBqTVd3bkF2Rg==', 3, 0, 0, NULL, '2024-05-01 15:07:47', '2024-05-01 15:07:47'),
(18, 'Z2wwdTRsbXdHLzI2VEtMWGkzQTdMeDFkMStOcDZVbzk1ZHVESVh4OHFNc0pjcUFGTk9LN0FOZTAremhseVJJUg==', 4, 0, 0, NULL, NULL, NULL),
(19, 'Q2pnb0RHUUFQbXlQdzBwMFFxYnVOdVVpMzZYaWtvU2NoUktmNFVTcHc5b3hmU25OYlZEN2tLa09VYzZnM28xOA==', 4, 0, 0, NULL, '2024-05-01 15:08:13', '2024-05-01 15:08:13'),
(20, 'U1J1VmRCTTV3LzZqQ1BiRjRKTDcxVWwrcCtBVE5ncjhTVlFwT05iTjIxMkRHLzExbFc4Y09seVJ2alhkZlhZSw==', 4, 0, 0, NULL, '2024-05-01 15:08:13', '2024-05-01 15:08:13'),
(21, 'aUQyMmxocFdmMVdoZmJGVVhyWkphKytXMzVtVXhkTVd3SEFqNnZwdGhmK0Y3cFpnS0YzOVFhUE5YcHQ2bTMzTw==', 4, 0, 0, NULL, '2024-05-01 15:08:39', '2024-05-01 15:08:39'),
(22, 'MWRHU04zYnIveDlDcmxDMFpEeDdaSmVmeE5ZdmFnNmZwK09HRnVPc25ZcWNDWSt0dEZOOVhwV1JRakhMM0tWdw', 5, 0, 0, NULL, '2024-05-01 15:08:51', '2024-05-01 15:08:51'),
(23, 'L0t4SGxxYktrUis0ZndBdUF6ZythbGxsVCsyM0JHZDNkdFg4Rjh4bXBZUm1BZER6d2puVndNK2JmR3lFWlNjNQ==', 5, 0, 0, NULL, '2024-05-01 15:08:51', '2024-05-01 15:08:51'),
(24, 'RE4vblFaL3M4U3NjY2dkNEF0SmhrY1prYlM5VHVzMytpNXQrV3o5b1paYVpxelpxb2JwdkQwWU5EbCs1U1JuOQ==', 5, 0, 0, NULL, '2024-05-01 15:09:21', '2024-05-01 15:09:21'),
(25, 'dGdJemM4SGJKSDdoZ0J4b0tudjkrMkt2blQwZTkyeGMzUnhvRXY5bnZJNGRaamNiOURIOU5mZjFocmhGbHFzRQ==', 5, 0, 0, NULL, '2024-05-01 15:09:21', '2024-05-01 15:09:21'),
(26, 'aVlWaG1nTUhHbXdDMkpaaFBPVHBIWTBHM0t5WjMwRWQ3WjZ4eHhEVkVNMD0=', 5, 0, 0, NULL, '2024-05-01 15:09:47', '2024-05-01 15:09:47'),
(27, 'cklqL0hlcC9SRGVRZ1J5SDVGUmpMWWZjdXUyRHpaV205NmFoNkV1YU1BTT0=', 6, 0, 0, NULL, '2024-05-01 15:09:47', '2024-05-01 15:09:47'),
(28, 'NXhIMTc3MngvT2ViRVZkcXVYN09DcGFYWkNuQUprN0pOejRINWpvVTE4TT0=', 6, 0, 0, NULL, '2024-05-01 15:10:24', '2024-05-01 15:10:24'),
(29, 'K1R5eiswL0NjaTIvUWZiN1VXaTM1aDlGOXdMWUR4OENLZHFiL2l4VUNyOD0=', 6, 0, 0, NULL, '2024-05-01 15:10:24', '2024-05-01 15:10:24'),
(30, 'Wjl3RFpnZFFUWnFLeER5TStaMDkvWTIvU2YxQmxJK0FiWlVjNUFmQVdKMD0=', 6, 0, 0, NULL, '2024-05-01 15:10:51', '2024-05-01 15:10:51'),
(31, 'MDFseHV5MEk1R0FLOUEySW4wMWswQVZ4aFlZTXdYTktOUHhITXJXenZpRT0=', 6, 0, 0, NULL, '2024-05-01 15:10:51', '2024-05-01 15:10:51'),
(32, 'MktEZUFrZkxZc1RTYUIxOGFzTFV4MXpoMmpwMHZwNGloQWQxcXRXUjZscz0=', 7, 0, 0, NULL, '2024-05-01 15:11:15', '2024-05-01 15:11:15'),
(33, 'cUZOM0hIdTdEUHo0dTY0eFJyUmVRZHdCK2FxWG4rNFhGWFVTclBsNFZlcz0=', 7, 0, 0, NULL, '2024-05-01 15:11:15', '2024-05-01 15:11:15'),
(34, 'MWg2ZmFONlNRaTVvajNFakEzOXdETTFjb2YrVHFjMUFMdW1YVE50WVNrTT0=', 7, 0, 0, NULL, '2024-05-01 15:11:39', '2024-05-01 15:11:39'),
(35, 'em1nNUp6NFNUSk1VeXdhYjk2N21JM2VSZy9CMG5qQTQrRjY0bi9IeW1kWT0=', 7, 0, 0, NULL, '2024-05-01 15:11:39', '2024-05-01 15:11:39'),
(36, 'RnU1R1RLRXVHWmpVVXNvdDJrNDJaQkMvQ3ptaldad1F2Rlc2KzdKOFYzTT0=', 7, 0, 0, NULL, '2024-05-01 15:12:08', '2024-05-01 15:12:08'),
(37, 'M2hzMkhteE45cVdJZmJWVGNGYlVZa013ZUpUenFOV3NSV1d4VmVCeXQ4Yz0=', 8, 0, 0, NULL, '2024-05-01 15:12:08', '2024-05-01 15:12:08'),
(38, 'TzV4dER0aEcvQ0U1c0RLRUUvVUxYNWxlRXB6QTRDSlEzZ0ZIbGFqMktmdjgzbUVwRzFJeElzY3UvMUhHdDQwbw==', 8, 0, 0, NULL, '2024-05-01 15:13:01', '2024-05-01 15:13:01'),
(39, 'NDdUVDNkR25KemVDdnVldjNaUzh0bmJMKzdNa3ZnYWNweXpWS1c5V1dGYlBSVW1JMWQyaDAyTXk2N1hDdGV6cQ==', 8, 0, 0, NULL, '2024-05-01 15:13:01', '2024-05-01 15:13:01'),
(40, 'Zm9oU0NXNWV0Zm4ydFl5NTRrWTRZMy9qVUIyVFc0WXdlQklvcGc4TXhoUDFSYXJiclg4V1gwREpSeWZBTlErWQ==', 9, 0, 0, '2024-05-01 22:13:27', '2024-05-01 15:13:27', NULL),
(41, 'NWtId0Q5WE5pdmcrZFdUQ0RSY1U2OGJFM1ByVjIzSENHWTR5cURDQnFOVEdNMWdMZTFFMm5uYVhqdkZsN2FXVQ==', 9, 0, 0, NULL, '2024-05-01 15:13:27', '2024-05-01 15:13:27'),
(42, 'WS9iUTdUU2lvbU92Skh5NHlWbFlWQ1RQa1RsTTlrdGV2UXBvRElLQWtpc2pFVUpRLzRxNXFjT1BFNjBDUTBFYQ==', 9, 0, 0, NULL, '2024-05-01 15:13:53', '2024-05-01 15:13:53'),
(43, 'a284M1RLZytFVExPaURtZ0U4emxGajl1TS9MYkthNWR3elVoQzh4YWRYSTB6TVBxKzBXRUk2M1VXU2I1NDQxTA==', 10, 0, 0, NULL, '2024-05-01 15:13:53', '2024-05-01 15:13:53'),
(44, 'K1dPK2ZnSGV0WUpET1RTWi9zcGtaa3AxZXJETjd5R0g3ZExuMjNTRHF6RHNaaVVpWnVEQWM2cEkvTXpDVlhUdQ==', 10, 0, 0, NULL, '2024-05-01 15:14:17', '2024-05-01 15:14:17'),
(45, 'SFVibTVFZm00QmRudS9nWHhPb04vTVZPSEZYQVZVQms0Y2VqRXd2eEprSVUzcitRQ2hzY0g1UjdPY1lZUDZYSQ==', 10, 0, 0, NULL, '2024-05-01 15:14:17', '2024-05-01 15:14:17'),
(46, 'dUpCTXJNZEsxVE1VU0xlcWkrZDhmOXRwV2hWQ1dzM0RVV3J1WjlMM2d1dzJ6M2dRMFNwZkZDZWhFb3pNRTdLcg==', 10, 0, 0, NULL, '2024-05-01 15:14:44', '2024-05-01 15:14:44'),
(47, 'UlVUeFNyamsxYWxlZnRlRndTdno3U2dnalRYMzZuclVGZ2JoVlNRTjRqTTBseVRtRzQvTkVBVXdXUzI5QnFkTQ==', 11, 0, 0, NULL, '2024-05-01 15:14:44', '2024-05-01 15:14:44'),
(48, 'SlF1c1FKTHV5eU9EL0N3QzIzSW84U2VHNWJmbXowekVMOEJaSzdiVTkzVjVwa05JUHA1cURNd2d1VE1lVk1RNQ==', 11, 0, 0, NULL, '2024-05-01 15:15:33', '2024-05-01 15:15:33'),
(49, 'YVMvcThtKzBBNjZ4Z2FnTFlpN3lFS09wcWovUTBJditPMVVQZlVsbGZaMUVjVGFQZnZ6YkZna2t3V0k1VGZXUg==', 11, 0, 0, NULL, '2024-05-01 15:15:33', '2024-05-01 15:15:33'),
(50, 'WnBiZlIzTU9mZWVKWXlMTGtVMDlteEEwRnV0bUVQbmwwajZYempkd1RwYTBTOFVaa2hHZkhTY04zbmlzMUU2dg==', 11, 0, 0, NULL, '2024-05-01 15:15:54', '2024-05-01 15:15:54'),
(51, 'ZFp5eTRkTEE2MzgzTm1jS0dzNEdNVmxRTElvS1E3SlRwc0RnTVg0SDlZT2tjQUYrQnB2b1hMTWFsU3JMNG9teg==', 11, 0, 0, NULL, '2024-05-01 15:15:54', '2024-05-01 15:15:54'),
(52, 'bGdWdUloRjFIUDQrYUNpODRjVlFjQmpEZzMvY2RlZXNoQWlUZWRFazF3M3hRUXUyRlhVVjJ2b1FOWUprcjRsZQ==', 12, 0, 0, NULL, '2024-05-01 15:16:17', '2024-05-01 15:16:17'),
(53, 'YTNEMlFGbnVNZXAxb0dJS1grazRwV3ZjTGlzWU1IajFLOUJTOFlwMk1XWllTeWN3Z0ptMWZMTXBrNXRvWTZWdQ==', 12, 0, 0, NULL, '2024-05-01 15:16:17', '2024-05-01 15:16:17'),
(54, 'MzlVeG1YaDltNlJyYXd6NjNIQjZWbk9HS2F4clJPVHdhUVhPVENQQW5UbWVkVyt2WVF3ZlIwNEFCQTYvZXpxQw==', 12, 0, 0, NULL, '2024-05-01 15:16:42', '2024-05-01 15:16:42'),
(55, 'YVhrRTNVZHdMUzFpV3g3cG4wUFJlMWlkTWdEQkRwYkc4STROR1dHbU1WRnZoalV3Um5hbWIwQUhPRXBjcE9ZbA==', 12, 0, 0, NULL, '2024-05-01 15:16:42', '2024-05-01 15:16:42'),
(56, 'WmxSeXlIemhKSTZKMUNaWkJXcW14NnJzWXVpMUg4RVRwa1RPMmhWbEc4QlhTVGpPMlprMlZveW5PampkVGlZdg==', 13, 0, 0, NULL, '2024-05-01 15:17:06', '2024-05-01 15:17:06'),
(57, 'amNHUk9qUVdSYTFIRUlGbTJxNldCdU9UWEJsZm1Zc0kyNkZBU3E4VGdjQnJIM0xRQldyWDhkTGV6TnlWanNDVA==', 13, 0, 0, NULL, '2024-05-01 15:17:06', '2024-05-01 15:17:06'),
(58, 'b0l6OVJSZTZhRitVRGxTclRlY1poMjNYdTh1SFdCUFZBT1lYMlpxdEhIND0=', 13, 0, 0, NULL, '2024-05-01 15:17:39', '2024-05-01 15:17:39'),
(59, 'YldMV2xNcTV0TjJ1WFZISG9YZnRlRkoxRUhQTXovWnRaMGtmbTJpeEFQTT0=', 13, 0, 0, NULL, '2024-05-01 15:17:39', '2024-05-01 15:17:39'),
(60, 'RFc0eTZ0STBLK1piVmY3VkZCSll4azBjS0JNVE9QZGVqOXU1dGNrcC9JOD0=', 13, 0, 0, NULL, '2024-05-01 15:18:04', '2024-05-01 15:18:04'),
(61, 'REJaSXNJbUVTd0pBYzFNZ1prT0drV0JZU2U5bmRDOTdvYXcyMFlTWUxXTT0=', 14, 0, 0, NULL, '2024-05-01 15:18:04', '2024-05-01 15:18:04'),
(62, 'WW9tTXJHVDltdHBob2Zva0ozZVIwRHJXMVhyVzBIaDFmd0JVM3dTK0Q0WT0=', 14, 0, 0, NULL, '2024-05-01 15:18:29', '2024-05-01 15:18:29'),
(63, 'S3YzVm1FeEZnVzVxMUh1TTB4TXNDeWJ2VDU3THJ6bTg4S0MrQmZTZWh5VThQV01jNXJQeU4yaS90cDlNV0o0ZA==', 14, 0, 0, NULL, '2024-05-01 15:18:29', '2024-05-01 15:18:29'),
(64, 'cndRdEhwTGlKL1N4bUZkQnIyWlIzTnRPd1ZpdWVyUDdQdEk4VW16UVBKdGhsOWhYSzJNSXIzcElPemhjcXV0MA==', 14, 0, 0, NULL, '2024-05-01 15:19:02', '2024-05-01 15:19:02'),
(65, 'YnJOQ2M5NHFoK0xsbmVWckprcnpTT0VTcHU4a25sTXBVdkduYU1OekpDUnRpVTdRRktmaVZhWE54TFdkQk1PNw==', 14, 0, 0, NULL, '2024-05-01 15:19:02', '2024-05-01 15:19:02'),
(66, 'UzRCOVdOMk0xQ2M5ZXlQamM3L1o4TTZkWVhHek8rOGQ5K3dqRTBzeWFPa0J1amI5Rk9pZnhjV3YvMGZ1ZFZRMw==', 15, 0, 0, NULL, '2024-05-01 15:19:23', '2024-05-01 15:19:23'),
(67, 'ZFd3Ylp3TU5xSTA4cG5ZeVdCclJ6aThsY2JSNG5FSDlvcTNRNEltclFWci94VWlrRVZxSDJZYmFBWEdwejdJVQ==', 15, 0, 0, NULL, '2024-05-01 15:19:23', '2024-05-01 15:19:23'),
(68, 'bGJkSDcwTjQ0VitRNkRyL0M5SnczK0tzRVBjNnpJYVpyaTg4M3JaWFZBN2dkOHFKMkZhU2YxRVNBYy8vUklKQg==', 15, 0, 0, NULL, '2024-05-01 15:19:52', '2024-05-01 15:19:52'),
(69, 'akJGZkxnS0pQMVcyUFpZODNjUHN4MkFyWlZnc1hyaFJZc1RVblJMRWRYVkVmN3FJZHBlZXZsVHcrakJyZ0J3cQ==', 16, 0, 0, NULL, '2024-05-01 15:19:52', '2024-05-01 15:19:52'),
(70, 'UmZRSkk2cHYyNzM2RWhFYmI3SzQyT3JUcElaWjBleW52RktsVEVSM0Q3Yz0', 16, 0, 0, NULL, '2024-05-01 15:20:16', '2024-05-01 15:20:16'),
(71, 'VGl4eDJ5MTEydHJoUWI0OWlBOFRMbUhqMFBZdU5XTmptOWl2ZXcxaldmND0=', 16, 0, 0, NULL, '2024-05-01 15:20:16', '2024-05-01 15:20:16'),
(72, 'V3hpbU1sOGR4YnFMSlJheXNzRGZ6YWFRWVFSNnZNL0Qwa3N5MUF0MWtLVT0=', 16, 0, 0, NULL, '2024-05-01 15:20:39', '2024-05-01 15:20:39'),
(73, 'clVuMGM4N2JCRm93cU1VOEc4ZnJ2S1ZqYlR6aU82bDAvY2cyR0RjbTBvWT0=', 16, 0, 0, NULL, '2024-05-01 15:20:39', '2024-05-01 15:20:39'),
(74, 'ZnVvR3BRem9WZVdocUVqSW1MenRwOXo3L3RBOTdLL0hjaTZiY3JlUjZHTT0=', 16, 0, 0, NULL, '2024-05-01 15:21:00', '2024-05-01 15:21:00'),
(75, 'Y0twVXRCV0J2YmE0Ylo2clY3WVJxMmxIVTBhT0lINklaWDdPN25IZ2lTQT0=', 17, 0, 0, NULL, '2024-05-01 15:21:00', '2024-05-01 15:21:00'),
(76, 'eDVySlA4bzN1bUR3ZlR3Ynp0RWU4OTlyL0trM014RklSWlVucWtWazRmaz0=', 17, 0, 0, NULL, '2024-05-01 15:21:38', '2024-05-01 15:21:38'),
(77, 'L0pnb0NSY1h1bjRFMGRRVkxHS3BlUGdjS25KblJUQXRneEpTTUdENXJnND0=', 17, 0, 0, NULL, '2024-05-01 15:21:38', '2024-05-01 15:21:38'),
(78, 'cktvcUFsQ0JRTExUOHhTWUY2TVNBbm1zRlZRWFVWcUgyQUNpUGZIYXU0MD0=', 17, 0, 0, NULL, '2024-05-01 15:22:15', '2024-05-01 15:22:15'),
(79, 'UnkyQjhwcXczR0RzekIzWEJTWGRpV01uRHJXRVU1bDhwTW03U2doQXExaz0=', 18, 0, 0, NULL, '2024-05-01 15:22:15', '2024-05-01 15:22:15'),
(80, 'QllOYlluS1hCU2NJTVFyUkI0QXZUeUtXTXl0OTc4SmF1VGRxNGQvQVUydz0=', 18, 0, 0, NULL, '2024-05-01 15:22:44', '2024-05-01 15:22:44'),
(81, 'cU1MUXBHMHE5YitId2xsVUJadjZXeWRTMWJIUDN0aE54MEFiZDJDb1R2RT0=', 18, 0, 0, NULL, '2024-05-01 15:22:44', '2024-05-01 15:22:44'),
(82, 'V3U0TnlpR042L0poZ0Zjb0xZOG5yUFNUemlJc1lCTTNUMVJGNUVMdzErbz0=', 18, 0, 0, NULL, '2024-05-01 15:23:10', '2024-05-01 15:23:10'),
(83, 'R3hHU3pMN21NMEY1RlVTcmtMcTZvQ3FJL0daL0tYR3lFN2pxeDFvSGJzZz0=', 19, 0, 0, NULL, '2024-05-01 15:23:10', '2024-05-01 15:23:10'),
(84, 'd3d6bFVnUjB2cytEcEZXV1NGOE55YjRyTHByMHNCSVZPb01SSUIwQ1F6az0=', 19, 0, 0, NULL, '2024-05-01 15:23:37', '2024-05-01 15:23:37'),
(85, 'M1lxZGJwVWpXdm1EZFMzcU5UbGUzdmU0YUZhRnY1QW9Tazd6REJ0OW81UT0=', 19, 0, 0, NULL, '2024-05-01 15:23:37', '2024-05-01 15:23:37'),
(86, 'WGdUUmVCdjdRdmpOUTVyZzRoYUJiUVp4ckRLdFJvdFgrcHNOUHAyeE9Edz0=', 19, 0, 0, NULL, '2024-05-01 15:24:04', '2024-05-01 15:24:04'),
(87, 'ZG9XZGZnUXNNM0RsWGFyUHc4U2lTelRiSktMd0laWEtYYTFYeGZ6bDl6TT0=', 20, 0, 0, NULL, '2024-05-01 15:24:04', '2024-05-01 15:24:04'),
(88, 'UWxjQ2M2ZTIyaytYMGVLOVpyd2NWbWFtdFhQdHF3aXV2RS92SS9kK2h5MD0=', 20, 0, 0, NULL, '2024-05-01 15:24:31', '2024-05-01 15:24:31'),
(89, 'SUFyM1BJQlpnS1N0ZkI1NTAxQjRGMEN5Slp4MmJFKzdnSkQ3QUMzRmpEQT0=', 20, 0, 0, NULL, '2024-05-01 15:24:31', '2024-05-01 15:24:31'),
(90, 'L2tBTmtoa01YMjBnQmdmNnR4U0FEK1BVVVFOdkdQU3JJRkxHc29yeEdGbz0=', 20, 0, 0, NULL, '2024-05-01 15:25:03', '2024-05-01 15:25:03'),
(91, 'YWd1c1M4VFJyVFJLdEtpR3lxaSt3VExkQ1JHU095eXJYODdsR1pJL0RSbz0=', 21, 0, 0, NULL, '2024-05-01 15:25:03', '2024-05-01 15:25:03'),
(92, 'c1Fjcjd0T3VRa1Bua0hpaSt6aVo4aDNMZE9PU1RLRFdGcFl6L0h5OUttMD0=', 21, 0, 0, NULL, '2024-05-01 15:25:28', '2024-05-01 15:25:28'),
(93, 'QmdQTGpOTlN5ZGloSWFER1UxclBxNHpMVjRvZVFsRHFhNTBuSStGRyt1Zz0=', 21, 0, 0, NULL, '2024-05-01 15:25:28', '2024-05-01 15:25:28'),
(94, 'b0ZVdWFvMlZyOFVsem9pb3NseDBvc2VMNy9CTnJqa1BZL0wwODZzUEV2Zz0=', 21, 0, 0, NULL, '2024-05-01 15:27:50', '2024-05-01 15:27:50'),
(95, 'Um5DeWpwNlQ5emtKQW9CQ1FSY3dWNFdDcStMem9zTEUvb1FBMWszNS8vUT0=', 21, 0, 0, NULL, '2024-05-01 15:27:50', '2024-05-01 15:27:50'),
(96, 'WS9wZ3JzSnpLZDNPQU93Ti84bzVIZFU0UzIwdmJ4WGgwUFRXTDhRaVNwUT0=', 21, 0, 0, NULL, '2024-05-01 15:28:14', '2024-05-01 15:28:14'),
(97, 'RU5nTkVJbWEzRWZxbFFDbjhtVkJzZCs3NHRGQ0ZLOGJkcTNQY05oRnAzcz0=', 22, 0, 0, NULL, '2024-05-01 15:28:14', '2024-05-01 15:28:14'),
(98, 'c3I0UkpJcmhTTkJYQ3pRdFVmWlFTcVNqMFJNNjE2UW80WmpZWG9aTzlEbz0=', 22, 0, 0, NULL, '2024-05-01 15:28:41', '2024-05-01 15:28:41'),
(99, 'eW8xQVUrbnRKVHRIUVphcUhpT0FQdTgrNzF4MDUzNVRjck0rTUt5ME1YZz0=', 22, 0, 0, NULL, '2024-05-01 15:28:41', '2024-05-01 15:28:41'),
(100, 'WUlUSVR2MG9Nb0FXNWFVMzFRd0VkTmFndXpBYW5TYk9VUVZLOEVVbEMxRT0=', 22, 0, 0, NULL, '2024-05-01 15:29:10', '2024-05-01 15:29:10'),
(101, 'MFcyMnNTWi9tVmNkdkRrcG82L0JjYmYxT2F2cWJXZ21HTkFMcmxqTmZmZz0=', 22, 0, 0, NULL, '2024-05-01 15:29:10', '2024-05-01 15:29:10'),
(102, 'TFlIaWxqZFIyS2RuTmVsTWJ6bEN6d1g0NWRUOEwwWlh3c2xCUjhtM2lrND0=', 22, 0, 0, NULL, '2024-05-01 15:29:36', '2024-05-01 15:29:36'),
(103, 'Y2pjNHBxZUNuRDE1TWlXbDhmQk9vSnBydHJSOVY2Q1llaWI4VUpMb3NrOD0=', 23, 0, 0, NULL, '2024-05-01 15:29:36', '2024-05-01 15:29:36'),
(104, 'T1VzcFREUXUvWmR1MDg5ZGxlV3d0Snd0dmNRdVNTS093VGJEaE1qT3E5Zz0=', 23, 0, 0, NULL, '2024-05-01 15:30:08', '2024-05-01 15:30:08'),
(105, 'blJ0MW10RWNHUXVsbmFLUktTc0I5L0U5U24wai9TT2FyaDdNRlFod1Q5QjdtNmN3VEdKdXJ0VmVFRFRLNHh3Ng==', 23, 0, 0, NULL, '2024-05-01 15:30:08', '2024-05-01 15:30:08'),
(106, 'WWd0QUQ5RHNVelZQQVl3Nk1UeTFKTkwzdmRJNW8waE5JcVVVdGc1SllBOXFNSjErNnY4Y3hZTk9GdFBWdjlrcA==', 23, 0, 0, NULL, '2024-05-01 15:30:55', '2024-05-01 15:30:55'),
(107, 'WDNtOHAxdC9xMmtXalUvK1QrWnR6OUVCNFpxWVhOdGI0anNiSnFkb1paSmF5c3NuT3JCOEs4Z1ZQWEJmUVRxQg==', 23, 0, 0, NULL, '2024-05-01 15:30:55', '2024-05-01 15:30:55'),
(108, 'UDZxTHIzWjUxZkFRK0FGcU5TQmpIeWgyNVhVa2pWRDV4V2wzUzMvS05mcy9iZEpGd3k1c0RSdmdLbGQ3TUVFcQ==', 23, 0, 0, NULL, '2024-05-01 15:31:18', '2024-05-01 15:31:19'),
(109, 'a2pGcGw3ZEo1TkpxaXM1cGZKMGpJMjU0MkpueHFoTGJQMnlHNjF0VTZJNmpNOGNXM29nVDkvc2taN0ZMc2tRMQ==', 23, 0, 0, NULL, '2024-05-01 15:31:19', '2024-05-01 15:31:19'),
(110, 'b3ljY0hoaVhXVU54K1FvMElMMlN2cEYyTUV1czlkd2xEZURMWWVWdjY2cVdhbHdJbHhnME16SW1BSzZzRGlVMA==', 24, 0, 0, NULL, '2024-05-01 15:31:42', '2024-05-01 15:31:42'),
(111, 'TS81UjhRck1VUVBBQzk4SlhVWEF1WFRVL0FpWEJpUUZla3FyZ0psd09LTmlmN0MyNHBsa0ZNV1hic3JkSTc2dA==', 24, 0, 0, NULL, '2024-05-01 15:31:42', '2024-05-01 15:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2024_05_04_182112_create_publishers_table', 7),
(22, '2024_04_13_082332_create_genres_table', 8),
(23, '2024_05_05_075223_create_game_genre_table', 8),
(24, '2024_05_05_080043_create_games_table', 8),
(25, '2024_05_07_091938_create_users_table', 9),
(27, '2024_05_09_102137_create_order_details_table', 10),
(28, '2024_05_09_151734_create_orders_table', 11),
(29, '2024_05_10_104022_create_keys_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `total` double NOT NULL,
  `order_status` enum('Pending','Done','Canceled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `pay_type` enum('VNPAY') COLLATE utf8_unicode_ci NOT NULL,
  `order_id_ref` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `order_status`, `pay_type`, `order_id_ref`, `created_at`, `updated_at`) VALUES
(1, 1, 360000, 'Done', 'VNPAY', 'AHjscmk', '2024-05-01 16:17:27', '2024-05-01 16:17:27'),
(2, 2, 600000, 'Done', 'VNPAY', 'DMhksa', '2024-05-01 16:18:05', '2024-05-01 16:18:05'),
(3, 3, 333333, 'Done', 'VNPAY', 'GFBdvsfb', '2024-05-01 16:39:43', '2024-05-01 16:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 1,
  `game_id` int(11) NOT NULL DEFAULT 1,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Re-Logic', '2024-04-30 18:26:44', '2024-04-30 18:26:44'),
(2, 'PopCap Games', '2024-05-01 14:51:13', '2024-05-01 14:51:13'),
(3, 'Chucklefish', '2024-05-01 14:53:54', '2024-05-01 14:53:54'),
(4, 'CD PROJEKT RED', '2024-05-01 14:54:05', '2024-05-01 14:54:05'),
(5, 'SEGA', '2024-05-01 14:54:05', '2024-05-01 14:54:05'),
(6, 'Klei Entertainment', '2024-05-01 14:54:30', '2024-05-01 14:54:30'),
(7, 'Valve', '2024-05-01 14:54:30', '2024-05-01 14:54:30'),
(8, 'Ninja Kiwi', '2024-05-01 14:55:49', '2024-05-01 14:55:49'),
(9, 'BlueTwelve Studio', '2024-05-01 14:55:49', '2024-05-01 14:55:49'),
(10, 'Ubisoft', '2024-05-01 14:56:11', '2024-05-01 14:56:11'),
(11, 'Supergiant Games', '2024-05-01 14:56:11', '2024-05-01 14:56:11'),
(12, 'CAPCOM', '2024-05-01 14:56:51', '2024-05-01 14:56:51'),
(13, 'tobyfox', '2024-05-01 14:56:51', '2024-05-01 14:56:51'),
(14, 'ConcernedApe', '2024-05-01 14:57:08', '2024-05-01 14:57:08'),
(15, 'INTI CREATES', '2024-05-01 14:57:08', '2024-05-01 14:57:08'),
(16, 'Mojang', '2024-05-01 14:57:28', '2024-05-01 14:57:28'),
(17, 'FromSoftware Inc', '2024-05-01 14:57:28', '2024-05-01 14:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'testuser@gmail.com', NULL, NULL, '$2y$10$JM0gQWOJE890C0WUOLjppefd8rGWcNq.eQljYvAiNwiCXsvSrHuMy', NULL, '2024-05-07 02:21:45', '2024-05-07 02:21:45'),
(2, 'test1', 'testuser1@gmail.com', NULL, NULL, '$2y$10$oiImbxxuiXescck5WmB/mui3Mb9i21n1RiUsv8yoQ9mI2PG87ajsK', NULL, '2024-05-07 05:50:52', '2024-05-07 05:50:52'),
(3, 'test2', 'testuser2@gmail.com', NULL, NULL, '$2y$10$YliZkZpj8Iw1iV4izxFhP.KNnj0vUBnxIVTTautExaQppERBz.ghu', NULL, '2024-05-07 07:00:39', '2024-05-07 07:00:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `games_name_unique` (`name`);

--
-- Indexes for table `game_genre`
--
ALTER TABLE `game_genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genres_name_unique` (`name`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keys_cd_key_game_id_unique` (`cd_key`,`game_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `publishers_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `game_genre`
--
ALTER TABLE `game_genre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
