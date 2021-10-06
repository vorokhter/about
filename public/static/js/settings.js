$(document).ready(function () {
    let avatarImage;
    const imageTypes = ["image/jpeg", "image/png", "image/x-png", "image/gif"];

    const settingsForm = $("#settings-form");
    const settingsName = $("#settings-name");
    const settingsEmail = $("#settings-email");
    const settingsPass = $("#settings-password");
    const settingsPassConf = $("#settings-password-confirm");
    const settingsAvatar = $("#settings-avatar");

    settingsAvatar.on("change", function (event) {
        $(".settings-error").text("");

        const image = $(this).get(0).files[0];

        if (!imageTypes.includes(image.type)) {
            $(".settings-error").text(
                "Неверный тип файла, необходимо выбрать изображение"
            );
            return;
        }

        const reader = new FileReader();

        reader.onloadend = function () {
            avatarImage = reader.result;
            $("#avatar-preview").attr("src", reader.result);
        };
        reader.readAsDataURL(image);
    });

    settingsForm.on("submit", function (event) {
        event.preventDefault();
        editUser();
        if (avatarImage) editAvatar();
    });

    function editUser() {
        api.post({
            url: "/user/edit-user",
            body: JSON.stringify({
                name: settingsName.val().trim(),
                email: settingsEmail.val().trim(),
                password: settingsPass.val().trim(),
                passwordConfirm: settingsPassConf.val().trim(),
            }),
        })
            .then((result) => {
                location.reload();
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
                location.reload();
            })
            .catch((error) => {
                $(".settings-error").text(error.responseJSON);
            });
    }
});
