<?php

namespace App\Infra\Repositories\WCouchdb\Persistor;

use GuzzleHttp\Client;

class Conn
{
    private string $baseUrl;
    private string $user;
    private string $pass;

    public function __construct()
    {
        $this->baseUrl = getenv("URL");
        $this->user = getenv("USER");
        $this->pass = getenv("PASS");
    }

    public function getConn(): Client
    {
        $con = new Client([
          'base_uri' => $this->baseUrl,
          'timeout'  => 2.0,
        ]);

        return $con;
    }

    public function credencial(): array
    {
        return array(
          "auth" => array(
            $this->user, $this->pass
          )
        );
    }
}
