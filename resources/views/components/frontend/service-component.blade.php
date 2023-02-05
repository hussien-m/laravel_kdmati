<section class="main-services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="home-category-title"><a href="{{ route('categorySlug',$slug) }}"
                        class="home-category-link">أعمال</a> <a href="{{ route('categorySlug',$slug) }}"
                        class="btn btn-primary btn-outline float-right">عرض الجميع</a></h2>
                <div class="row">

                    @forelse($business_service as  $business)
                    @php
                       $image =explode(',',$business->images);
                    @endphp
                    <div class="service-item-container col-md-3">
                        <div class="card service-item  ">
                            <a class="service-item-link"
                                href="{{ route('service.show',$business->slug) }}">
                                <img loading="lazy"
                                    src="{{ asset('upload/images/'.$image[0]) }}" width="340"
                                    height="190" class=" service-item-image"
                                    alt="عمل اختبارات واستبيانات على نماذج قوقل ( Google Form )"></a>
                            <div class="card-body service-item-body">
                                <div class="media service-item-user align-self-center align-items-center">
                                    <a class="service-avatar-link"
                                        href="#{{ Auth::user()->first_name }}"><img loading="lazy"
                                            width="38" height="38"
                                            class="service-item-avatar rounded-circle align-self-center mr-2"
                                            src="https://kdmati.com/admin/avatars/11813922211643932718.jpg"
                                            alt="همسات صالحة"></a>
                                    <div class="media-body">
                                        <h5 class="mt-0"><a class="service-item-userlink "
                                                href="#{{ Auth::user()->first_name }}">{{ Auth::user()->first_name }}</a>
                                        </h5>
                                    </div>
                                </div>

                                <h5 class="card-title service-item-title"><a class="service-item-link"
                                        href="{{ route('service.show',$business->slug) }}">{{ $business->title }}</a></h5>
                            </div>
                            <div class="card-footer service-item-footer row align-items-baseline">
                                <div class="col-6  text-left">
                                    <h5 class="service-item-price"><i class="fas fa-usd-circle"></i> 5 دولار
                                    </h5>
                                </div>
                                <div class="col-6 text-right">
                                    <h5 class="service-item-rate text-primary"><i class="fas fa-star"></i> 5
                                        <span class="text-gray">( 1 )</span></h5>
                                </div>

                            </div>

                        </div>
                    </div>

                    @empty
                       <div class="text-center">
                        <b>لاتوجد خدمات حتى الان</b>
                       </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</section>
