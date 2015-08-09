SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `cod` int(11) NOT NULL,
  `user` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `geral` tinyint(1) NOT NULL DEFAULT '0',
  `senha` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `dia` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cod` int(11) NOT NULL,
  `inicio` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fim` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `local` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
  `cod` int(11) NOT NULL,
  `cod2` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `codDisciplina` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `optativa` tinyint(1) NOT NULL DEFAULT '0',
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `perfil` tinyint(1) NOT NULL,
  `nCreditoTeorico` int(3) NOT NULL,
  `objetivo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ementa` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nCreditopratico` int(3) NOT NULL,
  `codNucleo` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL,
  `texto` text COLLATE utf8_unicode_ci NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nucleo`
--

CREATE TABLE IF NOT EXISTS `nucleo` (
  `cod` int(11) NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ofertahorario`
--

CREATE TABLE IF NOT EXISTS `ofertahorario` (
  `codHorario` int(11) NOT NULL,
  `codOferta` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ofertamateria`
--

CREATE TABLE IF NOT EXISTS `ofertamateria` (
  `cod` int(11) NOT NULL,
  `codProf` int(11) NOT NULL,
  `codMat` int(11) NOT NULL,
  `turma` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ano` int(10) NOT NULL,
  `semestre` tinyint(1) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pagina`
--

CREATE TABLE IF NOT EXISTS `pagina` (
  `cod` int(11) NOT NULL,
  `pagina` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paginamateria`
--

CREATE TABLE IF NOT EXISTS `paginamateria` (
  `codPag` int(11) NOT NULL,
  `codMat` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paginicial`
--

CREATE TABLE IF NOT EXISTS `paginicial` (
  `texto` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prerequisito`
--

CREATE TABLE IF NOT EXISTS `prerequisito` (
  `codMatPos` int(11) NOT NULL,
  `codMatPre` int(11) NOT NULL,
  `obrigatorio` tinyint(1) NOT NULL DEFAULT '1',
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `cod` int(11) NOT NULL,
  `pagPessoal` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `areaAtuacao` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `professoradm`
--

CREATE TABLE IF NOT EXISTS `professoradm` (
  `codAdm` int(11) NOT NULL,
  `codProf` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`cod`), ADD KEY `codNucleo` (`codNucleo`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nucleo`
--
ALTER TABLE `nucleo`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `ofertahorario`
--
ALTER TABLE `ofertahorario`
  ADD KEY `codOferta` (`codOferta`), ADD KEY `codHorario` (`codHorario`);

--
-- Indexes for table `ofertamateria`
--
ALTER TABLE `ofertamateria`
  ADD PRIMARY KEY (`cod`), ADD KEY `codProf` (`codProf`), ADD KEY `codMat` (`codMat`);

--
-- Indexes for table `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `paginamateria`
--
ALTER TABLE `paginamateria`
  ADD KEY `codPag` (`codPag`), ADD KEY `codMat` (`codMat`);

--
-- Indexes for table `prerequisito`
--
ALTER TABLE `prerequisito`
  ADD KEY `codMatPos` (`codMatPos`), ADD KEY `codMatPre` (`codMatPre`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `professoradm`
--
ALTER TABLE `professoradm`
  ADD KEY `codAdm` (`codAdm`), ADD KEY `codProf` (`codProf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `horario`
--
ALTER TABLE `horario`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `materia`
--
ALTER TABLE `materia`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nucleo`
--
ALTER TABLE `nucleo`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ofertamateria`
--
ALTER TABLE `ofertamateria`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `pagina`
--
ALTER TABLE `pagina`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
