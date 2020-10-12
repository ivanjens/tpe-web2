-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 05:04 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_libreria`
--

-- --------------------------------------------------------

--
-- Table structure for table `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genero`
--

INSERT INTO `genero` (`id`, `nombre`) VALUES
(1, 'Drama'),
(5, 'Aventura'),
(7, 'Terror');

-- --------------------------------------------------------

--
-- Table structure for table `libro`
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
-- Dumping data for table `libro`
--

INSERT INTO `libro` (`id`, `titulo`, `autor`, `editorial`, `sinopsis`, `precio`, `stock`, `id_genero`) VALUES
(10, 'Sin Titulo', 'Oscar', 'Bamboo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ligula nunc, vehicula condimentum bibendum nec, sagittis sed odio. Nunc ut iaculis odio. Suspendisse quis viverra odio. Maecenas mollis odio mauris, rutrum porttitor dui feugiat non. Donec feugiat bibendum bibendum. Proin mollis leo ut tellus malesuada feugiat. Sed sagittis sagittis ligula tincidunt interdum. Vestibulum a condimentum tellus, id rutrum turpis. Duis sit amet laoreet lectus. Morbi lacinia ex eget mauris aliquam blandit at non erat. Praesent interdum, lorem non vehicula pretium, tellus elit viverra tortor, quis suscipit felis tellus non eros. In molestie felis libero, eget laoreet lorem tincidunt quis. Quisque tincidunt quis orci ut venenatis.\r\n\r\nMauris iaculis enim non arcu lacinia, a luctus lacus fringilla. Sed volutpat fringilla lectus in aliquam. Nam mattis augue vel hendrerit faucibus. Donec ultrices ipsum leo, eget cursus est faucibus at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eget malesuada turpis. Integer semper elit in nibh commodo, et interdum orci lacinia. Fusce sed ullamcorper nisi. Praesent aliquet, ex quis dapibus elementum, ligula ante pulvinar risus, at placerat ligula orci eu mauris. Aenean hendrerit varius purus non eleifend. Sed viverra volutpat turpis sagittis placerat. Phasellus accumsan diam sit amet eleifend porttitor. Aliquam et dignissim erat. Donec auctor nec leo ut rhoncus. Donec in lectus maximus, gravida est a, tincidunt lorem. Sed magna purus, ullamcorper eget auctor consequat, pretium et ex.', 123, 2, 1),
(13, 'Nuevo libro', 'Ni idea', 'idk', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ligula nunc, vehicula condimentum bibendum nec, sagittis sed odio. Nunc ut iaculis odio. Suspendisse quis viverra odio. Maecenas mollis odio mauris, rutrum porttitor dui feugiat non. Donec feugiat bibendum bibendum. Proin mollis leo ut tellus malesuada feugiat. Sed sagittis sagittis ligula tincidunt interdum. Vestibulum a condimentum tellus, id rutrum turpis. Duis sit amet laoreet lectus. Morbi lacinia ex eget mauris aliquam blandit at non erat. Praesent interdum, lorem non vehicula pretium, tellus elit viverra tortor, quis suscipit felis tellus non eros. In molestie felis libero, eget laoreet lorem tincidunt quis. Quisque tincidunt quis orci ut venenatis.\r\n\r\nMauris iaculis enim non arcu lacinia, a luctus lacus fringilla. Sed volutpat fringilla lectus in aliquam. Nam mattis augue vel hendrerit faucibus. Donec ultrices ipsum leo, eget cursus est faucibus at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eget malesuada turpis. Integer semper elit in nibh commodo, et interdum orci lacinia. Fusce sed ullamcorper nisi. Praesent aliquet, ex quis dapibus elementum, ligula ante pulvinar risus, at placerat ligula orci eu mauris. Aenean hendrerit varius purus non eleifend. Sed viverra volutpat turpis sagittis placerat. Phasellus accumsan diam sit amet eleifend porttitor. Aliquam et dignissim erat. Donec auctor nec leo ut rhoncus. Donec in lectus maximus, gravida est a, tincidunt lorem. Sed magna purus, ullamcorper eget auctor consequat, pretium et ex.', 29, 3, 5),
(20, 'El Puente', 'Roberto', 'BookU', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ligula nunc, vehicula condimentum bibendum nec, sagittis sed odio. Nunc ut iaculis odio. Suspendisse quis viverra odio. Maecenas mollis odio mauris, rutrum porttitor dui feugiat non. Donec feugiat bibendum bibendum. Proin mollis leo ut tellus malesuada feugiat. Sed sagittis sagittis ligula tincidunt interdum. Vestibulum a condimentum tellus, id rutrum turpis. Duis sit amet laoreet lectus. Morbi lacinia ex eget mauris aliquam blandit at non erat. Praesent interdum, lorem non vehicula pretium, tellus elit viverra tortor, quis suscipit felis tellus non eros. In molestie felis libero, eget laoreet lorem tincidunt quis. Quisque tincidunt quis orci ut venenatis.\r\n\r\nMauris iaculis enim non arcu lacinia, a luctus lacus fringilla. Sed volutpat fringilla lectus in aliquam. Nam mattis augue vel hendrerit faucibus. Donec ultrices ipsum leo, eget cursus est faucibus at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eget malesuada turpis. Integer semper elit in nibh commodo, et interdum orci lacinia. Fusce sed ullamcorper nisi. Praesent aliquet, ex quis dapibus elementum, ligula ante pulvinar risus, at placerat ligula orci eu mauris. Aenean hendrerit varius purus non eleifend. Sed viverra volutpat turpis sagittis placerat. Phasellus accumsan diam sit amet eleifend porttitor. Aliquam et dignissim erat. Donec auctor nec leo ut rhoncus. Donec in lectus maximus, gravida est a, tincidunt lorem. Sed magna purus, ullamcorper eget auctor consequat, pretium et ex.', 1, 3, 1),
(22, 'New Book', 'Author', 'Ed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ligula nunc, vehicula condimentum bibendum nec, sagittis sed odio. Nunc ut iaculis odio. Suspendisse quis viverra odio. Maecenas mollis odio mauris, rutrum porttitor dui feugiat non. Donec feugiat bibendum bibendum. Proin mollis leo ut tellus malesuada feugiat. Sed sagittis sagittis ligula tincidunt interdum. Vestibulum a condimentum tellus, id rutrum turpis. Duis sit amet laoreet lectus. Morbi lacinia ex eget mauris aliquam blandit at non erat. Praesent interdum, lorem non vehicula pretium, tellus elit viverra tortor, quis suscipit felis tellus non eros. In molestie felis libero, eget laoreet lorem tincidunt quis. Quisque tincidunt quis orci ut venenatis.\r\n\r\nMauris iaculis enim non arcu lacinia, a luctus lacus fringilla. Sed volutpat fringilla lectus in aliquam. Nam mattis augue vel hendrerit faucibus. Donec ultrices ipsum leo, eget cursus est faucibus at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eget malesuada turpis. Integer semper elit in nibh commodo, et interdum orci lacinia. Fusce sed ullamcorper nisi. Praesent aliquet, ex quis dapibus elementum, ligula ante pulvinar risus, at placerat ligula orci eu mauris. Aenean hendrerit varius purus non eleifend. Sed viverra volutpat turpis sagittis placerat. Phasellus accumsan diam sit amet eleifend porttitor. Aliquam et dignissim erat. Donec auctor nec leo ut rhoncus. Donec in lectus maximus, gravida est a, tincidunt lorem. Sed magna purus, ullamcorper eget auctor consequat, pretium et ex.', 2, 3, 1),
(25, 'Terror', 'aksdjalsk', 'asdada', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ligula nunc, vehicula condimentum bibendum nec, sagittis sed odio. Nunc ut iaculis odio. Suspendisse quis viverra odio. Maecenas mollis odio mauris, rutrum porttitor dui feugiat non. Donec feugiat bibendum bibendum. Proin mollis leo ut tellus malesuada feugiat. Sed sagittis sagittis ligula tincidunt interdum. Vestibulum a condimentum tellus, id rutrum turpis. Duis sit amet laoreet lectus. Morbi lacinia ex eget mauris aliquam blandit at non erat. Praesent interdum, lorem non vehicula pretium, tellus elit viverra tortor, quis suscipit felis tellus non eros. In molestie felis libero, eget laoreet lorem tincidunt quis. Quisque tincidunt quis orci ut venenatis.\r\n\r\nMauris iaculis enim non arcu lacinia, a luctus lacus fringilla. Sed volutpat fringilla lectus in aliquam. Nam mattis augue vel hendrerit faucibus. Donec ultrices ipsum leo, eget cursus est faucibus at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eget malesuada turpis. Integer semper elit in nibh commodo, et interdum orci lacinia. Fusce sed ullamcorper nisi. Praesent aliquet, ex quis dapibus elementum, ligula ante pulvinar risus, at placerat ligula orci eu mauris. Aenean hendrerit varius purus non eleifend. Sed viverra volutpat turpis sagittis placerat. Phasellus accumsan diam sit amet eleifend porttitor. Aliquam et dignissim erat. Donec auctor nec leo ut rhoncus. Donec in lectus maximus, gravida est a, tincidunt lorem. Sed magna purus, ullamcorper eget auctor consequat, pretium et ex.', 1, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(75) NOT NULL,
  `permisos` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `password`, `permisos`) VALUES
(1, 'Fulanitx', 'admin@admin.com', '$2y$12$RlOI26fzFVI1GEbKbjYaVu.rBAyW80gLb4e0PS2MusbgOvX083VLO', 1),
(3, 'User', 'user@user.com', '$2y$12$/z3fxj6IePbP1d4ujXgltec6L9X9JwO92TYuOET7xI0EJlGqUDIau', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `libro`
--
ALTER TABLE `libro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
