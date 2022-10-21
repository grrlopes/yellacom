<?php

declare(strict_types=1);

namespace App\Infra\Presenters;

use App\Application\UseCase\saveNews\OutputBoundary;
use App\Domain\Validator\Name;

class NewsOutput implements OutputBoundary
{
    private string $article;
    private Name $author;
    private string $title;
    private string $datetime;

    public function __construct(string $article, Name $author, string $title, string $datetime)
    {
        $this->article = $article;
        $this->author = $author;
        $this->title = $title;
        $this->datetime = $datetime;
    }

    public function getArticle(): string
    {
        return $this->article;
    }

    public function getAuthor(): Name
    {
        return $this->author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDateTime(): string
    {
        return $this->datetime;
    }
}
