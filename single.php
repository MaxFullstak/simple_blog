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

<!-- Main start -->
<main class="main-section py-4">
    <div class="container">
        <div class="row">
            <!-- Main content -->
            <div class="main-content col-lg-8 col-12">
                <h2 class="section-title mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi ipsa
                    ipsam quia sit temporibus! Adipisci ex facere fuga inventore molestias, nemo odit porro quas veniam.
                    Amet consequatur dignissimos ea suscipit.</h2>

                <!-- Post 1 -->
                <div class="mb-4">
                    <div class="row g-0">
                        <img src="assets/images/image_3.png" alt="Изображение публикации"
                             class="rounded w-100 h-100">

                        <!--Icons-->
                        <div class="post-meta mb-2 mt-2">
                            <span class="me-3"><i class="far fa-user me-1"></i> Имя автора</span>
                            <span><i class="far fa-calendar me-1"></i> Mar 11, 2021</span>
                        </div>

                        <div class="col-md-8">
                            <div class="card-body col-12">
                                <h3>Заголовок третьего уровня</h3>
                                <div>Lorem <a class="link_underline" href="#">ipsum</a> dolor sit amet, consectetur
                                    adipisicing elit. Amet
                                    cumque delectus
                                    dignissimos esse, est et eum excepturi fugiat incidunt ipsa laudantium minus modi
                                    molestiae nulla quibusdam quisquam, rem sequi sint.
                                </div>
                                <div>Accusamus cum dolorum ducimus ea, enim, et, fuga fugiat modi natus numquam odio
                                    possimus qui quis quo recusandae saepe tempora tenetur veniam. Autem enim facere
                                    possimus quae quibusdam quidem voluptate.
                                </div>
                                <div>A accusamus aut blanditiis culpa cum eveniet exercitationem facere harum hic
                                    incidunt ipsam laboriosam mollitia neque numquam officiis praesentium quaerat quidem
                                    quos reiciendis, saepe sunt tempore totam veniam veritatis voluptas.
                                </div>
                                <div>Ad dolorum earum neque qui temporibus? Aliquam asperiores, aut consequuntur culpa
                                    cumque cupiditate delectus dolores eum id molestiae nisi omnis possimus quibusdam,
                                    quidem tempora. Amet atque hic natus ullam voluptatem!
                                </div>
                                <div>A aperiam asperiores deserunt dicta dolor dolore dolorem doloremque est ex
                                    exercitationem fuga fugiat itaque iusto nam natus necessitatibus nesciunt porro
                                    quam, quia quibusdam quisquam repellendus tempore totam ullam velit!
                                </div>
                                <div>Alias corporis dolorum ducimus eum excepturi facilis provident voluptates.
                                    Assumenda facilis illum ipsa neque quia repellendus vitae voluptatum. Blanditiis ex
                                    molestiae pariatur praesentium quia quis totam! Natus neque soluta ullam!
                                </div>
                                <div>Accusantium at ducimus minus pariatur vero. Ab atque consequatur, deserunt
                                    dignissimos error fugit laboriosam necessitatibus neque nobis non numquam quidem
                                    repudiandae sunt, vel voluptatem? Aspernatur dolorem itaque odio quae vel?
                                </div>
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
