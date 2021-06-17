$(function () {

    var exp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

    $("#signup").submit(function () {
        $("#numbererror,#nameerror,#emailerror,#passerror").text("");
        var status = true;
        if ($("#number").val() == "") {
            $('#numbererror').text("Number ID is required,");
            status = false;
        }
        if ($("#name").val() == "") {
            $('#nameerror').text("Name is required");
            status = false;
        }
        if ($("#email").val() == "") {
            $('#emailerror').text("Email is required");
            status = false;
        }
        if ($("#pass").val() == "") {
            $('#passerror').text("Password is required,");
            status = false;
        }
        if ($("#cpass").val() == "") {
            $('#cpasserror').text("Confirm Password is required,");
            status = false;
        }

        if ($("#cpass").val() != $("#pass").val()) {
            $('#matcherror').text("Password doesn't match Confirmed Password");
            status = false;
        }

        if (!exp.test($("#pass").val())) {
            $('#passerror').text("Password must between 8 and 15 and contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character,");
            status = false;
        }
        return status;
    });

    $("#credit").submit(function () {
        $("#chnameerror,#cnerror").text("");
        var status = true;
        if ($("#chname").val() == "") {
            $('#chnameerror').text("Card Holder Name is required,");
            status = false;
        }
        if ($("#cn").val() == "") {
            $('#cnerror').text("Card Number is required");
            status = false;
        }
        return status;
    });

});
