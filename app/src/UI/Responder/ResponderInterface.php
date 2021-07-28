<?php

declare(strict_types=1);

namespace UI\Responder;

interface ResponderInterface
{
    public function response(array $data, ?string $template = null);
}
