<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Bus\Event;

use App\Shared\Domain\EventInterface;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\MessageBusInterface;
use Throwable;

final class MessengerEventBus implements EventBusInterface
{
    private MessageBusInterface $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @throws Throwable
     */
    public function handle(EventInterface $event): void
    {
        try {
            $this->messageBus->dispatch($event);
        } catch (HandlerFailedException $e) {
            throw $e;
        }
    }
}

