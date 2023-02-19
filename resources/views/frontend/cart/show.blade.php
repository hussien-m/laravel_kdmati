@extends('layouts.frontend.front-app')

@section('styles') @endsection

@section('content')


    <script src="https://www.paypal.com/sdk/js?client-id=AY6cSuXY9cH2Qw-zRrjx2kc9xL3ZeNxCKvEWk1GJ_eON6LivIwMJGqmkUTGI3ILcyO0K_2CxkKyDp4Jz&amp;currency=USD" data-sdk-integration-source="button-factory" data-uid-auto="uid_mvhxthxhxeamwlrsaugkgjxdfrjjzs"></script>


    <section id="page" class="page content-h" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title2 mt-0">سلة المشتريات</h1>
                </div>
            </div>
        </div>
    </section>


    <section id="subject-body content-h" class="cart-body page bg-white py-5">
        <div class="content-h">
        <!-- Modal -->
            <div class="modal fade modal-custom" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
                <x-frontend.show-payment-methods />
            </div>
        </div>

        @if(count($cart->get()) !=0)
        <div class="container">
            <div class="row">


                <div class="col-md-12 col-lg-12  ">
                    <div class="card new-card subject-addon-services-card cart-card" id="service_upgrades_table">

                        <div class="card-header form-card-header cart-header">
                            <div class="row">
                                <div class="col-md-7">
                                    <h2 class="card-header-title">الخدمة</h2>
                                </div>
                                <div class="col-md-2">
                                    <h2 class="card-header-title">مرات الطلب</h2>
                                </div>
                                <div class="col-md-2">
                                    <h2 class="card-header-title">الثمن الكلي</h2>
                                </div>
                                <div class="col-md-1">
                                    <h2 class="card-header-title"></h2>
                                </div>

                            </div>
                        </div>
                        <div class="card-body ">


                            @foreach ($cart->get() as $item)

                            <div class="cart-item row" data-id="{{ $item->id }}" id="cart-item{{ $item->id }}">
                                <div class="col-md-7">
                                    <h2 class="cart-item-title"><a href="#">{{ $item->service->title }}</a>
                                    </h2>
                                        @if($item->service->addons->count() > 0)
                                        <ul class="cart-addon-list">
                                            @foreach ($item->service->addons as $key=>$addon )

                                            @php
                                                $checked="";

                                                    if ( json_decode($item->addons)) {
                                                        $addons = json_decode($item->addons);
                                                       // $sm = $sm+count($addons);

                                                        if(in_array($addon->id,$addons)){

                                                            $checked="checked";





                                                        }
                                                    }

                                            @endphp
                                            <li class="cart-addon-item">
                                                <div class="form-check">
                                                    <label for="checkbox">
                                                        <input data-id="{{ $item->id }}" data-price="{{ $addon->price }}" type="checkbox" class="service_upgrade_check service_addon s-{{ $item->id }}" {{ $checked }} name="addons[]"  data-addon_id="{{ $addon->id  }}">
                                                        مقابل {{ $addon->price }}$ {{ $addon->title }}
                                                    </label>
                                                </div>
                                            </li>
                                            @endforeach

                                        </ul>
                                        @endif

                                </div>
                                <div class="col-md-1 static px-0">
                                        <select  id="service_quantity" name="quantity" class="form-control quantity" data-id="{{ $item->id }}" value="{{ $item->quantity }}" min="1" max="5" required>
                                            @for ($i=1; $i<=10 ;$i++ )
                                                <option value="{{ $i }}" {{ $item->quantity == $i ? 'selected':'' }} >{{ $i }}</option>
                                            @endfor
                                        </select>
                                </div>
                                <div class="col-md-3 static">
                                    @php
                                        $ads=0;
                                        if(json_decode($item->addons)){
                                           $ads= ($item->addons_price*($item->quantity));
                                         } else {
                                            $ads=0;
                                         }
                                    @endphp
                                    <span class="cart-amount{{ $item->id }} cc" data-id="{{ $item->id }}" >{{  ($item->quantity) * ($item->service->price) + $ads }}</span>
                                </div>
                                <div class="col-md-1 static">
                                        <button type="button" data-id="{{ $item->id }}" class="btn btn-sm btn-outline delete-cart remove"><i class="fal fa-times "></i></button>
                                </div>
                            </div>

                            @endforeach

                        </div>
                    </div>

                </div>
                <div class="col-md-12">

                    <div id="cartRefresh">
                        <livewire:frontend.test-cart-wire/>
                    </div>

                </div>

            </div>

        </div>
        @else
          <div class="text-center">لايوجد شي حتى الان</div>
        @endif


    </section>



