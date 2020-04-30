<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
