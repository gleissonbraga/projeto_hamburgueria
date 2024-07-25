-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/07/2024 às 01:20
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hamburgueria_bd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `bebida`
--

CREATE TABLE `bebida` (
  `id` int(254) NOT NULL,
  `nome_bebida` varchar(200) NOT NULL,
  `descricao_bebida` varchar(500) NOT NULL,
  `preco_bebida` varchar(20) NOT NULL,
  `foto_bebida` varchar(100) NOT NULL,
  `data_bebida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `bebida`
--

INSERT INTO `bebida` (`id`, `nome_bebida`, `descricao_bebida`, `preco_bebida`, `foto_bebida`, `data_bebida`) VALUES
(1, 'Heineken', '330ml', '6,49', '13-07-2024_11-51-HeinekenLongNeck_Q1-scaled.jpg', '2024-07-06'),
(2, 'Budweiser', '330ml', '4,99', '13-07-2024_11-53-d54cba4947c15b6b83570b7fc9bdd1f2.jpg', '2024-07-06'),
(3, 'Torre de chopp', '2,5l', '79,90', '14-07-2024_03-45-torre-de-chopp-uatt-01.jpg', '2024-07-13'),
(4, 'Chopp Brahma', 'Copo 450ml', '14,99', '14-07-2024_03-48-5808c270-48b4-4601-af91-2bf0ac1f1305.jpg', '2024-07-13');

-- --------------------------------------------------------

--
-- Estrutura para tabela `destaques`
--

CREATE TABLE `destaques` (
  `id` int(254) NOT NULL,
  `nome_destaque` varchar(200) NOT NULL,
  `descricao_destaque` varchar(500) NOT NULL,
  `preco_destaque` float NOT NULL,
  `foto_destaque` varchar(100) NOT NULL,
  `check_box` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `hamburguer`
--

CREATE TABLE `hamburguer` (
  `id` int(254) NOT NULL,
  `nome_hamburguer` varchar(200) NOT NULL,
  `descricao_hamburguer` varchar(500) NOT NULL,
  `preco_hamburguer` varchar(20) NOT NULL,
  `foto_hamburguer` varchar(100) NOT NULL,
  `destaque` varchar(20) NOT NULL,
  `data_hamburguer` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `hamburguer`
--

INSERT INTO `hamburguer` (`id`, `nome_hamburguer`, `descricao_hamburguer`, `preco_hamburguer`, `foto_hamburguer`, `destaque`, `data_hamburguer`) VALUES
(1, 'Texas Tradicional', 'Pão tradicional, 2 bifes 180g, cebola caramelizada, picles e maionese', '19,90', 'amirali-mirhashemian-jh5XyK4Rr3Y-unsplash.webp', '0', '2024-07-06'),
(5, 'Texas cheddar', 'Pão brioche, bife 180g, tomate, alface e maionese', '33,99', '13-07-2024_10-14-hamburguer-1651610679144_v2_4x3.jpg', '1', '2024-07-08'),
(6, 'Duplo Smash', 'Pão Briche, Bife 180G, Queijo Cheddar, Maionese, Babecue', '29,90', '20-07-2024_01-08-kame-house-dragon-ball-z-thumb.jpg', '1', '2024-07-08'),
(8, 'Gringo Smash', 'Pão australiano, bife 180g, queijo cheddar, molho especial, picles, cebola, tomate, alface', '34,99', '13-07-2024_08-06-hamburguer-artesanal.jpg', '1', '2024-07-13');

-- --------------------------------------------------------

--
-- Estrutura para tabela `porcao`
--

CREATE TABLE `porcao` (
  `id` int(254) NOT NULL,
  `nome_porcao` varchar(200) NOT NULL,
  `descricao_porcao` varchar(500) NOT NULL,
  `preco_porcao` varchar(20) NOT NULL,
  `foto_porcao` varchar(100) NOT NULL,
  `data_porcao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `porcao`
--

INSERT INTO `porcao` (`id`, `nome_porcao`, `descricao_porcao`, `preco_porcao`, `foto_porcao`, `data_porcao`) VALUES
(1, 'Batata Rustica', 'Batata', '12,99', '13-07-2024_11-30-AdobeStock_473004844.jpeg', '2024-07-06'),
(5, 'Batata frita', 'Batata palito', '19,90', '14-07-2024_03-43-porcao.jpg', '2024-07-13'),
(6, 'Batata na chapa', 'Batata palito e picanha', '39,90', '14-07-2024_03-50-qpd6bwzon2zpooa4w8ci.jpg', '2024-07-13'),
(7, 'Anéis de cebola', 'Cebola empanada', '24,99', '16-07-2024_12-14-aneis-de-cebola-empanados-na-airfryer.jpg', '2024-07-15');

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidades`
--

CREATE TABLE `unidades` (
  `id` int(254) NOT NULL,
  `nome_unidade` varchar(200) NOT NULL,
  `endereco_unidade` varchar(100) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(10) NOT NULL,
  `contato_unidade` varchar(50) NOT NULL,
  `hora_abertura` varchar(20) NOT NULL,
  `hora_fechamento` varchar(50) NOT NULL,
  `foto_unidade` varchar(100) NOT NULL,
  `data_unidade` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `unidades`
--

INSERT INTO `unidades` (`id`, `nome_unidade`, `endereco_unidade`, `cidade`, `uf`, `contato_unidade`, `hora_abertura`, `hora_fechamento`, `foto_unidade`, `data_unidade`) VALUES
(1, 'Texas Viamão', 'Rua Ana Neri, 516', 'Viamão', 'RS', '(51) 999303193', '18:00', ' 00:00', '13-07-2024_11-17-hamburgueria.jpg', '2024-07-06'),
(2, 'Texas Porto Alegre', 'Protasio Alves, 110', 'Porto Alegre', 'RS', '(51) 88888-8888', '19:00', ' 01:00', '09-07-2024_06-25-FEATURED_IMAGE.jpg', '2024-07-09'),
(3, 'Texas Alemanha', 'AM Remberg, 18', 'Dortmund', 'BD', '(51) 77777-7777', '17:00', ' 00:00', '13-07-2024_11-16-hamburguer2.jpg', '2024-07-09'),
(4, 'Texas Paris', 'Elisée Reclus, 102', 'Paris', 'Île-de-Fra', '(51) 98626-7723', '19:00', ' 01:00', '15-07-2024_02-35-Hamburgueria-da-Alfândega-Ipanema.jpg', '2024-07-14');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(254) NOT NULL,
  `nome_user` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `img_user` varchar(100) DEFAULT NULL,
  `data_usuario` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_user`, `email`, `senha`, `img_user`, `data_usuario`) VALUES
