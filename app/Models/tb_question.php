<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_question extends Model
{
    protected $table = 'tb_question';

    protected $fillable = [
        'id_question',
        'id_test',
        'question',
        'type',
        'audio',
        'final_resource_type',
        'id_state',
        'id_reading',
        'id_question_level'
    ];

    protected $primaryKey = 'id_question';

    public $timestamps = false;

    public function answers()
    {
        return $this->hasMany(tb_answer::class, 'id_question', 'id_question');
    }
}
