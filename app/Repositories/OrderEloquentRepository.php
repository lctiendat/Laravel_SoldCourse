<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\EloquentRepository;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderEloquentRepository extends EloquentRepository implements OrderRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Order::class;
    }
}
