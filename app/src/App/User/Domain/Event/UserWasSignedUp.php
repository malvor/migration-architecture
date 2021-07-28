<?php

declare(strict_types=1);

namespace App\User\Domain\Event;

use App\Shared\Domain\EventInterface;

final class UserWasSignedUp implements EventInterface
{
    public function __construct(
        private string $email,
        private string $date
    )
    {}

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getDate(): string
    {
        return $this->date;
    }
}
