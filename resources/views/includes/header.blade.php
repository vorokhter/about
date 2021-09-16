<div class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <div class="container d-flex fw-bold" style="max-width: 960px;">
        <a class="navbar-brand text-primary" href="{{ url('/') }}">
            Чтобы писать сообщения
        </a>

        <a class="nav-link text-primary home" href="#">Список чатов</a>
        <a class="nav-link text-primary users" href="#">Поиск пользователей</a>
        @include('includes.account-dropdown-menu')

    </div>
</div>