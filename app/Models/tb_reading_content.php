<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_reading_content extends Model
{
    protected $table = 'tb_reading_content';

    protected $fillable = [
        'id_reading_content',
        'position',
        'title',
        'content',
        'image_content',
        'id_reading'
    ];

    protected $primaryKey = 'id_reading_content';

    public $timestamps = false;
}
