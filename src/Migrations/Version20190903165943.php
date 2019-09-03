<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190903165943 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique CHANGE photo photo VARCHAR(255) DEFAULT NULL, CHANGE userId userId INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD boutiqueId INT DEFAULT NULL, CHANGE userId userId INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DDB050607 FOREIGN KEY (boutiqueId) REFERENCES boutique (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DDB050607 ON commande (boutiqueId)');
        $this->addSql('ALTER TABLE produit CHANGE boutique_id boutique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE boutiqueId boutiqueId INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique CHANGE photo photo VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE userId userId INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DDB050607');
        $this->addSql('DROP INDEX IDX_6EEAA67DDB050607 ON commande');
        $this->addSql('ALTER TABLE commande DROP boutiqueId, CHANGE userId userId INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit CHANGE boutique_id boutique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE salt salt VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE boutiqueId boutiqueId INT DEFAULT NULL');
    }
}
