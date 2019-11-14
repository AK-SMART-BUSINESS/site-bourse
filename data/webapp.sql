-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 26 Mars 2019 à 11:13
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `webapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles_test`
--

CREATE TABLE IF NOT EXISTS `articles_test` (
  `idarticle` int(11) NOT NULL AUTO_INCREMENT,
  `panel_users_id` int(10) unsigned NOT NULL,
  `atitle` varchar(255) NOT NULL,
  `acontent` text NOT NULL,
  `adate` date NOT NULL,
  `statut` enum('publié','non publié') NOT NULL DEFAULT 'publié',
  PRIMARY KEY (`idarticle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `articles_test`
--

INSERT INTO `articles_test` (`idarticle`, `panel_users_id`, `atitle`, `acontent`, `adate`, `statut`) VALUES
(1, 1, 'Mon premier article teste', 'Lorem ipsum dolor sit amet, adhuc aeque inermis sit an. Facer volumus adolescens te pri, ad eos sapientem accusamus salutatus. Eos no mazim tollit officiis, tale disputationi te duo. Ut rebum aperiri platonem usu. Quis munere mea te.\r\n\r\nEi mel discere argumentum, ipsum epicuri verterem duo cu, fabulas constituto est no. Tollit graecis nec cu, at vel semper scripta reformidans, ex unum simul eum. Mel latine inciderint eu, usu autem omnesque an. Ullum phaedrum ne pri. Vix in scaevola ullamcorper. Duo movet convenire incorrupte at, eam homero contentiones ea.\r\n\r\nVim no eleifend disputando delicatissimi, no habeo postulant pro, at sea clita inermis tincidunt. Dicta inermis vim an. Et vix dicant consetetur omittantur, eos odio accusam persequeris an. Eu ancillae forensibus eam, erant contentiones sed ei. Eum ad urbanitas complectitur, dicunt facilisi an pro. Eu nisl cibo indoctum vix, at nam atqui ubique. Nullam labore te pri.\r\n\r\nAd mea nihil labore offendit, ei eum semper prodesset, persius oporteat voluptaria nec no. Posse tritani intellegat no quo, legendos gubergren intellegam mel ad, prima feugiat inermis in sed. Libris vocibus efficiendi ius no. Iudico oblique epicurei qui eu. Cum altera meliore facilis no, eam vide expetenda eu, te vim probo ancillae officiis.\r\n\r\nEi admodum elaboraret definitiones sea, nam sonet facilisi no. Sit falli latine aliquando ex, usu ea quando meliore abhorreant. Fugit nostrum suscipiantur id vim, vel nisl atomorum rationibus an, te mel quas iusto. Ea quo odio novum dolorum. Ea ius solum dicat viris, has an accusamus repudiandae, elit feugait nec et. Novum timeam invidunt eu pri, sit no populo menandri, cum te quem singulis ullamcorper. Sea in vituperata deterruisset, vix integre definitiones eu, ut his laoreet appellantur.', '2019-03-25', 'publié');

-- --------------------------------------------------------

--
-- Structure de la table `panel_users`
--

CREATE TABLE IF NOT EXISTS `panel_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupe` enum('administrateur','modérateur') NOT NULL DEFAULT 'administrateur',
  `fullname` varchar(150) NOT NULL,
  `email` varchar(130) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `statut` enum('on','off') NOT NULL DEFAULT 'on',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `panel_users`
--

INSERT INTO `panel_users` (`id`, `groupe`, `fullname`, `email`, `pwd`, `statut`) VALUES
(1, 'administrateur', 'Toto Tata', 'toto@mail.com', 'azerty', 'on');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
