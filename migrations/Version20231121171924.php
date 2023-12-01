<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231121171924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address ADD street VARCHAR(255) NOT NULL, ADD code_postal VARCHAR(255) NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD country VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE article ADD author_id INT DEFAULT NULL, ADD title VARCHAR(60) NOT NULL, ADD content LONGTEXT NOT NULL, ADD image_url VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66F675F31B FOREIGN KEY (author_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66F675F31B ON article (author_id)');
        $this->addSql('ALTER TABLE category ADD name VARCHAR(255) NOT NULL, ADD description VARCHAR(255) DEFAULT NULL, ADD image_url VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE profile ADD user_id INT DEFAULT NULL, ADD picture VARCHAR(255) NOT NULL, ADD description LONGTEXT NOT NULL, ADD date_birth DATE NOT NULL, ADD cover_picture VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT FK_8157AA0FA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_8157AA0FA76ED395 ON profile (user_id)');
        $this->addSql('ALTER TABLE user ADD profile_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649CCFA12B8 ON user (profile_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66F675F31B');
        $this->addSql('DROP INDEX IDX_23A0E66F675F31B ON article');
        $this->addSql('ALTER TABLE article DROP author_id, DROP title, DROP content, DROP image_url, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY FK_8157AA0FA76ED395');
        $this->addSql('DROP INDEX IDX_8157AA0FA76ED395 ON profile');
        $this->addSql('ALTER TABLE profile DROP user_id, DROP picture, DROP description, DROP date_birth, DROP cover_picture, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE category DROP name, DROP description, DROP image_url, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649CCFA12B8');
        $this->addSql('DROP INDEX UNIQ_8D93D649CCFA12B8 ON `user`');
        $this->addSql('ALTER TABLE `user` DROP profile_id');
        $this->addSql('ALTER TABLE address DROP street, DROP code_postal, DROP city, DROP country, DROP created_at, DROP updated_at');
    }
}
