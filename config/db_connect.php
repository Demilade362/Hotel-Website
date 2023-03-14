<?php
$host = 'localhost';
$dbAccount = 'root';
$dbName = 'newapp';
$dbPassword = '';

$dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;

$pdo = new PDO($dsn, $dbAccount, $dbPassword);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
