-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06-Jan-2016 às 12:25
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cliente_id` bigint(20) NOT NULL DEFAULT '0',
  `cliente_nome` varchar(100) NOT NULL,
  `cliente_email` varchar(50) NOT NULL,
  `cliente_telefone` bigint(20) NOT NULL,
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cliente_id`, `cliente_nome`, `cliente_email`, `cliente_telefone`) VALUES
(1, 'JoÃ£o pereira', 'joao@teste.com', 11999997777),
(2, 'Antonio Carlos', 'antonio@teste.com', 11999996666);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `pedido_id` bigint(20) NOT NULL DEFAULT '0',
  `produto_id` bigint(20) DEFAULT NULL,
  `qtde_produto` bigint(20) DEFAULT NULL,
  `cliente_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`pedido_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`pedido_id`, `produto_id`, `qtde_produto`, `cliente_id`) VALUES
(1, 1, 55, 2),
(2, 2, 17, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `produto_id` bigint(20) NOT NULL DEFAULT '0',
  `produto_nome` varchar(100) NOT NULL,
  `produto_descricao` varchar(500) NOT NULL,
  `produto_preco` decimal(10,2) NOT NULL,
  PRIMARY KEY (`produto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`produto_id`, `produto_nome`, `produto_descricao`, `produto_preco`) VALUES
(1, 'Exemplo de produto 1', 'DescriÃ§Ã£o do primeiro produto', '59.99'),
(2, 'Exemplo de produto 2', 'DescriÃ§Ã£o do segundo produto', '15.50');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
