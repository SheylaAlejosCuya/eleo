<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_level extends Model
{
    protected $table = 'tb_level';

    protected $fillable = [
        'id_level',
        'level'
    ];

    protected $primaryKey = 'id_level';

    public $timestamps = false;
}
