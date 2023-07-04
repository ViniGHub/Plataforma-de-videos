<?php

namespace Alura\Mvc\Repo;

use Alura\Mvc\entity\Video;
use PDO;

class VideoRepository
{

    public function __construct(private PDO $pdo)
    {
    }

    public function addVideo(Video $video): bool
    {
        $sqlVideo = 'INSERT INTO videos (url, title) VALUES (?,?)';
        $statement = $this->pdo->prepare($sqlVideo);
        $statement->bindValue(1, $video->url);
        $statement->bindValue(2, $video->title);

        $result = $statement->execute();

        $id = $this->pdo->lastInsertId();
        $video->setId(intval($id));

        return $result;
    }

    public function updateVideo(Video $video): bool
    {
        $sqlVideo = 'UPDATE videos SET url = ?, title = ? WHERE id = ?';
        $statement = $this->pdo->prepare($sqlVideo);
        $statement->bindValue(1, $video->url);
        $statement->bindValue(2, $video->title);
        $statement->bindValue(3, $video->id, PDO::PARAM_INT);

        return $statement->execute();
    }

    public function remove(int $id): bool
    {
        $sqlDelete = 'DELETE FROM videos WHERE id = ?';
        $statement = $this->pdo->prepare($sqlDelete);
        $statement->bindValue(1, $id);

        return $statement->execute();
    }

    /**
     * @return Video[]
     */
    public function all(): array
    {
        return array_map(
            $this->hydrateVideo(...), $this->pdo->query('SELECT * FROM videos;')->fetchAll(PDO::FETCH_ASSOC));
    }

    public function find(int $id): Video
    {
        $video = $this->pdo->query("SELECT * FROM videos WHERE id = {$id};")->fetch(PDO::FETCH_ASSOC);

        return $this->hydrateVideo($video);
    }

    public function hydrateVideo(array $videoData): Video 
    {
        $video = new Video($videoData['url'], $videoData['title']);
        $video->setId($videoData['id']);

        return $video;
    }
}
