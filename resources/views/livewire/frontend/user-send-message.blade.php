<div class="dropdown messages-dropdown menu-dropdown">
    <a class="nav-link " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class=" fa fa-envelope"></i> <span class="notification messages-alert">{{ $unreadnotificationsCount }}</span>
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <ul class="hsoub-list-group" id="messages-dropdown">
            @forelse ($unreadnotifications as $notify )

                <li class="hsoub-list-item ">
                    <a href="#"><img loading="lazy"
                            class="hsoub-list-item-img" alt="{{ Auth::user()->first_name }}"
                            src="https://kdmati.com/admin/uploads/17428114511649424104.jpeg"></a>
                    <div class="hsoub-list-item-content">
                        استفسار عن : <a class="hsoub-list-item-link"
                        wire:click="markAsRead('{{ $notify->id }}')">{{ $notify->data['service_name'] }}</a>
                        <div class="hsoub-list-item-date">
                            <time> <i
                                    class="far fa-clock"></i> {{ $notify->created_at->diffForHumans() }}</time>
                        </div>
                    </div>
                </li>
                @empty
                لاتوجد رسائل
            @endforelse


        </ul>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item footer-dropdown-item" href="https://kdmati.com/messages"><i
                class="fa fa-fw fa-envelope"></i> جميع الرسائل</a>
    </div>
</div>
