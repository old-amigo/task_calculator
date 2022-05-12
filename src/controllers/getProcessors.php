<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Doctrine\DBAL;

$connectionParams = [
    'path' => dirname(__DIR__, 2) . '/db/calc_db.sqlite3',
    'driver' => 'pdo_sqlite'
];



try {
    $conf = new DBAL\Configuration();
    $conn = DBAL\DriverManager::getConnection($connectionParams, $conf);
    $data = $conn->fetchAllAssociative('SELECT name, cost FROM processors');
    echo json_encode($data, JSON_THROW_ON_ERROR);
} catch (Exception $e) {
    echo $e->getMessage();
}

