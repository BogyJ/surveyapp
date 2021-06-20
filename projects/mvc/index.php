<?php
    require_once 'Configuration.php';
    require_once 'vendor/autoload.php';


    $configuration = new \App\Core\DatabaseConfiguration(
        Configuration::DATABASE_HOST,
        Configuration::DATABASE_USER,
        Configuration::DATABASE_PASS,
        Configuration::DATABASE_NAME
    );
    $databaseConnection = new \App\Core\DatabaseConnection($configuration);

    $url = strval(filter_input(INPUT_GET, 'URL'));
    $httpMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

    $router = new \App\Core\Router();
    $routes = require_once 'Routes.php';

    foreach ($routes as $route) {
        $router->add($route);
    }

    $route = $router->find($httpMethod, $url);
    $arguments = $route->extractArguments($url);

    $fullControllerName = '\\App\\Controllers\\' . $route->getControllerName() . 'Controller';
    $controller = new $fullControllerName($databaseConnection);
    call_user_func_array([$controller, $route->getMethodName()], $arguments);
    $data = $controller->getData();

    # foreach ($data as $name => $value) {
    #     $$name = $value;
    # }
    # require_once 'views/' . $route->getControllerName() . '/' . $route->getMethodName() . '.php';

    $loader = new \Twig\Loader\FilesystemLoader('./views');
    $twig = new \Twig\Environment($loader, [
        'cache' => './twig-cache',
        'auto_reload' => true
    ]);
    echo $twig->render($route->getControllerName() . '/' . $route->getMethodName() . '.html', $data);
