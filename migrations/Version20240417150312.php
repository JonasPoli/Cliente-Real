<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240417150312 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE log (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, entity VARCHAR(255) DEFAULT NULL, action VARCHAR(255) DEFAULT NULL, date_time DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', changed_fields JSON DEFAULT NULL, entity_id INT DEFAULT NULL, INDEX IDX_8F3F68C5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE log ADD CONSTRAINT FK_8F3F68C5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        //$this->addSql('ALTER TABLE product_category DROP features, DROP short_description, DROP subtitle');
        //$this->addSql('ALTER TABLE service DROP slug');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE log DROP FOREIGN KEY FK_8F3F68C5A76ED395');
        $this->addSql('DROP TABLE log');
        //$this->addSql('ALTER TABLE product_category ADD features LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', ADD short_description VARCHAR(255) DEFAULT NULL, ADD subtitle VARCHAR(255) DEFAULT NULL');
        //$this->addSql('ALTER TABLE service ADD slug VARCHAR(255) DEFAULT NULL');
    }
}
