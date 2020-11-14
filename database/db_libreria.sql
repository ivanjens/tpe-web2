-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2020 a las 03:58:29
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `nombre`) VALUES
(1, 'Drama'),
(5, 'Aventura'),
(7, 'Terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `editorial` varchar(50) NOT NULL,
  `sinopsis` text NOT NULL,
  `precio` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id`, `titulo`, `autor`, `editorial`, `sinopsis`, `precio`, `stock`, `id_genero`) VALUES
(10, 'Sin Titulo', 'Oscar', 'Bamboo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ligula nunc, vehicula condimentum bibendum nec, sagittis sed odio. Nunc ut iaculis odio. Suspendisse quis viverra odio. Maecenas mollis odio mauris, rutrum porttitor dui feugiat non. Donec feugiat bibendum bibendum. Proin mollis leo ut tellus malesuada feugiat. Sed sagittis sagittis ligula tincidunt interdum. Vestibulum a condimentum tellus, id rutrum turpis. Duis sit amet laoreet lectus. Morbi lacinia ex eget mauris aliquam blandit at non erat. Praesent interdum, lorem non vehicula pretium, tellus elit viverra tortor, quis suscipit felis tellus non eros. In molestie felis libero, eget laoreet lorem tincidunt quis. Quisque tincidunt quis orci ut venenatis.\r\n\r\nMauris iaculis enim non arcu lacinia, a luctus lacus fringilla. Sed volutpat fringilla lectus in aliquam. Nam mattis augue vel hendrerit faucibus. Donec ultrices ipsum leo, eget cursus est faucibus at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eget malesuada turpis. Integer semper elit in nibh commodo, et interdum orci lacinia. Fusce sed ullamcorper nisi. Praesent aliquet, ex quis dapibus elementum, ligula ante pulvinar risus, at placerat ligula orci eu mauris. Aenean hendrerit varius purus non eleifend. Sed viverra volutpat turpis sagittis placerat. Phasellus accumsan diam sit amet eleifend porttitor. Aliquam et dignissim erat. Donec auctor nec leo ut rhoncus. Donec in lectus maximus, gravida est a, tincidunt lorem. Sed magna purus, ullamcorper eget auctor consequat, pretium et ex.', 123, 2, 1),
(13, 'Nuevo libro', 'Ni idea', 'idk', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ligula nunc, vehicula condimentum bibendum nec, sagittis sed odio. Nunc ut iaculis odio. Suspendisse quis viverra odio. Maecenas mollis odio mauris, rutrum porttitor dui feugiat non. Donec feugiat bibendum bibendum. Proin mollis leo ut tellus malesuada feugiat. Sed sagittis sagittis ligula tincidunt interdum. Vestibulum a condimentum tellus, id rutrum turpis. Duis sit amet laoreet lectus. Morbi lacinia ex eget mauris aliquam blandit at non erat. Praesent interdum, lorem non vehicula pretium, tellus elit viverra tortor, quis suscipit felis tellus non eros. In molestie felis libero, eget laoreet lorem tincidunt quis. Quisque tincidunt quis orci ut venenatis.\r\n\r\nMauris iaculis enim non arcu lacinia, a luctus lacus fringilla. Sed volutpat fringilla lectus in aliquam. Nam mattis augue vel hendrerit faucibus. Donec ultrices ipsum leo, eget cursus est faucibus at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eget malesuada turpis. Integer semper elit in nibh commodo, et interdum orci lacinia. Fusce sed ullamcorper nisi. Praesent aliquet, ex quis dapibus elementum, ligula ante pulvinar risus, at placerat ligula orci eu mauris. Aenean hendrerit varius purus non eleifend. Sed viverra volutpat turpis sagittis placerat. Phasellus accumsan diam sit amet eleifend porttitor. Aliquam et dignissim erat. Donec auctor nec leo ut rhoncus. Donec in lectus maximus, gravida est a, tincidunt lorem. Sed magna purus, ullamcorper eget auctor consequat, pretium et ex.', 29, 3, 5),
(20, 'El Puente', 'Roberto', 'BookU', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ligula nunc, vehicula condimentum bibendum nec, sagittis sed odio. Nunc ut iaculis odio. Suspendisse quis viverra odio. Maecenas mollis odio mauris, rutrum porttitor dui feugiat non. Donec feugiat bibendum bibendum. Proin mollis leo ut tellus malesuada feugiat. Sed sagittis sagittis ligula tincidunt interdum. Vestibulum a condimentum tellus, id rutrum turpis. Duis sit amet laoreet lectus. Morbi lacinia ex eget mauris aliquam blandit at non erat. Praesent interdum, lorem non vehicula pretium, tellus elit viverra tortor, quis suscipit felis tellus non eros. In molestie felis libero, eget laoreet lorem tincidunt quis. Quisque tincidunt quis orci ut venenatis.\r\n\r\nMauris iaculis enim non arcu lacinia, a luctus lacus fringilla. Sed volutpat fringilla lectus in aliquam. Nam mattis augue vel hendrerit faucibus. Donec ultrices ipsum leo, eget cursus est faucibus at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eget malesuada turpis. Integer semper elit in nibh commodo, et interdum orci lacinia. Fusce sed ullamcorper nisi. Praesent aliquet, ex quis dapibus elementum, ligula ante pulvinar risus, at placerat ligula orci eu mauris. Aenean hendrerit varius purus non eleifend. Sed viverra volutpat turpis sagittis placerat. Phasellus accumsan diam sit amet eleifend porttitor. Aliquam et dignissim erat. Donec auctor nec leo ut rhoncus. Donec in lectus maximus, gravida est a, tincidunt lorem. Sed magna purus, ullamcorper eget auctor consequat, pretium et ex.', 1, 3, 1),
(22, 'New Book', 'Author', 'Ed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ligula nunc, vehicula condimentum bibendum nec, sagittis sed odio. Nunc ut iaculis odio. Suspendisse quis viverra odio. Maecenas mollis odio mauris, rutrum porttitor dui feugiat non. Donec feugiat bibendum bibendum. Proin mollis leo ut tellus malesuada feugiat. Sed sagittis sagittis ligula tincidunt interdum. Vestibulum a condimentum tellus, id rutrum turpis. Duis sit amet laoreet lectus. Morbi lacinia ex eget mauris aliquam blandit at non erat. Praesent interdum, lorem non vehicula pretium, tellus elit viverra tortor, quis suscipit felis tellus non eros. In molestie felis libero, eget laoreet lorem tincidunt quis. Quisque tincidunt quis orci ut venenatis.\r\n\r\nMauris iaculis enim non arcu lacinia, a luctus lacus fringilla. Sed volutpat fringilla lectus in aliquam. Nam mattis augue vel hendrerit faucibus. Donec ultrices ipsum leo, eget cursus est faucibus at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eget malesuada turpis. Integer semper elit in nibh commodo, et interdum orci lacinia. Fusce sed ullamcorper nisi. Praesent aliquet, ex quis dapibus elementum, ligula ante pulvinar risus, at placerat ligula orci eu mauris. Aenean hendrerit varius purus non eleifend. Sed viverra volutpat turpis sagittis placerat. Phasellus accumsan diam sit amet eleifend porttitor. Aliquam et dignissim erat. Donec auctor nec leo ut rhoncus. Donec in lectus maximus, gravida est a, tincidunt lorem. Sed magna purus, ullamcorper eget auctor consequat, pretium et ex.', 2, 3, 1),
(25, 'Terror', 'aksdjalsk', 'asdada', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ligula nunc, vehicula condimentum bibendum nec, sagittis sed odio. Nunc ut iaculis odio. Suspendisse quis viverra odio. Maecenas mollis odio mauris, rutrum porttitor dui feugiat non. Donec feugiat bibendum bibendum. Proin mollis leo ut tellus malesuada feugiat. Sed sagittis sagittis ligula tincidunt interdum. Vestibulum a condimentum tellus, id rutrum turpis. Duis sit amet laoreet lectus. Morbi lacinia ex eget mauris aliquam blandit at non erat. Praesent interdum, lorem non vehicula pretium, tellus elit viverra tortor, quis suscipit felis tellus non eros. In molestie felis libero, eget laoreet lorem tincidunt quis. Quisque tincidunt quis orci ut venenatis.\r\n\r\nMauris iaculis enim non arcu lacinia, a luctus lacus fringilla. Sed volutpat fringilla lectus in aliquam. Nam mattis augue vel hendrerit faucibus. Donec ultrices ipsum leo, eget cursus est faucibus at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eget malesuada turpis. Integer semper elit in nibh commodo, et interdum orci lacinia. Fusce sed ullamcorper nisi. Praesent aliquet, ex quis dapibus elementum, ligula ante pulvinar risus, at placerat ligula orci eu mauris. Aenean hendrerit varius purus non eleifend. Sed viverra volutpat turpis sagittis placerat. Phasellus accumsan diam sit amet eleifend porttitor. Aliquam et dignissim erat. Donec auctor nec leo ut rhoncus. Donec in lectus maximus, gravida est a, tincidunt lorem. Sed magna purus, ullamcorper eget auctor consequat, pretium et ex.', 1, 2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseña`
--

CREATE TABLE `reseña` (
  `id` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `valoracion` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_usuario` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reseña`
--

INSERT INTO `reseña` (`id`, `comentario`, `valoracion`, `fecha`, `id_usuario`, `id_libro`) VALUES
(1, 'asdjskadjaskdjasldajlasdjskadjaskdjasldajlasdjskadjaskdjasldajlasdjskadjaskdjasldajlasdjskadjaskdjasldajlasdjskadjaskdjasldajlasdjskadjaskdjasldajlasdjskadjaskdjasldajlasdjskadjaskdjasldajlasdjskadjaskdjasldajlasdjskadjaskdjasldajlasdjskadjaskdjasldajlasdjskadjaskdjasldajlasdjskadjaskdjasldajlasdjskadjaskdjasldajl', 4, '2020-11-14 02:57:04', 1, 20),
(2, 'lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum', 5, '2020-11-14 02:57:38', 1, 20),
(3, 'papapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapapa', 3, '2020-11-14 02:58:04', 3, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(75) NOT NULL,
  `permisos` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `password`, `permisos`) VALUES
(1, 'Fulanitx', 'admin@admin.com', '$2y$12$RlOI26fzFVI1GEbKbjYaVu.rBAyW80gLb4e0PS2MusbgOvX083VLO', 1),
(3, 'User', 'user@user.com', '$2y$12$/z3fxj6IePbP1d4ujXgltec6L9X9JwO92TYuOET7xI0EJlGqUDIau', 0),
(5, 'Juan', 'juan@gmail.com', '$2y$10$X1U3eEN7vBaLt2q6TGWJJebN/bHXg5og/vpMmEwhX311QFoX3K4jq', 0),
(7, 'e', 'e@gmail.com', '$2y$10$y1Xr2xxMlultB5hpNA.y4ONL7xF91iLSjqAQqtQiNlsZ9F9Kfq/ny', 0),
(8, 'aa', 'aa@gmail.com', '$2y$10$jX5w5Olon.iE/uojAapm3eyzDurN2ikTcp5FHYQ/OjQo5HmcyM4ia', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indices de la tabla `reseña`
--
ALTER TABLE `reseña`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `reseña`
--
ALTER TABLE `reseña`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`);

--
-- Filtros para la tabla `reseña`
--
ALTER TABLE `reseña`
  ADD CONSTRAINT `reseña_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `reseña_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
