$(document).ready(function() {
    $("#closed").hide();
    get_cart_details();
    $('body').on("click", ".nav li", function() {
        $(".nav li").removeClass("active");
        $(this).addClass("active");
    });
    $("#active-trigger").on("click", function() {
        $("#closed").hide();
        $("#active").show();
    });
    $("#closed-trigger").on("click", function() {
        $("#active").hide();
        $("#closed").show();
    });
    $("body").on("click", ".send", function() {
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "../controller/coupon_status.php",
            data: { coupon_id: id },
            success: function(data) {
                console.log(data);
                if (data == '#500success') {
                    // if (data == 'success') {
                    $('#response').html("<div class = 'alert alert-success' role='alert'><strong>Coupon Send Successfully</strong></div>");
                    get_cart_details();
                    window.location.href = "../cart/";
                } else {
                    $('#response').html("<div class = 'alert alert-danger' role='alert'><strong>Coupon Not Sent! Try Again Later </strong></div>");
                }
            }
        });
    });

      $("body").on("click", ".close_coupon", function() {
        coupon_id = $(this).attr('coupon_id');
        $.ajax({
            type: "POST",
            url: "../controller/closed_coupon_status.php",
            data: { coupon_id: coupon_id },
            success: function(data) {
                console.log(data);
                if(data =='status'){
                    window.location.href = "../cart/";
                }else{
                    window.location.href = "../cart/";
                }
            }
        });
    });


    $("body").on("click", ".modify", function() {
        $('#range').html('<option value="">...</option>');
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "../controller/get_coupon_details.php",
            data: { coupon_id: id },
            success: function(data) {
                var data = JSON.parse(data);
                if (data['status'] == 'success') {
                    $('#shop_name').val(data['data']['shop_id']);
                    get_range_details(data['data']['shop_id']);
                    $('#hidden-value').val(data['data']['id']);
                }
            }
        });
    });
    $('body').on('click', '#logout-client', function() {
        logout();
        get_all_details(shop_id);
    });

    $('body').on('change', '#shop_name', function() {
        $('#response').html("");
        $('#range').html('<option value="">...</option>');
        shop_id_value = $(this).val();
        get_range_details(shop_id_value);
        get_value();
    });
    $('body').on('change', '#range', function() {
        get_value();
    });

    $('body').on('submit', '#form-update', function(e) {
        e.preventDefault();
        $.ajax({
            url: "../controller/modify_coupon_controller.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                var data = JSON.parse(data);
                if (data['status'] == 'error') {
                    $('#response').html("<div class = 'alert alert-danger' role='alert'><strong>Something Went To Wrong</strong></div>");
                } else if(data['status'] == 'low_balance') {
                    $('#model-response').html("<div class = 'alert alert-danger' role='alert'><strong>Low Balance In Your account</strong></div>");
                    setTimeout(function() {
                    $('#model-response').fadeOut('fast');
                    }, 2000);
                }
                else {
                    window.location.href = "../cart/";
                }
            }
        });
    });
    $("body").on('click',".report",function(){
        coupon_value = $(this).attr('value');
        report_id    = $(this).attr('id');
        own_attr      = $(this).attr('own-attr');
        console.log(report_id);
        $("#report-submit").click(function(e){
            e.preventDefault();
            var remark = $("#remark-text").val();
            console.log(report_id);
            $.ajax({
                type :"POST",
                url :"../controller/add_report_controller.php",
                data:{coupon_value :coupon_value,remark:remark,coupon_details_id:report_id,shop_id :own_attr},
                success:function(data){
                  // console.log(data);
                  if(data =='success'){
                    $("#report-model").hide();
                          setInterval('location.reload();', 1000);
                  }else{
                    $("#report-model").hide();
                         setInterval('location.reload();', 1000);
                  }
                }
            });


        });
        
    });
});

function get_range_details(shop_id_value) {
    $.ajax({
        type: "POST",
        url: "../controller/get_price_range.php",
        data: { shop_id: shop_id_value },
        success: function(data) {
            // console.log(data);
            var data = JSON.parse(data);
            if (data['status'] == 'success') {
                $('#range').append(data['value']);
            } else if (data['status'] == 'error') {
                $('#response').html("<div class = 'alert alert-danger' role='alert'><strong>Selected Shop Does not have Coupon!</strong></div>");
            }
        }
    });
}

function get_cart_details() {
    $.ajax({
        type: "POST",
        url: "../controller/cart_controller.php",
        data: { data: 'test' },
        success: function(data) {
            // console.log(data);
            var data = JSON.parse(data);
            if (data['status'] == 'success') {
                $('#header-middle').html(data['session_data']);
                $('#footer_content').html(data['session_data_footer']);
                $('#active').html(data['active_div']);
                $('#shop_name').append(data['shop_name']);
                $('#closed').html(data['closed_div']);
            }
        }
    });
}

function get_value() {
    shop_id = $('#shop_name').val();
    price_range = $('#range').val();
    if (!(shop_id == "") && !(price_range == "")) {
        $.ajax({
            type: "POST",
            url: "../controller/get_wallet_details.php",
            data: { shop_id: shop_id, price_range: price_range },
            success: function(data) {
                var data = JSON.parse(data);
                if (data['status'] == 'success') {
                    $('#applicable_price').prop("value", data['data']['applicable_price']);
                    $('#coupon_price').prop("value", data['data']['coupon_price']);
                } else if (data['status'] == 'error') {
                    $('#response').html("<div class = 'alert alert-danger' role='alert'><strong>Selected Shop Does not have Coupon!</strong></div>");
                }
            }
        });
    }
}