<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_user extends Model
{
    protected $table = 'tb_user';

    protected $primaryKey = 'id_user';
    protected $hidden = ['password'];

    public $timestamps = false;


}
