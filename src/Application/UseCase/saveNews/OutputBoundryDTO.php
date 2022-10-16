<?php

declare(strict_types=1);

namespace App\Application\UseCase\saveNews;

interface OutputBoundaryDTO
{
    public function getNews(): string;
}
