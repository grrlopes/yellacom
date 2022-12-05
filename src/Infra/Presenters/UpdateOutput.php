<?php

declare(strict_types=1);

namespace App\Infra\Presenters;

use App\Application\UseCase\updateNews\OutputBoundary;

class UpdateOutput implements OutputBoundary
{
    private array $message;

    public function __construct(
        array $message = []
    ) {
        $this->message = $message;
    }

    public function getMessage(): array
    {
        return $this->message;
    }
}
