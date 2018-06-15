<?php
// DIC configuration

$container = $app->getContainer();

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

//connections
$container['pdoConnection'] = function ($c) {
    $credentials = $c->get('settings')['mysqlCredentials'];
    return new \PDO(
        $credentials['dsn'],
        $credentials['username'],
        $credentials['password']
    );
};

//repositories
$container['stockRepository'] = function ($c) {
    return new \Stock\Repository\StockRepository(
        $c->get('pdoConnection')
    );
};

// services
$container['stockService'] = function ($c) {
    return new \Stock\Service\Stock($c);
};

//commands
$container['getStockCommand'] = function ($c) {
    return new \Stock\Command\GetStock($c->get('stockRepository'));
};

$container['saveStockCommand'] = function ($c) {
    return new \Stock\Command\SaveStock($c->get('stockRepository'));
};
