$(document).ready(function() {
    var lngVal = /^-?((1?[0-7]?|[0-9]?)[0-9]|180)\.[0-9]{1,6}$/;
    var phoneVal=/^(\()?\d{3}(\))?(-|\s)?\d{3}(-|\s)\d{4}$/;
    $("#latitude").on('focusout', function(event) {
        if (!lngVal.test(this.value)) {
            $("#latituderror").text("latitude is not proper");
        }
        else {
            $("#latituderror").text("");
        }


    });
    $("#longitude").on('focusout', function(event) {
        if (!lngVal.test(this.value)) {
            $("#longituderror").text("longitude is not proper");
        }
        else {
            $("#longituderror").text("");
        }


    });
    
    $("#phone_number").on('focusout', function(event) {
        if (!phoneVal.test(this.value)) {
            $("#phone_numbererror").text("Phone Number is not proper");
        }
        else {
            $("#phone_numbererror").text("");
        }

    });
    $("#fax_number").on('focusout', function(event) {
        if (!phoneVal.test(this.value)) {
            $("#fax_numbererror").text("Fax Number is not proper");
        }
        else {
            $("#fax_numbererror").text("");
        }

    });
});