<?php

declare(strict_types=1);

namespace App\Infra\Repositories\WCouchdb;

use App\Domain\Entities\News;
use App\Domain\Repositories\INewsRepository;
use App\Domain\Validator\Name;
use App\Infra\Presenters\NewsOutput;
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
}
