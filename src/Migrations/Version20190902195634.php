<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190902195634 extends AbstractMigration
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
        $this->addSql('ALTER TABLE boutique ADD description VARCHAR(255) NOT NULL, ADD userId INT DEFAULT NULL, DROP user_id, CHANGE siret siret VARCHAR(50) NOT NULL, CHANGE nom_boutique nom_boutique VARCHAR(255) NOT NULL, CHANGE livraison livraison VARCHAR(255) NOT NULL, CHANGE paiement paiement VARCHAR(255) NOT NULL, CHANGE photo photo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE boutique ADD CONSTRAINT FK_A1223C5464B64DCC FOREIGN KEY (userId) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A1223C5464B64DCC ON boutique (userId)');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DA76ED395');
        $this->addSql('DROP INDEX IDX_6EEAA67DA76ED395 ON commande');
        $this->addSql('ALTER TABLE commande ADD userId INT DEFAULT NULL, DROP user_id');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D64B64DCC FOREIGN KEY (userId) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D64B64DCC ON commande (userId)');
        $this->addSql('ALTER TABLE produit ADD description VARCHAR(255) NOT NULL, CHANGE boutique_id boutique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649AB677BE6');
        $this->addSql('DROP INDEX UNIQ_8D93D649AB677BE6 ON user');
        $this->addSql('ALTER TABLE user ADD boutiqueId INT DEFAULT NULL, DROP boutique_id, CHANGE email email VARCHAR(100) NOT NULL, CHANGE salt salt VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649DB050607 FOREIGN KEY (boutiqueId) REFERENCES boutique (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649DB050607 ON user (boutiqueId)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique DROP FOREIGN KEY FK_A1223C5464B64DCC');
        $this->addSql('DROP INDEX UNIQ_A1223C5464B64DCC ON boutique');
        $this->addSql('ALTER TABLE boutique ADD user_id INT DEFAULT NULL, DROP description, DROP userId, CHANGE siret siret VARCHAR(50) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE nom_boutique nom_boutique VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE livraison livraison VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE paiement paiement VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE photo photo VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE boutique ADD CONSTRAINT FK_A1223C54A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A1223C54A76ED395 ON boutique (user_id)');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D64B64DCC');
        $this->addSql('DROP INDEX IDX_6EEAA67D64B64DCC ON commande');
        $this->addSql('ALTER TABLE commande ADD user_id INT DEFAULT NULL, DROP userId');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DA76ED395 ON commande (user_id)');
        $this->addSql('ALTER TABLE produit DROP description, CHANGE boutique_id boutique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649DB050607');
        $this->addSql('DROP INDEX UNIQ_8D93D649DB050607 ON user');
        $this->addSql('ALTER TABLE user ADD boutique_id INT DEFAULT NULL, DROP boutiqueId, CHANGE email email VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE salt salt VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649AB677BE6 FOREIGN KEY (boutique_id) REFERENCES boutique (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649AB677BE6 ON user (boutique_id)');
    }
}
