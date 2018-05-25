<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180525194812 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carservice ADD service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carservice ADD CONSTRAINT FK_C691A3ED5CA9E6 FOREIGN KEY (service_id) REFERENCES `service` (id)');
        $this->addSql('CREATE INDEX IDX_C691A3ED5CA9E6 ON carservice (service_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `carservice` DROP FOREIGN KEY FK_C691A3ED5CA9E6');
        $this->addSql('DROP INDEX IDX_C691A3ED5CA9E6 ON `carservice`');
        $this->addSql('ALTER TABLE `carservice` DROP service_id');
    }
}
