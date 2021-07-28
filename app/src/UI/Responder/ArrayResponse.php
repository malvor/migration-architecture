<?php

declare(strict_types=1);

namespace UI\Responder;

use UI\Responder\ResponderInterface;

final class ArrayResponse implements ResponderInterface
{
    public function response(array $data, ?string $template = null)
    {
        return $data;
    }

}
