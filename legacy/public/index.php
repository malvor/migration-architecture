<?php

declare(strict_types=1);

require __DIR__ . '/../../symfony_docker/vendor/autoload.php';

use Symfony\Component\ClassLoader\ClassLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;


$container = new ContainerBuilder();
$loader    = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../../symfony_docker/config'));
$loader->load('services.yaml');

$container->compile();
$diContainer = \Legacy\DependencyInjectionContainer::getInstance();
$diContainer->setContainer($container);

$controller = new \Legacy\Controller\LegacyUserController($diContainer->getContainer()->get('app.controller.user.show'));
$controller->show(5);
