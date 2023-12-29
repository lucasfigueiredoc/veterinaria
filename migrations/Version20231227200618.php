<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231227200618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal (id INT AUTO_INCREMENT NOT NULL, iddono_id INT DEFAULT NULL, nome VARCHAR(20) DEFAULT NULL, peso DOUBLE PRECISION DEFAULT NULL, nascimento DATE DEFAULT NULL, INDEX IDX_6AAB231F18746A32 (iddono_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cliente (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(50) NOT NULL, telefone VARCHAR(15) DEFAULT NULL, endereco VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consulta (id INT AUTO_INCREMENT NOT NULL, idfuncionario_id INT DEFAULT NULL, idanimal_id INT NOT NULL, idcliente_id INT DEFAULT NULL, data DATE NOT NULL, valor DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_A6FE3FDE75577A3D (idfuncionario_id), UNIQUE INDEX UNIQ_A6FE3FDEF08D85E3 (idanimal_id), UNIQUE INDEX UNIQ_A6FE3FDE13DA536B (idcliente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE funcionario (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(50) NOT NULL, funcao VARCHAR(30) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F18746A32 FOREIGN KEY (iddono_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE consulta ADD CONSTRAINT FK_A6FE3FDE75577A3D FOREIGN KEY (idfuncionario_id) REFERENCES funcionario (id)');
        $this->addSql('ALTER TABLE consulta ADD CONSTRAINT FK_A6FE3FDEF08D85E3 FOREIGN KEY (idanimal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE consulta ADD CONSTRAINT FK_A6FE3FDE13DA536B FOREIGN KEY (idcliente_id) REFERENCES cliente (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F18746A32');
        $this->addSql('ALTER TABLE consulta DROP FOREIGN KEY FK_A6FE3FDE75577A3D');
        $this->addSql('ALTER TABLE consulta DROP FOREIGN KEY FK_A6FE3FDEF08D85E3');
        $this->addSql('ALTER TABLE consulta DROP FOREIGN KEY FK_A6FE3FDE13DA536B');
        $this->addSql('DROP TABLE animal');
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE consulta');
        $this->addSql('DROP TABLE funcionario');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
