<?php

namespace App\Models;

use App\classes\PropertyContainer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends PropertyContainer
{
    const UNKNOWN_USER = 1;

    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content_raw',
        'category_id',
        'slug',
        'excerpt',
        'is_published'
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
