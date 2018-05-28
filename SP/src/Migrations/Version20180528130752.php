<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180528130752 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(191) NOT NULL, username VARCHAR(191) NOT NULL, password VARCHAR(64) NOT NULL, role INT NOT NULL, is_active INT NOT NULL, token VARCHAR(191) NOT NULL, token_pass VARCHAR(191) NOT NULL, address VARCHAR(191) NOT NULL, phone_number VARCHAR(191) NOT NULL, is_disabled INT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `carservice` (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, car_id INT DEFAULT NULL, service_id INT DEFAULT NULL, time DATETIME NOT NULL, status VARCHAR(191) NOT NULL, mechanic VARCHAR(191) DEFAULT NULL, UNIQUE INDEX UNIQ_C691A37137DE79 (mechanic), INDEX IDX_C691A3A76ED395 (user_id), INDEX IDX_C691A3C3C6F69F (car_id), INDEX IDX_C691A3ED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `service` (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(191) NOT NULL, price DOUBLE PRECISION NOT NULL, duration DOUBLE PRECISION NOT NULL, discount INT DEFAULT NULL, total_price DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_E19D9AD25E237E06 (name), INDEX IDX_E19D9AD2A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, reg_nr VARCHAR(6) NOT NULL, make VARCHAR(191) NOT NULL, model VARCHAR(191) NOT NULL, year DATE NOT NULL, fuel_type VARCHAR(191) NOT NULL, gearbox VARCHAR(191) NOT NULL, engine_capacity DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_773DE69D229E055A (reg_nr), INDEX IDX_773DE69DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `carservice` ADD CONSTRAINT FK_C691A3A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE `carservice` ADD CONSTRAINT FK_C691A3C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE `carservice` ADD CONSTRAINT FK_C691A3ED5CA9E6 FOREIGN KEY (service_id) REFERENCES `service` (id)');
        $this->addSql('ALTER TABLE `service` ADD CONSTRAINT FK_E19D9AD2A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `carservice` DROP FOREIGN KEY FK_C691A3A76ED395');
        $this->addSql('ALTER TABLE `service` DROP FOREIGN KEY FK_E19D9AD2A76ED395');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DA76ED395');
        $this->addSql('ALTER TABLE `carservice` DROP FOREIGN KEY FK_C691A3ED5CA9E6');
        $this->addSql('ALTER TABLE `carservice` DROP FOREIGN KEY FK_C691A3C3C6F69F');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE `carservice`');
        $this->addSql('DROP TABLE `service`');
        $this->addSql('DROP TABLE car');
    }
}
