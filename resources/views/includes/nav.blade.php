<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('main') }}">CRUD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-gray-300" aria-current="page" href="{{ route('main') }}">Главная</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-gray-300" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Студенты
                    </a>
                </li>
                    <ul class="dropdown-menu text-">
                        <li><a class="dropdown-item" href="{{ route('user.index') }}">Список</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.create') }}">Создать</a></li>
                    </ul>
            </ul>
        </div>
    </div>
</nav>