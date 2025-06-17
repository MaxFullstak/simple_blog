<?php
include "./app/database/db.php";

$errorMsg = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password = trim($_POST['pass'], PASSWORD_DEFAULT);
    $password_repeat = $_POST['pass_repeat'];
    $admin = 0;


    if ($login === '' || $email === '' || $password === '') {
        $errorMsg = 'Не все поля запонены';
    } elseif (mb_strlen($login, 'UTF-8') < 2) {
        $errorMsg = 'Логин должен быть больше 2-х символов';
    } elseif ($password !== $password_repeat) {
        $errorMsg = 'Пароли в обеиз полях должны соответствовать';
    } else {
        $existense = selectOne('users', ['email' => $email]);
        if ($existense && $existense['email'] === $email) {
            $errorMsg = 'Пользователь с такой почтой уже существует';
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $password,
            ];
            $id = insert('users', $post);
            $errorMsg = "Пользователь $login успешно зарегестрирован";

        }
    }
} else {
    $login = '';
    $email = '';
}
