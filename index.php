<?php include("path.php") ?>

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

    <title>Blog site</title>
</head>
<body class="d-flex flex-column min-vh-100">

<!--Header-->
<?php include("./app/ui/header.php") ?>

<!-- Carousel start -->
<section class="featured-posts">
    <div class="container">
        <div class="row">
            <h2 class="section-title text-center mb-4">Топ публикаций</h2>
        </div>

        <div class="row">
            <div class="col-12">
                <div id="postsCarousel" class="carousel slide mx-auto" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/images/image_1.png" class="d-block w-100" alt="Популярная публикация 1">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="post-title"><a href="#">Первая публикация</a></h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/image_2.png" class="d-block w-100" alt="Популярная публикация 2">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="post-title"><a href="#">Вторая публикация</a></h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/image_3.png" class="d-block w-100" alt="Популярная публикация 3">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="post-title"><a href="#">Третья публикация</a></h5>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#postsCarousel"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Назад</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#postsCarousel"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Вперед</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Carousel end -->


<!-- Main start -->
<main class="main-section py-4">
    <div class="container">
        <div class="row">
            <!-- Main content -->
            <div class="main-content col-lg-8 col-12">
                <h2 class="section-title mb-4">Последние публикации</h2>

                <!-- Post 1 -->
                <div class="post card mb-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="assets/images/image_3.png" alt="Изображение публикации"
                                 class="img-fluid rounded-start w-100 h-100 object-fit-cover">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="post-card-title">
                                    <a href="single.php">Прикольная статья на тему динамических сайтов...</a>
                                </h3>
                                <div class="post-meta mb-2">
                                    <span class="me-3"><i class="far fa-user me-1"></i> Имя автора</span>
                                    <span><i class="far fa-calendar me-1"></i> Mar 11, 2021</span>
                                </div>
                                <p class="preview-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi
                                    asperiores beatae expedita facilis fuga impedit iusto laborum molestias officia
                                    optio quos saepe sed, tempore, tenetur totam vel veritatis! Atque, vero!</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Post 2 -->
                <div class="post card mb-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="assets/images/image_2.png" alt="Изображение публикации"
                                 class="img-fluid rounded-start w-100 h-100 object-fit-cover">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="post-card-title">
                                    <a href="#">Как создать адаптивный дизайн за 5 шагов</a>
                                </h3>
                                <div class="post-meta mb-2">
                                    <span class="me-3"><i class="far fa-user me-1"></i> Другой автор</span>
                                    <span><i class="far fa-calendar me-1"></i> Apr 5, 2023</span>
                                </div>
                                <p class="preview-text">Современные требования к веб-дизайну включают обязательную
                                    адаптивность. В этой статье мы рассмотрим основные принципы создания сайтов, которые
                                    отлично выглядят на любых устройствах.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Post 3 -->
                <div class="post card mb-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="assets/images/image_1.png" alt="Изображение публикации"
                                 class="img-fluid rounded-start w-100 h-100 object-fit-cover">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="post-card-title">
                                    <a href="#">Новые тенденции в веб-разработке 2023</a>
                                </h3>
                                <div class="post-meta mb-2">
                                    <span class="me-3"><i class="far fa-user me-1"></i> Ведущий эксперт</span>
                                    <span><i class="far fa-calendar me-1"></i> May 20, 2023</span>
                                </div>
                                <p class="preview-text">Каждый год приносит новые технологии и подходы в веб-разработке.
                                    В этой статье мы рассмотрим самые перспективные направления, которые стоит освоить в
                                    этом году.</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <!-- Sidebar content -->
            <div class="sidebar col-lg-4 col-12">
                <div class="card search-widget mb-4">
                    <div class="card-body">
                        <h3 class="card-title mb-3">Поиск</h3>
                        <form method="post">
                            <div class="input-group">
                                <input type="text" name="search-term" class="form-control"
                                       placeholder="Введите искомое слово...">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card topics-widget">
                    <div class="card-body">
                        <h3 class="card-title mb-3">Категории</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="#">Стихи</a></li>
                            <li class="list-group-item"><a href="#">Цитаты</a></li>
                            <li class="list-group-item"><a href="#">Художественная литература</a></li>
                            <li class="list-group-item"><a href="#">Биографии</a></li>
                            <li class="list-group-item"><a href="#">Мотивация</a></li>
                            <li class="list-group-item"><a href="#">Вдохновение</a></li>
                            <li class="list-group-item"><a href="#">Жизненные уроки</a></li>
                        </ul>
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
<!--Popper JS -->
<!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"-->
<!--        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"-->
<!--        crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js"-->
<!--        integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D"-->
<!--        crossorigin="anonymous"></script>-->
</body>
</html>
