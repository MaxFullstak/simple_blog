<?php

session_start();
require 'connect.php';

function tt($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}

function tte($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

// Проверка выполнения запроса к БД
function dbCheckError($query)
{
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}

// Запрос на получение данных с одной таблицы
function selectAll($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM `$table`";
    $values = [];
    $conditions = [];

    if (!empty($params)) {
        foreach ($params as $key => $value) {
            $conditions[] = "`$key` = ?";
            $values[] = $value;
        }
        $sql .= " WHERE " . implode(' AND ', $conditions);
    }

    $query = $pdo->prepare($sql);
    $query->execute($values);
    dbCheckError($query);
    return $query->fetchAll();
}

// Запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM `$table`";
    $values = [];
    $conditions = [];

    if (!empty($params)) {
        foreach ($params as $key => $value) {
            $conditions[] = "`$key` = ?";
            $values[] = $value;
        }
        $sql .= " WHERE " . implode(' AND ', $conditions);
    }

    $sql .= " LIMIT 1";

    $query = $pdo->prepare($sql);
    $query->execute($values);
    dbCheckError($query);
    return $query->fetch();
}

// Запись в таблицу БД (уже исправленная)
function insert($table, $params)
{
    global $pdo;
    $columns = '`' . implode('`, `', array_keys($params)) . '`';
    $placeholders = ':' . implode(', :', array_keys($params));

    $sql = "INSERT INTO `$table` ($columns) VALUES ($placeholders)";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
    return $pdo->lastInsertId();
}

// Обновление строки в таблице
function update($table, $id, $params)
{
    global $pdo;
    $setFields = [];
    $values = [];

    foreach ($params as $key => $value) {
        $setFields[] = "`$key` = ?";
        $values[] = $value;
    }
    $values[] = $id; // Добавляем ID для условия WHERE

    $sql = "UPDATE `$table` SET " . implode(', ', $setFields) . " WHERE `id` = ?";

    $query = $pdo->prepare($sql);
    $query->execute($values);
    dbCheckError($query);
}

// Удаление строки из таблицы
function delete($table, $id)
{
    global $pdo;
    $sql = "DELETE FROM `$table` WHERE `id` = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$id]);
    dbCheckError($query);
}

// Выборка записей (posts) с автором в админку
//function selectAllFromPostsWithUsers($table1, $table2)
//{
//    global $pdo;
//    $sql = "SELECT
//        t1.id,
//        t1.title,
//        t1.img,
//        t1.content,
//        t1.status,
//        t1.id_topic,
//        t1.created_date,
//        t2.username
//        FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id";
//    $query = $pdo->prepare($sql);
//    $query->execute();
//    dbCheckError($query);
//    return $query->fetchAll();
//
//}

// Выборка записей (posts) с автором на главную
//function selectAllFromPostsWithUsersOnIndex($table1, $table2, $limit, $offset)
//{
//    global $pdo;
//    $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status=1 LIMIT $limit OFFSET $offset";
//    $query = $pdo->prepare($sql);
//    $query->execute();
//    dbCheckError($query);
//    return $query->fetchAll();
//}

// Выборка записей (posts) с автором на главную
//function selectTopTopicFromPostsOnIndex($table1)
//{
//    global $pdo;
//    $sql = "SELECT * FROM $table1 WHERE id_topic = 18";
//    $query = $pdo->prepare($sql);
//    $query->execute();
//    dbCheckError($query);
//    return $query->fetchAll();
//
//}


// Поиск по заголовкам и содержимому (простой)
//function seacrhInTitileAndContent($text, $table1, $table2)
//{
//    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
//    global $pdo;
//    $sql = "SELECT
//        p.*, u.username
//        FROM $table1 AS p
//        JOIN $table2 AS u
//        ON p.id_user = u.id
//        WHERE p.status=1
//        AND p.title LIKE '%$text%' OR p.content LIKE '%$text%'";
//    $query = $pdo->prepare($sql);
//    $query->execute();
//    dbCheckError($query);
//    return $query->fetchAll();
//}

// Выборка записи (posts) с автором для синг
//function selectPostFromPostsWithUsersOnSingle($table1, $table2, $id)
//{
//    global $pdo;
//    $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.id=$id";
//    $query = $pdo->prepare($sql);
//    $query->execute();
//    dbCheckError($query);
//    return $query->fetch();
//}

// Считаем количество строк в таблице
//function countRow($table)
//{
//    global $pdo;
//    $sql = "SELECT Count(*) FROM $table";
//    $query = $pdo->prepare($sql);
//    $query->execute();
//    dbCheckError($query);
//    return $query->fetchColumn();
//}