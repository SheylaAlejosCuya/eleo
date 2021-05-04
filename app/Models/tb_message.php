<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class tb_message extends Model
{
    use HasFactory, Uuids;

    protected $table = 'tb_message';

    protected $primaryKey = 'id_message';

    protected $fillable = [ 'id_message', 'message', 'from_user_id', 'to_user_id' ];

    public function toUser() 
    {
        return $this->belongsTo(tb_user::class, 'to_user_id', 'id_user');
    }

    public function fromUser() 
    {
        return $this->belongsTo(tb_user::class, 'from_user_id', 'id_user');
    }
}
