<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;


class BlogCategoryRepository extends CoreRepository
{
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getForComboBox()
    {
        $fields = implode(',',['id','CONCAT(id,". ",title) AS id_title']);

        $result = $this->startConditions()->selectRaw($fields)->toBase()->get();
        return $result;
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($perPage)
    {
        $columns = ['id','title','parent_id'];
        return $this->startConditions()->select($columns)->with(['parentCategory:id,title'])->paginate($perPage);
    }
}