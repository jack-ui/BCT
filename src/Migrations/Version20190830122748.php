<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190830122748 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique ADD user_id INT DEFAULT NULL, ADD siret VARCHAR(50) DEFAULT NULL, ADD nom_boutique VARCHAR(255) DEFAULT NULL, ADD livraison VARCHAR(20) DEFAULT NULL, ADD paiement VARCHAR(20) DEFAULT NULL, ADD photo VARCHAR(255) DEFAULT NULL, DROP username, DROP ref_commande');
        $this->addSql('ALTER TABLE boutique ADD CONSTRAINT FK_A1223C54A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A1223C54A76ED395 ON boutique (user_id)');
        $this->addSql('ALTER TABLE commande ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DA76ED395 ON commande (user_id)');
        $this->addSql('ALTER TABLE user ADD boutique_id INT DEFAULT NULL, DROP siret, DROP nom_boutique, DROP livraison, DROP paiement, DROP photo, DROP id_boutique, CHANGE salt salt VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649AB677BE6 FOREIGN KEY (boutique_id) REFERENCES boutique (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649AB677BE6 ON user (boutique_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique DROP FOREIGN KEY FK_A1223C54A76ED395');
        $this->addSql('DROP INDEX UNIQ_A1223C54A76ED395 ON boutique');
        $this->addSql('ALTER TABLE boutique ADD username VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, ADD ref_commande VARCHAR(5) NOT NULL COLLATE utf8mb4_unicode_ci, DROP user_id, DROP siret, DROP nom_boutique, DROP livraison, DROP paiement, DROP photo');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DA76ED395');
        $this->addSql('DROP INDEX IDX_6EEAA67DA76ED395 ON commande');
        $this->addSql('ALTER TABLE commande DROP user_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649AB677BE6');
        $this->addSql('DROP INDEX UNIQ_8D93D649AB677BE6 ON user');
        $this->addSql('ALTER TABLE user ADD siret VARCHAR(50) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, ADD nom_boutique VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, ADD livraison VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, ADD paiement VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, ADD photo VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, ADD id_boutique INT NOT NULL, DROP boutique_id, CHANGE salt salt VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
