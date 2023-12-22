<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231215150256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artiste (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATETIME NOT NULL, lieu_naissance VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_9C07354FC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artiste_chanson (artiste_id INT NOT NULL, chanson_id INT NOT NULL, INDEX IDX_D5BB76A221D25844 (artiste_id), INDEX IDX_D5BB76A22D0460C5 (chanson_id), PRIMARY KEY(artiste_id, chanson_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chanson (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, date_sortie DATETIME NOT NULL, genre VARCHAR(255) NOT NULL, langue VARCHAR(255) NOT NULL, photo_couverture VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artiste ADD CONSTRAINT FK_9C07354FC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE artiste_chanson ADD CONSTRAINT FK_D5BB76A221D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_chanson ADD CONSTRAINT FK_D5BB76A22D0460C5 FOREIGN KEY (chanson_id) REFERENCES chanson (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE tp4_bd DROP FOREIGN KEY FK_DD1EA4A4CCFA12B8');
        $this->addSql('DROP INDEX UNIQ_DD1EA4A4CCFA12B8 ON tp4_bd');
        $this->addSql('ALTER TABLE tp4_bd DROP profile_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiste DROP FOREIGN KEY FK_9C07354FC54C8C93');
        $this->addSql('ALTER TABLE artiste_chanson DROP FOREIGN KEY FK_D5BB76A221D25844');
        $this->addSql('ALTER TABLE artiste_chanson DROP FOREIGN KEY FK_D5BB76A22D0460C5');
        $this->addSql('DROP TABLE artiste');
        $this->addSql('DROP TABLE artiste_chanson');
        $this->addSql('DROP TABLE chanson');
        $this->addSql('DROP TABLE type');
        $this->addSql('ALTER TABLE article DROP slug');
        $this->addSql('ALTER TABLE tp4_bd ADD profile_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tp4_bd ADD CONSTRAINT FK_DD1EA4A4CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DD1EA4A4CCFA12B8 ON tp4_bd (profile_id)');
    }
}
