
function ValidateSigninForm(){
    if (ValidateSigninEmail() & ValidateSigninPassword()){
        var ajaxConfig = {
            method: "POST",
            url: "api/customer.php",
            data: $("#frmSignin").serialize(),
            async: true
        }

        $.ajax(ajaxConfig).done(function (response) {
            if (response == true){
                window.history.go(-1);
            }
        });
    }
}

function ValidateSigninEmail(){
    if ($("#signinEmail").val().length ==0){
        $("#signinEmail").css("borderColor", "red");
        $("#signin_email").text = "Please enter a valid sign in email or username";
        return false;
    }
    else {
        $("#signinEmail").css("borderColor", "rgb(206, 212, 218)");
        $("#signin_email").text = "";
        return true;
    }
}

function ValidateSigninPassword(){
    if ($("#signinPassword").val().length ==0){
        $("#signinPassword").css("borderColor", "red");
        $("#signin_password").text = "Please enter your password";
        return false;
    }
    else {
        $("#signinPassword").css("borderColor", "rgb(206, 212, 218)");
        $("#signin_password").text = "";
        return true;
    }


}