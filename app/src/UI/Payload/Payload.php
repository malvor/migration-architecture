<?php

declare(strict_types=1);

namespace App\UI\Payload;

final class Payload
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function validatePayload(array $payload, string $constraintCollectionClass): void
    {
        /** @var BaseConstraintCollection $constraintCollectionClass */
        $errors = $this->validator->validate($payload, $constraintCollectionClass::getConstraints());
        if ($errors->count()) {
            throw new ValidationException($errors);
        }
    }
}
