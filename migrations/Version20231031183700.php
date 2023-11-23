<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231031183700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedules ADD garages_id INT NOT NULL');
        $this->addSql('ALTER TABLE schedules ADD CONSTRAINT FK_313BDC8EFCB4E7AB FOREIGN KEY (garages_id) REFERENCES garages (id)');
        $this->addSql('CREATE INDEX IDX_313BDC8EFCB4E7AB ON schedules (garages_id)');
        $this->addSql('ALTER TABLE services ADD garages_id INT NOT NULL');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E169FCB4E7AB FOREIGN KEY (garages_id) REFERENCES garages (id)');
        $this->addSql('CREATE INDEX IDX_7332E169FCB4E7AB ON services (garages_id)');
        $this->addSql('ALTER TABLE testimonials ADD garages_id INT NOT NULL');
        $this->addSql('ALTER TABLE testimonials ADD CONSTRAINT FK_38311579FCB4E7AB FOREIGN KEY (garages_id) REFERENCES garages (id)');
        $this->addSql('CREATE INDEX IDX_38311579FCB4E7AB ON testimonials (garages_id)');
        $this->addSql('ALTER TABLE user ADD garages_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649FCB4E7AB FOREIGN KEY (garages_id) REFERENCES garages (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649FCB4E7AB ON user (garages_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedules DROP FOREIGN KEY FK_313BDC8EFCB4E7AB');
        $this->addSql('DROP INDEX IDX_313BDC8EFCB4E7AB ON schedules');
        $this->addSql('ALTER TABLE schedules DROP garages_id');
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E169FCB4E7AB');
        $this->addSql('DROP INDEX IDX_7332E169FCB4E7AB ON services');
        $this->addSql('ALTER TABLE services DROP garages_id');
        $this->addSql('ALTER TABLE testimonials DROP FOREIGN KEY FK_38311579FCB4E7AB');
        $this->addSql('DROP INDEX IDX_38311579FCB4E7AB ON testimonials');
        $this->addSql('ALTER TABLE testimonials DROP garages_id');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649FCB4E7AB');
        $this->addSql('DROP INDEX IDX_8D93D649FCB4E7AB ON `user`');
        $this->addSql('ALTER TABLE `user` DROP garages_id');
    }
}
