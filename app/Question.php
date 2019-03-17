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

    //accessor for question URL
    /*
        Accessors allow us to format eloquent attribute values when we retrieve them on model instances
    */
    public function getUrlAttribute(){
        return route("questions.show", $this->id);
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }
}
