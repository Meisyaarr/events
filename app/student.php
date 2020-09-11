<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table = 'students';
    protected $guarded = [];

    public function user()
    {
        return $this->belongTo('App\User');
    }
}
