<?php
namespace Alura\Mvc\Helper;

trait HtmlRendererTrait {
    private function renderTemplate(string $viewName, array $context = []): string|false
    {
        $templatePath = '../views/';
        extract($context);

        ob_start();
        require_once $templatePath . $viewName . '.php';
        return ob_get_clean();
    }
}