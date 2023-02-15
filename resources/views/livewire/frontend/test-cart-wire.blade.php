@php
$total=0;
    foreach($cart as $item) {

    $total += ($item->addons_price*$item->quantity)+($item->quantity*$item->service->price);

}
$tax=$total/5;

$final_total = $total+$tax;

@endphp

                        @if($final_total >0)
                        <div class="card  new-card p-0">
                            <div class="card-header form-card-header">
                                <h2 class="card-header-title text-center">ملخص الطلب</h2>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>الإجمالي <span id="subtotal" class="float-right">${{  $total }}</span></p>
                                        <p>الرسوم <span class="tip text-primary"><i class="fas fa-info-circle"></i>

                                            <span class="tiptext">هذه الرسوم تساعدنا على إدارة المنصة وتطويرها وعلى توفير خدمة دعم فني 24/7</span></span> <span id="tax" class="float-right">
                                            ${{  $tax ?? 0 }}
                                        </span>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="service-order-text">
                                            <strong>المبلغ النهائي </strong> <span id="total" class="float-right">${{ $final_total ?? 0 }}</span>
                                        </p>

                                    </div>
                                </div>
                                <div class="text-center">


                                    <button id="payNow" class="btn btn-primary btn-block btn-custom2 my-2" data-toggle="modal" data-target="#addModal">
                                        <div id='loader' style='display:none' class="text-center">
                                            <div class="spinner-border text-warning" role="status">
                                                <span class="sr-only">Loading...</span>
                                              </div>
                                        </div>
                                        <span id='pay'>ادفع الان</span>
                                    </button>


                                </div>
                            </div>
                        </div>
                        @endif
