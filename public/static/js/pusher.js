$(document).ready(function () {
    Pusher.logToConsole = true;

    window.pusher = new Pusher("c3383bdc260bce376501", {
        cluster: "eu",
    });

    var channel = pusher.subscribe("thread-channel");
    channel.bind("new-message", function (data) {
        console.log(JSON.stringify(data));
    });
});
