<?php

require 'connect.php';

function tt($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";

}

// Проверка выполнения запроса к БД
function doCheckError($query)
{
    $errorInfo = $query->errorInfo();

    if ($errorInfo[0] !== PDO::ERR_NONE) {
        echo $errorInfo[2];
        exit();
    }
    return true;
}

// Запрос на получение данных с одной таблицы
function selectAll($table, $params = [])
{
    global $connect;
    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key=$value";
            } else {
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }

    $query = $connect->prepare($sql);
    $query->execute();
    doCheckError($query);
    return $query->fetchAll();
}

// Запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params = [])
{
    global $connect;
    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key=$value";
            } else {
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }

    $query = $connect->prepare($sql);
    $query->execute();
    doCheckError($query);
    return $query->fetch();
}

// Запись в таблицу БД
function insert($table, $params)
{
    global $connect;
    $i = 0;
    $coll = "";
    $mask = "";
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $coll = $coll . "$key";
            $mask = $mask . "'" . "$value" . "'";
        } else {
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value" . "'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";

    $query = $connect->prepare($sql);
    $query->execute($params);
    doCheckError($query);
    return $connect->lastInsertId();
}


// Обновление строки в таблице
function update($table, $id, $params)
{
    global $connect;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $str = $str . $key . " = '" . $value . "'";
        } else {
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }

    $sql = "UPDATE $table SET $str WHERE id = $id";
    $query = $connect->prepare($sql);
    $query->execute($params);
    doCheckError($query);
}


// Удаление строки в таблице
function delete($table, $id)
{
    global $connect;
    //DELETE FROM `topics` WHERE id = 3
    $sql = "DELETE FROM $table WHERE id =" . $id;
    $query = $connect->prepare($sql);
    $query->execute();
    doCheckError($query);
}