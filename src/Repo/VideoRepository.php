<?php

namespace Alura\Mvc\Repo;

use Alura\Mvc\entity\User;
use Alura\Mvc\entity\Video;
use PDO;

class VideoRepository
{

    public function __construct(private PDO $pdo)
    {
    }

    public function addVideo(Video $video, User $user): bool
    {
        $sqlVideo = 'INSERT INTO videos (url, title, image_path, id_user) VALUES (?,?,?,?);';
        $statement = $this->pdo->prepare($sqlVideo);
        $statement->bindValue(1, $video->url);
        $statement->bindValue(2, $video->title);
        $statement->bindValue(3, $video->getFilePath());
        $statement->bindValue(4, $user->id);

        $result = $statement->execute();

        $id = $this->pdo->lastInsertId();
        $video->setId(intval($id));

        return $result;
    }

    public function updateVideo(Video $video): bool
    {
        if ($video->getFilePath() !== null) {
            $sqlVideo = 'UPDATE videos SET url = ?, title = ?, image_path = ? WHERE id = ?';
        } else {
            $sqlVideo = 'UPDATE videos SET url = ?, title = ? WHERE id = ?';
        }
        
        $statement = $this->pdo->prepare($sqlVideo);
        $statement->bindValue(1, $video->url);
        $statement->bindValue(2, $video->title);
        if ($video->getFilePath() !== null) {
            $statement->bindValue(3, $video->getFilePath());
            $statement->bindValue(4, $video->id, PDO::PARAM_INT);
        } else {
            $statement->bindValue(3, $video->id, PDO::PARAM_INT);
        }

        return $statement->execute();
    }

    public function remove(int $id): bool
    {
        $sqlDelete = 'DELETE FROM videos WHERE id = ?';
        $statement = $this->pdo->prepare($sqlDelete);
        $statement->bindValue(1, $id);

        return $statement->execute();
    }

    public function removeCover(int $id):bool {
        $sqlDelete = 'UPDATE videos SET image_path = null where id = ?';
        $statement = $this->pdo->prepare($sqlDelete);
        $statement->bindValue(1, $id);

        return $statement->execute();
    }

    /**
     * @return Video[]
     */
    public function all(User $user): array
    {
        return array_map(
            $this->hydrateVideo(...), $this->pdo->query('SELECT * FROM videos WHERE videos.id_user ='. $user->id . ';')->fetchAll(PDO::FETCH_ASSOC));
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
        $video->setFilePath($videoData['image_path']);
        $video->setIdUser($videoData['id_user']);

        return $video;
    }
}
