$(document).ready(function () {
    var url = window.location.href;
    var dvdId = url.split(/=/)[1];

    var ajaxConfig = {
        method: "GET",
        url: "api/dvd.php",
        data: {
            action: "getDvd",
            dvdId: dvdId
        },
        async: true
    }

    $.ajax(ajaxConfig).done(function (response) {
        $("#poster").html("<img src='images/posters/" + response[0].poster + "' class='dvd_col_poster'>");
        $("#title").html(response[0].name);
        $("#stock").html("Available: " + response[0].stock);
        $("#discount").html("Discount: " + response[0].discount + "%");
        $("#director").html(response[0].director);
        $("#cast").html(response[0].cast);
        $("#producer").html(response[0].producer);

        if (response[0].discount == 0) {
            var discountedPrice = response[0].price;
        }
        else {
            var discountedPrice = response[0].price * (100 - response[0].discount) / 100;
        }
        $("#price").html(discountedPrice);
        $("#shipping").html(response[0].shipping);


        $("title").html(response[0].name);
        $("#breadcrumb_category").html("<a href='category.html?category=" + response[0].category + "'>" + response[0].category + "</a>");
        $("li[class='active']").html(response[0].name);
    });
});

$(document).on("click", "#btnAddToCart", function () {
    if ($("#quantity").val().length == 0) {
        $("#error").text("Please enter the quantity");
        return;
    }else {
        $("#error").text("");
        var url = window.location.href;
        var dvdId = url.split(/=/)[1];

        var ajaxConfig = {
            method: "POST",
            url: "api/cart.php",
            data: {
                action: "addToCart",
                dvdId: dvdId,
                quantity: $("#quantity").val()
            },
            async: true
        }

        $.ajax(ajaxConfig).done(function (response) {
            if (response == false) {
                $("#error").text("Failed to add to your Cart");
            }
            else {
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

                    $("#quantity").val("");
                    $("#navbar_menu .badge").text(noOfItems);

                    $("#error").text("Successfully added to your Cart");
                    setTimeout(function () {
                        $("#error").fadeOut("slow");
                    }, 2000);
                });
            }
        });

    }
});