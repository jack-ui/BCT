<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190829131927 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD statut VARCHAR(1) NOT NULL, ADD siret VARCHAR(50) DEFAULT NULL, ADD nom_boutique VARCHAR(255) DEFAULT NULL, ADD livraison VARCHAR(20) DEFAULT NULL, ADD paiement VARCHAR(20) DEFAULT NULL, ADD photo VARCHAR(255) DEFAULT NULL, ADD id_boutique INT NOT NULL, DROP role, CHANGE salt salt VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD role VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, DROP statut, DROP siret, DROP nom_boutique, DROP livraison, DROP paiement, DROP photo, DROP id_boutique, CHANGE salt salt VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
