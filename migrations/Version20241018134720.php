<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241018134720 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE card_maj (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, number VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE card_min (id INT AUTO_INCREMENT NOT NULL, numero VARCHAR(255) NOT NULL, suite2 VARCHAR(255) NOT NULL, qualite VARCHAR(255) NOT NULL, defaut VARCHAR(255) NOT NULL, image3 VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE card_roy (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, suite VARCHAR(255) NOT NULL, description2 VARCHAR(255) NOT NULL, image2 VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) DEFAULT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hero (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, card_maj_id INT NOT NULL, card_roy_id INT NOT NULL, card_min_id INT NOT NULL, name VARCHAR(255) NOT NULL, color VARCHAR(50) NOT NULL, animal VARCHAR(50) NOT NULL, yeux VARCHAR(255) NOT NULL, morphologie VARCHAR(255) NOT NULL, cheveux VARCHAR(255) NOT NULL, INDEX IDX_51CE6E86A76ED395 (user_id), INDEX IDX_51CE6E861E5EBBEB (card_maj_id), INDEX IDX_51CE6E8611424DB5 (card_roy_id), INDEX IDX_51CE6E86A14C677D (card_min_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E86A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E861E5EBBEB FOREIGN KEY (card_maj_id) REFERENCES card_maj (id)');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E8611424DB5 FOREIGN KEY (card_roy_id) REFERENCES card_roy (id)');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E86A14C677D FOREIGN KEY (card_min_id) REFERENCES card_min (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E86A76ED395');
        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E861E5EBBEB');
        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E8611424DB5');
        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E86A14C677D');
        $this->addSql('DROP TABLE card_maj');
        $this->addSql('DROP TABLE card_min');
        $this->addSql('DROP TABLE card_roy');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE hero');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
