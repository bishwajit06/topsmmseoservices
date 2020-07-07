<?php

namespace App\Providers;

use Menu;
use App\Review;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Slider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer('layouts.frontend.partial.slider', function($view){
            $sliders = Slider::all();
            $view->with('sliders', $sliders);
        });

        View::composer('layouts.frontend.service.serviceDetail', function($view){
            $reviews = Review::all();
            $view->with('reviews', $reviews);
        });

        View::composer('layouts.frontend.partial.testimonials', function($view){
            $reviews = Review::latest()->take(4)->get();
            $view->with('reviews', $reviews);
        });

        View::composer('layouts.frontend.partial.header', function($view){
            $public_menu = Menu::getByName('default-menu');
            $view->with('public_menu', $public_menu);
        });
    }
}