@stop

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function displayHello() {
  document.getElementById("cartRefresh").innerHTML += "Hello";
}
    $('.delete-cart').on('click',function(){

      var id= $(this).data('id');

      Swal.fire({
                        type: 'warning',
                        icon: 'warning',
                        text: "هل تريد حقا حذف الخدمة من سلة المشتريات",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'نعم!',
                        cancelButtonText: "اكمل في الموقع"
                    }).then((result) => {
                        if(result['isConfirmed']){

                            $.ajax({
                                    url: "/cart/" + id,
                                    method: "delete",
                                    data:{
                                    _token: '{{ csrf_token() }}',
                                    },beforeSend: function(){
                                        $('#loader').show();

                                        $('#payNow').attr('disabled','disabled');
                                        $('#pay').html('');

                                    },
                                    success: function () {
                                            $('#cart-item'+id).remove();
                                            Livewire.emit('updateCart');
                                            Livewire.emit('mount');

                                        },
                                });

                        }
                    });

    });

    $("select.quantity").on('change',function (){

        var quantity = $(this).val();

        var item_id  = $(this).data('id');

        var addons   =[];


       // var addons_price   =[];

        $(".service_addon-"+"{{ $addon->service_id ?? 'clear' }}").each(function() {

                if ($(this).is(":checked")) {
                   // addons_arr.push($(this).data('price'));
                    addons.push($(this).data('id'));
                }

        });

        $.ajax({
            url: "/cart/" + item_id, //data-id
            method: 'put',
            dataType:'JSON',
            data: {
                quantity: quantity ,
                _token: "{{ csrf_token() }}"
            },beforeSend: function(){
                $('#loader').show();

                $('#payNow').attr('disabled','disabled');
                $('#pay').html('');

            }
            ,success: function(data){
                var price       = data.cart[0].service.price;
                var addon_price = data.cart[0].addons_price;
                var quan_up     = data.cart[0].quantity;
                var cart_id     = data.cart[0].id;
                var total       = (price*quan_up)+(addon_price*quan_up);

                //$('#cartRefresh').html(data.html);
                $('.cart-amount'+cart_id).html(total);
                Livewire.emit('updateCart');
                Livewire.emit('mount');




            },done: function(data){



            },

        });

    });

    $("body").on('change', '#service_upgrades_table .service_addon', function() {

        var item_id  = $(this).data("id");
        var addon_id = [];
        var addons_arr = [];
        var addons_price=0;
        $('.s-'+item_id).each(function(){
            if ($(this).is(":checked")) {
                addon_id.push($(this).data('addon_id'));
                addons_arr.push($(this).data('price'));
            }
        })

        for(var i=0 ; i<addons_arr.length ;i++){
            addons_price+=addons_arr[i];
        }

     // alert(addons_price); return  false;

        $.ajax({
            type: "put",
            url: "/cart/addons/add/"+item_id,
            method: 'PUT',
            dataType:'JSON',

            data: {
                 addons: addon_id,
                 addons_price: addons_price,
                _token: "{{ csrf_token() }}",
            },beforeSend: function(){
                $('#loader').show();

                $('#payNow').attr('disabled','disabled');
                $('#pay').html('');

            },success: function(data) {
                Livewire.emit('updateCart');
                Livewire.emit('mount');
            }
        });

});

</script>


@endsection
