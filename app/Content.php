<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //
    protected $table = 'contents';
    public $route = 'content';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'content',
        'is_trend',
        'content_date',
        'img',
        'alias',
        'views',
        'user_id',
        'sub_content_category_id',
    ];

    //REALTIONSHIP
    public function sub_content_category(){
        return $this->belongsTo('App\SubContentCategory');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
