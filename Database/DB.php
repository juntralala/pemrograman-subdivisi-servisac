<?php

class DB
{
    private static ?mysqli $connection = null;
    private static array $configuration = [
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'servisac',
    ];

    public static function setUp()
    {
        static::createDatabaseIfNotExists();
        static::createUserTableIfNotExists();
        static::createRuangTableIfNotExists();
        static::createJenisTableIfNotExists();
        static::createServisTableIfNotExists();
    }

    public static function connect(): mysqli
    {
        if (is_null(static::$connection)) {
            static::$connection = new mysqli(...static::$configuration);
        }
        return static::$connection;
    }

    public static function disconnect(): bool
    {
        if (!is_null(static::$connection)) {
            static::$connection = null;
            return true;
        }
        return false;
    }

    private static function createDatabaseIfNotExists()
    {
        try {
            static::connect();
        } catch (Throwable $e) {
            $config = array_diff_key(static::$configuration, ['database' => '']);
            static::$connection = new mysqli(...$config);
            static::$connection->query('CREATE DATABASE servisac');
            static::$connection->query('USE servisac');
        }
    }

    private static function createUserTableIfNotExists()
    {
        $connection = static::connect();
        $connection->query(<<<SQL
            CREATE TABLE IF NOT EXISTS tbl_user (
                id_user int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                nm_user varchar(150) NOT NULL,
                telp varchar(20) NOT NULL,
                password varchar(100) NOT NULL
            );
        SQL);
    }

    private static function createRuangTableIfNotExists()
    {
        $connection = static::connect();
        $connection->query(<<<SQL
            CREATE TABLE IF NOT EXISTS tbl_ruang (
                id_ruang int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                nm_ruang varchar(50) NOT NULL
            );
        SQL);
    }

    private static function createJenisTableIfNotExists()
    {
        $connection = static::connect();
        $connection->query(<<<SQL
            CREATE TABLE IF NOT EXISTS tbl_jenis (
                id_jenis int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                nm_jenis varchar(50) NOT NULL
            );
        SQL);
    }

    private static function createServisTableIfNotExists()
    {
        $connection = static::connect();
        $connection->query(<<<SQL
            CREATE TABLE IF NOT EXISTS tbl_servis (
                id_servis int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                tgl date NOT NULL,
                id_jenis int NOT NULL,
                id_user int NOT NULL,
                id_ruang int NOT NULL,
                catatan text NOT NULL,
                status int NOT NULL
            );
        SQL);
    }
}