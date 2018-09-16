<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180825222406 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, produits_id INT DEFAULT NULL, date DATETIME NOT NULL, UNIQUE INDEX UNIQ_6EEAA67DA76ED395 (user_id), UNIQUE INDEX UNIQ_6EEAA67DCD11A2CF (produits_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, produits_id INT DEFAULT NULL, quantite INT NOT NULL, prix_unitaire DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_24CC0DF2CD11A2CF (produits_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(125) NOT NULL, description LONGTEXT NOT NULL, prix DOUBLE PRECISION NOT NULL, disponible TINYINT(1) NOT NULL, categories VARCHAR(40) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(100) NOT NULL, nom VARCHAR(100) NOT NULL, adresse LONGTEXT NOT NULL, email VARCHAR(255) NOT NULL, telephone INT NOT NULL, code_postal VARCHAR(6) NOT NULL, username VARCHAR(20) NOT NULL, password VARCHAR(20) NOT NULL, salt VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DCD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2CD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DCD11A2CF');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2CD11A2CF');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DA76ED395');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE produits');
        $this->addSql('DROP TABLE user');
    }
}
