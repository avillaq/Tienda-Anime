-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2023 a las 01:00:52
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendaanime`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `id_carrito` int(11) NOT NULL,
  `producto_carrito` varchar(1000) NOT NULL,
  `total_carrito` decimal(15,2) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carritos`
--

INSERT INTO `carritos` (`id_carrito`, `producto_carrito`, `total_carrito`, `id_usuario`) VALUES
(33, '{\"nombre_producto\":\"Figura de acci\\u00f3n  Trunks de 42cm\",\"precio_producto\":\"86.50\",\"url_img\":\"Trunks-de-42cm-figura-GK-Super-Saiyan-LC.jpg_350x350.jpg\",\"cantidad\":\"1\"}', '86.50', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL,
  `url_img` varchar(100) NOT NULL DEFAULT 'alt-img.jpg',
  `editado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `url_img`, `editado`) VALUES
(1, 'Boku no Hero', 'boku.webp', '0000-00-00 00:00:00'),
(2, 'Chainsaw Man', 'chainsawman.webp', '0000-00-00 00:00:00'),
(3, 'Dragon Ball', 'dragonball.webp', '0000-00-00 00:00:00'),
(4, 'Hatsune Miku', 'hatsunemiku.webp', '0000-00-00 00:00:00'),
(5, 'Kimetsu no Yaiba', 'kimetsu.webp', '0000-00-00 00:00:00'),
(6, 'Naruto', 'naruto.webp', '0000-00-00 00:00:00'),
(7, 'One Piece', 'onepiece.webp', '0000-00-00 00:00:00'),
(8, 'Shingeki no Kyojin', 'shingeki.webp', '2023-03-08 00:10:16'),
(9, 'Spy X Family', 'spy.webp', '0000-00-00 00:00:00'),
(44, 'To aru majutsu', 'toAru.jpg', '2023-03-09 18:10:22'),
(48, 'Oregairu', 'oregairu.jpg', '2023-03-09 17:42:49'),
(49, 'Re:Zero', 'rezero.jpg', '2023-03-09 18:10:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(200) NOT NULL,
  `precio_producto` decimal(15,2) NOT NULL,
  `url_img` varchar(200) NOT NULL DEFAULT 'alt-img.jpg',
  `categoria_id` int(11) NOT NULL,
  `editado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `precio_producto`, `url_img`, `categoria_id`, `editado`) VALUES
