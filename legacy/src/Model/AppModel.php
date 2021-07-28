<?php

declare(strict_types=1);

namespace Legacy\Model;

abstract class AppModel
{
    public function save()
    {
        dump('Do save legacy');
    }

    public function find(string $type, array $param): array
    {
        dump('Do find legacy!');
        return [];
    }
}
