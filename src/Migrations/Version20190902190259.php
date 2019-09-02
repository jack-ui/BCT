<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190902190259 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DA76ED395');
        $this->addSql('DROP INDEX IDX_6EEAA67DA76ED395 ON commande');
        $this->addSql('ALTER TABLE commande CHANGE user_id userId INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D64B64DCC FOREIGN KEY (userId) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D64B64DCC ON commande (userId)');
        $this->addSql('ALTER TABLE produit ADD description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649AB677BE6');
        $this->addSql('DROP INDEX UNIQ_8D93D649AB677BE6 ON user');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(100) NOT NULL, CHANGE boutique_id boutiqueId INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649DB050607 FOREIGN KEY (boutiqueId) REFERENCES boutique (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649DB050607 ON user (boutiqueId)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D64B64DCC');
        $this->addSql('DROP INDEX IDX_6EEAA67D64B64DCC ON commande');
        $this->addSql('ALTER TABLE commande CHANGE userid user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DA76ED395 ON commande (user_id)');
        $this->addSql('ALTER TABLE produit DROP description');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649DB050607');
        $this->addSql('DROP INDEX UNIQ_8D93D649DB050607 ON user');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE boutiqueid boutique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649AB677BE6 FOREIGN KEY (boutique_id) REFERENCES boutique (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649AB677BE6 ON user (boutique_id)');
    }
}
