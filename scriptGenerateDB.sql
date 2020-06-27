CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL,
  `dominio` text NOT NULL,
  `servidor` text NOT NULL,
  `titulo` text NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `palabras_claves` text NOT NULL,
  `portada` text NOT NULL,
  `logo` text NOT NULL,
  `icono` text NOT NULL,
  `redes_sociales` text NOT NULL,
  `sobre_mi` text NOT NULL,
  `sobre_mi_completo` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `blog` (`id`, `dominio`, `servidor`, `titulo`, `direccion`, `email`, `telefono`, `descripcion`, `palabras_claves`, `portada`, `logo`, `icono`, `redes_sociales`, `sobre_mi`, `sobre_mi_completo`, `fecha`, `updated_at`) VALUES
	(1, 'https://eventos.cronista.com', 'https://eventos.cronista.com', 'Eventos Corporativos El Cronista Comercial', 'Av. Paseo Colón 746 Piso 1 | 1063ACU | CABA | Argentina', 'damian.arzani@gmail.com', '011 4121-9250', 'www.cronista.com', '["logistica","plataforma admin","mercaderias","dep\\u00f3sitos","distribuci\\u00f3n","produccion"]', 'img/blog/572.png', 'img/blog/527.png', 'img/blog/312.png', '[{"url":"https://www.facebook.com","icono":"fab fa-facebook-f","background":"#1475E0"},{"url":"https://www.instagram.com","icono":"fab fa-instagram","background":"#B18768"},{"url":"https://www.twitter.com","icono":"fab fa-twitter","background":"#00A6FF"},{"url":"https://www.youtube.com","icono":"fab fa-youtube","background":"#F95F62"},{"url":"https://linkedin.com","icono":"fab fa-linkedin-in","background":" #0E76A8"}]', '<div class="sobreMi">\r\n					\r\n					<h3><span style="font-size: 1rem;">Completar texto intro sobre la empresa - Completar info</span><br></h3><p><br></p><p>MODO PRODUCCION dominio secrojas.com</p>\r\n\r\n				</div>', '<h1 class="heading-main text-left wow fadeInDown" data-wow-duration="0" data-wow-delay="0s" style="margin-bottom: 70px; font-family: Montserrat, sans-serif; font-weight: 700; color: rgb(255, 53, 20); font-size: 2.25rem; animation-name: fadeInDown; background-color: rgb(250, 250, 250); visibility: visible; animation-delay: 0s;">Titulo a completar</h1><p><span style="font-size: 1rem;">Información detallada de la empresa, alcance, funcionalidades y demas.</span></p><p>Información detallada de la empresa, alcance, funcionalidades y demas.<span style="font-size: 1rem;"><br></span><br></p>', '2020-03-12 00:25:33', '2020-03-12 03:25:33');

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_destacado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar_linea1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lugar_linea2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script_mapa` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destacado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen_agenda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `eventos` (`id`, `nombre`, `nombre_destacado`, `color`, `descripcion`, `lugar_linea1`, `lugar_linea2`, `tel1`, `tel2`, `email`, `facebook`, `twitter`, `youtube`, `instagram`, `linkedin`, `script_mapa`, `url`, `published_at`, `activo`, `destacado`, `estado`, `imagen_agenda`, `created_at`, `updated_at`) VALUES
	(0, 'EVENTO-SIN-DEFINIR', 'SIN-DEFINIR', '#000000', 'SIN-DEFINIR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN-DEFINIR', '2020-03-03 16:14:49', 'NO', 'NO', 'SECUNDARIO', 'NO', NULL, NULL),
	(1, 'SEMINARIO PYMES BA', '#PymesBA', '#034EA2', '21 de Abril • 08.30 a 13.00<br>La Rural, Predio Ferial de Buenos Aires<br>Sala Ceibo', 'La Rural, Predio Ferial de Buenos Aires', 'Juncal 4431, CABA', '011 4121-9250', '011 4121-9250', 'comercial@cronista.com', 'https://www.facebook.com/Cronistacomercial/', 'https://twitter.com/Cronistacom', 'https://www.youtube.com/user/Cronista', 'https://www.instagram.com/diariocronista/', 'https://www.linkedin.com/company/114509', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3285.047877011061!2d-58.42105199999999!3d-34.5776551!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb59c850e602d%3A0xd154a29ea52f2558!2sJuncal%204431%2C%20C1425BAA%20CABA!5e0!3m2!1ses-419!2sar!4v1583982576489!5m2!1ses-419!2sar" style="border:0;" allowfullscreen=""></iframe>', 'seminario-pymes-ba', '2020-03-12 00:00:00', 'SI', 'SI', 'PRINCIPAL', 'NO', NULL, '2020-03-12 03:13:47');

CREATE TABLE IF NOT EXISTS `files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `logistica_id` int(10) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `files` (`id`, `logistica_id`, `url`, `created_at`, `updated_at`) VALUES
	(1, 3, 'Edición y carga de videos - After Effect - Youtube - Plataforma web.docx', '2019-12-11 19:28:36', '2019-12-11 19:28:36'),
	(2, 1, 'Partida-Nacimiento-Josephine.pdf', '2019-12-11 19:28:47', '2019-12-11 19:28:47');

