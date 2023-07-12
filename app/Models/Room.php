<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['room_number'];

    //    RELATIONS
    public function reserve(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Reserve::class, 'room_id', 'id');
    }

}
