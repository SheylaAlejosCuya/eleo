<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_lecturama extends Model
{
    protected $table = 'tb_lecturama';

    protected $fillable = [
        'id_lecturama',
        'id_grade',
        'id_level',
        'tittle',
        'pdf',
        'id_state'
    ];

    protected $primaryKey = 'id_lecturama';

    public $timestamps = false;
}