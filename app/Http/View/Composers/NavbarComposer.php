<?php
namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Message;
use Auth;


class NavbarComposer
{
    public function compose(View $view)
    {
        // $unreadCount = Message::where('is_viewed', false)->count();
        // $view->with('unreadCount', $unreadCount);
        $adminName = Auth::user()->name;
            $view->with('adminName', $adminName);
    }
}