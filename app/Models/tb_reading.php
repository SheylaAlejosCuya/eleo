<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_reading extends Model
{
    protected $table = 'tb_reading';

    protected $fillable = [
        'id_reading',
        'title',
        'content',
        'video_tittle',
        'video',
        'audio',
        'type',
        'id_typography',
        'id_area',
        'id_gender',
        'unity',
        'id_state'
    ];

    protected $primaryKey = 'id_reading';

    public $timestamps = false;

}
