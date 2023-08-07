<?php

namespace App\Config;

use PDOException;

class Database
{
    private static const DSN = "mysql:host=localhost;dbname=";

    public static function getConnection()
    {
        try {

        } catch (PDOException $error) {
        }
    }
}
?>