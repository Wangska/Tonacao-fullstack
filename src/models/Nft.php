<?php
declare(strict_types=1);

class Nft
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(int $userId, string $name, ?string $description, ?string $imageUrl): int
    {
        $stmt = $this->pdo->prepare('INSERT INTO nfts (user_id, name, description, image_url) VALUES (:user_id, :name, :description, :image_url)');
        $stmt->execute([
            'user_id' => $userId,
            'name' => $name,
            'description' => $description,
            'image_url' => $imageUrl,
        ]);
        return (int)$this->pdo->lastInsertId();
    }

    public function listByUser(int $userId): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM nfts WHERE user_id = :user_id ORDER BY minted_at DESC');
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countByUser(int $userId): int
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) as c FROM nfts WHERE user_id = :user_id');
        $stmt->execute(['user_id' => $userId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)($row['c'] ?? 0);
    }
}


