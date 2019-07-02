<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190702122849 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pizza_pizzeria (pizza_id INT NOT NULL, pizzeria_id INT NOT NULL, INDEX IDX_8D2EEC7FD41D1D42 (pizza_id), INDEX IDX_8D2EEC7FF1965E46 (pizzeria_id), PRIMARY KEY(pizza_id, pizzeria_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pizza_pizzeria ADD CONSTRAINT FK_8D2EEC7FD41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pizza_pizzeria ADD CONSTRAINT FK_8D2EEC7FF1965E46 FOREIGN KEY (pizzeria_id) REFERENCES pizzeria (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pizzeria CHANGE nom nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE pizzaiolo CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE numero_secu numero_secu VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE ingredient CHANGE nom nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE pizza CHANGE nom nom VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE pizza_pizzeria');
        $this->addSql('ALTER TABLE ingredient CHANGE nom nom VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE pizza CHANGE nom nom VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE pizzaiolo CHANGE nom nom VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE prenom prenom VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE numero_secu numero_secu VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE pizzeria CHANGE nom nom VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
