$(document).ready(function () {
    const inputSearch = $("#input-search");
    const searchList = $("#search-list");

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

            $(".open-thread").on("click", function (event) {
                api.post({
                    url: "/thread/personal",
                    body: JSON.stringify({
                        userId: $(this).attr("data-user-id"),
                    }),
                }).then((result) => (window.location.href = "/"));
            });
        });
    });
});
