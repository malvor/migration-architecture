<?php

declare(strict_types=1);

namespace App\UI\Payload\Exception;

use JetBrains\PhpStorm\Pure;

final class InvalidRequestProvider extends \InvalidArgumentException
{
    #[Pure]
    public function __construct(string $request)
    {
        parent::__construct(\sprintf('Provider for %s doesn\'t exist.', $request));
    }
}
