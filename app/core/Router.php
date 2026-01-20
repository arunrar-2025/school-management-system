<?php
    // Define Router class to route the requests as needed
    class Router
    {
        public static function route(string $route): void
        {
            switch ($route) {
                case 'login':
                    require __DIR__ . '/../views/auth/login.php';
                    break;
                
                case 'logout':
                    Auth::logout();
                    header("Location: /school-management-system/public?route=login");
                    break;
                
                case 'dashboard':
                    Auth::requireRole(['admin','teacher','student','parent']);
                    echo "Dashboard - Logged in as " . Auth::user()['role'];
                    break;

                default:
                    header("Location: /school-management-system/public/?route=login");
            }
        }
    }