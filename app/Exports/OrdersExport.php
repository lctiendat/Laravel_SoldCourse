<?php

namespace App\Exports;

use App\Models\Order as ModelsOrder;
use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection
{
    // private $data;

    // public function __construct($user)
    // {
    //     $this->user = $user;
    // }
    /**
     * @return \Illuminate\Support\Collection
    
     */
    public function collection()
    {
        return ModelsOrder::all();
    }
}
