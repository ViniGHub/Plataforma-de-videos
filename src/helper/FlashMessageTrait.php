<?php
namespace Alura\Mvc\Helper;

trait FlashMessageTrait {
    public static function addErrorMessage(string $errorMessage): void {
        $_SESSION['error_message'] = $errorMessage;
        
    }
}