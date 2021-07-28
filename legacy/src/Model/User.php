<?php

declare(strict_types=1);

namespace Legacy\Model;

use App\User\Domain\Repository\UserRepositoryInterface;
use App\User\Domain\Specification\UniqueEmailSpecificationInterface;
use App\User\Domain\ValueObject\Email;

final class User extends AppModel implements UserRepositoryInterface, UniqueEmailSpecificationInterface
{
    private ?string $firstName = null;
    private ?string $lastName = null;
    private ?string $email = null;
    private ?string $password = null;

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function isUnique(Email $email): bool
    {
        return [] !== $this->find('first', ['email' => $email]);
    }

    public function store(\App\User\Domain\User $user): void
    {
        $newUser = new self();
        $newUser->email = $user->getEmail()->toString();
        $newUser->password = $user->getHashedPassword()->toString();
        $newUser->firstName = $user->getFirstName();
        $newUser->lastName = $user->getLastName();

        $newUser->save();
    }
}
