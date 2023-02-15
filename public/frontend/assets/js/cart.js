$("body").on('change', '#cups', function() {
    let cups = $(this).val();
    $("#coffee-total").html((cups * 5) + "$");
});
$("body").on('change', '#service_quantity, input[type=checkbox].service_addon', function() {
    calculate_total();
});

function calculate_total() {
    var price = 5;
    var quanitiy = $("#service_quantity").val();
    var total = price * quanitiy;
    if ($("input[type=checkbox].service_addon:checkbox:checked").length > 0) {
        // any one is checked

        $("#ids").val("");
        var addons_price = 0;
        var sList = "";
        $('input[type=checkbox].service_addon').each(function() {
            if (this.checked) {
                var sThisVal = $(this).val();
                addons_price = addons_price + $(this).data("price");
                sList += (sList == "" ? sThisVal : "," + sThisVal);

            }
        });


        $("#addon_ids").val(sList);

        var total = (addons_price * quanitiy) + (price * quanitiy);

        $("#total_price").html(total);
        $("#amount").val(total);


    } else {

        $("#addon_ids").val("");
        $("#total_price").html(total);
        $("#amount").val(total);

    }
}

$("#add_to_cart").on('click', function() {

    var service_id = $("#service_id").val();;
    var user_id    = $("#user_id").val();
    var quantity   = $("#service_quantity").val();
    //var total_price = $("#total_price").text();
    var service_name = "{{ $service->name }}";
    var addons = [];
    var addons_arr = [];
    var addons_price = 0;
    $('.adns').each(function() {
        if ($(this).is(":checked")) {

            addons.push($(this).val());
            addons_arr.push($(this).data('price'));

        }

    });
    for(var i=0 ; i < addons_arr.length ;i++){
        addons_price+=addons_arr[i];
    }
    $.ajax({
        url: "/cart",
        method: 'POST',
        dataType: 'json',
        data: {
            _token: $('input[name="_token"]').val(),
            service_id: service_id,
            user_id: user_id,
            quantity: quantity,
            addons_price:addons_price,
            addons: addons,
        },
        success: function() {

            Swal.fire({
                type: 'success',
                icon: 'success',
                text: "تم اضافة الخدمة الى سلة المشتريات",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'ادفع الان',
                cancelButtonText: "اكمل في الموقع"
            }).then((result) => {
                if(result['isConfirmed']){

                window.location.href = "/cart";

                } else {
                    console.log('none confirmed');
                }
            });

            Livewire.emit('updateCart');

        },
        error: function() {
            Swal.fire({
                type: 'warning',
                icon: 'warning',
                text: "الخدمة موجدة في سلة المشتريات",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'ادفع الان',
                cancelButtonText: "اكمل في الموقع"
            }).then((result) => {
                if(result['isConfirmed']){
                    window.location.href = "/cart";
                }
            });


        }
    })

});
