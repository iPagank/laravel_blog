<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
