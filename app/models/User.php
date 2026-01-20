<?php

    // Include required files
    require_once __DIR__ . '/../core/Model.php';

    class User extends Model
    {
        // Define function to Search user by Email
        public function findByEmail(string $email): ?array
        {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch();
            return $user ?: null;
        }

        // Define function to Search user by ID
        public function findById(int $id): ?array
        {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
            $stmt->execute([':id' => $id]);
            $user = $stmt->fetch();
            return $user ?: null;
        }

        // Define function to Create new user
        public function create(string $email, string $passwordHash, string $role): bool
        {
            $stmt = $this->pdo->prepare("INSER INTO users (email, password_hash, role) VALUES (:email, :password, :role)");
            return $stmt->execute([
                ':email' => $email,
                ':password' => $passwordHash,
                ':role' => $role
            ]);
        }
    }