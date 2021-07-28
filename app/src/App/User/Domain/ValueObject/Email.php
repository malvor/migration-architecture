<?php

declare(strict_types=1);

namespace App\User\Domain\ValueObject;

use Assert\Assertion;
use Assert\AssertionFailedException;

final class Email
{
    private function __construct(private string $email)
    {}

    /**
     * @param string $email
     * @return Email
     * @throws AssertionFailedException
     */
    public static function fromString(string $email): self
    {
        Assertion::email($email, 'Not a valid email');

        return new self($email);
    }

    public function toString(): string
    {
        return $this->email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
