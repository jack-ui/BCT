<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190831092658 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande DROP produit, CHANGE statut etat VARCHAR(10) NOT NULL, CHANGE poids_total montant DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE produit_commande ADD poids_total DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande ADD produit VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE etat statut VARCHAR(10) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE montant poids_total DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE produit_commande DROP poids_total');
    }
}
