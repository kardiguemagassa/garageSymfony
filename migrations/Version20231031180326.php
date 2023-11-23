<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231031180326 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedules DROP FOREIGN KEY FK_313BDC8EFCB4E7AB');
        $this->addSql('DROP INDEX IDX_313BDC8EFCB4E7AB ON schedules');
        $this->addSql('ALTER TABLE schedules DROP garages_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedules ADD garages_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE schedules ADD CONSTRAINT FK_313BDC8EFCB4E7AB FOREIGN KEY (garages_id) REFERENCES garages (id)');
        $this->addSql('CREATE INDEX IDX_313BDC8EFCB4E7AB ON schedules (garages_id)');
    }
}
