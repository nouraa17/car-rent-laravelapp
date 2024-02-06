<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Auth;

class SidebarComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $adminName = Auth::user()->name;
        $view->with('adminName', $adminName);
    }
}