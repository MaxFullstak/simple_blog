<!--Header-->
<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?php echo BASE_URL ?>">Блог</a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL ?>">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL . 'about.php' ?>">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL . 'services.php' ?>">Услуги</a>
                    </li>
                    <li class="nav-item dropdown">
                        <?php if (isset($_SESSION['id'])): ?>
                            <a class="nav-link dropdown-toggle" href="#"
                               role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user me-1"></i>
                                <?php echo $_SESSION['login']; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <?php if ($_SESSION['admin']): ?>
                                    <li><a class="dropdown-item" href="login.php">Админ панель</a></li>
                                <?php endif; ?>
                                <li><a class="dropdown-item" href="logout.php">Выход</a></li>
                            </ul>
                        <?php else: ?>
                            <a class="nav-link dropdown-toggle" href="login.php"
                               role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user me-1"></i>Войти
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="reg.php">Регистрация</a></li>
                            </ul>
                        <?php endif; ?>


                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>