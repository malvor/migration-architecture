<?php

declare(strict_types=1);

namespace App\UI\Controller\User;

use App\UI\Payload\PayloadProviderInterface;
use App\UI\Responder\ResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

final class ShowAction
{
    public function __construct(
        private ResponderInterface $arrayResponse,
        private PayloadProviderInterface $payloadProvider
    ) {}

    public function __invoke($request)
    {
        $payload = $this->payloadProvider->provide($request);

        return $this->arrayResponse->response($payload);
    }
}
