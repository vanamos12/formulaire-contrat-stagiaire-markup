-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 06 jan. 2020 à 16:19
-- Version du serveur :  10.1.34-MariaDB
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stagiairemarkup`
--

-- --------------------------------------------------------

--
-- Structure de la table `contratstagiaires`
--

CREATE TABLE `contratstagiaires` (
  `idContrat` int(11) NOT NULL,
  `idStagiaire` int(11) NOT NULL,
  `nomcontrat` varchar(1000) NOT NULL,
  `numerodossier` int(11) NOT NULL,
  `statut` varchar(1000) NOT NULL,
  `etape` int(11) NOT NULL,
  `etapesuperviseur` int(11) NOT NULL,
  `datecreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contratstagiaires`
--

INSERT INTO `contratstagiaires` (`idContrat`, `idStagiaire`, `nomcontrat`, `numerodossier`, `statut`, `etape`, `etapesuperviseur`, `datecreation`) VALUES
(13, 4, 'fritz - 13', 162030, 'En attente stagiaire', 1, 4, '2020-01-06 14:40:31'),
(14, 4, 'fritz - 14', 137540, 'En attente stagiaire', 7, 4, '2020-01-06 15:18:07');

-- --------------------------------------------------------

--
-- Structure de la table `etapes`
--

CREATE TABLE `etapes` (
  `idEtape` int(11) NOT NULL,
  `categorie` varchar(1000) NOT NULL,
  `actualpage` varchar(1000) NOT NULL,
  `nextpage` varchar(1000) NOT NULL,
  `idNextEtape` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etapes`
--

INSERT INTO `etapes` (`idEtape`, `categorie`, `actualpage`, `nextpage`, `idNextEtape`) VALUES
(1, 'stagiaire', 'partiebidentificationstagiaire.php', 'partiedcoordonneesstagiaire.php', 2),
(2, 'stagiaire', 'partiedcoordonneesstagiaire.php', 'documents.php', 8),
(3, 'stagiaire', 'partiefinalestagiaire.php', 'fin', 0),
(4, 'superviseur', 'partieaidentificationentreprise.php', 'partiecmandattachesstaiaires.php', 5),
(5, 'superviseur', 'partiecmandattachesstaiaires.php', 'partiefinalesuperviseur.php', 6),
(6, 'superviseur', 'partiefinalesuperviseur.php', 'fin', 0),
(7, 'stagiaire', 'debutformulairestagiaire.php', 'partiebidentificationstagiaire.php', 1),
(8, 'stagiaire', 'documents.php', 'partiefinalestagiaire.php', 3);

-- --------------------------------------------------------

--
-- Structure de la table `partieasuperviseur`
--

