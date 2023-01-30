@forelse ($services as $service )
    @include('frontend.categories.result-s')
@empty
<div class="text-center col-md-12 clearfix cleax-fix my-3 bg-light p-4">لايوجد خدمات في هذا القسم</div>
@endforelse
