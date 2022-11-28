<?php

declare(strict_types=1);

namespace App\Application\UseCase\removeNews;

use App\Domain\Repositories\INewsRepository;
use App\Infra\Presenters\RemoveOutput;

final class RemoveNews implements InputBoundary
{
    private INewsRepository $repository;

    public function __construct(INewsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $id, string $rev): OutputBoundary
    {
        $ids = $id."?rev=".$rev;

        $create = $this->repository->removeNews($ids);

        $output = new RemoveOutput(
            $create->getMessage(),
        );

        return $output;
    }
}
