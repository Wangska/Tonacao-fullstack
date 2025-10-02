<?php
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tonacao NFT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; margin:0; background:#0b0f1a; color:#e6e8ee; }
        a { color:#7aa2f7; text-decoration:none; }
        header { display:flex; align-items:center; justify-content:space-between; padding:16px 24px; background:#0f1629; border-bottom:1px solid #1a2238; position:sticky; top:0; }
        .brand { font-weight:700; letter-spacing:.3px; }
        .container { max-width: 900px; margin: 0 auto; padding: 24px; }
        .card { background:#0f1629; border:1px solid #1a2238; border-radius:12px; padding:20px; }
        .btn { display:inline-block; background:#3b82f6; color:white; padding:10px 14px; border-radius:8px; font-weight:600; }
        .btn.secondary { background:#1f2937; }
        .input { width:100%; background:#0b1222; border:1px solid #1a2238; color:#e6e8ee; padding:10px 12px; border-radius:8px; }
        .row { display:grid; gap:16px; }
        .grid { display:grid; gap:16px; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); }
        .nft { background:#0b1222; border:1px solid #1a2238; border-radius:12px; overflow:hidden; }
        .nft img { width:100%; height:160px; object-fit:cover; background:#0b0f1a; }
        .nft .p { padding:12px; }
        .error { color:#fca5a5; }
        nav a { margin-left:12px; }
        footer { color:#8892b0; padding:24px; text-align:center; }
    </style>
</head>
<body>
<header>
    <div class="brand">Tonacao NFT</div>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="index.php?r=nft/list">My NFTs</a>
        <a href="index.php?r=nft/mint" class="btn">Mint</a>
        <?php if (!empty($_SESSION['user_id'])): ?>
            <a href="index.php?r=logout" class="btn secondary">Logout</a>
        <?php endif; ?>
    </nav>
    </header>
<div class="container">
    <?php echo $content; ?>
</div>
<footer>
    <div>Built for TablePlus + Coolify</div>
    </footer>
</body>
</html>


