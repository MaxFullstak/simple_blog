<?php
include "./app/database/db.php";

$errorMsg = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_reg'])) {
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password = trim($_POST['pass'], PASSWORD_DEFAULT);
    $password_repeat = $_POST['pass_repeat'];
    $admin = 0;


    if ($login === '' || $email === '' || $password === '') {
        $errorMsg = 'Не все поля заполнены';
    } elseif (mb_strlen($login, 'UTF-8') < 2) {
        $errorMsg = 'Логин должен быть больше 2-х символов';
    } elseif ($password !== $password_repeat) {
        $errorMsg = 'Пароли в обеих полях должны соответствовать';
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
            $user = selectOne('users', [
                'id' => $id,
            ]);
            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['username'];
            $_SESSION['admin'] = $user['admin'];


            if ($_SESSION['admin']) {
                header('location: ' . BASE_URL . admin / admin . php);
            } else {
                header('location: ' . BASE_URL);
            }

        }
    }
} else {
    $login = '';
    $email = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_log'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($password === '' || $email === '') {
        $errorMsg = 'Не все поля заполнены';

    } else {
        $existense = selectOne('users', ['email' => $email]);
        if ($existense && password_verify($password, $existense['password'])) {
            $_SESSION['id'] = $existense['id'];
            $_SESSION['login'] = $existense['username'];
            $_SESSION['admin'] = $existense['admin'];


            if ($_SESSION['admin']) {
                header('location: ' . BASE_URL . 'admin/posts/index.php');
            } else {
                header('location: ' . BASE_URL);
            }
        } else {
            $errorMsg = 'Почта либо пароль введены неверно';
        }
    }

} else {
    $email = '';
}