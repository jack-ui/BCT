<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190903085456 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique CHANGE livraison livraison VARCHAR(255) NOT NULL, CHANGE paiement paiement VARCHAR(255) NOT NULL, CHANGE departement departement INT NOT NULL, CHANGE region region VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE commande ADD boutiqueId INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DDB050607 FOREIGN KEY (boutiqueId) REFERENCES boutique (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DDB050607 ON commande (boutiqueId)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique CHANGE livraison livraison VARCHAR(255) DEFAULT \'à emporter\' NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE paiement paiement VARCHAR(255) DEFAULT \'espèces\' NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE departement departement INT DEFAULT 78 NOT NULL, CHANGE region region VARCHAR(255) DEFAULT \'Ile de France\' NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DDB050607');
        $this->addSql('DROP INDEX IDX_6EEAA67DDB050607 ON commande');
        $this->addSql('ALTER TABLE commande DROP boutiqueId');
    }
}
