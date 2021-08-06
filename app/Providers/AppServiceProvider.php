<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Newsletter;
use MailchimpMarketing\ApiClient;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Services\MailchimpNewsLetter;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(Newsletter::class,function(){

            $client = new ApiClient();
            $client->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us6'
            ]);
            return new MailchimpNewsLetter(
                $client,
                'bar'
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useTailwind();

        Model::unguard();

        Gate::define('admin',function(User $user){

           return auth()->user()->name === 'adam';
        });

        Blade::if('admin', function () {
            if(!auth()->check())
            {
                return false;
            }
            return auth()->user()->name === 'adam';
        });


    }
}
