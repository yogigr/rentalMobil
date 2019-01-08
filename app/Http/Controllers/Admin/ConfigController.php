<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\AppConfig;
use App\MailConfig;

class ConfigController extends Controller
{
    public function edit()
    {
    	return view('admin.config.edit');
    }

    public function update(Request $request)
    {
    	$this->validate($request, [

    		'app_name' => 'required|string',
            'app_env' => 'required',
            'app_debug' => 'required',
            'app_url' => 'required|url',
            'app_timezone' => 'required|timezone',
            'app_locale' => 'required',

            'mail_driver' => 'required',
            'mail_host' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_port' => 'required|numeric',
            'mail_from_address' => 'required|email',
            'mail_from_name' => 'required'
    	]);

        //app config
    	$app = AppConfig::firstOrFail();
        $app->name = $request->app_name;
        $app->env = $request->app_env;
        $app->debug = $request->app_debug;
        $app->url = $request->app_url;
        $app->timezone = $request->app_timezone;
        $app->locale = $request->app_locale;
        $app->save();

        //mail config
        $mail = MailConfig::firstOrFail();
        $mail->driver = $request->mail_driver;
        $mail->host = $request->mail_host;
        $mail->username = $request->mail_username;
        $mail->password = $request->mail_password;
        $mail->port = $request->mail_port;
        $mail->from_address = $request->mail_from_address;
        $mail->from_name = $request->mail_from_name;
        $mail->save();

    	return redirect('admin/config')->with('status', 'Berhasil Update Pengaturan');
    }
}
