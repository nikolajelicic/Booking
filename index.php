<?php 
require_once 'vendor/autoload.php';
require_once 'private/core/database/configuration.php';

use App\Core\Database\DatabaseConnection;
use App\Core\Database\DatabaseConfiguration;
use App\Core\Router;

$databaseConfiguration = new DatabaseConfiguration(Configuration::DATABASE_HOST,
                        Configuration::DATABASE_USER,
                        Configuration::DATABASE_PASS,
                        Configuration::DATABASE_NAME
                        );
$databaseConnection = new DatabaseConnection($databaseConfiguration);

$url = strval(filter_input(INPUT_GET, 'URL'));
$httpMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
$router = new Router();
$routes = require_once 'routes.php';
foreach($routes as $route){
    $router->add($route);
}
$route = $router->find($httpMethod, $url);
$arguments = $route->extractArguments($url);

$fullControllerName =  '\\App\\Controllers\\' . $route->getControllerName() . 'Controller';
$controller = new $fullControllerName($databaseConnection);
call_user_func_array([$controller, $route->getMethodName()],$arguments);
$data = $controller->getData();

if(isset($data)){
    foreach($data as $name => $value){
        $$name = $value; 
    }
}

require_once 'private/views/'.$route->getControllerName().'/'.$route->getMethodName().'.php';
?>