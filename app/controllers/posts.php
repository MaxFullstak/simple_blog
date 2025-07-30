<?php
include_once "./app/database/db.php";

$posts = [];
$topPosts = [];
$searchResults = [];
$searchTerm = '';
$totalPosts = 0;
$postsPerPage = 3;
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($currentPage - 1) * $postsPerPage;

// Обработка поиска
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])) {
    $searchTerm = trim($_POST['search-term']);
    if (!empty($searchTerm)) {
        $searchResults = searchInTitleAndContent($searchTerm, 'posts', 'users');
    }
} elseif (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = trim($_GET['search']);
    $searchResults = searchInTitleAndContent($searchTerm, 'posts', 'users');
}

// Получение топ постов для карусели
$topPosts = selectTopPostsForCarousel('posts', 'users', 3);

// Получение постов для главной страницы с пагинацией
if (empty($searchTerm)) {
    // Фильтрация по категории если указана
    if (isset($_GET['topic']) && !empty($_GET['topic'])) {
        $topicId = (int)$_GET['topic'];
        $posts = selectPostsByTopic($topicId, $postsPerPage, $offset);
        $totalPosts = countRow('posts', ['status' => 1, 'id_topic' => $topicId]);
    } else {
        $posts = selectAllFromPostsWithUsersOnIndex('posts', 'users', $postsPerPage, $offset);
        $totalPosts = countRow('posts', ['status' => 1]);
    }
    
    $totalPages = ceil($totalPosts / $postsPerPage);
} else {
    $posts = $searchResults;
}

// Получение всех категорий
$topics = selectAll('topics');

// Функция для обрезки текста
function truncateText($text, $limit = 150) {
    $text = strip_tags($text);
    if (mb_strlen($text) > $limit) {
        return mb_substr($text, 0, $limit) . '...';
    }
    return $text;
}

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