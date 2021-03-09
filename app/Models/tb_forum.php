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
    public function tb_comment(){
        return $this->hasMany('App\Models\tb_comment');
    }
}
