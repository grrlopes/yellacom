<?php

declare(strict_types=1);

namespace App\Application\UseCase\saveNews;

use App\Domain\Entities\News;
use App\Domain\Repositories\INewsRepository;
use App\Infra\Presenters\NewsOutput;

final class SaveNews implements InputBoundary
{
    private INewsRepository $repository;

    public function __construct(INewsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(News $news): OutputBoundary
    {
        $create = $this->repository->saveNews(
            array(
              "author" => $news->getAuthor(),
              "title" => (string)$news->getTitle(),
              "article" => (string)$news->getArticle(),
              "datetime" => (string)$news->getDatetime(),
            )
        );

        $output = new NewsOutput(
            $create->getArticle(),
            $create->getAuthor(),
            $create->getTitle(),
            $create->getDatetime(),
        );

        return $output;
    }
}
