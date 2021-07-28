<?php

declare(strict_types=1);

namespace UI\Controller\User;

use UI\Payload\PayloadProviderInterface;
use UI\Responder\ResponderInterface;
use Legacy\LegacyRequest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

final class ShowAction
{
    public function __construct(
        private ResponderInterface $arrayResponse,
        private PayloadProviderInterface $payloadProvider
    ) {}

    public function __invoke(LegacyRequest $request)
    {
        $payload = $this->payloadProvider->provide($request);

        return $this->arrayResponse->response($payload);
    }
}
