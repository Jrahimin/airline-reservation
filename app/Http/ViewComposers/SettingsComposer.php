<?php

namespace App\Http\ViewComposers;

use App\Library\SettingsSingleton;
use Illuminate\View\View;



class SettingsComposer
{


    public function __construct()
    {

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $settings = SettingsSingleton::get();

        $view->with('settings',$settings);
    }

    public function register()
    {
        //
    }
}