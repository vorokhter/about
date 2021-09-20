function debounce(f, ms) {
    let timeoutId;

    const startTimeout = (args) => {
        timeoutId = setTimeout(() => {
            f(...args);
            clearTimeout(timeoutId);
        }, ms);
    };

    return function () {
        if (timeoutId) {
            clearTimeout(timeoutId);
            startTimeout(arguments);
            return;
        }

        startTimeout(arguments);
    };
}

function throttle(func, ms) {
    let isThrottled = false,
        savedArgs,
        savedThis;

    function wrapper() {
        if (isThrottled) {
            savedArgs = arguments;
            savedThis = this;
            return;
        }

        func.apply(this, arguments);

        isThrottled = true;

        setTimeout(function () {
            isThrottled = false;
            if (savedArgs) {
                wrapper.apply(savedThis, savedArgs);
                savedArgs = savedThis = null;
            }
        }, ms);
    }

    return wrapper;
}
