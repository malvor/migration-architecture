<?php

declare(strict_types=1);

namespace Legacy\Controller;

use App\Shared\Infrastructure\Bus\Command\MessengerCommandBus;
use App\User\Application\Command\CreateUser\CreateUserCommand;
use Legacy\Model\User;
use UI\Controller\User\CreateAction;
use UI\Controller\User\ShowAction;
use Legacy\LegacyRequest;

final class LegacyUserController
{
    public function __construct(
        private ShowAction $showAction,
        private CreateAction $createAction,
        private MessengerCommandBus $commandBus
    ) {

    }

    public function show(int $id)
    {
        $response = $this->showAction->__invoke(
            new LegacyRequest()
        );
    }

    public function signUp()
    {
        $data = [
            'email' => 'mail@example.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'password' => 'password'
        ];

        $this->commandBus->handle(
            new CreateUserCommand(
                $data['email'],
                $data['password'],
                $data['first_name'],
                $data['last_name']
            )
        );


    }

    public function oldSignUp()
    {
        $data = [
            'email' => 'mail@example.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'password' => 'password'
        ];

        $password = md5($data['password']);

        $user = new User();
        if ([] !== $user->find('first', ['email' => $data['email']])) {
            die('Email already exists');
        }

        $user->setEmail($data['email']);
        $user->setFirstName($data['first_name']);
        $user->setLastName($data['last_name']);
        $user->setPassword($password);
        $user->save();

        $this->sendWelcomeEmail($user);
        $this->sendAdminEmail($user);
    }

    public function index()
    {
        die('index');
    }

    public function delete()
    {
        die('delete');
    }

    private function sendWelcomeEmail(User $user)
    {
        dump('welcome email');
    }

    private function sendAdminEmail(User $user)
    {
        dump('Admin email');
    }
}
