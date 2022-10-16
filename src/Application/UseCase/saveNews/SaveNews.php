<?php

declare(strict_types=1);

namespace App\Application\UseCase\saveNews;

use App\Domain\Entities\News;
use App\Domain\Repositories\INewsRepository;

final class SaveNews implements InputBoundaryDTO
{
    private INewsRepository $repository;

    public function __construct(INewsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(News $news)
    {
        $create = $this->repository->saveNews(
            array(
              "author" => (string)$news->getAuthor(),
            )
        );
    }
}
