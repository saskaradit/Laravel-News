<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function category ()
    {
        return  $this->hasOne('App\Category', 'id', 'category_id');
    }

    protected $dates = ['date'];
    //kalo ada nama user
    // public function user ()
    // {
    //     return  $this->belongsTo('App\User');
    // }
}
