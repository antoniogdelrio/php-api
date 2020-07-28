<?php
    class Database {
        
        static function connect($host, $user, $password, $dbName){
            $dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;

            $db = new PDO($dsn, $user, $password);

            return $db;
        }
    }