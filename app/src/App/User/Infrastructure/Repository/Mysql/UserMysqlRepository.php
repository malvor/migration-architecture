<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Repository\Mysql;

use App\User\Domain\Repository\UserRepositoryInterface;
use App\User\Domain\Specification\UniqueEmailSpecificationInterface;
use App\User\Domain\User;
use App\User\Domain\ValueObject\Email;

final class UserMysqlRepository implements UserRepositoryInterface, UniqueEmailSpecificationInterface
{
    public function isUnique(Email $email): bool
    {
        return true;
    }

    public function store(User $user): void
    {
        dump('Do save in mysql');
    }
}
