<?php

declare(strict_types=1);

namespace App\Application\UseCase\listAllNews;

use App\Domain\Validator\Name;

interface Output
{
    public function getArticle(): string;

    public function getAuthor(): Name;

    public function getTitle(): string;

    public function getDateTime(): string;

    public function getMessage(): array;
}

interface OutputBoundary{
    public function output(array $data): array;
}