CREATE TABLE IF NOT EXISTS `fotos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sponsor_id` int(10) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `fotos` (`id`, `sponsor_id`, `url`, `created_at`, `updated_at`) VALUES
	(11, 9, 'xTahtDOFzeTBJkT2WypF2zGKiGC0auLkKBkNXUJc.png', '2020-02-28 11:58:12', '2020-02-28 11:58:12'),
	(12, 10, '1KOdCmxTJYPcJRO9D9IFo9leG99rMjVEI1D9IomY.png', '2020-02-28 11:59:17', '2020-02-28 11:59:17'),
	(13, 1, 'EfoEZkUdEP3f2hq2BXhJcKLO1NcjAgR6bxfpEDej.png', '2020-02-28 11:59:40', '2020-02-28 11:59:40'),
	(14, 2, 'Enp6bugpQtJfHdon91Xa50u7bUypzRHzny0LmdBr.png', '2020-02-28 11:59:55', '2020-02-28 11:59:55'),
	(15, 3, 'YcKsQqsr07ECROMYyF3z05MzNo1E8ToL4ZDgbKos.png', '2020-02-28 12:00:05', '2020-02-28 12:00:05'),
	(16, 5, 'J7Chd858tgPKL0zOdKZzlZ8aCBwOoesv4UcOmtla.png', '2020-02-28 12:00:19', '2020-02-28 12:00:19'),
	(17, 6, 'NvtckICECeVUg19VGstaBFlYFtwAd6yn8v56RTjb.png', '2020-02-28 12:00:28', '2020-02-28 12:00:28'),
	(18, 4, '6TsXx9D4UDgLz0vxvQ8xzWBLw7669Doq4EYpm5m0.png', '2020-02-28 12:00:44', '2020-02-28 12:00:44'),
	(19, 8, 'TXgXj0KrfPI4Tbk6iIVI0q6U0s7i1dyaWqtNRnyj.png', '2020-02-28 12:00:55', '2020-02-28 12:00:55'),
	(20, 7, '0igNq00ysaHntsXBhPpdIg1SSANHmQxjB4a5DoP4.png', '2020-02-28 12:01:07', '2020-02-28 12:01:07'),
	(21, 13, 'YWF9YOiHFH0Cm786j1S772Fjtono9dGJczNlJH8i.png', '2020-03-12 15:04:45', '2020-03-12 15:04:45');


