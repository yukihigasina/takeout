<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = array('id');
    public static $rules=array(
        'name'=> 'required',
        'storename'=>'required',
        'place'=>'required',
        'body'=>'required',
        'image'=>'required',
        );
}
