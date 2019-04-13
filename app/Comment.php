<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';
    public $route = 'comment';
    public $timestamps = false;
    
    protected $fillable = [
        'content',
        'user_id',
        'content_id',
        'parent',
    ];

    //REALTIONSHIP
    public function content(){
        return $this->belongsTo('App\Content');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
