<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Repository\InMemory;

use App\User\Domain\Repository\UserRepositoryInterface;
use App\User\Domain\Specification\UniqueEmailSpecificationInterface;
use App\User\Domain\User;
use App\User\Domain\ValueObject\Email;

final class UserInMemoryRepository implements UserRepositoryInterface, UniqueEmailSpecificationInterface
{
    private array $records;

    public function isUnique(Email $email): bool
    {
        return false === isset($records[$email->toString()]);
    }

    public function store(User $user): void
    {
        dump('Do save in memory');
        $this->records[$user->getEmail()->toString()] = $user;
    }
}
