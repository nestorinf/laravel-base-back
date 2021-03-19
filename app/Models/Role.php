<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function rolePermissions()
    {
        return $this->hasMany(RolePermission::class, 'rol_id', 'id');
    }

    public function permissions()
    {

        return $this->hasMany(Permission::class, 'rol_id', 'id');
    }
}
