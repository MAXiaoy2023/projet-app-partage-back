<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230726173956 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_borrower (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, ad_lender_id INT NOT NULL, message VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_3A68AF05A76ED395 (user_id), INDEX IDX_3A68AF05364F4E4 (ad_lender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_borrower ADD CONSTRAINT FK_3A68AF05A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE order_borrower ADD CONSTRAINT FK_3A68AF05364F4E4 FOREIGN KEY (ad_lender_id) REFERENCES ad_lender (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_borrower DROP FOREIGN KEY FK_3A68AF05A76ED395');
        $this->addSql('ALTER TABLE order_borrower DROP FOREIGN KEY FK_3A68AF05364F4E4');
        $this->addSql('DROP TABLE order_borrower');
    }
}
