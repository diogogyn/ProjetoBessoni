-- phpMyAdmin SQL Dump
-- version 3.3.8
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: Jan 22, 2011 as 12:59 PM
-- Versão do Servidor: 5.1.52
-- Versão do PHP: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `bessoni`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `login`, `senha`) VALUES
(1, 'antonio', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `texto` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `empresa`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `inicio`
--

CREATE TABLE IF NOT EXISTS `inicio` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `texto` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `inicio`
--

INSERT INTO `inicio` (`id`, `titulo`, `data`, `texto`) VALUES
(9, '', '2011-01-19', '<p>Este ser&aacute; o nosso futuro site da loja. Nele vo&ecirc; poder&aacute; ver os nosso trabalhos realizados, e as noticias que acontece em &nbsp;nossa loja. MAS POR ENQUANTO ESTA EM CONSTRU&Ccedil;&Atilde;OO. Este site foi desenvolvido por Diogo e Heector.</p>'),
(8, 'Bem vindo ao site!', '2011-01-19', '<p>Este &eacute; o novo site do tecnogyn, o mundo em suas m&atilde;os e vem agora para melhorar ainda mais sua vida</p>'),
(10, '', '2011-01-19', '<p>Este ser&aacute; o nosso futuro site da loja. Nele vo&ecirc; poder&aacute; ver os nosso trabalhos realizados, e as noticias que acontece em &nbsp;nossa loja. MAS POR ENQUANTO ESTA EM CONSTRU&Ccedil;&Atilde;OO. Este site foi desenvolvido por Diogo e Heector.</p>'),
(11, '', '2011-01-19', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `texto` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `data`, `texto`) VALUES
(8, 'noticia sobre o lançamento', '2011-01-18', 'o site acaba de ser lançado para melhor atende-lo, aproveitte e mande um comentario falando o que você achou deste site.');
