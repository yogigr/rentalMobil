<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailConfig extends Model
{
    protected $fillable = [
    	'driver', 'host', 'port', 'from_address', 'from_name',
    	'username', 'password'
    ];
}
