<?php

declare(strict_types=1);

namespace App\Application\UseCase\saveNews;

use App\Domain\Validator\Name;

interface OutputBoundary
{
    public function getArticle(): string;

    public function getAuthor(): Name;

    public function getTitle(): string;

    public function getCreate_at(): string;

    public function getMessage(): array;
}
