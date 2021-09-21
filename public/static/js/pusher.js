$(document).ready(function () {
    Pusher.logToConsole = true;

    window.pusher = new Pusher("c3383bdc260bce376501", {
        cluster: "eu",
    });
});
