<?php
namespace App\Http\ViewComposers;
use Illuminate\Contracts\View\View;
use Auth;
class HeaderUserComposer {
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $user = Auth::user();
        $view->with('user', $user);
    }
}