<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211127113229 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ecole ADD ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ecole ADD CONSTRAINT FK_9786AACA73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('CREATE INDEX IDX_9786AACA73F0036 ON ecole (ville_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ecole DROP FOREIGN KEY FK_9786AACA73F0036');
        $this->addSql('DROP INDEX IDX_9786AACA73F0036 ON ecole');
        $this->addSql('ALTER TABLE ecole DROP ville_id');
    }
}
