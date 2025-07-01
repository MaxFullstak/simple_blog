<?php
include '../../path.php';
include '../../app/controllers/topics.php';
?>
    <!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
              crossorigin="anonymous">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
              integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
              crossorigin="anonymous">


        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="../../assets/images/favicon.ico">

        <!-- Custom Styling -->
        <link rel="stylesheet" href="../../assets/css/admin.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap"
              rel="stylesheet">
        <title>My blog</title>
    </head>
<body>

<?php include("../../app/ui/header-admin.php"); ?>

    <div class="container">
        <div class="row">  <!-- Добавлена обертка-строка -->
            <?php include "../../app/ui/sidebar-admin.php"; ?>

            <div class="posts col-9">  <!-- Основной контент -->
                <div class="button row">  <!-- Строка с кнопками -->
                    <a href="<?php echo BASE_URL . "admin/topics/create.php"; ?>"
                       class="col-3 btn btn-success">Создать</a>
                    <span class="col-1"></span>
                    <a href="<?php echo BASE_URL . "admin/topics/index.php"; ?>" class="col-3 btn btn-warning">Редактировать</a>
                </div>
                <div class="row title-table">
                    <h2>Обновление категории</h2>  <!-- Исправлена опечатка -->
                </div>
                <div class="row add-post">
                    <?php if (!empty($errorMsg)): ?>  <!-- Улучшен вывод ошибок -->
                        <div class="mb-3 col-12">
                            <div class="alert alert-danger"><?= $errorMsg ?></div>
                        </div>
                    <?php endif; ?>
                    <form action="edit.php" method="post">
                        <input name="id" value="<?= $id; ?>" type="hidden">
                        <div class="col mb-3">  <!-- Добавлены отступы -->
                            <input name="name" value="<?= $name; ?>" type="text" class="form-control"
                                   placeholder="Имя категории" aria-label="Имя категории">
                        </div>
                        <div class="col mb-3">  <!-- Добавлены отступы -->
                            <label for="content" class="form-label">Описание категории</label>
                            <textarea name="description" class="form-control" id="content"
                                      rows="3"><?= $description; ?></textarea>
                        </div>
                        <div class="col">
                            <button name="topic-edit" class="btn btn-primary" type="submit">Обновить категорию</button>
                        </div>
                    </form>
                </div>
            </div>  <!-- Закрытие основного контента -->
        </div>  <!-- Закрытие строки -->
    </div>

    <!-- footer -->
<?php include("../../app/ui/footer.php"); ?>