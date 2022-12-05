<?php

declare(strict_types=1);

namespace App\Application\UseCase\updateNews;

use App\Domain\Validator\Name;

interface OutputBoundary
{
    public function getMessage(): array;
}
