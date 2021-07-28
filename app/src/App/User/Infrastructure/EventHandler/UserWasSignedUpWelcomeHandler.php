<?php

declare(strict_types=1);

namespace App\User\Infrastructure\EventHandler;

use App\Shared\Infrastructure\Bus\Event\EventHandlerInterface;
use App\User\Domain\Event\UserWasSignedUp;

final class UserWasSignedUpWelcomeHandler implements EventHandlerInterface
{
    public function __invoke(UserWasSignedUp $event): void
    {
        dump('send welcome email');
    }
}
