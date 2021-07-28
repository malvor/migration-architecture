<?php

declare(strict_types=1);

namespace UI\Payload;

interface RequestProviderInterface
{
    public function getSupportedClass(): string;
    public function provideToPayload(object $request): array;
}