CREATE TABLE IF NOT EXISTS `movies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `video_id` int(10) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `movies` (`id`, `video_id`, `url`, `created_at`, `updated_at`) VALUES
	(2, 1, '4Qh7vWbIv41i7oyOA2tM040KEGVK4d6vemnmG0dw.png', '2020-02-23 18:50:06', '2020-02-23 18:50:06'),
	(4, 3, 'UPDQ7zFu3mOxQPsSG1VNxllGZ0H6trjbLw66anPw.png', '2020-02-28 15:43:00', '2020-02-28 15:43:00'),
	(5, 2, 'fMSp9GWwspt5gnczqBgSltCxz1YHsXNqvnrOyFuK.png', '2020-02-28 15:43:16', '2020-02-28 15:43:16'),
	(6, 4, 'y7crb6QdyszjvxHtetymljIlBsTMnEWPUaCJgL95.png', '2020-03-12 02:48:55', '2020-03-12 02:48:55'),
	(7, 5, '0m7OKEufs1ncxLMb7nxScV47OWahLV4zDfPxlypd.png', '2020-03-12 02:54:15', '2020-03-12 02:54:15');

CREATE TABLE IF NOT EXISTS `personas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evento_id` bigint(20) unsigned NOT NULL,
  `activo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personas_evento_id_foreign` (`evento_id`),
  CONSTRAINT `personas_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `photoes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `evento_id` int(10) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `photoes` (`id`, `evento_id`, `url`, `created_at`, `updated_at`) VALUES
	(1, 1, '91VHlUuuQUBBjZf7EuT5KbWiM6UQheaxjWnt7ns1.jpeg', '2020-02-27 19:25:47', '2020-02-27 19:25:47'),
	(7, 1, 'XPVGSc2esXJsWNocP90qrg1jiT79UIZdN9DQA7iH.png', '2020-02-27 19:43:29', '2020-02-27 19:43:29'),
	(10, 2, '90JbTMFHsOYR4pFc6FpY5ruTXZ4eZYppJfP88vry.jpeg', '2020-02-28 15:53:27', '2020-02-28 15:53:27'),
	(11, 3, 'q2EYX3ztY46vxjC6txwZmE4SDox7ol4kQVSo8gtG.jpeg', '2020-02-28 15:53:39', '2020-02-28 15:53:39'),
	(12, 6, 'hy2uyjHLHt1OtYt0ZP3hJDPA0NXPfq6kI50XwTiU.jpeg', '2020-02-28 18:20:48', '2020-02-28 18:20:48'),
	(13, 7, 'ZWqvS8H916PRumNCbPlwLv3ffb60PYbdQVvlUCgi.jpeg', '2020-02-28 18:24:44', '2020-02-28 18:24:44'),
	(15, 3, 'kU1HVb3kDwAyVpowlx8NEL4dZ7o9aarAmxqJEZNV.jpeg', '2020-03-02 01:44:15', '2020-03-02 01:44:15'),
	(16, 9, 'tKnuJ4wQ8UvLJuinB2VtYqpvVM0CaMdbqsqrVbqI.jpeg', '2020-03-02 03:24:05', '2020-03-02 03:24:05'),
	(17, 8, 'KiUvGZmbcSS6JeLVGrcw7q3qT86iiWlBKAAgoQnC.jpeg', '2020-03-02 03:24:57', '2020-03-02 03:24:57'),
	(18, 10, 'FlWOneLbY0vr1HPfMdZ9AujijrDRNwm1pLfPphXF.jpeg', '2020-03-02 03:25:16', '2020-03-02 03:25:16'),
	(19, 11, 'NScZpcaDLpMoq2JO9Gq0TKHE2WLEfZF32fO9Axdt.jpeg', '2020-03-02 03:25:30', '2020-03-02 03:25:30'),
	(20, 12, 'gEHrkyW3BM3ibxBLtRy4Mb6QlTvrezeJNgTQvi1u.jpeg', '2020-03-02 03:25:52', '2020-03-02 03:25:52'),
	(21, 13, 'J5IJZSjyd3muu6ZFaeuhaMv7dkdI3ObeBcKu5tGX.jpeg', '2020-03-02 03:26:14', '2020-03-02 03:26:14'),
	(22, 14, '7N4jZE17zWBCvgVi1H27UyLMxVNnp9CZiCYLegzz.jpeg', '2020-03-02 03:26:31', '2020-03-02 03:26:31'),
	(23, 15, 'PIXae6megsReGytrz1yZRAzaVvgOrQdTJ6Rseav3.jpeg', '2020-03-02 03:26:52', '2020-03-02 03:26:52'),
	(24, 16, 'yA4GPDfls3V8crpc4DWGhBRguJCB1BHuIQ9eEOx7.jpeg', '2020-03-02 03:27:07', '2020-03-02 03:27:07'),
	(25, 17, 'auKe6xktTCtve4LfkfPCOqPJeufNFuLoOkiGyUPn.jpeg', '2020-03-02 03:30:29', '2020-03-02 03:30:29'),
	(26, 18, 'TNfI48ZzC2ZD4tJJSqerFlu4QC3T41eIChMdafxl.jpeg', '2020-03-02 03:31:40', '2020-03-02 03:31:40'),
	(27, 19, '5RPXw7YhYt0ICcblwUTmui0OFUMRxH5HeSbmUsVQ.jpeg', '2020-03-02 03:32:05', '2020-03-02 03:32:05'),
	(28, 20, 'euIKRcaTIgsFjxBx2azLiNFlE5DOGIMI5afe1vx6.jpeg', '2020-03-02 03:34:38', '2020-03-02 03:34:38'),
	(29, 22, '7gk6rBMvvkAec0YaxxynGSeQzwhX2INl4aed0JxN.jpeg', '2020-03-02 03:35:05', '2020-03-02 03:35:05'),
	(30, 21, 'MoqhbOWmLjw4M17HwycecJOu3Xc3bu9M9lKpwGxa.jpeg', '2020-03-02 03:35:25', '2020-03-02 03:35:25'),
	(31, 2, 'TmnHWcceZxLDCoBFkpPkqxa99cea5mNUvPRLkmWl.png', '2020-03-02 04:09:16', '2020-03-02 04:09:16'),
	(32, 23, 't1qALwbQUMEEZKs6JpvBl4VnguKsosVkOfX0O4RL.jpeg', '2020-03-09 14:46:32', '2020-03-09 14:46:32');

CREATE TABLE IF NOT EXISTS `photops` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `photops` (`id`, `post_id`, `url`, `created_at`, `updated_at`) VALUES
	(1, 1, 'j8eiaY1dWGLc09PspnOqGh9e25jXY1PSaL25VcGo.png', '2020-02-26 02:07:04', '2020-02-26 02:07:04'),
	(2, 2, 'ehuBh6BEQPcRJg9Sc7FOAqgj5Hfwb46POoOEBcPU.png', '2020-02-26 02:20:37', '2020-02-26 02:20:37'),
	(3, 3, 'oK0osEqSkujSX4fwYL7UKuaDVBEFuPYAB7oen9pp.png', '2020-02-26 02:21:13', '2020-02-26 02:21:13'),
	(4, 6, 'AtipAU3cDX5VbnwSg0Wk6nU6kVxwSDijdoQ7kuBS.png', '2020-02-26 18:06:33', '2020-02-26 18:06:33'),
	(5, 6, 'MbHs3M7cne3yjYOm4KE6M8L6oB1vcLynf93hrlQv.png', '2020-02-28 12:04:41', '2020-02-28 12:04:41'),
	(6, 8, 'Z0qvOtBflM20hcH0nwqYLazq8RvFyT4K4GZ616qH.png', '2020-02-28 12:08:11', '2020-02-28 12:08:11'),
	(7, 9, 'gb7rYef0yWG7XW5L3WIbC5ALuNWZYtrzvkWCrlkl.png', '2020-02-28 12:13:19', '2020-02-28 12:13:19'),
	(8, 10, 'AWlrdx6HFVamYc1NOWMqj1Iz0hmvwCb7X8FafqNA.png', '2020-02-28 12:14:01', '2020-02-28 12:14:01'),
	(9, 11, 'sGHiFDlGuIEMgxMwTJjqxn32Q0wMBEzjLXNYOby7.png', '2020-02-28 12:22:05', '2020-02-28 12:22:05'),
	(10, 12, 'Haqmgll7alaifcdL86upv3x7fIwpgtFQ0aKXCnJG.jpeg', '2020-03-02 04:00:11', '2020-03-02 04:00:11');

CREATE TABLE IF NOT EXISTS `photos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `speaker_id` int(10) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `photos` (`id`, `speaker_id`, `url`, `created_at`, `updated_at`) VALUES
	(4, 1, 'IoWsPkKig1Bc2wY5CMgxdHz4lolcCXHUQOoA0pHv.png', '2020-02-22 19:57:05', '2020-02-22 19:57:05'),
	(5, 2, '8ZXUgggOLTXEYy4xJIjqCCFnPSgX6yiQYV7eh2gS.png', '2020-02-22 19:57:20', '2020-02-22 19:57:20'),
	(6, 3, '0uI7V1Zlq9u9Q3yxnLrHmleJY3gQDAIUKS4TFswa.png', '2020-02-22 19:57:33', '2020-02-22 19:57:33'),
	(7, 4, '2mhf60JIbpLysRRvEW34i50brf9J9t3WO0O0RTGw.png', '2020-02-22 23:11:09', '2020-02-22 23:11:09'),
	(8, 6, 'D6eGlbGKt8R7DoxNvR4Eg8sLPvAWO5kOpIYCjoAh.png', '2020-02-27 22:11:27', '2020-02-27 22:11:27'),
	(9, 7, 'jrP1uL19d61FefHk0fRoGpZuUX1INp6o1aWsxGHP.png', '2020-02-28 11:34:48', '2020-02-28 11:34:48'),
	(10, 12, 'A5TvuPu2a1Qp4Qlcs0vKIqiQckXH9VnQQeN6rQbI.png', '2020-02-28 11:39:40', '2020-02-28 11:39:40'),
	(11, 11, '4XuGw7wUSxLWqBe3ddepE2emGrwByi4BK6szdqoh.png', '2020-02-28 11:39:55', '2020-02-28 11:39:55'),
	(12, 13, 'r7LSNdkPZ1bD2qs5JvKUsLx34bXqWVj1H6sjPeR5.png', '2020-02-28 11:40:03', '2020-02-28 11:40:03'),
	(13, 8, 'YpWNx2JSKAj0P4vkZtWOKmLxNgVfheGvlmyyS0yZ.png', '2020-02-28 11:40:20', '2020-02-28 11:40:20'),
	(14, 10, 'X9wl6yVYvVRiqjF4YJexXlWtm1JhQTda4sgCefqi.png', '2020-02-28 11:40:32', '2020-02-28 11:40:32'),
	(15, 14, 'd06LUCkGEcDHqqcLwtWRz8wyrKJkjm6AWOp5X8G2.png', '2020-02-28 11:40:42', '2020-02-28 11:40:42'),
	(16, 9, 'S3xqGcPkVXaGdGS6e7HX1LH9mPHpEOoufC66v81a.png', '2020-02-28 11:40:56', '2020-02-28 11:40:56');

CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` mediumtext COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `evento_id` bigint(20) unsigned NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `activo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destacado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_evento_id_foreign` (`evento_id`),
  CONSTRAINT `posts_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `posts` (`id`, `title`, `url`, `intro`, `body`, `evento_id`, `published_at`, `activo`, `destacado`, `created_at`, `updated_at`) VALUES
	(8, 'Suplemento Especial del Evento', 'suplemento-especial-del-evento', 'Con cada edición del evento PYMES Buenos Aires se publica un suplemento de cobertura que podes descargar.', 'Con cada edición del evento PYMES Buenos Aires se publica un suplemento de cobertura que podes descargar desde <u><a href="https://www.cronista.com/tumarcaen360/REF_ECC_TRIPTICO_A4_FEB2020.pdf" target="_blank">Aquí.</a></u><br><span style="color: rgb(255, 0, 0);"></span>', 1, '2020-02-28 00:00:00', 'SI', 'SI', '2020-02-28 12:06:19', '2020-02-28 12:11:28'),
	(9, 'Archivo histórico del Seminario PYMES BA', 'archivo-historico-del-seminario-pymes-ba', 'Recopilamos las notas y entrevistas más importantes acontecidas durante los Eventos de PYMES Buenos Aires.', 'Recopilamos las notas y entrevistas más importantes acontecidas durante los Eventos de PYMES Buenos Aires. No te las pierdas, hace <u><a href="https://www.cronista.com/tags/Seminario%20Pymes%20Buenos%20Aires" target="_blank">click aquí.</a></u><br>', 1, '2020-02-28 00:00:00', 'SI', 'SI', '2020-02-28 12:12:04', '2020-02-28 12:33:58'),
	(10, 'Cobertura en Redes Sociales', 'cobertura-en-redes-sociales', 'La previa y post del Seminario PYMES Buenos Aires desde las redes sociales.', '#PymesBA2020<br><br>La previa y post del Seminario PYMES Buenos Aires desde las redes sociales. <br><br>Faceboook: <a href="https://www.facebook.com/Cronistacomercial/" target="_blank">@Cronistacomercial</a><br>Twitter: <a href="https://twitter.com/Cronistacom" target="_blank">@Cronistacom</a><br>Instagram: <a href="https://www.instagram.com/diariocronista/" target="_blank">@diariocronista</a><br><br>', 1, '2020-02-28 00:00:00', 'SI', 'SI', '2020-02-28 12:13:41', '2020-02-28 12:16:05'),
	(11, '#PymesBA', 'pymesba', 'No te pierdas la cobertura especial del Seminario Pymes Buenos Aires haciendo click en el Hashtag #PymesBA', 'No te pierdas la cobertura especial del Seminario Pymes Buenos Aires 2020 haciendo click en el Hashtag #PymesBA', 1, '2020-02-29 00:00:00', 'SI', 'NO', '2020-02-28 12:19:21', '2020-02-28 20:50:57');

CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'PERFIL ADMIN', '2019-07-23 15:36:27', '2019-07-23 15:36:27'),
	(3, 'cliente', 'PERFIL CLIENTE', '2019-07-23 15:36:27', '2019-07-23 15:36:27');

CREATE TABLE IF NOT EXISTS `speakers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `orden` int(11) unsigned NOT NULL DEFAULT '0',
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `puesto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destacado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evento_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_speakers_eventos` (`evento_id`),
  CONSTRAINT `FK_speakers_eventos` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `speakers` (`id`, `orden`, `nombre`, `descripcion`, `puesto`, `facebook`, `twitter`, `linkedin`, `activo`, `destacado`, `evento_id`, `created_at`, `updated_at`) VALUES
	(0, 0, 'SIN ORADOR', 'SIN ORADOR', 'SIN ORADOR', NULL, NULL, NULL, 'NO', 'NO', 0, NULL, NULL),
	(7, 2, 'JUAN J. LLACH', 'Profesor IAE-Universidad Austral', 'Profesor IAE-Universidad Austral', NULL, NULL, NULL, 'SI', 'SI', 1, '2020-02-28 11:34:12', '2020-02-28 11:34:28'),
	(8, 3, 'JOSE MARIA SEGURA', 'Economista Jefe PWC ARGENTINA', 'Economista Jefe PWC ARGENTINA', NULL, NULL, NULL, 'SI', 'SI', 1, '2020-02-28 11:35:06', '2020-02-28 11:35:20'),
	(9, 4, 'MIGUEL KIGUEL', 'Director ECONVIEWS', 'Director ECONVIEWS', NULL, NULL, NULL, 'SI', 'SI', 1, '2020-02-28 11:35:28', '2020-02-28 11:35:40'),
	(10, 5, 'JUAN CURUTCHET', 'Presidente BAPRO', 'Presidente BAPRO Presidente BAPRO Presidente BAPRO Presidente BAPRO Presidente BAPRO Presidente BAPRO Presidente BAPRO', NULL, NULL, NULL, 'SI', 'SI', 1, '2020-02-28 11:36:19', '2020-02-28 11:56:06'),
	(11, 6, 'FERNANDO ONTIVEROS', 'Director comercial American Express Global Commercial Services', 'Director comercial American Express Global Commercial Services', NULL, NULL, NULL, 'SI', 'SI', 1, '2020-02-28 11:36:34', '2020-02-28 11:36:48'),
	(12, 7, 'ALEJANDRO PEREZ', 'Gerente General ADEBA', 'Gerente General ADEBA', NULL, NULL, NULL, 'SI', 'SI', 1, '2020-02-28 11:37:16', '2020-02-28 11:38:16'),
	(13, 8, 'GERARDO DÍAZ BELTRÁN', 'Presidente CAME', 'Presidente CAME', NULL, NULL, NULL, 'SI', 'SI', 1, '2020-02-28 11:37:34', '2020-02-28 11:37:57'),
	(14, 9, 'MARIANO MAYER', 'Secretario de Emprendedores y PyMEs de La Nación', 'Secretario de Emprendedores y PyMEs de La Nación', NULL, NULL, NULL, 'SI', 'SI', 1, '2020-02-28 11:38:03', '2020-02-28 11:41:17'),
	(15, 10, 'PEREZ DAMIAN', 'PEREZ DAMIAN', 'PEREZ DAMIAN', NULL, NULL, NULL, 'NO', 'NO', 1, '2020-03-05 15:28:52', '2020-03-05 15:31:14'),
	(16, 11, 'DAMIAN ARZANI', 'DAMIAN ARZANI', 'DAMIAN ARZANI', NULL, NULL, NULL, 'SI', 'NO', 0, '2020-03-09 14:58:24', '2020-03-09 14:58:24');

CREATE TABLE IF NOT EXISTS `sponsors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destacado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evento_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sponsors_evento_id_foreign` (`evento_id`),
  CONSTRAINT `sponsors_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `sponsors` (`id`, `nombre`, `empresa`, `activo`, `destacado`, `evento_id`, `created_at`, `updated_at`) VALUES
	(2, 'Bayton', 'Bayton', 'SI', 'SI', 1, NULL, '2020-03-12 15:12:50'),
	(3, 'BigBox', 'BigBox', 'SI', 'NO', 1, NULL, '2020-02-17 15:22:12'),
	(4, 'Grader', 'Grader', 'SI', 'NO', 1, '2020-02-17 15:22:28', '2020-02-17 15:22:28'),
	(5, 'Came', 'Came', 'SI', 'NO', 1, '2020-02-17 15:22:55', '2020-02-17 15:22:55'),
	(6, 'Copileidy', 'Copileidy', 'SI', 'NO', 1, '2020-02-17 15:23:40', '2020-02-17 15:23:40'),
	(7, 'PWE', 'PWE', 'SI', 'NO', 1, '2020-02-17 15:24:04', '2020-02-17 15:24:04'),
	(8, 'Provincia Seguros', 'Provincia Seguros', 'SI', 'NO', 1, '2020-02-17 15:24:49', '2020-02-17 15:24:49'),
	(9, 'American Express', 'American Express', 'SI', 'NO', 1, '2020-02-17 15:25:18', '2020-02-17 15:25:18'),
	(10, 'Coca Cola', 'Coca-Cola Company', 'SI', 'NO', 1, '2020-02-26 17:56:01', '2020-02-26 17:57:35'),
	(13, 'OFICIAL', 'Macro', 'NO', 'SI', 1, '2020-03-12 15:03:10', '2020-03-12 15:05:02');

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL DEFAULT '3',
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1287 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `users` (`id`, `role_id`, `name`, `slug`, `email`, `email_verified_at`, `password`, `validar`, `remember_token`, `created_at`, `updated_at`, `last_login_at`, `last_login_ip`) VALUES
	(1278, 1, 'Sebastian Rojas', 'sebastian-rojas-sebastian-rojas', 'sec.rojas@gmail.com', NULL, '$2y$10$oZWwBZkHxdyvlCIpKHCmOOtYd5wgw6iL/0a/ejXLQt8Y1vgHLX1Ce', 'SI', 'ZMuuh3qv3tH6eThyWRdkPCBcX97bjLyjAtTHOB9Fa0ZftFltIMytXaZwJnGf', '2019-11-28 20:25:15', '2020-03-12 14:35:52', '2020-03-12 14:35:52', '181.231.122.132'),
	(1279, 3, 'TEST', 'test-test', 'test@secrojas.com', NULL, '$2y$10$cf5rzDkVwybSsLaDYC09/uobmTve.6tFGBZ5zvXb3N6DKiPSUALJO', 'SI', 'ycMljBQN9Kk54eaJ5Xbl08sX31YFu5bCZLokpJ28OBZJED8eErQ9qhEBX8ay', '2019-11-29 15:15:30', '2019-12-04 19:44:27', '2019-12-04 19:44:27', '181.231.108.218'),
	(1281, 1, 'ADMIN', 'admin-admin', 'admin@secrojas.com', NULL, '$2y$10$TCxqWwspArAH6SZ95FEqH.Kvub1s2nrWzm30ylHue38drzNG9Yev.', 'SI', NULL, '2019-11-30 22:00:57', '2019-12-30 14:45:16', '2019-12-30 14:45:16', '181.231.122.132'),
	(1282, 3, 'CLIENTE', 'cliente-cliente', 'cliente@secrojas.com', NULL, '$2y$10$oT8iQ9rnQtOF2FxHk6XKsOgknBdGqH1i0Xk33iLhcx8SCzYRU/Ggi', 'SI', NULL, '2019-11-30 22:03:50', '2019-12-12 17:37:39', '2019-12-12 17:37:39', '181.231.108.218'),
	(1283, 3, 'Cliente prueba', 'cliente-prueba-cliente-prueba', 'cliente@prueba.com', NULL, '$2y$10$VGgar0LPI1R/a.m0Vba9Huvz4uZ/VH3w/QOlyc6t8UIPsDY/FAGNG', 'SI', NULL, '2019-12-06 19:51:16', '2019-12-06 19:51:16', NULL, NULL),
	(1284, 1, 'ADMIN EVENTOS', 'admin-eventos-admin-eventos', 'eventos@secrojas.com', NULL, '$2y$10$yMSd7pWfpD7mLi3a8fJq4.KLoJJIr42TaH0ysZv9CaDI7g1ol/.lu', 'SI', NULL, '2019-12-30 14:55:30', '2020-02-18 21:54:41', '2020-02-18 21:54:41', '190.191.3.25'),
	(1285, 1, 'Admin El Cronista', 'admin-el-cronista', 'admin@cronista.com', NULL, '$2y$10$LwG7o4CKLZhGnBxxVFTwUOuJujS43z05ksZVnsTXz6JGz.AzDOxbu', 'SI', NULL, '2020-02-03 18:25:18', '2020-03-12 15:09:42', '2020-03-12 15:09:42', '181.46.165.38'),
	(1286, 1, 'Admin El Cronista', 'admin-el-cronista-admin-el-cronista', 'comercial@cronista.com', NULL, '$2y$10$8unfIYU1Pf9OeE61IWr4ZuIV1egYAUgiLn/5zdhVlYEuPtunLxQwC', 'NO', NULL, '2020-03-11 19:39:06', '2020-03-12 12:36:33', '2020-03-12 12:36:33', '181.46.165.38');

