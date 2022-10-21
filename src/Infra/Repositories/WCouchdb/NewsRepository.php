<?php

declare(strict_types=1);

namespace App\Infra\Repositories\WCouchdb;

use App\Domain\Entities\News;
use App\Domain\Repositories\INewsRepository;
use App\Domain\Validator\Name;
use App\Infra\Repositories\WCouchdb\Persistor\Conn;

final class NewsRepository implements INewsRepository
{
    private Conn $Persistor;
    public function __construct()
    {
        $this->Persistor = new Conn();
    }

    public function saveNews(array $news): News
    {
        $data = new News();
        $data->setArticle("Article 2022");
        $data->setAuthor(new Name("cascao-YYY"));
        $data->setDatetime("13-00-2022");
        $data->setTitle("Idk know...");

        $resp = $this->Persistor->getConn()->request("GET", "7bcb09a12fa4dbea4687034400000f04", $this->Persistor->credencial());
        // echo $resp->getBody()->getContents();

        return $data;
    }
}
