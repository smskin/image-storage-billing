<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Lavary\Menu\Builder;
use Menu;
use Route;
use Request;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     * @noinspection Annotator
     */
    public function handle($request, Closure $next)
    {
        Menu::make('mainNav', function (Builder $menu) {
            if (Auth::check()){
                $menu->add('Главная',action('Web\HomeController@index'));
                $menu->add('Проекты',action('Web\ProjectController@index'));
            }
        });

        if (Auth::guest()){
            Menu::make('guestNav',function(Builder $menu){
                $menu->add(__('Войти'),route('login'));
                if (Route::has('register')){
                    $menu->add(__('Зарегистрироваться'),route('register'));
                }
            });
        }

        if (Auth::check()){
            Menu::make('userNav',function(Builder $menu){
                $dropDown = $menu->add(Auth::user()->name.' <span class="caret"></span>',['class' => 'nav-item dropdown']);
                /** @noinspection Annotator */
                $dropDown->link->attr(['class'=>'nav-link dropdown-toggle','role'=>'button','data-toggle'=>'dropdown','aria-haspopup'=>'true','aria-expanded'=>'false','v-pre']);

                $dropDown->add('Настройки',route('settings'));
                $logout = $dropDown->add('Выйти');
                /** @noinspection Annotator */
                $logout->link->attr(['onclick'=>'event.preventDefault(); document.getElementById(\'logout-form\').submit();']);
            });

            Menu::make('settingsNav',function(Builder $menu){
                $menu->add('Учетная запись',action('Web\SettingsController@index'));
                $menu->add('Платежи',action('Web\SettingsController@billing'));
                $menu->add('Приватность',action('Web\SettingsController@security'));
            });
        }


        return $next($request);
    }
}
