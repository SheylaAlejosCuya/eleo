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
    
    protected $guard = 'usuario';

    protected $fillable = [
        'username',
        'password',
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

    protected $table = 'tb_user';

    protected $primaryKey = 'id_user';
    protected $hidden = ['password', 'remember_token'];

    public $timestamps = false;

}
