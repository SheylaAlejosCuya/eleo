<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_grade extends Model
{
    protected $table = 'tb_grade';

    protected $fillable = [
        'id_grade',
        'grade',
        'desc'
    ];

    protected $primaryKey = 'id_grade';

    public $timestamps = false;
}
