<?php

namespace app\core;

class Database 
{
    public \PDO $pdo;

    public function __construct(array $config){
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations(){

    }

    public function createMigrationsTable(){
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY_KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP_DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;");
    }
}