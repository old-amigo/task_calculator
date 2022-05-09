<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Doctrine\DBAL;

$connectionParams = [
    'path' => '/db/calc_db.sqlite3',
    'driver' => 'pdo_sqlite'
];

try {
    $conn = DBAL\DriverManager::getConnection($connectionParams);
    $data = $conn->fetchAllAssociative('SELECT name, cost FROM processors');
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data, JSON_THROW_ON_ERROR);
} catch (Exception $e) {
    echo $e->getMessage();
}

