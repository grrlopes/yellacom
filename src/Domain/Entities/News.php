<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\Validator\Name;

final class News
{
    private Name $author;
    private string $title;
    private string $create_at;
    private string $article;
    private string $category;
    private array $message;

    /**
     * @return Name
     */
    public function getAuthor(): Name
    {
        return $this->author;
    }

    /**
     * @param string $autor
     */
    public function setAuthor(Name $author): self
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string $create_at
     */
    public function getCreate_at(): string
    {
        return $this->create_at;
    }

    /**
     * @param string $create_at
     */
    public function setCreate_at(string $create_at): self
    {
        $this->create_at = $create_at;
        return $this;
    }

    /**
     * @return string $article
     */
    public function getArticle(): string
    {
        return $this->article;
    }

    /**
     * @param string $article
     */
    public function setArticle(string $article): self
    {
        $this->article = $article;
        return $this;
    }

    /**
     * @return array $message
     */
    public function getMessage(): array
    {
        return $this->message;
    }

    /**
     * @param string $article
     */
    public function setMessage(array $message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string $category
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): self
    {
        $this->category = $category;
        return $this;
    }

}
