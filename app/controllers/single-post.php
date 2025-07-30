<?php
include_once "./app/database/db.php";

$post = null;
$relatedPosts = [];

// Получаем ID поста из URL
$postId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($postId > 0) {
    // Получаем пост с информацией об авторе и категории
    $post = selectPostFromPostsWithUsersOnSingle('posts', 'users', $postId);
    
    if ($post) {
        // Получаем связанные посты из той же категории
        $relatedPosts = selectPostsByTopic($post['id_topic'], 3, 0);
        // Исключаем текущий пост из связанных
        $relatedPosts = array_filter($relatedPosts, function($relatedPost) use ($postId) {
            return $relatedPost['id'] != $postId;
        });
    }
}

// Получение всех категорий для сайдбара
$topics = selectAll('topics');

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

// Обработка поиска для сайдбара
$searchTerm = '';
$searchResults = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])) {
    $searchTerm = trim($_POST['search-term']);
    if (!empty($searchTerm)) {
        // Перенаправляем на главную страницу с результатами поиска
        header('location: ' . BASE_URL . '?search=' . urlencode($searchTerm));
        exit();
    }
}