<?php

declare(strict_types=1);

namespace App\Infra\Presenters;

use App\Application\UseCase\saveNews\OutputBoundary;
use App\Domain\Validator\Name;

class NewsOutput implements OutputBoundary
{
    private string $article;
    private string $title;
    private string $category;
    private string $create_at;
    private array $message;

    public function __construct(
        string $article = null,
        string $title = null,
        string $category = null,
        string $create_at = null,
        array $message
    ) {
        $this->article = $article;
        $this->title = $title;
        $this->category = $category;
        $this->create_at = $create_at;
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

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getCreate_at(): string
    {
        return $this->create_at;
    }

    public function getMessage(): array
    {
        return $this->message;
    }
}
