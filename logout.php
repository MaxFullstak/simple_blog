<?php
session_start();
include 'path.php';

unset($_SESSION['admin']);
unset($_SESSION['login']);
unset($_SESSION['id']);

header('location: ' . BASE_URL);