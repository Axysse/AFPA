<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240822140520 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE quizz (id INT AUTO_INCREMENT NOT NULL, pole_id_id INT DEFAULT NULL, question1 VARCHAR(255) DEFAULT NULL, question2 VARCHAR(255) DEFAULT NULL, question3 VARCHAR(255) DEFAULT NULL, reponse1 INT DEFAULT NULL, reponse2 INT DEFAULT NULL, reponse3 INT DEFAULT NULL, UNIQUE INDEX UNIQ_7C77973D8C6DA645 (pole_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE quizz ADD CONSTRAINT FK_7C77973D8C6DA645 FOREIGN KEY (pole_id_id) REFERENCES poles (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quizz DROP FOREIGN KEY FK_7C77973D8C6DA645');
        $this->addSql('DROP TABLE quizz');
    }
}
