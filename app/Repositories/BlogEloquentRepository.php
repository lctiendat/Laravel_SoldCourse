<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Repositories\Interfaces\BlogRepositoryInterface;

class BlogEloquentRepository extends EloquentRepository implements BlogRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Blog::class;
    }
}
