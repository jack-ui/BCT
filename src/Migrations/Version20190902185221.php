<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190902185221 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique DROP FOREIGN KEY FK_A1223C54A76ED395');
        $this->addSql('DROP INDEX UNIQ_A1223C54A76ED395 ON boutique');
        $this->addSql('ALTER TABLE boutique ADD description VARCHAR(255) NOT NULL, CHANGE siret siret VARCHAR(50) NOT NULL, CHANGE nom_boutique nom_boutique VARCHAR(255) NOT NULL, CHANGE livraison livraison VARCHAR(255) NOT NULL, CHANGE paiement paiement VARCHAR(255) NOT NULL, CHANGE user_id userId INT DEFAULT NULL');
        $this->addSql('ALTER TABLE boutique ADD CONSTRAINT FK_A1223C5464B64DCC FOREIGN KEY (userId) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A1223C5464B64DCC ON boutique (userId)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique DROP FOREIGN KEY FK_A1223C5464B64DCC');
        $this->addSql('DROP INDEX UNIQ_A1223C5464B64DCC ON boutique');
        $this->addSql('ALTER TABLE boutique DROP description, CHANGE siret siret VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE nom_boutique nom_boutique VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE livraison livraison VARCHAR(20) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE paiement paiement VARCHAR(20) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE userid user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE boutique ADD CONSTRAINT FK_A1223C54A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A1223C54A76ED395 ON boutique (user_id)');
    }
}
