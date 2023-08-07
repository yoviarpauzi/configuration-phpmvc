<?php

namespace App\Config;

require_once __DIR__ . "/../../vendor/autoload.php";

class Router
{
    private static array $routes = array();

    public static function add(string $httpMethod, string $path, string $controller, string $function)
    {
        $route = [
            "httpMethod" => $httpMethod,
            "path" => $path,
            "controller" => $controller,
            "function" => $function,
        ];
        array_push(self::$routes, $route);
    }

    public static function run()
    {
        $path = "/";
        if (isset($_SERVER['PATH_INFO'])) {
            $path = $_SERVER['PATH_INFO'];
        }
        $httpMethod = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            $pattern = "#^" . $route['path'] . "$#";
            if (preg_match($pattern, $path, $variables) && $httpMethod == $route['httpMethod']) {
                $controller = new $route['controller'];
                $function = $route['function'];

                array_shift($variables);
                call_user_func_array([$controller, $function], $variables);

                return;
            }
        }

        http_response_code(404);
    }
}

?>