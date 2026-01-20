<?php
    declare(strict_types=1);

    // Start the session
    session_start();

    // Import required files
    require_once __DIR__ . '/../app/core/Auth.php';
    require_once __DIR__ . '/../app/core/Router.php';

    $route = $_GET['route'] ?? 'login';

    Router::route($route);