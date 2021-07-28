<?php

declare(strict_types=1);

namespace UI\Payload;

use UI\Payload\Exception\InvalidRequestProvider;
use UI\Payload\PayloadProviderInterface;
use UI\Payload\RequestProviderInterface;

final class PayloadProvider implements PayloadProviderInterface
{
    /** @var array<RequestProviderInterface> */
    private array $providers;

    public function __construct(
        iterable $requestProviders
    ) {
        foreach ($requestProviders as $requestProvider) {
            $this->registerProvider($requestProvider);
        }
    }

    public function provide(object $request): array
    {
        $provider = $this->providers[$request::class] ?? null;

        if (null === $provider) {
            throw new InvalidRequestProvider($request::class);
        }

        return $provider->provideToPayload($request);
    }

    private function registerProvider(RequestProviderInterface $requestProvider)
    {
        $this->providers[$requestProvider->getSupportedClass()] = $requestProvider;
    }
}
