<?php

declare(strict_types=1);

namespace App\Application\UseCase\listAllNews;

use App\Domain\Entities\News;
use App\Domain\Repositories\INewsRepository;
use App\Infra\Presenters\NewsOutput;

final class ListAllNews
{
    private INewsRepository $repository;

    public function __construct(INewsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        $create = $this->repository->listAllNews();
    }
}
