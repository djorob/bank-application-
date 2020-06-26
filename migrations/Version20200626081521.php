<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200626081521 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE transactions (id INT AUTO_INCREMENT NOT NULL, account_id_id INT DEFAULT NULL, user_id_id INT NOT NULL, transactions_id INT NOT NULL, transaction_date DATETIME NOT NULL, montant DOUBLE PRECISION NOT NULL, bank_name VARCHAR(255) NOT NULL, beneficiary_account VARCHAR(255) NOT NULL, beneficiary_name VARCHAR(255) NOT NULL, reference INT NOT NULL, transaction_type VARCHAR(255) NOT NULL, INDEX IDX_EAA81A4C49CB4726 (account_id_id), INDEX IDX_EAA81A4C9D86650F (user_id_id), INDEX IDX_EAA81A4C77E1607F (transactions_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT FK_EAA81A4C49CB4726 FOREIGN KEY (account_id_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT FK_EAA81A4C9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT FK_EAA81A4C77E1607F FOREIGN KEY (transactions_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE transactions');
    }
}
