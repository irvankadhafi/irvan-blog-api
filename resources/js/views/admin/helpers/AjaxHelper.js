const AjaxHelper = function (requestData) {

    let data = [],
        loading = false,
        error = null;
    httpRequest(requestData)
        .then(function (response) {
            const data = response.data.d;
            const {
                Data,
                RecordsFiltered,
                RecordsTotal
            } = data.Values;

            if (data.Success) {
                vm.data = Data;
                vm.size =
                    keyword === "" ? RecordsTotal : RecordsFiltered;
            } else {
                alert.error(data.Message);
            }
        })
        .catch(function (err) {
            alert.error(err);
        })
        .finally(function () {
            vm.isLoading = false;
        });
}

export {
    data,
    loading,
    err
}