<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
    protected $fillable = [
    'id',
    'parent_id',
    'title',
    'slug',
    'description',
    'created_at',
    'updated_at',
    'deleted_at',
    ];

    public function post()
    {
        return $this->HasMany(Post::class);
    }

    public function parentCategory(){
        return $this->belongsTo(Categories::class,'parent_id','id');
    }

    public function getParentTitle(){
        return $this->parentCategory->title ?? '???';
    }

    public function getAllWithPaginate($elem){
        $fields = ['id','title','parent_id'];
        $result = $this->select($fields)->with(['parentCategory:title,id'])->paginate($elem);

        return $result;
    }

    public function getForSelectBox(){
        $fields = 'id, CONCAT (id, ". ", title) AS id_title';

        $result = $this->selectRaw($fields)->toBase()->get();

        return $result;
    }

    public function getEdit($id){
        $data = $this->find($id);

        return $data;
    }
}
