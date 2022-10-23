<?php

declare(strict_types=1);

namespace App\Infra\Presenters;

use App\Application\UseCase\saveNews\OutputBoundary;
use App\Domain\Validator\Name;

class NewsOutput implements OutputBoundary
{
    private string $article;
    private string $title;
    private string $datetime;
    private array $message;

    public function __construct(
        string $article = null,
        string $title = null,
        string $datetime = null,
        array $message
    ) {
        $this->article = $article;
        $this->title = $title;
        $this->datetime = $datetime;
        $this->message = $message;
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

    public function getMessage(): array
    {
        return $this->message;
    }
}
