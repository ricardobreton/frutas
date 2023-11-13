<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // VerifyEmail::$toMailCallback = function($notifiable, $verificationUrl){
        //     return (new MailMessage)
        //     ->subject(Lang::get('Verify Email Address'))
        //     ->line(Lang::get('Please click the button below to verify your email address.'))
        //     ->action(Lang::get('Verify Email Address'),  $verificationUrl)
        //     ->line(Lang::get('If you did not create an account, no further action is required.'));
        // };
        /***
         * FUncion que verifica si existe una tabla y carga los valores de la misma para crear el menu de nav
         */
    }
}
