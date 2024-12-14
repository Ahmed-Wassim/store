    <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
            data-bs-toggle="dropdown">
            <i class="mdi mdi-bell-outline"></i>
            @if ($newCount)
                <span class="count-symbol bg-danger"></span>
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
            aria-labelledby="notificationDropdown">
            <h6 class="p-3 mb-0">Notifications</h6>
            @foreach ($notifications as $notification)
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item" href="/dashboard/index?notification_id={{ $notification->id }}">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-success">
                            <i class="mdi mdi-link-variant"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6
                            class="preview-subject font-weight-normal mb-1 @if ($notification->unread()) text bold @endif">
                            {{ $notification->data['title'] }}</h6>
                        <p class="text-gray ellipsis mb-0"> {{ $notification->data['body'] }} </p>
                        <p>{{ $notification->created_at->shortAbsoluteDiffForHumans() }}</p>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
            @endforeach
            <h6 class="p-3 mb-0 text-center">See all notifications</h6>
        </div>
    </li>
