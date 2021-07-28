<?php

declare(strict_types=1);

namespace App\User\Domain\ValueObject\Auth;

use Assert\Assertion;
use Assert\AssertionFailedException;
use RuntimeException;

final class HashedPassword
{
    private function __construct(private string $hashedPassword)
    {}

    /**
     * @param string $plainPassword
     * @return HashedPassword
     * @throws AssertionFailedException
     */
    public static function encode(string $plainPassword): self
    {
        return new self(self::hash($plainPassword));
    }

    public static function fromHash(string $hashedPassword): self
    {
        return new self($hashedPassword);
    }

    public function match(string $plainPassword): bool
    {        return \password_verify($plainPassword, $this->hashedPassword);
    }

    /**
     * @throws AssertionFailedException
     */
    private static function hash(string $plainPassword): string
    {
        Assertion::minLength($plainPassword, 6, 'Min 6 characters password');

        $hashedPassword = \md5($plainPassword);

        if (false === $hashedPassword) {
            throw new RuntimeException('Server error hashing password');
        }
        return (string) $hashedPassword;
    }

    public function toString(): string
    {
        return $this->hashedPassword;
    }

    public function __toString(): string
    {
        return $this->hashedPassword;
    }
}
