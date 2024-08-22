<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240822110716 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formations (id INT AUTO_INCREMENT NOT NULL, pole_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, texte1 VARCHAR(255) DEFAULT NULL, texte2 VARCHAR(255) DEFAULT NULL, texte3 VARCHAR(255) DEFAULT NULL, image1 VARCHAR(255) DEFAULT NULL, image2 VARCHAR(255) DEFAULT NULL, image3 VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_409021378C6DA645 (pole_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formations ADD CONSTRAINT FK_409021378C6DA645 FOREIGN KEY (pole_id_id) REFERENCES poles (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formations DROP FOREIGN KEY FK_409021378C6DA645');
        $this->addSql('DROP TABLE formations');
    }
}
