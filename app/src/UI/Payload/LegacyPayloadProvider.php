<?php

declare(strict_types=1);

namespace App\UI\Payload;

use App\UI\Payload\RequestProviderInterface;
use JetBrains\PhpStorm\Pure;
use Legacy\LegacyRequest;

final class LegacyPayloadProvider implements RequestProviderInterface
{
    public function getSupportedClass(): string
    {
        return LegacyRequest::class;
    }

    /**
     * @param object $request
     * @return array
     */
    #[Pure]
    public function provideToPayload(object $request): array
    {
        /** @var LegacyRequest $request */
        return $request->getData();
    }
}
