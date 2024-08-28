<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240828143422 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE quizz_reponses (id INT AUTO_INCREMENT NOT NULL, reponse1 VARCHAR(255) NOT NULL, reponse2 VARCHAR(255) NOT NULL, reponse3 VARCHAR(255) NOT NULL, reponse4 VARCHAR(255) NOT NULL, reponse5 VARCHAR(255) NOT NULL, reponse6 VARCHAR(255) NOT NULL, reponse7 VARCHAR(255) NOT NULL, reponse8 VARCHAR(255) NOT NULL, reponse9 VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quizz_reponses_quizz_questions (quizz_reponses_id INT NOT NULL, quizz_questions_id INT NOT NULL, INDEX IDX_18FF0DF5C21D8871 (quizz_reponses_id), INDEX IDX_18FF0DF5859492C3 (quizz_questions_id), PRIMARY KEY(quizz_reponses_id, quizz_questions_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE quizz_reponses_quizz_questions ADD CONSTRAINT FK_18FF0DF5C21D8871 FOREIGN KEY (quizz_reponses_id) REFERENCES quizz_reponses (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quizz_reponses_quizz_questions ADD CONSTRAINT FK_18FF0DF5859492C3 FOREIGN KEY (quizz_questions_id) REFERENCES quizz_questions (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quizz_reponses_quizz_questions DROP FOREIGN KEY FK_18FF0DF5C21D8871');
        $this->addSql('ALTER TABLE quizz_reponses_quizz_questions DROP FOREIGN KEY FK_18FF0DF5859492C3');
        $this->addSql('DROP TABLE quizz_reponses');
        $this->addSql('DROP TABLE quizz_reponses_quizz_questions');
    }
}
