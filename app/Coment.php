<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'body' => 'required',
    );
    
    public function profiles()
    {
        return $this->belongsTo('App\Profile');
    }
}
