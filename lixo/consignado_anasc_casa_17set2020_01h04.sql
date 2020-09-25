-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Set-2020 às 06:05
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consignado_anasc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `orgao`
--

CREATE TABLE `orgao` (
  `id_orgao` int(11) NOT NULL,
  `nome_orgao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orgao`
--

INSERT INTO `orgao` (`id_orgao`, `nome_orgao`) VALUES
(1, 'INSS'),
(2, 'SIAPE'),
(3, 'GOV SC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_anexos`
--

CREATE TABLE `tab_anexos` (
  `id_anexo` int(11) NOT NULL,
  `id_contrato` int(11) NOT NULL,
  `file_name_anexo` varchar(255) NOT NULL,
  `path_anexo` varchar(255) NOT NULL,
  `dateupload_anexo` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_anexos`
--

INSERT INTO `tab_anexos` (`id_anexo`, `id_contrato`, `file_name_anexo`, `path_anexo`, `dateupload_anexo`) VALUES
(1, 1, 'fatura.pdf', 'uploads/1', '2020-09-16 00:00:00'),
(2, 1, 'moedas.jpg', 'uploads/1', '2020-09-16 00:00:00'),
(6, 21, 'folha_mes_outubro_2019.pdf', '	 uploads/21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_clientes`
--

CREATE TABLE `tab_clientes` (
  `id_cli` int(11) NOT NULL,
  `nome_cli` varchar(255) NOT NULL,
  `cpf_cli` varchar(14) NOT NULL,
  `identidade_cli` varchar(40) NOT NULL,
  `cep_cli` varchar(8) NOT NULL,
  `endereco_cli` varchar(255) NOT NULL,
  `numero_cli` varchar(50) NOT NULL,
  `comple_cli` varchar(50) NOT NULL,
  `bairro_cli` varchar(50) NOT NULL,
  `cidade_cli` varchar(50) NOT NULL,
  `uf_cli` varchar(2) NOT NULL,
  `datanasc_cli` varchar(200) NOT NULL,
  `datacad_cli` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_clientes`
--

INSERT INTO `tab_clientes` (`id_cli`, `nome_cli`, `cpf_cli`, `identidade_cli`, `cep_cli`, `endereco_cli`, `numero_cli`, `comple_cli`, `bairro_cli`, `cidade_cli`, `uf_cli`, `datanasc_cli`, `datacad_cli`) VALUES
(1, 'Carlos da Silva Junior', '125.445.887-54', '455885', '89012100', 'sdfdsf', '12', '', '', 'Joaçaba', 'SC', '12/05/1946', '14/09/2020'),
(2, 'Luiz Carlos da Silva Costa', '457.887.842-11', '200545458', '88035120', 'Rua das Casas', '154', '', '', 'São José', 'SC', '12/05/1946', '14/09/2020'),
(3, 'Marcelo Neri da Silva', '558.536.769-20', '1463090', '88085260', 'Rua Fernando Ferreira de Mello', '234', '', '', '', 'SC', '12/05/1946', '14/09/2020'),
(4, 'Roberto Pereira Costa', '548.636.769-21', '4565445', '78055888', 'Rua das Casas', '20', '', '', 'Brusque', 'SC', '12/05/1946', '14/09/2020'),
(5, 'Elias Cardoso Pereira', '155.454.555-55', '455454', '18020-45', 'Rua Ferreira Lima', '22', '', '', 'Santo Agostinho', 'MG', '12/05/1946', '14/09/2020');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_propostas`
--

CREATE TABLE `tab_propostas` (
  `id_contrato` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `ade_contrato` varchar(30) NOT NULL,
  `id_orgao` int(11) NOT NULL,
  `bn_contrato` int(11) NOT NULL,
  `parce_contrato` double NOT NULL,
  `opera_contrato` int(11) NOT NULL,
  `promo_contrato` int(11) NOT NULL,
  `vend_contrato` int(11) NOT NULL,
  `situa_contrato` int(11) NOT NULL,
  `bccompra_contrato` int(11) NOT NULL,
  `parceini_contrato` double NOT NULL,
  `parcefinal_contrato` double NOT NULL,
  `ml_contrato` double NOT NULL,
  `data_cadastro_contrato` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_anexo` int(11) NOT NULL,
  `data_modificacao_contrato` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_propostas`
--

INSERT INTO `tab_propostas` (`id_contrato`, `id_cli`, `ade_contrato`, `id_orgao`, `bn_contrato`, `parce_contrato`, `opera_contrato`, `promo_contrato`, `vend_contrato`, `situa_contrato`, `bccompra_contrato`, `parceini_contrato`, `parcefinal_contrato`, `ml_contrato`, `data_cadastro_contrato`, `id_anexo`, `data_modificacao_contrato`) VALUES
(1, 1, '865988', 1, 1, 156, 0, 1, 1, 1, 1, 156, 187, 41, '2020-09-16 20:15:15', 0, '0000-00-00 00:00:00'),
(2, 2, '987888', 1, 3, 126, 0, 2, 0, 8, 1, 126, 157, 0, '2020-09-16 22:31:53', 0, '0000-00-00 00:00:00'),
(20, 3, '895578', 3, 7, 178, 0, 3, 0, 11, 1, 178, 198, 0, '2020-09-16 23:59:10', 0, '0000-00-00 00:00:00'),
(21, 4, '998989', 2, 5, 158, 0, 2, 0, 14, 1, 158, 169, 0, '2020-09-17 00:02:52', 0, '0000-00-00 00:00:00'),
(22, 5, '864755', 1, 2, 193, 0, 3, 0, 3, 1, 193, 203, 0, '2020-09-17 00:04:17', 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orgao`
--
ALTER TABLE `orgao`
  ADD PRIMARY KEY (`id_orgao`);

--
-- Indexes for table `tab_anexos`
--
ALTER TABLE `tab_anexos`
  ADD PRIMARY KEY (`id_anexo`);

--
-- Indexes for table `tab_clientes`
--
ALTER TABLE `tab_clientes`
  ADD PRIMARY KEY (`id_cli`);

--
-- Indexes for table `tab_propostas`
--
ALTER TABLE `tab_propostas`
  ADD PRIMARY KEY (`id_contrato`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orgao`
--
ALTER TABLE `orgao`
  MODIFY `id_orgao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tab_anexos`
--
ALTER TABLE `tab_anexos`
  MODIFY `id_anexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tab_clientes`
--
ALTER TABLE `tab_clientes`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tab_propostas`
--
ALTER TABLE `tab_propostas`
  MODIFY `id_contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
