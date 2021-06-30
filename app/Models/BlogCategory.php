<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    const ROOT_CATEGORY = 1;

    protected $fillable = [
        'title',
        'description',
        'parent_id',
        'slug',
        'created_at',
        'deleted_at',
    ];

    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class,'parent_id','id');
    }

    //Аксессор

    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title ?? ($this->isRoot() ? 'Корень' : '???');
        return $title;
    }

    public function isRoot(){
        return $this->id === self::ROOT_CATEGORY;
    }
}
