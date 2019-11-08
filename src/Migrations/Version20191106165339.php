<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191106165339 extends AbstractMigration
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
            'CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, fullname VARCHAR(255) NOT NULL, birthday DATE DEFAULT \'1800-01-01\' NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX user_real_name (fullname, birthday), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE fuel_refill (id INT AUTO_INCREMENT NOT NULL, event_id INT DEFAULT NULL, truckrefill INT NOT NULL, INDEX IDX_44944E5571F7E88B (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE truck (id INT AUTO_INCREMENT NOT NULL, licensenumber VARCHAR(255) NOT NULL, fueltanksize INT NOT NULL, deepcomp INT NOT NULL, odometr INT NOT NULL, UNIQUE INDEX UNIQ_CDCCF30A989C5D43 (licensenumber), INDEX search_idx (licensenumber, odometr), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE refill_frigo (id INT AUTO_INCREMENT NOT NULL, trailer_id INT DEFAULT NULL, fill_liters INT NOT NULL, INDEX IDX_EF67120DB6C04CFD (trailer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE drivers (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, brightday DATETIME NOT NULL, UNIQUE INDEX drivers (name, surname, brightday), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE telefon_billing (id INT AUTO_INCREMENT NOT NULL, truck_id INT DEFAULT NULL, billing_date DATE NOT NULL, INDEX IDX_86510EDFC6957CCE (truck_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE ad_blue_refill (id INT AUTO_INCREMENT NOT NULL, event_id INT DEFAULT NULL, refill INT NOT NULL, refill_date DATE NOT NULL, refill_country VARCHAR(3) NOT NULL, INDEX IDX_B7321D6E71F7E88B (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE frigo_refill (id INT AUTO_INCREMENT NOT NULL, event_id INT DEFAULT NULL, refill INT DEFAULT NULL, consumptionrate INT DEFAULT NULL, workhours INT DEFAULT NULL, INDEX IDX_106D097471F7E88B (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE trailer (id INT AUTO_INCREMENT NOT NULL, type SMALLINT NOT NULL, licensenumber VARCHAR(255) NOT NULL, consumptionrate DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_C691DC4E989C5D43 (licensenumber), INDEX search_idx (type, licensenumber), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB'
        );
        $this->addSql(
            'ALTER TABLE fuel_refill ADD CONSTRAINT FK_44944E5571F7E88B FOREIGN KEY (event_id) REFERENCES truck (id)'
        );
        $this->addSql(
            'ALTER TABLE refill_frigo ADD CONSTRAINT FK_EF67120DB6C04CFD FOREIGN KEY (trailer_id) REFERENCES trailer (id)'
        );
        $this->addSql(
            'ALTER TABLE telefon_billing ADD CONSTRAINT FK_86510EDFC6957CCE FOREIGN KEY (truck_id) REFERENCES truck (id)'
        );
        $this->addSql(
            'ALTER TABLE ad_blue_refill ADD CONSTRAINT FK_B7321D6E71F7E88B FOREIGN KEY (event_id) REFERENCES truck (id)'
        );
        $this->addSql(
            'ALTER TABLE frigo_refill ADD CONSTRAINT FK_106D097471F7E88B FOREIGN KEY (event_id) REFERENCES trailer (id)'
        );
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            $this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addSql('ALTER TABLE fuel_refill DROP FOREIGN KEY FK_44944E5571F7E88B');
        $this->addSql('ALTER TABLE telefon_billing DROP FOREIGN KEY FK_86510EDFC6957CCE');
        $this->addSql('ALTER TABLE ad_blue_refill DROP FOREIGN KEY FK_B7321D6E71F7E88B');
        $this->addSql('ALTER TABLE refill_frigo DROP FOREIGN KEY FK_EF67120DB6C04CFD');
        $this->addSql('ALTER TABLE frigo_refill DROP FOREIGN KEY FK_106D097471F7E88B');
        $this->addSql('DROP TABLE geo_data');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE fuel_refill');
        $this->addSql('DROP TABLE truck');
        $this->addSql('DROP TABLE refill_frigo');
        $this->addSql('DROP TABLE drivers');
        $this->addSql('DROP TABLE telefon_billing');
        $this->addSql('DROP TABLE ad_blue_refill');
        $this->addSql('DROP TABLE frigo_refill');
        $this->addSql('DROP TABLE trailer');
    }
}
