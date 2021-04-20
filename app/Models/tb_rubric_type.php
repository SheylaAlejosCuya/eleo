<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_rubric_type extends Model
{
    protected $table = 'tb_rubric_type';

    protected $primaryKey = 'id_rubric_type';

    public $timestamps = false;
}
