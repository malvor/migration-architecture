<?php

declare(strict_types=1);

namespace App\UI\Payload;

interface RequestProviderInterface
{
    public function getSupportedClass(): string;
    public function provideToPayload(object $request): array;
}
