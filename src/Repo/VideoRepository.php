<?php
namespace Alura\Mvc\Repository;

use Alura\Mvc\entity\Video;
use PDO;

class VideoRepository {

    public function __construct(private PDO $pdo) {

    }

    public function addVideo(Video $video): Video {
        $sqlVideo = 'INSERT INTO videos (url, title) VALUES (?,?)';
        $statement = $this->pdo->prepare($sqlVideo);
        $statement->bindValue(1, $video->url);
        $statement->bindValue(2, $video->title);
        
        return $video;
    }
}