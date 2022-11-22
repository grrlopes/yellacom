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
              "author" => (string)$news->getAuthor(),
              "title" => (string)$news->getTitle(),
              "category" => (string)$news->getCategory(),
              "article" => (string)$news->getArticle(),
              "create_at" => (string)$news->getCreate_at(),
            )
        );

        $output = new NewsOutput(
            "",
            "",
            "",
            "",
            $create->getMessage(),
        );

        return $output;
    }
}
