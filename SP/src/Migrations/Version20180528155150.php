<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180528155150 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_C691A37137DE79 ON carservice');
        $this->addSql('DROP INDEX mechanic ON carservice');
        $this->addSql('DROP INDEX mechanic_2 ON carservice');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE UNIQUE INDEX UNIQ_C691A37137DE79 ON `carservice` (mechanic)');
        $this->addSql('CREATE UNIQUE INDEX mechanic ON `carservice` (mechanic)');
        $this->addSql('CREATE UNIQUE INDEX mechanic_2 ON `carservice` (mechanic)');
    }
}
