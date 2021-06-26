<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $countCourse = $this->getCountDataAll('courses');
        $countUser = $this->getCountDataAll('users');
        $countOrder = $this->getCountDataAll('orders');
        $countBlog = $this->getCountDataAll('blogs');
        $countOrderPending = $this->getCountOrderStatus(1);
        $countOrderAccept = $this->getCountOrderStatus(2);
        $countOrderSuccess = $this->getCountOrderStatus(3);

        return view('admin.index', compact(
            'countCourse',
            'countUser',
            'countOrder',
            'countBlog',
            'countOrderPending',
            'countOrderAccept',
            'countOrderSuccess'
        ));
    }
    public function statistical()
    {
    }
    function getCountDataAll($table)
    {
        $getCountDataAll = count(DB::table($table)->select('*')->get());
        return $getCountDataAll;
    }
    function getCountOrderStatus($number)
    {
        if($this->getCountDataAll('orders') !=0){
            $getCountOrderStatuscount = count(Order::where('status', $number)->get()) / $this->getCountDataAll('orders') * 100;
        }
        $getCountOrderStatuscount = 0;
        return  $getCountOrderStatuscount;
    }
}
