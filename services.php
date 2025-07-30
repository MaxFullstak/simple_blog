<?php
include 'path.php';
include './app/database/db.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--  Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!--  Custom CSS-->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">

    <title>Услуги - Blog site</title>
</head>
<body class="d-flex flex-column min-vh-100">

<!--Header-->
<?php include("./app/ui/header.php") ?>

<!-- Main start -->
<main class="main-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12">
                <h1 class="text-center mb-5">Наши услуги</h1>
                
                <!-- Hero Section -->
                <div class="card shadow-sm mb-5">
                    <div class="card-body text-center p-5">
                        <h2 class="h3 mb-3">Мы предлагаем комплексные решения для вашего развития</h2>
                        <p class="lead">От создания контента до обучения и консультаций - мы поможем вам достичь ваших целей.</p>
                    </div>
                </div>

                <!-- Услуги -->
                <div class="row g-4">
                    <!-- Создание контента -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <i class="fas fa-pen-fancy fa-3x text-primary"></i>
                                </div>
                                <h4 class="card-title">Создание контента</h4>
                                <p class="card-text">Профессиональное написание статей, блог-постов и другого контента для вашего сайта или блога.</p>
                                <ul class="list-unstyled text-start small">
                                    <li><i class="fas fa-check text-success me-2"></i>SEO-оптимизированные статьи</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Уникальный контент</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Быстрые сроки</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Различные тематики</li>
                                </ul>
                                <div class="mt-auto">
                                    <p class="h5 text-primary mb-2">От 1000₽ за статью</p>
                                    <button class="btn btn-primary">Заказать</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Веб-разработка -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <i class="fas fa-code fa-3x text-success"></i>
                                </div>
                                <h4 class="card-title">Веб-разработка</h4>
                                <p class="card-text">Создание современных, адаптивных сайтов и веб-приложений с использованием последних технологий.</p>
                                <ul class="list-unstyled text-start small">
                                    <li><i class="fas fa-check text-success me-2"></i>Лендинг страницы</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Корпоративные сайты</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Интернет-магазины</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Веб-приложения</li>
                                </ul>
                                <div class="mt-auto">
                                    <p class="h5 text-success mb-2">От 15000₽</p>
                                    <button class="btn btn-success">Заказать</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Консультации -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <i class="fas fa-comments fa-3x text-info"></i>
                                </div>
                                <h4 class="card-title">Консультации</h4>
                                <p class="card-text">Персональные консультации по веб-разработке, контент-маркетингу и развитию онлайн-присутствия.</p>
                                <ul class="list-unstyled text-start small">
                                    <li><i class="fas fa-check text-success me-2"></i>Анализ проекта</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Техническая экспертиза</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Стратегия развития</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Онлайн встречи</li>
                                </ul>
                                <div class="mt-auto">
                                    <p class="h5 text-info mb-2">2000₽ за час</p>
                                    <button class="btn btn-info">Заказать</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Обучение -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <i class="fas fa-graduation-cap fa-3x text-warning"></i>
                                </div>
                                <h4 class="card-title">Обучение</h4>
                                <p class="card-text">Индивидуальные и групповые курсы по веб-разработке, программированию и созданию контента.</p>
                                <ul class="list-unstyled text-start small">
                                    <li><i class="fas fa-check text-success me-2"></i>HTML/CSS/JavaScript</li>
                                    <li><i class="fas fa-check text-success me-2"></i>PHP и базы данных</li>
                                    <li><i class="fas fa-check text-success me-2"></i>WordPress</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Контент-маркетинг</li>
                                </ul>
                                <div class="mt-auto">
                                    <p class="h5 text-warning mb-2">От 5000₽ за курс</p>
                                    <button class="btn btn-warning">Записаться</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SEO оптимизация -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <i class="fas fa-search fa-3x text-danger"></i>
                                </div>
                                <h4 class="card-title">SEO оптимизация</h4>
                                <p class="card-text">Комплексная поисковая оптимизация вашего сайта для улучшения позиций в поисковых системах.</p>
                                <ul class="list-unstyled text-start small">
                                    <li><i class="fas fa-check text-success me-2"></i>Аудит сайта</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Подбор ключевых слов</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Техническая оптимизация</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Линкбилдинг</li>
                                </ul>
                                <div class="mt-auto">
                                    <p class="h5 text-danger mb-2">От 10000₽</p>
                                    <button class="btn btn-danger">Заказать</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Техническая поддержка -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <i class="fas fa-tools fa-3x text-secondary"></i>
                                </div>
                                <h4 class="card-title">Техническая поддержка</h4>
                                <p class="card-text">Постоянная техническая поддержка и обслуживание вашего сайта для стабильной работы.</p>
                                <ul class="list-unstyled text-start small">
                                    <li><i class="fas fa-check text-success me-2"></i>Резервное копирование</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Обновления системы</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Мониторинг работы</li>
                                    <li><i class="fas fa-check text-success me-2"></i>24/7 поддержка</li>
                                </ul>
                                <div class="mt-auto">
                                    <p class="h5 text-secondary mb-2">От 3000₽/мес</p>
                                    <button class="btn btn-secondary">Подключить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="text-center mt-5">
                    <div class="card shadow-sm bg-light">
                        <div class="card-body p-5">
                            <h3 class="mb-3">Готовы начать работу?</h3>
                            <p class="lead mb-4">Свяжитесь с нами для обсуждения вашего проекта и получения персонального предложения.</p>
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <a href="mailto:info@myblog.com" class="btn btn-primary btn-lg me-3">
                                        <i class="fas fa-envelope me-2"></i>Написать нам
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <a href="tel:+7-123-456-789" class="btn btn-outline-primary btn-lg">
                                        <i class="fas fa-phone me-2"></i>Позвонить
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Процесс работы -->
                <div class="mt-5">
                    <h3 class="text-center mb-4">Как мы работаем</h3>
                    <div class="row">
                        <div class="col-md-3 text-center mb-4">
                            <div class="p-3">
                                <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <span class="h4 m-0">1</span>
                                </div>
                                <h5>Обсуждение</h5>
                                <p class="small text-muted">Выясняем ваши потребности и цели</p>
                            </div>
                        </div>
                        <div class="col-md-3 text-center mb-4">
                            <div class="p-3">
                                <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <span class="h4 m-0">2</span>
                                </div>
                                <h5>Планирование</h5>
                                <p class="small text-muted">Создаем план работы и определяем сроки</p>
                            </div>
                        </div>
                        <div class="col-md-3 text-center mb-4">
                            <div class="p-3">
                                <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <span class="h4 m-0">3</span>
                                </div>
                                <h5>Реализация</h5>
                                <p class="small text-muted">Выполняем работу согласно плану</p>
                            </div>
                        </div>
                        <div class="col-md-3 text-center mb-4">
                            <div class="p-3">
                                <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <span class="h4 m-0">4</span>
                                </div>
                                <h5>Результат</h5>
                                <p class="small text-muted">Сдаем готовый результат и поддерживаем</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main end -->

<!--Footer-->
<?php include("./app/ui/footer.php"); ?>
<!--  Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>
</html>