<!--Header-->
<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?php echo BASE_URL . 'admin/posts/index.php' ?>">Админка</a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#"
                           role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user me-1"></i>
                            <?php echo $_SESSION['login']; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <a class="nav-item dropdown-item" href="<?php echo BASE_URL . "logout.php" ?> ">
                                Выход
                            </a>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>