<?php
include "./app/database/db.php";

// Включение отладки
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['login'])) {
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $password_repeat = $_POST['pass_repeat'];
    $admin = 0;


    $post = [
        'admin' => $admin,
        'username' => $login,
        'email' => $email,
        'password' => $password,
    ];

    $id = insert('users', $post);

    $last_row = selectOne('users', ['id' => $id]);
    tt($last_row);
}