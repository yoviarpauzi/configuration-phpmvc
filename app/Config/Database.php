<?php

namespace App\Config;

require_once __DIR__ . "/vendor/autoload.php";

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use PDO;
use PDOException;

class Database
{
    private static const DSN = "mysql:host=localhost;dbname=";
    private static const USER = "demo_user";
    private static const PASS = "14112002";

    public static function getConnection()
    {
        try {
            return new PDO(self::DSN, self::USER, self::PASS);
        } catch (PDOException $error) {
            $logger = new Logger(Database::class);

            $handler = new RotatingFileHandler(__DIR__ . "/log/databaseLog.json", Logger::ERROR, true);
            $handler->setFormatter(new JsonFormatter());

            $logger->pushHandler($handler);
            $logger->pushProcessor(new GitProcessor());
            $logger->pushProcessor(new MemoryUsageProcessor());

            $logger->error("Gagal Tersambung ke Database", [$error->getMessage()]);
        }
    }
}
?>