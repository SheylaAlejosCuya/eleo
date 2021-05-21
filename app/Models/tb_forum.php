<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_forum extends Model
{
    protected $table = 'tb_forum';

    protected $fillable = [
        'id_forum',
        'id_classroom',
        'title',
        'content',
        'image', 
        'views',
        'id_state' 
    ];

    protected $primaryKey = 'id_forum';

    public $timestamps = false;

    // public function tb_comment(){
    //     return $this->hasMany('App\Models\tb_comment');
    // }

    public function comments()
    {
        return $this->hasMany(tb_comment::class, 'id_forum', 'id_forum');
    }

    // public function answers()
    // {
    //     return $this->hasManyThrough(tb_comment::class, tb_comment::class, 'id_forum', 'id_response_comment', 'id_forum', 'id_comment');
    // }

    public function users()
    {
        return $this->hasManyThrough(tb_user::class, tb_comment::class, 'id_forum', 'id_user', 'id_forum', 'id_user');
    }

    public function classroom()
    {
        return $this->hasOne(tb_classroom::class, 'id_classroom', 'id_classroom');
    }
}
