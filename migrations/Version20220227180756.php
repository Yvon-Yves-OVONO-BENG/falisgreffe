<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220227180756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'mise à jour des encodages des tables';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite CHANGE liste_activites liste_activites LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE detail_activite_principale detail_activite_principale VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_precise autre_precise VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE activite_principale CHANGE activite_principale activite_principale VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE adresse CHANGE complement_adresse complement_adresse VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE numero_rue numero_rue VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE voie voie VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code_postal code_postal VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE fixe fixe VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE partable partable VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE fax fax VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE arrondissement CHANGE arrondissement arrondissement VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE bis_ter CHANGE bis_ter bis_ter VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE civilite CHANGE civilite civilite VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE commune CHANGE commune commune VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE declarant CHANGE fait_a fait_a VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE par par VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE declaration_relative_etablissement_active CHANGE nom_commercial nom_commercial VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom_domaine_commercial nom_domaine_commercial VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE enseigne enseigne VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE declaration_relative_societe CHANGE denomination denomination VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sigle sigle VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE statut_legal_particulier statut_legal_particulier VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE liste_activitesprincipales liste_activitesprincipales LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE declaration_volet_social_tns CHANGE numero_securite_sociale numero_securite_sociale VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE qualite qualite VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_regime_assurance_maladie autre_regime_assurance_maladie VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE departement CHANGE departement departement VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE details_origine_fonds CHANGE titre_support titre_support VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_precise autre_precise VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE devise CHANGE devise devise VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE document CHANGE statut_constitutif statut_constitutif VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE attestation_depot_fonds attestation_depot_fonds VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE liste_souscripteurs liste_souscripteurs VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nomination_dirigeant nomination_dirigeant VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_nomination autre_nomination VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE rapport_commisaire_au_compte rapport_commisaire_au_compte VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE acte_complementaire acte_complementaire VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE attestation_parution_constitution attestation_parution_constitution VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE attestation_sur_honneur attestation_sur_honneur VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE copie_piece_identite copie_piece_identite VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE justificatif_jouissance_locaux justificatif_jouissance_locaux VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE copie_autorisation_diplome copie_autorisation_diplome VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE justificatif_identite_declarant justificatif_identite_declarant VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE piece_justificative_complementaire piece_justificative_complementaire VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE en_qualite_de CHANGE enqualite_de enqualite_de VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE etat_civil CHANGE nom_naissance nom_naissance VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom_usage nom_usage VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE forme_juridique CHANGE forme_juridique forme_juridique VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE greffe_immatriculation CHANGE greffe_immatriculation greffe_immatriculation VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE imposition_sur_benefice CHANGE imposition_sur_benefice imposition_sur_benefice VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE lieu_exercice_activite CHANGE lieu_exercice_activite lieu_exercice_activite VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE mode_paiement CHANGE mode_paiement mode_paiement VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE nationalite CHANGE nationalite nationalite VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE option_particuliere_benefice CHANGE option_particuliere_benefice option_particuliere_benefice VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE option_particuliere_matiere_tva CHANGE option_particuliere_matiere_tva option_particuliere_matiere_tva VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE origine_fonds CHANGE origine_fonds origine_fonds VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE pays CHANGE pays pays VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE personne CHANGE numero_unique_identification numero_unique_identification VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE qualite_dirigeant CHANGE qualite_dirigeant qualite_dirigeant VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE regime_assurance_maladie CHANGE regime_assurance_maladie regime_assurance_maladie VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE regime_imposition_matiere_tva CHANGE regime_imposition_matiere_tva regime_imposition_matiere_tva VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE region CHANGE region region VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE secteur_activite CHANGE secteur_activite secteur_activite VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE societe CHANGE telephone telephone VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE commentaire_destination_greffe commentaire_destination_greffe LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reference_formalite reference_formalite VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE sondage CHANGE sondage sondage VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type_activite_principale CHANGE type_activite_principale type_activite_principale VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type_personne CHANGE type_personne type_personne VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type_societe CHANGE type_societe type_societe VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type_voie CHANGE type_voie type_voie VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE numero_rcs numero_rcs VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE entreprise entreprise VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE num_tva num_tva VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
