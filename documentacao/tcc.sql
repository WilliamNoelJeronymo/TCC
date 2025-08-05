-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 2025-08-05 02:53:14
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Pesquisa'),
(2, 'Audiovisual'),
(3, 'Robótica'),
(4, 'Sistema Web'),
(5, 'Análise de Dados'),
(6, 'Sistema Desktop');

-- --------------------------------------------------------

--
-- Estrutura para tabela `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `projeto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcoes`
--

CREATE TABLE `funcoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `quantidade` int(11) NOT NULL,
  `projetos_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcoes`
--

INSERT INTO `funcoes` (`id`, `nome`, `descricao`, `quantidade`, `projetos_id`, `created`, `modified`) VALUES
(5, 'Lider', 'Lider do projeto, propor a ideia e gerenciar suas vagas', 1, 17, '2025-03-13 00:24:28', '2025-03-13 00:24:28'),
(6, 'Desenvolvedor', 'Desenvolve o projeto', 3, 17, '2025-03-13 00:53:19', '2025-03-13 00:53:19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcoes_habilidades`
--

CREATE TABLE `funcoes_habilidades` (
  `id` int(11) NOT NULL,
  `funcoes_id` int(11) NOT NULL,
  `habilidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `grupos`
--

INSERT INTO `grupos` (`id`, `nome`) VALUES
(1, 'Administrador'),
(2, 'Professor'),
(3, 'Aluno');

-- --------------------------------------------------------

--
-- Estrutura para tabela `habilidades`
--

CREATE TABLE `habilidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `habilidades`
--

INSERT INTO `habilidades` (`id`, `nome`) VALUES
(1, 'Java Básico'),
(2, 'C++ Básico'),
(3, 'C# Básico'),
(4, 'Python Básico'),
(5, 'Java Avançado'),
(6, 'C++ Avançado'),
(7, 'C# Avançado'),
(8, 'Python Avançado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `projeto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id` int(11) NOT NULL,
  `usuario_id_emissor` int(11) NOT NULL,
  `usuario_id_remetente` int(11) NOT NULL,
  `funcoes_id` int(11) NOT NULL,
  `aceite` int(11) NOT NULL DEFAULT 2,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `projetos`
--

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `objetvo` varchar(500) NOT NULL,
  `texto` text DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `projetos`
--

INSERT INTO `projetos` (`id`, `nome`, `descricao`, `objetvo`, `texto`, `banner`, `status`, `created`, `modified`) VALUES
(17, 'Sistema de Gestão Acadêmica', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue porta tristique. Nulla non laoreet nulla, id bibendum purus. Ut placerat ligula non nulla bibendum, quis sagittis turpis suscipit. In hac habitasse platea dictumst. Curabitur ut ex laoreet, interdum eros feugiat, rutrum nulla. Maecenas scelerisque orci ut ex hendrerit, vitae mattis enim congue. Morbi commodo, magna sit amet faucibus efficitur, nunc neque semper est, ut rutrum nisi mauris eu metus. Aliquam vitae leo felis. Ut vel lacinia eros.\r\n\r\nMaecenas iaculis urna felis, quis semper lorem aliquet ac. Donec pellentesque diam quis sapien rhoncus, vel dignissim est laoreet. Fusce auctor mi at mauris tincidunt malesuada. Donec at tellus ipsum. Ut lorem urna, laoreet in massa et, ultrices iaculis justo. Nunc convallis nisl dui, id efficitur ex sodales a. Mauris augue mauris, consectetur tempus imperdiet vel, elementum ut lorem. Fusce semper tempor metus, at bibendum leo blandit vel. In ante lorem, varius sed sem sed, vehicula commodo tellus. Quisque egestas est ac felis fermentum, a sodales tellus viverra. ', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue porta tristique. Nulla non laoreet nulla, id bibendum purus. Ut placerat ligula non nulla bibendum, quis sagittis turpis suscipit. In hac habitasse platea dictumst. Curabitur ut ex laoreet, interdum eros feugiat, rutrum nulla. Maecenas scelerisque orci ut ex hendrerit, vitae mattis enim congue. Morbi commodo, magna sit amet faucibus efficitur, nunc neque semper est, ut rutrum nisi mauris eu metus. Aliquam vitae leo felis. Ut ', '<p>Dia 01 de outubro de 2023</p>\r\n<ul>\r\n<li>Foi um problema</li>\r\n<li>mas foi bom</li>\r\n<li>depois piorou</li>\r\n</ul>\r\n<p>&nbsp;</p>', '46b3a2c56ee6215f539abf54c651ab6e1749173784.jpg', 2, '2025-03-13 00:24:28', '2025-06-06 01:39:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `projetos_categorias`
--

CREATE TABLE `projetos_categorias` (
  `id` int(11) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `projetos_categorias`
--

INSERT INTO `projetos_categorias` (`id`, `projeto_id`, `categoria_id`) VALUES
(7, 17, 2),
(9, 17, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `grupo_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `matricula`, `senha`, `foto`, `grupo_id`, `created`, `modified`) VALUES
(5, 'William Noel Jeronymo', 'noelwilliam2011@gmail.com', '123454', '$2y$10$8XVahol0J78xdtU8xsrum.ELcapapAJFGsuZ6XBjbKHUvwiPCgzBi', '0b7a55240ceca8329826104d91710edc1740185050.jpg', 3, '2025-01-24 20:21:41', '2025-06-06 01:12:38'),
(6, 'Julia Neumamng', 'julia@email.com', '191919191', '$2y$10$8XVahol0J78xdtU8xsrum.ELcapapAJFGsuZ6XBjbKHUvwiPCgzBi', NULL, 3, '2025-01-24 20:39:24', '2025-02-22 00:45:27'),
(8, 'petito', 'petito@email.com', '147258369', '$2y$10$wlC2ipvCXNgOs5uRrf/houhLdQKrUG2q40ZAXG/Uf9DtVI11DPoR2', NULL, 3, '2025-06-07 00:36:03', '2025-06-07 00:36:31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios_funcoes`
--

CREATE TABLE `usuarios_funcoes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `funcoes_id` int(11) NOT NULL,
  `editor` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios_funcoes`
--

INSERT INTO `usuarios_funcoes` (`id`, `usuario_id`, `funcoes_id`, `editor`) VALUES
(5, 5, 5, 1),
(6, 5, 6, 1),
(7, 6, 6, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios_habilidades`
--

CREATE TABLE `usuarios_habilidades` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `habilidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios_habilidades`
--

INSERT INTO `usuarios_habilidades` (`id`, `usuario_id`, `habilidade_id`) VALUES
(1, 5, 2),
(2, 5, 3),
(3, 5, 6),
(4, 5, 7),
(5, 8, 2),
(6, 8, 3),
(7, 8, 6),
(8, 8, 7);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projetos_documnetos_fk` (`projeto_id`);

--
-- Índices de tabela `funcoes`
--
ALTER TABLE `funcoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projetos_funcoes_fk` (`projetos_id`);

--
-- Índices de tabela `funcoes_habilidades`
--
ALTER TABLE `funcoes_habilidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `habilidades_funcoes_requisitos_fk` (`habilidade_id`),
  ADD KEY `funcoes_funcoes_requisitos_fk` (`funcoes_id`);

--
-- Índices de tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projetos_imagens_fk` (`projeto_id`);

--
-- Índices de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcoes_notificacoes_fk` (`funcoes_id`),
  ADD KEY `usuarios_notificacoes_fk` (`usuario_id_emissor`),
  ADD KEY `usuarios_notificacoes_fk1` (`usuario_id_remetente`);

--
-- Índices de tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `projetos_categorias`
--
ALTER TABLE `projetos_categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorias_projetos_categorias_fk` (`categoria_id`),
  ADD KEY `projetos_projetos_categorias_fk` (`projeto_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupos_usuarios_fk` (`grupo_id`);

--
-- Índices de tabela `usuarios_funcoes`
--
ALTER TABLE `usuarios_funcoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcoes_usuarios_funcoes_fk` (`funcoes_id`),
  ADD KEY `usuarios_usuarios_funcoes_fk` (`usuario_id`);

--
-- Índices de tabela `usuarios_habilidades`
--
ALTER TABLE `usuarios_habilidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `habilidades_usuarios_funcoes_fk` (`habilidade_id`),
  ADD KEY `usuarios_usuarios_funcoes_fk1` (`usuario_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcoes`
--
ALTER TABLE `funcoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `projetos_categorias`
--
ALTER TABLE `projetos_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios_funcoes`
--
ALTER TABLE `usuarios_funcoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios_habilidades`
--
ALTER TABLE `usuarios_habilidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `projetos_categorias`
--
ALTER TABLE `projetos_categorias`
  ADD CONSTRAINT `categorias_projetos_categorias_fk` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `projetos_projetos_categorias_fk` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
