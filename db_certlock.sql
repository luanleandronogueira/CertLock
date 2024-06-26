-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/06/2024 às 02:02
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_certlock`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_entidades`
--

CREATE TABLE `tb_entidades` (
  `id_entidade` int(11) NOT NULL,
  `cnpj_entidade` bigint(14) NOT NULL,
  `nome_empresa_entidade` varchar(200) NOT NULL,
  `contato_entidade` varchar(10) NOT NULL,
  `logradouro_entidade` varchar(200) NOT NULL,
  `numero_entidade` varchar(10) NOT NULL,
  `bairro_entidade` varchar(100) NOT NULL,
  `cidade_entidade` varchar(100) NOT NULL,
  `uf_entidade` varchar(2) NOT NULL,
  `cep_entidade` int(10) NOT NULL,
  `email_entidade` varchar(200) NOT NULL,
  `status_entidade` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_entidades`
--

INSERT INTO `tb_entidades` (`id_entidade`, `cnpj_entidade`, `nome_empresa_entidade`, `contato_entidade`, `logradouro_entidade`, `numero_entidade`, `bairro_entidade`, `cidade_entidade`, `uf_entidade`, `cep_entidade`, `email_entidade`, `status_entidade`) VALUES
(5, 47972763000168, 'Luan Leandro Nogueira', '8798845753', 'Praça Manoel Luis do Nascimento', '31', 'Boa Vista', 'Garanhuns', 'PE', 55292400, 'luannogueira093@gmail.com', 'A'),
(6, 12345678912345, 'Aylla De Kássia Alves Ferreira Nogueira', '8798845753', 'Praça Manoel Luis do Nascimento', '31', 'Boa Vista', 'Garanhuns', 'PE', 55292400, 'luannogueira093@gmail.com', 'A'),
(7, 12345678912341, 'Camarão Ao LTDA', '8198585474', 'São Pedro', '1345', 'Curado', 'Recife', 'PE', 12345678, 'camaraoao@gmail.com', 'A'),
(8, 32165498700332, 'Junior Tem De Tudo Ltda', '8198585474', 'São Pedro', '1345', 'Boa Vista', 'Garanhuns', 'PE', 55292400, 'luannogueira093@gmail.com', 'A');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_entidades_pf`
--

CREATE TABLE `tb_entidades_pf` (
  `id_entidade_pf` int(11) NOT NULL,
  `cpf_entidade_pf` varchar(11) NOT NULL,
  `nome_entidade_pf` varchar(200) NOT NULL,
  `email_entidade_pf` varchar(150) NOT NULL,
  `contato_entidade_pf` varchar(10) NOT NULL,
  `status_entidade_pf` varchar(1) NOT NULL,
  `id_entidade_usuario_adm_pf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_entidades_pf`
--

INSERT INTO `tb_entidades_pf` (`id_entidade_pf`, `cpf_entidade_pf`, `nome_entidade_pf`, `email_entidade_pf`, `contato_entidade_pf`, `status_entidade_pf`, `id_entidade_usuario_adm_pf`) VALUES
(1, '11769868488', 'Luan Leandro Nogueira', 'luannogueira093@gmail.com', '8798845753', 'A', 0),
(2, '08635248422', 'Aylla de Kássia A. F. Nogueira', 'luannogueira093@gmail.com', '8798845753', 'A', 0),
(3, '10110110110', 'Elisa Alves Ferreira Nogueira', 'elisa@exemplo.com', '8798546766', 'A', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuario_adm_pf`
--

CREATE TABLE `tb_usuario_adm_pf` (
  `id_usuario_adm_pf` int(11) NOT NULL,
  `cpf_usuario_adm_pf` varchar(11) NOT NULL,
  `email_usuario_adm_pf` varchar(100) NOT NULL,
  `nome_usuario_adm_pf` varchar(150) NOT NULL,
  `senha_usuario_adm_pf` varchar(200) NOT NULL,
  `status_usuario_adm_pf` varchar(1) NOT NULL,
  `id_entidade_usuario_adm_pf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_usuario_adm_pf`
--

INSERT INTO `tb_usuario_adm_pf` (`id_usuario_adm_pf`, `cpf_usuario_adm_pf`, `email_usuario_adm_pf`, `nome_usuario_adm_pf`, `senha_usuario_adm_pf`, `status_usuario_adm_pf`, `id_entidade_usuario_adm_pf`) VALUES
(1, '11769868488', 'luan@luan.com', 'Luan Leandro Nogueira', '$2y$10$HQ8AeyQGO2ddPtVw69wulexqpu.JM8AO3/uOjcS3WsA6PcEJ4utSq', 'A', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuario_adm_pj`
--

CREATE TABLE `tb_usuario_adm_pj` (
  `id_usuario_adm_pj` int(11) NOT NULL,
  `cpf_usuario_adm_pj` varchar(14) NOT NULL,
  `email_usuario_adm_pj` varchar(100) NOT NULL,
  `nome_usuario_adm_pj` varchar(150) NOT NULL,
  `senha_usuario_adm_pj` varchar(200) NOT NULL,
  `status_usuario_adm_pj` varchar(1) NOT NULL,
  `id_entidade_usuario_adm_pj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_usuario_adm_pj`
--

INSERT INTO `tb_usuario_adm_pj` (`id_usuario_adm_pj`, `cpf_usuario_adm_pj`, `email_usuario_adm_pj`, `nome_usuario_adm_pj`, `senha_usuario_adm_pj`, `status_usuario_adm_pj`, `id_entidade_usuario_adm_pj`) VALUES
(1, '11769868488', 'luannogueira093@gmail.com', 'Luan Leandro Nogueira', '$2y$10$ovTPZRrsPFjux1XjeyKSJePB7CBSV6NyCX7ug5z9.oVfKa7Vzl3c.', 'A', 5),
(2, '08635248422', 'luannogueira093@gmail.com', 'Aylla Alves', '$2y$10$OZsTP/zZfaKXz50sSkS6m.pZLRGdPGryK7VxA16TexCvfz9vBSuZO', 'A', 5),
(3, '12345678900', 'Elisa@gmail.com', 'Elisa Alves Ferreira Nogueira', '$2y$10$5de4Y7H8Q6iBRoH6XxX5TOO.kBXRLjvs1rmlFcaMRE67X7h4a9bXu', 'A', 6),
(4, '74185296311', 'grupoj@gmail.com', 'Jucelino Ferreira Leite Junior', '$2y$10$EK58XnzLgnPsyevM5CgMqO1BmOaz2QocWL7wbXDbGxlV5/utpadm2', 'A', 8);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_entidades`
--
ALTER TABLE `tb_entidades`
  ADD PRIMARY KEY (`id_entidade`);

--
-- Índices de tabela `tb_entidades_pf`
--
ALTER TABLE `tb_entidades_pf`
  ADD PRIMARY KEY (`id_entidade_pf`);

--
-- Índices de tabela `tb_usuario_adm_pf`
--
ALTER TABLE `tb_usuario_adm_pf`
  ADD PRIMARY KEY (`id_usuario_adm_pf`),
  ADD KEY `fk_id_entidade_usuario_adm_pf` (`id_entidade_usuario_adm_pf`);

--
-- Índices de tabela `tb_usuario_adm_pj`
--
ALTER TABLE `tb_usuario_adm_pj`
  ADD PRIMARY KEY (`id_usuario_adm_pj`),
  ADD KEY `fk_id_entidade_usuario_adm_pj` (`id_entidade_usuario_adm_pj`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_entidades`
--
ALTER TABLE `tb_entidades`
  MODIFY `id_entidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_entidades_pf`
--
ALTER TABLE `tb_entidades_pf`
  MODIFY `id_entidade_pf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_usuario_adm_pf`
--
ALTER TABLE `tb_usuario_adm_pf`
  MODIFY `id_usuario_adm_pf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_usuario_adm_pj`
--
ALTER TABLE `tb_usuario_adm_pj`
  MODIFY `id_usuario_adm_pj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_usuario_adm_pf`
--
ALTER TABLE `tb_usuario_adm_pf`
  ADD CONSTRAINT `fk_id_entidade_usuario_adm_pf` FOREIGN KEY (`id_entidade_usuario_adm_pf`) REFERENCES `tb_entidades_pf` (`id_entidade_pf`);

--
-- Restrições para tabelas `tb_usuario_adm_pj`
--
ALTER TABLE `tb_usuario_adm_pj`
  ADD CONSTRAINT `fk_id_entidade_usuario_adm_pj` FOREIGN KEY (`id_entidade_usuario_adm_pj`) REFERENCES `tb_entidades` (`id_entidade`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
