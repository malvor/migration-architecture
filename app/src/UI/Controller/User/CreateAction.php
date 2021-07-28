<?php

declare(strict_types=1);

namespace UI\Controller\User;

use App\Shared\Infrastructure\Bus\Command\MessengerCommandBus;
use App\User\Application\Command\CreateUser\CreateUserCommand;

final class CreateAction
{
    public function __construct(private MessengerCommandBus $commandBus)
    {}

    public function __invoke()
    {
        $data = [
            'email' => 'mail@example.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'password' => 'password'
        ];

        $this->commandBus->handle(new CreateUserCommand(
            $data['email'],
            $data['password'],
            $data['first_name'],
            $data['last_name']
        ));
    }
}
