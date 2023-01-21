<div>

    <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-bell-outline"></i>
            <span class="badge bg-danger rounded-pill"><div id="noti-count">{{ $unreadnotificationCount }}</div></span>
        </button>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
            <div class="p-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="m-0 font-size-16"> الاشعارات (258) </h5>
                    </div>

                </div>
            </div>
                <style>
                    /* width */
                    ::-webkit-scrollbar {
                    width: 10px;
                    }

                    /* Track */
                    ::-webkit-scrollbar-track {
                    background: #f1f1f1;
                    }

                    /* Handle */
                    ::-webkit-scrollbar-thumb {
                    background: #888;
                    }

                    /* Handle on hover */
                    ::-webkit-scrollbar-thumb:hover {
                    background: #555;
                    }
                </style>
            <div class="notifications" style="max-height: 300px; overflow:scroll;overflow-x: hidden;">

                        @forelse($unreadnotification as  $notification)
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
                                        <p class="mb-1">{{ $notification->data['message'] }}</p>
                                    </div>
                                    <b style="font-size: 10px">{{ $notification->created_at->diffForHumans() }}</b>

                                </div>
                            </div>
                        </a>
                        @empty
                        <p style="font-size: 13px">لا توجد اشعارات</p>
                        @endforelse
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

</div>
