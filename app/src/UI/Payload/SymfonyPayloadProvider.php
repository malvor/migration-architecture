<?php

declare(strict_types=1);

namespace UI\Payload;

use UI\Payload\RequestProviderInterface;
use Symfony\Component\HttpFoundation\Request;

final class SymfonyPayloadProvider implements RequestProviderInterface
{
    public function getSupportedClass(): string
    {
        return Request::class;
    }

    public function provideToPayload(object $request): array
    {
        /** @var Request $request */
        $result = [];
        if (false === empty($request->getContent())) {
            $result = \json_decode($request->getContent(), true);
        }

        if (null === $result) {
            throw new \InvalidArgumentException('Malformed JSON data');
        }

        return $result;
    }
}
