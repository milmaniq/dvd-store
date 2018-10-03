function loadProfileInfo(){
    var ajaxConfig = {
        method: "GET",
        url: "api/customer.php",
        data: {
            action:"getCustomer"
        },
        async: true
    }

    $.ajax(ajaxConfig).done(function (response) {
        if (response.length > 0) {
            $("#profileFirstName").val(response[0].firstName);
            $("#profileLastName").val(response[0].lastName);
            $("#profilePicView").attr("src", "images/profile-pic/" + response[0].picture);
        }
    });
}

$(document).ready(function () {
    loadProfileInfo();
});


function ValidateProfileNameForm() {

    if (ValidateProfileFirstName() & ValidateProfileLastName()){
        var ajaxConfig = {
            method: "POST",
            url: "api/customer.php",
            data: $("#frmProfileName").serialize(),
            async: true
        }

        $.ajax(ajaxConfig).done(function (response) {
            console.log(response);
            if (response == true){
                $("#frmProfileName_result").text("Name changed Successfully");
                $("#frmProfileName_result").css("display", "block");
                setTimeout(function () {
                    $("#frmProfileName_result").fadeToggle("slow");
                }, 1000);
            }
        });
    }
}


function ValidateProfileFirstName(){
    var format = /^[A-Za-z]+$/;
    if (!($("#profileFirstName").val().match(format))) {
        $("#profileFirstName").css("borderColor", "red");
        $("#profile_first_name").text("Please enter a valid first name");
        return false;
    }
    else {
        $("#profileFirstName").css("borderColor", "rgb(206, 212, 218)");
        $("#profile_first_name").text("");
        return true;
    }
}

function ValidateProfileLastName() {
    var format = /^[A-Za-z]+$/;
    if (!($("#profileLastName").val().match(format))) {
        $("#profileLastName").css("borderColor", "red");
        $("#profile_last_name").text("Please enter a valid first name");
        return false;
    }
    else {
        $("#profileLastName").css("borderColor", "rgb(206, 212, 218)");
        $("#profile_last_name").text("");
        return true;
    }
}

function ValidateProfilePicForm() {
    // console.log($("#profilePic")[0].files[0]);

    var data = new FormData();
    data.append("action","updateProfilePic");
    data.append("profilePic", $("#profilePic")[0].files[0]);
    var ajaxConfig = {
        method: "POST",
        url: "api/customer.php",
        contentType:"multipart/form-data",
        data: data,
        // contentType: false,
        // processData: false,
        cache: false,
        contentType: false,
        processData: false,
        async:true

    }

    console.log(ajaxConfig);

    $.ajax(ajaxConfig).done(function (response) {
        if (response == true){
            loadProfileInfo();
            $("#frmProfilePic_result").text("Profile Picture changed Successfully");
            $("#frmProfilePic_result").css("display", "block");
            setTimeout(function () {
                $("#frmProfilePic_result").fadeOut("slow");
            }, 2000);
        }
        else{
            $("#frmProfilePic_result").text("Sorry, we couldn't change your Profile Picture");
            $("#frmProfilePic_result").css("display", "block");
            setTimeout(function () {
                $("#frmProfilePic_result").fadeOut("slow");
            }, 2000);
        }
    });
}

function ValidateProfilePassword() {
    var ajaxConfig = {
        method: "POST",
        url: "api/customer.php",
        data: {
            action: "verifyPassword",
            profilePassword: $("#profilePassword").val()
        },
        async: true
    }

    $.ajax(ajaxConfig).done(function (response) {
        if (response == false) {
            $("#profilePassword").css("borderColor", "red");
            $("#profile_password").text("Sorry, this is not your current Password");
        }else{
            $("#profilePassword").css("borderColor", "rgb(206, 212, 218)");
            $("#profile_password").text("");
        }
    });
}


var pass_equal;
var confirm_pass_equal;

function ValidateProfileNewPassword() {
    pass_equal = $("#profileNewPassword").val();
    var pass_len = pass_equal.length;
    if (pass_len < 8) {
        $("#profileNewPassword").css("borderColor", "red");
        $("#profile_new_password").text("Password must be atleast 8 characters");
        return false;
    }
    else {
        $("#profileNewPassword").css("borderColor", "rgb(206, 212, 218)");
        $("#profile_new_password").text("");
        return true;
    }
}

function ValidateProfileConfirmPassword() {
    confirm_pass_equal = $("#profileConfirmPassword").val();
    if ((pass_equal != confirm_pass_equal) || (confirm_pass_equal.length < 1)) {
        $("#profileConfirmPassword").css("borderColor", "red");
        $("#profile_confirm_password").text("Password does not match");
        return false;
    }
    else {
        $("#profileConfirmPassword").css("borderColor", "rgb(206, 212, 218)");
        $("#profile_confirm_password").text("");
        return true;
    }
}

function ValidateChangePasswordForm() {
    if (($("#profile_password").text().length == 0) & ($("#profilePassword").val() > 0) & ValidateProfileNewPassword() & ValidateProfileConfirmPassword()){
        var ajaxConfig = {
            method: "POST",
            url: "api/customer.php",
            data: $("#frmProfilePassword").serialize(),
            async: true
        }

        $.ajax(ajaxConfig).done(function (response) {
            console.log(response);
            if (response == true){

                $("#profilePassword").val("");
                $("#profileNewPassword").val("");
                $("#profileConfirmPassword").val("");

                $("#frmProfilePassword_result").text("Password changed Successfully");
                $("#frmProfilePassword_result").css("display", "block");
                setTimeout(function () {
                    $("#frmProfilePassword_result").fadeOut("slow");
                }, 2000);
            } else{
                $("#frmProfilePassword_result").text("Sorry, we couldn't change your Password");
                $("#frmProfilePassword_result").css("display", "block");
                setTimeout(function () {
                    $("#frmProfilePassword_result").fadeOut("slow");
                }, 2000);
            }
        });
    }
}