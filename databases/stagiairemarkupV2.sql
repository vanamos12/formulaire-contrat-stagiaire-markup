-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 30 déc. 2019 à 15:28
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
  `etapesuperviseur` int(11) NOT NULL,
  `datecreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contratstagiaires`
--

INSERT INTO `contratstagiaires` (`idContrat`, `idStagiaire`, `nomcontrat`, `statut`, `etape`, `etapesuperviseur`, `datecreation`) VALUES
(1, 4, 'fritz - 1', 'Complete', 0, 0, '2019-12-18 04:45:44'),
(2, 4, 'fritz - 1', 'En attente stagiaire', 1, 4, '2019-12-18 04:49:36'),
(3, 4, 'fritz - ', 'En attente stagiaire', 1, 4, '2019-12-18 14:15:53'),
(4, 4, 'fritz - 4', 'En attente stagiaire', 1, 4, '2019-12-18 14:24:39'),
(5, 4, 'fritz - 5', 'En attente stagiaire', 1, 4, '2019-12-27 14:28:06');

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
(3, 'stagiaire', 'partiefinalestagiaire.php', 'fin', 0),
(4, 'superviseur', 'partieaidentificationentreprise.php', 'partiecmandattachesstaiaires.php', 5),
(5, 'superviseur', 'partiecmandattachesstaiaires.php', 'partiefinalesuperviseur.php', 6),
(6, 'superviseur', 'partiefinalesuperviseur.php', 'fin', 0);

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

--
-- Déchargement des données de la table `partieasuperviseur`
--

INSERT INTO `partieasuperviseur` (`idPartieA`, `idContrat`, `nomresponsable`, `titreresponsable`, `adresseresponsable`, `villeresponsable`, `telephoneresponsable`, `emailresponsable`, `nomsuperviseur`, `titresuperviseur`, `telephonesuperviseur`, `emailsuperviseur`) VALUES
(1, 1, 'Foloum Fidele', 'Directeur GÃ©nÃ©ral Markup', 'Gare Bessengue ', 'Douala', '657678789', 'foloum@gmail.com', 'Noubissi Cyrille', 'Directeur Technique', '6543456789', 'cyrille@groupe-markup.com');

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
-- Structure de la table `partiecsuperviseur`
--

