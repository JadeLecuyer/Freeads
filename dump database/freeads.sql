-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 27 fév. 2021 à 16:02
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `freeads`
--

-- --------------------------------------------------------

--
-- Structure de la table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('Accomodation','Fashion','Furniture','Jobs','Leisure','Motors','Multimedia','Pets','Services') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ads`
--

INSERT INTO `ads` (`id`, `title`, `category`, `description`, `picture`, `price`, `location`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 'White bike for adult', 'Leisure', 'I am selling my bike, in good condition, adult standard size', 'img/ads/1614265724.jpg', 50, 'Paris', 1, '2021-02-25 14:08:44', '2021-02-25 14:08:44'),
(6, 'French lessons', 'Services', 'Hello, I am a french student living in London, and I offer french lessons, online or face to face', 'img/ads/1614266036.jpg', 100, 'London', 1, '2021-02-25 14:13:56', '2021-02-25 14:13:56'),
(7, 'Admin ad test', 'Pets', 'Admin ad test', 'img/ads/1614266116.jpg', 32, 'Auckland', 2, '2021-02-25 14:15:16', '2021-02-25 14:15:16'),
(8, 'Test number x', 'Accomodation', 'Lorem ipsum dólór sit amet certa constringendos dolor epicureis generibusque habet inane iudicabit quaerimus reliquaque. Aequitatem cognitioque collegisti consuevit delapsa, egregios exaudita faciunt locupletiorem mél, profectus ullum. Ardore cónstituit cuius deterruisset etenim, interiret misérum opus póenis sapientia, se susceperant terminari usqué vulputaté. \r\n\r\nAegritudines finitás latinis malum oblivioné, rebum seiungi tractavissent voluptati. Assueverit efficitur fugiat grate ille, incidunt inveneris stabilique umquam. Accessió accurate accusantibus dicitur diligi dissentiunt fit fugiéndis postulant tractavissent. Ad augendas dictum errór facere iisque quamvis servátá tollit velim. Acri augué litterae nisi, posse próbantur tántopere veniát veserim viam voluérint.', 'img/ads/1614267041.jpg', 140, 'Lyon', 1, '2021-02-25 14:30:41', '2021-02-25 14:30:41'),
(9, 'Another test again', 'Jobs', 'Lorem ipsum dolor sit, amet audire consilia cura, detracto effecerit fana legerint pecuniae perturbatur posteri refugiendi! Aliquip civitatis discedere expedita incommoda, libidinosarum morbi nomini opera prima, quanti voluptates? Approbantibus cursus dominorum mundi, porrecta priventur rationem spernat! Accessio contumeliae credo existimare incorrupte laudem multi necessitatibus nulla poena posse proficiscuntur. \r\n\r\nCupidatat dicitis explicari iniurias? Ac cepisse cupio eamque labitur, legendi penatibus potione quidque sentio? Conveniunt reprehensiones requietis scipio! Amicitia consilia consulatu delectus exercitationem fastidii flagitem id interpretaris maluisset mirari probarent putant quosdam stabilem. Commemorandis deorsus eosdem eximiae naturalem nomini perfunctio quantaque vocet volutpat! Gravioribus illum incorruptis lucilius, oritur probabis referrentur scaevolam si. Cepisse corrigere dolore erunt, gaudere grate opinionum ornatus primum putas sustulisti tenetur tritani?', 'img/ads/1614267098.jpg', 453, 'Los Angeles', 1, '2021-02-25 14:31:38', '2021-02-25 14:31:38'),
(10, 'Apple Macbook', 'Multimedia', 'I am selling my old computer, in good condition, bought in 2018', 'img/ads/1614267231.jpg', 750, 'New York', 1, '2021-02-25 14:33:51', '2021-02-25 14:33:51'),
(17, 'Holidays in the mountain', 'Leisure', 'We are a travel agency offering a 2 weeks holiday in the Swiss Alps etc ...', 'img/ads/1614435404.jpg', 1200, 'Switzerland', 8, '2021-02-27 13:16:44', '2021-02-27 13:16:44'),
(18, 'A new test', 'Fashion', 'Corrigere ego inanitate laudari praesentium quaerendi scripta. Commemorandis conformavit impetum nomini, nunc perspicuum tantam. Bono earum error inliberali, interea mucius negent nostrud, porta rhoncus timeret triario. Aptior assum conscientiam eorumque erroribus, integris istam mnesarchum sustulisti. Accedere amicitia excruciant fructuosam ista magni me morbis nostri utraque zenonem. \r\n\r\nAliud cyrenaicisque doctrinis eram, felis neglexerit praetorem quamque, quid robustus tale tuentur. Aliquo bonae collegi difficilius erga erroribus illustribus insolens iudicat laudantium maecenas quae sapientia stultus torquent. Certa gratissimo modus seditiones. Benivole cupiditate ficta interpretum, ipsi iusto perspici.', 'img/ads/1614435499.jpg', 580, 'Paris', 8, '2021-02-27 13:18:19', '2021-02-27 13:18:19'),
(19, 'Some more tests', 'Motors', 'Corrigere ego inanitate laudari praesentium quaerendi scripta. Commemorandis conformavit impetum nomini, nunc perspicuum tantam. Bono earum error inliberali, interea mucius negent nostrud, porta rhoncus timeret triario. Aptior assum conscientiam eorumque erroribus, integris istam mnesarchum sustulisti. Accedere amicitia excruciant fructuosam ista magni me morbis nostri utraque zenonem. \r\n\r\nAliud cyrenaicisque doctrinis eram, felis neglexerit praetorem quamque, quid robustus tale tuentur. Aliquo bonae collegi difficilius erga erroribus illustribus insolens iudicat laudantium maecenas quae sapientia stultus torquent. Certa gratissimo modus seditiones. Benivole cupiditate ficta interpretum, ipsi iusto perspici.', 'img/ads/1614435625.jpg', 260, 'Canada', 8, '2021-02-27 13:20:25', '2021-02-27 13:20:25'),
(20, 'Ski holiday', 'Leisure', 'What is covid ?', 'img/ads/1614435758.jpg', 1500, 'Courchevel', 8, '2021-02-27 13:22:38', '2021-02-27 13:22:55'),
(21, 'One more test', 'Furniture', 'Lorem ipsum dolor sit amet, beate cogitémus exitum expectant firmissima frequenter infinitum possum quicquam scientia voluptati! Haec intemperantes iudicatum labefactant máiorem, mándámus moléstié nótiónem pecunias susciperet tradidisse vitam voluerint! Arbitrium deterruisset etiamsi molestum. \r\n\r\nádversárium arbitrór consentientis pertineant via? Arbitror dégéndaé interiret ipsas liberó, possit quisquam scribimus sero stare suscipere? Ceterórum corporis discipliná imperitos laudari, máecenás minimum putemus quocirca sollicitare!', 'img/ads/1614435949.jpg', 999, 'Toronto', 8, '2021-02-27 13:25:49', '2021-02-27 13:25:49');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_23_163816_users', 2),
(5, '2021_02_23_164411_create_users_table', 3),
(6, '2021_02_23_180943_create_users_table', 4),
(7, '2021_02_23_181405_create_users_table', 5),
(8, '2021_02_24_175646_create_ads_table', 6),
(9, '2021_02_24_195936_create_users_table', 7);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `email_verified_at`, `password`, `nickname`, `phone`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jade', 'jade.lecuyer@gmail.com', NULL, '$2y$10$TvyQHH9HJiB3kzkiNdm.cuGKPsKGn.RYyy4i1Wq9NgZu3SSgEncYa', 'Jade', '0643868807', 0, NULL, '2021-02-24 19:01:49', '2021-02-27 12:46:31'),
(2, 'Admin', 'queensansasnark@gmail.com', NULL, '$2y$10$YwbjJmov18JJVDgmo4URn.nVtWSJXl2PUDNJdRu21asWgtDYuOlLu', 'Admin', '0643868807', 1, NULL, '2021-02-25 12:22:46', '2021-02-25 12:22:46'),
(8, 'User', 'user@user.com', NULL, '$2y$10$yLftsfT/Cu07oxPNmFwXZuP6Qj8cE/6luZWCOfLq3p1f9h28J3HNq', 'User', '0643865628', 0, NULL, '2021-02-27 13:10:59', '2021-02-27 13:10:59');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_login_unique` (`login`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
