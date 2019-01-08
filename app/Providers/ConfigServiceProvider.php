<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\AppConfig;
use App\MailConfig;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //app config
        $app = AppConfig::firstOrFail();
        config(['app.name' => $app->name]);
        config(['app.env' => $app->env]);
        config(['app.debug' => $app->debug]);
        config(['app.url' => $app->url]);
        config(['app.timezone' => $app->timezone]);
        config(['app.locale' => $app->locale]);

        //mail config
        $mail = MailConfig::firstOrFail();
        config(['mail.driver' => $mail->driver]);
        config(['mail.host' => $mail->host]);
        config(['mail.username' => $mail->username]);
        config(['mail.password' => $mail->password]);
        config(['mail.port' => $mail->port]);
        config(['mail.from.address' => $mail->from_address]);
        config(['mail.from.name' => $mail->from_name]);
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
