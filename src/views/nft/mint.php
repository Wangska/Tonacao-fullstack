<?php /** @var string|null $error */ ?>
<div class="card">
    <h2>Mint NFT</h2>
    <?php if (!empty($error)): ?><p class="error"><?php echo htmlspecialchars($error); ?></p><?php endif; ?>
    <form method="post" action="index.php?r=nft/mint">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrfToken()); ?>">
        <div class="row">
            <label>Name</label>
            <input class="input" type="text" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
        </div>
        <div class="row">
            <label>Description</label>
            <textarea class="input" name="description" rows="3"><?php echo htmlspecialchars($description ?? ''); ?></textarea>
        </div>
        <div class="row">
            <label>Image URL</label>
            <input class="input" type="url" name="image_url" value="<?php echo htmlspecialchars($imageUrl ?? ''); ?>">
        </div>
        <div class="row">
            <button class="btn" type="submit">Mint</button>
        </div>
    </form>
</div>


