$(document).ready(function () {
    getThreadList();

    let timerId;
    let currentThreadId;

    const userBar = $("#user-bar");
    const messageList = $("#message-list");
    const threadList = $("#thread-list");
    const inputMessage = $("#input-message");

    const threadChannel = pusher.subscribe("thread-channel");
    threadChannel.bind("new-message", function (data) {
        if (data.new_message.thread_id == currentThreadId) getMessageList();
    });

    function getUserBar() {
        api.post({
            url: "/thread/user-bar",
            body: JSON.stringify({
                threadId: currentThreadId,
            }),
            dataType: "text",
        }).then((result) => {
            userBar.html(result);
        });
    }

    function getMessageList() {
        api.post({
            url: "/thread/message-list",
            body: JSON.stringify({
                threadId: currentThreadId,
            }),
            dataType: "text",
        }).then((result) => {
            $("#thread").show();
            messageList.html(result);
            messageList.scrollTop(messageList.prop("scrollHeight"));
        });
    }

    function getThreadList() {
        api.get({
            url: "/thread/thread-list",
            dataType: "text",
        }).then((result) => {
            threadList.html(result);

            $(".thread-item").on("click", function (event) {
                currentThreadId = $(this).attr("data-thread-id");

                $("#thread").hide();

                getUserBar();
                getMessageList();
            });
        });
    }

    inputMessage.on("keypress", function (event) {
        if (event.which != 13) return;

        if (inputMessage.val().trim().length <= 0) return;

        api.post({
            url: "/thread/send-message",
            body: JSON.stringify({
                threadId: currentThreadId,
                text: inputMessage.val().trim(),
            }),
        }).then((result) => inputMessage.val(""));
    });
});
