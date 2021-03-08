<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_gender extends Model
{
    protected $table = 'tb_gender';

    protected $fillable = [
        'id_gender',
        'gender'
    ];

    protected $primaryKey = 'id_gender';

    public $timestamps = false;
}
