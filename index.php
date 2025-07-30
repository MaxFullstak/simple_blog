<?php
include 'path.php';
include './app/controllers/posts.php';
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
                        <?php if (!empty($topPosts)): ?>
                            <?php foreach ($topPosts as $index => $post): ?>
                                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                    <img src="assets/images/<?= $post['img'] ?>" class="d-block w-100" alt="<?= htmlspecialchars($post['title']) ?>">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 class="post-title"><a href="single.php?id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h5>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="carousel-item active">
                                <img src="assets/images/image_1.png" class="d-block w-100" alt="Нет постов">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="post-title"><a href="#">Нет доступных постов</a></h5>
                                </div>
                            </div>
                        <?php endif; ?>
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
                <?php if (!empty($searchTerm)): ?>
                    <h2 class="section-title mb-4">Результаты поиска: "<?= htmlspecialchars($searchTerm) ?>"</h2>
                <?php else: ?>
                    <h2 class="section-title mb-4">Последние публикации</h2>
                <?php endif; ?>

                <?php if (!empty($posts)): ?>
                    <?php foreach ($posts as $post): ?>
                        <div class="post card mb-4">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="assets/images/<?= $post['img'] ?>" alt="<?= htmlspecialchars($post['title']) ?>"
                                         class="img-fluid rounded-start w-100 h-100 object-fit-cover">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="post-card-title">
                                            <a href="single.php?id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a>
                                        </h3>
                                        <div class="post-meta mb-2">
                                            <span class="me-3"><i class="far fa-user me-1"></i> <?= htmlspecialchars($post['username']) ?></span>
                                            <span><i class="far fa-calendar me-1"></i> <?= formatDate($post['created_date']) ?></span>
                                        </div>
                                        <p class="preview-text"><?= truncateText($post['content']) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Пагинация -->
                    <?php if (empty($searchTerm) && isset($totalPages) && $totalPages > 1): ?>
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <?php if ($currentPage > 1): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $currentPage - 1 ?><?= isset($_GET['topic']) ? '&topic=' . $_GET['topic'] : '' ?>">Предыдущая</a>
                                    </li>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <li class="page-item <?= $i === $currentPage ? 'active' : '' ?>">
                                        <a class="page-link" href="?page=<?= $i ?><?= isset($_GET['topic']) ? '&topic=' . $_GET['topic'] : '' ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>

                                <?php if ($currentPage < $totalPages): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $currentPage + 1 ?><?= isset($_GET['topic']) ? '&topic=' . $_GET['topic'] : '' ?>">Следующая</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="alert alert-info">
                        <h4>Посты не найдены</h4>
                        <p>К сожалению, по вашему запросу ничего не найдено. Попробуйте изменить условия поиска.</p>
                    </div>
                <?php endif; ?>
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
                            <li class="list-group-item">
                                <a href="<?= BASE_URL ?>" class="<?= !isset($_GET['topic']) ? 'fw-bold' : '' ?>">Все категории</a>
                            </li>
                            <?php if (!empty($topics)): ?>
                                <?php foreach ($topics as $topic): ?>
                                    <li class="list-group-item">
                                        <a href="?topic=<?= $topic['id'] ?>" 
                                           class="<?= isset($_GET['topic']) && $_GET['topic'] == $topic['id'] ? 'fw-bold' : '' ?>">
                                            <?= htmlspecialchars($topic['name']) ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
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
