<?php
/*
include 'Database.php';
include 'MysqlRepository.php';

$db = Database::connect('localhost', 'root', '', 'api_db');

$mysqlRepo = new MysqlRepository($db);

$mysqlRepo->getAll();*/

foreach(PDO::getAvailableDrivers() as $driver) {
    echo $driver;
  }

