<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_assignment extends Model
{
    protected $table = 'tb_assignment';

    protected $fillable = [
        'id_lecturama',
        'id_grade'
    ];

    protected $primaryKey = 'id_assignment';

    public $timestamps = false;
}
