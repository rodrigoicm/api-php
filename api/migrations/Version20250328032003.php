<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250328032003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE foto_pessoa ALTER ft_data DROP NOT NULL');
        $this->addSql('ALTER TABLE foto_pessoa ALTER ft_bucket TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE foto_pessoa ALTER ft_bucket DROP NOT NULL');
        $this->addSql('ALTER TABLE foto_pessoa ALTER dt_hash TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE foto_pessoa ALTER dt_hash DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE foto_pessoa ALTER ft_data SET NOT NULL');
        $this->addSql('ALTER TABLE foto_pessoa ALTER ft_bucket TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE foto_pessoa ALTER ft_bucket SET NOT NULL');
        $this->addSql('ALTER TABLE foto_pessoa ALTER dt_hash TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE foto_pessoa ALTER dt_hash SET NOT NULL');
    }
}
