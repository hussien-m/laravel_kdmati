<div class="dropdown notification-dropdown menu-dropdown">
    <a class="nav-link " href="#" role="button" id="notificationMenu" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class=" fa fa-bell"></i> <span
            class="notification notifications-alert"><div id="n-count">{{ $unreadnotificationsCount ?? 0 }}</div></span>
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <ul class="hsoub-list-group" id="notifications-dropdown">
            @forelse($unreadnotifications as  $notification)
            <li class="hsoub-list-item ">
                <a href="https://kdmati.com/user/admin"><img loading="lazy"
                        class="hsoub-list-item-img" alt="إدارة خدماتي"
                        src="https://kdmati.com/admin/uploads/16365706541673189984.png"></a>
                <div class="hsoub-list-item-content">
                    <p class="hsoub-notification-item"> مبروك <a
                            href='https://kdmati.com/user/kdmati'>{{Auth::user()->first_name}}</a>
                        ربحت مسابقة <a
                            href='https://kdmati.com/contest/13-فقط-تجربة-جديدة-لمسابقة'>فقط
                            تجربة جديدة لمسابقة </a> </p>
                    <div class="hsoub-list-item-date">
                        <time datetime="2023-01-08 16:56:46 " title="2023-01-08 16:56:46"> <i
                                class="far fa-clock"></i> منذ 3 يوم </time>
                    </div>
                </div>
            </li>
            @empty
             <div class="text-center">لاتوجد إشعارات حتى الأن</div>
            @endforelse

        </ul>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item footer-dropdown-item" href="#"><i
                class="fa fa-fw fa-bell"></i> جميع التنبيهات</a>
    </div>
</div>

<script type="module">
        var user_id = "{{ Auth::user()->id }}";
    Echo.private('App.Models.User.'+user_id)
                .notification((notification) => {
                console.log(notification.message);
            });
    /*
    var user_id = "{{ Auth::user()->id }}";
    Echo.private('App.Models.User.'+user_id)
                .notification((notification) => {
                console.log(notification.message);
                var count = $('#n-count').text();
                var noti_count = parseInt(count)+1;

                $('#n-count').html(noti_count);
                $('#notifications-dropdown').prepend(`

                <li class="hsoub-list-item ">
                <a href="https://kdmati.com/user/admin"><img loading="lazy"
                        class="hsoub-list-item-img" alt="إدارة خدماتي"
                        src="https://kdmati.com/admin/uploads/16365706541673189984.png"></a>
                <div class="hsoub-list-item-content">
                    <p class="hsoub-notification-item"> مبروك <a
                            href='https://kdmati.com/user/kdmati'>{{Auth::user()->first_name}}</a>
                        ربحت مسابقة <a
                            href='https://kdmati.com/contest/13-فقط-تجربة-جديدة-لمسابقة'>فقط
                            تجربة جديدة لمسابقة </a> </p>
                    <div class="hsoub-list-item-date">
                        <time datetime="2023-01-08 16:56:46 " title="2023-01-08 16:56:46"> <i
                                class="far fa-clock"></i> منذ 3 يوم </time>
                    </div>
                </div>
            </li>

                `);
            });
            */
</script>
