<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;


class BlogPostRepository extends CoreRepository
{

    public function getAllWithPaginate($perPage)
    {

        $columns = ['id','title','slug','is_published','user_id','category_id','published_at'];

        return $this->startConditions()
            ->select($columns)
            ->orderBy('id','DESC')
            ->with(['category:id,title','user:id,name'])
            ->paginate($perPage);
    }

    protected function getModelClass()
    {
        return Model::class;
    }

}