(1, 'Gleisson', 'bragagleisson@gmail.com', '3529106f747bad3111c651853a1e1a7254c73bff', '20-07-2024_01-13-photo-1505238680356-667803448bb6.jpg', '2024-07-06'),
(2, 'Admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '12-07-2024_05-06-360_F_227450952_KQCMShHPOPebUXklULsKsROk5AvN6H1H.jpg', '2024-07-06'),
(17, 'Eddie', 'eddie@gmail.com', 'bacc1c505cb1756c59242c0a8ee25cd990a210e9', '14-07-2024_02-41-beautiful-sea-at-sunset-with-the-reflection-thumb.jpg', '2024-07-13'),
(20, 'Pedro', 'sbardelotto@gmail.com', '9adb02948898e79013278c91d82aafdd7cfda033', '', '2024-07-15');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `destaques`
--
ALTER TABLE `destaques`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `hamburguer`
--
ALTER TABLE `hamburguer`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `porcao`
--
ALTER TABLE `porcao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bebida`
--
ALTER TABLE `bebida`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `destaques`
--
ALTER TABLE `destaques`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `hamburguer`
--
ALTER TABLE `hamburguer`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `porcao`
--
ALTER TABLE `porcao`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `unidades`
--
ALTER TABLE `unidades`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
