<?php

declare(strict_types=1);

namespace App\Infra\Http\Controllers\News;

use App\Application\UseCase\updateNews\UpdateNews;
use App\Domain\Entities\News;
use App\Domain\Repositories\INewsRepository;
use App\Infra\Repositories\WCouchdb\NewsRepository;

final class ExportUpdate
{
    private UpdateNews $useCase;
    private INewsRepository $repository;
    private News $news;

    public function __construct(News $news)
    {
        $this->repository = new NewsRepository();
        $this->useCase = new UpdateNews($this->repository);
        $this->news = $news;
    }

    public function handler(): array
    {
        $data = $this->useCase->execute($this->news);

        return $data->getMessage();
    }
}
