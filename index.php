<?
require_once('system/loader.php');
$uri = getRequestUri();
$uri = str_replace(getBaseUrl(), '/', $uri);
$parts = explode('/', $uri);
$controller = $parts[1];
$method = $parts[2];


// echo "<hr> controller: " . $controller;
// echo "<br> method: " . $method . "<br>";


$params = array();
for ($i = 3; $i < count($parts); $i++) {
    $params[] = $parts[$i];
}
// echo "<br> method: " . $params[0] . "<hr>";
// echo "PARAMS-1:  $params[0] <hr>";
// br();
// echo "controller: $controllerClassname";
// br();
// echo "Method: $method";
// br();
// dump($params);

$controllerClassname = ucfirst($controller) . "Controller";
$controllerInstance = new  $controllerClassname();
$controllerInstance->$method($params);
