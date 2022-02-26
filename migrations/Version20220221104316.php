<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220221104316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Première migration';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, pays_id INT DEFAULT NULL, complement_adresse VARCHAR(255) DEFAULT NULL, numero_rue VARCHAR(255) DEFAULT NULL, voie VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, accepte_recevoir_informations TINYINT(1) DEFAULT NULL, fixe VARCHAR(255) DEFAULT NULL, partable VARCHAR(255) DEFAULT NULL, fax VARCHAR(255) DEFAULT NULL, INDEX IDX_C35F0816A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE civilite (id INT AUTO_INCREMENT NOT NULL, civilite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, pays VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secteur_activite (id INT AUTO_INCREMENT NOT NULL, secteur_activite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sondage (id INT AUTO_INCREMENT NOT NULL, sondage VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, secteur_activite_id INT DEFAULT NULL, civilite_id INT DEFAULT NULL, adresse_id INT DEFAULT NULL, sondage_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, type_membre TINYINT(1) NOT NULL, numero_rcs VARCHAR(255) NOT NULL, entreprise VARCHAR(255) NOT NULL, num_tva VARCHAR(255) DEFAULT NULL, renseigner_une_reference TINYINT(1) DEFAULT NULL, validation_chaque_paiement TINYINT(1) NOT NULL, reconnais_avoir_pris_connaissance TINYINT(1) DEFAULT NULL, condition_generale TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D6495233A7FC (secteur_activite_id), INDEX IDX_8D93D64939194ABF (civilite_id), INDEX IDX_8D93D6494DE7DC5C (adresse_id), INDEX IDX_8D93D649BAF4AE56 (sondage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F0816A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495233A7FC FOREIGN KEY (secteur_activite_id) REFERENCES secteur_activite (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64939194ABF FOREIGN KEY (civilite_id) REFERENCES civilite (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649BAF4AE56 FOREIGN KEY (sondage_id) REFERENCES sondage (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494DE7DC5C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64939194ABF');
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F0816A6E44244');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6495233A7FC');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649BAF4AE56');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE civilite');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE secteur_activite');
        $this->addSql('DROP TABLE sondage');
        $this->addSql('DROP TABLE user');
    }
}
