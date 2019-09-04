<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190904132319 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE boutique (id INT AUTO_INCREMENT NOT NULL, siret VARCHAR(50) NOT NULL, nom_boutique VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, livraison VARCHAR(255) NOT NULL, paiement VARCHAR(255) NOT NULL, ville VARCHAR(50) NOT NULL, code_postal INT NOT NULL, adresse VARCHAR(255) NOT NULL, departement INT NOT NULL, region VARCHAR(255) NOT NULL, telephone VARCHAR(25) NOT NULL, photo VARCHAR(255) DEFAULT NULL, userId INT DEFAULT NULL, UNIQUE INDEX UNIQ_A1223C5464B64DCC (userId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, fruit VARCHAR(20) NOT NULL, legume VARCHAR(20) NOT NULL, viande VARCHAR(20) NOT NULL, produit_laitier VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, etat VARCHAR(255) NOT NULL, date DATETIME NOT NULL, montant DOUBLE PRECISION NOT NULL, userId INT DEFAULT NULL, boutiqueId INT DEFAULT NULL, INDEX IDX_6EEAA67D64B64DCC (userId), INDEX IDX_6EEAA67DDB050607 (boutiqueId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, boutique_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, unite_mesure VARCHAR(255) NOT NULL, stock DOUBLE PRECISION NOT NULL, prix DOUBLE PRECISION NOT NULL, saisonnalite VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, INDEX IDX_29A5EC27AB677BE6 (boutique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_commande (id INT AUTO_INCREMENT NOT NULL, produit_id INT NOT NULL, commande_id INT NOT NULL, quantite DOUBLE PRECISION NOT NULL, INDEX IDX_47F5946EF347EFB (produit_id), INDEX IDX_47F5946E82EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(30) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(100) NOT NULL, prenom VARCHAR(30) NOT NULL, nom VARCHAR(50) NOT NULL, sexe VARCHAR(1) NOT NULL, ville VARCHAR(50) NOT NULL, code_postal INT NOT NULL, adresse VARCHAR(255) NOT NULL, departement VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, telephone VARCHAR(25) NOT NULL, date_de_naissance DATE NOT NULL, salt VARCHAR(255) DEFAULT NULL, statut VARCHAR(1) NOT NULL, role VARCHAR(20) NOT NULL, boutiqueId INT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649DB050607 (boutiqueId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE boutique ADD CONSTRAINT FK_A1223C5464B64DCC FOREIGN KEY (userId) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D64B64DCC FOREIGN KEY (userId) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DDB050607 FOREIGN KEY (boutiqueId) REFERENCES boutique (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27AB677BE6 FOREIGN KEY (boutique_id) REFERENCES boutique (id)');
        $this->addSql('ALTER TABLE produit_commande ADD CONSTRAINT FK_47F5946EF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit_commande ADD CONSTRAINT FK_47F5946E82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649DB050607 FOREIGN KEY (boutiqueId) REFERENCES boutique (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DDB050607');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27AB677BE6');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649DB050607');
        $this->addSql('ALTER TABLE produit_commande DROP FOREIGN KEY FK_47F5946E82EA2E54');
        $this->addSql('ALTER TABLE produit_commande DROP FOREIGN KEY FK_47F5946EF347EFB');
        $this->addSql('ALTER TABLE boutique DROP FOREIGN KEY FK_A1223C5464B64DCC');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D64B64DCC');
        $this->addSql('DROP TABLE boutique');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_commande');
        $this->addSql('DROP TABLE user');
    }
}
