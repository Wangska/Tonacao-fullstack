<?php
declare(strict_types=1);

class NftController
{
    private PDO $pdo;
    private Nft $nftModel;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->nftModel = new Nft($pdo);
    }

    public function mint(): void
    {
        if (isPost()) {
            verifyCsrf();
            $name = trim($_POST['name'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $imageUrl = trim($_POST['image_url'] ?? '');
            if ($name === '') {
                $error = 'Name is required';
                render('nft/mint', compact('error', 'name', 'description', 'imageUrl'));
                return;
            }
            $this->nftModel->create(currentUserId(), $name, $description ?: null, $imageUrl ?: null);
            redirect('index.php?r=nft/list');
            return;
        }

        render('nft/mint');
    }

    public function list(): void
    {
        $nfts = $this->nftModel->listByUser(currentUserId());
        render('nft/list', compact('nfts'));
    }
}


