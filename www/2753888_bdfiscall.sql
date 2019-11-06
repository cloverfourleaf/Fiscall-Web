-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb20.agilityhoster.com
-- Generation Time: 26-Jul-2018 às 14:51
-- Versão do servidor: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2753888_bdfiscall`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbalocacao`
--

CREATE TABLE `tbalocacao` (
  `codAlocacao` int(11) NOT NULL,
  `codFuncionario` int(11) NOT NULL,
  `codOnibus` int(11) DEFAULT NULL,
  `codLinha` int(11) NOT NULL,
  `inicioAlocacao` date NOT NULL,
  `fimAlocacao` date NOT NULL,
  `statusAlocacao` varchar(15) NOT NULL,
  `codTurno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbalocacao`
--

INSERT INTO `tbalocacao` (`codAlocacao`, `codFuncionario`, `codOnibus`, `codLinha`, `inicioAlocacao`, `fimAlocacao`, `statusAlocacao`, `codTurno`) VALUES
(1, 13, 6, 6, '2018-05-12', '2018-06-29', 'DisponÃ­vel', 1),
(2, 4, 3, 4, '2018-05-12', '2018-07-11', 'DisponÃ­vel', 4),
(4, 14, 9, 10, '2018-06-16', '2018-06-21', 'DisponÃ­vel', 3),
(11, 17, NULL, 10, '2018-06-16', '2018-06-28', 'DisponÃ­vel', 1),
(43, 10, 3, 3, '2018-06-21', '2018-06-21', 'DisponÃ­vel', 1),
(44, 13, 1, 6, '2018-06-19', '2018-06-21', 'DisponÃ­vel', 2),
(45, 8, 4, 10, '2018-06-21', '2018-06-21', 'DisponÃ­vel', 3),
(46, 6, 3, 3, '2018-06-22', '2018-06-23', 'DisponÃ­vel', 2),
(49, 16, NULL, 3, '2018-06-23', '2019-07-23', 'IndisponÃ­vel', 4),
(50, 3, NULL, 1, '2018-06-26', '2019-06-26', 'IndisponÃ­vel', 1),
(51, 10, 4, 10, '2018-06-27', '2020-07-27', 'IndisponÃ­vel', 4),
(52, 6, 9, 5, '2018-06-27', '2018-09-27', 'IndisponÃ­vel', 2),
(53, 10, 6, 6, '2018-05-12', '2018-06-27', 'DisponÃ­vel', 1),
(54, 37, NULL, 5, '2018-07-04', '2018-07-20', 'DisponÃ­vel', 1),
(55, 36, 4, 5, '2018-07-04', '2018-07-20', 'DisponÃ­vel', 1),
(56, 38, NULL, 5, '2018-07-04', '2018-07-20', 'DisponÃ­vel', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcooperativa`
--

CREATE TABLE `tbcooperativa` (
  `codCooperativa` int(11) NOT NULL,
  `nomeCooperativa` varchar(90) NOT NULL,
  `emailCooperativa` varchar(90) NOT NULL,
  `cnpjCooperativa` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbcooperativa`
--

INSERT INTO `tbcooperativa` (`codCooperativa`, `nomeCooperativa`, `emailCooperativa`, `cnpjCooperativa`) VALUES
(1, 'ABC', 'compras@abc.com.br', '30.521.091/0001-72'),
(2, 'Anhanguera', 'anhanguera@anhanguera.com.br', '30.521.091/0001-71'),
(3, 'Eaosa', 'eaosa@eaosa.com.br', '92.885.045/0001-09'),
(4, 'Expresso SBC', 'expressosbc@expressosbc.com.br', '26.564.256/0001-15'),
(5, 'Imigrante', 'imigrante@imigrante.com.br', '29.665.576/0001-50'),
(6, 'Internorte', 'internorte@internorte.com.br', '09.161.084/0001-10'),
(7, 'Intervias', 'intervias@intervias.com.br', '72.936.211/0001-41'),
(8, 'Metra', 'metra@metra.com.br', '40.634.029/0001-40'),
(9, 'Mobibrasil Transporte', 'mobibrasiltrans@mobibrasiltrans.com.br', '35.610.194/0001-21'),
(10, 'Parque das NaÃ§Ãµes', 'pqdasncs@pqdasncs.com.br', '95.741.242/0001-42'),
(11, 'Publix', 'publix@publix.com.br', '41.046.316/0001-00'),
(12, 'Riacho Grande', 'riachog@riachog.com.br', '75.300.915/0001-11'),
(13, 'RibeirÃ£o Pires', 'rpires@rpires.com.br', '15.323.100/0001-26'),
(14, 'Rigras', 'rigras@rigras.com.br', '25.706.785/0001-43'),
(15, 'SÃ£o Camilo', 'saocamilo@saocamilo.com.br', '24.541.923/0001-19'),
(16, 'Trans Bus', 'zezinho@hotmail.com', '38.770.092/0001-61'),
(17, 'TriÃ¢ngulo', 'triang@triang.com.br', '01.621.780/0001-50'),
(18, 'Tucuruvi', 'tucuruvisdd@tucuruvi.com.br', '98.644.002/0001-18'),
(19, 'UniLeste', 'unileste@unilest.com.br', '42.807.809/0001-70'),
(20, 'Urbana', 'urban@urbana.com.br', '78.872.629/0001-19'),
(21, 'Vipe', 'vipe@vipetransp.com.br', '28.555.687/0001-40'),
(22, 'Copara', 'copara@cop.com.br', '93.805.928/0001-24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfabricante`
--

CREATE TABLE `tbfabricante` (
  `codFabricante` int(11) NOT NULL,
  `nomeFabricante` varchar(70) NOT NULL,
  `cnpjFabricante` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbfabricante`
--

INSERT INTO `tbfabricante` (`codFabricante`, `nomeFabricante`, `cnpjFabricante`) VALUES
(1, 'Marcopolo', '51.033.554/0001-26'),
(2, 'Neobus', '85.922.028/0001-39'),
(3, 'Mascarello', '36.501.013/0001-91'),
(4, 'Caio', '65.138.753/0001-03'),
(5, 'Mercedes', '91.163.458/0001-17'),
(6, 'Busscar', '33.961.098/0001-00'),
(7, 'Comil', '02.924.542/0001-86');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfuncionario`
--

CREATE TABLE `tbfuncionario` (
  `codFuncionario` int(11) NOT NULL,
  `matriculaFuncionario` varchar(15) NOT NULL,
  `nomeFuncionario` varchar(90) NOT NULL,
  `rgFuncionario` varchar(12) NOT NULL,
  `emailFuncionario` varchar(90) NOT NULL,
  `cnhFuncionario` varchar(12) DEFAULT NULL,
  `cpfFuncionario` varchar(14) NOT NULL,
  `dataCadastroFuncionario` date NOT NULL,
  `codUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbfuncionario`
--

INSERT INTO `tbfuncionario` (`codFuncionario`, `matriculaFuncionario`, `nomeFuncionario`, `rgFuncionario`, `emailFuncionario`, `cnhFuncionario`, `cpfFuncionario`, `dataCadastroFuncionario`, `codUsuario`) VALUES
(1, 'xQIQglRjM9', 'Vitor Leonardo GonÃ§alves de Oliveira Silva', '27.964.300-7', 'vitor.leonardo@hotmail.com', NULL, '684.787.620-43', '2018-05-06', 1),
(2, 'HOD7aYDdJp', 'JoÃ£o Pedro da Silva Soares', '19.921.924-2', 'js.java@gmail.com', NULL, '547.538.790-70', '2018-05-06', 2),
(3, 'sNPtfgi6FF', 'Lucas Valeriano da Silva', '28.195.582-7', 'lucaovaleriano@gmail.com', NULL, '754.442.920-25', '2018-05-06', 3),
(4, 'o3WxK3Ycdl', 'Gabriel Martins Mendes Oliveira', '49.822.320-6', 'gmartins@outlook.com.br', '5402977390-9', '859.517.540-38', '2018-05-06', 4),
(5, 'bk0fiQ3luC', 'Rita Daiane Teixeira', '24.834.878-4', 'parecidaassuncao-97@diebold.com', '3235728018-5', '698.084.043-67', '2018-05-06', 6),
(6, 'RdPhMwEwrK', 'Allana Alessandra Aparecida AssunÃ§Ã£o', '19.830.252-6', 'raaparecida@gmail.com', '7851913356-7', '367.824.417-30', '2018-05-06', 7),
(7, '1WDNJOGiqj', 'Sabrina TÃ¢nia Benedita GonÃ§alves', '49.362.053-9', 'beneditagon@gmail.com', '3383210040-9', '853.019.493-49', '2018-05-06', 8),
(8, 'JIKAnsQgUB', 'Nair Agatha Mirella', '26.694.602-1', 'agathamirella@gmail.com', '6266386864-0', '644.196.450-32', '2018-05-06', 9),
(9, 'jnf0KslPeS', 'Rafael Filipe AssunÃ§Ã£o', '49.770.164-9', 'filipeassuo@hotmail.com', '8823656402-0', '717.615.540-26', '2018-05-06', 10),
(10, 'aUpeiztpXa', 'Ayla Sueli Lara Teixeira', '33.866.180-3', 'larateixeira@hotmail.com', '2531782810-6', '880.235.020-50', '2018-05-06', 11),
(11, 'PhjahMJytf', 'Marina Lavinia', '42.627.613-9', 'marinalavinia@hotmail.com', '8523636913-9', '573.236.520-65', '2018-05-06', 12),
(12, '0TIWKTEwkj', 'Marcos Vinicius Yuri Juan Teixeira', '13.911.465-8', 'yurijuan@outlook.com.br', '6533003699-0', '047.271.070-23', '2018-05-06', 13),
(13, 'FB4wfdkPJ8', 'FÃ¡bio Renan GalvÃ£o', '40.646.834-5', 'renangalvao@outlook.com.br', '4336384077-0', '673.623.052-73', '2018-05-06', 14),
(14, 'qZfP0DdA2N', 'Isadora Ayla', '12.623.658-6', 'ayla84@outlook.com.br', '0369891384-4', '321.016.580-70', '2018-05-06', 15),
(15, 'frhoDr8Iej', 'Pedro Ruan Ellio', '10.824.003-4', 'eliope@hotmail.com', NULL, '699.292.810-45', '2018-05-06', 16),
(16, 'rkkmWGG7WP', 'Alexandre Rodrigo Murilo da Silva', '11.699.595-6', 'aalexasilva@lumavale.com.br', NULL, '541.557.291-05', '2018-05-06', 17),
(17, '5CpbRfewfW', 'Julio Leandro Lucas Rocha', '32.041.754-2', 'jjuucasrocha@pronta.com.br', NULL, '415.182.233-03', '2018-05-06', 18),
(18, '9BEhpIPoRt', 'Leonardo Mateus Nathan Brito', '16.454.899-3', 'leonathanbrito_@multieventos.art.br', NULL, '570.060.734-48', '2018-05-06', 19),
(19, 'NATymq4snP', 'Daiane AlÃ­cia Sales', '29.004.815-1', 'daianealiciasales_@dpi.indl.com.br', NULL, '665.131.170-03', '2018-05-06', 20),
(20, '9jSoAlKfXp', 'Beatriz Sophie Drumond', '44.404.501-6', 'beatriz89@achievecidadenova.com.br', '2Wq74XGJBY', '558.133.681-40', '2018-05-06', 21),
(21, '4OYODB57ui', 'Mariane Sebastiana Duart', '19.325.710-5', 'marianeseb-90@rmsolutions.inf.br', NULL, '943.994.189-82', '2018-05-06', 22),
(22, 'NtIhZIIjof', 'Nelson Roberto Gustavo', '22.084.766-6', 'nelsonrobertogustavoa@saboia.me', NULL, '696.602.135-06', '2018-05-06', 23),
(23, 'NsU1aXYDZZ', 'Bruno Isaac Erick Rezende', '15.450.115-3', 'rickrezende@suplement.com.br', NULL, '037.308.165-00', '2018-05-06', 24),
(24, '9ZAmkguTiU', 'Bagriel', '506662305', 'Gabrielmendesoliveira2010@hotmail.com', NULL, '778.264.100-45', '2018-06-16', 27),
(25, 'k3F9WNIh0G', 'ThaÃ­s Calazans', '41.209.249-9', 'thaiscalazans@gmail.com', NULL, '290.625.380-45', '2018-06-16', 28),
(30, '552658094', 'alinr', '89233-x', 'profalinemendonca@gmail', '8787687676', '324.245.458-80', '2018-06-18', 31),
(31, '1983246298', 'Diego Valeriano', '243542454354', 'Diegovaleriano@gmail.com', '12432432r425', '433.119.428-09', '2018-06-24', 32),
(35, '810623513', 'ThaÃ­s Oliveira', '461269375', 'thais.o97@hotmail.com', NULL, '021.993.230-13', '2018-06-30', 36),
(36, '529034634', 'Claudia Regina', '494833695', 'claudia.r@gmail.com', '78780978779', '102.580.130-01', '2018-07-02', 37),
(37, '665291400', 'Elzo Brito', '37.481.154-x', 'elzo.b@gmail.com', NULL, '480.052.538-18', '2018-07-04', 38),
(38, '1659415241', 'Robson Cesar', '37481052-x', 'robson@gmail.com', NULL, '513.720.920-13', '2018-07-04', 39);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbgerenciamentolinha`
--

CREATE TABLE `tbgerenciamentolinha` (
  `codGerenciamentoLinha` int(11) NOT NULL,
  `codMonitoramento` int(11) NOT NULL,
  `codAlocacao` int(11) NOT NULL,
  `horarioChegada` time NOT NULL,
  `horarioPrevisto` time NOT NULL,
  `statusViagem` varchar(15) DEFAULT NULL,
  `horarioSaida` time NOT NULL,
  `dataViagem` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbgerenciamentolinha`
--

INSERT INTO `tbgerenciamentolinha` (`codGerenciamentoLinha`, `codMonitoramento`, `codAlocacao`, `horarioChegada`, `horarioPrevisto`, `statusViagem`, `horarioSaida`, `dataViagem`) VALUES
(1, 1, 53, '13:58:00', '14:08:00', 'Completa', '14:01:47', '2018-07-02'),
(76, 9, 52, '03:03:22', '03:18:22', 'Completa', '03:03:41', '2018-07-02'),
(77, 9, 52, '03:07:29', '03:22:29', 'Completa', '11:41:05', '2018-07-02'),
(78, 9, 2, '03:10:52', '03:25:52', 'Completa', '03:11:44', '2018-07-02'),
(79, 9, 2, '03:12:35', '03:27:35', 'Completa', '03:12:43', '2018-07-02'),
(80, 11, 2, '14:40:28', '14:50:28', 'Completa', '14:41:02', '2018-07-02'),
(83, 11, 2, '14:46:57', '14:56:57', 'Completa', '14:49:32', '2018-07-02'),
(84, 15, 52, '17:22:16', '17:32:16', 'Completa', '17:23:03', '2018-07-02'),
(85, 16, 52, '17:39:47', '17:49:47', 'Incompleta', '00:00:00', '2018-07-02'),
(87, 24, 2, '20:34:11', '20:39:11', 'Completa', '20:36:19', '2018-07-02'),
(88, 24, 2, '20:37:59', '20:42:59', 'Completa', '20:38:03', '2018-07-02'),
(89, 27, 55, '09:40:04', '09:50:04', 'Completa', '09:40:18', '2018-07-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblinha`
--

CREATE TABLE `tblinha` (
  `codLinha` int(11) NOT NULL,
  `nomeLinha` varchar(120) NOT NULL,
  `tarifaLinha` double NOT NULL,
  `numLinha` varchar(8) NOT NULL,
  `horaFuncionamento` time NOT NULL,
  `horaTermino` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblinha`
--

INSERT INTO `tblinha` (`codLinha`, `nomeLinha`, `tarifaLinha`, `numLinha`, `horaFuncionamento`, `horaTermino`) VALUES
(1, 'TERMINAL SACOMA', 6.2, '431', '07:20:00', '20:00:00'),
(2, 'TERMINAL CECAP', 4.85, '499', '06:10:00', '23:25:00'),
(3, 'JARDIM JOAO XXIII', 4.75, '496', '08:50:00', '15:35:00'),
(4, 'TERMINAL RODOVIARIO TIETE', 4.55, '500', '17:00:00', '20:40:00'),
(5, 'METRO ARMENIA', 6.8, '501', '20:00:00', '23:00:00'),
(6, 'JARDIM SANTA TEREZA', 4, '551VP1', '10:50:00', '12:20:00'),
(7, 'METRO PENHA', 6.15, '248', '15:55:00', '18:30:00'),
(8, 'METRO CARRAO', 6.3, '242BI1', '10:00:00', '22:00:00'),
(9, 'TERMINAL CASA BRANCA', 5.45, '459', '04:00:00', '23:50:00'),
(10, 'METRO ALTO DO IPIRANGA', 4.75, '494', '06:00:00', '20:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmodelo`
--

CREATE TABLE `tbmodelo` (
  `codModelo` int(11) NOT NULL,
  `nomeModelo` varchar(70) NOT NULL,
  `anoFabricacao` year(4) NOT NULL,
  `codTipoModelo` int(11) NOT NULL,
  `codFabricante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbmodelo`
--

INSERT INTO `tbmodelo` (`codModelo`, `nomeModelo`, `anoFabricacao`, `codTipoModelo`, `codFabricante`) VALUES
(1, 'Sepec', 2008, 1, 2),
(2, 'Thunder Th +', 2012, 1, 2),
(3, 'Mega', 2016, 1, 2),
(4, 'Granmidi', 2009, 2, 3),
(5, 'Granmicro', 2012, 3, 3),
(6, 'Foz Super', 2015, 1, 4),
(7, 'Foz Solar', 2012, 1, 4),
(8, 'Apache Vip', 2015, 1, 4),
(9, 'Millennium', 2006, 1, 4),
(10, 'Apache Uu', 2013, 1, 4),
(11, 'Sprinter', 2014, 4, 5),
(12, 'Urbanuss', 2007, 1, 6),
(13, 'Viale', 2006, 1, 1),
(14, 'Senior Midi', 2008, 2, 1),
(15, 'Torino', 2016, 1, 1),
(16, 'Torino U', 2013, 1, 1),
(17, 'Senior Urbano', 2005, 5, 1),
(18, 'Svelto', 2010, 1, 7),
(19, 'Svelto Midi', 2012, 1, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmonitoramento`
--

CREATE TABLE `tbmonitoramento` (
  `codMonitoramento` int(11) NOT NULL,
  `dataMonitoramento` date NOT NULL,
  `codPonto` int(11) NOT NULL,
  `codFuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbmonitoramento`
--

INSERT INTO `tbmonitoramento` (`codMonitoramento`, `dataMonitoramento`, `codPonto`, `codFuncionario`) VALUES
(1, '0000-00-00', 9, 31),
(2, '0000-00-00', 9, 31),
(3, '2018-06-01', 10, 31),
(4, '2018-07-01', 10, 31),
(5, '2018-07-02', 10, 31),
(6, '2018-07-02', 10, 31),
(7, '2018-07-02', 10, 31),
(8, '2018-07-02', 10, 31),
(9, '2018-07-02', 9, 31),
(10, '2018-07-03', 1, 3),
(11, '2018-07-03', 1, 3),
(12, '2018-07-03', 1, 3),
(13, '2018-07-03', 1, 3),
(14, '2018-07-03', 1, 3),
(15, '2018-07-03', 2, 3),
(16, '2018-07-03', 1, 3),
(17, '2018-07-03', 1, 3),
(18, '2018-07-03', 2, 3),
(19, '2018-07-03', 2, 3),
(20, '2018-07-03', 2, 3),
(21, '2018-07-03', 2, 3),
(22, '2018-07-03', 1, 3),
(23, '2018-07-03', 2, 3),
(24, '2018-07-03', 2, 3),
(25, '2018-07-03', 1, 3),
(26, '2018-07-04', 1, 3),
(27, '2018-07-04', 9, 37),
(28, '2018-07-04', 10, 37),
(29, '2018-07-04', 9, 38);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbnivelusuario`
--

CREATE TABLE `tbnivelusuario` (
  `codNivelUsuario` int(11) NOT NULL,
  `descricaoNivelUsuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbnivelusuario`
--

INSERT INTO `tbnivelusuario` (`codNivelUsuario`, `descricaoNivelUsuario`) VALUES
(1, 'Administrador'),
(2, 'Gerente'),
(3, 'Fiscal'),
(4, 'Motorista');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbonibus`
--

CREATE TABLE `tbonibus` (
  `codOnibus` int(11) NOT NULL,
  `placaOnibus` varchar(8) NOT NULL,
  `prefixoOnibus` varchar(10) NOT NULL,
  `operacao` year(4) NOT NULL,
  `codModelo` int(11) NOT NULL,
  `codCooperativa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbonibus`
--

INSERT INTO `tbonibus` (`codOnibus`, `placaOnibus`, `prefixoOnibus`, `operacao`, `codModelo`, `codCooperativa`) VALUES
(1, 'BXY-3067', '38486', 2013, 5, 2),
(2, 'EVP-7445', '92462', 2011, 4, 11),
(3, 'BLY-9160', '77403', 2014, 9, 8),
(4, 'CCS-5130', '34845', 2008, 7, 9),
(5, 'EAM-6969', '29509', 2015, 6, 1),
(6, 'CYO-4438', '29423', 2013, 10, 17),
(7, 'EEN-1893', '17407', 2017, 8, 19),
(8, 'FSK-1737', '14065', 2012, 19, 15),
(9, 'DUU-2832', '36127', 2017, 3, 13),
(10, 'ELU-5232', '99498', 2012, 2, 6),
(11, 'EFI-7875', '849651', 2014, 7, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbponto`
--

CREATE TABLE `tbponto` (
  `codPonto` int(11) NOT NULL,
  `descricaoPonto` varchar(90) NOT NULL,
  `codLinha` int(11) NOT NULL,
  `codTipoViagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbponto`
--

INSERT INTO `tbponto` (`codPonto`, `descricaoPonto`, `codLinha`, `codTipoViagem`) VALUES
(1, 'JARDIM LAS PALMAS', 1, 1),
(2, 'TERMINAL SACOMA', 1, 2),
(3, 'TERMINAL METROPOLITANO CECAP', 2, 1),
(4, 'ESTACAO CPTM DOM BOSCO', 2, 2),
(5, 'JARDIM JOAO XXII', 3, 1),
(6, 'ALPHAVILLE 3', 3, 2),
(7, 'TERMINAL METROPOLITANO VILA GALVAO', 4, 1),
(8, 'TERMINAL RODOVIARIO TIETE', 4, 2),
(9, 'PARQUE PIRATININGA', 5, 1),
(10, 'METRO ARMENIA', 5, 2),
(11, 'JARDIM SANTA TEREZA', 6, 1),
(12, 'METRO CAPAO REDONDO', 6, 2),
(13, 'PARQUE SANTOS DUMONT', 7, 1),
(14, 'METRO PENHA', 7, 2),
(15, 'METRO CARRAO', 8, 1),
(16, 'ITAQUAQUECETUBA - PEQUENO CORACAO', 8, 2),
(17, 'TERMINAL CASA BRANCA', 9, 1),
(18, 'ITAIM BIBI', 9, 2),
(19, 'METRO ALTO DO IPIRANGA', 10, 1),
(20, 'TERMINAL RODOVIARIO NICOLAU DELIC', 10, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipomodelo`
--

CREATE TABLE `tbtipomodelo` (
  `codTipoModelo` int(11) NOT NULL,
  `descricaoTipoModelo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbtipomodelo`
--

INSERT INTO `tbtipomodelo` (`codTipoModelo`, `descricaoTipoModelo`) VALUES
(1, 'Urbano'),
(2, 'Leve Urbano'),
(3, 'Outros'),
(4, 'Micro-'),
(5, 'Micro'),
(6, 'g');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipoviagem`
--

CREATE TABLE `tbtipoviagem` (
  `codTipoViagem` int(11) NOT NULL,
  `descricaoTipoViagem` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbtipoviagem`
--

INSERT INTO `tbtipoviagem` (`codTipoViagem`, `descricaoTipoViagem`) VALUES
(1, 'Inicial'),
(2, 'Final');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbturno`
--

CREATE TABLE `tbturno` (
  `codTurno` int(11) NOT NULL,
  `descricaoTurno` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbturno`
--

INSERT INTO `tbturno` (`codTurno`, `descricaoTurno`) VALUES
(1, 'ManhÃ£'),
(2, 'Tarde'),
(3, 'Noite'),
(4, 'Madrugada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `codUsuario` int(11) NOT NULL,
  `loginUsuario` varchar(40) NOT NULL,
  `senhaUsuario` varchar(225) CHARACTER SET latin1 NOT NULL,
  `codNivelUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`codUsuario`, `loginUsuario`, `senhaUsuario`, `codNivelUsuario`) VALUES
(1, 'admin', 'admin', 1),
(2, 'gerente', '1312', 2),
(3, 'fiscal', 'fiscal', 3),
(4, 'motorista', 'motorista', 4),
(6, 'ritaD', 'rita', 4),
(7, 'allana', 'allana', 4),
(8, 'sabrina', 'sabrina', 4),
(9, 'nair', 'nair', 4),
(10, 'rafael', 'rafael', 4),
(11, 'ayla', 'ayla', 4),
(12, 'marina', 'marina', 4),
(13, 'marcos', 'marcos', 4),
(14, 'fabio', 'fabio', 4),
(15, 'isadora', 'isadora', 4),
(16, 'pedroellio', 'pedro', 3),
(17, 'alexandre', 'alexandre', 3),
(18, 'julio', 'julio', 3),
(19, 'leonardo', 'leonardo', 3),
(20, 'daiane', 'daiane', 3),
(21, 'beatriz', 'beatriz', 3),
(22, 'mariane', 'mariane', 3),
(23, 'nelson', 'nelson', 3),
(24, 'bruno', 'bruno', 3),
(27, 'bagriel', 'admin', 1),
(28, 'thais', 'thais', 1),
(31, 'aline1', '1234', 4),
(32, 'diegosilva', 'juse', 3),
(36, 'thausoli', 'minhasenha', 3),
(37, 'crgos', '1537', 4),
(38, 'elzob', 'elzob', 3),
(39, 'robc', 'robc', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbalocacao`
--
ALTER TABLE `tbalocacao`
  ADD PRIMARY KEY (`codAlocacao`),
  ADD KEY `codOnibus` (`codOnibus`),
  ADD KEY `codLinha` (`codLinha`),
  ADD KEY `codFuncionario_2` (`codFuncionario`),
  ADD KEY `codFuncionario_3` (`codFuncionario`),
  ADD KEY `codFuncionario_4` (`codFuncionario`),
  ADD KEY `codFuncionario_5` (`codFuncionario`),
  ADD KEY `codFuncionario` (`codFuncionario`) USING BTREE,
  ADD KEY `codTurno` (`codTurno`);

--
-- Indexes for table `tbcooperativa`
--
ALTER TABLE `tbcooperativa`
  ADD PRIMARY KEY (`codCooperativa`);

--
-- Indexes for table `tbfabricante`
--
ALTER TABLE `tbfabricante`
  ADD PRIMARY KEY (`codFabricante`);

--
-- Indexes for table `tbfuncionario`
--
ALTER TABLE `tbfuncionario`
  ADD PRIMARY KEY (`codFuncionario`),
  ADD UNIQUE KEY `rgFuncionario` (`rgFuncionario`),
  ADD UNIQUE KEY `emailFuncionario` (`emailFuncionario`),
  ADD UNIQUE KEY `cpfFuncionario` (`cpfFuncionario`),
  ADD UNIQUE KEY `codUsuario` (`codUsuario`),
  ADD UNIQUE KEY `cnhFuncionario` (`cnhFuncionario`);

--
-- Indexes for table `tbgerenciamentolinha`
--
ALTER TABLE `tbgerenciamentolinha`
  ADD PRIMARY KEY (`codGerenciamentoLinha`),
  ADD KEY `codMonitoramento` (`codMonitoramento`),
  ADD KEY `codAlocacao` (`codAlocacao`);

--
-- Indexes for table `tblinha`
--
ALTER TABLE `tblinha`
  ADD PRIMARY KEY (`codLinha`);

--
-- Indexes for table `tbmodelo`
--
ALTER TABLE `tbmodelo`
  ADD PRIMARY KEY (`codModelo`),
  ADD KEY `codFabricante` (`codFabricante`),
  ADD KEY `codTipoModelo` (`codTipoModelo`);

--
-- Indexes for table `tbmonitoramento`
--
ALTER TABLE `tbmonitoramento`
  ADD PRIMARY KEY (`codMonitoramento`),
  ADD KEY `codFuncionario` (`codFuncionario`),
  ADD KEY `codPonto` (`codPonto`) USING BTREE;

--
-- Indexes for table `tbnivelusuario`
--
ALTER TABLE `tbnivelusuario`
  ADD PRIMARY KEY (`codNivelUsuario`);

--
-- Indexes for table `tbonibus`
--
ALTER TABLE `tbonibus`
  ADD PRIMARY KEY (`codOnibus`),
  ADD KEY `codModelo` (`codModelo`),
  ADD KEY `codCooperativa` (`codCooperativa`);

--
-- Indexes for table `tbponto`
--
ALTER TABLE `tbponto`
  ADD PRIMARY KEY (`codPonto`),
  ADD KEY `codLinha` (`codLinha`),
  ADD KEY `codTipoViagem` (`codTipoViagem`);

--
-- Indexes for table `tbtipomodelo`
--
ALTER TABLE `tbtipomodelo`
  ADD PRIMARY KEY (`codTipoModelo`);

--
-- Indexes for table `tbtipoviagem`
--
ALTER TABLE `tbtipoviagem`
  ADD PRIMARY KEY (`codTipoViagem`);

--
-- Indexes for table `tbturno`
--
ALTER TABLE `tbturno`
  ADD PRIMARY KEY (`codTurno`);

--
-- Indexes for table `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`codUsuario`),
  ADD KEY `codNivelUsuario` (`codNivelUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbalocacao`
--
ALTER TABLE `tbalocacao`
  MODIFY `codAlocacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `tbcooperativa`
--
ALTER TABLE `tbcooperativa`
  MODIFY `codCooperativa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbfabricante`
--
ALTER TABLE `tbfabricante`
  MODIFY `codFabricante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbfuncionario`
--
ALTER TABLE `tbfuncionario`
  MODIFY `codFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tbgerenciamentolinha`
--
ALTER TABLE `tbgerenciamentolinha`
  MODIFY `codGerenciamentoLinha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `tblinha`
--
ALTER TABLE `tblinha`
  MODIFY `codLinha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbmodelo`
--
ALTER TABLE `tbmodelo`
  MODIFY `codModelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbmonitoramento`
--
ALTER TABLE `tbmonitoramento`
  MODIFY `codMonitoramento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tbnivelusuario`
--
ALTER TABLE `tbnivelusuario`
  MODIFY `codNivelUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbonibus`
--
ALTER TABLE `tbonibus`
  MODIFY `codOnibus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbponto`
--
ALTER TABLE `tbponto`
  MODIFY `codPonto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbtipomodelo`
--
ALTER TABLE `tbtipomodelo`
  MODIFY `codTipoModelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbtipoviagem`
--
ALTER TABLE `tbtipoviagem`
  MODIFY `codTipoViagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbturno`
--
ALTER TABLE `tbturno`
  MODIFY `codTurno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `codUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tbalocacao`
--
ALTER TABLE `tbalocacao`
  ADD CONSTRAINT `tbalocacao_ibfk_1` FOREIGN KEY (`codFuncionario`) REFERENCES `tbfuncionario` (`codFuncionario`),
  ADD CONSTRAINT `tbalocacao_ibfk_2` FOREIGN KEY (`codLinha`) REFERENCES `tblinha` (`codLinha`),
  ADD CONSTRAINT `tbalocacao_ibfk_3` FOREIGN KEY (`codOnibus`) REFERENCES `tbonibus` (`codOnibus`),
  ADD CONSTRAINT `tbalocacao_ibfk_4` FOREIGN KEY (`codTurno`) REFERENCES `tbturno` (`codTurno`);

--
-- Limitadores para a tabela `tbfuncionario`
--
ALTER TABLE `tbfuncionario`
  ADD CONSTRAINT `tbfuncionario_ibfk_1` FOREIGN KEY (`codUsuario`) REFERENCES `tbusuario` (`codUsuario`);

--
-- Limitadores para a tabela `tbgerenciamentolinha`
--
ALTER TABLE `tbgerenciamentolinha`
  ADD CONSTRAINT `tbgerenciamentolinha_ibfk_4` FOREIGN KEY (`codMonitoramento`) REFERENCES `tbmonitoramento` (`codMonitoramento`),
  ADD CONSTRAINT `tbgerenciamentolinha_ibfk_5` FOREIGN KEY (`codAlocacao`) REFERENCES `tbalocacao` (`codAlocacao`);

--
-- Limitadores para a tabela `tbmodelo`
--
ALTER TABLE `tbmodelo`
  ADD CONSTRAINT `tbmodelo_ibfk_1` FOREIGN KEY (`codFabricante`) REFERENCES `tbfabricante` (`codFabricante`),
  ADD CONSTRAINT `tbmodelo_ibfk_2` FOREIGN KEY (`codTipoModelo`) REFERENCES `tbtipomodelo` (`codTipoModelo`);

--
-- Limitadores para a tabela `tbmonitoramento`
--
ALTER TABLE `tbmonitoramento`
  ADD CONSTRAINT `tbmonitoramento_ibfk_2` FOREIGN KEY (`codPonto`) REFERENCES `tbponto` (`codPonto`),
  ADD CONSTRAINT `tbmonitoramento_ibfk_3` FOREIGN KEY (`codFuncionario`) REFERENCES `tbfuncionario` (`codFuncionario`);

--
-- Limitadores para a tabela `tbonibus`
--
ALTER TABLE `tbonibus`
  ADD CONSTRAINT `tbonibus_ibfk_1` FOREIGN KEY (`codModelo`) REFERENCES `tbmodelo` (`codModelo`),
  ADD CONSTRAINT `tbonibus_ibfk_2` FOREIGN KEY (`codCooperativa`) REFERENCES `tbcooperativa` (`codCooperativa`);

--
-- Limitadores para a tabela `tbponto`
--
ALTER TABLE `tbponto`
  ADD CONSTRAINT `tbponto_ibfk_1` FOREIGN KEY (`codTipoViagem`) REFERENCES `tbtipoviagem` (`codTipoViagem`);

--
-- Limitadores para a tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD CONSTRAINT `tbusuario_ibfk_1` FOREIGN KEY (`codNivelUsuario`) REFERENCES `tbnivelusuario` (`codNivelUsuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
