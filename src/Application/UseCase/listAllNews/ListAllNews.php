<?php

declare(strict_types=1);

namespace App\Application\UseCase\listAllNews;

use App\Domain\Repositories\INewsRepository;

final class ListAllNews implements OutputBoundary
{
    private INewsRepository $repository;
    private array $datas;

    public function __construct(INewsRepository $repository)
    {
        $this->repository = $repository;
        $this->datas = array();
    }

    public function execute()
    {
        $create = $this->repository->listAllNews();
        $this->output($create);
    }

    public function output(array $value): array
    {
        foreach ($value["rows"] as $key => $data) {
            array_push($this->datas, $data["value"]);
        }

        return $this->datas;
    }
}
