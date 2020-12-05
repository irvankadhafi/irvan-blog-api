import moment from 'moment';

const now = function () {
    return moment();
}

const epoch = function (args) {
    return parseInt(args.replace(/[^0-9]/g, ""));
}

const epochToDate = function (date) {
    return moment(epoch(date)).format("DD-MM-YYYY");
}

epochToSqlDate = function (date) {
    return moment(epoch(date)).format("YYYY-MM-DD");
}

export {
    now,
    epoch,
    epochToDate,
    epochToSqlDate,
};