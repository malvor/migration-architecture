<?php

declare(strict_types=1);

namespace App\User\Domain\Repository;

use App\User\Domain\User;

interface UserRepositoryInterface
{
    public function store(User $user): void;
}
