<?php

declare(strict_types=1);

require __DIR__ . '/../../symfony_docker/vendor/autoload.php';

$kernel = new \App\Shared\Infrastructure\Kernel('dev', true);
$kernel->boot();

$diContainer = $kernel->getContainer();

$controller = new \Legacy\Controller\LegacyUserController(
    $diContainer->get('app.controller.user.show'),
    $diContainer->get('app.controller.user.create'),
    $diContainer->get('App\Shared\Infrastructure\Bus\Command\MessengerCommandBus')
);
$controller->signUp();
