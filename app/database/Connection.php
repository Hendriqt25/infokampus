<?php

namespace App\Database;

use PDO;
use RuntimeException;

class Connection
{
    private static ?PDO $instance = null;

    public static function get(): PDO
    {
        if (self::$instance === null) {
            $driver = env('DB_CONNECTION', 'sqlite');

            self::$instance = match ($driver) {
                'sqlite' => new PDO(
                    'sqlite:' . database_path('database.sqlite'),
                    options: [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                ),
                'mysql' => new PDO(
                    'mysql:host=' . env('DB_HOST', '127.0.0.1') . ';dbname=' . env('DB_DATABASE', 'infongeampus'),
                    env('DB_USERNAME', 'root'),
                    env('DB_PASSWORD', ''),
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                ),
                default => throw new RuntimeException("Unsupported driver: $driver"),
            };
        }

        return self::$instance;
    }

    public static function reset(): void
    {
        self::$instance = null;
    }
}
