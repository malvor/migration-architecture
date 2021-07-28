<?php

declare(strict_types=1);

namespace App\User\Application\Command\CreateUser;

use App\Shared\Application\Command\CommandHandlerInterface;
use App\Shared\Domain\ValueObject\DateTime;
use App\Shared\Infrastructure\Bus\Event\MessengerEventBus;
use App\User\Domain\Event\UserWasSignedUp;
use App\User\Domain\Repository\UserRepositoryInterface;
use App\User\Domain\Specification\UniqueEmailSpecificationInterface;
use App\User\Domain\User;
use App\User\Domain\ValueObject\Auth\HashedPassword;
use App\User\Domain\ValueObject\Email;

final class CreateUserCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private UniqueEmailSpecificationInterface $uniqueEmailSpecification,
        private MessengerEventBus $eventBus
    ) {}

    public function __invoke(CreateUserCommand $command): void
    {
        try {
            $user = User::create(
                Email::fromString($command->getEmail()),
                HashedPassword::encode($command->getPassword()),
                $command->getFirstName(),
                $command->getLastName(),
                $this->uniqueEmailSpecification
            );
        } catch(\Exception $exception) {
            dd($exception->getMessage());
        }

        $this->userRepository->store(
            $user
        );

        $this->eventBus->handle(new UserWasSignedUp(
            $command->getEmail(),
            DateTime::now()->toString()
        ));
    }
}
