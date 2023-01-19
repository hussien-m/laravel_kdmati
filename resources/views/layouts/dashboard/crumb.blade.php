<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">{{ $pagename ?? 'اسم الصفحة' }}</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $pagename ?? 'اسم الصفحة' }}</li>
            </ol>
        </div>
        <div class="col-md-4">
            <div class="float-end d-none d-md-block">
                <div class="dropdown">
                    <a onclick="window.history.back();" class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                       رجوع للخلف <i class="dripicons-arrow-right me-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
