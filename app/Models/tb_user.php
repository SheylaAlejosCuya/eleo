<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class tb_user extends Authenticatable
{
    
    use HasFactory, Notifiable;
    
    //protected $guard = 'usuario';
    protected $table = 'tb_user';

    protected $fillable = [
        'username',
        'password',
        'dni',
        'email',
        'first_name',
        'last_name',
        'birthdate',
        'id_avatar',
        'photo',
        'id_gender',
        'id_level',
        'id_rol',
        'id_classroom',
        'id_state'
    ];

    protected $primaryKey = 'id_user';
    protected $hidden = ['password'];

    public $timestamps = false;

    public function level()
    {
        return $this->hasOne(tb_level::class, 'id_level', 'id_level');
    }

    public function grade()
    {
        return $this->hasOne(tb_grade::class, 'id_grade', 'id_grade');
    }

    public function school()
    {
        return $this->hasOne(tb_school::class, 'id_school', 'id_school');
    }

    public function imageProfile()
    {
        return $this->belongsTo(tb_avatar::class, 'id_avatar', 'id_avatar');
    }

    public function isStudent()
    {
        return $this->id_rol === 2;
    }

    public function isProfessor()
    {
        return $this->id_rol === 1;
    }

    public function isProfessorAdmin()
    {
        return $this->id_rol === 3;
    }

    public function classroomProfessor()
    {
        return $this->hasMany(tb_classroom::class, 'id_teacher', 'id_user');
    }

    public function classroomStudent()
    {
        return $this->belongsTo(tb_classroom::class, 'id_classroom', 'id_classroom');
    }

    public function messagesFrom()
    {
        return $this->hasMany(tb_message::class, 'from_user_id', 'id_user');
    }

    public function messagesTo()
    {
        return $this->hasMany(tb_message::class, 'to_user_id', 'id_user');
    }

}
