-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Maio-2023 às 17:00
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdinbeauty`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoriaprestserv`
--

CREATE TABLE `categoriaprestserv` (
  `idCategoriaPrestServ` int(10) UNSIGNED NOT NULL,
  `Descricao` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(10) UNSIGNED NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Cpf` varchar(20) NOT NULL,
  `DtNasc` date NOT NULL,
  `Cel` varchar(20) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Senha` varchar(100) NOT NULL,
  `Status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `Nome`, `Cpf`, `DtNasc`, `Cel`, `Email`, `Senha`, `Status`) VALUES
(1, 'Graziela B. Morales', '264.580.648-10', '1976-07-14', '(14)99806-9335', 'grazimorales@hotmail.com', '202cb962ac59075b964b07152d234b70', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(10) UNSIGNED NOT NULL,
  `NomeFantasia` varchar(100) NOT NULL,
  `RazaoSocial` varchar(100) NOT NULL,
  `Cnpj` varchar(100) NOT NULL,
  `Logradouto` varchar(100) NOT NULL,
  `Num` varchar(50) NOT NULL,
  `Bairro` varchar(100) NOT NULL,
  `Cep` varchar(15) NOT NULL,
  `Cidade` varchar(100) NOT NULL,
  `Uf` varchar(5) NOT NULL,
  `Fone` varchar(20) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Senha` varchar(200) NOT NULL,
  `Status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `NomeFantasia`, `RazaoSocial`, `Cnpj`, `Logradouto`, `Num`, `Bairro`, `Cep`, `Cidade`, `Uf`, `Fone`, `Email`, `Senha`, `Status`) VALUES
(2, 'Grazi Hair Studio', 'Graziela Morales ME', '555.555.555/0001-55', 'Rua Francisco Pereira', '459', 'Pires de Campos II', '18.210-802', 'Jaú', 'SP', '(14)99806-9335', '', '202cb962ac59075b964b07152d234b70', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemreserva`
--

CREATE TABLE `itemreserva` (
  `idItemReserva` int(10) UNSIGNED NOT NULL,
  `Preco` float DEFAULT NULL,
  `StatusReserva` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestservico`
--

CREATE TABLE `prestservico` (
  `idPrestServ` int(10) UNSIGNED NOT NULL,
  `CategoriaPrestServ_idCategoriaPrestServ` int(10) UNSIGNED NOT NULL,
  `Empresa_idEmpresa` int(10) UNSIGNED NOT NULL,
  `Nome` char(1) DEFAULT NULL,
  `Cpf` char(1) DEFAULT NULL,
  `DtNasc` char(1) DEFAULT NULL,
  `Cel` char(1) DEFAULT NULL,
  `Email` char(1) DEFAULT NULL,
  `Senha` char(1) DEFAULT NULL,
  `Status_2` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestservico_has_servico`
--

CREATE TABLE `prestservico_has_servico` (
  `PrestServico_CategoriaPrestServ_idCategoriaPrestServ` int(10) UNSIGNED NOT NULL,
  `PrestServico_idPrestServ` int(10) UNSIGNED NOT NULL,
  `Servico_idServico` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `idReserva` int(10) UNSIGNED NOT NULL,
  `ItemReserva_idItemReserva` int(10) UNSIGNED NOT NULL,
  `Cliente_idCliente` int(10) UNSIGNED NOT NULL,
  `Servico_idServico` int(10) UNSIGNED NOT NULL,
  `DtReserva` date DEFAULT NULL,
  `HoraReserva` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `idServico` int(10) UNSIGNED NOT NULL,
  `Descricao` char(1) DEFAULT NULL,
  `Preco` float DEFAULT NULL,
  `TempoEstim` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoriaprestserv`
--
ALTER TABLE `categoriaprestserv`
  ADD PRIMARY KEY (`idCategoriaPrestServ`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Índices para tabela `itemreserva`
--
ALTER TABLE `itemreserva`
  ADD PRIMARY KEY (`idItemReserva`);

--
-- Índices para tabela `prestservico`
--
ALTER TABLE `prestservico`
  ADD PRIMARY KEY (`idPrestServ`,`CategoriaPrestServ_idCategoriaPrestServ`),
  ADD KEY `PrestServico_FKIndex1` (`Empresa_idEmpresa`),
  ADD KEY `PrestServico_FKIndex2` (`CategoriaPrestServ_idCategoriaPrestServ`);

--
-- Índices para tabela `prestservico_has_servico`
--
ALTER TABLE `prestservico_has_servico`
  ADD PRIMARY KEY (`PrestServico_CategoriaPrestServ_idCategoriaPrestServ`,`PrestServico_idPrestServ`,`Servico_idServico`),
  ADD KEY `PrestServico_has_Servico_FKIndex1` (`PrestServico_idPrestServ`,`PrestServico_CategoriaPrestServ_idCategoriaPrestServ`),
  ADD KEY `PrestServico_has_Servico_FKIndex2` (`Servico_idServico`);

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idReserva`,`ItemReserva_idItemReserva`,`Cliente_idCliente`,`Servico_idServico`),
  ADD KEY `Reserva_FKIndex1` (`ItemReserva_idItemReserva`),
  ADD KEY `Reserva_FKIndex2` (`Cliente_idCliente`),
  ADD KEY `Reserva_FKIndex3` (`Servico_idServico`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`idServico`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoriaprestserv`
--
ALTER TABLE `categoriaprestserv`
  MODIFY `idCategoriaPrestServ` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `itemreserva`
--
ALTER TABLE `itemreserva`
  MODIFY `idItemReserva` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `prestservico`
--
ALTER TABLE `prestservico`
  MODIFY `idPrestServ` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idReserva` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `idServico` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `prestservico`
--
ALTER TABLE `prestservico`
  ADD CONSTRAINT `prestservico_ibfk_1` FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
