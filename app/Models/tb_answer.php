<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_answer extends Model
{
    protected $table = 'tb_answer';

    protected $fillable = [
        'id_answer',
        'id_question',
        'answer',
        'correct',
        'id_state'
    ];

    protected $primaryKey = 'id_answer';

    public $timestamps = false;

}