(3, 'Figura One piece', '23.20', 'alt-img.jpg', 7, '2023-03-08 22:30:46'),
(6, '9 Figuras de My Hero Academia de 8cm', '27.40', 'Mini-figura-Ochaco-Uraraka-All-Might-Todoroki-Shoto-estatuilla.jpg_350x350.jpg', 1, '2023-03-09 11:55:21'),
(7, 'Figura de acción de My Hero Academia 10cm', '45.30', 'Bakugou-Katsuki-modelo-de-juguetes.jpg_350x350.jpg', 1, '2023-03-09 11:55:29'),
(8, 'Funda de My Hero Academia para iPhone', '14.70', 'Funda-de-My-Hero-Academia.jpg', 1, NULL),
(9, 'Funko Pop de My Hero Academia', '24.60', 'Funko-Pop-figuras-de-acci-n-de-My-Hero-Academia.jpg', 1, NULL),
(10, 'Collar de metal de Chainsaw Man', '10.50', 'Collar-de-Metal-con-dise.jpg', 2, NULL),
(11, 'Decoración para colgar de Chainsaw Man', '14.70', 'Makima-Power-Denji-Aki-Mitaka-Asa-cuadro-para.jpg_350x350.jpg', 2, '2023-03-09 12:16:17'),
(12, 'Figura de acción de Chainsaw man', '10.50', 'figura-Chainsaw.webp', 2, NULL),
(13, 'Funda de teléfono Chainsaw Man para IPhone', '14.70', 'Funda-de-tel-fono-con-patr-n-de-motosierra.jpg', 2, NULL),
(14, 'Muñeco de peluche de Pochita', '24.20', 'peluche-pochita.webp', 2, NULL),
(15, 'Sudadera con capucha de Chainsaw Man', '25.30', 'Sudadera-con-capucha-de-motosierra.jpg', 2, NULL),
(16, 'Bandai figura de acción de Dragon Ball Z con LED', '24.20', 'figuras-de-acci-n-de-Dragon-Ball-Z-Son-Goku-Saiyan-Super-modelo-LED-.jpg', 3, NULL),
(17, 'Figura de acción Super saiyan Goku de 15cm', '23.20', 'Figura-de-acci-n-de-Dragon-Ball-Super-saiyan-Goku-modelo-coleccionable.jpg', 3, '2023-03-09 12:10:10'),
(18, 'Figura de acción  Trunks de 42cm', '86.50', 'Trunks-de-42cm-figura-GK-Super-Saiyan-LC.jpg_350x350.jpg', 3, '2023-03-09 12:09:12'),
(19, 'Figura de Juguete de Dragon Ball Z 10cm', '14.70', 'Modelo-de-Super-Saiyan-One.jpg_350x350.jpg', 3, NULL),
(20, 'Figuras de acción de Dragon Ball Z', '26.30', 'Son-Goku-Son-Gohan-Vegeta-Broly.jpg_350x350.jpg', 3, NULL),
(21, 'Almohada de peluche de Hatsune Miku', '62.20', 'Almohada-de-peluche-de-Anime-japon-s-Hatsune-Miku.jpg', 4, NULL),
(22, 'Llavero colgante de anime Hatsune Miku 6cm', '10.50', 'Figura-de-Anime-Hatsune-Miku-6Cm-acr-lico-lindo-llavero.jpg', 4, NULL),
(23, 'Llavero de Hatsune Miku', '10.50', 'Llavero-con-dijes-de-Hatsune-Miku-para-pareja.jpg', 4, NULL),
(24, 'Mini Q Posket Hatsune Miku', '12.60', 'Mini-Q-Posket-Hatsune-Miku.jpg', 4, NULL),
(25, 'Camiseta de Demon Slayer Unisex', '14.70', 'Camiseta-de-Anime-japon-s-Demon-Slayer-Unisex.jpg', 5, NULL),
(26, 'Demon Slayer Llavero', '10.50', 'Demon-Slayer-Llavero.jpg', 5, NULL),
(27, 'Espada de Kimetsu no Yaiba de 25cm', '12.60', 'Espada-de-Kimetsu-no-Yaiba.jpg', 5, NULL),
(28, 'Figuras de cabezones Kimetsu no Yaiba', '14.70', 'Demon-kille MH-looking-up-kamado-tanjirou.jpg_350x350.jpg', 5, NULL),
(29, 'Figuras de Demon Slayer 16cm', '14.70', 'figura-de-acci-n-de-Anime-Kamado-Tanjirou-Agatsuma-Zenitsu-Nezuko.jpg', 5, NULL),
(30, 'Funko POP de DEMON SLAYER', '62.50', 'Funko-POP-figuras-de-acci-n-de-DEMON-SLAYER.jpg', 5, NULL),
(31, 'Figura de Hatake Kakashi', '14.70', 'figuras-de-acci-n-de-Hatake-Kakashi.jpg_350x350.jpg', 6, NULL),
(32, 'Figuras de acción de PVC de Naruto (6 piezas)', '25.30', 'FNaruto-Sakura-juguetes-de-colecci-n-de-Anime-de.jpg_350x350.jpg', 6, NULL),
(33, 'Funko Pop de Naruto', '61.50', 'Funko-Pop-figuras-de-acci-n-de-Narutoe.jpg', 6, NULL),
(34, 'LLavero de Anime Naruto', '10.50', 'LLavero-de-Anime-Naruto.jpg', 6, NULL),
(35, 'Uchiha Itachi Funda de teléfono de Naruto', '10.50', 'Uchiha-Itachi-Funda.jpg', 6, NULL),
(36, 'Figuras cabezonas One Piece de 9CM', '14.70', 'Q-Anime.jpg', 7, NULL),
(37, 'Funda de almohada de One Piece 45Cm', '10.50', 'Funda-de-almohada.jpg', 7, NULL),
(38, 'Funda de teléfono One Piece Luffy IPhone', '14.70', 'Funda-de-tel-fono.jpg', 7, '2023-03-09 12:28:31'),
(39, 'Funko Pop Anime One Piece', '46.10', 'POP-Anime-One-Piece.jpg', 7, NULL),
(40, 'LLavero One Piece', '10.50', 'LLavero-de-la-serie-One-Piece.jpg', 7, NULL),
(41, 'Peluche de Luffy One Piece', '14.70', 'Figura-de-juguete-de-anim-de-peluch.jpg', 7, NULL),
(42, 'Camiseta Shingeki No Kyojin ', '14.70', 'Camiseta-de-Anime-japon-s-para-hombres-camisa.jpg', 8, NULL),
(43, 'Disfraz/capa de Shingeki no Kyojin', '25.30', 'Disfraz-de-Anime-Attack-On-Titan.jpg', 8, NULL),
(44, 'Figuras de acción de Shingeki no Kyojin', '50.60', 'Figuras-de-acci-n-de-Anime-de-ataque-a-los-Titanes-Levi-Ackerman.jpg', 8, NULL),
(45, 'Figuras de Shingeki no Kyojin', '48.50', 'Figura-del-Tit-n-de-la-Fundaci-n.jpg', 8, NULL),
(46, 'LLavero de Shingeki no Kyojin', '10.50', 'LLavero-de-Anime.jpg', 8, NULL),
(47, 'Shingeki No Kyojin cosplay collar llavero', '12.60', 'Anime-Attack-on-Titan-Shingeki-No-Kyojin.jpg', 8, NULL),
(48, 'Top corto de Anime Attack On Titan', '14.70', 'Top-corto-de-Anime-Attack-On-Titan.jpg', 8, NULL),
(49, 'Camisetas con estampado de Spy x Family', '12.60', 'Camisetas-con0.jpg', 9, NULL),
(50, 'Cosplay de Spy X Family Anya Forger', '61.80', 'Disfraces-de-Anime-Spy-X-Family.jpg', 9, NULL),
(51, 'Figuras de Spy x Family 10cm', '60.00', 'Figura-de-Anime-de-la-familia-SPY.jpg', 9, NULL),
(52, 'Juguetes de peluche de Spy X Family', '14.70', 'Juguetes-.jpg', 9, NULL),
(53, 'Camiseta casual To aru majutsu', '10.50', 'Anime-Toaru-Majutsu-no-Index-MisaT-shir.jpg', 44, NULL),
(54, 'Figura de Index de To aru majutsu ', '20.50', 'indexf.jpg', 44, NULL),
(55, 'Figura de Yukino y Yui', '50.60', 'oregairu_yukino__yui.jpg', 48, NULL),
(56, 'Llaveros de Oregairu', '10.70', 'llaveros-oregairu.jpg', 48, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `correo_usuario` varchar(100) NOT NULL,
  `pass_usuario` varchar(60) NOT NULL,
  `total_usuario` decimal(15,2) NOT NULL DEFAULT 0.00,
  `editado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `correo_usuario`, `pass_usuario`, `total_usuario`, `editado`) VALUES
(2, 'admin', 'villafuertequispealex@gmail.com', '$2y$12$Fqdgj0PIIcG4BRFRmRg6YuSh.U.oYTlbv1PqxU9OSpJ972AayTCMy', '0.00', NULL),
(3, 'juan', 'rata@gmail.com', '$2y$12$CSXS2STcpuINfCIiwLi7DOt1az12BiOcj8Floh66YIR8GnB9Xvnea', '663.90', '2023-03-15 22:20:52'),
(8, 'Your', 'your@gmail.com', '$2y$12$uJj00mYbuwRRQ3HzXb5iruZJdMBaT/aOCKCbRNQZwLWZWwkQD0Pu6', '405.20', '2023-03-15 22:28:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `carritos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
