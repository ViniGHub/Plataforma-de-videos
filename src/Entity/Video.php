<?php

namespace Alura\Mvc\entity;

class Video
{
    public readonly string $title;
    public readonly string $url;
    public readonly int $id;

    public function __construct(string $url, string $title)
    {
        $this->setParam($url, $title);

    }

    private function setParam(string $url, string $title): void
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $this->title = 'Rick Astley - Never Gonna Give You Up (Official Music Video)';
            $this->url = 'https://www.youtube.com/embed/dQw4w9WgXcQ';
            exit();
        }
        $this->title = $title;
        $this->url = $url;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
}
