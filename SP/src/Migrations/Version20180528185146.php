<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180528185146 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `carservice` (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, car_id INT DEFAULT NULL, service_id INT DEFAULT NULL, time DATETIME NOT NULL, status VARCHAR(191) NOT NULL, mechanic VARCHAR(191) DEFAULT NULL, INDEX IDX_C691A3A76ED395 (user_id), INDEX IDX_C691A3C3C6F69F (car_id), INDEX IDX_C691A3ED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `carservice` ADD CONSTRAINT FK_C691A3A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE `carservice` ADD CONSTRAINT FK_C691A3C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE `carservice` ADD CONSTRAINT FK_C691A3ED5CA9E6 FOREIGN KEY (service_id) REFERENCES `service` (id)');
        $this->addSql('DROP TABLE change_password');
        $this->addSql('DROP TABLE forgot_password');
        $this->addSql('DROP INDEX UNIQ_773DE69D1ACC766E ON car');
        $this->addSql('DROP INDEX UNIQ_773DE69DD79572D9 ON car');
        $this->addSql('DROP INDEX UNIQ_773DE69DBB827337 ON car');
        $this->addSql('ALTER TABLE car ADD reg_nr VARCHAR(6) NOT NULL, ADD gearbox VARCHAR(191) NOT NULL, ADD engine_capacity DOUBLE PRECISION NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_773DE69D229E055A ON car (reg_nr)');
        $this->addSql('ALTER TABLE service ADD user_id INT DEFAULT NULL, ADD total_price DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD2A76ED395 ON service (user_id)');
        $this->addSql('ALTER TABLE user ADD is_disabled INT NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE change_password (id INT AUTO_INCREMENT NOT NULL, password VARCHAR(64) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forgot_password (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(191) NOT NULL COLLATE utf8mb4_unicode_ci, UNIQUE INDEX UNIQ_2AB9B566E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE `carservice`');
        $this->addSql('DROP INDEX UNIQ_773DE69D229E055A ON car');
        $this->addSql('ALTER TABLE car DROP reg_nr, DROP gearbox, DROP engine_capacity');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_773DE69D1ACC766E ON car (make)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_773DE69DD79572D9 ON car (model)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_773DE69DBB827337 ON car (year)');
        $this->addSql('ALTER TABLE `service` DROP FOREIGN KEY FK_E19D9AD2A76ED395');
        $this->addSql('DROP INDEX IDX_E19D9AD2A76ED395 ON `service`');
        $this->addSql('ALTER TABLE `service` DROP user_id, DROP total_price');
        $this->addSql('ALTER TABLE `user` DROP is_disabled');
    }
}
