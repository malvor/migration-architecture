<?php

declare(strict_types=1);

namespace App\User\Domain;

use App\User\Domain\Specification\UniqueEmailSpecificationInterface;
use App\User\Domain\ValueObject\Auth\HashedPassword;
use App\User\Domain\ValueObject\Email;

final class User
{
    public static function create(
        Email $email,
        HashedPassword $password,
        string $firstName,
        string $lastName,
        UniqueEmailSpecificationInterface $uniqueEmailSpecification
    ): self {
        $uniqueEmailSpecification->isUnique($email);

        return new User($email, $password, $firstName, $lastName);
    }

    private function __construct(
        private Email $email,
        private HashedPassword $hashedPassword,
        private string $firstName,
        private string $lastName
    ) {
    }

    public function changeName(string $firstName, string $lastName): void
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function changeEmail(
        Email $email,
        UniqueEmailSpecificationInterface $uniqueEmailSpecification
    ): void {
        $uniqueEmailSpecification->isUnique($email);

        $this->email = $email;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getHashedPassword(): HashedPassword
    {
        return $this->hashedPassword;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
}
