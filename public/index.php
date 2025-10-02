<?php
declare(strict_types=1);

// Bootstrap
$root = dirname(__DIR__);
require_once $root . '/config/db.php';
require_once $root . '/src/lib/session.php';
require_once $root . '/src/lib/helpers.php';

require_once $root . '/src/models/User.php';
require_once $root . '/src/models/Nft.php';
require_once $root . '/src/controllers/AuthController.php';
require_once $root . '/src/controllers/NftController.php';
require_once $root . '/src/controllers/DashboardController.php';

$route = $_GET['r'] ?? '';

switch ($route) {
    case 'login':
        (new AuthController($pdo))->login();
        break;
    case 'register':
        (new AuthController($pdo))->register();
        break;
    case 'logout':
        (new AuthController($pdo))->logout();
        break;
    case 'nft/mint':
        requireAuth();
        (new NftController($pdo))->mint();
        break;
    case 'nft/list':
        requireAuth();
        (new NftController($pdo))->list();
        break;
    default:
        requireAuth();
        (new DashboardController($pdo))->index();
        break;
}


