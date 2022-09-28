-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 16-Ago-2022 às 12:32
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `sistema`
--
CREATE DATABASE IF NOT EXISTS `sistema` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sistema`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`codigo`, `nome`, `cpf`, `rg`, `cep`, `numero`, `celular`, `email`) VALUES
(1, 'sophia', '501713888-95', '343434343', '11703-800', '95', '(13) 99623-6818', 'sophia.verardods@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE IF NOT EXISTS `fornecedor` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nmEmpresa` varchar(50) NOT NULL,
  `nmContato` varchar(50) NOT NULL,
  `produto` varchar(20) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `ie` varchar(20) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`codigo`, `nmEmpresa`, `nmContato`, `produto`, `cnpj`, `ie`, `cep`, `numero`, `celular`, `email`) VALUES
(1, 'symetra', 'sophia', 'tecnologia', '2133423789', '21836238497', '11703-800', '95', '(11) 98764-2387', 'sophia@symetra.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `dtAdmissao` date NOT NULL,
  `vlSalario` float(7,2) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`codigo`, `nome`, `cpf`, `rg`, `dtAdmissao`, `vlSalario`, `cep`, `numero`, `celular`, `email`) VALUES
(1, 'marcelo', '123123123-11', '123123123', '0000-00-00', 2444.00, '11703-800', '95', '(13)99999-8888', 'marcelo@gmail.com'),
(2, 'marcelo', '123123123-11', '123123123', '2022-09-13', 2444.00, '11703-800', '95', '(13)99999-8888', 'marcelo@gmail.com'),
(3, 'marcelo', '123123123-11', '123123123', '2022-09-13', 2444.00, '11703-800', '95', '(13)99999-8888', 'marcelo@gmail.com'),
(4, 'marcelo', '123123123-11', '123123123', '2022-09-13', 2444.00, '11703-800', '95', '(13)99999-8888', 'marcelo@gmail.com'),
(5, 'marcelo', '123123123-11', '123123123', '2022-09-13', 2444.00, '11703-800', '95', '(13)99999-8888', 'marcelo@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `vlPreco` float(7,2) NOT NULL,
  `qtEstoque` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;