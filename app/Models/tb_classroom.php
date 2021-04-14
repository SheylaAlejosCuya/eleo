<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_classroom extends Model
{
    protected $table = 'tb_classroom';

    protected $fillable = [
        'id_classroom',
        'id_teacher',
        'id_grade',
        'id_section',
        'id_level',
        'id_state'
    ];

    protected $primaryKey = 'id_classroom';

    public $timestamps = false;

    public function grade()
    {
        return $this->hasOne(tb_grade::class, 'id_grade', 'id_grade');
    }

    public function section()
    {
        return $this->hasOne(tb_section::class, 'id_section', 'id_section');
    }

    public function level()
    {
        return $this->hasOne(tb_level::class, 'id_level', 'id_level');
    }

    public function teacher()
    {
        return $this->hasOne(tb_user::class, 'id_user', 'id_teacher');
    }

    

}
