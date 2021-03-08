<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_code_association extends Model
{
    protected $table = 'tb_code_association';

    protected $fillable = [
        'id_activation_code',
        'id_user',
        'id_school',
        'id_status'
    ];

    protected $primaryKey = 'id_code_association';

    public $timestamps = false;
}
