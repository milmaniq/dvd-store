function ValidateRegisterForm() {
    if (ValidateRegisterFirstName() & ValidateRegisterLastName() & ValidateRegisterEmail() & ValidateRegisterPassword() &
        ValidateRegisterConfirmPassword() & ValidateRegisterGender() & ValidateRegisterStreetAddress() & ValidateRegisterCity() &
        ValidateRegisterCountry() & ValidateRegisterState() & ValidateRegisterMobile() & ValidateRegisterAgreement()) {

        var ajaxConfig = {
            method: "POST",
            url: "api/customer.php",
            data: $("#frmRegister").serialize(),
            async:true
        }


        $.ajax(ajaxConfig).done(function (response) {
            if (response == true){
                window.location.replace("index.html");
            }
        });
    }
}


function ValidateRegisterFirstName() {
    var format = /^[A-Za-z]+$/;
    if (!($("#registerFirstName").val().match(format))) {
        $("#registerFirstName").css("borderColor", "red");
        $("#register_first_name").text("Please enter a valid first name");
        return false;
    }
    else {
        $("#registerFirstName").css("borderColor", "rgb(206, 212, 218)");
        $("#register_first_name").text("");
        return true;
    }

}

function ValidateRegisterLastName() {
    var format = /^[A-Za-z]+$/;
    if (!($("#registerLastName").val().match(format))) {
        $("#registerLastName").css("borderColor", "red");
        $("#register_last_name").text("Please enter a valid last name");
        return false;
    }
    else {
        $("#registerLastName").css("borderColor", "rgb(206, 212, 218)");
        $("#register_last_name").text("");
        return true;
    }
}

function ValidateRegisterEmail() {
    var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!($("#registerEmail").val().match(format))) {
        $("#registerEmail").css("borderColor", "red");
        $("#register_email").text("Please enter a valid email");
        return false;
    }
    else {
        $("#registerEmail").css("borderColor", "rgb(206, 212, 218)");
        $("#register_email").text("");
        return true;
    }
}


var pass_equal;
var confirm_pass_equal;

function ValidateRegisterPassword() {
    pass_equal = $("#registerPassword").val();
    var pass_len = pass_equal.length;
    if (pass_len < 8) {
        $("#registerPassword").css("borderColor", "red");
        $("#register_password").text("Password must be atleast 8 characters");
        return false;
    }
    else {
        $("#registerPassword").css("borderColor", "rgb(206, 212, 218)");
        $("#register_password").text("");
        return true;
    }
}

function ValidateRegisterConfirmPassword() {
    confirm_pass_equal = $("#registerConfirmPassword").val();
    if ((pass_equal != confirm_pass_equal) || (confirm_pass_equal.length < 1)) {
        $("#registerConfirmPassword").css("borderColor", "red");
        $("#register_confirm_password").text("Password does not match");
        return false;
    }
    else {
        $("#registerConfirmPassword").css("borderColor", "rgb(206, 212, 218)");
        $("#register_confirm_password").text("");
        return true;
    }
}


function ValidateRegisterGender() {
    if ((!$('#registerMale')[0].checked) & (!$('#registerFemale')[0].checked)) {
        $("#register_gender").text("Please select your gender");
        return false;
    }
    else {
        $("#register_gender").text("");
        return true;
    }
}

function ValidateRegisterStreetAddress() {
    var format = /^[\w #,-]+$/;
    if (!($("#registerStreetAddress").val().match(format))) {
        $("#registerStreetAddress").css("borderColor", "red");
        $("#register_street_address").text("Please enter a valid street address");
        return false;
    }
    else {
        $("#registerStreetAddress").css("borderColor", "rgb(206, 212, 218)");
        $("#register_street_address").text("");
        return true;
    }
}

function ValidateRegisterCity() {
    if (!($("#registerCity").val().length > 0)) {
        $("#registerCity").css("borderColor", "red");
        $("#register_city").text("Please enter a valid city name");
        return false;
    }
    else {
        $("#registerCity").css("borderColor", "rgb(206, 212, 218)");
        $("#register_city").text("");
        return true;
    }
}

function ValidateRegisterCountry() {
    if ($("#registerCountry").val() == "") {
        $("#registerCountry").css("borderColor", "red");
        $("#register_country").text("Please select a country name");
        return false;
    }
    else {
        $("#registerCountry").css("borderColor", "rgb(206, 212, 218)");
        $("#register_country").text("");
        return true;
    }
}

function ValidateRegisterState() {
    if ($("#registerState").val() == "") {
        $("#registerState").css("borderColor", "red");
        $("#register_state").text("Please select a state/province");
        return false;
    }
    else {
        $("#registerState").css("borderColor", "rgb(206, 212, 218)");
        $("#register_state").text("");
        return true;
    }
}

function ValidateRegisterMobile() {
    var format = /^[\d]{5,20}$/;
    if (!$("#registerMobile").val().match(format)) {
        $("#registerMobile").css("borderColor", "red");
        $("#register_mobile").text("Please enter a valid mobile number");
        return false;
    }
    else {
        $("#registerMobile").css("borderColor", "rgb(206, 212, 218)");
        $("#register_mobile").text("");
        return true;
    }
}


function ValidateRegisterAgreement() {
    if ($('#registerAgreement')[0].checked) {
        $("#register_agreement").text("");
        return true;
    }
    else {
        $("#register_agreement").text("You must agree to register");
        return false;
    }
}