<?php
include '../../path.php';
//include '../../app/controllers/users.php';
include '../../app/database/db.php';
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


            <div class="row button">
                <a href="<?php echo BASE_URL . "admin/users/create.php" ?>" class="col-3  btn btn-success">Создать</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/users/index.php" ?>" class="col-3 btn btn-warning">Управление</a>
            </div>
            <div class="row title-table">
                <h2>Создание пользователя</h2>
            </div>
            <div class="row add-post">
                <form action="create.php" method="post">

                    <div class="col">
                        <label for="formGroupExampleInput" class="form-label">Ваш логин</label>
                        <input value="<?= $login ?>" name="login" type="text" class="form-control"
                               id="formGroupExampleInput"
                               placeholder="Введите свой логин...">
                    </div>

                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input value="<?= $email ?>" name="email" type="email" class="form-control"
                               id="exampleInputEmail1"
                               aria-describedby="emailHelp"/>
                    </div>


                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input name="pass" type="password" class="form-control" id="exampleInputPassword1">
                    </div>


                    <div class="col">
                        <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
                        <input name="pass_repeat" type="password" class="form-control" id="exampleInputPassword2">
                    </div>

                    <select class="form-select" aria-label="Default select example">
                        <option selected>User</option>
                        <option value="1">Admin</option>

                    </select>

                    <div class="col">
                        <button class="btn btn-primary" type="submit">Создать пользователя</button>
                    </div>
                </form>
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
