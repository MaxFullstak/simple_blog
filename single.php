<?php 
include("path.php");
include("./app/controllers/single-post.php");
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

<!-- Main start -->
<main class="main-section py-4">
    <div class="container">
        <div class="row">
            <!-- Main content -->
            <div class="main-content col-lg-8 col-12">
                <?php if ($post): ?>
                    <h1 class="section-title mb-4"><?= htmlspecialchars($post['title']) ?></h1>

                    <!-- Post -->
                    <div class="mb-4">
                        <div class="row g-0">
                            <img src="assets/images/<?= $post['img'] ?>" alt="<?= htmlspecialchars($post['title']) ?>"
                                 class="rounded w-100 mb-4">

                            <!--Meta info-->
                            <div class="post-meta mb-3">
                                <span class="me-3"><i class="far fa-user me-1"></i> <?= htmlspecialchars($post['username']) ?></span>
                                <span class="me-3"><i class="far fa-calendar me-1"></i> <?= formatDate($post['created_date']) ?></span>
                                <span class="badge bg-primary"><?= htmlspecialchars($post['topic_name']) ?></span>
                            </div>

                            <div class="post-content">
                                <?= $post['content'] ?>
                            </div>
                        </div>
                    </div>

                    <!-- Связанные посты -->
                    <?php if (!empty($relatedPosts)): ?>
                        <div class="mt-5">
                            <h3 class="mb-4">Похожие статьи</h3>
                            <div class="row">
                                <?php foreach (array_slice($relatedPosts, 0, 2) as $relatedPost): ?>
                                    <div class="col-md-6 mb-3">
                                        <div class="card">
                                            <img src="assets/images/<?= $relatedPost['img'] ?>" class="card-img-top" alt="<?= htmlspecialchars($relatedPost['title']) ?>">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="single.php?id=<?= $relatedPost['id'] ?>"><?= htmlspecialchars($relatedPost['title']) ?></a>
                                                </h5>
                                                <p class="card-text"><?= mb_substr(strip_tags($relatedPost['content']), 0, 100) ?>...</p>
                                                <small class="text-muted"><?= formatDate($relatedPost['created_date']) ?></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                <?php else: ?>
                    <div class="alert alert-warning">
                        <h4>Пост не найден</h4>
                        <p>К сожалению, запрашиваемый пост не найден или не опубликован.</p>
                        <a href="<?= BASE_URL ?>" class="btn btn-primary">Вернуться на главную</a>
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
                                <a href="<?= BASE_URL ?>">Все категории</a>
                            </li>
                            <?php if (!empty($topics)): ?>
                                <?php foreach ($topics as $topic): ?>
                                    <li class="list-group-item">
                                        <a href="<?= BASE_URL ?>?topic=<?= $topic['id'] ?>">
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
