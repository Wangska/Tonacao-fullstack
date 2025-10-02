<?php
declare(strict_types=1);

class DashboardController
{
    private PDO $pdo;
    private User $userModel;
    private Nft $nftModel;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->userModel = new User($pdo);
        $this->nftModel = new Nft($pdo);
    }

    public function index(): void
    {
        $user = $this->userModel->findById(currentUserId());
        $nftCount = $this->nftModel->countByUser((int)currentUserId());
        render('dashboard/index', compact('user', 'nftCount'));
    }
}


