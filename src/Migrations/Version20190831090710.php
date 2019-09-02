<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190831090710 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique DROP FOREIGN KEY FK_A1223C54F347EFB');
        $this->addSql('DROP INDEX UNIQ_A1223C54F347EFB ON boutique');
        $this->addSql('ALTER TABLE boutique DROP produit_id');
        $this->addSql('ALTER TABLE produit DROP INDEX UNIQ_29A5EC27AB677BE6, ADD INDEX IDX_29A5EC27AB677BE6 (boutique_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique ADD produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE boutique ADD CONSTRAINT FK_A1223C54F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A1223C54F347EFB ON boutique (produit_id)');
        $this->addSql('ALTER TABLE produit DROP INDEX IDX_29A5EC27AB677BE6, ADD UNIQUE INDEX UNIQ_29A5EC27AB677BE6 (boutique_id)');
    }
}
