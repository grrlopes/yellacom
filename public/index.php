<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

use App\Domain\Entities\News;
use App\Domain\Validator\Name;
use App\Infra\Http\Controllers\News\ExportNews;
use App\Infra\Http\Controllers\News\ExportAllNews;

require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->addRoutingMiddleware();

$app->post("/news", function (Request $request, Response $response) {
    try {
        $news = new News();
        $params = $request->getBody();
        $parse = json_decode($params, true);

        $news->setArticle($parse["article"]);
        $news->setAuthor(new Name($parse["author"]));
        $news->setCreate_at($parse["create_at"]);
        $news->setTitle($parse["title"]);
        $news->setCategory($parse["category"]);

        $export = new ExportNews($news);
        $resp = $export->handler();

        $data = json_encode($resp);
        $response->getBody()->write($data);
        return $response
                  ->withheader('content-type', 'application/json')
                  ->withstatus(201);
    } catch (\Throwable $e) {
        $response->getBody()->write(
            json_encode(["code" => 500, "message" => $e->getMessage() ])
        );
        return $response
                  ->withheader('content-type', 'application/json')
                  ->withstatus(500);
    }
});

$app->get('/allnews', function (Request $request, Response $response) {
    try {
        $export = new ExportAllNews();
        $resp = $export->handler();

        $data = json_encode($resp);
        $response->getBody()->write($data);
        return $response
                  ->withheader('content-type', 'application/json');
    } catch (\Throwable $e) {
        $response->getBody()->write($e->getMessage());
        return $response
                  ->withHeader('Content-Type', 'application/json')
                  ->withStatus(400);
    }
});

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->run();
