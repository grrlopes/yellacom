<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

use App\Domain\Entities\News;
use App\Domain\Validator\Name;

require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->post('/news', function (Request $request, Response $response) {
    try {
        $new = new News();
        $params = $request->getBody();
        $data = json_decode($params, true);

        $new->setAuthor(new Name($data["author"]));
        $new->setArticle($data["article"]);
        $new->setTitle($data["title"]);

        $response->getBody()->write((string)$new->getAuthor());
        return $response;
    } catch (\Throwable $e) {
        $response->getBody()->write($e->getMessage());
        return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
    }
});

$app->run();
