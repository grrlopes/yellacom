<?php

declare(strict_types=1);

namespace App\Domain\Validator;

use DomainException;

final class Name
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
        if (!$this->validate($this->name)) {
            throw new DomainException(
                "Text must be four characters and not more then twenty."
            );
        }
        return $this->name;
    }

    private function validate(string $name)
    {
        $parse = str_replace(array( '\'', '"', ',' , ';', '<', '>' ), ' ', $name);
        $parsed = filter_var($parse, FILTER_SANITIZE_SPECIAL_CHARS);
        $length = strlen($parsed);
        if ($length < 4 || $length >= 20) {
            return false;
        } else {
            return true;
        }
    }

    public function __toString(): string
    {
        return  $this->name;
    }
}
