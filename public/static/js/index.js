$(document).ready(function () {
    getThreadList();

    let currentThreadId;
    let timerId;

    const messageList = $("#message-list");
    const threadList = $("#thread-list");
    const searchList = $("#search-list");

    const inputMessage = $("#input-message");
    const inputSearch = $("#input-search");

    function startMessagesInterval() {
        getMessageList();

        timerId = setInterval(() => {
            getMessageList();
        }, 2000);
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

            $(".thread-title").on("click", function (event) {
                currentThreadId = $(this).attr("data-thread-id");

                $("#thread").hide();

                clearInterval(timerId);
                startMessagesInterval();
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

    inputSearch.on("keypress", function (event) {
        api.post({
            url: "/user/search-user",
            body: JSON.stringify({
                text: inputSearch.val(),
            }),
            dataType: "text",
        }).then((result) => {
            searchList.empty();
            searchList.html(result);

            $(".user-name").on("click", function (event) {
                api.post({
                    url: "/thread/personal",
                    body: JSON.stringify({
                        userId: $(this).attr("data-user-id"),
                    }),
                }).then((result) => {
                    inputSearch.val("");
                    searchList.empty();

                    getThreadList();
                });
            });
        });
    });
});
