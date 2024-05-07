CREATE TABLE `achatfournisseur` (
  `idAchat` int UNSIGNED NOT NULL,
  `lienFac` varchar(255)  NOT NULL,
  `dateInsertion` datetime NOT NULL,
  `montantFac` decimal(8,2) NOT NULL,
  `montantCargo` decimal(8,2) NOT NULL,
  `totalKg` decimal(8,2) NOT NULL,
  `montantGlobal` decimal(8,2) NOT NULL,
  `idFour` int UNSIGNED NOT NULL,
  `idCargo` int UNSIGNED NOT NULL
) ;
CREATE TABLE `categorie` (
  `idCat` int UNSIGNED NOT NULL,
  `nomCat` varchar(255) NOT NULL
) ;
CREATE TABLE `clientcarte` (
  `matr` int UNSIGNED NOT NULL,
  `nom` varchar(255)  NOT NULL,
  `sexe` tinyint NOT NULL,
  `dateNaiss` varchar(255)  NOT NULL,
  `idVille` int UNSIGNED NOT NULL,
  `mobile` varchar(255)  NOT NULL,
  `creation` datetime NOT NULL,
  `point` int UNSIGNED NOT NULL,
  `montantTontine` decimal(8,2) NOT NULL,
  `user` varchar(255)  NOT NULL,
  `typeChat` smallint NOT NULL,
  `pwd` varchar(255)  NOT NULL COMMENT 'Il s''agit ici du mot de passe du client',
  `chatID` smallint NOT NULL COMMENT '1:whatsapp, 2:telegram;0: sms'
) ;
CREATE TABLE `commande` (
  `idCommande` int UNSIGNED NOT NULL,
  `dateCom` timestamp NOT NULL DEFAULT '2024-03-22 04:35:33',
  `montant` decimal(8,2) NOT NULL,
  `nomClient` varchar(255)  NOT NULL,
  `mobile` varchar(255)  NOT NULL,
  `adresse` text  NOT NULL,
  `commentaire` text ,
  `livrer` tinyint NOT NULL,
  `avance` decimal(8,2) NOT NULL DEFAULT '0.00',
  `remise` decimal(8,2) NOT NULL DEFAULT '0.00',
  `type` smallint NOT NULL COMMENT '0:annulee,1:active,2:traitee,3:en attente',
  `idVille` int NOT NULL
) ;
CREATE TABLE `expedition` (
  `idExp` int UNSIGNED NOT NULL,
  `idVille` int NOT NULL,
  `transporteur` varchar(255)  NOT NULL,
  `prix` varchar(255)  NOT NULL,
  `mobile1` varchar(255)  DEFAULT NULL,
  `mobile2` varchar(255)  DEFAULT NULL
) ;
CREATE TABLE `facture` (
  `idFac` int UNSIGNED NOT NULL,
  `dateFac` datetime NOT NULL,
  `remise` decimal(8,2) NOT NULL,
  `montant` decimal(8,2) NOT NULL,
  `tel` varchar(255)  NOT NULL,
  `typeFac` smallint NOT NULL,
  `idCaissiere` int UNSIGNED NOT NULL,
  `capital` decimal(8,2) NOT NULL COMMENT 'il s''agit de la valeur d''achat du produit par les vendeurs',
  `tva` decimal(8,2) NOT NULL DEFAULT '0.00',
  `codePromo` varchar(255) NOT NULL
) ;
CREATE TABLE `fournisseur` (
  `idFour` int UNSIGNED NOT NULL,
  `nom` varchar(255)  NOT NULL,
  `adresse` varchar(255)  NOT NULL,
  `ville` varchar(255)  NOT NULL,
  `pays` varchar(255)  NOT NULL,
  `mobile1` varchar(255)  NOT NULL,
  `mobile2` varchar(255)  NOT NULL,
  `dateCreation` datetime NOT NULL,
  `type` tinyint NOT NULL
) ;
CREATE TABLE `gestionnaire` (
  `idGest` int UNSIGNED NOT NULL,
  `nomGest` varchar(255)  NOT NULL,
  `typeGest` int NOT NULL,
  `login` varchar(255)  NOT NULL,
  `pwd` varchar(255)  NOT NULL,
  `actif` tinyint NOT NULL,
  `mobile` varchar(255)  NOT NULL
) ;
CREATE TABLE `gestionstock` (
  `idStock` int UNSIGNED NOT NULL,
  `qte` int UNSIGNED NOT NULL,
  `dateStock` datetime NOT NULL,
  `operation` tinyint NOT NULL,
  `idGest` int UNSIGNED NOT NULL,
  `codePro` int UNSIGNED NOT NULL
) ;
CREATE TABLE `influenceur` (
  `idInf` int UNSIGNED NOT NULL,
  `nom` varchar(255)  NOT NULL,
  `mobile` varchar(255)  NOT NULL,
  `codePromo` varchar(255)  NOT NULL,
  `actif` tinyint NOT NULL,
  `montant` decimal(8,2) NOT NULL,
  `pwd` varchar(255)  NOT NULL
) ;
CREATE TABLE `lignecarte` (
  `id` bigint UNSIGNED NOT NULL,
  `idFac` int UNSIGNED NOT NULL,
  `idCarte` int UNSIGNED NOT NULL,
  `point` int NOT NULL,
  `dateOpera` datetime NOT NULL,
  `montantFac` decimal(8,2) NOT NULL
) ;
CREATE TABLE `lignecommande` (
  `idLignCom` int UNSIGNED NOT NULL,
  `idCommande` int UNSIGNED NOT NULL,
  `codePro` int UNSIGNED NOT NULL,
  `quantite` int NOT NULL DEFAULT '0',
  `taille` varchar(255)  DEFAULT NULL,
  `couleur` varchar(255)  DEFAULT NULL,
  `disponible` tinyint NOT NULL
) ;
CREATE TABLE `lignefacture` (
  `idLFac` int UNSIGNED NOT NULL,
  `codePro` int UNSIGNED NOT NULL,
  `idFac` int UNSIGNED NOT NULL,
  `prix` decimal(8,2) NOT NULL,
  `qte` smallint NOT NULL
) ;
CREATE TABLE `messagerie` (
  `idmsg` int UNSIGNED NOT NULL,
  `mobile` varchar(255)  NOT NULL,
  `wsms` text  NOT NULL,
  `dateEnvoie` datetime NOT NULL,
  `type` int NOT NULL,
  `service` int NOT NULL
) ;
CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255)  NOT NULL,
  `batch` int NOT NULL
) ;
CREATE TABLE `paieinfluenceur` (
  `idPaiement` int UNSIGNED NOT NULL,
  `datePaie` datetime NOT NULL,
  `montant` decimal(8,2) NOT NULL,
  `idInf` int UNSIGNED NOT NULL,
  `validite` tinyint NOT NULL,
  `commentaire` text  NOT NULL
) ;
CREATE TABLE `photo` (
  `idPhoto` int UNSIGNED NOT NULL,
  `lienPhoto` varchar(255)  NOT NULL,
  `codePro` int UNSIGNED NOT NULL
) ;
CREATE TABLE `produit` (
  `codePro` int UNSIGNED NOT NULL,
  `idCategorie` int UNSIGNED NOT NULL,
  `nomPro` varchar(255)  NOT NULL,
  `prix` decimal(8,0) NOT NULL,
  `qte` int UNSIGNED NOT NULL,
  `description` text  NOT NULL,
  `codeArrivage` varchar(255)  NOT NULL,
  `actif` tinyint NOT NULL,
  `dateInsertion` date NOT NULL,
  `prixAchat` decimal(8,0) NOT NULL,
  `pourcentage` decimal(2,2) NOT NULL,
  `promo` tinyint NOT NULL,
  `size1` int NOT NULL,
  `size2` int NOT NULL,
  `typeSize` int NOT NULL
) ;
CREATE TABLE `tontine` (
  `idTontine` int UNSIGNED NOT NULL,
  `dateCotisation` datetime NOT NULL,
  `montant` decimal(8,2) NOT NULL,
  `commentaire` text ,
  `idGest` int UNSIGNED NOT NULL,
  `validite` tinyint NOT NULL,
  `idCarte` int UNSIGNED NOT NULL,
  `action` tinyint NOT NULL
) ;
CREATE TABLE `ville` (
  `idVille` int NOT NULL,
  `libelle` varchar(255)  NOT NULL
) ;
ALTER TABLE `achatfournisseur`
  ADD PRIMARY KEY (`idAchat`),
  ADD KEY `achatfournisseur_idfour_foreign` (`idFour`);
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCat`);
ALTER TABLE `clientcarte`
  ADD PRIMARY KEY (`matr`);
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `commande_idville_foreign` (`idVille`);
ALTER TABLE `expedition`
  ADD PRIMARY KEY (`idExp`),
  ADD KEY `expedition_idville_foreign` (`idVille`);
ALTER TABLE `facture`
  ADD PRIMARY KEY (`idFac`),
  ADD KEY `facture_idcaissiere_foreign` (`idCaissiere`);
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`idFour`);
ALTER TABLE `gestionnaire`
  ADD PRIMARY KEY (`idGest`);
ALTER TABLE `gestionstock`
  ADD PRIMARY KEY (`idStock`),
  ADD KEY `gestionstock_idgest_foreign` (`idGest`),
  ADD KEY `gestionstock_codepro_foreign` (`codePro`);
ALTER TABLE `influenceur`
  ADD PRIMARY KEY (`idInf`);
ALTER TABLE `lignecarte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lignecarte_idcarte_foreign` (`idCarte`),
  ADD KEY `lignecarte_idfac_foreign` (`idFac`);
ALTER TABLE `lignecommande`
  ADD PRIMARY KEY (`idLignCom`),
  ADD KEY `lignecommande_idcommande_foreign` (`idCommande`),
  ADD KEY `lignecommande_codepro_foreign` (`codePro`);
ALTER TABLE `lignefacture`
  ADD PRIMARY KEY (`idLFac`),
  ADD KEY `lignefacture_idfac_foreign` (`idFac`),
  ADD KEY `lignefacture_codepro_foreign` (`codePro`);
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`idmsg`);
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `paieinfluenceur`
  ADD PRIMARY KEY (`idPaiement`),
  ADD KEY `paieinfluenceur_idinf_foreign` (`idInf`);
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idPhoto`),
  ADD KEY `photo_codepro_foreign` (`codePro`);
