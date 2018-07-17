<?php

namespace App\Providers;

use function foo\func;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Schema::defaultStringLength(191);

        \View::composer('layout.sidebar', function ($view) {

            //$topics = \App\Topic::with('postTopics')->withCount('postTopics')->get();
            $topics = \App\Topic::withCount('postTopics')->get();
            $topics->load('postTopics');
            $view->with('topics', $topics);
        });

        \DB::listen(function($query){
            $sql = $query->sql;
            $bindings = $query->bindings;
            $time = $query->time;

            if($time > 10){
                \Log::debug(var_export(compact('sql', 'bindings', 'time'), true));
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }
}
