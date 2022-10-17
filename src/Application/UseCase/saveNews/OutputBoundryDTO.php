<?php

declare(strict_types=1);

namespace App\Application\UseCase\saveNews;

interface OutputBoundaryDTO
{
    public function getArticle(): string;

    public function getAuthor(): string;

    public function getTitle(): string;

    public function getDateTime(): string;
}
