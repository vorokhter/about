$(document).ready(function () {
    const inputSearch = $("#input-search");
    const searchList = $("#search-list");

    getAllUsers();

    const getMessageList = debounce(() => {
        if (inputSearch.val().trim().length < 2) {
            getAllUsers();
        } else {
            searchUsers();
        }
    }, 300);

    const setOpenThreadClick = () => {
        $(".open-thread").on("click", function (event) {
            api.post({
                url: "/thread/personal",
                body: JSON.stringify({
                    userId: $(this).attr("data-user-id"),
                }),
            }).then((result) => (window.location.href = "/"));
        });
    };

    function getAllUsers() {
        api.get({
            url: "/user/get-users",
            dataType: "text",
        }).then((result) => {
            searchList.html(result);
            setOpenThreadClick();
        });
    }

    function searchUsers() {
        api.post({
            url: "/user/search-user",
            body: JSON.stringify({
                text: inputSearch.val().trim(),
            }),
            dataType: "text",
        }).then((result) => {
            searchList.html(result);
            setOpenThreadClick();
        });
    }

    inputSearch.on("keyup", getMessageList);
});
