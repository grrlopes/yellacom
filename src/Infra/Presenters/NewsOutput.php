<?php

declare(strict_types=1);

namespace App\Infra\Presenters;

use App\Application\UseCase\saveNews\OutputBoundary;

class NewsOutput implements OutputBoundary
{
    private string $article;
    private string $author;
    private string $title;
    private string $datetime;

    public function __construct(string $article, string $author, string $title, string $datetime)
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

    public function getAuthor(): string
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
