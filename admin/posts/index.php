<?php
include '../../path.php';
include '../../app/controllers/admin-posts.php';
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
    <link rel="stylesheet" href="../../assets/css/admin.css">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/images/favicon.ico">


    <!-- Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">

    <title>Blog site</title>
</head>
<body class="d-flex flex-column min-vh-100">

<!--Header-->
<?php include("../../app/ui/header-admin.php") ?>

<div class="container">
    <div class="row">
        <?php include '../../app/ui/sidebar-admin.php' ?>

        <div class="posts col-9">
            <div class="row button mb-3">
                <a href="<?php echo BASE_URL . "admin/posts/create.php" ?>" class="col-3 btn btn-success">Создать</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/posts/index.php" ?>" class="col-3 btn btn-warning">Управление</a>
            </div>

            <?php if (!empty($successMsg)): ?>
                <div class="alert alert-success"><?= $successMsg ?></div>
            <?php endif; ?>

            <?php if (!empty($errorMsg)): ?>
                <div class="alert alert-danger"><?= $errorMsg ?></div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">Управление записями</h2>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 50px;">ID</th>
                                    <th>Название</th>
                                    <th style="width: 120px;">Автор</th>
                                    <th style="width: 100px;">Статус</th>
                                    <th style="width: 120px;">Дата</th>
                                    <th style="width: 200px;">Управление</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($posts)): ?>
                                    <?php foreach ($posts as $post): ?>
                                        <tr>
                                            <td><?= $post['id'] ?></td>
                                            <td>
                                                <strong><?= htmlspecialchars(truncateText($post['title'], 40)) ?></strong>
                                                <br><small class="text-muted"><?= truncateText($post['content'], 60) ?></small>
                                            </td>
                                            <td><?= htmlspecialchars($post['username']) ?></td>
                                            <td>
                                                <?php if ($post['status']): ?>
                                                    <span class="badge bg-success">Опубликован</span>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary">Черновик</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= formatDate($post['created_date']) ?></td>
                                            <td>
                                                <div class="btn-group-vertical btn-group-sm w-100">
                                                    <a href="edit.php?id=<?= $post['id'] ?>" class="btn btn-primary btn-sm">
                                                        <i class="fas fa-edit"></i> Редактировать
                                                    </a>
                                                    <?php if ($post['status']): ?>
                                                        <a href="?pub_id=<?= $post['id'] ?>" class="btn btn-warning btn-sm" 
                                                           onclick="return confirm('Снять с публикации?')">
                                                            <i class="fas fa-eye-slash"></i> Скрыть
                                                        </a>
                                                    <?php else: ?>
                                                        <a href="?pub_id=<?= $post['id'] ?>&publish=1" class="btn btn-success btn-sm" 
                                                           onclick="return confirm('Опубликовать пост?')">
                                                            <i class="fas fa-eye"></i> Опубликовать
                                                        </a>
                                                    <?php endif; ?>
                                                    <a href="?delete_id=<?= $post['id'] ?>" class="btn btn-danger btn-sm" 
                                                       onclick="return confirm('Вы уверены, что хотите удалить этот пост?')">
                                                        <i class="fas fa-trash"></i> Удалить
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            <p class="mb-2">Записи не найдены</p>
                                            <a href="create.php" class="btn btn-success">Создать первую запись</a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Footer-->
<?php include("../../app/ui/footer.php"); ?>
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
