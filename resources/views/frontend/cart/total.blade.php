<div class="card  new-card p-0">
    <div class="card-header form-card-header">
        <h2 class="card-header-title text-center">ملخص الطلب</h2>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <p>الإجمالي <span id="subtotal" class="float-right">${{  $cart->total() }}</span></p>
                <p>الرسوم <span class="tip text-primary"><i class="fas fa-info-circle"></i>

                    <span class="tiptext">هذه الرسوم تساعدنا على إدارة المنصة وتطويرها وعلى توفير خدمة دعم فني 24/7</span></span> <span id="tax" class="float-right">
                    ${{  $cart->total()/5 }}
                </span>
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <p class="service-order-text">
                    <strong>المبلغ النهائي </strong> <span id="total" class="float-right">${{ $cart->total() + ($cart->total()/5) }}</span>
                </p>

            </div>
        </div>
        <div class="text-center">


            <button class="btn btn-primary btn-block btn-custom2 my-2" data-toggle="modal" data-target="#addModal">ادفع الآن</button>


        </div>
    </div>
</div>
