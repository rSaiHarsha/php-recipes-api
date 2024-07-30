<?php

// $host = 'postgres';
// $db = 'hellofresh';
// $user = 'hellofresh';
// $pass = 'hellofresh';
// $charset = 'utf8mb4';

$host = 'localhost';
$db = 'hellofresh';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';


$dsn = "pgsql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>

