<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class How extends Model
{
    protected $fillable = [
    	'order_number', 'title', 'description', 'icon', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
