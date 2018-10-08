$(document).ready(function(){

    $('body').on('click','#login',function(){
        url_slug = (window.location.href).split("/");
        page_back = url_slug[4]+'/'+url_slug[5];
        window.location = "../login/##"+page_back;
    });

});

function logout(){
    $.ajax({
        type: "POST",
        url: "../controller/logout.php",
        data:{data:'test'},
        success: function(data) {  
            if (data == "success") {
                window.location = "../home/";
            }
        }
    });
}

if ($.fn.slider) {
    $('#sl2').slider();
}

var RGBChange = function () {
    $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};
