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

    public function execute(News $news): string
    {
        $create = $this->repository->saveNews(
            array(
              "author" => (string)$news->getAuthor(),
              "title" => (string)$news->getTitle(),
              "article" => (string)$news->getArticle(),
              "datetime" => (string)$news->getDatetime(),
            )
        );
        echo $create->getAuthor();
        return $create->getAuthor();
    }
}
