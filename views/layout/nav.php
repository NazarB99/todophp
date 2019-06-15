<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Todo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/todo/add">Добавить</a>
            </li>
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
            <?php if (User::isGuest()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/signin">Войти</a>
                </li>
            <?php elseif (User::isAdmin($_SESSION['user'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Выход</a>
                </li>
            <?php endif; ?>

        </ul>
    </div>
</nav>