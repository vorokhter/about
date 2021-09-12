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



<div class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm">
    <div class="container d-flex">
        <a class="navbar-brand" href="{{ url('/') }}">
            about...
        </a>
        <ul class="navbar-nav ml-auto ">
            <li class="nav-item">
                <a href="#" class="nav-link" style="color: #212529">{{ $currentUser['name'] }}</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link logout" style="color: #212529">выйти</a>
            </li>
        </ul>
    </div>
</div>