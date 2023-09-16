#!/usr/bin/env php
<?php
define("APP_ROOT",__DIR__ . "/");

require("src/bootstrap.php");

use Symfony\Component\Console\Application;
use Src\Core\Config;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

$entityManager = EntityManager::create(
    Config::database()["connections"]["mysql"],
    Setup::createAttributeMetadataConfiguration([ APP_ROOT . "src/Entity" ])
);

$config = new PhpFile(APP_ROOT . 'src/Database/Config/migrations.php');
$dependencyFactory = DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));

$applicationCommands = Config::commands()["application"];
$migrationCommands = Config::commands()["migrations"];

$appVersion = $_ENV["VERSION"];
$appName = $_ENV["APP_NAME"];

$application = new Application($appName,$appVersion);

ConsoleRunner::addCommands($application, new SingleManagerProvider($entityManager));

$application->addCommands($migrationCommands($dependencyFactory));
$application->addCommands(array_map(fn($command)=>$container->get($command),$applicationCommands));


$application->run();