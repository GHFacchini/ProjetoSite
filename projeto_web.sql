-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jun-2021 às 03:58
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_web`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio`
--

CREATE TABLE `cardapio` (
  `id_prato` int(3) NOT NULL,
  `id_rest` int(3) NOT NULL,
  `nome_prato` varchar(45) NOT NULL,
  `valor_prato` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ranking`
--

CREATE TABLE `ranking` (
  `id_rest` int(3) NOT NULL,
  `nota_rest` float NOT NULL,
  `media_rest` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `restaurantes`
--

CREATE TABLE `restaurantes` (
  `id_rest` int(3) NOT NULL,
  `nome_rest` varchar(45) NOT NULL,
  `telefone_rest` varchar(13) NOT NULL,
  `endereco_rest` varchar(60) NOT NULL,
  `categoria_rest` varchar(20) NOT NULL,
  `categoria_sec` varchar(20) NOT NULL,
  `imagem_rest` varchar(60) NOT NULL,
  `link_rest` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `restaurantes`
--

INSERT INTO `restaurantes` (`id_rest`, `nome_rest`, `telefone_rest`, `endereco_rest`, `categoria_rest`, `categoria_sec`, `imagem_rest`, `link_rest`) VALUES
(11, 'Doceria Trindade', '51980133819', 'Cruz Alta', 'Doce', '', 'documentos/Doceria Trindade.jpg', 'https://www.instagram.com/doceria_trindade/'),
(12, 'San Telmo', '55991049340', 'Cruz Alta', 'Hamburguer', '', 'documentos/San Telmo.jpg', 'https://www.instagram.com/sthamburguesas/'),
(13, 'Deuses da Pizza', ' 559917179', 'Cruz Alta', 'Pizza', '', 'documentos/Deuses da Pizza.jpg', 'https://www.instagram.com/deusesdapizza'),
(14, 'Doceria da Bê', '55996058377', 'Cruz Alta ', 'Doce', '', 'documentos/Doceria da Bê.jpg', 'https://www.instagram.com/brigadeiros_be/'),
(15, 'Pedaço do Céu', '55920007393', 'Cruz Alta', 'Doce', 'Salgado', 'documentos/Pedaço do Céu.jpg', 'https://www.instagram.com/pe.dacodoceu'),
(16, 'La Paineira', '55991855490', 'Cruz Alta', 'Caseira', '', 'documentos/La Paineira.jpg', 'https://www.instagram.com/lapaineira'),
(17, 'Diou Burger', '55999061590', 'Cruz Alta', 'Hamburguer', '', 'documentos/Diou Burger.jpg', 'https://www.instagram.com/diouburger/'),
(18, 'Cia do João', '321321321', 'asuihfaoishfo', 'Hamburguer', 'Pizza', 'documentos/Cia do João.jpg', 'https://www.instagram.com/pontinjoao/'),
(19, 'Lancheria do Facchini', '55991232643', 'rosalina jung 052', 'Pizza', 'Hamburguer', 'documentos/Lancheria do Facchini.jpeg', 'https://www.linkedin.com/in/gabriel-facchini-731774180');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao`
--

CREATE TABLE `solicitacao` (
  `id_solic` int(5) NOT NULL,
  `nome_solic` varchar(30) NOT NULL,
  `sobrenome_solic` varchar(40) NOT NULL,
  `nome_rest_solic` varchar(30) NOT NULL,
  `telefone_solic` varchar(15) NOT NULL,
  `email_solic` varchar(40) NOT NULL,
  `endereco_solic` varchar(40) NOT NULL,
  `categoria_solic` varchar(15) NOT NULL,
  `categoria_sec_solic` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `solicitacao`
--

INSERT INTO `solicitacao` (`id_solic`, `nome_solic`, `sobrenome_solic`, `nome_rest_solic`, `telefone_solic`, `email_solic`, `endereco_solic`, `categoria_solic`, `categoria_sec_solic`) VALUES
(16, 'gabriel', 'facchini', 'cia do joao ', '32113211', 'joao@gmail.com', 'shdfasdgasdg', 'Hamburguer', 'Caseira'),
(17, 'Gabriel', 'Facchini', 'Xis do Facchini', '55991232643', 'gabriel@gmail.com', 'Rosalina Jung 52', 'Hamburguer', ''),
(18, 'Ana', 'Facchini', 'Pushiro', '321321321', 'ana@gmail.com', 'Rua da caverna 555', 'Doce', 'Outro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(40) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(40) NOT NULL,
  `idade` int(3) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `sobrenome`, `cpf`, `email`, `idade`, `telefone`, `senha`) VALUES
(1, 'Gabriel', 'Facchini', '321321321', 'gabriel@gmail.com', 20, '991232643', '4297f44b13955235245b2497399d7a93'),
(2, 'Ana', 'Facchini', '32132132132', 'ana@gmail.com', 22, '123123123', '390ba5f6b5f18dd4c63d7cda170a0c74');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD PRIMARY KEY (`id_prato`),
  ADD KEY `id_rest` (`id_rest`);

--
-- Índices para tabela `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_rest`);

--
-- Índices para tabela `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`id_rest`);

--
-- Índices para tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD PRIMARY KEY (`id_solic`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cardapio`
--
ALTER TABLE `cardapio`
  MODIFY `id_prato` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id_rest` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `id_rest` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  MODIFY `id_solic` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD CONSTRAINT `cardapio_ibfk_1` FOREIGN KEY (`id_rest`) REFERENCES `restaurantes` (`id_rest`);

--
-- Limitadores para a tabela `ranking`
--
ALTER TABLE `ranking`
  ADD CONSTRAINT `ranking_ibfk_1` FOREIGN KEY (`id_rest`) REFERENCES `restaurantes` (`id_rest`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
