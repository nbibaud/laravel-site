<?php

namespace App\Providers;

use App\View\Composers\ContactMenuComposer;
use App\View\Composers\MainMenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('app.includes.menu', MainMenuComposer::class);
        View::composer('contact.shared', ContactMenuComposer::class);
        $this->composeMemberMenus();
    }
    
    /**
     * Make the sub menus for the member profile views.
     */
    private function composeMemberMenus()
    {
        view()->composer(
            'members.view',
            function ($view) {
//            $user = $view->getData()['user'];
//            $menu = Menu::handler('profileMenu');
//            if ($user->isActiveUser()) {
//                $menu->add(route('member.profile', ['tab' => 'profile']), 'My Details')
//                     ->add(route('member.profile', ['tab' => 'events']), 'Events')
//                     ->add(route('member.profile', ['tab' => 'training']), 'Training');
//            } else {
//                $menu->add(route('member.view', ['username' => $user->username, 'tab' => 'profile']), 'Details')
//                     ->add(route('member.view', ['username' => $user->username, 'tab' => 'events']), 'Events')
//                     ->add(route('member.view', ['username' => $user->username, 'tab' => 'training']), 'Training');
//            }
//            $menu->addClass('nav nav-tabs');
//            $view->with('menu', $menu->render());
                $view->with('menu', '');
            }
        );
    }
    
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
