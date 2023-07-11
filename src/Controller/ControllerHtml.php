<?php

namespace Alura\Mvc\Controller;

abstract class ControllerHtml implements Controller
{
    private const VIEW_PATH = '../views/';
    public function renderTemplate(string $viewName, array $context = []): string|false
    {
        extract($context);

        ob_start();
        require_once self::VIEW_PATH . $viewName . '.php';
        return ob_get_clean();
    }
}
