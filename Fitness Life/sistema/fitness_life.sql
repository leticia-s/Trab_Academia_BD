-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jun-2019 às 02:57
-- Versão do servidor: 10.3.15-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fitness_life`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `idperfil` int(4) NOT NULL,
  `perfil` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`idperfil`, `perfil`) VALUES
(1, 'Administrador'),
(2, 'FuncionÃ¡rio'),
(3, 'Aluno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_agendamento`
--

CREATE TABLE `tb_agendamento` (
  `id_pessoa_cpf` varchar(11) NOT NULL,
  `id_agenda_semanal` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_agendamento`
--

INSERT INTO `tb_agendamento` (`id_pessoa_cpf`, `id_agenda_semanal`) VALUES
('01575631466', 4),
('03732757498', 4),
('11320992692', 4),
('13123608522', 4),
('13530359050', 4),
('48442895868', 4),
('50248686500', 4),
('74509718527', 4),
('13530359050', 11),
('74509718527', 11),
('78806580256', 11),
('41205896171', 14),
('74509718527', 14),
('01575631466', 15),
('03732757498', 15),
('13530359050', 15),
('16559357392', 15),
('24304335596', 15),
('35755563691', 15),
('38514563190', 15),
('38525412988', 15),
('41303522454', 15),
('48442895868', 15),
('48561661828', 15),
('50248686500', 15),
('72102345009', 15),
('74509718527', 15),
('77078028538', 15),
('77125587100', 15),
('78806580256', 15),
('86321493856', 15),
('03732757498', 17),
('13530359050', 17),
('74509718527', 17),
('78806580256', 17),
('01575631466', 18),
('03732757498', 18),
('11320992692', 18),
('13123608522', 18),
('13530359050', 18),
('16559357392', 18),
('24304335596', 18),
('35755563691', 18),
('38525412988', 18),
('41205896171', 18),
('48442895868', 18),
('50248686500', 18),
('72102345009', 18),
('74509718527', 18),
('77078028538', 18),
('77125587100', 18),
('78806580256', 18),
('11320992692', 19),
('13123608522', 19),
('41205896171', 19),
('48442895868', 19),
('74509718527', 19),
('03732757498', 20),
('11320992692', 20),
('13530359050', 20),
('41205896171', 20),
('48442895868', 20),
('74509718527', 20),
('78806580256', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_agenda_semanal`
--

CREATE TABLE `tb_agenda_semanal` (
  `id_agenda_semanal` int(4) NOT NULL,
  `dia_da_semana` varchar(15) NOT NULL,
  `horario_inicial` time NOT NULL,
  `horario_final` time NOT NULL,
  `nome_aula` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_agenda_semanal`
--

INSERT INTO `tb_agenda_semanal` (`id_agenda_semanal`, `dia_da_semana`, `horario_inicial`, `horario_final`, `nome_aula`) VALUES
(4, 'Segunda', '08:30:00', '09:40:00', 'Zumba'),
(11, 'TerÃ§a', '19:00:00', '20:15:00', 'Jump'),
(14, 'Segunda', '12:30:00', '14:50:00', 'Jump turma A'),
(15, 'Quarta', '08:22:00', '09:11:00', 'Pilates'),
(17, 'SÃ¡bado', '08:00:00', '09:50:00', 'Pilates - Turma C'),
(18, 'Quinta', '08:00:00', '09:00:00', 'Spinning'),
(19, 'Sexta', '14:00:00', '15:05:00', 'Circuito'),
(20, 'SÃ¡bado', '15:00:00', '16:00:00', 'Step');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aluno`
--

CREATE TABLE `tb_aluno` (
  `id_pessoa_cpf` varchar(11) NOT NULL,
  `peso_inicial` float DEFAULT NULL,
  `peso_durante` float DEFAULT NULL,
  `data_entrada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_aluno`
--

INSERT INTO `tb_aluno` (`id_pessoa_cpf`, `peso_inicial`, `peso_durante`, `data_entrada`) VALUES
('01575631466', 0, NULL, '2015-07-03'),
('03732757498', 71.9, NULL, '2015-07-05'),
('11320992692', 0, NULL, '2015-07-03'),
('13123608522', 0, NULL, '2015-07-03'),
('13530359050', 0, NULL, '2015-07-03'),
('16559357392', 66.8, NULL, '2015-07-03'),
('24304335596', 55.6, 33, '2015-07-03'),
('35755563691', 0, NULL, '2015-07-03'),
('38514563190', 66.8, NULL, '2015-07-03'),
('38525412988', 66.8, NULL, '2015-07-03'),
('41205896171', 33.9, NULL, '2015-07-03'),
('41303522454', 66.8, NULL, '2015-07-03'),
('48442895868', 33.9, NULL, '2015-07-03'),
('48561661828', 66.8, NULL, '2015-07-03'),
('50248686500', 0, NULL, '2015-07-03'),
('72102345009', 0, NULL, '2015-07-03'),
('74509718527', 0, NULL, '2015-07-03'),
('77078028538', 0, NULL, '2015-07-03'),
('77125587100', 22.5, NULL, '2015-07-03'),
('78806580256', 68.5, NULL, '2015-07-03'),
('86321493856', 0, NULL, '2015-07-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `id_pessoa_cpf` varchar(11) NOT NULL,
  `cargo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`id_pessoa_cpf`, `cargo`) VALUES
('22420511212', 'Professora'),
('36739697302', 'Professor'),
('51257593099', 'Professora de Jump'),
('62368575200', 'Recepcionista'),
('67548728298', 'Professor de Zumba'),
('85374555987', 'Professor'),
('96230797968', 'Professora de Pilates');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pessoa`
--

CREATE TABLE `tb_pessoa` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `data_nascimento` date NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cidade` varchar(15) NOT NULL,
  `bairro` varchar(25) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `telefone_residencial` varchar(18) NOT NULL,
  `telefone_celular` varchar(18) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_pessoa`
--

INSERT INTO `tb_pessoa` (`cpf`, `nome`, `sobrenome`, `sexo`, `data_nascimento`, `endereco`, `uf`, `cidade`, `bairro`, `rg`, `telefone_residencial`, `telefone_celular`, `email`) VALUES
('01575631466', 'Marione', 'Souza', 1, '1998-07-12', 'SHPS 601 CONJUNTO F', 'DF', 'CEILÃ‚NDIA', 'Leia', '335667', '(61) 8570-7576', '(61) 8570-7576', 'maria@hotmail.com'),
('03732757498', 'LetÃ­cia', 'de Souza Soares', 0, '1996-09-16', 'SHPS 601 CONJUNTO D', 'DF', 'CEILÃ‚NDIA', 'PÃ´r do Sol', '5432234', '(61) 3376-4719', '(61) 8545-0704', 'leticia.sz.sr@gmail.com'),
('11320992692', 'Fernanda', 'Silva da Rocha', 1, '1996-06-30', 'FRE 342 conjunto D casa 44', 'ES', 'Bela', 'Vista', '2276545', '(61) 3231-132', '(61) 3232-1232', 'fernanda@gmail.com'),
('13123608522', 'Fernando', 'Sunday da Rocha', 1, '1996-06-30', 'FRE 342 conjunto D casa 44', 'ES', 'Bela', 'Sua', '22233443', '(61) 3232-1232', '(61) 3231-132', 'fernando@gmail.com'),
('13530359050', 'Henrique', 'dos Mares', 1, '1990-11-23', 'GRE 434 conjun. 5 apt 33', 'GO', 'VarjÃ£o', 'Serquilhas', '3332323', '(23) 2323-232', '(32) 3223-232', 'gnu@unb.com'),
('16559357392', 'Luciano', 'Camargo Souza do Sul', 0, '1989-02-03', 'HD 555 conj 7 casa 2', 'DF', 'CeilÃ¢ndia', 'Sol Nascente', '7643322', '(61) 3434-3232', '(61) 3323-23434', 'cjesus@gmail.com'),
('22420511212', 'Zuleide', 'de Souza Soares', 0, '1960-08-01', 'SHPS 601 CONJUNTO A', 'BA', 'CEILÃ‚NDIA', '3122112', '21121221', '(61) 8570-7576', '(61) 8570-7576', 'zuleide@ymail.com'),
('24304335596', 'JoÃ£o', 'TunÃ§a AraÃºjo', 0, '1989-10-14', 'SHPS 601 CONJUNTO T', 'DF', 'CEILÃ‚NDIA', 'Buritu', '3654245', '(61) 8570-7576', '(61) 8570-7576', 'joao@hotmail.com'),
('35755563691', 'Leila', 'Dantas do Sul', 0, '1900-02-03', 'HD 456 conj 6 casa 33', 'DF', 'CeilÃ¢ndia', 'Sol Nascente', '7643322', '(61) 5632-8832', '(61) 3276-76327', 'lle@gmail.com'),
('36739697302', 'LuÃ­s', 'GonÃ§alves Camargo', 1, '1958-05-01', 'SHPS 601 CONJUNTO D', 'SP', 'CEILÃ‚NDIA', 'Karandiru', '5746y67', '(61) 8570-7576', '(61) 8570-7576', 'gabriel@hotmail.com'),
('38514563190', 'Mario', 'Eduardo Dunta', 1, '1998-04-11', 'SHPS 601 CONJUNTO G', 'MT', 'Rio', 'Junqueira', '429434121', '(61) 8570-7576', '(61) 8570-7576', 'mario@hotmail.com'),
('38525412988', 'Jesus', 'Camargo Souza do Sul', 0, '1900-02-03', 'HD 555 conj 7 casa 2', 'DF', 'CeilÃ¢ndia', 'Sol Nascente', '7643322', '(61) 3323-23434', '(61) 3434-3232', 'cjesus@gmail.com'),
('41205896171', 'Aparecida', 'Souza do Sul', 0, '1900-02-03', 'HD 455 conj 7 casa 2', 'DF', 'CeilÃ¢ndia', 'Sol Nascente', '7643322', '(61) 3276-76327', '(61) 5632-8832', 'cida@gmail.com'),
('41303522454', 'Mauricio', 'Camargo Soares', 0, '1989-02-03', 'QNN 23 conjunto 33 casa 55', 'DF', 'CeilÃ¢ndia', 'Sol Nascente', '7643322', '(61) 5233-25532', '(61) 3232-3232', 'mauricio@gmail.com'),
('48442895868', 'Eridina', 'Souza do Sul', 0, '1900-02-03', 'HD 555 conj 7 casa 2', 'DF', 'CeilÃ¢ndia', 'Sol Nascente', '7643322', '(61) 3323-23434', '(61) 3434-3232', 'cida@gmail.com'),
('48561661828', 'Mauricio', 'Camargo Soares', 0, '1989-02-03', 'QNN 23 conjunto 33 casa 55', 'DF', 'CeilÃ¢ndia', 'Sol Nascente', '7643322', '(61) 9943-6743', '(99) 7535-653', 'mauricio@gmail.com'),
('50248686500', 'Jonas', 'Cunha', 0, '1929-05-16', 'BB 333 conj 44 cas 56', 'DF', 'CEILÃ‚NDIA', 'P.Sul', '3324324', '(61) 8570-7576', '(61) 8570-7576', 'jonas@unb.com'),
('51257593099', 'Maria', 'Souza', 0, '1971-07-02', 'SHPS 601 CONJUNTO D', 'MS', 'CEILÃ‚NDIA', 'Aracuia', '3432433', '(61) 8570-7576', '(61) 8570-7576', 'maria@bol.com.br'),
('62368575200', 'Zoe', 'Dantas da Costa', 0, '1990-04-09', 'Brasil', 'RJ', 'Brasil', 'Nordeste', '3232323', '(23) 4343-3434', '(32) 2222-22222', 'zoe@ymail.com'),
('67548728298', 'ClÃªnio', 'Borges', 1, '1990-04-09', 'QNN 10 Conjunto 11 casa 20', 'DF', 'Ciato', 'CeilÃ¢ndia', '3232323', '(23) 4343-3434', '(32) 2222-22222', 'clenio@ymail.com'),
('72102345009', 'Maria', 'da GraÃ§as', 0, '1901-01-03', 'SHPS 601 CONJUNTO D', 'DF', 'CEILÃ‚NDIA', '72102345009', '3232285', '(61) 8570-7576', '(61) 8570-7576', 'gracinha@hotmail.com'),
('74509718527', 'CristovÃ£o', 'Mendes Lopes', 1, '1958-01-18', 'QNP 32 CONJUNTO G CASA 17', 'RN', 'Natal', 'Natal', '32235322', '(33) 2323-232', '(32) 3232-3232', 'cris@gmail.com'),
('77078028538', 'Ferraz', 'da Rocha', 1, '1996-06-30', 'FRE 342 conjunto D casa 44', 'ES', 'Bela', 'Sua', '22233443', '(61) 3232-1232', '(61) 3231-132', 'fernando@gmail.com'),
('77125587100', 'Lucio', 'da Cruz ', 0, '1931-05-09', 'QNT 23 conjunto 33 casa 55', 'GO', 'Paraiba', 'Runas', '33223344', '(12) 3243-243', '(32) 1123-32', 'lucio@gmail.com'),
('78806580256', 'FÃ¡tima', 'Passo Largo', 0, '1920-08-09', 'HFR 456 conjunto 3 casa 10', 'MG', 'Belo Horizonte', 'Rei', '12122133', '(33) 2432-32', '(64) 4232-332', 'fafa@yahoo.com.br'),
('85374555987', 'Edimar', 'da Costa', 1, '1990-04-09', 'Brasil', 'RJ', 'Brasil', 'Nordeste', '3232323', '(23) 4343-3434', '(32) 2222-22222', 'edimar@ymail.com'),
('86321493856', 'Maria', 'Souza', 0, '1998-07-12', 'SHPS 601 CONJUNTO F', 'DF', 'CEILÃ‚NDIA', 'Leia', '335667', '(61) 8570-7576', '(61) 8570-7576', 'maria@hotmail.com'),
('96230797968', 'Iane', 'Souza AraÃºjo', 0, '1971-07-02', 'SHPS 601 CONJUNTO D', 'DF', 'CEILÃ‚NDIA', 'Aracuia', '3432433', '(61) 3345-666', '(61) 8543-3345', 'maria@bol.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_pessoa_cpf` varchar(11) NOT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `senha` varchar(45) NOT NULL,
  `perfil_idperfil` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_pessoa_cpf`, `usuario`, `senha`, `perfil_idperfil`) VALUES
('01575631466', 'Marione', '202cb962ac59075b964b07152d234b70', 3),
('03732757498', 'LetÃ­cia', '202cb962ac59075b964b07152d234b70', 3),
('11320992692', 'Fernanda', '202cb962ac59075b964b07152d234b70', 3),
('13123608522', 'Fernando', 'e10adc3949ba59abbe56e057f20f883e', 3),
('13530359050', 'Henrique', 'e10adc3949ba59abbe56e057f20f883e', 3),
('16559357392', 'Luciano', 'e10adc3949ba59abbe56e057f20f883e', 3),
('22420511212', 'Zuleide', 'e10adc3949ba59abbe56e057f20f883e', 2),
('24304335596', 'JoÃ£o', 'e10adc3949ba59abbe56e057f20f883e', 3),
('35755563691', 'Leila', 'e10adc3949ba59abbe56e057f20f883e', 3),
('36739697302', 'LuÃ­s', 'e10adc3949ba59abbe56e057f20f883e', 2),
('38514563190', 'Mario', 'e10adc3949ba59abbe56e057f20f883e', 3),
('38525412988', 'Jesus', 'e10adc3949ba59abbe56e057f20f883e', 3),
('41205896171', 'Aparecida', 'e10adc3949ba59abbe56e057f20f883e', 3),
('41303522454', 'Mauricio', '202cb962ac59075b964b07152d234b70', 1),
('48442895868', 'Eridina', 'e10adc3949ba59abbe56e057f20f883e', 3),
('48561661828', 'Mauricio', '827ccb0eea8a706c4c34a16891f84e7b', 3),
('50248686500', 'Jonas', 'e10adc3949ba59abbe56e057f20f883e', 3),
('51257593099', 'Maria', '202cb962ac59075b964b07152d234b70', 2),
('62368575200', 'Zoe', 'e10adc3949ba59abbe56e057f20f883e', 2),
('67548728298', 'ClÃªnio', 'e10adc3949ba59abbe56e057f20f883e', 2),
('72102345009', 'Maria', '202cb962ac59075b964b07152d234b70', 3),
('74509718527', 'CristovÃ£o', 'e10adc3949ba59abbe56e057f20f883e', 3),
('77078028538', 'Ferraz', 'e10adc3949ba59abbe56e057f20f883e', 3),
('77125587100', 'Lucio', 'e10adc3949ba59abbe56e057f20f883e', 3),
('78806580256', 'FÃ¡tima', 'e10adc3949ba59abbe56e057f20f883e', 3),
('85374555987', 'Edimar', 'e10adc3949ba59abbe56e057f20f883e', 2),
('86321493856', 'Maria', 'e10adc3949ba59abbe56e057f20f883e', 3),
('96230797968', 'Iane', 'e10adc3949ba59abbe56e057f20f883e', 2),
('cpfadmin', 'admin', '202cb962ac59075b964b07152d234b70', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idperfil`);

--
-- Índices para tabela `tb_agendamento`
--
ALTER TABLE `tb_agendamento`
  ADD PRIMARY KEY (`id_agenda_semanal`,`id_pessoa_cpf`),
  ADD KEY `fk_tb_agenda_semanal_has_tb_aluno_tb_aluno1_idx` (`id_pessoa_cpf`),
  ADD KEY `fk_tb_agenda_semanal_has_tb_aluno_tb_agenda_semanal1_idx` (`id_agenda_semanal`);

--
-- Índices para tabela `tb_agenda_semanal`
--
ALTER TABLE `tb_agenda_semanal`
  ADD PRIMARY KEY (`id_agenda_semanal`);

--
-- Índices para tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD PRIMARY KEY (`id_pessoa_cpf`);

--
-- Índices para tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD PRIMARY KEY (`id_pessoa_cpf`);

--
-- Índices para tabela `tb_pessoa`
--
ALTER TABLE `tb_pessoa`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_pessoa_cpf`),
  ADD KEY `fk_usuario_perfil` (`perfil_idperfil`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idperfil` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_agenda_semanal`
--
ALTER TABLE `tb_agenda_semanal`
  MODIFY `id_agenda_semanal` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_agendamento`
--
ALTER TABLE `tb_agendamento`
  ADD CONSTRAINT `fk_tb_agenda_semanal_has_tb_aluno_tb_agenda_semanal1` FOREIGN KEY (`id_agenda_semanal`) REFERENCES `tb_agenda_semanal` (`id_agenda_semanal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_agenda_semanal_has_tb_aluno_tb_aluno1` FOREIGN KEY (`id_pessoa_cpf`) REFERENCES `tb_aluno` (`id_pessoa_cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD CONSTRAINT `fk_tb_aluno_tb_pessoa1` FOREIGN KEY (`id_pessoa_cpf`) REFERENCES `tb_pessoa` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD CONSTRAINT `fk_tb_funcionario_tb_pessoa1` FOREIGN KEY (`id_pessoa_cpf`) REFERENCES `tb_pessoa` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
