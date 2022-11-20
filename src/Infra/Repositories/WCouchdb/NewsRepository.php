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
        $load = $this->Persistor->credencial([
          "headers" => ["Content-Type" => "application/json"],
          "body" => json_encode($news)
        ]);

        $resp = $this->Persistor->getConn()->post(
            "",
            $load
        );

        $parsed = $resp->getBody()->getContents();

        $data->setMessage(json_decode($parsed, true));

        return $data;
    }

    public function listAllNews(): Array
    {
        $load = $this->Persistor->credencial([
          "headers" => ["Content-Type" => "application/json"]
        ]);

        $resp = $this->Persistor->getConn()->get(
            "_design/news/_view/allnews",
            $load
        );

        $parsed = $resp->getBody()->getContents();

        $data = json_decode($parsed, true);

        return $data;
    }
}
