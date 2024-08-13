-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/08/2024 às 06:12
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `consignado_anasc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_bccompra`
--

CREATE TABLE `tab_bccompra` (
  `id_bccompra_contrato` int(11) NOT NULL,
  `nome_bccompra` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_bccompra`
--

INSERT INTO `tab_bccompra` (`id_bccompra_contrato`, `nome_bccompra`) VALUES
(1, 'ITAÚ'),
(2, 'CAIXA');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_bn`
--

CREATE TABLE `tab_bn` (
  `id_bn` int(11) NOT NULL,
  `cod_bn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_bn`
--

INSERT INTO `tab_bn` (`id_bn`, `cod_bn`) VALUES
(1, 'SANTANDER'),
(2, 'BRADESCO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_clientes`
--

CREATE TABLE `tab_clientes` (
  `id_cli` int(11) NOT NULL,
  `nome_cli` varchar(250) NOT NULL,
  `cpf_cli` varchar(11) NOT NULL,
  `identidade_cli` varchar(15) NOT NULL,
  `cep_cli` varchar(8) NOT NULL,
  `endereco_cli` varchar(250) NOT NULL,
  `numero_cli` varchar(10) NOT NULL,
  `comple_cli` varchar(50) NOT NULL,
  `bairro_cli` varchar(50) NOT NULL,
  `cidade_cli` varchar(50) NOT NULL,
  `uf_cli` varchar(2) NOT NULL,
  `datanasc_cli` date NOT NULL,
  `datacad_cli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_clientes`
--

INSERT INTO `tab_clientes` (`id_cli`, `nome_cli`, `cpf_cli`, `identidade_cli`, `cep_cli`, `endereco_cli`, `numero_cli`, `comple_cli`, `bairro_cli`, `cidade_cli`, `uf_cli`, `datanasc_cli`, `datacad_cli`) VALUES
(2, 'Carlos Eduardo Lino', '558.536.769', '1215455', '88085-26', 'Rua das casas', '1255', '', '', 'Florianópolis', 'SC', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_operacao`
--

CREATE TABLE `tab_operacao` (
  `id_operacao` int(11) NOT NULL,
  `nome_operacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_operacao`
--

INSERT INTO `tab_operacao` (`id_operacao`, `nome_operacao`) VALUES
(1, 'CRÉDITO'),
(2, 'DÉBITO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_orgao`
--

CREATE TABLE `tab_orgao` (
  `id_orgao` int(11) NOT NULL,
  `nome_orgao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_orgao`
--

INSERT INTO `tab_orgao` (`id_orgao`, `nome_orgao`) VALUES
(1, 'ANAC'),
(2, 'PROER');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_promotora`
--

CREATE TABLE `tab_promotora` (
  `id_promotora` int(11) NOT NULL,
  `nome_promotora` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_promotora`
--

INSERT INTO `tab_promotora` (`id_promotora`, `nome_promotora`) VALUES
(1, 'ANARGIL'),
(2, 'GOROSKI');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_propostas`
--

CREATE TABLE `tab_propostas` (
  `id_propostas` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `id_orgao` int(11) NOT NULL,
  `bn_contrato` varchar(20) NOT NULL,
  `parce_contrato` int(11) NOT NULL,
  `promo_contrato` varchar(50) NOT NULL,
  `id_contrato` int(11) NOT NULL,
  `id_bccompra_contrato` int(11) NOT NULL,
  `vend_contrato` varchar(50) NOT NULL,
  `situa_contrato` varchar(50) NOT NULL,
  `ade_contrato` varchar(50) NOT NULL,
  `bccompra_contrato` varchar(50) NOT NULL,
  `parceini_contrato` varchar(50) NOT NULL,
  `parcefinal_contrato` varchar(50) NOT NULL,
  `ml_contrato` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_propostas`
--

INSERT INTO `tab_propostas` (`id_propostas`, `id_cli`, `id_orgao`, `bn_contrato`, `parce_contrato`, `promo_contrato`, `id_contrato`, `id_bccompra_contrato`, `vend_contrato`, `situa_contrato`, `ade_contrato`, `bccompra_contrato`, `parceini_contrato`, `parcefinal_contrato`, `ml_contrato`) VALUES
(1, 2, 1, '2', 6, '2', 1, 1, '', '1', 'FDSFDS', '2', '350,00', '560,00', 'ml');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_situacao`
--

CREATE TABLE `tab_situacao` (
  `id_situacao` int(11) NOT NULL,
  `descricao_situacao` varchar(200) NOT NULL,
  `motivo_descricao_situacao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_situacao`
--

INSERT INTO `tab_situacao` (`id_situacao`, `descricao_situacao`, `motivo_descricao_situacao`) VALUES
(1, 'Cheque sem fundo devolvido', 'Cliente resolveu pagar em dinheiro'),
(2, 'Em débito', 'Pix devolvido');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_vendedor`
--

CREATE TABLE `tab_vendedor` (
  `id_vendedor` int(11) NOT NULL,
  `nome_vendedor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_vendedor`
--

INSERT INTO `tab_vendedor` (`id_vendedor`, `nome_vendedor`) VALUES
(1, 'Valdir Dutra'),
(2, 'Carlos Augusto Souza');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tab_bccompra`
--
ALTER TABLE `tab_bccompra`
  ADD PRIMARY KEY (`id_bccompra_contrato`);

--
-- Índices de tabela `tab_bn`
--
ALTER TABLE `tab_bn`
  ADD PRIMARY KEY (`id_bn`);

--
-- Índices de tabela `tab_clientes`
--
ALTER TABLE `tab_clientes`
  ADD PRIMARY KEY (`id_cli`);

--
-- Índices de tabela `tab_operacao`
--
ALTER TABLE `tab_operacao`
  ADD PRIMARY KEY (`id_operacao`);

--
-- Índices de tabela `tab_orgao`
--
ALTER TABLE `tab_orgao`
  ADD PRIMARY KEY (`id_orgao`);

--
-- Índices de tabela `tab_promotora`
--
ALTER TABLE `tab_promotora`
  ADD PRIMARY KEY (`id_promotora`);

--
-- Índices de tabela `tab_propostas`
--
ALTER TABLE `tab_propostas`
  ADD PRIMARY KEY (`id_propostas`);

--
-- Índices de tabela `tab_situacao`
--
ALTER TABLE `tab_situacao`
  ADD PRIMARY KEY (`id_situacao`);

--
-- Índices de tabela `tab_vendedor`
--
ALTER TABLE `tab_vendedor`
  ADD PRIMARY KEY (`id_vendedor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tab_bccompra`
--
ALTER TABLE `tab_bccompra`
  MODIFY `id_bccompra_contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tab_bn`
--
ALTER TABLE `tab_bn`
  MODIFY `id_bn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tab_clientes`
--
ALTER TABLE `tab_clientes`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tab_operacao`
--
ALTER TABLE `tab_operacao`
  MODIFY `id_operacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tab_orgao`
--
ALTER TABLE `tab_orgao`
  MODIFY `id_orgao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tab_promotora`
--
ALTER TABLE `tab_promotora`
  MODIFY `id_promotora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tab_propostas`
--
ALTER TABLE `tab_propostas`
  MODIFY `id_propostas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tab_situacao`
--
ALTER TABLE `tab_situacao`
  MODIFY `id_situacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tab_vendedor`
--
ALTER TABLE `tab_vendedor`
  MODIFY `id_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
