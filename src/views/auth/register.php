<?php /** @var string|null $error */ ?>
<div class="card">
    <h2>Create account</h2>
    <?php if (!empty($error)): ?><p class="error"><?php echo htmlspecialchars($error); ?></p><?php endif; ?>
    <form method="post" action="index.php?r=register">
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
            <label>Confirm Password</label>
            <input class="input" type="password" name="confirm" required>
        </div>
        <div class="row">
            <button class="btn" type="submit">Sign up</button>
            <a href="index.php?r=login">I already have an account</a>
        </div>
    </form>
</div>


