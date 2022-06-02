<?php

use App\Application\Contract\ProductServiceInterface;
use App\Application\Service\ProductService;
use App\Domain\Contract\ProductRepositoryInterface;
use App\Domain\Contract\ReviewRepositoryInterface;
use App\Infrastructure\Contract\ProductDatabaseInterface;
use App\Infrastructure\Contract\ReviewGatewayInterface;
use App\Infrastructure\Persistence\ProductDatabase;
use App\Infrastructure\Gateway\ReviewGateway;
use App\Infrastructure\Http\ProductListController;
use App\Infrastructure\Http\ProductPageController;
use App\Infrastructure\Repository\ProductRepository;
use App\Infrastructure\Repository\ReviewRepository;
use DI\ContainerBuilder;

use FastRoute\RouteCollector;

use function DI\autowire;

require_once 'vendor/autoload.php';

// Загрузка переменных окружения

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Конфигурация и создание IoC-контейнера

$definitions = [
    ProductRepositoryInterface::class => autowire(ProductRepository::class),
    ReviewRepositoryInterface::class => autowire(ReviewRepository::class),
    ProductServiceInterface::class => autowire(ProductService::class),
    ProductDatabaseInterface::class => autowire(ProductDatabase::class),
    ReviewGatewayInterface::class => autowire(ReviewGateway::class),
];

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions($definitions);
$container = $containerBuilder->build();

// Конфигурация роутов

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/api/v1/products', ProductListController::class);
    $r->addRoute('GET', '/api/v1/products/{id}', ProductPageController::class);
});

// Передача управления контроллеру

$route = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
$controller = $route[1];
$parameters = $route[2];
$container->call($controller, $parameters);