ALTER TABLE `produit`
  ADD PRIMARY KEY (`codePro`),
  ADD KEY `produit_idcategorie_foreign` (`idCategorie`);
ALTER TABLE `tontine`
  ADD PRIMARY KEY (`idTontine`),
  ADD KEY `tontine_idgest_foreign` (`idGest`),
  ADD KEY `tontine_idcarte_foreign` (`idCarte`);
ALTER TABLE `ville`
  ADD PRIMARY KEY (`idVille`);
ALTER TABLE `achatfournisseur`
  MODIFY `idAchat` int UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `categorie`
  MODIFY `idCat` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
ALTER TABLE `clientcarte`
  MODIFY `matr` int UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `commande`
  MODIFY `idCommande` int UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `expedition`
  MODIFY `idExp` int UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `facture`
  MODIFY `idFac` int UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `fournisseur`
  MODIFY `idFour` int UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `gestionnaire`
  MODIFY `idGest` int UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `gestionstock`
  MODIFY `idStock` int UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `influenceur`
  MODIFY `idInf` int UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `lignecarte`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `lignecommande`
  MODIFY `idLignCom` int UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `lignefacture`
  MODIFY `idLFac` int UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `messagerie`
  MODIFY `idmsg` int UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;
ALTER TABLE `paieinfluenceur`
  MODIFY `idPaiement` int UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `photo`
  MODIFY `idPhoto` int UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `tontine`
  MODIFY `idTontine` int UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `ville`
  MODIFY `idVille` int NOT NULL AUTO_INCREMENT;
