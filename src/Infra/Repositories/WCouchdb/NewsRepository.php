<?php

declare(strict_types=1);

namespace App\Infra\Repositories\WCouchdb;

use App\Domain\Entities\News;
use App\Domain\Repositories\INewsRepository;
use App\Domain\Validator\Name;

final class NewsRepository implements INewsRepository
{
    public function saveNews(array $news): News
    {
        $data = new News();
        $data->setArticle("Article 2022");
        $data->setAuthor(new Name("cascao"));
        $data->setDatetime("13-00-2022");
        $data->setTitle(new Name("Idk know..."));

        var_dump($data);

        return $data;
    }
}
