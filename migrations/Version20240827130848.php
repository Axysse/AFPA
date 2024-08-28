<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240827130848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formations ADD pole_id INT NOT NULL');
        $this->addSql('ALTER TABLE formations ADD CONSTRAINT FK_40902137419C3385 FOREIGN KEY (pole_id) REFERENCES poles (id)');
        $this->addSql('CREATE INDEX IDX_40902137419C3385 ON formations (pole_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formations DROP FOREIGN KEY FK_40902137419C3385');
        $this->addSql('DROP INDEX IDX_40902137419C3385 ON formations');
        $this->addSql('ALTER TABLE formations DROP pole_id');
    }
}
