
function ValidateContactForm(){
    if (ValidateContactName() & ValidateContactEmail() & ValidateContactComment()){
        var ajaxConfig = {
            method: "POST",
            url: "api/contact-us.php",
            data: $("#frmContact").serialize(),
            async: true
        }

        $.ajax(ajaxConfig).done(function (response) {
            if (response == true){
                $("#contactName").val("");
                $("#contactEmail").val("");
                $("#contactComment").val("");
                $("#contact_success").text("Successfully placed your Inquiry");
                setTimeout(function () {
                    $("#contact_success").fadeOut("slow");
                }, 1000);
            }
        });
    }
}

function ValidateContactName(){
    var format = /^[A-Za-z]+$/;
    if (!($("#contactName").val().match(format))) {
        $("#contactName").css("borderColor", "red");
        $("#contact_name").text("Please enter a valid name");
        return false;
    }
    else {
        $("#contactName").css("borderColor", "rgb(206, 212, 218)");
        $("#contact_name").text("");
        return true;
    }
}

function ValidateContactEmail(){
    var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!($("#contactEmail").val().match(format))) {
        $("#contactEmail").css("borderColor", "red");
        $("#contact_email").text("Please enter a valid email");
        return false;
    }
    else {
        $("#contactEmail").css("borderColor", "rgb(206, 212, 218)");
        $("#contact_email").text("");
        return true;
    }
}

function ValidateContactComment(){
    if (!($("#contactComment").val().length > 0)) {
        $("#contactComment").css("borderColor", "red");
        $("#contact_comment").text("Please enter your comment");
        return false;
    }
    else
    {
        $("#contactComment").css("borderColor", "rgb(206, 212, 218)");
        $("#contact_comment").text("");
        return true;
    }
}
