<?php

declare(strict_types=1);

namespace App\Shared\Application\Query;

interface QueryHandlerInterface
{
    /** @return mixed */
    public function ask(QueryInterface $query);
}
