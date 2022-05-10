<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Doctrine\DBAL;

$connectionParams = ['url' => 'sqlite:///db/calc_db.sqlite3'];


try {
    $conf = new DBAL\Configuration();
    $conn = DBAL\DriverManager::getConnection($connectionParams, $conf);
    $data = $conn->fetchAllAssociative('SELECT name, cost FROM memory');
    echo json_encode($data, JSON_THROW_ON_ERROR);
} catch (Exception $e) {
    echo $e->getMessage();
}

