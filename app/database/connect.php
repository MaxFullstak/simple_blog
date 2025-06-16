<?php

$driver = "mysql";
$host = "localhost";
$db_name = "dynamic_blog";
$db_user = "root";
$db_pass = "mysql";
$charset = "utf8";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

try {
    $pdo = new PDO(
        "$driver:host=$host;dbname=$db_name;charset=$charset",
        $db_user, $db_pass, $options
    );
} catch (PDOException $e) {
    die("Ошибка: " . $e->getMessage());
}
