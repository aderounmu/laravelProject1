<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //Table Name 
    protected $table = 'posts';
    //primary key 
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true ; 

     public function user()
     {
         return $this->belongsTo('App\User');
     }
}
