<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Repositories\Interfaces\CourseRepositoryInterface;

class CourseEloquentRepository extends EloquentRepository implements CourseRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Course::class;
    }
}
