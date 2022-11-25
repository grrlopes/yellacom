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

    public function execute(string $id): OutputBoundary
    {
        $create = $this->repository->removeNews($id);

        $output = new RemoveOutput(
            $create->getMessage(),
        );

        return $output;
    }
}
