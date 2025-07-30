<?php
include_once "./app/database/db.php";

$successMessage = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['message'])) {
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    
    // Валидация
    if (empty($email) || empty($message)) {
        $errorMessage = 'Все поля должны быть заполнены';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = 'Введите корректный email адрес';
    } elseif (strlen($message) < 10) {
        $errorMessage = 'Сообщение должно содержать минимум 10 символов';
    } else {
        // Создаем таблицу для сообщений если её нет
        try {
            global $pdo;
            $createTable = "CREATE TABLE IF NOT EXISTS contacts (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                message TEXT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";
            $pdo->exec($createTable);
            
            // Сохраняем сообщение в базу данных
            $contactData = [
                'email' => $email,
                'message' => $message
            ];
            
            insert('contacts', $contactData);
            $successMessage = 'Спасибо за ваше сообщение! Мы свяжемся с вами в ближайшее время.';
            
            // Очищаем поля формы после успешной отправки
            $email = '';
            $message = '';
            
        } catch (Exception $e) {
            $errorMessage = 'Произошла ошибка при отправке сообщения. Попробуйте позже.';
        }
    }
} else {
    $email = '';
    $message = '';
}
?>