<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_rubric_criteria extends Model
{
    protected $table = 'tb_rubric_criteria';

    protected $primaryKey = 'id_rubric_criteria';

    public $timestamps = false;

    public function rubric_type()
    {
        return $this->hasOne(tb_rubric_type::class, 'id_rubric_type', 'id_rubric_type');
    }

    public function criteria()
    {
        return $this->hasOne(tb_criteria::class, 'id_criteria', 'id_criteria');
    }

}