CREATE TABLE IF NOT EXISTS `videos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `evento_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `videos_evento_id_foreign` (`evento_id`),
  CONSTRAINT `videos_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `videos` (`id`, `link`, `titulo`, `texto`, `evento_id`, `created_at`, `updated_at`) VALUES
	(5, 'https://www.youtube.com/watch?v=iz4H9H4kS8Y', 'Lorem Ipsum', 'Las pequeñas y medianas empresas adquieren en la actualidad un lugar destacado dentro\r\n          mercado, cumpliendo de ésta manera un rol importante en la economía Argentina. En Pymes\r\n          analizarán las claves para entender y gestionar el sector; herramientas para la toma de decisiones,\r\n          asginación de roles y cómo lograr el liderazgo; el análisis de ventajas y desventajas al momento de\r\n          armar un negocio de nicho, poniendo énfasis en el estudio del escenario actual económico y\r\n          financiero en todas sus variables. son algunos de los temas a tratar. La Argentina Emprendedora. Claves para exportar y mucho más.', 1, '2020-03-12 02:54:02', '2020-03-12 15:12:01');

  CREATE TABLE IF NOT EXISTS `agendas` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `moderadores` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `activo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `orden` int(11) NOT NULL,
    `hora_inicio` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `hora_fin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `speaker_id` bigint(20) unsigned NOT NULL,
    `evento_id` bigint(20) unsigned NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `agendas_orador_id_foreign` (`speaker_id`),
    KEY `agendas_evento_id_foreign` (`evento_id`),
    CONSTRAINT `agendas_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`),
    CONSTRAINT `agendas_orador_id_foreign` FOREIGN KEY (`speaker_id`) REFERENCES `speakers` (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


  INSERT INTO `agendas` (`id`, `nombre`, `moderadores`, `activo`, `orden`, `hora_inicio`, `hora_fin`, `speaker_id`, `evento_id`, `created_at`, `updated_at`) VALUES
  	(8, 'ACREDITACIÓN Y WELCOME COFFEE', NULL, 'SI', 1, '08.30', '09.00', 0, 1, '2020-02-14 18:52:37', '2020-02-28 11:19:02'),
  	(9, 'INGRESO AL SALÓN', NULL, 'SI', 2, '09.00', '09.10', 0, 1, '2020-02-14 18:53:40', '2020-02-28 11:19:31'),
  	(11, 'ECONOMÍA', 'Laura Garcia', 'SI', 3, '09.10', '09.40', 0, 1, '2020-02-14 18:54:25', '2020-02-28 11:54:18'),
  	(12, 'JUAN J. LLACH', 'Profesor IAE-Universidad Austral', 'SI', 5, '09.10', '09.40', 7, 1, '2020-02-14 18:54:48', '2020-02-28 11:48:38'),
  	(19, 'ESCENARIOS POST CRISIS', 'Laura Garcia', 'SI', 6, '10.00', '10.40', 0, 1, '2020-02-28 11:44:40', '2020-02-28 11:45:21'),
  	(20, 'JOSE MARIA SEGURA', NULL, 'SI', 7, '10.10', '10.40', 8, 1, '2020-02-28 11:46:05', '2020-02-28 11:47:54'),
  	(21, 'MIGUEL KIGUEL', NULL, 'SI', 8, '10.10', '10.40', 9, 1, '2020-02-28 11:46:59', '2020-02-28 11:49:26'),
  	(22, 'COFFEE BREAK', NULL, 'SI', 9, '10.40', '11.00', 0, 1, '2020-02-28 11:47:18', '2020-02-28 11:48:50'),
  	(23, 'FINANCIAMIENTO PYME', 'Hernán De Goñi – Laura Mafud', 'SI', 10, '11.00', '11.30', 0, 1, '2020-02-28 11:50:14', '2020-02-28 11:51:11'),
  	(24, 'JUAN CURUTCHET', '12:00 a 12:3012:00 a 12:3012:00 a 12:3012:00 a 12:3012:00 a 12:3012:00 a 12:3012:00 a 12:3012:00 a 12:3012:00 a 12:30', 'SI', 11, '11.00', '11.30', 10, 1, '2020-02-28 11:51:39', '2020-02-28 11:55:33'),
  	(25, 'FERNANDO ONTIVEROS', NULL, 'SI', 12, '11.00', '11.30', 11, 1, '2020-02-28 11:52:09', '2020-02-28 11:52:28'),
  	(26, 'ALEJANDRO PEREZ', NULL, 'SI', 13, '11.00', '11.30', 12, 1, '2020-02-28 11:52:47', '2020-02-28 11:53:02'),
  	(27, 'CIERRE', 'Hernán De Goñi', 'SI', 14, '12.00', '12.30', 0, 1, '2020-02-28 11:53:18', '2020-02-28 11:54:01');
