<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'age' => 'required',
        'job' => 'required',
        'introduction' => 'required',
    );
    
    public function coments()
    {
        return $this->hasMany('App\Coment');
    }
}
