<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_section extends Model
{
    protected $table = 'tb_section';

    protected $fillable = [
        'id_section',
        'section'
    ];

    protected $primaryKey = 'id_section';

    public $timestamps = false;
}
