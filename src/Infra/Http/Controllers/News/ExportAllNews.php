<?php

declare(strict_types=1);

namespace App\Infra\Http\Controllers\News;

use App\Application\UseCase\listAllNews\ListAllNews;
use App\Domain\Entities\News;
use App\Domain\Repositories\INewsRepository;
use App\Infra\Repositories\WCouchdb\NewsRepository;

final class ExportAllNews
{
    private ListAllNews $useCase;
    private INewsRepository $repository;
    private News $news;

    public function __construct()
    {
        $this->repository = new NewsRepository();
        $this->useCase = new ListAllNews($this->repository);
    }

    public function handler()
    {
        $data = $this->useCase->execute();
    }
}
