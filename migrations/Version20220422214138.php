<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220422214138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE affectation_formateur (id_affectation INT AUTO_INCREMENT NOT NULL, formation_id INT DEFAULT NULL, formateur_id INT DEFAULT NULL, reponse INT DEFAULT NULL, INDEX fk_formation1 (formation_id), INDEX fk_reponse (reponse), INDEX fk_formateur (formateur_id), PRIMARY KEY(id_affectation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (idArticle BIGINT AUTO_INCREMENT NOT NULL, titre VARCHAR(250) NOT NULL, contenu VARCHAR(500) NOT NULL, description VARCHAR(250) NOT NULL, nbrLike INT NOT NULL, idUser INT DEFAULT NULL, INDEX idUser (idUser), PRIMARY KEY(idArticle)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis (id_avis INT AUTO_INCREMENT NOT NULL, id_user INT DEFAULT NULL, note INT NOT NULL, INDEX fk_user (id_user), PRIMARY KEY(id_avis)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE billets (id_billet INT AUTO_INCREMENT NOT NULL, id_event INT DEFAULT NULL, nbr_billet INT NOT NULL, prix DOUBLE PRECISION NOT NULL, date_achat DATE NOT NULL, INDEX fk_billet_evenement (id_event), PRIMARY KEY(id_billet)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (idcateg INT AUTO_INCREMENT NOT NULL, nomcateg VARCHAR(50) NOT NULL, PRIMARY KEY(idcateg)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (idcom INT AUTO_INCREMENT NOT NULL, idp INT DEFAULT NULL, quantite INT NOT NULL, datecom DATE NOT NULL, INDEX idp (idp), PRIMARY KEY(idcom)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id_commentaire INT AUTO_INCREMENT NOT NULL, id_participant INT DEFAULT NULL, id_formation INT DEFAULT NULL, contenu VARCHAR(50) NOT NULL, INDEX fk_part (id_participant), INDEX fk_form (id_formation), PRIMARY KEY(id_commentaire)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competition (id_competition INT AUTO_INCREMENT NOT NULL, nb_equipe INT NOT NULL, date VARCHAR(50) NOT NULL, adresse VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id_competition)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (id_equipe INT AUTO_INCREMENT NOT NULL, id_responsable INT DEFAULT NULL, nom_equipe VARCHAR(50) NOT NULL, INDEX fk_Responsable_eq (id_responsable), PRIMARY KEY(id_equipe)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id_event INT AUTO_INCREMENT NOT NULL, id_formation INT DEFAULT NULL, id_compet INT DEFAULT NULL, id_inter INT DEFAULT NULL, nom_event VARCHAR(30) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, typeE VARCHAR(50) NOT NULL, lieu VARCHAR(100) NOT NULL, prixU DOUBLE PRECISION NOT NULL, INDEX fk_comp (id_compet), INDEX fk_intervenantss (id_inter), INDEX fk_form_event (id_formation), PRIMARY KEY(id_event)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id_formation INT AUTO_INCREMENT NOT NULL, nom_formation VARCHAR(30) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, dispositif VARCHAR(50) NOT NULL, programme LONGTEXT NOT NULL, PRIMARY KEY(id_formation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (idf INT AUTO_INCREMENT NOT NULL, idp INT DEFAULT NULL, nomf VARCHAR(50) NOT NULL, prenomf VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, telf INT NOT NULL, adresse VARCHAR(50) NOT NULL, INDEX idp (idp), UNIQUE INDEX telf (telf, adresse), PRIMARY KEY(idf)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervenant (id_inter INT AUTO_INCREMENT NOT NULL, image_In VARCHAR(100) NOT NULL, nom VARCHAR(30) NOT NULL, prenom VARCHAR(30) NOT NULL, email VARCHAR(50) NOT NULL, telephone VARCHAR(8) NOT NULL, id_typeint VARCHAR(50) NOT NULL, PRIMARY KEY(id_inter)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invitation (id_invitation INT AUTO_INCREMENT NOT NULL, id_joueur INT DEFAULT NULL, id_eq INT DEFAULT NULL, etat VARCHAR(50) NOT NULL, INDEX fk_joueur (id_joueur), INDEX fk_equipe (id_eq), PRIMARY KEY(id_invitation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE journe (id_journe INT AUTO_INCREMENT NOT NULL, id_competition INT DEFAULT NULL, numJourne INT NOT NULL, date_journe VARCHAR(255) NOT NULL, INDEX fk_idcj (id_competition), PRIMARY KEY(id_journe)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participation (id_participation INT AUTO_INCREMENT NOT NULL, id_participant INT DEFAULT NULL, formation_id INT DEFAULT NULL, date_participation DATE DEFAULT \'CURRENT_TIMESTAMP\' NOT NULL, INDEX fk_formation (formation_id), INDEX fk_participant (id_participant), PRIMARY KEY(id_participation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (idp INT AUTO_INCREMENT NOT NULL, idcateg INT DEFAULT NULL, nomp VARCHAR(40) NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX idcateg (idcateg), PRIMARY KEY(idp)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE raison (idRaison INT AUTO_INCREMENT NOT NULL, raisontxt VARCHAR(100) NOT NULL, INDEX raisontxt (raisontxt), PRIMARY KEY(idRaison)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (idr INT AUTO_INCREMENT NOT NULL, id INT DEFAULT NULL, contenu TEXT NOT NULL, daterec VARCHAR(100) NOT NULL, etat VARCHAR(50) NOT NULL, idRaison INT DEFAULT NULL, INDEX idRaison (idRaison), INDEX id (id), PRIMARY KEY(idr)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse (id_reponse INT AUTO_INCREMENT NOT NULL, reponse VARCHAR(30) NOT NULL, PRIMARY KEY(id_reponse)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, adresse VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, email VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, num_tel INT NOT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', username VARCHAR(255) NOT NULL, genre VARCHAR(30) DEFAULT NULL, id_eq INT DEFAULT NULL, activation_token VARCHAR(50) DEFAULT NULL, reset_token VARCHAR(60) DEFAULT NULL, disable_token VARCHAR(65) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE affectation_formateur ADD CONSTRAINT FK_52FD03F85200282E FOREIGN KEY (formation_id) REFERENCES formation (id_formation)');
        $this->addSql('ALTER TABLE affectation_formateur ADD CONSTRAINT FK_52FD03F8155D8F51 FOREIGN KEY (formateur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE affectation_formateur ADD CONSTRAINT FK_52FD03F85FB6DEC7 FOREIGN KEY (reponse) REFERENCES reponse (id_reponse)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66FE6E88D7 FOREIGN KEY (idUser) REFERENCES user (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF06B3CA4B FOREIGN KEY (id_user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE billets ADD CONSTRAINT FK_4FCF9B68D52B4B97 FOREIGN KEY (id_event) REFERENCES evenement (id_event)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DE9D3F622 FOREIGN KEY (idp) REFERENCES produit (idp)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCCF8DA6E6 FOREIGN KEY (id_participant) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCC0759D98 FOREIGN KEY (id_formation) REFERENCES formation (id_formation)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA154A40C0F0 FOREIGN KEY (id_responsable) REFERENCES user (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EC0759D98 FOREIGN KEY (id_formation) REFERENCES formation (id_formation)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681ED0A8E46F FOREIGN KEY (id_compet) REFERENCES competition (id_competition)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E92056C5F FOREIGN KEY (id_inter) REFERENCES intervenant (id_inter)');
        $this->addSql('ALTER TABLE fournisseur ADD CONSTRAINT FK_369ECA32E9D3F622 FOREIGN KEY (idp) REFERENCES produit (idp)');
        $this->addSql('ALTER TABLE invitation ADD CONSTRAINT FK_F11D61A2DB461C28 FOREIGN KEY (id_joueur) REFERENCES user (id)');
        $this->addSql('ALTER TABLE invitation ADD CONSTRAINT FK_F11D61A2BE2C35B0 FOREIGN KEY (id_eq) REFERENCES equipe (id_equipe)');
        $this->addSql('ALTER TABLE journe ADD CONSTRAINT FK_CEFD526DAD18E146 FOREIGN KEY (id_competition) REFERENCES competition (id_competition)');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24FCF8DA6E6 FOREIGN KEY (id_participant) REFERENCES user (id)');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24F5200282E FOREIGN KEY (formation_id) REFERENCES formation (id_formation)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27D58BAD6A FOREIGN KEY (idcateg) REFERENCES categorie (idcateg)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404BF396750 FOREIGN KEY (id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404689DAEB9 FOREIGN KEY (idRaison) REFERENCES raison (idRaison)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27D58BAD6A');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681ED0A8E46F');
        $this->addSql('ALTER TABLE journe DROP FOREIGN KEY FK_CEFD526DAD18E146');
        $this->addSql('ALTER TABLE invitation DROP FOREIGN KEY FK_F11D61A2BE2C35B0');
        $this->addSql('ALTER TABLE billets DROP FOREIGN KEY FK_4FCF9B68D52B4B97');
        $this->addSql('ALTER TABLE affectation_formateur DROP FOREIGN KEY FK_52FD03F85200282E');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCC0759D98');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EC0759D98');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24F5200282E');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E92056C5F');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DE9D3F622');
        $this->addSql('ALTER TABLE fournisseur DROP FOREIGN KEY FK_369ECA32E9D3F622');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404689DAEB9');
        $this->addSql('ALTER TABLE affectation_formateur DROP FOREIGN KEY FK_52FD03F85FB6DEC7');
        $this->addSql('ALTER TABLE affectation_formateur DROP FOREIGN KEY FK_52FD03F8155D8F51');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66FE6E88D7');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF06B3CA4B');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCCF8DA6E6');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA154A40C0F0');
        $this->addSql('ALTER TABLE invitation DROP FOREIGN KEY FK_F11D61A2DB461C28');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24FCF8DA6E6');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404BF396750');
        $this->addSql('DROP TABLE affectation_formateur');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE billets');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE competition');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE intervenant');
        $this->addSql('DROP TABLE invitation');
        $this->addSql('DROP TABLE journe');
        $this->addSql('DROP TABLE participation');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE raison');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE user');
    }
}
