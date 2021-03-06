<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190828141923 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD ville VARCHAR(50) NOT NULL, ADD code_postal INT NOT NULL, ADD telephone VARCHAR(17) NOT NULL, ADD date_de_naissance DATE NOT NULL, ADD role VARCHAR(20) NOT NULL, ADD salt VARCHAR(255) DEFAULT NULL, DROP statut, DROP date_naissance, CHANGE nom nom VARCHAR(30) NOT NULL, CHANGE prenom prenom VARCHAR(30) NOT NULL, CHANGE sexe sexe VARCHAR(1) NOT NULL, CHANGE email email VARCHAR(50) NOT NULL, CHANGE username username VARCHAR(30) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD statut TINYINT(1) NOT NULL, ADD date_naissance DATETIME NOT NULL, DROP ville, DROP code_postal, DROP telephone, DROP date_de_naissance, DROP role, DROP salt, CHANGE username username VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE password password VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE email email VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE prenom prenom VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE nom nom VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE sexe sexe VARCHAR(3) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
