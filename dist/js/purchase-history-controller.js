$(document).ready(function () {
    var ajaxConfig = {
        method: "GET",
        url: "api/sale.php",
        data:{
            action: "getPurchaseHistory"
        },
        async: true
    }

    $.ajax(ajaxConfig).done(function (response) {
        console.log(response);
        if (response.length == 0){
            $("#tblPurchase tbody tr").remove();
            $("#purchaseFoot").css("display", "table-cell");
        }
        else{
            $("#purchaseFoot").css("display", "none");
            $("#tblPurchase tbody tr").remove();

            response.forEach(function (dvd) {
                $("#tblPurchase tbody").append("<tr>" +
                    "<td><img src='images/posters/" + dvd.poster + "' class='cart_poster'></td>" +
                    "<td>"+ dvd.name +"</td>" +
                    "<td>"+ dvd.quantity +"</td>" +
                    "<td>"+ dvd.total +"</td>" +
                    "<td>"+ dvd.date +" "+ dvd.time +"</td>" +
                    "</tr>")
            });
        }
    })
});