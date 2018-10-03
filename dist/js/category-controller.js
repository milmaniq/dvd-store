
$(document).ready(function () {
    // var url = window.location.search;
    var url = window.location.href;
    var category = url.split(/=/)[1];

    var ajaxConfig = {
        method: "GET",
        url: "api/dvd.php",
        data:{
            action: "getDvdByCategory",
            category : category
        },
        async:true
    }

    $.ajax(ajaxConfig).done(function (response) {
        response.forEach(function (dvd) {
            if (dvd.discount == 0){
                var discountedPrice = "<div class='dvd_discounted_price'>LKR "+dvd.price+"</div>";
            }else{
                var discount = dvd.price*(100-dvd.discount)/100;
                var discountedPrice = "<div class='dvd_price'>LKR "+dvd.price
                    +"</div><div class='dvd_discounted_price'>Now LKR "+
                    discount+"</div>";
            }

            $("#section_category").append("<div class='dvd_item'><a href='dvd-item.html?dvd_id="+dvd.dvdId
                +"'><img src='images/posters/"+dvd.poster
                +"' class='dvd_poster'/></a><a href='dvd.php?dvd_id="+dvd.dvdId+"' class='dvd_name'>"+dvd.name
                +"</a>"+discountedPrice+"</div>");
        });
    });

    $("title").text(category);
    $(".page-header h3").text(category);
    $("li[class='active']").text(category);
});
