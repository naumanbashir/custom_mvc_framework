<?php

namespace App\core;

class Router
{
    protected array $routes;

    public function __construct(
        public Request $request
    )
    {

    }

    public function get($path, $callback): void
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? null;

        if (!$callback){
            Application::$app->response->setStatusCode(404);
            return 'No route found for "' . $path . '"';
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }

    public function renderView(string $view, $params = []): string
    {
        dd($params);

        $layoutContent = $this->renderLayout();
        $viewContent = $this->renderOnlyView($view);

        return str_replace('{{ content }}', $viewContent, $layoutContent);
    }

    private function renderLayout(): string
    {
        ob_start();
        include_once Application::$ROOT_DIR . '/resources/views/layouts/app.php';
        return ob_get_clean();
    }

    public function renderOnlyView($view): string
    {
        ob_start();
        include_once Application::$ROOT_DIR . '/resources/views/' . $view . '.php';
        return ob_get_clean();
    }
}