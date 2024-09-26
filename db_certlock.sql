-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Set-2024 às 20:04
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

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
-- Estrutura da tabela `tb_clientes_pf`
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
-- Extraindo dados da tabela `tb_clientes_pf`
--

INSERT INTO `tb_clientes_pf` (`id_cliente_pf`, `cpf_cliente_pf`, `nome_cliente_pf`, `email_cliente_pf`, `contato_cliente_pf`, `id_usuario_cliente_pf`, `entidade_cliente_pf`) VALUES
(5, '11769868488', 'Luan Leandro Nogueira', 'luannogueira093@gmail.com', '87988457530', 5, 7),
(6, '08635248422', 'Aylla De Kássia Alves Nogueira', 'aylla.alves@gmail.com', '87996437287', 6, 11),
(7, '12345678900', 'JOSE BARROS DE ALMEIDA', 'jb_barros@gmail.com', '87996403013', 6, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes_pj`
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
-- Extraindo dados da tabela `tb_clientes_pj`
--

INSERT INTO `tb_clientes_pj` (`id_cliente_pj`, `responsavel_cliente_pj`, `telefone_cliente_pj`, `cnpj_cliente_pj`, `nome_cliente_pj`, `contato_cliente_pj`, `logradouro_cliente_pj`, `numero_cliente_pj`, `bairro_cliente_pj`, `cidade_cliente_pj`, `uf_cliente_pj`, `cep_cliente_pj`, `email_cliente_pj`, `id_usuario_cliente_pj`, `entidade_cliente_pj`) VALUES
(8, 'André Luiz Gonçalves Sousa Santiago', '81996517349', '47873998000100', 'GRUPO DE EMERGENCIA E TRAUMA APLICADO LTDA', '8196517349', 'LAURA RABELO', '71', 'MAURICIO DE NASSAU', 'Caruaru', 'PE', 55014365, 'mailto:getamed1@gmail.com', 6, 11),
(9, 'Luis Roldão Sobrinho', '87988457530', '47972763000168', 'LUAN LEANDRO NOGUEIRA 11769868488', '8788457530', 'SAO MIGUEL', '413', 'BOA VISTA', 'Garanhuns', 'PE', 55292400, 'garanhunscaruaruhbpay@gmail.com', 7, 7),
(10, 'Andre Luiz Felizardo', '878126151313', '27650832000100', 'GARANHUNS CALCADOS LTDA', '8737616003', 'SANTO ANTONIO', '327', 'SANTO ANTONIO', 'Garanhuns', 'PE', 55293000, 'andresobral2@hotmail.com', 10, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comprovantes_pagamento`
--

CREATE TABLE `tb_comprovantes_pagamento` (
  `id_comprovante_pagamento` int(11) NOT NULL,
  `id_venda_comprovante_pagamento` int(11) NOT NULL,
  `comprovante_pagamento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_comprovantes_pagamento`
--

INSERT INTO `tb_comprovantes_pagamento` (`id_comprovante_pagamento`, `id_venda_comprovante_pagamento`, `comprovante_pagamento`) VALUES
(1, 87, 'assets/comprovantes/8743212.pdf'),
(2, 86, 'assets/comprovantes/862.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_consulta_pagamento_adm`
--

CREATE TABLE `tb_consulta_pagamento_adm` (
  `id_consulta_pagamento` int(11) NOT NULL,
  `id_usuario_consulta_pagamento` int(11) NOT NULL,
  `id_entidade_consulta_pagamento` int(11) NOT NULL,
  `codigo_consulta_pagamento` varchar(20) NOT NULL,
  `status_consulta_pagamento` varchar(10) NOT NULL,
  `data_baixa_consulta_pagamento` date NOT NULL,
  `usuario_adm_consulta_pagamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_consulta_pagamento_adm`
--

INSERT INTO `tb_consulta_pagamento_adm` (`id_consulta_pagamento`, `id_usuario_consulta_pagamento`, `id_entidade_consulta_pagamento`, `codigo_consulta_pagamento`, `status_consulta_pagamento`, `data_baixa_consulta_pagamento`, `usuario_adm_consulta_pagamento`) VALUES
(1, 10, 11, 'BXG-R95A-E44', 'ABERTO', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_entidades`
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
-- Extraindo dados da tabela `tb_entidades`
--

INSERT INTO `tb_entidades` (`id_entidade`, `cnpj_entidade`, `nome_empresa_entidade`, `contato_entidade`, `logradouro_entidade`, `numero_entidade`, `bairro_entidade`, `cidade_entidade`, `uf_entidade`, `cep_entidade`, `email_entidade`, `status_entidade`) VALUES
(11, 47972763000168, 'LUAN LEANDRO NOGUEIRA 11769868488', '8798845753', 'São Miguel', '413', 'BOA VISTA', 'Garanhuns', 'PE', 55292400, 'luannogueira093@gmail.com', 'A'),
(12, 12345678900000, 'Aylla AKAF', '8799643728', 'R1', '12', 'Buena', 'Garanhuns', 'PE', 55291100, 'ayllaalves@gmail.com', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_entidades_pf`
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_itens_precos`
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
-- Extraindo dados da tabela `tb_itens_precos`
--

INSERT INTO `tb_itens_precos` (`id_item_preco`, `modelo_item_preco`, `custo_item_preco`, `preco_venda_item_preco`, `validade_item_preco`, `categoria_validade_item_preco`, `id_entidade_item_preco`) VALUES
(29, 'CERTIFICADO DIGITAL A1 PJ', '65,00', '190,00', 1, 'ANO', 11),
(30, 'CERTIFICADO DIGITAL A1 PJ', '65', '190,00', 1, 'ANO', 7),
(31, 'CERTIFICADO DIGITAL A1 PJ', '65', '190,00', 1, 'ANO', 7),
(32, 'CERTIFICADO DIGITAL A1 PF', '65,00', '190,00', 1, 'ANO', 11),
(33, 'CERTIFICADO DIGITAL A1 PJ', '65,00', '190,00', 1, 'ANO', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_movimentacao`
--

CREATE TABLE `tb_movimentacao` (
  `id_movimentacao` int(11) NOT NULL,
  `id_usuario_movimentacao` int(11) NOT NULL,
  `id_entidade_movimentacao` int(11) NOT NULL,
  `data_mensal_movimentacao` varchar(10) NOT NULL,
  `data_atualizacao_movimentacao` varchar(20) NOT NULL,
  `receita_movimentacao` float NOT NULL,
  `despesa_movimentacao` float NOT NULL,
  `soma_movimentacao` float NOT NULL,
  `lucro_prejuizo_movimentacao` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_receitas_despesas`
--

CREATE TABLE `tb_receitas_despesas` (
  `id_receita_despesa` int(11) NOT NULL,
  `id_usuario_receita_despesa` int(11) NOT NULL,
  `id_entidade_receita_despesa` int(11) NOT NULL,
  `titulo_receita_despesa` varchar(220) NOT NULL,
  `categoria_receita_despesa` varchar(1) NOT NULL,
  `valor_receita_despesa` float NOT NULL,
  `data_receita_despesa` date NOT NULL,
  `data_mensal_receita_despesa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_receitas_despesas`
--

INSERT INTO `tb_receitas_despesas` (`id_receita_despesa`, `id_usuario_receita_despesa`, `id_entidade_receita_despesa`, `titulo_receita_despesa`, `categoria_receita_despesa`, `valor_receita_despesa`, `data_receita_despesa`, `data_mensal_receita_despesa`) VALUES
(104, 11, 12, ' CERTIFICADO DIGITAL A1 PJ  - GARANHUNS CALCADOS LTDA', 'R', 190, '2024-09-24', '2024-09'),
(105, 11, 12, ' CERTIFICADO DIGITAL A1 PJ  - GARANHUNS CALCADOS LTDA', 'D', 65, '2024-09-24', '2024-09'),
(111, 10, 11, ' CERTIFICADO DIGITAL A1 PJ  - Aylla De Kássia Alves Nogueira', 'R', 190, '2024-09-26', '2024-09'),
(112, 10, 11, ' CERTIFICADO DIGITAL A1 PJ  - Aylla De Kássia Alves Nogueira', 'D', 65, '2024-09-26', '2024-09'),
(113, 10, 11, ' CERTIFICADO DIGITAL A1 PF  - LUAN LEANDRO NOGUEIRA 11769868488', 'R', 190, '2024-09-26', '2024-09'),
(114, 10, 11, ' CERTIFICADO DIGITAL A1 PF  - LUAN LEANDRO NOGUEIRA 11769868488', 'D', 65, '2024-09-26', '2024-09'),
(115, 10, 11, ' CERTIFICADO DIGITAL A1 PF  - LUAN LEANDRO NOGUEIRA 11769868488', 'R', 190, '2024-09-23', '2024-09'),
(116, 10, 11, ' CERTIFICADO DIGITAL A1 PF  - LUAN LEANDRO NOGUEIRA 11769868488', 'D', 65, '2024-09-23', '2024-09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario_adm_pf`
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario_adm_pj`
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
-- Extraindo dados da tabela `tb_usuario_adm_pj`
--

INSERT INTO `tb_usuario_adm_pj` (`id_usuario_adm_pj`, `cpf_usuario_adm_pj`, `email_usuario_adm_pj`, `nome_usuario_adm_pj`, `senha_usuario_adm_pj`, `status_usuario_adm_pj`, `id_entidade_usuario_adm_pj`) VALUES
(10, '11769868488', 'luannogueira093@gmail.com', 'Luan Leandro Nogueira', '$2y$10$5o77H2F5p95KDHuvH.biH.WLwnSkgZvhvlG0bBS3r3sCGa/BTRIpW', 'A', 11),
(11, '08635248422', 'akaf@gmail.com', 'Aylla Alves F. Nogueira', '$2y$10$njHC.MTi125ssxF8uzVWk.urEgHGHqe5m0sAEt/8jjYw3BfHpm35e', 'A', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario_entidade_pj`
--

CREATE TABLE `tb_usuario_entidade_pj` (
  `id_usuario_entidade_pj` int(11) NOT NULL,
  `cpf_usuario_entidade_pj` varchar(14) NOT NULL,
  `email_usuario_entidade_pj` varchar(100) NOT NULL,
  `senha_usuario_entidade_pj` varchar(200) NOT NULL,
  `status_usuario_entidade_pj` varchar(1) NOT NULL,
  `id_entidade_usuario_entidade_pj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_vendas`
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
-- Extraindo dados da tabela `tb_vendas`
--

INSERT INTO `tb_vendas` (`id_venda`, `id_usuario_venda`, `id_entidade_venda`, `id_produto_venda`, `data_venda`, `codigo_venda`, `nome_cliente_venda`, `item_produto_venda`, `preco_custo_venda`, `desconto_venda`, `preco_vendido_venda`, `status_custo_venda`, `status_pg_cliente_venda`) VALUES
(85, 11, 12, 33, '2024-09-24', '1', 'GARANHUNS CALCADOS LTDA', ' CERTIFICADO DIGITAL A1 PJ ', 65, 0, 190, 'PAGO', 'ABERTO'),
(86, 10, 11, 29, '2024-09-25', '2', 'GARANHUNS CALCADOS LTDA', ' CERTIFICADO DIGITAL A1 PJ ', 65, 0, 190, 'PAGO', 'PAGO'),
(87, 10, 11, 29, '2024-09-26', '43212', 'Aylla De Kássia Alves Nogueira', ' CERTIFICADO DIGITAL A1 PJ ', 65, 0, 190, 'PAGO', 'PAGO'),
(88, 10, 11, 32, '2024-09-26', '172942859', 'LUAN LEANDRO NOGUEIRA 11769868488', ' CERTIFICADO DIGITAL A1 PF ', 65, 0, 190, 'ABERTO', 'ABERTO'),
(89, 10, 11, 32, '2024-09-23', 'BXG-R95A-E44', 'LUAN LEANDRO NOGUEIRA 11769868488', ' CERTIFICADO DIGITAL A1 PF ', 65, 0, 190, 'ABERTO', 'ABERTO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_vendas_pespectivas`
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
-- Extraindo dados da tabela `tb_vendas_pespectivas`
--

INSERT INTO `tb_vendas_pespectivas` (`id_venda_pespectiva`, `id_usuario_venda_pespectiva`, `id_entidade_venda_pespectiva`, `id_produto_venda_pespectiva`, `nome_venda_pespectiva`, `telefone_venda_pespectiva`, `data_venda_pespectiva`, `item_venda_pespectiva`, `preco_venda_pespectiva`, `data_prevista_venda_pespectiva`, `mes_venda_pespectiva`, `ano_venda_pespectiva`) VALUES
(80, 11, 12, 33, 'GARANHUNS CALCADOS LTDA', '878126151313', '2024-09-24', ' CERTIFICADO DIGITAL A1 PJ ', 190, '2025-09-24', 9, 2024),
(81, 10, 11, 29, 'GARANHUNS CALCADOS LTDA', '878126151313', '2024-09-25', ' CERTIFICADO DIGITAL A1 PJ ', 190, '2025-09-25', 9, 2024),
(82, 10, 11, 29, 'Aylla De Kássia Alves Nogueira', '87996437287', '2024-09-26', ' CERTIFICADO DIGITAL A1 PJ ', 190, '2025-09-26', 9, 2024),
(83, 10, 11, 32, 'LUAN LEANDRO NOGUEIRA 11769868488', '87988457530', '2024-09-26', ' CERTIFICADO DIGITAL A1 PF ', 190, '2025-09-26', 9, 2024),
(84, 10, 11, 32, 'LUAN LEANDRO NOGUEIRA 11769868488', '87988457530', '2024-09-23', ' CERTIFICADO DIGITAL A1 PF ', 190, '2025-09-23', 9, 2024);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_clientes_pf`
--
ALTER TABLE `tb_clientes_pf`
  ADD PRIMARY KEY (`id_cliente_pf`);

--
-- Índices para tabela `tb_clientes_pj`
--
ALTER TABLE `tb_clientes_pj`
  ADD PRIMARY KEY (`id_cliente_pj`),
  ADD KEY `id_cliente_pj` (`id_cliente_pj`);

--
-- Índices para tabela `tb_comprovantes_pagamento`
--
ALTER TABLE `tb_comprovantes_pagamento`
  ADD PRIMARY KEY (`id_comprovante_pagamento`);

--
-- Índices para tabela `tb_consulta_pagamento_adm`
--
ALTER TABLE `tb_consulta_pagamento_adm`
  ADD PRIMARY KEY (`id_consulta_pagamento`);

--
-- Índices para tabela `tb_entidades`
--
ALTER TABLE `tb_entidades`
  ADD PRIMARY KEY (`id_entidade`);

--
-- Índices para tabela `tb_entidades_pf`
--
ALTER TABLE `tb_entidades_pf`
  ADD PRIMARY KEY (`id_entidade_pf`);

--
-- Índices para tabela `tb_itens_precos`
--
ALTER TABLE `tb_itens_precos`
  ADD PRIMARY KEY (`id_item_preco`);

--
-- Índices para tabela `tb_movimentacao`
--
ALTER TABLE `tb_movimentacao`
  ADD PRIMARY KEY (`id_movimentacao`);

--
-- Índices para tabela `tb_receitas_despesas`
--
ALTER TABLE `tb_receitas_despesas`
  ADD PRIMARY KEY (`id_receita_despesa`);

--
-- Índices para tabela `tb_usuario_adm_pf`
--
ALTER TABLE `tb_usuario_adm_pf`
  ADD PRIMARY KEY (`id_usuario_adm_pf`),
  ADD KEY `fk_id_entidade_usuario_adm_pf` (`id_entidade_usuario_adm_pf`);

--
-- Índices para tabela `tb_usuario_adm_pj`
--
ALTER TABLE `tb_usuario_adm_pj`
  ADD PRIMARY KEY (`id_usuario_adm_pj`),
  ADD KEY `fk_id_entidade_usuario_adm_pj` (`id_entidade_usuario_adm_pj`);

--
-- Índices para tabela `tb_usuario_entidade_pj`
--
ALTER TABLE `tb_usuario_entidade_pj`
  ADD PRIMARY KEY (`id_usuario_entidade_pj`);

--
-- Índices para tabela `tb_vendas`
--
ALTER TABLE `tb_vendas`
  ADD PRIMARY KEY (`id_venda`);

--
-- Índices para tabela `tb_vendas_pespectivas`
--
ALTER TABLE `tb_vendas_pespectivas`
  ADD PRIMARY KEY (`id_venda_pespectiva`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_clientes_pf`
--
ALTER TABLE `tb_clientes_pf`
  MODIFY `id_cliente_pf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_clientes_pj`
--
ALTER TABLE `tb_clientes_pj`
  MODIFY `id_cliente_pj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_comprovantes_pagamento`
--
ALTER TABLE `tb_comprovantes_pagamento`
  MODIFY `id_comprovante_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_consulta_pagamento_adm`
--
ALTER TABLE `tb_consulta_pagamento_adm`
  MODIFY `id_consulta_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_entidades`
--
ALTER TABLE `tb_entidades`
  MODIFY `id_entidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_entidades_pf`
--
ALTER TABLE `tb_entidades_pf`
  MODIFY `id_entidade_pf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_itens_precos`
--
ALTER TABLE `tb_itens_precos`
  MODIFY `id_item_preco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `tb_movimentacao`
--
ALTER TABLE `tb_movimentacao`
  MODIFY `id_movimentacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_receitas_despesas`
--
ALTER TABLE `tb_receitas_despesas`
  MODIFY `id_receita_despesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de tabela `tb_usuario_adm_pf`
--
ALTER TABLE `tb_usuario_adm_pf`
  MODIFY `id_usuario_adm_pf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_usuario_adm_pj`
--
ALTER TABLE `tb_usuario_adm_pj`
  MODIFY `id_usuario_adm_pj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tb_usuario_entidade_pj`
--
ALTER TABLE `tb_usuario_entidade_pj`
  MODIFY `id_usuario_entidade_pj` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_vendas`
--
ALTER TABLE `tb_vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de tabela `tb_vendas_pespectivas`
--
ALTER TABLE `tb_vendas_pespectivas`
  MODIFY `id_venda_pespectiva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_usuario_adm_pf`
--
ALTER TABLE `tb_usuario_adm_pf`
  ADD CONSTRAINT `fk_id_entidade_usuario_adm_pf` FOREIGN KEY (`id_entidade_usuario_adm_pf`) REFERENCES `tb_entidades_pf` (`id_entidade_pf`);

--
-- Limitadores para a tabela `tb_usuario_adm_pj`
--
ALTER TABLE `tb_usuario_adm_pj`
  ADD CONSTRAINT `fk_id_entidade_usuario_adm_pj` FOREIGN KEY (`id_entidade_usuario_adm_pj`) REFERENCES `tb_entidades` (`id_entidade`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
