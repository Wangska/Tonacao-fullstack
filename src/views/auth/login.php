<?php /** @var string|null $error */ ?>
<div class="card">
    <h2>Login</h2>
    <?php if (!empty($error)): ?><p class="error"><?php echo htmlspecialchars($error); ?></p><?php endif; ?>
    <form method="post" action="index.php?r=login">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrfToken()); ?>">
        <div class="row">
            <label>Email</label>
            <input class="input" type="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
        </div>
        <div class="row">
            <label>Password</label>
            <input class="input" type="password" name="password" required>
        </div>
        <div class="row">
            <button class="btn" type="submit">Login</button>
            <a href="index.php?r=register">Create account</a>
        </div>
    </form>
</div>


