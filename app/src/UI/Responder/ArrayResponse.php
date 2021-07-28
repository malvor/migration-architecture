<?php

declare(strict_types=1);

namespace App\UI\Responder;

use App\UI\Responder\ResponderInterface;

final class ArrayResponse implements ResponderInterface
{
    public function response(string $template, array $data)
    {
        return $data;
    }

}
