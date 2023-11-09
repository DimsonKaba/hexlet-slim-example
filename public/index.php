<?php

require __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write('Welcome to Slim!');
    return $response;
    // Благодаря пакету slim/http этот же код можно записать короче:
    // return $response->write('Welcome to Slim!');
});

$app->get('/users', function (Request $request, Response $response) {
    $response->getBody()->write('GET /users');
    return $response;
});

$app->post('/users', function (Request $request, Response $response) {
    return $response->withStatus(302);
});

$app->run();
