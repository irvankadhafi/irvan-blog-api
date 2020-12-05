const getToken = function () {
    return window.localStorage.getItem("_tin");
}

const removeToken = function () {
    window.localStorage.clear();
}

const validateModel = function (data) {
    return data != null || data != undefined;
}

const getParamsId = function () {
    const href = window.location.hash;
    const params = href.split('/');
    return params.pop();
}

export {
    getToken,
    removeToken,
    getParamsId,
    validateModel
}