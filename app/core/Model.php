<?php

    // Include required files
    require_once __DIR__ . '/../config/database.php';

    // Define Base Model (Every model will extend this model)
    class Model
    {
        protected PDO $pdo;

        public function __construct()
        {
            $this->pdo = getPDO();
        }
    }