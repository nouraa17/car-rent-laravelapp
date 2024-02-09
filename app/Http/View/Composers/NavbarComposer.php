<?php
namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Message;
use Auth;


class NavbarComposer
{
    public function compose(View $view)
    {
        $unreadCount = Message::where('is_viewed', false)->count();
        $messages = Message::where('is_viewed', false)->get();
        $adminName = Auth::user()->name;
        $view->with(['adminName' => $adminName, 'unreadCount' => $unreadCount,'messages' => $messages]);
        
    }
}