CREATE TABLE `partieasuperviseur` (
  `idPartieA` int(11) NOT NULL,
  `idContrat` int(11) NOT NULL,
  `nomresponsable` varchar(1000) NOT NULL,
  `titreresponsable` varchar(1000) NOT NULL,
  `adresseresponsable` varchar(1000) NOT NULL,
  `villeresponsable` varchar(1000) NOT NULL,
  `telephoneresponsable` varchar(1000) NOT NULL,
  `emailresponsable` varchar(1000) NOT NULL,
  `nomsuperviseur` varchar(1000) NOT NULL,
  `titresuperviseur` varchar(1000) NOT NULL,
  `telephonesuperviseur` varchar(1000) NOT NULL,
  `emailsuperviseur` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `partiebstagiaire`
--

CREATE TABLE `partiebstagiaire` (
  `idPartieB` int(11) NOT NULL,
  `idContrat` int(11) NOT NULL,
  `nomstagiaire` varchar(1000) NOT NULL,
  `prenomstagiaire` varchar(1000) NOT NULL,
  `adressestagiaire` varchar(1000) NOT NULL,
  `villestagiaire` varchar(1000) NOT NULL,
  `codepostalstagiaire` varchar(1000) NOT NULL,
  `telephonestagiaire` varchar(1000) NOT NULL,
  `emailstagiaire` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `partiecsuperviseur`
--

CREATE TABLE `partiecsuperviseur` (
  `idPartieC` int(11) NOT NULL,
  `idContrat` int(11) NOT NULL,
  `mandattachesstagiaire` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `partiedstagiaire`
--

CREATE TABLE `partiedstagiaire` (
  `idPartieB` int(11) NOT NULL,
  `idContrat` int(11) NOT NULL,
  `dureetotalestage` varchar(1000) NOT NULL,
  `datedebutstage` varchar(1000) NOT NULL,
  `datefinstage` varchar(1000) NOT NULL,
  `lieustage` varchar(1000) NOT NULL,
  `horairessemainestage` varchar(2000) NOT NULL,
  `horairesjourneestage` varchar(2000) NOT NULL,
  `periodesinterruptionstage` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `signatures`
--

CREATE TABLE `signatures` (
  `idSignature` int(11) NOT NULL,
  `idContrat` int(11) NOT NULL,
  `poste` varchar(1000) NOT NULL,
  `imageURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typestagiaire`
--

CREATE TABLE `typestagiaire` (
  `idTypeStagiaire` int(11) NOT NULL,
  `idContrat` int(11) NOT NULL,
  `typeFormation` varchar(1000) NOT NULL,
  `formation` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typestagiaire`
--

INSERT INTO `typestagiaire` (`idTypeStagiaire`, `idContrat`, `typeFormation`, `formation`) VALUES
(2, 13, 'Stage AcadÃ©mique', 'DÃ©veloppement Web');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL,
  `nom` varchar(1000) NOT NULL,
  `email` char(255) NOT NULL,
  `telephone` varchar(1000) NOT NULL,
  `motdepasse` varchar(1000) NOT NULL,
  `poste` varchar(1000) NOT NULL,
  `valide` varchar(1000) NOT NULL DEFAULT 'non',
  `dateinscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `nom`, `email`, `telephone`, `motdepasse`, `poste`, `valide`, `dateinscription`) VALUES
(1, 'Foloum Fidele', 'foloum@groupemarkup.com', '', '31befa9a223854194e88bce0cbd13c4a', 'superadministrateur', 'oui', '2019-12-16 17:17:45'),
(2, 'hermann', 'pokatchoneng@gmail.com', '', '6af83acbd510d97a0efb1319885f161f', 'superviseur', 'oui', '2019-12-16 17:17:45'),
(3, 'virginie', 'virginie@gmail.com', '', '907f3a3084544b93965fa0222b0d56aa', 'stagiaire', 'oui', '2019-12-16 17:17:45'),
(4, 'fritz', 'fritz@gmail.com', '', '8c63feed8b89ea9a6496ed92ed818ac2', 'stagiaire', 'oui', '2019-12-16 17:17:45'),
(5, 'Rolande', 'rolande@live.fr', '', '2424b7b37e66bcf2a79b95dc0a66a8e0', 'stagiaire', 'oui', '2019-12-17 14:36:25'),
(6, 'nanou', 'nanou@live.fr', '', '4137d2b114b4e61e46d854238458e487', 'superviseur', 'oui', '2019-12-17 14:37:23'),
(7, 'foloum', 'foloum19@gmail.com', '', '31befa9a223854194e88bce0cbd13c4a', 'stagiaire', 'oui', '2020-01-02 14:19:11'),
(8, 'khadija', 'khadijaabbo@gmail.com', '', 'fad710a2abefe88d7d4d45fe98d64ef6', 'stagiaire', 'oui', '2020-01-02 14:31:56'),
(9, 'hermann', 'pokatchoneng@live.fr', '672250280', '18fb3af36a5d2be6218272db80b75662', 'stagiaire', 'oui', '2020-01-03 15:07:55');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contratstagiaires`
--
ALTER TABLE `contratstagiaires`
  ADD PRIMARY KEY (`idContrat`);

--
-- Index pour la table `etapes`
--
ALTER TABLE `etapes`
  ADD PRIMARY KEY (`idEtape`);

--
-- Index pour la table `partieasuperviseur`
--
ALTER TABLE `partieasuperviseur`
  ADD PRIMARY KEY (`idPartieA`);

--
-- Index pour la table `partiebstagiaire`
--
ALTER TABLE `partiebstagiaire`
  ADD PRIMARY KEY (`idPartieB`);

--
-- Index pour la table `partiecsuperviseur`
--
ALTER TABLE `partiecsuperviseur`
  ADD PRIMARY KEY (`idPartieC`);

--
-- Index pour la table `partiedstagiaire`
--
ALTER TABLE `partiedstagiaire`
  ADD PRIMARY KEY (`idPartieB`);

--
-- Index pour la table `signatures`
--
ALTER TABLE `signatures`
  ADD PRIMARY KEY (`idSignature`);

--
-- Index pour la table `typestagiaire`
--
ALTER TABLE `typestagiaire`
  ADD PRIMARY KEY (`idTypeStagiaire`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contratstagiaires`
--
ALTER TABLE `contratstagiaires`
  MODIFY `idContrat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `etapes`
--
ALTER TABLE `etapes`
  MODIFY `idEtape` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `partieasuperviseur`
--
ALTER TABLE `partieasuperviseur`
  MODIFY `idPartieA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `partiebstagiaire`
--
ALTER TABLE `partiebstagiaire`
  MODIFY `idPartieB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `partiecsuperviseur`
--
ALTER TABLE `partiecsuperviseur`
  MODIFY `idPartieC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `partiedstagiaire`
--
ALTER TABLE `partiedstagiaire`
  MODIFY `idPartieB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `signatures`
--
ALTER TABLE `signatures`
  MODIFY `idSignature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `typestagiaire`
--
ALTER TABLE `typestagiaire`
  MODIFY `idTypeStagiaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
