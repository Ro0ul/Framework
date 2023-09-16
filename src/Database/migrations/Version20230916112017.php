<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230916112017 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $users = $schema->createTable("users");
        $users->addColumn("id",Types::INTEGER)->setAutoincrement(true);
        $users->addColumn("username",Types::STRING)->setNotnull(true);
        $users->addColumn("password",Types::STRING)->setNotnull(true);
        $users->addColumn("email",Types::STRING);
        $users->addColumn("joined_at",Types::DATETIME_MUTABLE)->setNotnull(true);
        $users->addColumn("updated_at",Types::DATETIME_MUTABLE)->setNotnull(true);
        $users->addColumn("is_banned",Types::BOOLEAN)->setNotnull(true);
        $users->setPrimaryKey(["id"]);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable("users");

    }
}
