<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240828091135 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE quizz_questions (id INT AUTO_INCREMENT NOT NULL, pole_id INT NOT NULL, question1 VARCHAR(255) DEFAULT NULL, question2 VARCHAR(255) DEFAULT NULL, question3 VARCHAR(255) DEFAULT NULL, INDEX IDX_79E4F161419C3385 (pole_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE quizz_questions ADD CONSTRAINT FK_79E4F161419C3385 FOREIGN KEY (pole_id) REFERENCES poles (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quizz_questions DROP FOREIGN KEY FK_79E4F161419C3385');
        $this->addSql('DROP TABLE quizz_questions');
    }
}
