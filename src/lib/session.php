<?php
declare(strict_types=1);

$sessionName = getenv('SESSION_NAME') ?: 'TONACAOSESSID';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_name($sessionName);
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on',
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}


