<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190831140435 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE categorie categorie VARCHAR(255) NOT NULL, CHANGE saisonnalite saisonnalite VARCHAR(255) NOT NULL, CHANGE unite_mesure unite_mesure VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit CHANGE nom nom VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE categorie categorie VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE unite_mesure unite_mesure VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE saisonnalite saisonnalite VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
