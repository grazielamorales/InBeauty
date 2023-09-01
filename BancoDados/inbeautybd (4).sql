-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/06/2023 às 05:01
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
-- Banco de dados: `inbeautybd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `NomeFantasia` varchar(100) NOT NULL,
  `RazaoSocial` varchar(100) NOT NULL,
  `Cnpj` varchar(25) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `numero` varchar(25) NOT NULL,
  `bairro` varchar(25) NOT NULL,
  `cep` varchar(25) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(25) NOT NULL,
  `fone` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL,
  `Senha` varchar(1000) NOT NULL,
  `idPrestador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `NomeFantasia`, `RazaoSocial`, `Cnpj`, `logradouro`, `numero`, `bairro`, `cep`, `cidade`, `uf`, `fone`, `email`, `status`, `Senha`, `idPrestador`) VALUES
(3, 'Studio Hair Beleza', 'Deborah Martins ME', '125.254.789/0001-87', 'Rua Visconte do Rio Branco', '459', 'Centro', '17.202-806', 'Jaú', 'SP', '(14)3622-8745', 'deboram@gmail.com', 'Ativo', '202cb962ac59075b964b07152d234b70', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_reserva`
--

CREATE TABLE `itens_reserva` (
  `iditens_reserva` int(11) NOT NULL,
  `preco` float NOT NULL,
  `situacao` varchar(25) NOT NULL,
  `idServico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `prestador`
--

CREATE TABLE `prestador` (
  `idPrestador` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `DtNasc` date NOT NULL,
  `Celular` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Senha` varchar(100) NOT NULL,
  `Situacao` varchar(20) NOT NULL,
  `Tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `prestador`
--

INSERT INTO `prestador` (`idPrestador`, `Nome`, `DtNasc`, `Celular`, `Email`, `Senha`, `Situacao`, `Tipo`) VALUES
(1, 'Neto Moreira', '1986-07-21', ' (14)9856-8521 ', 'neto@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'prestador'),
(2, 'Helen', '1976-05-17', '(14)9854-8796', 'helen@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'prestador'),
(3, 'Gaby Histher', '1988-01-25', ' (14)9875-2154 ', 'gaby@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'prestador'),
(4, 'Evelin', '1971-03-10', '(14)9857-8745', 'evelin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'prestador'),
(5, 'Déborah', '1976-08-26', '(14)9854-8796', 'debora@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'prestador'),
(6, 'Grazi Hair', '1976-07-14', '(14)99806-9335', 'grazimorales@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'prestador'),
(7, 'Daniel de Oliveira', '1971-08-14', '(14)9865-7458', 'dani@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'prestador'),
(8, 'Neto e Gaby Stufio Har', '1986-04-01', '(14)9999-9999', 'neto@hotmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'prestador'),
(15, 'Gracita Costa', '1973-08-14', ' (14)9875-4521 ', 'gracita@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'prestador'),
(16, 'GRAZIELA BARBOSA MORALES', '1976-07-14', '(14)9999-9999', 'gra3@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'Prestador'),
(26, 'Graziela B. Morales', '1976-07-14', '(14)99806-9335', 'gra4@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'Prestador');

-- --------------------------------------------------------

--
-- Estrutura para tabela `reserva`
--

CREATE TABLE `reserva` (
  `idReserva` int(11) NOT NULL,
  `DataReserva` date NOT NULL,
  `HoraReserva` time NOT NULL,
  `idServico` int(11) NOT NULL,
  `idPrestador` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `Situacao` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `reserva`
--

INSERT INTO `reserva` (`idReserva`, `DataReserva`, `HoraReserva`, `idServico`, `idPrestador`, `idUsuario`, `Situacao`) VALUES
(17, '2023-06-16', '18:00:00', 50, 15, 4, 'Ativo'),
(18, '2023-06-17', '10:00:00', 50, 15, 11, 'Cancelado'),
(19, '2023-06-17', '11:00:00', 38, 15, 11, 'Cancelado'),
(23, '2023-06-19', '08:00:00', 37, 15, 1, 'Cancelado'),
(24, '2023-06-19', '09:00:00', 50, 3, 4, 'Ativo'),
(25, '2023-06-19', '08:00:00', 37, 15, 1, 'Cancelado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico`
--

CREATE TABLE `servico` (
  `idServico` int(11) NOT NULL,
  `descritivo` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `tempoEstimado` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `servico`
--

INSERT INTO `servico` (`idServico`, `descritivo`, `preco`, `tempoEstimado`) VALUES
(37, 'Corte Feminino', 85, '01:00:00'),
(38, 'Escova Modeladora Cabelo Longo', 80, '01:00:00'),
(40, 'Tintura Retoque Raiz', 60, '01:00:00'),
(41, 'Escova Progressiva', 150, '01:30:00'),
(42, 'Manicure simples', 25, '01:00:00'),
(43, 'Pedicure simples', 30, '01:00:00'),
(44, 'Manicure & Pedicure Simples', 60, '01:30:00'),
(45, 'Maquiagem p/ festa', 120, '01:00:00'),
(46, 'Hidratação cabelo longo', 130, '01:00:00'),
(47, 'Penteado p/ festa', 150, '01:00:00'),
(48, 'Mechas completa cabelo longo', 250, '01:30:00'),
(49, 'Mechas retoque cabelo longo', 180, '01:30:00'),
(50, 'Corte e Escova', 100, '01:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicoprestadorservico`
--

CREATE TABLE `servicoprestadorservico` (
  `id` int(11) NOT NULL,
  `idPrestador` int(11) NOT NULL,
  `idServico` int(11) NOT NULL,
  `Situacao` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `servicoprestadorservico`
--

INSERT INTO `servicoprestadorservico` (`id`, `idPrestador`, `idServico`, `Situacao`) VALUES
(35, 15, 50, 'Ativo'),
(36, 15, 37, 'Ativo'),
(37, 15, 38, 'Ativo'),
(38, 15, 41, 'Ativo'),
(39, 15, 46, 'Ativo'),
(40, 15, 44, 'Ativo'),
(41, 15, 42, 'Ativo'),
(42, 15, 45, 'Ativo'),
(43, 15, 48, 'Ativo'),
(44, 15, 49, 'Ativo'),
(45, 15, 43, 'Ativo'),
(46, 15, 47, 'Ativo'),
(48, 15, 40, 'Ativo'),
(64, 8, 50, 'Ativo'),
(65, 8, 37, 'Ativo'),
(66, 8, 38, 'Ativo'),
(67, 8, 41, 'Ativo'),
(68, 8, 46, 'Ativo'),
(69, 8, 44, 'Ativo'),
(70, 8, 42, 'Ativo'),
(71, 8, 45, 'Ativo'),
(72, 8, 48, 'Ativo'),
(73, 8, 49, 'Ativo'),
(74, 8, 43, 'Ativo'),
(75, 8, 47, 'Ativo'),
(76, 8, 40, 'Ativo'),
(77, 1, 50, 'Ativo'),
(78, 1, 37, 'Ativo'),
(82, 3, 50, 'Ativo'),
(83, 3, 37, 'Ativo'),
(84, 3, 38, 'Ativo'),
(85, 3, 41, 'Ativo'),
(86, 3, 46, 'Ativo'),
(87, 3, 44, 'Ativo'),
(88, 3, 42, 'Ativo'),
(89, 3, 45, 'Ativo'),
(90, 3, 48, 'Ativo'),
(91, 3, 49, 'Ativo'),
(92, 3, 43, 'Ativo'),
(93, 3, 47, 'Ativo'),
(94, 3, 40, 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Cpf` varchar(25) NOT NULL,
  `DataNascimento` date NOT NULL,
  `Celular` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Senha` varchar(100) NOT NULL,
  `Situacao` varchar(20) NOT NULL,
  `Apelido` varchar(50) NOT NULL,
  `Sexo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Nome`, `Cpf`, `DataNascimento`, `Celular`, `Email`, `Senha`, `Situacao`, `Apelido`, `Sexo`) VALUES
(1, 'Graziela Morales', '26458064810', '1976-07-14', '(14)99806-9335', 'grazimorales@hotmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'Grazy', 'feminino'),
(3, 'Luiz Felipe Mendes', '555.555.555-55', '1986-05-21', '(14)9878-5478', 'luizfm@gmail.com', '202cb962ac59075b964b07152d234b70\r\n', 'Ativo', 'Luis Felipe', 'masculino'),
(4, 'Ana Clara Romão', '888.888.888-88', '2006-09-17', '(14)9874-6532', 'kaka@gmail.com', '202cb962ac59075b964b07152d234b70\r\n', 'Ativo', 'Kaka', 'feminino'),
(5, 'Silvio Silva', '444.444.444-44', '1975-09-21', '(14)9874-4125', 'silvio@gmail.com', '202cb962ac59075b964b07152d234b70\r\n', 'Ativo', 'Silvio', 'masculino'),
(6, 'Júlia Marostiga', '777.777.777-77', '1980-01-19', '(99)9999-9999', 'juliam@gmail.com', '202cb962ac59075b964b07152d234b70\r\n', 'Ativo', 'Júlia', 'feminino'),
(7, 'João Paulo Lopes', '265.478.456-58', '1985-07-14', '(14)9999-9999', 'joaop@gmail.com', '202cb962ac59075b964b07152d234b70\r\n', 'Ativo', 'João', 'masculino'),
(8, 'Danielle Franco', '236.548.785-45', '1986-01-10', '(14)9865-8754', 'danielle@hotmail.com', '202cb962ac59075b964b07152d234b70\r\n', 'Ativo', 'Dani', 'feminino'),
(9, 'Pedro', '55555555', '1979-07-14', '5555555', 'pedro@hotmail.com', '202cb962ac59075b964b07152d234b70\r\n', 'inativa', 'pedro', 'masculino'),
(10, 'Ana Lívia Franco', '555.555.555-55', '2003-04-19', '(14)9999-9999', 'anali@hotmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'Ana Lívia', 'feminino'),
(11, 'Tamires Fernandes', '584.698.784-89', '1987-04-21', '(14)9999-9999', 'tamires@gmail.com', '202cb962ac59075b964b07152d234b70', 'Inativa', 'Tamires', 'feminino'),
(17, 'GRAZIELA BARBOSA MORALES', '26458064810', '1976-07-14', '(14)9806-9335', 'grazimorales@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'Grazy', 'feminino'),
(18, 'Laura Mobilon', '555.555.555-55', '1973-08-08', '(14)99806-9335', 'laura@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'Laura', 'feminino'),
(19, 'GRAZIELA BARBOSA MORALES', '264.580.648-10', '1976-07-14', '(14)99806-9335', 'grazi@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'Grazy', 'feminino');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD KEY `idPrestador` (`idPrestador`);

--
-- Índices de tabela `itens_reserva`
--
ALTER TABLE `itens_reserva`
  ADD PRIMARY KEY (`iditens_reserva`),
  ADD KEY `idServico` (`idServico`),
  ADD KEY `idServico_2` (`idServico`);

--
-- Índices de tabela `prestador`
--
ALTER TABLE `prestador`
  ADD PRIMARY KEY (`idPrestador`);

--
-- Índices de tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `idPrestador` (`idPrestador`),
  ADD KEY `idServico` (`idUsuario`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idServico_2` (`idServico`);

--
-- Índices de tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`idServico`);

--
-- Índices de tabela `servicoprestadorservico`
--
ALTER TABLE `servicoprestadorservico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPrestador` (`idPrestador`),
  ADD KEY `idServico` (`idServico`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `itens_reserva`
--
ALTER TABLE `itens_reserva`
  MODIFY `iditens_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `prestador`
--
ALTER TABLE `prestador`
  MODIFY `idPrestador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `servicoprestadorservico`
--
ALTER TABLE `servicoprestadorservico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`idPrestador`) REFERENCES `prestador` (`idPrestador`);

--
-- Restrições para tabelas `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`idPrestador`) REFERENCES `prestador` (`idPrestador`),
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`idServico`) REFERENCES `servico` (`idServico`);

--
-- Restrições para tabelas `servicoprestadorservico`
--
ALTER TABLE `servicoprestadorservico`
  ADD CONSTRAINT `servicoprestadorservico_ibfk_1` FOREIGN KEY (`idPrestador`) REFERENCES `prestador` (`idPrestador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servicoprestadorservico_ibfk_2` FOREIGN KEY (`idServico`) REFERENCES `servico` (`idServico`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
