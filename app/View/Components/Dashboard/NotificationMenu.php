<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class NotificationMenu extends Component
{
    public $notifications, $newCount;
    /**
     * Create a new component instance.
     */
    public function __construct($count = 10)
    {
        $this->notifications = Auth::user()->notifications()->take($count)->get();
        $this->newCount = Auth::user()->unreadNotifications()->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.notification-menu', [
            'notifications' => $this->notifications,
            'newCount' => $this->newCount
        ]);
    }
}