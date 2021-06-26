<?php

namespace App\Repositories\Interfaces;

interface OrderRepositoryInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAll();
    public function find($id);
    public function delete($id);


}
