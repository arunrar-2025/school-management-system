<?php
    // Import required files
    require_once __DIR__ . '/../models/User.php';

    class Auth
    {
        // Define Login Function
        public static function login(string $email, string $password): bool
        {
            $userModel = new User();
            $user = $userModel->findByEmail($email);

            if (!$user) return false;

            if (!password_verify($password, $user['password_hash'])) {
                return false;
            }

            // If login successful Set Session variables
            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'role' => $user['role']
            ];

            return true;
        }

        // Defile Logout Function
        public static function logout(): void
        {
            session_destroy();
        }

        public static function user(): ?array
        {
            return $_SESSION['user'] ?? null;
        }

        // Define Login Checker Function
        public static function check(): bool
        {
            return isset($_SESSION['user']);
        }

        public static function requireRole(array $roles): void
        {
            if (!self::check()) {
                header("Location: /school-management-system/public/?route=login");
                exit;
            }

            if (!in_array($_SESSION['user']['role'], $roles)) {
                die("Access Denied");
            }
        }
    }