CREATE TABLE `partiecsuperviseur` (
  `idPartieC` int(11) NOT NULL,
  `idContrat` int(11) NOT NULL,
  `mandattachesstagiaire` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `partiecsuperviseur`
--

INSERT INTO `partiecsuperviseur` (`idPartieC`, `idContrat`, `mandattachesstagiaire`) VALUES
(1, 1, 'Le stagiaire aura pour fonctions :\r\n1- Faire le prototype des sites web avec Mobirise\r\n2- Concevoir des applications web de base avec HTML , CSS, Javascript et PHP\r\n3- Ã‰tablir la documentation de cette application\r\n4- Former les utilisateurs sur les applications conÃ§ues');

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
-- Structure de la table `signatures`
--

CREATE TABLE `signatures` (
  `idSignature` int(11) NOT NULL,
  `idContrat` int(11) NOT NULL,
  `poste` varchar(1000) NOT NULL,
  `imageURL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `signatures`
--

INSERT INTO `signatures` (`idSignature`, `idContrat`, `poste`, `imageURL`) VALUES
(3, 1, 'stagiaire', 'data:image/png;base64,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'),
(4, 1, 'superviseur', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPoAAADICAYAAADBXvybAAAX60lEQVR4Xu1dCcx2R1V+KAhUxQVBWQRZuoAgCiIFRNRERdCKxogaUba6UHZBkJiARmIEWWRXoOAGEnBhKdQ1QiKbQAVllaasFahWRWiFANU8MlPOf3Pf973LmTtn3nkm+dJ+/3fvzJnnzHNn5syZc64EFSEgBI4egSsdfQ/VQSEgBCCiaxAIgQ4QENE7ULK6KAREdI0BIdABAiJ6B0pWF4WAiK4xIAQ6QEBE70DJ6qIQENE1BoRABwiI6B0oWV0UAiK6xoAQ6AABEb0DJauLQkBE1xgQAh0gIKJ3oGR1UQiI6PXHwK8C4I+KECiGgIheDNpJFV8G4OT05HcDeM2kt/SQEJiJgIg+EzDHx28E4P2mvnMAnOVYv6oSAlcgIKLXHQz/a5r/NwA3BnBpXZHU+jEiIKLX0+q1AVw8aP6eAF5YTyS1fKwIiOj1NDtculOSdwP4xnoiqeVjRUBEr6fZewN4QWr+8wCuDIDGudMAXFRPLLV8jAiI6PW0SpKT7K8HcEcjxpkAzq0nllo+RgRE9Hpa/SiA6wB4OgCSm0t5lp8H8Jx6YqnlY0RARN9eq98F4LEA+F+W0wG8CMC3iujbK6OXFkX07TX9d4bk9wDwzvSTJZHjzPY6OfoWRfRtVZz35WyVJH8pgJsAeB+AkwBcDuBUABduK5ZaO3YERPTtNGyt7LcF8NbU9PA8/WsB0HlGRQi4ISCiu0G5t6LrAnhl2oc/AsCTzNPcm7/F/G4/AttIp1aOHgERfRsV83YaDXC/B+A+I01aV1jpZBuddNWKBlV5dVsPuNsDeNOgSc3o5XXQfQsievkhkGdzno3zjHxYvj7dYrsKgM+liy0fKS+WWugJARG9rLZvBeDtAD4F4Bp7mrJLdxnjyuqky9pF9LJq5/3y5+7Zm7P1HwPwEiPGLQC8q6xYqr03BET0chrnLbRXJddWno1fsKMpe+z2gbR0LyeVau4SARG9nNrPBvBMAL92ICbcEwE8PInB83Mu3VWEgCsCIrornCdURm+3UwDcBcBf7WnGusTuMtiVk1I1d4GAiF5GzdnVdde5uW31v42h7tDsX0Za1Xr0CIjo/iqmcY2BHhnRlcdpvI66q9D99UMArp4euBuA8/xFUo29IyCi+46ArwLw9wBoOc+XVva1wKuqXLrncr0DHwZfaVVbNwiI6L6q5lL9XgBeDuCHJ1T9mwAelZ6TxX0CYHpkGQIi+jLcxt4isf88/YFhm0ncQ+V3AfxcekgW90No6e+LERDRF0N3wov0Z/9HAFy6PxXAQydW+0kAX56efRaAB0x8T48JgVkIiOiz4Bp9mOTmTM799ieSg8x/TahWhrgJIOkRHwRE9PU45ksrrOlhAH57YpV3SBFg8+MyxE0ETo/NR0BEn4+ZfYOzOGdzzuqvNbHgptRq9+cyxE1BTM8sRkBEXwzd/5Ob+/IcpvnWAN42ozp7Y41n7gwKqSIEiiAgoi+H9WUA7p5en+vRNgw2QSMcjXEqQqAIAiL6MljtUdoHzaw+tTYeqXHpnovuoE9FTs8tQkBEnw/bt6QlO9+klZ2k59J7TrEXWbRsn4Ocnl2EgIg+DzZ7lMY351jZbUuXALhm+gelYJqnAz29AAERfR5oPDp7SHplqpvrsAWdn8/DXE87ICCiTwfRXkDhkp2z+5IyTNig8/MlKOqdWQiI6NPgGh6lrcmPZi3uOj+fhr+eWomAiD4NQEaI+d706NyjtGELw6O1mwF47zQx9JQQWIaAiH4YNxuldem+3LZiEzrw36fedDssqZ4QAjsQENH3Dw1L8o8BuDmAKRdW9tWqhA2i4+YIiOi7IR/GW58SMWaKApU9dQpKesYVARF9HM5SJGdrWrq7DmFVNgUBEX0cpQ8D4BKbxWsmzy0N48QpTfKUkapnViEgop8IH4/R/hoAycdSyj312NIk8+OV8Vo1IPVyGQRE9BNxzfHY+a9vNYT3RP9aABgfLpc1Z/Kectm6mE6KkWx5FEjffiahoMy0L/C/HDe8zMMw1ezP16WX/wPApQCefyA7TSm5Ve8OBET0LwIzXFKXPPZ6PQBGmGGJpIMzADAybZ6h1xIn4kdsbZ+afD/SIKsNIDOa0gjH4r0vH/aNsyJnQmZp+craHU/tPw3Ag5xl+TiA39Hs7ozqgupE9C+AZr3VSu3LrXrekZbG7wRwywV6837llQB+8ECljFnPEwO67d40faDOB/Cf6YPF1+nlx5XQ7UxdvKl3fwAv9RZa9U1HQET/Alb2fvg9AbxwOoSLnny/IQ2JUbNwFudsbgvtE38C4MUAPrMge4y1deR617oO18So+ba9iM5IqPxpsdDSzlmJhT7nnJVKl0hEtycA7Dfzxp3lAIANfpmr42rpCcov54DuzCo8iD5chrZGehvW6ZsB/NNMDJc8nlcQW2wTdslHPZ0M4JHpgRI36WjzyD9WDs3uS0bNinc8iU4xOFi4j4uy95wCTSYd96k/DuB/pry08pnaRM8fZ9uNUgbI66asso8dYFbzI7dSfe297kH0swE8M3Wd56gMkdQK0W8P4A1J9vsAoMFpi1J76U6noO8xHf2DlByyZN95ZMexkk822BYvCD0OwJNKNqy6fc5wTwfwngGYJZaBJfRlj5RuAOAjJRoZqTMfr/17ckLZqNkrmiGxfzr99q50ps+jvtKFs/ujR47xtJQvjLzHjE4RmRP8242sJAyJE7kwuSE/UNcH8DwAP7uhsLWP16xVvIavPWd2xt/7koQ5xwuNgK0adDccOsua8iL6U0YyiNKFkrNF1PIYAJxJWLisZEqlrUrtpbu1iJfamx/CkmQn7nYpX0uWQ7I2/3cvop8J4BUDNL4jzfQRQbJpjimfFw5T+1rbGGdndDqykGA1Cl1u32ga/myKsvvsGsIcc5ueA5wz4p0NWLRi/1BQ8O4NgIOdpcb+sDbRbQZYOsTQaeejlXRFWbhtYjTcXGice0Y6xakk1nE160n0J6eEBhkhGnd+IqhzhPWEq7HFqG2MY643EikXrsjOrTi0efT2K2bPTlF4csOPsFxnHRTjSXQ7S2bR3jzwe3YQeXUV9jiw1jFgbWMc/dq54solQraYhwN44Egeu99IH4HViu+5Ak+iD695Eleek351IIB5xv+n5hpmrWuUF5u73UywWKNY19c3AaBPQe0ydtZOmbiUf0Rt4Vpu35Pow3jlGZfnJM+oCDjdEcDrkiA1B3eECDNDX/RaH72xcfH7AH5m8Ac6M3HWp1OWykwEPIl+tXRd8aoALgdwkpGFBMseaDNFdH2cl1ZOSzU+GMDTXWufXlnt4zVKejcArzIi1zBK7kNsGKCTz25xs3C6Fht60pPo7PaFyYI7hOBZAGgAqlmspXmrW2q7+lvb6p7lsisL6o6nJhfVVJJp+xoAvh8AA4Lk8i8A6ImpMhMBb6JzWZX35PSWu1OSh1bm22zoYjoGgx3UW91S26WOCDM6ZbMfP/7+owD+bOYYKv04s+PYY9oannyl+1i8fm+iWzL9IgAeueXCZTKXyzWK3Y/Si4+y1SwMrHhDAB8C8A01BQFgdcaAG1weRyo8ov1jI5Cs8Au0U5Lo/PI+DMBPJbkY3IFW762LNcCx7VMBXLC1EIP2oszoFIt+/vcz8nmPCQ+o8ykF66p1JOrRj2p1eCv1LSn+GjvEYyN6XP0tAF4gYanhbkl/e+ZMY4licOK1Xp7nR7BdDE9LfgDAq6uNyPGG7YpM99gXKMeb6HmmsjHRh9bTLZfwXE38UcKFN9Uy4RdA5fpKjjhb48M31hHrKfhuAIzrHqnYKECUq2Qo7kj9dpOlFNGH99EZK/xRRupfBvB4t17srsjGT98ysMShrkWxumc5uS/n2TWPRGl1z+moDvVjq78PvS5F9JnIexOd/u08FvkkgK8wstDjif7MNjEAl64lbynZJem/AvimQM4W2QAWaRlqfQxq+P/vG7p3NduJz6UZfasgITMpFfNxb6Lv8+Gmsjiz3ypB8SkAvEzBwV6iRN7X5S0Ovb240ohQbNhnHrvlu/oRZBtmoK19CScCJrNk8Cb6IWsyL088FQC96Fi4xKfxp0SACntsRGcdGr6ilLx0j2IcJC7fB+AvDUDeY2Mt9h8zOd4i4ba2X5u8763MQ0Rnp7Ywzt03hSbKIPIEwCY23ATcPY1EXLpTXPtxjOT7TtnsiY6O2GaO4FJE58WR7BU3FIl7eM4cOckg/063Rro3ehVrRY60D879i0p0G1PgiQB+yUshDvXkI0lWVSrTrYOYMavwJnq2ck+JAmtji9OBhY4sXsXOTBGXeRH36MSex2qcLVn2fay99DSnnqHlPZrBcE5fNn/Wm+i7rO5jHfvJlGkzW+c5wBgQgR+JNWUYVCHigKCXIFNB1Qr3vA9f+wFmeipa4yMUWd5XaMGb6DkxwJzl8ofNuS1nX8Yc502qpSX6sp39yjhFXILaiy6RVkPXBkBX2FxkeZ/BEG+i28QAUxMiDI1za7zFeHOOHwnOlixRwwdbnLx1MEP9o4/aSEFzPthr2z30vt1W8NkI4a8OyRzm796DLLt2soOMEPKHE3s6DEO1dIDZ5d2lKQc5b4pFKxanaNZtYpUvkUyxtWyFLT/i3EZwZmeJiNtWWMxux5vodnae6wwynNmXuKzam1g0DNrsMbPBKfjCGpwKinVF1Va+KIQaXr7RjD5jJHgT3XowfRzAdWbIwkftEQp//5oZbqvDPdzdR5JKzBSn6OP5ZICrnmF8tKINT6jcrrCi7NPpf8/Tiqsk+RkK67wJfdEjhTKUMO3w1RO6XwbgsplI2zxub0tRT6YY5yKEcZ7TVW4tvhTAJQCuNefFjZ49H8CtAUQI1MEuD7d30ZygNlLLsma8Z3RKkc+I+f9LlMGZ+e0AmHmTZWoUWbvvjTIL7dNKtrxH9fLKvu9rjKPLRuX4W7rBtgLNEkT3cKNkdBomf8hlivXc+kK3EFcsf5giGbzsUOLlI35wiSvj/dVK2ZRlGt5Jj+gfsYKKZV+NSnT22hqEDgWXpDstjW8sn07x2CL5to9p0Z73l9CDx8jhVVCmlY5g+KL35E1Tp6KugjwwL1JHiQHmMaPnztq6ePZ8rx0o2MAWjERLI1700gLRGZ2HUXqYy5zx/2oVGnlJbto0WGrLUwuHxe1GJ/pvmVQ8nF2YinnMRdbePY/obTamoGx0jLp0p8x5uex9F2HugB2GpY6wwpjbh6rPlyA686TTPZFl7RksDXOMYZZn6F1n6y1GCc3XLiN/mKyle60ulw707wTAD3lO3LBvZbe0jaN/rwTR7ezqYRSze/WxG1VDR4pWlnVT7u5HGICMPU93Zsb8e0IFgYbxBpc4UlUQO1aTJYj+AgA8CmHxCOI3dIRh1g6b8pceeHbv3oojRdQ76cMRmsNlE3ObMWWLkfwLI3EFvWMXbNGP6m2UILo1Mnkt96wTzdC11UYeiZameZ+CWyE6V0gPSbH9qM+tyvDcnMd79Kngfl1lJgKtEP2RJjy0zfgy9JZqKY820wwx3dCLAfBuftTCvOQ0irKUGC+233Rz5VEpvRxtxODPA2AqpsdEBSm6XCUUV+LYiPnJrLX9HABnAbDbBGLtYRPYSmfMz347AP8A4IytGl3Qjo2/VxJfzuC0AeTbaVZU7csXKM6+UoLodpntWb91cc2W6n8GcMvUIeZfZ561Vko2WkZIy7QPM2vs9CY66+YRHn/GCvX8DAC0w6isQMCTiFmMUjPVXQD8hekrfbBpkc+lBf92q6r84Zp7nXeFuhe9aonOZIzPX1TLF19iAAkGDuWHblfhfpzHaMzoo+KAQAmi56umUy+jzOmGDTs1fI+zOWf1Vop1AimhB08csuHw/inO35K6vy3tvfOJzFgd3J4xN99zU7afJe3onREESgyw7DBTYkk69JDKXWrl7NyqIFuVI3vGZXmzz/tUH3PePGSSDvaR6bD2zd5sgxGFmPuNJyqeYb9F+oRACaLnr3+JpfQpAN430F6Ua5RzB5U9MaABihFho5Y5R2y7PsZjfeOq79cBKI9aYc17E50BFPKtMY/93Fj3SRAaaHhN8dEAXgSA3lutFUv06FZlJnLIXnH7DHJD56YxndC7kSG/ZGDbcMR6E906OXhbaDeEZZOmIoZr2tVxa5A7lN/eBh6x9b0shQr7m03QVSMnIOBN9JYMTBGGQiZFC9uPlycX2EM32RiJl4FC6KX4CQAkOEOCqVREwJvodGShgwWjw9AZRGU/Akwdzbh6F5kkFlExsxFetFqLqqUdcnkT/bUA7pzSIHMPrbIfgexFuDSO/Zb42uX7g9Mx2Jbtq60VCHgTvRVvrxWQub7qfdPPVbiRyhjCmwE/6c9ww9KNqX4/BLyJ3tKe0w/F5TVZonvd9FsuzeE3nw2AV0dbWIEc7k1HT5QienS3zigqtvveEn4H3v20xtYWPkze/W+2Pm+i5z1njSAFLSrB7ntbmCVF9BZHWYH7xXnpLqJPHxA20u2SzDbTW/J5Msv7AAB0c1ZpAAHN6PWVZB1Moh9bteTkU1+zgSTwJjpTFNMaS5dUBotQOYyANci1EMa4lRBYh5Hv6Alvor8j+aBPveXUEdQ7u2r3vS3s0/MKpMQ1ZI2HQgh4E72VEMaF4FxULQMx8MPI0sKV1RYSTyxSxDG/JKLH0G5eCVGamwF4bwyxRqWwcfu9x0/gbrctmreiWnLpjKS5xwNgpFuW6OfpurgUaeRMlMWb6Fq6TwR+8Ji1ZvO2148sq2aTt2xkHAbmvHSTVtXIKgS8ic6gEww+wWgpY2F7Vwl75C9na3b0m2wR8rEd+VDw75430WV1X66jjF0LlveS4cKWI6g3dyLgTXQt3ZcPtpbcS18NgAEmdF11ub43fdOb6DLGLVefzRob/VLQgwA8LYWGeuDyLuvNrRDwJnrOvGnzo23Vl9bbuREArohYLkm2jqh9smf/usUWVUtGLk+iXx8AXWCvDIBJ8egCS8OSyjQEbATVTydX4hxRd1oN2z6Vz9NzeqxtW1drsxDwJPow1C8jkUQeqLOA2uBhO6Ozuej42Su2DAbJAJcqQRHwJPpwoN54kAE1KAShxOIK6HpJoug32SjmZQBOTkk1TguFpIQ5AQFPotsvPBtpYaBGGg6nA3iPEagF/GR8jTSC9sjiSXQ2Y4MoeNfdCKSLxWxxRdRacMvFymn9RU8yWo8p4iJr7LzRwaSETDJ4GwDnp1zvn5lXxeZPtxQ0Y3NwIjXoSfQWZ6RIuqAsZyRHlPMAMM989MJjwGsmIWWTCawtT6LfJBllTgJwOYBTAVwYuO8SbR0CPGVhFtSrpmqinxKs623jb3sSXcdrjQ+GmeJL3zMBq/m4J9G1dK+pye3bHuqbKbjoGakSEAFPout4LaCCC4pkja8thMAqCEX8qkX0+DqKKuHZ6VIL5ZMbbFQtJbk8ia6le3BlO4uXI83kamV1dwbYszpPosvq7qmZ+HXxPjrvpbN8FgAvNeluQ1C9eRJdVtigSi4k1nAFdyaAcwu1pWpXIuBJdHnGrVRGg69fbGIDRo9e2yC8fiJ7El17dD+9tFLTSwAwMg4LL+TcvBXBe5PTk+jETpda+hpB1vLOnt8BwBv7gqCN3noSXXv0NnTuKeVQ50yjzHTKKsEQ8CS6lu7BlLuROM8DcL/UFn3fb7BRu2pmBgIi+gyw9OgoAtYj8hwAZwmneAh4El0usPH0u5VEPFM/BQCv116wVaNqZzoCIvp0rPSkEGgWAU+i6xy92WEgwY8dAU+iEysFCzz2EaP+NYmAN9EJAmd2JgpUEQJCIAgCJYgepGsSQwgIgYyAiK6xIAQ6QEBE70DJ6qIQENE1BoRABwiI6B0oWV0UAiK6xoAQ6AABEb0DJauLQkBE1xgQAh0gIKJ3oGR1UQiI6BoDQqADBET0DpSsLgoBEV1jQAh0gICI3oGS1UUhIKJrDAiBDhAQ0TtQsrooBER0jQEh0AECInoHSlYXhYCIrjEgBDpAQETvQMnqohAQ0TUGhEAHCIjoHShZXRQCIrrGgBDoAAERvQMlq4tCQETXGBACHSAgonegZHVRCIjoGgNCoAMERPQOlKwuCgERXWNACHSAgIjegZLVRSEgomsMCIEOEBDRO1CyuigERHSNASHQAQIiegdKVheFgIiuMSAEOkBARO9AyeqiEBDRNQaEQAcIiOgdKFldFAL/B3JoKQUGiGfcAAAAAElFTkSuQmCC');

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
  MODIFY `idContrat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `etapes`
--
ALTER TABLE `etapes`
  MODIFY `idEtape` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `partieasuperviseur`
--
ALTER TABLE `partieasuperviseur`
  MODIFY `idPartieA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `partiebstagiaire`
--
ALTER TABLE `partiebstagiaire`
  MODIFY `idPartieB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `partiecsuperviseur`
--
ALTER TABLE `partiecsuperviseur`
  MODIFY `idPartieC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `partiedstagiaire`
--
ALTER TABLE `partiedstagiaire`
  MODIFY `idPartieB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `signatures`
--
ALTER TABLE `signatures`
  MODIFY `idSignature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
