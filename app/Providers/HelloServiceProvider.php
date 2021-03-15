<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

//use original validator
//use Illuminate\Validation\Validator;
use Validator;
use App\Http\Validators\HelloValidator;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //View::composer('hello.index',function($view){
        //  $view->with('view_message','composer message');
        //});

        //composerの呼び出し
        //  View::composer('hello.index','App\Http\Composers\HelloComposer');

        /*
        $validator=$this->app['validator'];
        //resolver（バリデーションの処理を行う）
        $validator->resolver(function($translator,$data,$rules,$messages){
          return new HelloValidator($translator,$data,$rules,$messages);
        });
        */

        Validator::extend('hello',function($attribute,$value,$parameters,$validator){
          return $value % 2 == 0;
        });

    }
}
