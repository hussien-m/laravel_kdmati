<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="mdi mdi-bell-outline"></i>
        <span class="badge bg-danger rounded-pill"><div id="noti-count">{{ $c }}</div></span>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
        <div class="p-3">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="m-0 font-size-16"> الاشعارات (258) </h5>
                </div>
            </div>
        </div>
        <div data-simplebar style="max-height: 230px;">
            <div id="msg-noti">
                <a href="#" class="text-reset notification-item">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar-xs">
                                <span class="avatar-title bg-warning rounded-circle font-size-13">
                                    <i class="mdi mdi-message-text-outline"></i>
                                </span>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="text-muted">
                                <p class="mb-1">اشعار قديم</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="p-2 border-top">
            <div class="d-grid">
                <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                    عرض الكل
                </a>
            </div>
        </div>
    </div>
</div>
