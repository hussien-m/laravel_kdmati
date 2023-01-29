@php
    $image = explode (',',$service->images);
@endphp
<div class="service-item-container col-md-4  ">
    <div class="card service-item  ">
        <a class="service-item-link" href="#">

            <img loading="lazy" src="{{ asset('upload/images/'.$image[0]) }}" width="340" height="190" class=" service-item-image" alt="افحص موقعك أو متجرك الالكتروني بشكل كامل وحلول لتحسينه"></a>
        <div class="card-body service-item-body">
            <div class="media service-item-user align-self-center align-items-center">
                <a class="service-avatar-link" href="#"><img loading="lazy" width="38" height="38" class="service-item-avatar rounded-circle align-self-center mr-2" src="https://kdmati.com/admin/avatars/18799420301655485487.png" alt="Khaled Fozan"></a>
                <div class="media-body">
                    <h5 class="mt-0"><a class="service-item-userlink " href="#">Khaled Fozan</a></h5>
                </div>
            </div>

            <h5 class="card-title service-item-title"><a class="service-item-link" href="#">
                 {{ $service->title }}</a></h5>
        </div>
        <div class="card-footer service-item-footer row align-items-baseline">
            <div class="col-6  text-left">
                <h5 class="service-item-price"><i class="fal fa-usd-circle"></i> 5 دولار</h5>
            </div>
            <div class="col-6 text-right">
                <h5 class="service-item-rate text-primary"><i class="fas fa-star"></i> 5 <span class="text-gray">( 4 )</span></h5>
            </div>

        </div>

    </div>
</div>
