<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at','user_id','rol_id'];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function roles()
    {
        return $this->belongsTo(Role::class,'rol_id','id');
    }
}
