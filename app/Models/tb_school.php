<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_school extends Model
{
    protected $table = 'tb_school';

    protected $fillable = [
        'name',
        'id_state'
    ];

    protected $primaryKey = 'id_school';

    public $timestamps = false;
}
