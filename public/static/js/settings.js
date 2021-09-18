$(document).ready(function () {
    let avatarImage;

    const settingsForm = $("#settings-form");
    const settingsName = $("#settings-name");
    const settingsEmail = $("#settings-email");
    const settingsPass = $("#settings-password");
    const settingsPassConf = $("#settings-password-confirm");
    const settingsAvatar = $("#settings-avatar");

    settingsAvatar.on("change", function (event) {
        let image = $(this).get(0).files[0];
        let reader = new FileReader();

        reader.onloadend = function () {
            avatarImage = reader.result;
            $("#avatar-preview").attr("src", reader.result);
        };
        reader.readAsDataURL(image);
    });

    settingsForm.on("submit", function (event) {
        event.preventDefault();
        // editUser();
        if (avatarImage) editAvatar();
    });

    function editUser() {
        api.post({
            url: "/user/edit-user",
            body: JSON.stringify({
                name: settingsName.val(),
                email: settingsEmail.val(),
                password: settingsPass.val(),
                passwordConfirm: settingsPassConf.val(),
            }),
        })
            .then((result) => {
                console.log(result);
            })
            .catch((error) => {
                $(".settings-error").text(error.responseJSON);
            });
    }

    function editAvatar() {
        api.post({
            url: "/user/edit-avatar",
            body: JSON.stringify({
                avatar: avatarImage,
            }),
        })
            .then((result) => {
                window.location.href = "/settings";
            })
            .catch((error) => {
                $(".settings-error").text(error.responseJSON);
            });
    }
});
