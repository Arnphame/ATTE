<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180524180021 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carservice ADD car_id INT DEFAULT NULL, DROP car');
        $this->addSql('ALTER TABLE carservice ADD CONSTRAINT FK_C691A3C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('CREATE INDEX IDX_C691A3C3C6F69F ON carservice (car_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `carservice` DROP FOREIGN KEY FK_C691A3C3C6F69F');
        $this->addSql('DROP INDEX IDX_C691A3C3C6F69F ON `carservice`');
        $this->addSql('ALTER TABLE `carservice` ADD car VARCHAR(191) NOT NULL COLLATE utf8mb4_unicode_ci, DROP car_id');
    }
}
