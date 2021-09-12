// params: {type: string, url: string, body: {}, onSuccess: func, onError: func}
function _request(params) {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: params.type,
        url: params.url,
        dataType: "json",
        data: params.body,
        processData: false,
        contentType: false,
        success: params.onSuccess,
        error: params.onError,
    });
}

const api = {
    get: (params) => {
        _request({ type: "GET", ...params });
    },
    post: (params) => {
        _request({ type: "POST", ...params });
    },
};
