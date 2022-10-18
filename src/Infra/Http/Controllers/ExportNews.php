<?php

declare(strict_types=1);

namespace App\Infra\Http\Controllers;

use App\Application\UseCase\saveNews\SaveNews;
use App\Domain\Entities\News;
use App\Domain\Repositories\INewsRepository;
use App\Infra\Repositories\WCouchdb\NewsRepository;

final class ExportCategory
{
    private SaveNews $useCase;
    private INewsRepository $repository;
    private News $news;

    public function __construct(News $news)
    {
        $this->repository = new NewsRepository();
        $this->useCase = new SaveNews($this->repository);
        $this->news = $news;
    }

    public function handler()
    {
        $data = $this->useCase->execute($this->news);

        echo $data->getAuthor();
    }
}
