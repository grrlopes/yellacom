<?php

declare(strict_types=1);

namespace App\Infra\Http\Controllers\News;

use App\Application\UseCase\removeNews\RemoveNews;
use App\Domain\Repositories\INewsRepository;
use App\Infra\Repositories\WCouchdb\NewsRepository;

final class ExportRemove
{
    private RemoveNews $useCase;
    private INewsRepository $repository;
    private string $id;
    private string $rev;

    public function __construct(string $id, string $rev)
    {
        $this->repository = new NewsRepository();
        $this->useCase = new RemoveNews($this->repository);
        $this->id = $id;
        $this->rev = $rev;
    }

    public function handler(): array
    {
        $data = $this->useCase->execute($this->id, $this->rev);

        return $data->getMessage();
    }
}
