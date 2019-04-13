<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentCategory extends Model
{
    //
    protected $table = 'content_categories';
    public    $route = 'content-category';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'alias',
    ];

    //REALTIONSHIP
    public function sub_content_categories(){
        return $this->hasMany('App\SubContentCategory');
    }
}
