-- --------------------------------------------------------
-- Servidor:                     landpage_fefe.mysql.dbaas.com.br
-- Versão do servidor:           5.7.32-35-log - Percona Server (GPL), Release 35, Revision 5688520
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela landpage_fefe.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `nome` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `senha` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Copiando dados para a tabela landpage_fefe.cliente: ~7 rows (aproximadamente)
DELETE FROM `cliente`;
INSERT INTO `cliente` (`id`, `imagem`, `nome`, `email`, `senha`, `data_cadastro`, `data_alteracao`) VALUES
	(1, '1.webp', 'Quincy Albright', 'quincy@gmail.com.br', '202cb962ac59075b964b07152d234b70', '2025-04-14 15:47:45', '2025-04-16 08:19:15'),
	(2, '2.webp', 'Sarai Nunez', '2@email.com.br', '202cb962ac59075b964b07152d234b70', '2025-04-14 15:47:45', '2025-04-16 08:19:17'),
	(3, '3.webp', 'Khalil Hargrove', '3@email.com.br', '202cb962ac59075b964b07152d234b70', '2025-04-14 15:47:45', '2025-04-16 08:19:23'),
	(4, '4.webp', 'Liora Sheppard', '4@email.com.br', '202cb962ac59075b964b07152d234b70', '2025-04-14 15:47:45', '2025-04-16 08:19:24'),
	(5, '5.webp', 'Leon Scot Kennedy', '5@email.com.br', '202cb962ac59075b964b07152d234b70', '2025-04-14 15:47:45', '2025-04-16 08:19:26'),
	(6, '6.webp', 'Shieda Kayn', '6@email.com.br', '202cb962ac59075b964b07152d234b70', '2025-04-14 15:47:45', '2025-04-16 08:19:31'),
	(7, '7.webp', 'Subaru Natsuki', '7@email.com.br', '202cb962ac59075b964b07152d234b70', '2025-04-14 15:47:45', '2025-04-16 08:19:35');

-- Copiando estrutura para tabela landpage_fefe.dados_site
CREATE TABLE IF NOT EXISTS `dados_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_tema` int(11) DEFAULT NULL,
  `controle_por_ip` int(11) DEFAULT NULL,
  `recaptcha_ativo` int(11) DEFAULT NULL,
  `imagem_logo` varchar(255) DEFAULT NULL,
  `imagem_icone` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `tripadvisor` varchar(255) DEFAULT NULL,
  `discord` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `endereco` varchar(400) DEFAULT NULL,
  `recaptcha_chave_site` varchar(255) DEFAULT NULL,
  `recaptcha_chave_secreta` varchar(255) DEFAULT NULL,
  `google_analytics` varchar(600) DEFAULT NULL,
  `google_tag_manager_head` varchar(600) DEFAULT NULL,
  `google_tag_manager_body` varchar(600) DEFAULT NULL,
  `meta_og_imagem` varchar(600) DEFAULT NULL,
  `meta_title` varchar(600) DEFAULT NULL,
  `meta_description` varchar(600) DEFAULT NULL,
  `meta_keywords` varchar(600) DEFAULT NULL,
  `meta_og_title` varchar(600) DEFAULT NULL,
  `meta_og_site_name` varchar(600) DEFAULT NULL,
  `meta_og_description` varchar(600) DEFAULT NULL,
  `enviar_email_email` varchar(255) DEFAULT NULL,
  `enviar_email_senha` varchar(255) DEFAULT NULL,
  `enviar_email_smtp` varchar(255) DEFAULT NULL,
  `enviar_email_porta` varchar(255) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela landpage_fefe.dados_site: ~0 rows (aproximadamente)
DELETE FROM `dados_site`;
INSERT INTO `dados_site` (`id`, `id_usuario`, `id_tema`, `controle_por_ip`, `recaptcha_ativo`, `imagem_logo`, `imagem_icone`, `nome`, `email`, `facebook`, `facebook_id`, `instagram`, `linkedin`, `twitter`, `youtube`, `tripadvisor`, `discord`, `whatsapp`, `telefone`, `endereco`, `recaptcha_chave_site`, `recaptcha_chave_secreta`, `google_analytics`, `google_tag_manager_head`, `google_tag_manager_body`, `meta_og_imagem`, `meta_title`, `meta_description`, `meta_keywords`, `meta_og_title`, `meta_og_site_name`, `meta_og_description`, `enviar_email_email`, `enviar_email_senha`, `enviar_email_smtp`, `enviar_email_porta`, `data_cadastro`, `data_alteracao`) VALUES
	(1, 1, 1, 0, 1, '1744427485-logo-svg.svg', 'icone-1744485738-1744427485-logo-svg-svg.svg', 'Movefit Transforme sua jornada fitness', 'felipevitorferreira100@gmail.com', '', '', '', 'https://www.linkedin.com/in/felipe-vitor-ferreira-a27b951b4', '', '', '', '', '+55 (49) 99938-3070', '+55 (49) 99938-3070', 'Lages - SC', '6LdoSPIqAAAAAMrbFzbgZgPCg7l8UHgwzffGoguV', '6LdoSPIqAAAAAIGaqnmPvB2nV-HAP6H8noMUTj-W', '', '', '', '1744485725-grupo-4-png.png', 'Movefit Transforme sua jornada fitness', 'Conheça nossos planos personalizados, feitos para se adaptar ao seu estilo de vida e ajudar você a alcançar seus objetivos com eficiência.', 'movefit, academia, gym, emagrecer', 'Movefit Transforme sua jornada fitness', 'Movefit Transforme sua jornada fitness', 'Conheça nossos planos personalizados, feitos para se adaptar ao seu estilo de vida e ajudar você a alcançar seus objetivos com eficiência.', '', '', '', '587', '2021-03-18 09:55:02', '2025-04-12 18:27:34');

