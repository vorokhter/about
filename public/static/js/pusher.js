$(document).ready(function () {
    Pusher.logToConsole = false;

    window.pusher = new Pusher("c3383bdc260bce376501", {
        cluster: "eu",
    });
});
