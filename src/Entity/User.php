<?php
namespace Alura\Mvc\entity;

class User 
{
    public readonly int $id;
    
    public function __construct(public readonly string $email, public readonly string $password)
    {
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getEmail(): string {
        return $this->email;
    }
}