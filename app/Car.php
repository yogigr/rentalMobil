<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
    	'name', 'description', 'price', 'user_id', 'is_in_used', 'image'
    ];

    public function getImage()
    {
    	if (is_null($this->image)) {
    		return asset('images/cars/null.jpg');
    	} else {
    		return asset('images/cars/'.$this->image);
    	}
    }

    public function status()
    {
    	if ($this->is_in_used) {
    		return '<span class="badge bg-red">Tidak Tersedia</span>';
    	} else {
    		return '<span class="badge bg-green">Tersedia</span>';
    	}
    }

    public function getPrice()
    {
    	return number_format($this->price, 0, '', '.');
    }

    //relation
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
