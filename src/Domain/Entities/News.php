<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\Validator\Name;

final class News
{
    private Name $author;
    private string $title;
    private string $datetime;
    private string $article;

    /**
     * @return string
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
    public function setTitle(Name $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string $datetime
     */
    public function getDatetime(): string
    {
        return $this->datetime;
    }

    /**
     * @param string $datetime
     */
    public function setDatetime(string $datetime): self
    {
        $this->datetime = $datetime;
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
}
