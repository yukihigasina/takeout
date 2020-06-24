<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = array('id');
    public static $rules=array(
        'storename'=>'required',
        'place'=>'required',
        'body'=>'required',
        'image'=>'required',
        );
        
    public static $update_rules=array(
        'storename'=>'required',
        'place'=>'required',
        'body'=>'required',
        );
        
    public function user(){
        return $this->belongsTo('App\User');
    }
}
