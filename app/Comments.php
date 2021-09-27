<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public function user ()
    {
        return  $this->hasOne('App\User','id','userid');
    }

    public function news ()
    {
        return  $this->belongsTo('App\News');
    }
}
