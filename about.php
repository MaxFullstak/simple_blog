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

    <title>О нас - Blog site</title>
</head>
<body class="d-flex flex-column min-vh-100">

<!--Header-->
<?php include("./app/ui/header.php") ?>

<!-- Main start -->
<main class="main-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <h1 class="text-center mb-5">О нашем блоге</h1>
                
                <div class="card shadow-sm mb-4">
                    <div class="card-body p-5">
                        <div class="row align-items-center mb-4">
                            <div class="col-md-4 text-center mb-3 mb-md-0">
                                <img src="assets/images/image_small.png" alt="О нас" class="img-fluid rounded-circle" style="max-width: 200px;">
                            </div>
                            <div class="col-md-8">
                                <h2 class="h3 mb-3">Добро пожаловать в наш мир!</h2>
                                <p class="lead">Мы создали этот блог с целью поделиться знаниями, опытом и вдохновением с нашими читателями.</p>
                            </div>
                        </div>
                        
                        <h3 class="h4 mb-3">Наша миссия</h3>
                        <p>Наш блог - это пространство для обмена идеями, обучения и вдохновения. Мы стремимся предоставить качественный контент, который поможет нашим читателям в их личном и профессиональном развитии.</p>
                        
                        <h3 class="h4 mb-3 mt-4">Что вы найдете у нас:</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Статьи о веб-разработке</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Мотивационные материалы</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Поэзия и литература</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Жизненные уроки</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Биографии интересных людей</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Цитаты великих</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Технологические обзоры</li>
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Дизайн и творчество</li>
                                </ul>
                            </div>
                        </div>
                        
                        <h3 class="h4 mb-3 mt-4">Наши ценности</h3>
                        <div class="row">
                            <div class="col-md-4 text-center mb-3">
                                <div class="p-3">
                                    <i class="fas fa-lightbulb fa-3x text-warning mb-3"></i>
                                    <h5>Знания</h5>
                                    <p class="small">Мы верим в силу образования и постоянного обучения.</p>
                                </div>
                            </div>
                            <div class="col-md-4 text-center mb-3">
                                <div class="p-3">
                                    <i class="fas fa-heart fa-3x text-danger mb-3"></i>
                                    <h5>Вдохновение</h5>
                                    <p class="small">Каждая статья должна мотивировать и вдохновлять читателей.</p>
                                </div>
                            </div>
                            <div class="col-md-4 text-center mb-3">
                                <div class="p-3">
                                    <i class="fas fa-users fa-3x text-primary mb-3"></i>
                                    <h5>Сообщество</h5>
                                    <p class="small">Мы строим дружелюбное сообщество единомышленников.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mt-4">
                            <h4>Присоединяйтесь к нам!</h4>
                            <p>Будьте частью нашего сообщества и не пропускайте новые интересные материалы.</p>
                            <a href="<?= BASE_URL ?>" class="btn btn-primary btn-lg me-3">Читать блог</a>
                            <a href="reg.php" class="btn btn-outline-primary btn-lg">Регистрация</a>
                        </div>
                    </div>
                </div>
                
                <!-- Статистика -->
                <div class="row text-center">
                    <div class="col-md-3 col-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <i class="fas fa-newspaper fa-2x text-primary mb-2"></i>
                                <h5 class="card-title"><?= countRow('posts', ['status' => 1]) ?></h5>
                                <p class="card-text small">Опубликованных статей</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <i class="fas fa-tags fa-2x text-success mb-2"></i>
                                <h5 class="card-title"><?= countRow('topics') ?></h5>
                                <p class="card-text small">Категорий</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <i class="fas fa-users fa-2x text-info mb-2"></i>
                                <h5 class="card-title"><?= countRow('users') ?></h5>
                                <p class="card-text small">Зарегистрированных пользователей</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <i class="fas fa-calendar fa-2x text-warning mb-2"></i>
                                <h5 class="card-title">2024</h5>
                                <p class="card-text small">Год основания</p>
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