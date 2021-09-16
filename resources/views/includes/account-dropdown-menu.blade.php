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
    })
</script>

<div class="dropdown">
    <a class="nav-link dropdown-toggle p-0 text-primary fw-bold" style="font-size: 14px;" href="#" role="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        {{ $current_user['name'] }}
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
        <li><a class="dropdown-item logout" href="#">Выход</a></li>
    </ul>
</div>