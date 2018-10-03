$(document).ready(function () {
    getCartItems();
});

$(document).on("click", "#btnQuantitySubmit", function () {
    var quantity = $(this).parents("#frmQuantity").find("#quantity").val();
    var dvdId = $(this).parents("#frmQuantity").find("#dvdId").val();


    var ajaxConfig = {
        method: "POST",
        url: "api/cart.php",
        data:{
            dvdId:dvdId,
            quantity: quantity,
            action:"changeQuantity"
        },
        async:false
    }

    $.ajax(ajaxConfig).done(function (response) {
        if (response == true){
            getCartItems();
        }
    })
});

$(document).on("click", ".fa-times-circle", function () {
    var dvdId = $(this).parents("tr").find("#dvdId").val();

    var ajaxConfig = {
        method: "DELETE",
        url: "api/cart.php?dvdId=" + dvdId,
        async:false
    }

    $.ajax(ajaxConfig).done(function (response) {
        if (response == true){
            getCartItems();
        }
    })
});



function getCartItems() {
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
        if (noOfItems == 0) {
            $("#navbar_menu .badge").text(noOfItems);
            $("#tblCart tbody tr").remove();
            $("#cartFoot").css("display", "table-cell");
        }else{
            $("#navbar_menu .badge").text(noOfItems);

            $("#cartFoot").css("display", "none");
            $("#tblCart tbody tr").remove();

            var netTotal = 0;

            response.forEach(function (dvd) {
                if (dvd.discount == 0) {
                    var discountedPrice = dvd.price;
                } else {
                    var discountedPrice = dvd.price * (100 - dvd.discount) / 100;
                }

                var total = discountedPrice * Number(dvd.quantity) + Number(dvd.shipping);

                $("#tblCart tbody").append("<tr><td><img src='images/posters/" + dvd.poster + "' class='cart_poster'></td>" +
                    "<td>"+dvd.name+"</td><td class='cart_quantity'>" +
                    "<div id='frmQuantity'>" +
                    "<div class='form-group'>" +
                    "<input type='hidden' id='dvdId' name='dvdId' value='"+dvd.dvdId+"'>" +
                    "<input class='form-control' type='numeric' id='quantity' name='quantity' value='"+dvd.quantity+"'>" +
                    "</div>" +
                    "<div>" +
                    "<button class='btn btn-primary form-group text-center' id='btnQuantitySubmit' name='btnQuantitySubmit'>" +
                    "Done</button>" +
                    "</div>" +
                    "</div>" +
                    "</td><td><span class='cart_discounted_price'>LKR " + discountedPrice + "</span><br/>" +
                    "<span class='cart_discount'>Discount: " + dvd.discount + "%</span><br/>" +
                    "<span class='cart_price'>LKR " + dvd.price + "</span>" +
                    "</td>" +
                    "<td>" + dvd.shipping + "</td>" +
                    "<td>LKR " + total + "</td>" +
                    "<td><i class='fas fa-times-circle'></i>" +
                    "</td>" +
                    "</tr>");

                netTotal = netTotal + total;


            });

            for(var a=0; a<$("#tblCart tbody tr td .cart_discount").length; a++) {
                if($($("#tblCart tbody tr td .cart_discount")[a]).text() == "Discount: 0%"){
                    $($("#tblCart tbody tr td .cart_discount")[a]).css("display", "none");
                    $($("#tblCart tbody tr td .cart_discount")[a]).parent().children(".cart_price").css("display", "none");
                }
            }

            $("#tblCart tbody").append("<tr>" +
                "<td></td>" +
                "<td></td>" +
                "<td></td>" +
                "<td colspan='4'><p class='cart_net_price'>Total: "+netTotal +
                "<a href='checkout.html'><button class='btn btn-danger text-center pay_button' name='btnCheckout'>Proceed to Checkout >>></button></a></td>" +
                "</tr></table>");

        }
    });

}