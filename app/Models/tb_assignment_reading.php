<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_assignment_reading extends Model
{
    protected $table = 'tb_assignment_reading';

    protected $fillable = [
        'id_reading',
        'id_classroom',
        'id_state'
    ];

    protected $primaryKey = 'id_assignment_reading';

    public $timestamps = false;
}