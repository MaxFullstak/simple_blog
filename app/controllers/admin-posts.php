<?php
include_once "../../app/database/db.php";

// Проверка авторизации и прав администратора
if (!isset($_SESSION['id']) || !$_SESSION['admin']) {
    header('location: ' . BASE_URL . 'login.php');
    exit();
}

$errorMsg = '';
$successMsg = '';

// Обработка удаления поста
if (isset($_GET['delete_id'])) {
    $deleteId = (int)$_GET['delete_id'];
    if ($deleteId > 0) {
        delete('posts', $deleteId);
        $successMsg = 'Пост успешно удален';
    }
}

// Обработка изменения статуса поста
if (isset($_GET['pub_id'])) {
    $pubId = (int)$_GET['pub_id'];
    $status = isset($_GET['publish']) ? 1 : 0;
    if ($pubId > 0) {
        update('posts', $pubId, ['status' => $status]);
        $statusText = $status ? 'опубликован' : 'снят с публикации';
        $successMsg = "Пост успешно $statusText";
    }
}

// Получение всех постов с авторами
$posts = selectAllFromPostsWithUsers('posts', 'users');

// Функция для форматирования даты
function formatDate($date) {
    $months = [
        '01' => 'янв', '02' => 'фев', '03' => 'мар', '04' => 'апр',
        '05' => 'май', '06' => 'июн', '07' => 'июл', '08' => 'авг',
        '09' => 'сен', '10' => 'окт', '11' => 'ноя', '12' => 'дек'
    ];
    
    $dateObj = new DateTime($date);
    $day = $dateObj->format('d');
    $month = $months[$dateObj->format('m')];
    $year = $dateObj->format('Y');
    
    return "$day $month $year";
}

// Функция для обрезки текста
function truncateText($text, $limit = 50) {
    $text = strip_tags($text);
    if (mb_strlen($text) > $limit) {
        return mb_substr($text, 0, $limit) . '...';
    }
    return $text;
}