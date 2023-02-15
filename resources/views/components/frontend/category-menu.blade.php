<li class="nav-item">
    <div class="dropdown menu-dropdown categories-dropdown">
        <a class="nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            التصنيفات <i class="fas fa-caret-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <div class="container-fluid">
                <div class="row row-eq-height">
                    @foreach($categories as $category)
                    <div class="col-md-3 menu-widget">
                        <h4 class="menu-head-title"><a class="menu-head-link"
                                href="{{ route("categorySlug",$category->slug) }}">{{ $category->name }}</a></h4>
                        @php
                            $sub = DB::table('categories')
                                    ->where('parent_id',$category->id)
                                    ->select('name','slug')
                                    ->get();
                        @endphp
                        <ul class="menu-list">
                            @foreach ($sub as $subcategory )
                            <li class="menu-list-item">
                                <a href="{{ route("categorySlug",$subcategory->slug) }}" class="menu-list-link">{{ $subcategory->name }}</a>
                            </li>
                            @endforeach

                        </ul>

                    </div>
                    @endforeach


                </div>
            </div>

        </div>
    </div>

</li>
