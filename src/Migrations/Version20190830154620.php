<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190830154620 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE boutique (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, localisation LONGTEXT NOT NULL, siret VARCHAR(50) DEFAULT NULL, nom_boutique VARCHAR(255) DEFAULT NULL, livraison VARCHAR(20) DEFAULT NULL, paiement VARCHAR(20) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_A1223C54A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, fruit VARCHAR(20) NOT NULL, legume VARCHAR(20) NOT NULL, viande VARCHAR(20) NOT NULL, produit_laitier VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, statut VARCHAR(10) NOT NULL, date DATETIME NOT NULL, produit VARCHAR(20) NOT NULL, poids_total DOUBLE PRECISION NOT NULL, INDEX IDX_6EEAA67DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(20) NOT NULL, categorie VARCHAR(20) NOT NULL, unite_mesure TINYINT(1) NOT NULL, stock DOUBLE PRECISION NOT NULL, prix DOUBLE PRECISION NOT NULL, saisonnalite VARCHAR(20) NOT NULL, photo VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_commande (id INT AUTO_INCREMENT NOT NULL, produit VARCHAR(20) NOT NULL, ref_commande VARCHAR(5) NOT NULL, quantite DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, boutique_id INT DEFAULT NULL, username VARCHAR(30) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(50) NOT NULL, prenom VARCHAR(30) NOT NULL, nom VARCHAR(30) NOT NULL, sexe VARCHAR(1) NOT NULL, ville VARCHAR(50) NOT NULL, code_postal INT NOT NULL, adresse LONGTEXT NOT NULL, telephone VARCHAR(17) NOT NULL, date_de_naissance DATE NOT NULL, salt VARCHAR(255) DEFAULT NULL, statut VARCHAR(1) NOT NULL, role VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_8D93D649AB677BE6 (boutique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE boutique ADD CONSTRAINT FK_A1223C54A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649AB677BE6 FOREIGN KEY (boutique_id) REFERENCES boutique (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649AB677BE6');
        $this->addSql('ALTER TABLE boutique DROP FOREIGN KEY FK_A1223C54A76ED395');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DA76ED395');
        $this->addSql('DROP TABLE boutique');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_commande');
        $this->addSql('DROP TABLE user');
    }
}
