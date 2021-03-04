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
}
