# Dynamic Blog - Динамический блог на PHP

Полнофункциональный блог-сайт на PHP с MySQL базой данных, админ-панелью и современным дизайном.

## 🚀 Особенности

- **Полностью динамический контент** - все посты загружаются из базы данных
- **Адаптивный дизайн** - отлично работает на всех устройствах
- **Админ-панель** - управление постами, категориями и пользователями
- **Система аутентификации** - регистрация и авторизация пользователей
- **Поиск по постам** - поиск по заголовкам и содержимому
- **Пагинация** - постраничная навигация
- **Фильтрация по категориям** - сортировка постов по темам
- **Контактная форма** - с сохранением в базу данных
- **SEO-оптимизация** - чистые URL и мета-теги

## 📋 Требования

- PHP 7.4 или выше
- MySQL 5.7 или выше
- Apache/Nginx веб-сервер
- PDO MySQL расширение

## 🔧 Установка

### 1. Клонирование проекта
```bash
git clone [your-repository-url]
cd dynamic_blog
```

### 2. Настройка базы данных

#### Создайте базу данных MySQL:
```sql
CREATE DATABASE dynamic_blog CHARACTER SET utf8 COLLATE utf8_general_ci;
```

#### Обновите настройки подключения в `app/database/connect.php`:
```php
$driver = "mysql";
$host = "localhost";
$db_name = "dynamic_blog";
$db_user = "your_username";
$db_pass = "your_password";
```

#### Выполните SQL команды для создания таблиц:
```sql
USE dynamic_blog;

-- Создание таблицы пользователей
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    admin TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Создание таблицы категорий
CREATE TABLE topics (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Создание таблицы постов
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_topic INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    img VARCHAR(255),
    status TINYINT(1) DEFAULT 0,
    created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (id_topic) REFERENCES topics(id) ON DELETE CASCADE
);

-- Создание таблицы для контактов (создается автоматически при первом сообщении)
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

#### Добавьте тестовые данные:
```sql
-- Создание администратора (пароль: admin123)
INSERT INTO users (username, email, password, admin) VALUES 
('admin', 'admin@myblog.com', '$2y$10$YourHashedPasswordHere', 1);

-- Создание категорий
INSERT INTO topics (name, description) VALUES 
('Веб-разработка', 'Статьи о программировании'),
('Мотивация', 'Мотивационные материалы'),
('Технологии', 'Новости технологий'),
('Дизайн', 'Статьи о дизайне'),
('Стихи', 'Поэтические произведения'),
('Цитаты', 'Вдохновляющие цитаты'),
('Биографии', 'Истории жизни'),
('Жизненные уроки', 'Полезные советы');
```

### 3. Настройка путей

Обновите BASE_URL в файле `path.php`:
```php
define('BASE_URL', 'http://localhost/your-project-folder/');
```

### 4. Настройка веб-сервера

#### Apache (.htaccess)
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^([^?]*) index.php?url=$1 [QSA,L]
```

#### Nginx
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

## 📁 Структура проекта

```
dynamic_blog/
├── admin/                 # Админ-панель
│   ├── posts/            # Управление постами
│   ├── topics/           # Управление категориями
│   └── users/            # Управление пользователями
├── app/                   # Основные компоненты приложения
│   ├── controllers/       # Контроллеры
│   ├── database/         # Работа с БД
│   └── ui/               # UI компоненты
├── assets/               # Статические файлы
│   ├── css/             # Стили
│   └── images/          # Изображения
├── index.php            # Главная страница
├── single.php           # Страница поста
├── about.php            # О нас
├── services.php         # Услуги
├── login.php            # Авторизация
├── reg.php              # Регистрация
└── logout.php           # Выход
```

## 🎯 Использование

### Для пользователей:
1. Откройте сайт в браузере
2. Зарегистрируйтесь или войдите в систему
3. Просматривайте посты, используйте поиск и фильтры
4. Используйте контактную форму для связи

### Для администраторов:
1. Войдите как администратор
2. Перейдите в админ-панель
3. Управляйте постами, категориями и пользователями
4. Публикуйте и редактируйте контент

## 🔐 Учетные данные по умолчанию

Создайте администратора с помощью регистрации, затем вручную установите `admin = 1` в базе данных для этого пользователя.

## 🛠 Возможности развития

- Система комментариев
- Email уведомления
- Социальные сети интеграция
- API для мобильных приложений
- Многоязычность
- Система тегов
- Загрузка файлов
- Кэширование

## 📞 Поддержка

Если у вас возникли вопросы или проблемы:
1. Проверьте настройки базы данных
2. Убедитесь что все файлы загружены
3. Проверьте права доступа к файлам (755 для папок, 644 для файлов)
4. Включите отображение ошибок PHP для отладки

## 📝 Лицензия

Этот проект создан в образовательных целях. Используйте на свое усмотрение.

---

**Успешного запуска вашего блога! 🎉**