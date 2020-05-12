<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
 protected $fillable = [
    'id',
    'category_id',
    'user_id',
    'title',
    'slug',
    'excerpt',
    'content_raw',
    'is_published',
    'published_at',
    'img_url',
 ];
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAllWithPaginate($elem){
        $fields = ['id','title','category_id','user_id','excerpt','is_published','excerpt'];

        $result = $this->select($fields)->with([
            'category:id,title',
            'user:id,name'
        ])->orderBy('id','desc')->paginate($elem);

        return $result;
    }
}
