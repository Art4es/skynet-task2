<?php


namespace Skynet\http;


use Skynet\actions\IAction;
use Skynet\exceptions\NotFoundException;

class Router implements IRouter
{
    /** @var IRoute[] */
    private $routes = [];

    public function match(IRequest $request): IAction
    {
        $path = $request->getPath();

        foreach ($this->routes as $route) {
            if ($route->getMethod() !== $request->getMethod()) {
                continue;
            }

            $pattern = preg_replace_callback('~{([^\}]+)\}~', function ($matches) use ($route) {
                $url_patterns = $route->getTokenPatterns();
                $argument = $matches[1];
                $replace = $url_patterns[$argument] ?? '[^}]+';
                return '(?<' . $argument . '>' . $replace . ')';
            }, $route->getUrlPattern());

            $url_pattern = '~^' . $pattern . '$~i';
            if (preg_match($url_pattern, $path, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                $action_class = $route->getActionClass();
                return new $action_class($request, $params);
            }
        }
        throw new NotFoundException();
    }

    public function addRoute(IRoute $route)
    {
        $this->routes[] = $route;
    }
}