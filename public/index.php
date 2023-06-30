<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Crud\PDO\Repository\ProdutoRepository;

$host = 'localhost';
$dbname = 'produtos-base';
$username = 'root';
$password = '';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$produtoRepository = new ProdutoRepository($pdo);

$routes = require_once __DIR__ . '/../infrastructure/routes.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$key = "$httpMethod|$pathInfo";

if (array_key_exists($key, $routes)){ //se existe minha requisição em routes.php
    $controllerClass = $routes["$httpMethod|$pathInfo"];
    $controller = new $controllerClass($produtoRepository);
} else {
    $controller = new Error404Controller();
}
/** @var \Crud\PDO\Controller\Controller $controller */

$controller->processaRequisicao();
