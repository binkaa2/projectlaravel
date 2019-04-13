<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubContentCategory extends Model
{
    //
    protected $table = 'sub_content_categories';
    public $route = 'sub-content-category';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'alias',
        'category',
    ];
    //REALTIONSHIP
    public function content_category(){
        return $this->belongsTo('App\ContentCategory');
    }
    public function contents(){
        return $this->hasMany('App\Content');
    }
}
