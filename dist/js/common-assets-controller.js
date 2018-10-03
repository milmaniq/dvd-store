$(document).ready(function () {
    $("#navbar").load("assets/navbar.html");

    $("#footer").load("assets/footer.html");

    var ajaxConfig = {
        method: "GET",
        url: "api/customer.php",
        data: {
            action: "checkSession"
        },
        async: true
    }

    $.ajax(ajaxConfig).done(function (response) {
        if (response == false) {

            var ajaxConfig = {
                method: "GET",
                url: "api/cart.php",
                data: {
                    action: "getItems"
                },
                async: true
            }

            $.ajax(ajaxConfig).done(function (response) {
                var noOfItems = response.length;
                $("#navbar_menu").html("<li><a href='cart.html'><span class='badge pull-left'>"+noOfItems+"</span>&nbsp;" +
                    "<i class='fas fa-shopping-cart'></i> Cart</a></li>" +
                    "<li><a href='signin.html'><i class='fas fa-sign-in-alt'></i> Sign in</a></li>" +
                    "<li><a href='register.html'><i class='fas fa-user'></i> Register</a></li>");
            });


        }
        if (response == true) {
            var ajaxConfig = {
                method: "GET",
                url: "api/cart.php",
                data: {
                    action: "getItems"
                },
                async: true
            }


            $.ajax(ajaxConfig).done(function (response) {
                var noOfItems = response.length;

                var ajaxConfig = {
                    method: "GET",
                    url: "api/customer.php",
                    data: {
                        action: "getCustomer"
                    },
                    async: true
                }

                $.ajax(ajaxConfig).done(function (response) {
                    var profilePic = response[0].picture;
                    var email = response[0].email;

                    $("#navbar_menu").html("<li><a href='cart.html'><span class='badge pull-left'>" + noOfItems
                        + "</span>&nbsp;<i class='fas fa-shopping-cart'></i> Cart</a></li>" +
                        "<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>" +
                        "<img class='profile_pic_circle'  src='images/profile-pic/" + profilePic + "' />&nbsp; Hi " + email
                        + "<strong class='caret'></strong></a>" +
                        "<ul class='dropdown-menu'>" +
                        "<li><a href='purchase-history.html'>Purchase History</a></li>" +
                        "<li><a href='profile.html'>Profile</a></li>" +
                        "<li id='signout'><a>Sign out</a></li></ul>");
                });
            });
        }
    });
});


$(document).ready(function () {
    var ajaxConfig = {
        method: "GET",
        url: "api/dvd.php",
        data: {
            action: "getDvdCategory"
        },
        async: true
    }

    $.ajax(ajaxConfig).done(function (response) {
        $("#navbar_category").children().remove();
        response.forEach(function (dvd) {
            $("#navbar_category").append("<li id='" + dvd.category + "'><a class='btn btn-default' href='category.html?category=" + dvd.category
                + "' type='button'><strong>" + dvd.category + "</strong></a>")
        });

        var category = $("title").text();
        var selector = "#navbar_category #" + category;
        $(selector).addClass("active");
    });

});

$(document).on("click", "#signout", function () {
    var ajaxConfig = {
        method: "GET",
        url: "api/customer.php",
        data: {
            action: "signout"
        },
        async: true
    }

    $.ajax(ajaxConfig).done(function (response) {
       window.location.replace("index.html");
    });
});


