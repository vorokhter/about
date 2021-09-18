<script>
    $(document).ready(function() {
        $(".logout").on("click", function(event) {
            event.preventDefault();

            api.get({
                url: "/auth/logout",
            }).then(result => window.location.href = '/auth')
        });
        $(".users").on("click", function(event) {
            event.preventDefault();

            window.location.href = "/users"
        });
        $(".home").on("click", function(event) {
            event.preventDefault();

            window.location.href = "/"
        });
        $(".settings").on("click", function(event) {
            event.preventDefault();

            window.location.href = "/settings"
        });
    })
</script>

<div class="dropdown d-flex flex-nowrap">
    <a class="nav-link dropdown-toggle text-primary" href="#" role="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        {{ $current_user['name'] }}
        <img id="header-avatar" src="{{ $current_user['avatar'] }}" alt="аватар пользователя" style="width: 32px; height: 32px; border-radius: 50%; margin: 0px 4px;">
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
        <li><a class="dropdown-item settings" href="#">Настройки</a></li>
        <li><a class="dropdown-item logout" href="#">Выход</a></li>
    </ul>
</div>