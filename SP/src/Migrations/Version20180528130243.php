<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180528130243 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_773DE69D1ACC766E ON car');
        $this->addSql('DROP INDEX UNIQ_773DE69DD79572D9 ON car');
        $this->addSql('DROP INDEX UNIQ_773DE69DBB827337 ON car');
        $this->addSql('ALTER TABLE car ADD reg_nr VARCHAR(6) NOT NULL, ADD gearbox VARCHAR(191) NOT NULL, ADD engine_capacity DOUBLE PRECISION NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_773DE69D229E055A ON car (reg_nr)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_773DE69D229E055A ON car');
        $this->addSql('ALTER TABLE car DROP reg_nr, DROP gearbox, DROP engine_capacity');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_773DE69D1ACC766E ON car (make)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_773DE69DD79572D9 ON car (model)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_773DE69DBB827337 ON car (year)');
    }
}
