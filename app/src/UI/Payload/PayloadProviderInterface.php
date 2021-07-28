<?php

declare(strict_types=1);

namespace App\UI\Payload;

interface PayloadProviderInterface
{
    public function provide(object $request): array;
}
