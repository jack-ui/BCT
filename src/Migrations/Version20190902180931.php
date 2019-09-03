<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190902180931 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique ADD departement INT NOT NULL, ADD region VARCHAR(255) NOT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE siret siret VARCHAR(50) DEFAULT NULL, CHANGE nom_boutique nom_boutique VARCHAR(255) DEFAULT NULL, CHANGE livraison livraison VARCHAR(20) DEFAULT NULL, CHANGE paiement paiement VARCHAR(20) DEFAULT NULL, CHANGE photo photo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE commande CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit CHANGE boutique_id boutique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD departement INT NOT NULL, ADD region VARCHAR(255) NOT NULL, CHANGE boutique_id boutique_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(50) NOT NULL, CHANGE salt salt VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique DROP departement, DROP region, CHANGE user_id user_id INT DEFAULT NULL, CHANGE siret siret VARCHAR(50) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE nom_boutique nom_boutique VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE livraison livraison VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE paiement paiement VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE photo photo VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE commande CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit CHANGE boutique_id boutique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP departement, DROP region, CHANGE boutique_id boutique_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE salt salt VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}