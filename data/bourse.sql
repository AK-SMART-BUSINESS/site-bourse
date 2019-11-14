-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 14 Novembre 2019 à 18:57
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bourse`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `idarticles` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` longtext,
  `image` varchar(255) DEFAULT NULL,
  `dateEdition` date DEFAULT NULL,
  `etat` enum('publié','non publié') DEFAULT 'publié',
  `panel_users_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idarticles`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`idarticles`, `titre`, `contenu`, `image`, `dateEdition`, `etat`, `panel_users_id`) VALUES
(1, 'Article 1', '<p>Mon premier article</p>\n', NULL, '2019-04-12', 'publié', 1),
(2, 'Article 2', '<p>Mon deuxi&egrave;me article</p>\n', NULL, '2019-04-12', 'non publié', 1);

-- --------------------------------------------------------

--
-- Structure de la table `article_pages`
--

CREATE TABLE IF NOT EXISTS `article_pages` (
  `idarticle_pages` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page` varchar(45) DEFAULT NULL,
  `contenu` longtext,
  `dateEdition` datetime DEFAULT NULL,
  `etat` enum('publié','non publié') DEFAULT 'publié',
  `panel_users_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idarticle_pages`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `article_pages`
--

INSERT INTO `article_pages` (`idarticle_pages`, `page`, `contenu`, `dateEdition`, `etat`, `panel_users_id`) VALUES
(1, 'mission', '<p>La Direction des Bourses du MESRS, selon le DECRET n&deg;96-615 du 9 Aout 1996 portant r&eacute;glementation des &quot;Bourses d&#39;&eacute;tudes&quot; pour l&#39;Enseignement Sup&eacute;rieur, a pour missions essentielles de&nbsp;:</p>\n\n<p>-Organiser, superviser et coordonner les op&eacute;rations d&rsquo;attribution de bourse d&rsquo;&eacute;tudes aux &eacute;tudiants en vue de poursuivre leurs &eacute;tudes en c&ocirc;te d&rsquo;ivoire et &agrave; l&rsquo;&eacute;tranger.</p>\n\n<p>Pour le bon accomplissement de cette mission, la Direction des Bourses r&eacute;alise les t&acirc;ches suivantes:</p>\n\n<p>*Pr&eacute;pare le plan annuel de l&rsquo;octroi des bourses</p>\n\n<p>*Informe les populations sur les crit&egrave;res d&rsquo;attribution des bourses d&rsquo;&eacute;tudes en</p>\n\n<p>&nbsp; C&ocirc;te d&rsquo;Ivoire et &agrave; l&rsquo;&eacute;tranger</p>\n\n<p>*Organise l&rsquo;ensemble des op&eacute;rations de gestion des bourses d&rsquo;&eacute;tudes et</p>\n\n<p>&nbsp; Secours financiers</p>\n\n<p>*Planifie les travaux de la commission nationale charg&eacute;e de l&rsquo;attribution des bourses d&rsquo;&eacute;tudes</p>\n\n<p>*D&eacute;livre les attestations de bourse aux b&eacute;n&eacute;ficiaires</p>\n\n<p>*Oriente et encadre les &eacute;tudiants ivoiriens s&eacute;lectionn&eacute;s pour poursuivre leurs &eacute;tudes &agrave; l&rsquo;&eacute;tranger&nbsp;<strong>&nbsp;</strong></p>\n\n<p>-D&eacute;livrer les attestations de non boursier pour constitution de dossiers d&rsquo;autorisation d&rsquo;enseigner dans les &eacute;tablissements encadr&eacute;s par le SAEEP (Service Autonome pour l&rsquo;Encadrement des Etablissements priv&eacute;s)<strong>&nbsp;&nbsp;</strong></p>\n\n<p>-Participer aux travaux de l&rsquo;enseignement sup&eacute;rieur tels que la commission d&rsquo;harmonisation pour l&rsquo;orientation des bacheliers, la commission d&rsquo;agr&eacute;ment d&rsquo;ouverture des &eacute;tablissements sup&eacute;rieurs priv&eacute;s et la conf&eacute;rence des &eacute;tablissements priv&eacute;s. Elle est &eacute;galement membre des jurys des examens et concours organis&eacute;s par la DOREX (Direction de l&rsquo;Orientation et des examens).</p>\n', '2019-03-27 03:12:16', 'publié', 1),
(2, 'historique', '<h3>Le passage de Lorem Ipsum standard, utilis&eacute; depuis 1500 ok</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 du &quot;De Finibus Bonorum et Malorum&quot; de Ciceron (45 av. J.-C.)</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>Traduction de H. Rackham (1914)</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 du &quot;De Finibus Bonorum et Malorum&quot; de Ciceron (45 av. J.-C.)</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>Traduction de H. Rackham (1914)</h3>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>\r\n', '2019-03-27 03:22:15', 'publié', 1),
(3, 'presentation', '<p>La Direction des Bourses du Minist&egrave;re de l&rsquo;Enseignement Sup&eacute;rieur et de la Recherche Scientifique est charg&eacute;e de&nbsp;:</p>\n\n<ul style="list-style-type:square">\n	<li>&nbsp; R&eacute;ceptionner et&nbsp; traiter les dossiers de bourses d&rsquo;&eacute;tudes en C&ocirc;te d&rsquo;Ivoire et hors C&ocirc;te d&rsquo;Ivoire</li>\n</ul>\n\n<ul style="list-style-type:square">\n	<li>&nbsp;Pr&eacute;parer les d&eacute;cisions d&rsquo;attribution des bourses d&rsquo;&eacute;tudes en C&ocirc;te d&rsquo;Ivoire et hors C&ocirc;te d&rsquo;Ivoire</li>\n</ul>\n\n<ul style="list-style-type:square">\n	<li>&nbsp;Suivre et de contr&ocirc;ler l&rsquo;ensemble des op&eacute;rations de gestion des bourses d&rsquo;&eacute;tudes</li>\n</ul>\n\n<ul style="list-style-type:square">\n	<li>&nbsp;Pr&eacute;parer les travaux de la Commission Nationale d&rsquo;Attribution de Bourses d&rsquo;Etudes.</li>\n</ul>\n\n<p>En plus de ces attributions, la Direction des Bourses&nbsp; est membre de certains organes du Minist&egrave;re de l&rsquo;Enseignement Sup&eacute;rieur et de la Recherche Scientifique dont&nbsp;:</p>\n\n<ul style="list-style-type:square">\n	<li>&nbsp; La Commission d&rsquo;Harmonisation pour l&rsquo;Orientation des Bacheliers</li>\n</ul>\n\n<ul style="list-style-type:square">\n	<li>&nbsp;La Commission d&rsquo;Agr&eacute;ment d&rsquo;Ouverture d&rsquo;Etablissement d&rsquo;Enseignement Sup&eacute;rieur Priv&eacute;</li>\n</ul>\n\n<ul style="list-style-type:square">\n	<li>&nbsp; La Conf&eacute;rence des Etablissements d&rsquo;Enseignement Sup&eacute;rieur.</li>\n</ul>\n\n<p>La Direction des Bourses&nbsp; est &eacute;galement membre des jurys des examens et concours organis&eacute;s sous la supervision de la Direction des Enseignements Sup&eacute;rieurs (DESUP).</p>\n', '2019-03-27 03:52:53', 'publié', 1),
(7, 'motdudirecteur', '<p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et emp&ecirc;che de se concentrer sur la mise en page elle-m&ecirc;me. L&#39;avantage du Lorem Ipsum sur un texte g&eacute;n&eacute;rique comme &#39;Du texte. Du texte. Du texte.&#39; est qu&#39;il poss&egrave;de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du fran&ccedil;ais standard. De nombreuses suites logicielles de mise en page ou &eacute;diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par d&eacute;faut, et une recherche pour &#39;Lorem Ipsum&#39; vous conduira vers de nombreux sites qui n&#39;en sont encore qu&#39;&agrave; leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d&#39;y rajouter de petits clins d&#39;oeil, voire des phrases embarassantes).</p>\n', '2019-03-27 05:43:11', 'publié', 1),
(8, 'annuaire', '<p>Le faux-texte est, en imprimerie, un texte de signification latine. Le seul objectif du faux-texte est de calibrer le contenu d&#39;une page par du texte, f&ucirc;t-il non &eacute;ditorial okokokok</p>\r\n', '2019-03-29 08:41:37', 'publié', 1),
(10, 'communiques', '<p><strong>DEMANDE DE BOURSES D&#39;ETUDES EN LIGNE</strong></p>\n\n<p><strong>&nbsp;(A LIRE ATTENTIVEMENT)</strong></p>\n\n<p><em><strong>La demande en ligne ne concerne que les &eacute;tudiants des universit&eacute;s publiques</strong></em></p>\n\n<p><em>- La demande en ligne ne sera valid&eacute;e qu&rsquo;apr&egrave;s le d&eacute;p&ocirc;t du dossier physique &agrave; la Direction des </em><em>Bourses, Abidjan Plateau, Immeuble Nogu&egrave;s, 1er &eacute;tage, porte 36</em></p>\n\n<p><em>-Avant de vous inscrire, soyez munis des documents suivants&nbsp;:</em></p>\n\n<ul>\n	<li>Attestation de r&eacute;ussite au baccalaur&eacute;at&nbsp;;</li>\n	<li>Carte Nationale d&rsquo;Identit&eacute; (CNI) ou Attestation d&rsquo;Identit&eacute;&nbsp; en cours de validit&eacute;;</li>\n	<li>Carte d&rsquo;&eacute;tudiant 2013-2014&nbsp;ou Certificat de Scolarit&eacute; 2013-2014;</li>\n	<li>Le bulletin annuel de la classe de terminale pour les nouveaux &eacute;tudiants (nouveaux bacheliers) et les relev&eacute;s des deux ann&eacute;es pr&eacute;c&eacute;dentes pour les anciens &eacute;tudiants.</li>\n</ul>\n\n<p><em>- Renseignez soigneusement le formulaire en caract&egrave;re MAJUSCULE en y inscrivant les informations exactes</em></p>\n\n<p>&nbsp;</p>\n\n<p><strong>MODE OPERATOIRE DES DEMANDES DE BOURSES D&rsquo;ETUDES EN LIGNE</strong></p>\n\n<p><strong>1- </strong>Cliquer sur <strong>demande de bourses en ligne</strong> sur la page d&#39;accueil, dans le menu <strong>Bourses d&#39;Etudes en C&ocirc;te d&#39;Ivoire</strong> de la colonne de l&#39;extr&ecirc;me gauche</p>\n\n<p><strong>2-</strong> Cliquer sur&nbsp;<strong>SAISIR UNE NOUVELLE DEMANDE</strong>&nbsp;sur la page affich&eacute;e</p>\n\n<p><strong>3- </strong>Choisir l&rsquo;ann&eacute;e acad&eacute;mique 2013-2014 et la session&nbsp;</p>\n\n<p><strong>4- </strong>Passer &agrave; l&rsquo;onglet <strong>&eacute;tape 1 (IDENTIFICATION DE L&rsquo;ETUDIANT)</strong> et renseigner les champs (cases)</p>\n\n<p>&nbsp;<strong>N.B : </strong></p>\n\n<p>&nbsp;<strong>*Si&nbsp;votre UFR/ECOLE ne comporte pas de&nbsp;DEPARTEMENT, FILIERE ou SPECIALITE, laisser le ou les champ(s) vide(s)</strong></p>\n\n<p>&nbsp;<strong>*NIVEAU D&#39;ETUDES signifie 1ERE ANNEE, 2EME ANNEE, ..........., 8EME ANNEE</strong></p>\n\n<p>&nbsp;<strong>*GRADE correspond au nombre d&#39;ann&eacute;es de votre niveau d&#39;&eacute;tudes apr&egrave;s le BAC</strong></p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;<strong>NB : Votre num&eacute;ro matricule est le num&eacute;ro de l&rsquo;attestation de r&eacute;ussite au baccalaur&eacute;at</strong></p>\n\n<p><strong>5-</strong> Passer &agrave; l&rsquo;onglet <strong>&eacute;tape 2 (FILIATION)</strong> et renseigner les champs</p>\n\n<p><em>&nbsp;&nbsp;&nbsp;N.B: </em></p>\n\n<p><em>*Dans le champ REVENU ANNUEL, si le parent ne dispose pas de revenu, taper le <strong>chiffre &quot;0&quot;</strong></em></p>\n\n<p><em>*Dans le champ DATE DE NAISSANCE, si le parent n&#39;a pas de date de naissance, taper la date <strong>&quot;01/01/0001&quot;</strong></em></p>\n\n<p><strong>6-</strong> Passer &agrave; l&rsquo;onglet <strong>&eacute;tape 3 (CURSUS)</strong></p>\n\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>a- </strong>Renseigner les champs du CURSUS UNIVERSITAIRE (depuis l&#39;ann&eacute;e d&#39;obtention du BAC jusqu&#39;&agrave; l&#39;ann&eacute;e en cours (2013-2014)</p>\n\n<p><em>&nbsp;N.B : </em></p>\n\n<p><em>* Si vous n&#39;&ecirc;tes pas &eacute;valu&eacute;, taper &quot;0&quot; dans les champs (Nombre d&#39;UV, UV obtenues ou moyenne) et ne pas s&eacute;lectionner de valeur (s&eacute;lectionner le bleu vide) dans le champs mention. ou </em><em>s&eacute;lectionner &agrave; priori&nbsp; n&#39;importe quelle mention (cette mention n&#39;a aucune incidence dans votre &eacute;valuation. C&#39;est tout simplement une disposition d&#39;ordre technique)</em></p>\n\n<p><em>* Dans le champ Boursier, O signifie Oui et N signifie Non</em></p>\n\n<p><em>* Dans le champ Valid&eacute;e, s&eacute;lectionner OUI si l&#39;ann&eacute;e universitaire n&#39;a pas &eacute;t&eacute; d&eacute;clar&eacute;e ann&eacute;e blanche, sinon s&eacute;lectionner NON</em></p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>b- </strong>Cliquer sur RESULTATS DE L&rsquo;ANNEE PRECEDENTE<strong> et renseigner les champs</strong></p>\n\n<p><em>N.B : EX=Excellent, TB=Tr&egrave;s Bien, B= Bien, AB=Assez Bien</em></p>\n\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> c- </strong>Descendre avec l&rsquo;ascenseur et renseigner les champs de DECISION DE LA DERNIERE BOURSE D&rsquo;ETUDE si vous aviez d&eacute;j&agrave; b&eacute;n&eacute;fici&eacute; d&rsquo;une bourse d&rsquo;&eacute;tudes (Il s&#39;agit de la derni&egrave;re bourse d&#39;&eacute;tudes)</p>\n\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> d-</strong> Renseigner les champs du RAPPORT DE SUIVI si vous &ecirc;tes &eacute;tudiant en Master 2 Recherche ou en Th&egrave;se</p>\n\n<p><strong>7-</strong> Cliquer sur <strong>ENVOYER</strong></p>\n\n<p><strong>8- </strong>Pour une modification, revenir&nbsp;&agrave; la page pr&eacute;c&eacute;dente et cliquer sur <strong>MODIFICATION D&#39;UNE DEMANDE. </strong></p>\n\n<p><strong><em>N.B :</em></strong></p>\n\n<p><em>&nbsp;La modification d&#39;une demande n&#39;est pas autoris&eacute;e pour l&#39;instant</em></p>\n\n<p><em>Le message &laquo;&nbsp;L&#39;insertion a &eacute;t&eacute; correctement&nbsp;effectu&eacute;e&nbsp;&raquo; apparaitra si la demande a &eacute;t&eacute; faite correctement et les champs obligatoires renseign&eacute;s</em></p>\n\n<p><em>Le message &laquo;&quot;valeur requise&quot;ou &quot;s&eacute;lectionner un &eacute;l&eacute;ment&raquo; sera affich&eacute;e en rouge dans les champs obligatoires qui n&rsquo;auront pas &eacute;t&eacute; renseign&eacute;s</em>&nbsp;</p>\n', '2019-03-30 04:22:45', 'publié', 1),
(11, 'ci_condition_eligibilite', '<p><strong>Bourses d&rsquo;&eacute;tudes en C&ocirc;te d&rsquo;Ivoire</strong></p>\n\n<p>Pour la premi&egrave;re ann&eacute;e d&rsquo;&eacute;tudes dans l&rsquo;Enseignement Sup&eacute;rieur, ne sont autoris&eacute;s &agrave; pr&eacute;senter un dossier de demande de bourse d&rsquo;&eacute;tudes que&nbsp;:</p>\n\n<p>&nbsp;</p>\n\n<p>- Les bacheliers de l&rsquo;ann&eacute;e en cours admis par voie de concours dans les Grandes Ecoles Publiques&nbsp;;</p>\n\n<p>- Les bacheliers de l&rsquo;ann&eacute;e en cours ayant obtenu au moins la mention &laquo;&nbsp;ASSEZ BIEN&nbsp;&raquo; au baccalaur&eacute;at et inscrits dans un &eacute;tablissement d&rsquo;Enseignement Sup&eacute;rieur.</p>\n\n<p>&nbsp;</p>\n\n<p>A partir de la deuxi&egrave;me ann&eacute;e d&rsquo;Enseignement Sup&eacute;rieur, ne sont autoris&eacute;s &agrave; pr&eacute;senter un dossier de demande de bourse d&rsquo;&eacute;tudes que les &eacute;l&egrave;ves et les &eacute;tudiants admis en classe sup&eacute;rieure, sous r&eacute;serve de ne pas avoir redoubl&eacute; l&rsquo;ann&eacute;e pr&eacute;c&eacute;dente, et qui auront obtenu l&rsquo;ensemble des cr&eacute;dits requis du niveau d&rsquo;&eacute;tudes, ainsi que les &eacute;tudiants&nbsp; ayant r&eacute;ussi un concours d&rsquo;entr&eacute;e dans une Grande Ecole Publique.</p>\n\n<p>Les r&eacute;sultats de l&rsquo;ann&eacute;e sont pris en compte pour le classement du postulant.</p>\n\n<p>&nbsp;</p>\n\n<p>Les &eacute;tudiants sollicitant une bourse pour des &eacute;tudes doctorales doivent s&rsquo;engager &agrave; servir leur pays pendant dix (10) ans au moins.</p>\n\n<p>&nbsp;</p>\n\n<p>Pour une demande de bourse d&rsquo;&eacute;tudes, le dossier comprend&nbsp;:</p>\n\n<p>-Un formulaire de demande de bourse d&rsquo;&eacute;tudes d&eacute;livr&eacute; par le service en charge des bourses d&rsquo;&eacute;tudes de l&rsquo;Enseignement Sup&eacute;rieur&nbsp;;</p>\n\n<p>-Une photocopie de la carte nationale d&rsquo;identit&eacute;&nbsp;;</p>\n\n<p>-Le dernier bulletin de salaire des parents ou une attestation sur la valeur de la production de l&rsquo;exploitation (pour les planteurs) ou une attestation sur la valeur des contributions pay&eacute;es (pour les commer&ccedil;ants, les transporteurs et les professions lib&eacute;rales)&nbsp;;&nbsp;</p>\n\n<p>-Une photocopie certifi&eacute;e conforme des notes du baccalaur&eacute;at pour les nouveaux bacheliers&nbsp;;</p>\n\n<p>-Une photocopie des r&eacute;sultats scolaires ou universitaires de l&rsquo;ann&eacute;e pr&eacute;c&eacute;dente pour les &eacute;tudiants ou &eacute;l&egrave;ves inscrits dans un &eacute;tablissement d&rsquo;Enseignement Sup&eacute;rieur&nbsp;;</p>\n\n<p>-Une attestation d&rsquo;inscription dans un Etablissement d&rsquo;Enseignement Sup&eacute;rieur&nbsp;ou une photocopie de la carte d&rsquo;&eacute;tudiant ou un certificat de scolarit&eacute; de l&rsquo;ann&eacute;e en cours;</p>\n\n<p>-Un rapport de suivi des travaux de recherche pour les doctorants&nbsp;;</p>\n\n<p>-Une fiche d&rsquo;engagement d&eacute;cennale d&eacute;livr&eacute;e par le service en charge des bourses d&rsquo;&eacute;tudes d&ucirc;ment sign&eacute;e et l&eacute;galis&eacute;e, pour les doctorants</p>\n', '2019-03-30 04:24:26', 'publié', 1);

-- --------------------------------------------------------

--
-- Structure de la table `flashinfos`
--

CREATE TABLE IF NOT EXISTS `flashinfos` (
  `idflashinfo` int(11) NOT NULL AUTO_INCREMENT,
  `info` varchar(255) DEFAULT NULL,
  `etat` enum('actif','inactif') DEFAULT 'actif',
  `panel_users_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idflashinfo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `panel_users`
--

CREATE TABLE IF NOT EXISTS `panel_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomcomplet` varchar(145) DEFAULT NULL,
  `email` varchar(130) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `groupe` enum('administrateur','modérateur') NOT NULL DEFAULT 'administrateur',
  `etat` enum('on','off') DEFAULT 'on',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `panel_users`
--

INSERT INTO `panel_users` (`id`, `nomcomplet`, `email`, `pwd`, `groupe`, `etat`) VALUES
(1, 'Toto tata', 'toto@mail.com', 'azerty', 'administrateur', 'on');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
