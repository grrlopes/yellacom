<?php

declare(strict_types=1);

namespace App\Application\UseCase\saveNews;

use App\Domain\Entities\News;

interface InputBoundaryDTO
{
    public function execute(News $new);
}
