<?php

declare(strict_types=1);

namespace App\Shared\Domain\Exception;

use DomainException;
use Exception;

class DateTimeException extends DomainException
{
    public function __construct(Exception $e)
    {
        parent::__construct('Datetime Malformed or not valid', 500, $e);
    }
}
