<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\EloquentRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryEloquentRepository extends EloquentRepository implements CategoryRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Category::class;
    }
}
