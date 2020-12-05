import toastr from "toastr";
import $ from 'jquery';

export default class AlertHelper {
    constructor() {
        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: false,
            progressBar: true,
            positionClass: "toast-top-right",
            preventDuplicates: false,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: true
        }
    }

    success(message) {
        toastr["success"](message, "Success");
    }

    error(message) {
        toastr["error"](message, "Error!");
    }

    confirm(onConfirm) {
        toastr["info"](`
            <br />
            <div class='row'>
                <div class='col-md-6'>
                    <button class='btn btn-primary btn-block' value='yes'>Yes</button>
                </div>
                <div class='col-md-6'>
                    <button class='btn btn-danger btn-block' value='no' >No</button>
                </div>
            </div>
           `, 'Are you sure you want to delete this item?', {
            allowHtml: true,
            tapToDismiss: false,
            onclick: function (event) {
                onConfirm(event.target.value);
                $('#toast-container').remove().fadeOut();
            },
            timeOut: 0,
            onCloseClick: true,
            preventDuplicates: true,
            positionClass: "toast-top-center"

        })
    }
}