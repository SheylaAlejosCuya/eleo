<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_rubric extends Model
{
    protected $table = 'tb_rubric';

    protected $primaryKey = 'id_rubric';

    public $timestamps = false;
}