-- Copiando estrutura para tabela landpage_fefe.depoimento
CREATE TABLE IF NOT EXISTS `depoimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL DEFAULT '0',
  `publicar` int(11) NOT NULL DEFAULT '1',
  `nota` int(11) DEFAULT NULL,
  `posicao` int(11) NOT NULL DEFAULT '0',
  `titulo` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `descricao` text COLLATE latin1_general_ci,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Copiando dados para a tabela landpage_fefe.depoimento: ~8 rows (aproximadamente)
DELETE FROM `depoimento`;
INSERT INTO `depoimento` (`id`, `id_cliente`, `publicar`, `nota`, `posicao`, `titulo`, `descricao`, `data_cadastro`, `data_alteracao`) VALUES
	(3, 3, 1, 7, 3, 'Awesome!!!', 'This service has transformed the way I manage my projects.', '2025-04-12 15:55:18', '2025-04-14 17:27:59'),
	(4, 4, 1, 8, 4, 'Awesome!!!', 'This service has transformed the way I manage my projects.', '2025-04-12 15:55:18', '2025-04-14 17:28:00'),
	(5, 5, 1, 4, 5, 'Awesome!!!', 'This service has transformed the way I manage my projects.', '2025-04-12 15:55:18', '2025-04-14 17:28:00'),
	(6, 6, 1, 10, 6, 'Awesome!!!', 'This service has transformed the way I manage my projects.', '2025-04-12 15:55:18', '2025-04-14 17:28:01'),
	(7, 7, 1, 10, 8, 'Awesome!!!', 'This service has transformed the way I manage my projects.', '2025-04-12 15:55:18', '2025-04-16 08:28:06'),
	(16, 2, 1, 9, 2, 'Awesome!!!', 'This service has transformed the way I manage my projects.', '2025-04-16 08:18:00', '2025-04-16 08:27:46'),
	(17, 1, 1, 9, 1, 'Awesome!!!', 'This service has transformed the way I manage my projects.', '2025-04-16 08:23:31', '2025-04-16 08:27:38'),
	(18, 1, 1, 7, 7, 'Awesome!!!', 'This service has transformed the way I manage my projects.', '2025-04-16 08:23:31', '2025-04-16 08:28:04');

-- Copiando estrutura para tabela landpage_fefe.galeria
CREATE TABLE IF NOT EXISTS `galeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posicao` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `imagem` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Copiando dados para a tabela landpage_fefe.galeria: ~5 rows (aproximadamente)
DELETE FROM `galeria`;
INSERT INTO `galeria` (`id`, `posicao`, `nome`, `imagem`, `data_cadastro`, `data_alteracao`) VALUES
	(1, 4, 'Espaço Movefit', '1744479588910.webp', '2025-04-12 14:39:48', '2025-04-12 14:43:40'),
	(2, 3, 'Movefit | Pegada Supinada', '1744479588717.webp', '2025-04-12 14:39:48', '2025-04-12 14:43:40'),
	(3, 2, 'Movefit | Agachamento', '1744479588158.webp', '2025-04-12 14:39:48', '2025-04-12 14:43:40'),
	(4, 1, 'Movefit | Deadlift', '1744479588490.webp', '2025-04-12 14:39:48', '2025-04-12 15:34:36');

-- Copiando estrutura para tabela landpage_fefe.pagina
CREATE TABLE IF NOT EXISTS `pagina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_idioma` int(11) DEFAULT NULL,
  `nome_pagina` varchar(900) DEFAULT NULL,
  `nome` varchar(900) NOT NULL,
  `url` varchar(900) NOT NULL,
  `url_sem_extencao` varchar(900) NOT NULL,
  `url_configuravel` varchar(900) NOT NULL,
  `meta_title` varchar(900) DEFAULT NULL,
  `meta_description` varchar(900) DEFAULT NULL,
  `meta_keywords` varchar(900) DEFAULT NULL,
  `meta_og_title` varchar(900) DEFAULT NULL,
  `meta_og_site_name` varchar(900) DEFAULT NULL,
  `meta_og_imagem` varchar(900) DEFAULT NULL,
  `meta_og_description` varchar(900) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela landpage_fefe.pagina: ~3 rows (aproximadamente)
DELETE FROM `pagina`;
INSERT INTO `pagina` (`id`, `id_idioma`, `nome_pagina`, `nome`, `url`, `url_sem_extencao`, `url_configuravel`, `meta_title`, `meta_description`, `meta_keywords`, `meta_og_title`, `meta_og_site_name`, `meta_og_imagem`, `meta_og_description`, `data_cadastro`, `data_alteracao`) VALUES
	(1, NULL, NULL, '404', '404.php', '404', '404', 'Movefit | Página não Encontrada', '', '', '', '', 'sem_imagem.jpg', '', '2025-04-12 18:28:10', '2025-04-12 18:29:09'),
	(2, NULL, NULL, 'obrigado', 'obrigado.php', 'obrigado', 'obrigado', 'Movefit | Obrigado', '', '', '', '', 'sem_imagem.jpg', '', '2025-04-12 18:28:10', '2025-04-12 18:29:02'),
	(3, NULL, NULL, 'home', 'home.php', 'home', 'home', 'Movefit Transforme sua jornada Fitness', '', '', '', '', 'sem_imagem.jpg', '', '2025-04-12 18:28:10', '2025-04-12 18:28:54');

-- Copiando estrutura para tabela landpage_fefe.permissao
CREATE TABLE IF NOT EXISTS `permissao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_permissao` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `nivel` varchar(255) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela landpage_fefe.permissao: ~3 rows (aproximadamente)
DELETE FROM `permissao`;
INSERT INTO `permissao` (`id`, `id_permissao`, `nome`, `nivel`, `data_cadastro`, `data_alteracao`) VALUES
	(1, 0, 'Administrador', '1', '2022-03-25 12:29:58', '2022-03-25 12:40:00'),
	(2, 0, 'Moderador', '2', '2022-03-25 12:29:58', '2023-02-28 10:39:10'),
	(3, 0, 'Estagiario', '3', '2022-03-25 12:29:58', '2023-02-28 10:39:15');

-- Copiando estrutura para tabela landpage_fefe.tema
CREATE TABLE IF NOT EXISTS `tema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `cor_background` varchar(255) DEFAULT NULL,
  `cor_texto` varchar(255) DEFAULT NULL,
  `cor_icone` varchar(255) DEFAULT NULL,
  `cor_adicional` varchar(255) DEFAULT NULL,
  `cor_selected` varchar(255) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela landpage_fefe.tema: ~4 rows (aproximadamente)
