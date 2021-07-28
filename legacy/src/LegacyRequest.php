<?php

declare(strict_types=1);

namespace Legacy;

final class LegacyRequest
{
    private array $data;

    public function __construct()
    {
        $this->data = [
            'field_1' => 'test'
        ];
    }

    public function getData(): array
    {
        return $this->data;
    }
}
