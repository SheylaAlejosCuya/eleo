<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_results extends Model
{
    protected $table = 'tb_results';

    protected $fillable = [
        'id_results',
        'id_user',
        'id_answer',
        'free_answer',
        'file',
        'file_type',
        'create_date'
    ];

    protected $primaryKey = 'id_results';

    public $timestamps = false;
}
