-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 20 déc. 2019 à 14:52
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
  `statut` varchar(1000) NOT NULL,
  `etape` int(11) NOT NULL,
  `datecreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contratstagiaires`
--

INSERT INTO `contratstagiaires` (`idContrat`, `idStagiaire`, `nomcontrat`, `statut`, `etape`, `datecreation`) VALUES
(1, 4, 'fritz - 1', 'En attente stagiaire', 3, '2019-12-18 04:45:44'),
(2, 4, 'fritz - 1', 'En attente stagiaire', 1, '2019-12-18 04:49:36'),
(3, 4, 'fritz - ', 'En attente stagiaire', 1, '2019-12-18 14:15:53'),
(4, 4, 'fritz - 4', 'En attente stagiaire', 1, '2019-12-18 14:24:39');

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
(2, 'stagiaire', 'partiedcoordonneesstagiaire.php', 'partiefinalestagiaire.php', 3),
(3, 'stagiaire', 'partiefinalestagiaire.php', 'fin', 0);

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

--
-- Déchargement des données de la table `partiebstagiaire`
--

INSERT INTO `partiebstagiaire` (`idPartieB`, `idContrat`, `nomstagiaire`, `prenomstagiaire`, `adressestagiaire`, `villestagiaire`, `codepostalstagiaire`, `telephonestagiaire`, `emailstagiaire`) VALUES
(3, 1, 'fritz', 'fritz', 'paris, france', 'paris', 'G1V907', '0656752739', 'fritz@gmail.com'),
(4, 1, 'fritz', 'fritz', 'paris, france', 'paris', 'G1V907', '0656752739', 'fritz@gmail.com');

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

--
-- Déchargement des données de la table `partiedstagiaire`
--

INSERT INTO `partiedstagiaire` (`idPartieB`, `idContrat`, `dureetotalestage`, `datedebutstage`, `datefinstage`, `lieustage`, `horairessemainestage`, `horairesjourneestage`, `periodesinterruptionstage`) VALUES
(1, 1, '03 mois', '12-12-2019', '13-03-2019', 'Douala', 'Lundi au vendredi', 'De 08 h Ã  18 H', 'Examen Ã  l\'Ã©cole le 21-01-2019');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL,
  `nom` varchar(1000) NOT NULL,
  `email` char(255) NOT NULL,
  `motdepasse` varchar(1000) NOT NULL,
  `poste` varchar(1000) NOT NULL,
  `valide` varchar(1000) NOT NULL DEFAULT 'non',
  `dateinscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `nom`, `email`, `motdepasse`, `poste`, `valide`, `dateinscription`) VALUES
(1, 'Foloum Fidele', 'foloum@groupemarkup.com', '31befa9a223854194e88bce0cbd13c4a', 'superadministrateur', 'oui', '2019-12-16 17:17:45'),
(2, 'hermann', 'pokatchoneng@gmail.com', '6af83acbd510d97a0efb1319885f161f', 'superviseur', 'oui', '2019-12-16 17:17:45'),
(3, 'virginie', 'virginie@gmail.com', '907f3a3084544b93965fa0222b0d56aa', 'stagiaire', 'oui', '2019-12-16 17:17:45'),
(4, 'fritz', 'fritz@gmail.com', '8c63feed8b89ea9a6496ed92ed818ac2', 'stagiaire', 'oui', '2019-12-16 17:17:45'),
(5, 'Rolande', 'rolande@live.fr', '2424b7b37e66bcf2a79b95dc0a66a8e0', 'stagiaire', 'oui', '2019-12-17 14:36:25'),
(6, 'nanou', 'nanou@live.fr', '4137d2b114b4e61e46d854238458e487', 'superviseur', 'non', '2019-12-17 14:37:23');

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
-- Index pour la table `partiebstagiaire`
--
ALTER TABLE `partiebstagiaire`
  ADD PRIMARY KEY (`idPartieB`);

--
-- Index pour la table `partiedstagiaire`
--
ALTER TABLE `partiedstagiaire`
  ADD PRIMARY KEY (`idPartieB`);

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
  MODIFY `idContrat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `etapes`
--
ALTER TABLE `etapes`
  MODIFY `idEtape` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `partiebstagiaire`
--
ALTER TABLE `partiebstagiaire`
  MODIFY `idPartieB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `partiedstagiaire`
--
ALTER TABLE `partiedstagiaire`
  MODIFY `idPartieB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
