<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppConfig extends Model
{
    protected $fillable = [
    	'name', 'env', 'debug', 'url', 'timezone', 'locale'
    ];
}
