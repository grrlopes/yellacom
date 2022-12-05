<?php

declare(strict_types=1);

namespace App\Application\UseCase\updateNews;

use App\Domain\Entities\News;
use App\Domain\Repositories\INewsRepository;
use App\Infra\Presenters\UpdateOutput;

final class UpdateNews implements InputBoundary
{
    private INewsRepository $repository;

    public function __construct(INewsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(News $news): OutputBoundary
    {
        $update = $this->repository->updateNews(
            array(
              "_id" => (string)$news->getId(),
              "_rev" => (string)$news->getRev(),
              "author" => (string)$news->getAuthor(),
              "title" => (string)$news->getTitle(),
              "category" => (string)$news->getCategory(),
              "article" => (string)$news->getArticle(),
            )
        );

        $output = new UpdateOutput(
            $update->getMessage(),
        );

        return $output;
    }
}
