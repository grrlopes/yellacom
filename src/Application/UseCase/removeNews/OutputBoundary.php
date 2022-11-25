<?php

declare(strict_types=1);

namespace App\Application\UseCase\removeNews;

interface OutputBoundary
{
    public function getMessage(): array;
}
