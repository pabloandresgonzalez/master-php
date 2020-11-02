<?php

namespace App;

use App\User;
use App\Role;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
