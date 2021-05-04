<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_avatar extends Model
{
    protected $table = 'tb_avatar';

    protected $fillable = [
        'avatar',
    ];

    protected $primaryKey = 'id_avatar';

    public $timestamps = false;
}
