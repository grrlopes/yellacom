<?php

use App\Domain\Entities\News;
use App\Domain\Validator\Name;
use PHPUnit\Framework\TestCase;

class NewsTest extends TestCase
{
    /**
    * It should evaluate character length
   **/
    public function testAuthor(): void
    {
        $author = new News();
        $author->setAuthor(new Name("Gabriel Lopes"));
        $this->assertEquals(
            $author->getAuthor(),
            "Gabriel Lopes"
        );
    }
    /**
    * It should return error if character is longer then twelf
   **/
    public function testAuthorError(): void
    {
        $addon = new News();
        $addon->setAuthor(new Name("Lopes Gabriel"));
        $this->assertEquals(
            $addon->getAuthor(),
            "Gabriel Lopes"
        );
    }
}
