<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserEloquentRepository extends EloquentRepository implements UserRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\User::class;
    }
}
