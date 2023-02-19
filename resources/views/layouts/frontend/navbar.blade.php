<header id="header">

    <nav id="header-nav" class="navbar fixed-top navbar-expand-lg navbar-light "
        style="background: #404040;background-color: #404040;">
        <div class="container">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item sidbar-btn-item">
                    <button class=" navbar-toggler side-btn" type="button" id="side-btn"> <i
                            class="dot dot-icon">●</i> <span class="navbar-toggler-icon"></span> </button>

                </li>
            </ul>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img loading="lazy" height="37" width="147" src="https://kdmati.com/admin/uploads/1656851898.png"
                    class="logo desktop-logo" alt="خدماتي" loading="lazy">
                <img loading="lazy" height="46" width="46" src="https://kdmati.com/admin/uploads/logo.ico"
                    class="logo mobile-logo" alt="خدماتي" loading="lazy">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"> <a class="btn btn-primary add-service-btn"
                            href="{{ route('add-service') }}" style="font-weight: bold;"><i
                                class="fa fa-plus"></i> اضف خدمة</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="https://kdmati.com/contests"> المسابقات</a>
                    </li>


                    <x-frontend.category-menu/>

                    <li class="nav-item"> <a class="nav-link" href="https://kdmati.com/purchases"> المشتريات <span
                                class="notification purchases-alert  none ">0</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" href="https://kdmati.com/orders"> الطلبات الواردة
                            <span class="notification requests-alert   ">1</span></a> </li>
                </ul>
            </div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="dropdown search-dropdown menu-dropdown">
                        <a class="nav-link " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search"></i>
                        </a>
                        <div class="dropdown-menu search-dropdown" aria-labelledby="dropdownMenuLink">
                            <div class="hsoub-searchbar">
                                <form action="https://kdmati.com/search" accept-charset="UTF-8" method="get">
                                    <input name="utf8" type="hidden" value="✓">
                                    <input class="hsoub-search" type="search" name="q" placeholder="ابحث عن ..."
                                        value="">
                                </form>
                            </div>
                        </div>
                    </div>
                </li>


                <livewire:frontend.cart-list />


                <li class="nav-item">
                    <livewire:frontend.user-send-message />
                </li>
                <li class="nav-item">
                    <livewire:frontend.notifications-component />
                </li>
                <li class="nav-item">
                    <div class="dropdown account-dropdown menu-dropdown">
                        <a class="nav-link " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img loading="lazy" src="https://kdmati.com/admin/uploads/13000131951641756403.jpg"
                                alt="kdmati" class="avatar rounded-circle"> <span
                                class="notification tickets-alert  none ">0</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="https://kdmati.com/user/kdmati"><i
                                    class="fa fa-fw fa-user"></i> {{Auth::user()->first_name}}</a>
                            <a class="dropdown-item" href="https://kdmati.com/profile"><i
                                    class="fa fa-address-card"></i> الملف الشخصى</a>
                            <a class="dropdown-item" href="https://kdmati.com/posts/kdmati"><i
                                    class="fa fa-fw fa-tags"></i> مشاركاتى</a>

                            <a class="dropdown-item" href="https://kdmati.com/my-portfolio"><i
                                    class="fa fa-images"></i> معرض الاعمال</a>
                            <a class="dropdown-item" href="https://kdmati.com/favourites"><i
                                    class="fa fa-fw fa-bookmark"></i> المفضلة</a>
                            <a class="dropdown-item" href="https://kdmati.com/credit"><i
                                    class="fa fa-fw fa-dollar-sign"></i> رصيدى</a>
                            <a class="dropdown-item" href="https://kdmati.com/referer"><i
                                    class="fa fa-fw fa-link"></i> التسويق بالعمولة</a>

                            <a class="dropdown-item" href="https://kdmati.com/setting"><i
                                    class="fa fa-fw  fa-sliders-h"></i> الاعدادات</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://kdmati.com/edit-account"><i
                                    class="fa fa-fw fa-edit"></i> تعديل الحساب</a>
                            <!-- <a class="dropdown-item " href="https://kdmati.com/tickets"><i class="fa fa-fw fa-life-ring"></i> مساعدة <span class="badge badge-danger badge-pill tickets-alert  float-right none ">0</span></a>
                               -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route("user.logout") }}"
                            onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"
                            ><i
                                    class="fa fa-fw fa-sign-out"></i> خروج
                            </a>

                            <form id="logout-form" action="{{ route("user.logout") }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </div>
                </li>
            </ul>

        </div>
    </nav>
</header>
