<?php

declare(strict_types=1);

namespace App\UI\Responder;

interface ResponderInterface
{
    public function response(string $template, array $data);
}
