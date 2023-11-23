<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231031181505 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cars (id INT AUTO_INCREMENT NOT NULL, garages_id INT NOT NULL, year INT NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, energy VARCHAR(255) NOT NULL, kilometer VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_95C71D14FCB4E7AB (garages_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D14FCB4E7AB FOREIGN KEY (garages_id) REFERENCES garages (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D14FCB4E7AB');
        $this->addSql('DROP TABLE cars');
    }
}
