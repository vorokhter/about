$(document).ready(function () {
    const inputSearch = $("#input-search");
    const searchList = $("#search-list");

    const searchUsers = throttle(() => {
        if (inputSearch.val().trim().length < 2) {
            api.post({
                url: "/user/search-user",
                body: JSON.stringify({
                    text: inputSearch.val().trim(),
                }),
                dataType: "text",
            }).then((result) => {
                if (result.length > 0) {
                    searchList.html(result);

                    $(".open-thread").on("click", function (event) {
                        api.post({
                            url: "/thread/personal",
                            body: JSON.stringify({
                                userId: $(this).attr("data-user-id"),
                            }),
                        }).then((result) => (window.location.href = "/"));
                    });
                } else {
                    searchList.empty();
                }
            });
            return;
        }

        api.post({
            url: "/user/search-user",
            body: JSON.stringify({
                text: inputSearch.val().trim(),
            }),
            dataType: "text",
        }).then((result) => {
            if (result.length > 0) {
                searchList.html(result);

                $(".open-thread").on("click", function (event) {
                    api.post({
                        url: "/thread/personal",
                        body: JSON.stringify({
                            userId: $(this).attr("data-user-id"),
                        }),
                    }).then((result) => (window.location.href = "/"));
                });
            } else {
                searchList.empty();
            }
        });
    }, 1000);

    inputSearch.on("keyup", searchUsers);
});
