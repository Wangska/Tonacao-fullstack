<?php
declare(strict_types=1);

function baseUrl(): string {
    $appUrl = getenv('APP_URL') ?: ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost'));
    return rtrim($appUrl, '/');
}

function redirect(string $path): void {
    header('Location: ' . baseUrl() . '/' . ltrim($path, '/'));
    exit;
}

function isPost(): bool {
    return ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST';
}

function csrfToken(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verifyCsrf(): void {
    $token = $_POST['csrf_token'] ?? '';
    if (!$token || !hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
        http_response_code(400);
        echo 'Invalid CSRF token';
        exit;
    }
}

function currentUserId(): ?int {
    return isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : null;
}

function requireAuth(): void {
    if (!currentUserId()) {
        redirect('index.php?r=login');
    }
}

function render(string $view, array $data = []): void {
    extract($data, EXTR_OVERWRITE);
    $root = dirname(__DIR__, 2);
    $viewFile = $root . '/src/views/' . $view . '.php';
    $layoutFile = $root . '/src/views/layout.php';
    ob_start();
    require $viewFile;
    $content = ob_get_clean();
    require $layoutFile;
}


