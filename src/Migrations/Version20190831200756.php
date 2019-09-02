<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190831200756 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique ADD ville VARCHAR(50) NOT NULL, ADD code_postal INT NOT NULL, ADD adresse VARCHAR(255) NOT NULL, ADD telephone VARCHAR(25) NOT NULL, DROP localisation, CHANGE user_id user_id INT DEFAULT NULL, CHANGE siret siret VARCHAR(50) DEFAULT NULL, CHANGE nom_boutique nom_boutique VARCHAR(255) DEFAULT NULL, CHANGE livraison livraison VARCHAR(20) DEFAULT NULL, CHANGE paiement paiement VARCHAR(20) DEFAULT NULL, CHANGE photo photo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE commande CHANGE user_id user_id INT DEFAULT NULL, CHANGE etat etat VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE produit CHANGE boutique_id boutique_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE categorie categorie VARCHAR(255) NOT NULL, CHANGE saisonnalite saisonnalite VARCHAR(255) NOT NULL, CHANGE photo photo VARCHAR(255) NOT NULL, CHANGE unite_mesure unite_mesure VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE produit_commande DROP poids_total');
        $this->addSql('ALTER TABLE user CHANGE boutique_id boutique_id INT DEFAULT NULL, CHANGE adresse adresse VARCHAR(255) NOT NULL, CHANGE telephone telephone VARCHAR(25) NOT NULL, CHANGE salt salt VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique ADD localisation LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, DROP ville, DROP code_postal, DROP adresse, DROP telephone, CHANGE user_id user_id INT DEFAULT NULL, CHANGE siret siret VARCHAR(50) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE nom_boutique nom_boutique VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE livraison livraison VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE paiement paiement VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE photo photo VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE commande CHANGE user_id user_id INT DEFAULT NULL, CHANGE etat etat VARCHAR(10) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE produit CHANGE boutique_id boutique_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE categorie categorie VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE unite_mesure unite_mesure TINYINT(1) NOT NULL, CHANGE saisonnalite saisonnalite VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE photo photo VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE produit_commande ADD poids_total DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE boutique_id boutique_id INT DEFAULT NULL, CHANGE adresse adresse LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE telephone telephone VARCHAR(17) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE salt salt VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
