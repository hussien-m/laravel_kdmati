
    <li class="nav-item">
        <div class="dropdown cart-dropdown menu-dropdown">
            <a class="nav-link " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class=" fa fa-shopping-cart"></i> <span
                    class="notification cart-alert"><div id="cartcount">{{ $carts->count() }}</div></span>
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <ul class="hsoub-list-group" id="cartlist">

                    @forelse ($carts as $cart)
                    @php
                        $image =explode(',',$cart->service->images);
                    @endphp
                    <li class="hsoub-list-item ">
                        <a href="#"><img loading="lazy" class="hsoub-list-item-img" alt="معمر" src="{{ asset("upload/images/".$image[0]) }}"></a>
                        <div class="hsoub-list-item-content">
                             تم اضافة : <a class="hsoub-list-item-link">{{ $cart->service->title }}</a> الى السلة
                            <div class="hsoub-list-item-date">
                                <time> <i class="far fa-clock"></i>{{ $cart->created_at->diffForHumans() }}</time>
                            </div>
                        </div>
                    </li>
                    @empty
                    <li class="hsoub-list-item empty-item">
                        <div class="hsoub-list-item-content empty-content">
                            <p class="empty-list-item-text">لا جديد حتى اللحظة!</p>
                        </div>
                    </li>
                    @endforelse

                </ul>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item footer-dropdown-item" href="{{ route("cart.index") }}"><i
                        class="fa fa-fw fa-shopping-cart"></i> اعرض سلة المشتريات</a>
            </div>
        </div>
    </li>


