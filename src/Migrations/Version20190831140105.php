<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190831140105 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique CHANGE user_id user_id INT DEFAULT NULL, CHANGE siret siret VARCHAR(50) DEFAULT NULL, CHANGE nom_boutique nom_boutique VARCHAR(255) DEFAULT NULL, CHANGE livraison livraison VARCHAR(20) DEFAULT NULL, CHANGE paiement paiement VARCHAR(20) DEFAULT NULL, CHANGE photo photo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE commande DROP produit, CHANGE user_id user_id INT DEFAULT NULL, CHANGE statut etat VARCHAR(10) NOT NULL, CHANGE poids_total montant DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE produit ADD boutique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27AB677BE6 FOREIGN KEY (boutique_id) REFERENCES boutique (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27AB677BE6 ON produit (boutique_id)');
        $this->addSql('ALTER TABLE produit_commande ADD produit_id INT NOT NULL, ADD commande_id INT NOT NULL, ADD poids_total DOUBLE PRECISION NOT NULL, DROP produit, DROP ref_commande');
        $this->addSql('ALTER TABLE produit_commande ADD CONSTRAINT FK_47F5946EF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit_commande ADD CONSTRAINT FK_47F5946E82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('CREATE INDEX IDX_47F5946EF347EFB ON produit_commande (produit_id)');
        $this->addSql('CREATE INDEX IDX_47F5946E82EA2E54 ON produit_commande (commande_id)');
        $this->addSql('ALTER TABLE user CHANGE boutique_id boutique_id INT DEFAULT NULL, CHANGE salt salt VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE boutique CHANGE user_id user_id INT DEFAULT NULL, CHANGE siret siret VARCHAR(50) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE nom_boutique nom_boutique VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE livraison livraison VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE paiement paiement VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE photo photo VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE commande ADD produit VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE user_id user_id INT DEFAULT NULL, CHANGE etat statut VARCHAR(10) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE montant poids_total DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27AB677BE6');
        $this->addSql('DROP INDEX IDX_29A5EC27AB677BE6 ON produit');
        $this->addSql('ALTER TABLE produit DROP boutique_id');
        $this->addSql('ALTER TABLE produit_commande DROP FOREIGN KEY FK_47F5946EF347EFB');
        $this->addSql('ALTER TABLE produit_commande DROP FOREIGN KEY FK_47F5946E82EA2E54');
        $this->addSql('DROP INDEX IDX_47F5946EF347EFB ON produit_commande');
        $this->addSql('DROP INDEX IDX_47F5946E82EA2E54 ON produit_commande');
        $this->addSql('ALTER TABLE produit_commande ADD produit VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, ADD ref_commande VARCHAR(5) NOT NULL COLLATE utf8mb4_unicode_ci, DROP produit_id, DROP commande_id, DROP poids_total');
        $this->addSql('ALTER TABLE user CHANGE boutique_id boutique_id INT DEFAULT NULL, CHANGE salt salt VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