ALTER TABLE `achatfournisseur`
  ADD CONSTRAINT `achatfournisseur_idfour_foreign` FOREIGN KEY (`idFour`) REFERENCES `fournisseur` (`idFour`);
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_idville_foreign` FOREIGN KEY (`idVille`) REFERENCES `ville` (`idVille`);
ALTER TABLE `expedition`
  ADD CONSTRAINT `expedition_idville_foreign` FOREIGN KEY (`idVille`) REFERENCES `ville` (`idVille`);
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_idcaissiere_foreign` FOREIGN KEY (`idCaissiere`) REFERENCES `gestionnaire` (`idGest`);
ALTER TABLE `gestionstock`
  ADD CONSTRAINT `gestionstock_codepro_foreign` FOREIGN KEY (`codePro`) REFERENCES `produit` (`codePro`),
  ADD CONSTRAINT `gestionstock_idgest_foreign` FOREIGN KEY (`idGest`) REFERENCES `gestionnaire` (`idGest`);
ALTER TABLE `lignecarte`
  ADD CONSTRAINT `lignecarte_idcarte_foreign` FOREIGN KEY (`idCarte`) REFERENCES `clientcarte` (`matr`),
  ADD CONSTRAINT `lignecarte_idfac_foreign` FOREIGN KEY (`idFac`) REFERENCES `facture` (`idFac`);
ALTER TABLE `lignecommande`
  ADD CONSTRAINT `lignecommande_codepro_foreign` FOREIGN KEY (`codePro`) REFERENCES `produit` (`codePro`),
  ADD CONSTRAINT `lignecommande_idcommande_foreign` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`);
ALTER TABLE `lignefacture`
  ADD CONSTRAINT `lignefacture_codepro_foreign` FOREIGN KEY (`codePro`) REFERENCES `produit` (`codePro`),
  ADD CONSTRAINT `lignefacture_idfac_foreign` FOREIGN KEY (`idFac`) REFERENCES `facture` (`idFac`);
ALTER TABLE `paieinfluenceur`
  ADD CONSTRAINT `paieinfluenceur_idinf_foreign` FOREIGN KEY (`idInf`) REFERENCES `influenceur` (`idInf`);
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_codepro_foreign` FOREIGN KEY (`codePro`) REFERENCES `produit` (`codePro`);
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_idcategorie_foreign` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCat`);
ALTER TABLE `tontine`
  ADD CONSTRAINT `tontine_idcarte_foreign` FOREIGN KEY (`idCarte`) REFERENCES `clientcarte` (`matr`),
  ADD CONSTRAINT `tontine_idgest_foreign` FOREIGN KEY (`idGest`) REFERENCES `gestionnaire` (`idGest`);
COMMIT;
