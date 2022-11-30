<?php

declare(strict_types=1);

namespace App\Application\UseCase\UpdateNews;

use App\Domain\Entities\News;

interface InputBoundary
{
    public function execute(News $new);
}
