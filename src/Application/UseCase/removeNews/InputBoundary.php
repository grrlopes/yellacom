<?php

declare(strict_types=1);

namespace App\Application\UseCase\removeNews;

interface InputBoundary
{
    public function execute(string $id);
}
