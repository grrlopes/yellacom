<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Entities\News;

interface INewsRepository
{
    public function saveNews(array $news): News;
    public function listAllNews(): News;
}
