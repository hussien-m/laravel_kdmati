<section class="main-category">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="home-title ">خدمات احترافية متنوعة اختر منها ماتحتاجه لإنجاز أعمالك
                    </h2>
                    <div class="seperator"></div>
                </div>
                @forelse($categories as $category)
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <a href="#"><img
                            class="card-img-top card-img category-item-image" loading="lazy" height="85" width="115"
                            src="{{asset($category->image)}}" alt="أعمال">
                        <h4 class="categry-item-title">{{ $category->name }}</h4>
                    </a>
                </div>
                @empty
                <div class="col-md-12">
                    <div class="text-center">لايوجد تصنيفات</div>
                </div>
                @endforelse
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
