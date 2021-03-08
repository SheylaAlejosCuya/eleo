<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_area extends Model
{
    protected $table = 'tb_area';

    protected $fillable = [
        'area'
    ];

    protected $primaryKey = 'tb_area';

    public $timestamps = false;
}
