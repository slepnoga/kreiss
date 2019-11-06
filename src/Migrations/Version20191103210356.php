<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191103210356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            $this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addSql(
            'CREATE TABLE geo_data (id INT AUTO_INCREMENT NOT NULL, iso VARCHAR(2) NOT NULL, name VARCHAR(80) NOT NULL, printable_name VARCHAR(80) NOT NULL, iso3 VARCHAR(3) NOT NULL, numcode SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE refill_frigo (id INT AUTO_INCREMENT NOT NULL, trailer_id INT DEFAULT NULL, fill_liters INT NOT NULL, INDEX IDX_EF67120DB6C04CFD (trailer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB'
        );
        $this->addSql(
            'ALTER TABLE refill_frigo ADD CONSTRAINT FK_EF67120DB6C04CFD FOREIGN KEY (trailer_id) REFERENCES trailer (id)'
        );
        $this->addSql('DROP TABLE country');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            $this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addSql(
            'CREATE TABLE country (iso CHAR(2) NOT NULL COLLATE latin1_swedish_ci, name VARCHAR(80) NOT NULL COLLATE latin1_swedish_ci, printable_name VARCHAR(80) NOT NULL COLLATE latin1_swedish_ci, iso3 CHAR(3) DEFAULT NULL COLLATE latin1_swedish_ci, numcode SMALLINT DEFAULT NULL, PRIMARY KEY(iso)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' '
        );
        $this->addSql('DROP TABLE geo_data');
        $this->addSql('DROP TABLE refill_frigo');
    }
}
