-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/07/2024 às 04:23
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
-- Estrutura para tabela `tb_clientes_pf`
--

CREATE TABLE `tb_clientes_pf` (
  `id_cliente_pf` int(11) NOT NULL,
  `cpf_cliente_pf` varchar(14) NOT NULL,
  `nome_cliente_pf` varchar(200) NOT NULL,
  `email_cliente_pf` varchar(100) NOT NULL,
  `contato_cliente_pf` varchar(15) NOT NULL,
  `id_usuario_cliente_pf` int(11) NOT NULL,
  `entidade_cliente_pf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_clientes_pf`
--

INSERT INTO `tb_clientes_pf` (`id_cliente_pf`, `cpf_cliente_pf`, `nome_cliente_pf`, `email_cliente_pf`, `contato_cliente_pf`, `id_usuario_cliente_pf`, `entidade_cliente_pf`) VALUES
(5, '11769868488', 'Luan Leandro Nogueira', 'luannogueira093@gmail.com', '87988457530', 5, 7),
(6, '08635248422', 'Aylla De Kássia Alves Ferreira Nogueira', 'aylla.alves@gmail.com', '87996437287', 5, 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_clientes_pj`
--

CREATE TABLE `tb_clientes_pj` (
  `id_cliente_pj` int(11) NOT NULL,
  `responsavel_cliente_pj` varchar(100) NOT NULL,
  `telefone_cliente_pj` varchar(12) NOT NULL,
  `cnpj_cliente_pj` varchar(14) NOT NULL,
  `nome_cliente_pj` varchar(200) NOT NULL,
  `contato_cliente_pj` varchar(12) NOT NULL,
  `logradouro_cliente_pj` varchar(100) NOT NULL,
  `numero_cliente_pj` varchar(10) NOT NULL,
  `bairro_cliente_pj` varchar(200) NOT NULL,
  `cidade_cliente_pj` varchar(100) NOT NULL,
  `uf_cliente_pj` varchar(2) NOT NULL,
  `cep_cliente_pj` int(11) NOT NULL,
  `email_cliente_pj` varchar(200) NOT NULL,
  `id_usuario_cliente_pj` int(11) NOT NULL,
  `entidade_cliente_pj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_clientes_pj`
--

INSERT INTO `tb_clientes_pj` (`id_cliente_pj`, `responsavel_cliente_pj`, `telefone_cliente_pj`, `cnpj_cliente_pj`, `nome_cliente_pj`, `contato_cliente_pj`, `logradouro_cliente_pj`, `numero_cliente_pj`, `bairro_cliente_pj`, `cidade_cliente_pj`, `uf_cliente_pj`, `cep_cliente_pj`, `email_cliente_pj`, `id_usuario_cliente_pj`, `entidade_cliente_pj`) VALUES
(3, 'Luis Roldão Sobrinho', '87988457530', '12345678901234', 'Câmara Municipal De Garanhuns', '(87) 3761-38', 'Joaquim Távora,  ', '305', 'Heliopólis', 'Garanhuns', 'PE', 55290, 'camaragaranhuns@hotmail.com', 1, 5),
(4, 'André Luiz Gonçalves', '87988762111', '58199449000100', 'E-TICONS EMPRESA DE TECNOLOGIA DA INFORMAÇÃO & CONSULTORIA LTDA', '87988762111', 'São Miguel', '206', 'Brejo', 'Garanhuns', 'PE', 55291, 'ticons@gmail.com.br', 5, 7),
(5, 'Andre Luiz Felizardo', '87988457530', '99999999999999', 'E&E Calçados', '87988457530', 'São Miguel', '413', 'Torre', 'Garanhuns', 'PB', 55292400, 'luannogueira093@gmail.com', 5, 7);

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
(5, 47972763000168, 'Luan Leandro Nogueira', '8798845753', 'Praça Manoel Luis do Nascimento', '31', 'Aloisio Pinto', 'Garanhuns', 'PE', 55292400, 'luannogueira093@gmail.com', 'A'),
(6, 12345678912345, 'Aylla De Kássia Alves Ferreira Nogueira', '8798845753', 'Praça Manoel Luis do Nascimento', '31', 'Boa Vista', 'Garanhuns', 'PE', 55292400, 'luannogueira093@gmail.com', 'A'),
(7, 12345678912341, 'Camarão Ao LTDA', '8198585474', 'São Pedro', '1345', 'Curado', 'Recife', 'PE', 12345678, 'camaraoao@gmail.com', 'A'),
(8, 32165498700332, 'Junior Tem De Tudo Ltda', '8198585474', 'São Pedro', '1345', 'Boa Vista', 'Garanhuns', 'PE', 55292400, 'luannogueira093@gmail.com', 'A'),
(9, 12345678900987, 'It Solucões Inteligentes Ltda', '8791234567', 'São Miguel', '413', 'Aloisio Pinto', 'Garanhuns', 'ES', 55292400, 'luannogueira093@gmail.com', 'A'),
(10, 12344321123234, 'Prefeitura De Alagoinha', '123123123', 'Avenida central', '12313', 'Centro', 'Alagoinha', 'PE', 55291221, 'alagoinha@alagoinha.pe.gov.br', 'A');

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
(3, '10110110110', 'Elisa Alves Ferreira Nogueira', 'elisa@outlook.com', '8798546766', 'A', 0),
(4, '12345678977', 'Danilo Espulga', 'danilodamianaespuga@gmail.com', '8798762722', 'A', 0),
(5, '09913465489', 'Lucas Cajueiro De Lima', 'podquinhas@podquinhas.com', '8798765432', 'A', 0),
(6, '09898798712', 'Janiel Moreira De Carvalho', 'janiel@janiel.com', '8798767121', 'A', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_itens_precos`
--

CREATE TABLE `tb_itens_precos` (
  `id_item_preco` int(11) NOT NULL,
  `modelo_item_preco` varchar(100) NOT NULL,
  `custo_item_preco` varchar(220) NOT NULL,
  `preco_venda_item_preco` varchar(20) NOT NULL,
  `validade_item_preco` int(11) NOT NULL,
  `categoria_validade_item_preco` varchar(15) NOT NULL,
  `id_entidade_item_preco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_itens_precos`
--

INSERT INTO `tb_itens_precos` (`id_item_preco`, `modelo_item_preco`, `custo_item_preco`, `preco_venda_item_preco`, `validade_item_preco`, `categoria_validade_item_preco`, `id_entidade_item_preco`) VALUES
(27, 'CERTIFICADO DIGITAL A1 PF', '65,00', '190,00', 1, 'ANO', 7),
(28, 'CERTIFICADO DIGITAL A3 PF', '65,00', '300,00', 3, 'ANO', 7);

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
(4, '74185296311', 'grupoj@gmail.com', 'Jucelino Ferreira Leite Junior', '$2y$10$EK58XnzLgnPsyevM5CgMqO1BmOaz2QocWL7wbXDbGxlV5/utpadm2', 'A', 8),
(5, '99999999999', 'camarao@camarao.com', 'Loira Teste', '$2y$10$0F0b003pqLNzh9jfhEYaReSztlkls88w86fpc5yTN.dwWD8t8T5AK', 'A', 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_vendas`
--

CREATE TABLE `tb_vendas` (
  `id_venda` int(11) NOT NULL,
  `id_usuario_venda` int(11) NOT NULL,
  `id_entidade_venda` int(11) NOT NULL,
  `id_produto_venda` int(11) NOT NULL,
  `data_venda` date NOT NULL,
  `codigo_venda` varchar(100) NOT NULL,
  `nome_cliente_venda` varchar(220) NOT NULL,
  `item_produto_venda` varchar(200) NOT NULL,
  `preco_custo_venda` float NOT NULL,
  `desconto_venda` float NOT NULL,
  `preco_vendido_venda` float NOT NULL,
  `status_custo_venda` varchar(10) NOT NULL,
  `status_pg_cliente_venda` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_vendas`
--

INSERT INTO `tb_vendas` (`id_venda`, `id_usuario_venda`, `id_entidade_venda`, `id_produto_venda`, `data_venda`, `codigo_venda`, `nome_cliente_venda`, `item_produto_venda`, `preco_custo_venda`, `desconto_venda`, `preco_vendido_venda`, `status_custo_venda`, `status_pg_cliente_venda`) VALUES
(40, 5, 7, 27, '2024-07-20', '969584', 'Aylla De Kássia Alves Ferreira Nogueira', ' CERTIFICADO DIGITAL A1 PF ', 65, 10, 180, 'ABERTO', 'ABERTO'),
(42, 5, 7, 28, '2024-07-12', '789456', 'Aylla De Kássia Alves Ferreira Nogueira', ' CERTIFICADO DIGITAL A3 PF ', 65, 13, 287, 'ABERTO', 'ABERTO'),
(43, 5, 7, 27, '2024-07-25', '13121', 'Luan Leandro Nogueira', ' CERTIFICADO DIGITAL A1 PF ', 65, 50, 140, 'ABERTO', 'ABERTO'),
(44, 5, 7, 27, '2024-07-28', '4232', 'E-TICONS EMPRESA DE TECNOLOGIA DA INFORMAÇÃO & CONSULTORIA LTDA', ' CERTIFICADO DIGITAL A1 PF ', 65, 15, 175, 'ABERTO', 'ABERTO'),
(45, 5, 7, 27, '2024-07-24', '969584', 'Luan Leandro Nogueira', ' CERTIFICADO DIGITAL A1 PF ', 65, 16.57, 173.43, 'ABERTO', 'ABERTO'),
(46, 5, 7, 27, '2024-07-08', '0123456', 'E&E Calçados', ' CERTIFICADO DIGITAL A1 PF ', 65, 14.98, 175.02, 'ABERTO', 'ABERTO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_vendas_pespectivas`
--

CREATE TABLE `tb_vendas_pespectivas` (
  `id_venda_pespectiva` int(11) NOT NULL,
  `id_usuario_venda_pespectiva` int(11) NOT NULL,
  `id_entidade_venda_pespectiva` int(11) NOT NULL,
  `id_produto_venda_pespectiva` int(11) NOT NULL,
  `nome_venda_pespectiva` varchar(220) NOT NULL,
  `telefone_venda_pespectiva` varchar(20) NOT NULL,
  `data_venda_pespectiva` date NOT NULL,
  `item_venda_pespectiva` varchar(200) NOT NULL,
  `preco_venda_pespectiva` float NOT NULL,
  `data_prevista_venda_pespectiva` date NOT NULL,
  `mes_venda_pespectiva` int(11) NOT NULL,
  `ano_venda_pespectiva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_vendas_pespectivas`
--

INSERT INTO `tb_vendas_pespectivas` (`id_venda_pespectiva`, `id_usuario_venda_pespectiva`, `id_entidade_venda_pespectiva`, `id_produto_venda_pespectiva`, `nome_venda_pespectiva`, `telefone_venda_pespectiva`, `data_venda_pespectiva`, `item_venda_pespectiva`, `preco_venda_pespectiva`, `data_prevista_venda_pespectiva`, `mes_venda_pespectiva`, `ano_venda_pespectiva`) VALUES
(27, 5, 7, 27, 'Aylla De Kássia Alves Ferreira Nogueira', '87996437287', '2024-07-20', ' CERTIFICADO DIGITAL A1 PF ', 180, '2025-07-20', 7, 2024),
(28, 5, 7, 27, 'Aylla De Kássia Alves Ferreira Nogueira', '87996437287', '2023-07-27', ' CERTIFICADO DIGITAL A1 PF ', 180, '2024-07-27', 7, 2024),
(29, 5, 7, 28, 'Aylla De Kássia Alves Ferreira Nogueira', '87996437287', '2024-07-12', ' CERTIFICADO DIGITAL A3 PF ', 287, '2027-07-12', 7, 2024),
(30, 5, 7, 27, 'Luan Leandro Nogueira', '87988457530', '2024-07-25', ' CERTIFICADO DIGITAL A1 PF ', 140, '2025-07-25', 7, 2024),
(31, 5, 7, 27, 'E-TICONS EMPRESA DE TECNOLOGIA DA INFORMAÇÃO & CONSULTORIA LTDA', '87988762111', '2024-07-28', ' CERTIFICADO DIGITAL A1 PF ', 175, '2025-07-28', 7, 2024),
(32, 5, 7, 27, 'Luan Leandro Nogueira', '87988457530', '2024-07-24', ' CERTIFICADO DIGITAL A1 PF ', 173.43, '2025-07-24', 7, 2024),
(33, 5, 7, 27, 'E&E Calçados', '87988457530', '2024-07-08', ' CERTIFICADO DIGITAL A1 PF ', 175.02, '2025-07-08', 7, 2024);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_clientes_pf`
--
ALTER TABLE `tb_clientes_pf`
  ADD PRIMARY KEY (`id_cliente_pf`);

--
-- Índices de tabela `tb_clientes_pj`
--
ALTER TABLE `tb_clientes_pj`
  ADD PRIMARY KEY (`id_cliente_pj`),
  ADD KEY `id_cliente_pj` (`id_cliente_pj`);

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
-- Índices de tabela `tb_itens_precos`
--
ALTER TABLE `tb_itens_precos`
  ADD PRIMARY KEY (`id_item_preco`);

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
-- Índices de tabela `tb_vendas`
--
ALTER TABLE `tb_vendas`
  ADD PRIMARY KEY (`id_venda`);

--
-- Índices de tabela `tb_vendas_pespectivas`
--
ALTER TABLE `tb_vendas_pespectivas`
  ADD PRIMARY KEY (`id_venda_pespectiva`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_clientes_pf`
--
ALTER TABLE `tb_clientes_pf`
  MODIFY `id_cliente_pf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_clientes_pj`
--
ALTER TABLE `tb_clientes_pj`
  MODIFY `id_cliente_pj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_entidades`
--
ALTER TABLE `tb_entidades`
  MODIFY `id_entidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_entidades_pf`
--
ALTER TABLE `tb_entidades_pf`
  MODIFY `id_entidade_pf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_itens_precos`
--
ALTER TABLE `tb_itens_precos`
  MODIFY `id_item_preco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `tb_usuario_adm_pf`
--
ALTER TABLE `tb_usuario_adm_pf`
  MODIFY `id_usuario_adm_pf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_usuario_adm_pj`
--
ALTER TABLE `tb_usuario_adm_pj`
  MODIFY `id_usuario_adm_pj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_vendas`
--
ALTER TABLE `tb_vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `tb_vendas_pespectivas`
--
ALTER TABLE `tb_vendas_pespectivas`
  MODIFY `id_venda_pespectiva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
