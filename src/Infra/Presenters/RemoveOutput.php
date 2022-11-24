<?php

declare(strict_types=1);

namespace App\Infra\Presenters;

use App\Application\UseCase\removeNews\OutputBoundary;

class RemoveOutput implements OutputBoundary
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
