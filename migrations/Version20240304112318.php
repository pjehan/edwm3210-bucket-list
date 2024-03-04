<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240304112318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE wish_tag (wish_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_96CB7C5042B83698 (wish_id), INDEX IDX_96CB7C50BAD26311 (tag_id), PRIMARY KEY(wish_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wish_tag ADD CONSTRAINT FK_96CB7C5042B83698 FOREIGN KEY (wish_id) REFERENCES wish (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wish_tag ADD CONSTRAINT FK_96CB7C50BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_wish DROP FOREIGN KEY FK_39DECB7F42B83698');
        $this->addSql('ALTER TABLE tag_wish DROP FOREIGN KEY FK_39DECB7FBAD26311');
        $this->addSql('DROP TABLE tag_wish');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tag_wish (tag_id INT NOT NULL, wish_id INT NOT NULL, INDEX IDX_39DECB7FBAD26311 (tag_id), INDEX IDX_39DECB7F42B83698 (wish_id), PRIMARY KEY(tag_id, wish_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE tag_wish ADD CONSTRAINT FK_39DECB7F42B83698 FOREIGN KEY (wish_id) REFERENCES wish (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_wish ADD CONSTRAINT FK_39DECB7FBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wish_tag DROP FOREIGN KEY FK_96CB7C5042B83698');
        $this->addSql('ALTER TABLE wish_tag DROP FOREIGN KEY FK_96CB7C50BAD26311');
        $this->addSql('DROP TABLE wish_tag');
    }
}
