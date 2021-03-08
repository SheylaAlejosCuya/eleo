<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_activation_code extends Model
{
    protected $table = 'tb_activation_code';

    protected $fillable = [
        'code',
        'id_user',
        'id_school',
        'id_state'
    ];

    protected $primaryKey = 'id_activation_code';

    public $timestamps = false;
}
