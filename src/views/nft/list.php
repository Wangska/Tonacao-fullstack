<?php /** @var array $nfts */ ?>
<div class="row">
    <div class="card">
        <h2>My NFTs</h2>
        <p><a class="btn" href="index.php?r=nft/mint">Mint new</a></p>
        <?php if (empty($nfts)): ?>
            <p>No NFTs yet.</p>
        <?php endif; ?>
        <div class="grid">
            <?php foreach ($nfts as $nft): ?>
                <div class="nft">
                    <?php if (!empty($nft['image_url'])): ?>
                        <img src="<?php echo htmlspecialchars($nft['image_url']); ?>" alt="">
                    <?php endif; ?>
                    <div class="p">
                        <div style="font-weight:600; margin-bottom:6px;">
                            <?php echo htmlspecialchars($nft['name']); ?>
                        </div>
                        <div style="color:#a1acc4; font-size:14px;">
                            <?php echo nl2br(htmlspecialchars($nft['description'] ?? '')); ?>
                        </div>
                        <div style="margin-top:8px; color:#7aa2f7; font-size:12px;">Minted: <?php echo htmlspecialchars($nft['minted_at']); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


