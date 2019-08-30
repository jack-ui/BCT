<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190830084502 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE boutique DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE boutique ADD siret VARCHAR(50) DEFAULT NULL, ADD nom_boutique VARCHAR(255) DEFAULT NULL, ADD livraison VARCHAR(20) DEFAULT NULL, ADD paiement VARCHAR(20) DEFAULT NULL, ADD photo VARCHAR(255) DEFAULT NULL, DROP username, DROP ref_commande, CHANGE id id_boutique INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE boutique ADD PRIMARY KEY (id_boutique)');
        $this->addSql('ALTER TABLE user DROP livraison, DROP siret, DROP nom_boutique, DROP paiement, DROP photo, DROP id_boutique');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique MODIFY id_boutique INT NOT NULL');
        $this->addSql('ALTER TABLE boutique DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE boutique ADD username VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, ADD ref_commande VARCHAR(5) NOT NULL COLLATE utf8mb4_unicode_ci, DROP siret, DROP nom_boutique, DROP livraison, DROP paiement, DROP photo, CHANGE id_boutique id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE boutique ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE user ADD livraison VARCHAR(20) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD siret VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD nom_boutique VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD paiement VARCHAR(20) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD photo VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD id_boutique INT DEFAULT NULL');
    }
}
