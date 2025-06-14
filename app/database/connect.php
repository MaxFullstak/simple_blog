<?php

$driver = "mysql";
$host = "localhost";
$db_name = "dynamic_blog";
$db_user = "root";
$db_pass = "2468";
$charset = "utf8";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

try {
    $connect = new PDO(
        "$driver:host=$host;dbname=$db_name;charset=$charset",
        $db_user, $db_pass, $options
    );
} catch (PDOException $e) {
    die("Ошибка: " . $e->getMessage());
}