DELETE FROM `tema`;
INSERT INTO `tema` (`id`, `nome`, `imagem`, `cor_background`, `cor_texto`, `cor_icone`, `cor_adicional`, `cor_selected`, `data_cadastro`, `data_alteracao`) VALUES
	(1, 'Tema Padrao', 'tema-padrao.png', '#E2E2E2', '#212529', '#001447', '#0BD1AA', '#fff', '2022-04-18 18:12:18', '2022-06-17 11:41:18'),
	(2, 'Tema Escuro', 'tema-escuro.png', '#212529', '#fff', '#0BD1AA', '#0BD1AA', '#6B37A3', '2022-04-18 18:12:24', '2022-05-27 14:47:31'),
	(3, 'Tema Verde', 'tema-verde.png', '#0BD1AA', '#212529', '#6B37A3', '#6B37A3', '#fff', '2022-04-18 18:12:33', '2022-05-27 14:47:34'),
	(4, 'Tema Roxo', 'tema-roxo.png', '#6B37A3', '#fff', '#0BD1AA', '#0BD1AA', '#212529', '2022-04-18 18:12:35', '2022-05-27 14:47:36');

-- Copiando estrutura para tabela landpage_fefe.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `admin_supremo` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `senha` varchar(500) DEFAULT NULL,
  `permissao` varchar(5000) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela landpage_fefe.usuario: ~1 rows (aproximadamente)
DELETE FROM `usuario`;
INSERT INTO `usuario` (`id`, `id_usuario`, `admin_supremo`, `nome`, `imagem`, `telefone`, `email`, `cargo`, `login`, `senha`, `permissao`, `data_cadastro`, `data_alteracao`) VALUES
	(1, 1, 0, 'admin', '1', '1', 'contato@ueek.com.br', 'Diretor', 'ueek', 'adcd7048512e64b48da55b027577886ee5a36350', '1', '2022-03-25 13:36:26', '2025-04-16 08:00:58');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
