<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    //adding attributes
    protected $fillable = [
        'title', 'body',
    ];

    //relationship to user class
    public function user(){
        return $this->belongsTo(User::class);
    } 

    public function setTitleAttribute($value){
        $this->attributes['title']  = $value;
        $this->attributes['slug']   = str_slug($value); 
    }
}