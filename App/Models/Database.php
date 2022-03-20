<?php

namespace App\Models;

use PDO;

/**
 * Kopplar till databasen
 * Fyll på med metoder efter behov helt enkelt
 */
class Database
{
    public PDO $pdo;

    /**
     *  Hämta upp pdo-objektet från Singleton-klassen
     */
    public function __construct()
    {
        $host = "192.168.250.74";
        $db = "testamig"; // ersätt med ert användarnamn
        $user = "testamig"; // ersätt med ert användarnamn
        $pass = "hemligthemligt"; // ersätt med vanliga lösenordet
        $dsn = "mysql:host=$host;port=3306;dbname=$db";
        $settings = [
            PDO::ATTR_PERSISTENT => true,
            PDO::MYSQL_ATTR_LOCAL_INFILE => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];
        $this->pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass,$settings);
    }

    /**
     * @param string $sql
     * @return bool
     */
    public function query(string $sql, $data = [])
    {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    /**
     * @param string $sql
     * @param int|null $fetchMode
     * @return mixed
     */
    public function fetch(string $sql, array $data = [], int $fetchMode = null): mixed
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        if ($fetchMode) {
            $results = $stmt->fetch($fetchMode);
        } else {
            $results = $stmt->fetch();
        }
        return $results;
    }

    /**
     * @param string $sql
     * @param array $data
     * @param int|null $fetchMode
     * @return array|false
     */
    public function fetchAll(string $sql, array $data = [], int $fetchMode = null):array|bool
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        if ($fetchMode) {
            $results = $stmt->fetchAll($fetchMode);
        } else {
            $results = $stmt->fetchAll();
        }
        return $results;
    }

    /**
     * @param string $sql
     * @return mixed
     */
    public function fetchColumn(string $sql): mixed
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }


}