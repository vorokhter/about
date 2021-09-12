// params: {type: string, url: string, body: {}, dataType: string}
function _request(params) {
    return new Promise((resolve, reject) => {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: params.type,
            url: params.url,
            dataType: params.dataType || "json",
            data: params.body,
            processData: false,
            contentType: false,
            success: (data) => resolve(data),
            error: (data) => reject(data),
        });
    });
}

const api = {
    get: (params) => {
        return _request({ type: "GET", ...params });
    },
    post: (params) => {
        return _request({ type: "POST", ...params });
    },
};
