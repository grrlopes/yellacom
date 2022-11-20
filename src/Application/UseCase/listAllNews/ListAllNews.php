<?php

declare(strict_types=1);

namespace App\Application\UseCase\listAllNews;

use App\Domain\Repositories\INewsRepository;
use Exception;

final class ListAllNews implements OutputBoundary
{
    private INewsRepository $repository;
    private array $datas;

    public function __construct(INewsRepository $repository)
    {
        $this->repository = $repository;
        $this->datas = array();
    }

    public function execute(): array
    {
        try {
            $create = $this->repository->listAllNews();
            if (empty($create["rows"])) {
                throw new Exception("There is no data!");
            }
            return $this->output($create);
        } catch (\Throwable $e) {
            return ["message" => $e->getMessage()];
        }
    }

    public function output(array $value): array
    {
        foreach ($value["rows"] as $data) {
            array_push($this->datas, $data["value"]);
        }

        return $this->datas;
    }
}
