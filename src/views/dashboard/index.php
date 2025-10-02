<?php /** @var array $user */ /** @var int $nftCount */ ?>
<div class="row">
    <div class="card">
        <h2>Welcome</h2>
        <p>You are signed in as <strong><?php echo htmlspecialchars($user['email'] ?? ''); ?></strong>.</p>
        <div class="row" style="grid-template-columns: repeat(3, 1fr);">
            <div class="card">
                <div style="font-size:12px;color:#a1acc4;">NFTs</div>
                <div style="font-size:28px;font-weight:700;"><?php echo (int)$nftCount; ?></div>
            </div>
            <div class="card">
                <div style="font-size:12px;color:#a1acc4;">Account</div>
                <div style="font-size:16px;">Created: <?php echo htmlspecialchars($user['created_at'] ?? ''); ?></div>
            </div>
            <div class="card">
                <div style="font-size:12px;color:#a1acc4;">Actions</div>
                <div><a class="btn" href="index.php?r=nft/mint">Mint NFT</a></div>
            </div>
        </div>
    </div>
</div>


