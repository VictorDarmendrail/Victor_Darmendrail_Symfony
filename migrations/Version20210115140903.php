<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210115140903 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formation_stage (formation_id INT NOT NULL, stage_id INT NOT NULL, INDEX IDX_B4F70D1C5200282E (formation_id), INDEX IDX_B4F70D1C2298D193 (stage_id), PRIMARY KEY(formation_id, stage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(150) NOT NULL, mission VARCHAR(1000) DEFAULT NULL, adresse_mail VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation_stage ADD CONSTRAINT FK_B4F70D1C5200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_stage ADD CONSTRAINT FK_B4F70D1C2298D193 FOREIGN KEY (stage_id) REFERENCES stage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entreprise ADD nom_id INT NOT NULL, CHANGE activit activité VARCHAR(25) DEFAULT NULL');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA60C8121CE9 FOREIGN KEY (nom_id) REFERENCES stage (id)');
        $this->addSql('CREATE INDEX IDX_D19FA60C8121CE9 ON entreprise (nom_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA60C8121CE9');
        $this->addSql('ALTER TABLE formation_stage DROP FOREIGN KEY FK_B4F70D1C2298D193');
        $this->addSql('DROP TABLE formation_stage');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP INDEX IDX_D19FA60C8121CE9 ON entreprise');
        $this->addSql('ALTER TABLE entreprise DROP nom_id, CHANGE activité activit VARCHAR(25) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
