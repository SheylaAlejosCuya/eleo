<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_comment extends Model
{
    protected $table = 'tb_comment';

    protected $fillable = [
        'id_comment',
        'id_user',
        'id_forum',
        'id_response_comment',
        'message',
        'id_state'
    ];

    protected $primaryKey = 'id_comment';

    public $timestamps = false;

    // public function classroomStudent()
    // {
    //     return $this->belongsTo(tb_forum::class, 'id_forum', 'id_forum');
    // }
    
    // public function tb_forum(){
    //     return $this->belongsTo('App\Models\tb_forum');
    // }

    public function answers()
    {
        return $this->hasMany(tb_comment::class, 'id_response_comment', 'id_comment');
    }
}
