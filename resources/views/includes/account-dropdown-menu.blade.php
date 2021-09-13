<script>
    $(document).ready(function() {
        $(".logout").on("click", function(event) {
            event.preventDefault();

            api.get({
                url: "/auth/logout",
            }).then(result => window.location.href = '/auth')
        });
    })
</script>

<div class="dropdown">
    <a class="nav-link dropdown-toggle p-0 text-primary" style="font-size: 14px;" href="#" role="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        {{ $currentUser['name'] }}
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
        <li><a class="dropdown-item" href="#">Настройки</a></li>
        <li><a class="dropdown-item logout" href="#">Выход</a></li>
    </ul>
</div>