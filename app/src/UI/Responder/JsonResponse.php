<?php

declare(strict_types=1);

namespace UI\Responder;

use UI\Responder\ResponderInterface;

final class JsonResponse implements ResponderInterface
{
    public function response(array $data, ?string $template = null)
    {
        return new JsonResponse($data);
    }
}
