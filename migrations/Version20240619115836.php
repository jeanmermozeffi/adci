<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240619115836 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE adhesion_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE adhesion (id INT NOT NULL, adhere_adci BOOLEAN NOT NULL, zone VARCHAR(255) NOT NULL, nom_et_prenoms VARCHAR(255) NOT NULL, date_de_naissance DATE NOT NULL, lieu_de_naissance VARCHAR(255) NOT NULL, inscrit_sur_liste_electorale BOOLEAN NOT NULL, lieu_de_vote VARCHAR(255) DEFAULT NULL, numero_carte_electeur VARCHAR(255) DEFAULT NULL, lieu_de_residence_actuelle VARCHAR(255) NOT NULL, departement VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, nature_piece_identite VARCHAR(255) NOT NULL, numero_piece_identite VARCHAR(255) DEFAULT NULL, numero_extrait_acte_naissance VARCHAR(255) DEFAULT NULL, profession VARCHAR(255) NOT NULL, contacts_cellulaires VARCHAR(255) NOT NULL, adresse_electronique VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE adhesion_id_seq CASCADE');
        $this->addSql('DROP TABLE adhesion');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
