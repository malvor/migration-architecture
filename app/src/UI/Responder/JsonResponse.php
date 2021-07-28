<?php

declare(strict_types=1);

namespace App\UI\Responder;

use App\UI\Responder\ResponderInterface;

final class JsonResponse implements ResponderInterface
{
    public function response(array $data)
    {
        return new JsonResponse($data);
    }
}
