<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_scores_activities extends Model
{
    protected $table = 'tb_scores_activities';

    protected $primaryKey = 'id_scores_activities';

    public $timestamps = false;

    public function rubric()
    {
        return $this->hasOne(tb_rubric::class, 'id_rubric', 'id_rubric');
    }
}
